@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="display-5 fw-bold mb-4">Privacy Policy</h1>
                <p class="text-muted mb-5">Last updated: January 2024</p>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">1. Introduction</h2>
                        <p class="text-muted">Welcome to AK Watches. We are committed to protecting your privacy and ensuring you have a positive experience on our website. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">2. Information We Collect</h2>
                        <h5 class="fw-bold mb-2">Personal Information</h5>
                        <p class="text-muted mb-3">We may collect personal information that you voluntarily provide to us when you:</p>
                        <ul class="text-muted">
                            <li>Register for an account</li>
                            <li>Make a purchase</li>
                            <li>Subscribe to our newsletter</li>
                            <li>Contact us through our contact form</li>
                            <li>Participate in surveys or promotions</li>
                        </ul>
                        <p class="text-muted mb-0">This information may include your name, email address, phone number, shipping address, billing address, and payment information.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">3. How We Use Your Information</h2>
                        <p class="text-muted mb-3">We use the information we collect to:</p>
                        <ul class="text-muted">
                            <li>Process and fulfill your orders</li>
                            <li>Send you order confirmations and updates</li>
                            <li>Respond to your inquiries and provide customer support</li>
                            <li>Send you marketing communications (with your consent)</li>
                            <li>Improve our website and services</li>
                            <li>Detect and prevent fraud</li>
                            <li>Comply with legal obligations</li>
                        </ul>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">4. Information Sharing</h2>
                        <p class="text-muted mb-3">We do not sell, trade, or rent your personal information to third parties. We may share your information with:</p>
                        <ul class="text-muted">
                            <li><strong>Service Providers:</strong> Third-party companies that help us operate our website, process payments, and deliver products</li>
                            <li><strong>Legal Requirements:</strong> When required by law or to protect our rights</li>
                            <li><strong>Business Transfers:</strong> In connection with a merger, acquisition, or sale of assets</li>
                        </ul>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">5. Data Security</h2>
                        <p class="text-muted">We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the Internet is 100% secure.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">6. Your Rights</h2>
                        <p class="text-muted mb-3">You have the right to:</p>
                        <ul class="text-muted">
                            <li>Access your personal information</li>
                            <li>Correct inaccurate information</li>
                            <li>Request deletion of your information</li>
                            <li>Opt-out of marketing communications</li>
                            <li>Withdraw consent at any time</li>
                        </ul>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">7. Cookies</h2>
                        <p class="text-muted">We use cookies and similar tracking technologies to enhance your browsing experience, analyze website traffic, and personalize content. You can control cookies through your browser settings.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">8. Children's Privacy</h2>
                        <p class="text-muted">Our website is not intended for children under 18 years of age. We do not knowingly collect personal information from children.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">9. Changes to This Policy</h2>
                        <p class="text-muted">We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last updated" date.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 fw-bold mb-3">10. Contact Us</h2>
                        <p class="text-muted mb-0">If you have any questions about this Privacy Policy, please contact us at <a href="mailto:abhishek666126@gmail.com">abhishek666126@gmail.com</a> or visit our <a href="{{ route('contact-us') }}">Contact Us</a> page.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

