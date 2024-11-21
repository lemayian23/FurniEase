@extends('layouts.master')

@section('title', 'Products')

@section('content')
    <section class="products-hero">
        <h1>Explore Our Exclusive Furniture Collection</h1>
        <p>High-quality furniture tailored for your home.</p>
    </section>

    <section class="featured-products">
        <div class="product-grid">
            <div class="product">
                <img src="{{ asset('images/adrianasectionalsofa0.png') }}" alt="Adriana Sectional Sofa">
                <div class="product-info">
                    <h2>Adriana Sectionals</h2>
                    <p>For Living Room</p>
                    <p class="price">@ Ksh. 80,000</p>
                    <button class="quick-view-btn">Quick View</button>
                </div>
            </div>

            <div class="product">
                <img src="{{ asset('images/sofa-30.png') }}" alt="Aeries Sectional Sofas">
                <div class="product-info">
                    <h2>Aeries Sectional Sofas</h2>
                    <p>For Living Room</p>
                    <p class="price">@ Ksh. 85,000</p>
                    <button class="quick-view-btn">Quick View</button>
                </div>
            </div>

            <div class="product">
                <img src="{{ asset('images/eclipsebedsidecabinet0.png') }}" alt="Eclipse Bedside Cabinet">
                <div class="product-info">
                    <h2>Eclipse Bedside Cabinet</h2>
                    <p>For Bedroom</p>
                    <p class="price">@ Ksh. 25,000</p>
                    <button class="quick-view-btn">Quick View</button>
                </div>
            </div>

            <div class="product">
                <img src="{{ asset('images/aurorabed0.png') }}" alt="Aurora Bed">
                <div class="product-info">
                    <h2>Aurora Bed</h2>
                    <p>For Bedroom</p>
                    <p class="price">@ Ksh. 50,000</p>
                    <button class="quick-view-btn">Quick View</button>
                </div>
            </div>

            <div class="product">
                <img src="{{ asset('images/scarlethavenbed0.png') }}" alt="Scarlet Haven Bed">
                <div class="product-info">
                    <h2>Scarlet Haven Bed</h2>
                    <p>For Bedroom</p>
                    <p class="price">@ Ksh. 60,000</p>
                    <button class="quick-view-btn">Quick View</button>
                </div>
            </div>

            <div class="product">
                <img src="{{ asset('images/rectangle-700.png') }}" alt="Master Bed">
                <div class="product-info">
                    <h2>Master Bed</h2>
                    <p>For Bedroom</p>
                    <p class="price">@ Ksh. 67,000</p>
                    <button class="quick-view-btn">Quick View</button>
                </div>
            </div>
        </div>
    </section>
@endsection

