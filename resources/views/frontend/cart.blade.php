@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <h1 class="h2 fw-bold mb-4">Shopping Cart</h1>
        
        @if(empty($cartItems))
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-shopping-cart fa-4x text-muted mb-4"></i>
                    <h3 class="h4 fw-bold mb-2">Your cart is empty</h3>
                    <p class="text-muted mb-4">Looks like you haven't added anything to your cart yet.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                    </a>
                </div>
            </div>
        @else
            <div class="row g-4">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 50%">Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('backend/images/products/' . $item['image']) }}" alt="{{ $item['name'] }}" class="me-3" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                                    <div>
                                                        <h6 class="fw-bold mb-1">{{ $item['name'] }}</h6>
                                                        <a href="{{ route('products.show', $item['id']) }}" class="text-muted small">View Product</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="fw-bold">₹{{ number_format($item['price'], 2) }}</span>
                                            </td>
                                            <td>
                                                <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <div class="input-group" style="width: 120px;">
                                                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] - 1 }})">-</button>
                                                        <input type="number" class="form-control form-control-sm text-center" value="{{ $item['quantity'] }}" min="1" id="qty-{{ $item['id'] }}" onchange="updateQuantity({{ $item['id'] }}, this.value)">
                                                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] + 1 }})">+</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <span class="fw-bold text-primary">₹{{ number_format($item['total'], 2) }}</span>
                                            </td>
                                            <td>
                                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this item from cart?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-3 d-flex gap-2">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                        </a>
                        <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Clear entire cart?')">
                                <i class="fas fa-trash me-2"></i>Clear Cart
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                        <div class="card-header bg-light">
                            <h5 class="mb-0 fw-bold">Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-bold">₹{{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Shipping</span>
                                <span class="fw-bold">₹{{ number_format($shipping, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Tax (12%)</span>
                                <span class="fw-bold">₹{{ number_format($tax, 2) }}</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="h5 fw-bold">Total</span>
                                <span class="h5 fw-bold text-primary">₹{{ number_format($total, 2) }}</span>
                            </div>
                            <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg w-100 mb-3">
                                <i class="fas fa-lock me-2"></i>Proceed to Checkout
                            </a>
                            <div class="text-center">
                                <img src="{{ asset('frontend/images/payment.png') }}" alt="Payment Methods" class="img-fluid" style="max-height: 30px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
function updateQuantity(id, quantity) {
    if (quantity < 1) quantity = 1;
    document.getElementById('qty-' + id).value = quantity;
    
    fetch('{{ url("/cart/update") }}/' + id, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}
</script>
@endsection



