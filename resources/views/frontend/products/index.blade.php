@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
            <div>
                <h1 class="h2 fw-bold mb-2">Products</h1>
                @if(!empty($query))
                    <p class="text-muted mb-0">Search results for: "<strong>{{ $query }}</strong>"</p>
                @endif
                @if(!empty($category))
                    <p class="text-muted mb-0">Category: <strong>{{ $category }}</strong></p>
                @endif
                @if(empty($query) && empty($category))
                    <p class="text-muted mb-0">Browse our complete collection</p>
                @endif
            </div>
            <div class="mt-3 mt-md-0">
                <select class="form-select form-select-sm" style="width: auto; display: inline-block;">
                    <option>Sort by: Featured</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Newest First</option>
                </select>
            </div>
        </div>

        @if(empty($products))
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-search fa-4x text-muted mb-4"></i>
                    <h3 class="h4 fw-bold mb-2">No products found</h3>
                    <p class="text-muted mb-4">Try adjusting your search or browse all products.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">View All Products</a>
                </div>
            </div>
        @else
            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm h-100 position-relative product-card">
                            <form action="{{ route('wishlist.toggle', $product['id']) }}" method="POST" class="position-absolute" style="right: 15px; top: 15px; z-index: 10;">
                                @csrf
                                <button type="submit" class="wishlist-btn border-0 bg-white">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </form>
                            <a href="{{ route('products.show', $product['id']) }}">
                                <img src="{{ $product['image'] }}" class="card-img-top object-cover" alt="{{ $product['name'] }}" style="height: 250px;">
                            </a>
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-bold mb-2">
                                    <a href="{{ route('products.show', $product['id']) }}" class="text-dark text-decoration-none">
                                        {{ $product['name'] }}
                                    </a>
                                </h6>
                                <p class="price mb-3">₹{{ number_format($product['price'], 2) }}</p>
                                <div class="mt-auto d-flex gap-2">
                                    <form action="{{ route('cart.add', $product['id']) }}" method="POST" class="flex-fill">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary w-100">
                                            <i class="fas fa-shopping-cart me-1"></i>Add to Cart
                                        </button>
                                    </form>
                                    <a href="{{ route('products.show', $product['id']) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center py-5">
                                <i class="fas fa-search fa-4x text-muted mb-4"></i>
                                <h3 class="h4 fw-bold mb-2">No products found</h3>
                                <p class="text-muted mb-4">Try adjusting your search or browse all products.</p>
                                <a href="{{ route('products.index') }}" class="btn btn-primary">View All Products</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
</div>
@endsection


