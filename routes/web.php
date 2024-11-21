<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return auth()->check() ? redirect()->route('home') : redirect()->route('login');
})->name('home');

// Login routes
Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [HomeController::class, 'login'])->name('login.submit');

// Registration routes
Route::get('/register', [HomeController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [HomeController::class, 'register'])->name('register.submit');

// Protected routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Authenticated user routes
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/products', [HomeController::class, 'products'])->name('products');
    Route::get('/FAQs', [HomeController::class, 'FAQs'])->name('FAQs');

    // Payment routes
    Route::get('/payment', [HomeController::class, 'payment'])->name('payment');
    Route::post('/payment/token', [HomeController::class, 'getAccessToken'])->name('payment.token');

    // Admin-only routes
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');

    // Cart-related routes
    Route::get('/cart', [HomeController::class, 'viewCart'])->name('cart.index');
    Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{id}', [HomeController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove/{id}', [HomeController::class, 'removeFromCart'])->name('cart.remove');

    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');

    // Add this route to web.php
    Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');



    // Logout
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
});
