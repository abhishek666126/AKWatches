@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <h1 class="h2 fw-bold mb-4">Checkout</h1>
        
        <div class="row g-4">
            <!-- Order Summary -->
            <div class="col-lg-4 order-lg-2">
                <div class="card border-0 shadow-sm sticky-top" style="top: 100px;">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal</span>
                            <span class="fw-bold">₹2,499.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping</span>
                            <span class="fw-bold">₹99.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Tax</span>
                            <span class="fw-bold">₹299.88</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="h5 fw-bold">Total</span>
                            <span class="h5 fw-bold text-primary">₹2,897.88</span>
                        </div>
                        <button class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-lock me-2"></i>Place Order
                        </button>
                        <p class="text-muted small text-center mt-3 mb-0">
                            <i class="fas fa-shield-alt me-1"></i>Secure checkout
                        </p>
                    </div>
                </div>
            </div>

            <!-- Checkout Form -->
            <div class="col-lg-8 order-lg-1">
                <form id="checkoutForm">
                    <!-- Shipping Address -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-truck me-2"></i>Shipping Address</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Address Line 1 <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Street address" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Address Line 2</label>
                                    <input type="text" class="form-control" placeholder="Apartment, suite, etc.">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">State <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Postal Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Country <span class="text-danger">*</span></label>
                                    <select class="form-select" required>
                                        <option value="IN" selected>India</option>
                                        <option value="US">United States</option>
                                        <option value="UK">United Kingdom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-credit-card me-2"></i>Payment Method</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="cod" value="cod" checked>
                                <label class="form-check-label w-100" for="cod">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-money-bill-wave me-2"></i>Cash on Delivery</span>
                                        <span class="badge bg-success">Available</span>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="card" value="card">
                                <label class="form-check-label w-100" for="card">
                                    <i class="fas fa-credit-card me-2"></i>Credit/Debit Card
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="upi" value="upi">
                                <label class="form-check-label w-100" for="upi">
                                    <i class="fas fa-mobile-alt me-2"></i>UPI
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="wallet" value="wallet">
                                <label class="form-check-label w-100" for="wallet">
                                    <i class="fas fa-wallet me-2"></i>Digital Wallet
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Order Notes -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <label class="form-label fw-semibold">Order Notes (Optional)</label>
                            <textarea class="form-control" rows="3" placeholder="Special instructions for delivery..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

