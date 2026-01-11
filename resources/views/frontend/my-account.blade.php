@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <h1 class="h2 fw-bold mb-4">My Account</h1>
        
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="#profile" class="list-group-item list-group-item-action active" data-bs-toggle="tab">
                                <i class="fas fa-user me-2"></i>Profile
                            </a>
                            <a href="#orders" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                                <i class="fas fa-shopping-bag me-2"></i>Orders
                            </a>
                            <a href="#addresses" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                                <i class="fas fa-map-marker-alt me-2"></i>Addresses
                            </a>
                            <a href="#wishlist" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                                <i class="fas fa-heart me-2"></i>Wishlist
                            </a>
                            <a href="#settings" class="list-group-item list-group-item-action" data-bs-toggle="tab">
                                <i class="fas fa-cog me-2"></i>Settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-9">
                <div class="tab-content">
                    <!-- Profile Tab -->
                    <div class="tab-pane fade show active" id="profile">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="fas fa-user me-2"></i>Profile Information</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">First Name</label>
                                            <input type="text" class="form-control" value="John">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">Last Name</label>
                                            <input type="text" class="form-control" value="Doe">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Email</label>
                                            <input type="email" class="form-control" value="john.doe@example.com">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Phone</label>
                                            <input type="tel" class="form-control" value="+91 8881268166">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Date of Birth</label>
                                            <input type="date" class="form-control" value="1990-01-01">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Tab -->
                    <div class="tab-pane fade" id="orders">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="fas fa-shopping-bag me-2"></i>My Orders</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">View your order history and track shipments.</p>
                                <a href="{{ route('order-history') }}" class="btn btn-primary">View All Orders</a>
                            </div>
                        </div>
                    </div>

                    <!-- Addresses Tab -->
                    <div class="tab-pane fade" id="addresses">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Saved Addresses</h5>
                                <button class="btn btn-sm btn-primary">Add New</button>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <h6 class="fw-bold mb-0">Home</h6>
                                                    <div>
                                                        <button class="btn btn-sm btn-link text-primary">Edit</button>
                                                        <button class="btn btn-sm btn-link text-danger">Delete</button>
                                                    </div>
                                                </div>
                                                <p class="text-muted small mb-0">
                                                    123 Shopping Street<br>
                                                    City, State 12345<br>
                                                    India
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <h6 class="fw-bold mb-0">Work</h6>
                                                    <div>
                                                        <button class="btn btn-sm btn-link text-primary">Edit</button>
                                                        <button class="btn btn-sm btn-link text-danger">Delete</button>
                                                    </div>
                                                </div>
                                                <p class="text-muted small mb-0">
                                                    456 Business Avenue<br>
                                                    City, State 12345<br>
                                                    India
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist Tab -->
                    <div class="tab-pane fade" id="wishlist">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="fas fa-heart me-2"></i>My Wishlist</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">View and manage your saved items.</p>
                                <a href="{{ route('wishlist') }}" class="btn btn-primary">View Wishlist</a>
                            </div>
                        </div>
                    </div>

                    <!-- Settings Tab -->
                    <div class="tab-pane fade" id="settings">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Account Settings</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <h6 class="fw-bold mb-3">Change Password</h6>
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Current Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm New Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </form>
                                </div>
                                <hr>
                                <div class="mb-4">
                                    <h6 class="fw-bold mb-3">Notifications</h6>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                                        <label class="form-check-label" for="emailNotif">Email Notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="smsNotif">
                                        <label class="form-check-label" for="smsNotif">SMS Notifications</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="newsletter" checked>
                                        <label class="form-check-label" for="newsletter">Newsletter</label>
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
@endsection

