@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="display-5 fw-bold mb-4">Shipping & Returns</h1>
                <p class="text-muted mb-5">Everything you need to know about shipping and returns</p>

                <!-- Shipping Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h4 mb-0"><i class="fas fa-shipping-fast me-2"></i>Shipping Information</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <h3 class="h5 fw-bold mb-3">Shipping Options</h3>
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <h5 class="fw-bold mb-2"><i class="fas fa-truck me-2 text-primary"></i>Standard Shipping</h5>
                                    <p class="text-muted mb-2"><strong>Delivery Time:</strong> 5-7 business days</p>
                                    <p class="text-muted mb-0"><strong>Cost:</strong> ₹99 (Free on orders above ₹5,000)</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded p-3 h-100">
                                    <h5 class="fw-bold mb-2"><i class="fas fa-rocket me-2 text-success"></i>Express Shipping</h5>
                                    <p class="text-muted mb-2"><strong>Delivery Time:</strong> 2-3 business days</p>
                                    <p class="text-muted mb-0"><strong>Cost:</strong> ₹299</p>
                                </div>
                            </div>
                        </div>

                        <h3 class="h5 fw-bold mb-3">Shipping Process</h3>
                        <div class="row g-3 mb-4">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <span class="fw-bold">1</span>
                                    </div>
                                    <p class="small mb-0 fw-semibold">Order Placed</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <span class="fw-bold">2</span>
                                    </div>
                                    <p class="small mb-0 fw-semibold">Processing</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <span class="fw-bold">3</span>
                                    </div>
                                    <p class="small mb-0 fw-semibold">Shipped</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-center">
                                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                                        <span class="fw-bold">4</span>
                                    </div>
                                    <p class="small mb-0 fw-semibold">Delivered</p>
                                </div>
                            </div>
                        </div>

                        <h3 class="h5 fw-bold mb-3">Shipping Locations</h3>
                        <p class="text-muted mb-3">We currently ship to all major cities and towns across India. Shipping charges and delivery times may vary based on your location.</p>
                        <p class="text-muted mb-0"><strong>Note:</strong> We do not ship to P.O. Boxes. A valid street address is required for delivery.</p>
                    </div>
                </div>

                <!-- Returns Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h2 class="h4 mb-0"><i class="fas fa-undo me-2"></i>Returns & Exchanges</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <h3 class="h5 fw-bold mb-3">Return Policy</h3>
                        <p class="text-muted mb-3">We offer a <strong>7-day return policy</strong> from the date of delivery. To be eligible for a return, your item must be:</p>
                        <ul class="text-muted mb-4">
                            <li>Unused and in the same condition as received</li>
                            <li>In the original packaging with all tags attached</li>
                            <li>Accompanied by the original receipt or proof of purchase</li>
                        </ul>

                        <h3 class="h5 fw-bold mb-3">How to Return</h3>
                        <ol class="text-muted mb-4">
                            <li>Log into your account and go to Order History</li>
                            <li>Select the order you want to return</li>
                            <li>Click on "Return Item" and fill out the return form</li>
                            <li>You'll receive a return authorization and shipping label</li>
                            <li>Package the item securely and ship it back to us</li>
                        </ol>

                        <h3 class="h5 fw-bold mb-3">Return Shipping</h3>
                        <p class="text-muted mb-3">Return shipping costs are the responsibility of the customer unless the item is defective or incorrect. We will provide a prepaid return label for defective or incorrect items.</p>

                        <h3 class="h5 fw-bold mb-3">Refund Process</h3>
                        <p class="text-muted mb-3">Once we receive and inspect your returned item, we will process your refund within 5-7 business days. Refunds will be issued to the original payment method.</p>
                        <div class="alert alert-info mb-0">
                            <i class="fas fa-info-circle me-2"></i><strong>Note:</strong> Shipping charges are non-refundable unless the return is due to our error.
                        </div>
                    </div>
                </div>

                <!-- Exchanges Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h2 class="h4 mb-0"><i class="fas fa-exchange-alt me-2"></i>Exchanges</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <p class="text-muted mb-3">We currently do not offer direct exchanges. If you need a different size, color, or style, please return the original item and place a new order for the item you want.</p>
                        <p class="text-muted mb-0">This ensures you get the exact product you want and allows us to process your request more efficiently.</p>
                    </div>
                </div>

                <!-- Non-Returnable Items -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h2 class="h4 mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Non-Returnable Items</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <p class="text-muted mb-3">The following items cannot be returned:</p>
                        <ul class="text-muted mb-0">
                            <li>Items that have been used or worn</li>
                            <li>Items without original packaging or tags</li>
                            <li>Items damaged due to misuse or negligence</li>
                            <li>Personalized or customized items</li>
                            <li>Items purchased more than 7 days ago</li>
                        </ul>
                    </div>
                </div>

                <!-- Contact for Returns -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5 text-center">
                        <h3 class="h5 fw-bold mb-3">Need Help with Returns?</h3>
                        <p class="text-muted mb-4">Our customer service team is here to help you with any questions about returns or exchanges.</p>
                        <a href="{{ route('contact-us') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-headset me-2"></i>Contact Customer Service
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

