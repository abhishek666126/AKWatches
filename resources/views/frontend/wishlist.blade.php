@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 fw-bold mb-0">My Wishlist</h1>
            <span class="text-muted">4 items</span>
        </div>

        @if(empty($wishlistItems))
            <div class="text-center py-5">
                <i class="fas fa-heart fa-4x text-muted mb-3"></i>
                <h3 class="h4 fw-bold mb-2">Your wishlist is empty</h3>
                <p class="text-muted mb-4">Start adding items you love!</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
            </div>
        @else
            <div class="row g-4">
                @foreach($wishlistItems as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100 position-relative">
                        <form action="{{ route('wishlist.remove', $item['id']) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px; z-index: 10;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger rounded-circle" style="width: 35px; height: 35px;" onclick="return confirm('Remove from wishlist?')">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                        <a href="{{ route('products.show', $item['id']) }}">
                            <img src="{{ asset('backend/images/products/' . $item['image']) }}" class="card-img-top" alt="{{ $item['name'] }}" style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title fw-bold">
                                <a href="{{ route('products.show', $item['id']) }}" class="text-dark text-decoration-none">
                                    {{ $item['name'] }}
                                </a>
                            </h6>
                            <p class="text-primary fw-bold mb-2">₹{{ number_format($item['price'], 2) }}</p>
                            <div class="mt-auto">
                                <form action="{{ route('cart.add', $item['id']) }}" method="POST" class="mb-2">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm w-100">
                                        <i class="fas fa-shopping-cart me-1"></i>Add to Cart
                                    </button>
                                </form>
                                <a href="{{ route('products.show', $item['id']) }}" class="btn btn-outline-secondary btn-sm w-100">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

