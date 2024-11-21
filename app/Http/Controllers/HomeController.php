<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\CartItem;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // Ensure authentication is required for certain actions
    public function __construct()
    {
        $this->middleware('auth')->only(['addToCart', 'viewCart', 'updateCart', 'removeFromCart']);
    }

    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login functionality
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended(route('home'));
        }

        return redirect()->route('login')->withErrors('Invalid login credentials');
    }

    // Show Register Form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Register a new user
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user and log them in
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->intended(route('home'));
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // Show Home page
    public function home()
    {
        return view('home');
    }

    // Show FAQs page
    public function FAQs()
    {
        return view('faqs');
    }

    // Show About page
    public function about()
    {
        return view('about');
    }

    // Show Products page
    public function products()
    {
        return view('products');
    }

    // Show Cart page
    public function cart()
    {
        return view('cart');
    }

    // Show Payment page
    public function payment()
    {
        return view('payment');
    }

    // Admin dashboard with summary
    public function adminDashboard()
    {
        $totalUsers = User::count(); // Total registered users
        $totalProducts = Products::count(); // Total products
        $recentOrders = Order::latest()->take(5)->get(); // Last 5 orders
        $pendingOrders = Order::where('status', 'pending')->count(); // Pending orders

        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'recentOrders', 'pendingOrders'));
    }

    // View the cart for the logged-in user
    public function viewCart()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    // Add a product to the cart
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->route('cart.index')->withErrors('Product not found');
        }

        // Check if the product already exists in the cart
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Update the quantity if it exists
            $cartItem->increment('quantity');
        } else {
            // Add new item to the cart
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1, // Default quantity
                'price' => $product->price,
            ]);
        }

        return redirect()->route('cart.index');
    }

    // Update the quantity of an item in the cart
    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::find($id);

        if ($cartItem && $cartItem->user_id === Auth::id()) {
            $cartItem->update(['quantity' => $request->quantity]);
        }

        return redirect()->route('cart.index');
    }

    // Remove an item from the cart
    public function removeFromCart($id)
    {
        $cartItem = CartItem::find($id);

        if ($cartItem && $cartItem->user_id === Auth::id()) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index');
    }

    // MPESA token logic (for future integration)
    public function getAccessToken(Request $request)
    {
        // Your MPESA token logic here
    }
}
