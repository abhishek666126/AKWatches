@extends('frontend.layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold mb-3">Frequently Asked Questions</h1>
                    <p class="lead text-muted">Find answers to common questions about our products, shipping, returns, and more.</p>
                </div>

                <div class="accordion" id="faqAccordion">
                    <!-- General Questions -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What products do you sell?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer a wide range of premium products including luxury watches, wall clocks, table clocks, stylish goggles, premium belts, and elegant purses. All our products are carefully selected to ensure quality and style.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Are your products authentic?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, all our products are 100% authentic and come with manufacturer warranty. We source directly from authorized dealers and distributors to ensure authenticity.
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Questions -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What are your shipping options?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer standard shipping (5-7 business days) and express shipping (2-3 business days). Shipping charges vary based on the delivery location and selected option. Free shipping is available on orders above ₹5,000.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                How can I track my order?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Once your order is shipped, you'll receive a tracking number via email and SMS. You can use this tracking number on our website or the courier's website to track your shipment in real-time.
                            </div>
                        </div>
                    </div>

                    <!-- Returns & Exchanges -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                What is your return policy?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer a 7-day return policy from the date of delivery. Items must be unused, in original packaging, and with all tags attached. For more details, please visit our <a href="{{ route('shipping-returns') }}">Shipping & Returns</a> page.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                How do I return or exchange an item?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                To initiate a return or exchange, log into your account, go to Order History, and select the order you want to return. Follow the instructions to generate a return request. Our team will process it within 24-48 hours.
                            </div>
                        </div>
                    </div>

                    <!-- Payment Questions -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                What payment methods do you accept?
                            </button>
                        </h2>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We accept all major credit/debit cards, UPI, digital wallets, and Cash on Delivery (COD). All online payments are processed through secure payment gateways to ensure your financial information is protected.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                Is Cash on Delivery available?
                            </button>
                        </h2>
                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, Cash on Delivery is available for orders above ₹500. COD charges may apply. Please note that COD is subject to availability in your area.
                            </div>
                        </div>
                    </div>

                    <!-- Product Questions -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                Do you offer warranty on products?
                            </button>
                        </h2>
                        <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, all our products come with manufacturer warranty. The warranty period varies by product category. Warranty details are provided with each product and in the product packaging.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                                Can I cancel my order?
                            </button>
                        </h2>
                        <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, you can cancel your order before it is shipped. Once shipped, you'll need to return the item after delivery. To cancel, go to your Order History and click on Cancel Order.
                            </div>
                        </div>
                    </div>

                    <!-- Account Questions -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq11">
                                How do I create an account?
                            </button>
                        </h2>
                        <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Creating an account is easy! Click on the Sign Up button in the header, fill in your details, and verify your email. You can also create an account during checkout.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq12">
                                How do I update my account information?
                            </button>
                        </h2>
                        <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Log into your account and go to My Account section. You can update your profile information, addresses, and preferences from there.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Still have questions -->
                <div class="card border-0 shadow-sm mt-5 text-center">
                    <div class="card-body py-5">
                        <h3 class="h4 fw-bold mb-3">Still have questions?</h3>
                        <p class="text-muted mb-4">Can't find the answer you're looking for? Please get in touch with our friendly team.</p>
                        <a href="{{ route('contact-us') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-envelope me-2"></i>Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

