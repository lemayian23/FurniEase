@extends('layouts.master')

@section('title', 'About Us')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <h1>About OSIANY Furniture Shop</h1>
        <p>Discover our journey, culture, and values.</p>
    </section>

    <!-- Featured Sections (Replacing the Featured Products) -->
    <section class="featured-sections">
        <div class="about-section">
            <h2>Why Osiany Started</h2>
            <p>
                The CEO of Osiany Furniture has an intriguing story about the 
                motivation behind the business webstore ideation, rooted in the belief that 
                quality furniture should be accessible to everyone, without compromising 
                on style or durability.
            </p>
        </div>
        <div class="about-section">
            <h2>Osiany Culture</h2>
            <p>
                Being a customer of Osiany Furniture is as easy as logging into our website, 
                registering, and exploring a curated collection of high-end, affordable products. 
                From standard designs to custom-made pieces, we ensure every order meets your 
                exact specifications, with nationwide delivery to your doorstep.
            </p>
        </div>
        <div class="about-section">
            <h2>Osiany Values</h2>
            <p>
                At Osiany, we value customer satisfaction above all else. Our products are crafted 
                to deliver exceptional quality and longevity. Operating for over two decades, we’ve 
                continuously evolved our offerings based on direct customer feedback, ensuring each 
                piece is both functional and aesthetically pleasing.
            </p>
        </div>
    </section>

    <!-- Osiany Glance and Images Section -->
    <section class="about-us">
        <div class="image-gallery">
            <img src="{{ asset('images/our-story.jpg') }}" alt="Our Story" />
            <img src="{{ asset('images/team.jpg') }}" alt="The Team" />
            <img src="{{ asset('images/furniture.jpg') }}" alt="Our Furniture" />
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <p>Copyright &copy; 2024 | Osiany Furniture | Lemayian and Jodwar Engineers</p>
            <p>Contact Us: 0703587317 / 07998010996</p>
            <p>Email: <a href="mailto:lemayianledavit2018@gmail.com">lemayianledavit2018@gmail.com</a></p>
        </div>
    </footer>
@endsection
