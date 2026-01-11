@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="display-5 fw-bold mb-4">Terms & Conditions</h1>
                <p class="text-muted mb-5">Last updated: January 2024</p>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">1. Acceptance of Terms</h2>
                        <p class="text-muted">By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">2. Use License</h2>
                        <p class="text-muted mb-3">Permission is granted to temporarily download one copy of the materials on AK Watches' website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                        <ul class="text-muted">
                            <li>Modify or copy the materials</li>
                            <li>Use the materials for any commercial purpose or for any public display</li>
                            <li>Attempt to reverse engineer any software contained on the website</li>
                            <li>Remove any copyright or other proprietary notations from the materials</li>
                        </ul>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">3. Product Information</h2>
                        <p class="text-muted mb-3">We strive to provide accurate product descriptions, images, and pricing. However, we do not warrant that product descriptions or other content on this site is accurate, complete, reliable, current, or error-free.</p>
                        <p class="text-muted mb-0">Product colors may vary slightly from what is displayed on your screen due to monitor settings and lighting conditions.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">4. Pricing and Payment</h2>
                        <p class="text-muted mb-3">All prices are listed in Indian Rupees (₹) and are subject to change without notice. We reserve the right to refuse or cancel any order at any time.</p>
                        <p class="text-muted mb-0">Payment must be received before we ship your order. We accept all major credit/debit cards, UPI, digital wallets, and Cash on Delivery (where available).</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">5. Orders and Shipping</h2>
                        <p class="text-muted mb-3">When you place an order, you will receive an order confirmation email. We will process your order and ship it according to the shipping method you selected.</p>
                        <p class="text-muted mb-0">Shipping times are estimates and not guarantees. We are not responsible for delays caused by shipping carriers or customs.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">6. Returns and Refunds</h2>
                        <p class="text-muted mb-3">Please review our <a href="{{ route('shipping-returns') }}">Shipping & Returns</a> policy for detailed information about returns and refunds.</p>
                        <p class="text-muted mb-0">Items must be returned in their original condition with all tags and packaging intact. Refunds will be processed within 5-7 business days after we receive the returned item.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">7. User Accounts</h2>
                        <p class="text-muted mb-3">You are responsible for maintaining the confidentiality of your account and password. You agree to:</p>
                        <ul class="text-muted">
                            <li>Provide accurate and complete information when creating an account</li>
                            <li>Maintain and update your account information</li>
                            <li>Notify us immediately of any unauthorized use</li>
                            <li>Accept responsibility for all activities under your account</li>
                        </ul>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">8. Intellectual Property</h2>
                        <p class="text-muted">All content on this website, including text, graphics, logos, images, and software, is the property of AK Watches or its content suppliers and is protected by copyright and trademark laws.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">9. Limitation of Liability</h2>
                        <p class="text-muted">AK Watches shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of or inability to use the website or products.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">10. Governing Law</h2>
                        <p class="text-muted">These terms and conditions are governed by and construed in accordance with the laws of India. Any disputes relating to these terms shall be subject to the exclusive jurisdiction of the courts in India.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">11. Changes to Terms</h2>
                        <p class="text-muted">We reserve the right to modify these terms at any time. Your continued use of the website after any changes constitutes acceptance of the new terms.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">12. Contact Information</h2>
                        <p class="text-muted mb-0">If you have any questions about these Terms & Conditions, please contact us at <a href="mailto:abhishek666126@gmail.com">abhishek666126@gmail.com</a> or visit our <a href="{{ route('contact-us') }}">Contact Us</a> page.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

