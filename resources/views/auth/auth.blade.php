<!-- resources/views/auth/auth.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $isRegister ? 'Register' : 'Login' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>{{ $isRegister ? 'Register' : 'Login' }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $isRegister ? route('register') : route('login') }}" method="POST">
            @csrf

            @if ($isRegister)
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            @endif

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            @if ($isRegister)
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">{{ $isRegister ? 'Register' : 'Login' }}</button>
        </form>

        @if ($isRegister)
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        @else
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        @endif
    </div>
</body>
</html>
