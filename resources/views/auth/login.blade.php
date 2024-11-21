@extends('layouts.master')

@section('title', 'Login')

@section('content')
<h1>Login</h1>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
@endsection
