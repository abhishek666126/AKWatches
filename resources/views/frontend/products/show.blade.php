@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none">Products</a></li>
                <li class="breadcrumb-item active">{{ $product->title }}</li>
            </ol>
        </nav>

        <div class="row g-4">
            <!-- Product Images -->
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm">
                    @php
                        $mainImage = asset('backend/images/products/' . (is_array($product->images) ? $product->images[0] : $product->images));
                    @endphp
                    <img src="{{ $mainImage }}" class="img-fluid rounded" alt="{{ $product->title }}" id="mainImage">
                </div>
                @if(is_array($product->images) && count($product->images) > 1)
                <div class="row g-2 mt-3">
                    @foreach(array_slice($product->images, 0, 4) as $image)
                    <div class="col-3">
                        <img src="{{ asset('backend/images/products/' . $image) }}" class="img-fluid rounded border cursor-pointer" alt="Thumbnail" style="height: 80px; object-fit: cover;" onclick="changeImage('{{ asset('backend/images/products/' . $image) }}')">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Details -->
            <div class="col-12 col-md-6">
                <h1 class="h2 fw-bold mb-3">{{ $product->title }}</h1>
                <div class="d-flex align-items-center mb-3">
                    <div class="text-warning me-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="text-muted">(4.5) 120 reviews</span>
                </div>
                <p class="text-muted mb-3">Category: <a href="{{ route('products.index') }}?category={{ $product->category->category_name ?? '' }}" class="text-decoration-none">{{ $product->category->category_name ?? 'Uncategorized' }}</a></p>
                
                <div class="mb-4">
                    <h3 class="h4 fw-bold text-primary mb-2">₹{{ number_format($product->price, 2) }}
                        @if($product->discount_price)
                            <span class="text-muted text-decoration-line-through small">₹{{ number_format($product->discount_price, 2) }}</span>
                        @endif
                    </h3>
                    <p class="text-muted mb-0"><small>Inclusive of all taxes</small></p>
                </div>

                <p class="mb-4">{{ $product->description ?? 'No description available.' }}</p>

                <!-- Product Options -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-2">Color:</h6>
                    <div class="d-flex gap-2 mb-3">
                        <button class="btn btn-sm btn-outline-dark active">Black</button>
                        <button class="btn btn-sm btn-outline-dark">Silver</button>
                        <button class="btn btn-sm btn-outline-dark">Gold</button>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold mb-2">Quantity:</h6>
                    <div class="input-group" style="width: 150px;">
                        <button class="btn btn-outline-secondary" type="button">-</button>
                        <input type="text" class="form-control text-center" value="1">
                        <button class="btn btn-outline-secondary" type="button">+</button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 mb-4">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-fill">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </form>
                    <form action="{{ route('wishlist.toggle', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-lg">
                            <i class="fas fa-heart"></i>
                        </button>
                    </form>
                </div>

                <!-- Product Features -->
                <div class="card border-0 bg-light mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Product Features:</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Premium Quality Materials</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>1 Year Manufacturer Warranty</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Free Shipping on orders above ₹5,000</li>
                            <li class="mb-0"><i class="fas fa-check text-success me-2"></i>7-Day Easy Returns</li>
                        </ul>
                    </div>
                </div>

                <!-- Share -->
                <div>
                    <h6 class="fw-bold mb-2">Share:</h6>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-info"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-danger"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-sm btn-outline-success"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs mb-4" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#description" type="button">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#specifications" type="button">Specifications</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Reviews (120)</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <p>{{ $product->description ?? 'No description available.' }}</p>
                                <p>This premium product is designed with attention to detail and crafted using the finest materials. Perfect for everyday use or special occasions, it combines style with functionality.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="specifications">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <table class="table">
                                    <tr>
                                        <th style="width: 200px;">Brand</th>
                                        <td>AK Watches</td>
                                    </tr>
                                    <tr>
                                        <th>Material</th>
                                        <td>Premium Quality</td>
                                    </tr>
                                    <tr>
                                        <th>Warranty</th>
                                        <td>1 Year</td>
                                    </tr>
                                    <tr>
                                        <th>Weight</th>
                                        <td>150g</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <h5 class="fw-bold mb-3">Customer Reviews</h5>
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="display-6 fw-bold me-3">4.5</span>
                                        <div>
                                            <div class="text-warning mb-1">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <p class="text-muted mb-0 small">Based on 120 reviews</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top pt-4">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <strong>John Doe</strong>
                                            <span class="text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                        </div>
                                        <p class="text-muted mb-0">Excellent product! Very satisfied with the quality and delivery.</p>
                                        <small class="text-muted">Reviewed on Jan 15, 2024</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function changeImage(src) {
    document.getElementById('mainImage').src = src;
}
</script>
@endsection


