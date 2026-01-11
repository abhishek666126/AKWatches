@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 fw-bold mb-0">Order History</h1>
            <a href="{{ route('my-account') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Account
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>#ORD-2024-001</strong>
                                </td>
                                <td>Jan 15, 2024</td>
                                <td>3 items</td>
                                <td class="fw-bold">₹8,497.00</td>
                                <td>
                                    <span class="badge bg-success">Delivered</span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>#ORD-2024-002</strong>
                                </td>
                                <td>Jan 10, 2024</td>
                                <td>2 items</td>
                                <td class="fw-bold">₹5,299.00</td>
                                <td>
                                    <span class="badge bg-warning">Processing</span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>#ORD-2024-003</strong>
                                </td>
                                <td>Jan 5, 2024</td>
                                <td>1 item</td>
                                <td class="fw-bold">₹32,999.00</td>
                                <td>
                                    <span class="badge bg-info">Shipped</span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Track</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>#ORD-2023-045</strong>
                                </td>
                                <td>Dec 28, 2023</td>
                                <td>4 items</td>
                                <td class="fw-bold">₹12,897.00</td>
                                <td>
                                    <span class="badge bg-success">Delivered</span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Order Details Modal (Example) -->
        <div class="mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Order Details - #ORD-2024-001</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Shipping Address</h6>
                            <p class="text-muted mb-0">
                                123 Shopping Street<br>
                                City, State 12345<br>
                                India<br>
                                Phone: +91 8881268166
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Order Summary</h6>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span>₹8,000.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Shipping:</span>
                                <span>₹99.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tax:</span>
                                <span>₹398.00</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <strong>Total:</strong>
                                <strong class="text-primary">₹8,497.00</strong>
                            </div>
                        </div>
                    </div>
                    <h6 class="fw-bold mb-3">Ordered Items</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/categories/belt.webp') }}" alt="Product" class="me-3" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                            <div>
                                                <strong>Apple Watch Series 9</strong>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>₹32,999.00</td>
                                    <td>₹32,999.00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/categories/clock.webp') }}" alt="Product" class="me-3" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                            <div>
                                                <strong>Modern Wall Clock</strong>
                                            </div>
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td>₹5,999.00</td>
                                    <td>₹11,998.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

