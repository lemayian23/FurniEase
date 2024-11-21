@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <h1>Welcome to OSIANY Furniture Shop in Machakos, Kenya</h1>
        <p>Your one-stop destination for premium furniture.</p>
    </section>

    <section class="featured-products">
        <div class="product">
            <img src="{{ asset('images/rectangle-31.png') }}" alt="Lincon Briston chairs">
            <h2>Lincon Briston Chairs</h2>
            <p>For Living Room</p>
            <p>@ Ksh. 10,000</p>
        </div>
        <div class="product">
            <img src="{{ asset('images/rectangle-50.png') }}" alt="Living Room Furniture">
            <h2>Living Room Furniture</h2>
            <p>@ Ksh. 60,000</p>
        </div>
        <div class="product">
            <img src="{{ asset('images/rectangle-60.png') }}" alt="Comfort Armchair">
            <h2>Comfort Armchair</h2>
            <p>@ Ksh. 15,000</p>
        </div>
        <div class="product">
            <img src="{{ asset('images/rectangle-70.png') }}" alt="Comfort Bed Asset">
            <h2>Comfort Bed Asset 6x6</h2>
            <p>@ Ksh. 70,000</p>
        </div>
    </section>
@endsection