@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <!-- Hero Section -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-4">About AK Watches</h1>
                <p class="lead text-muted">Your trusted destination for premium watches, elegant accessories, and timeless style.</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('frontend/images/ak-logo.png') }}" alt="AK Watches" class="img-fluid rounded shadow">
            </div>
        </div>

        <!-- Mission Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <h2 class="h3 fw-bold mb-4 text-center">Our Mission</h2>
                    <p class="text-center text-muted fs-5">To provide our customers with high-quality watches, accessories, and timepieces that combine elegance, functionality, and affordability. We believe everyone deserves to own a piece that reflects their unique style and personality.</p>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-gem fa-3x text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Quality First</h4>
                    <p class="text-muted">We source only the finest materials and work with trusted manufacturers to ensure every product meets our high standards.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-heart fa-3x text-danger"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Customer Focus</h4>
                    <p class="text-muted">Your satisfaction is our priority. We're committed to providing exceptional service and support at every step.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-clock fa-3x text-warning"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Timeless Style</h4>
                    <p class="text-muted">We curate collections that blend classic elegance with modern trends, ensuring your accessories never go out of style.</p>
                </div>
            </div>
        </div>

        <!-- Story Section -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <h2 class="h3 fw-bold mb-4 text-center">Our Story</h2>
                    <p class="text-muted mb-3">AK Watches was founded with a simple vision: to make premium timepieces and accessories accessible to everyone. What started as a small venture has grown into a trusted name in the industry.</p>
                    <p class="text-muted mb-3">We offer a wide range of products including luxury watches, wall clocks, table clocks, stylish goggles, premium belts, and elegant purses. Each product is carefully selected to ensure it meets our quality standards.</p>
                    <p class="text-muted">Today, we serve customers across the country, helping them find the perfect accessories to complement their style and lifestyle. We're proud of our journey and excited about the future.</p>
                </div>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="row g-4">
            <div class="col-12">
                <h2 class="h3 fw-bold mb-4 text-center">Why Choose AK Watches?</h2>
            </div>
            <div class="col-md-6">
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle fa-2x text-success"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">Authentic Products</h5>
                        <p class="text-muted mb-0">100% genuine products with warranty</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                        <i class="fas fa-shipping-fast fa-2x text-primary"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">Fast Delivery</h5>
                        <p class="text-muted mb-0">Quick and reliable shipping nationwide</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                        <i class="fas fa-undo fa-2x text-info"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">Easy Returns</h5>
                        <p class="text-muted mb-0">Hassle-free return and exchange policy</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex mb-3">
                    <div class="flex-shrink-0">
                        <i class="fas fa-headset fa-2x text-warning"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">24/7 Support</h5>
                        <p class="text-muted mb-0">Round-the-clock customer service</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

