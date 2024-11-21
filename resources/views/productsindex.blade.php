@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Products</h2>

    @foreach($products as $product)
        <div class="product">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
            <p>${{ $product->price }}</p>
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
