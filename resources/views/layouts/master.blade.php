<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Optional: Add Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation Menu -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <a href="{{ route('home') }}">Osiany Furniture</a>
            </div>
            <ul class="navbar-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
                <li><a href="{{ route('FAQs') }}">FAQs</a></li>
                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                <li><a href="{{ route('payment') }}">Payment</a></li>
                @if (Auth::check())
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Main content area -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section (Common footer for all pages) -->
    <footer>
        <div class="footer-content">
            <p>Copyright &copy; 2024 | Osiany Furniture | Lemayian and Jodwar Engineers</p>
            <p>Contact Us: 0703587317 / 07998010996</p>
            <p>Email: <a href="mailto:lemayianledavit2018@gmail.com">lemayianledavit2018@gmail.com</a></p>
        </div>
    </footer>

</body>
</html>
