@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold mb-3">Contact Us</h1>
                    <p class="lead text-muted">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row g-4">
                    <!-- Contact Form -->
                    <div class="col-lg-7">
                        <div class="card border-0 shadow-sm p-4">
                            <h3 class="h4 fw-bold mb-4">Send us a Message</h3>
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-5">
                        <div class="card border-0 shadow-sm p-4 h-100">
                            <h3 class="h4 fw-bold mb-4">Get in Touch</h3>
                            
                            <div class="mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-bold mb-1">Address</h5>
                                        <p class="text-muted mb-0">123 Shopping Street<br>City, State 12345<br>India</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-phone fa-2x text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-bold mb-1">Phone</h5>
                                        <p class="text-muted mb-0">
                                            <a href="tel:+918881268166" class="text-decoration-none">+91 8881268166</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-envelope fa-2x text-danger"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-bold mb-1">Email</h5>
                                        <p class="text-muted mb-0">
                                            <a href="mailto:abhishek666126@gmail.com" class="text-decoration-none">abhishek666126@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0">
                                        <i class="fab fa-whatsapp fa-2x text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fw-bold mb-1">WhatsApp</h5>
                                        <p class="text-muted mb-0">
                                            <a href="https://wa.me/918881268166" target="_blank" class="text-decoration-none">Chat with us</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h5 class="fw-bold mb-3">Follow Us</h5>
                                <div class="d-flex gap-3">
                                    <a href="https://www.instagram.com/abhishek4032" target="_blank" class="text-decoration-none">
                                        <i class="fab fa-instagram fa-2x text-danger"></i>
                                    </a>
                                    <a href="#" class="text-decoration-none">
                                        <i class="fab fa-facebook fa-2x text-primary"></i>
                                    </a>
                                    <a href="#" class="text-decoration-none">
                                        <i class="fab fa-youtube fa-2x text-danger"></i>
                                    </a>
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

