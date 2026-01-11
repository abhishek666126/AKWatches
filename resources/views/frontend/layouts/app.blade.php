<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AK Watches - Simple Shop</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.webp') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

</head>

<body>

    @include('frontend.layouts.header')

    <main style="margin-top: 80px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert" style="margin-top: 100px !important;">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert" style="margin-top: 100px !important;">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show m-3" role="alert" style="margin-top: 100px !important;">
                <i class="fas fa-info-circle me-2"></i>{{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </main>

    <button class="whatsapp-floating-btn" onclick="openWhatsApp()">
        <i class="fab fa-whatsapp"></i>
    </button>

    <footer class="footer-light mt-auto">

        <div class="footer-top py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="{{ route('home') }}"><img src="{{ asset('frontend/images/ak-logo.png') }}"
                                    alt="AK Watches logo"></a>
                        </div>
                        <div class="textwidget pb-30">
                            <p>AK Watches brings you timeless watches, elegant purses, durable belts, stylish goggles,
                                and classic clocks. Quality accessories for everyday style.</p>
                        </div>
                        <ul class="footer-social md-mb-30">
                            <li><a href="#" aria-label="Facebook"><img
                                        src="{{ asset('frontend/images/icons/facebook.webp') }}" alt="facebook"></a>
                            </li>
                            <li><a href="https://www.instagram.com/abhishek4032" aria-label="Instagram"><img
                                        src="{{ asset('frontend/images/icons/instagram.webp') }}" alt="instagram"></a>
                            </li>
                            <li><a href="#" aria-label="YouTube"><img
                                        src="{{ asset('frontend/images/icons/youtube.webp') }}" alt="youtube"></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 pl-45 md-pl-15 md-mb-30">
                        <h3 class="widget-title">Shop</h3>
                        <ul class="site-map">
                            <li><a href="{{ route('products.index') }}?q=Watch">Watches</a> </li>
                            <li><a href="{{ route('products.index') }}?q=Clock">Clocks</a> </li>
                            <li><a href="{{ route('products.index') }}?q=Goggles">Goggles</a> </li>
                            <li><a href="{{ route('products.index') }}?q=Purse">Purses</a> </li>
                            <li><a href="{{ route('products.index') }}?q=Belt">Belts</a> </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 md-mb-30">
                        <h3 class="widget-title">About</h3>
                        <ul class="site-map">
                            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                            <li><a href="{{ route('about-us') }}">About Us</a></li>
                            <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('terms-conditions') }}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 md-mb-30">
                        <h3 class="widget-title">Help</h3>
                        <ul class="site-map">
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('shipping-returns') }}">Shipping & Returns</a></li>
                            <li><a href="{{ route('contact-us') }}">Customer Support</a></li>
                            <li><a href="{{ route('my-account') }}">My Account</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <h3 class="widget-title">Newsletter</h3>
                        <p class="widget-desc">Get new arrivals and offers in your inbox.</p>
                        <form action="{{ route('newsletter.store') }}" method="POST" class="newsletter-form">
                            @csrf
                            <input type="email" name="email" placeholder="Your email address">
                            <button type="submit">Submit</button>
                        </form>

                        @if(session('success'))
                            <p style="color:#28a745">{{ session('success') }}</p>
                        @endif
                        @error('email')
                            <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom py-3" style="background: linear-gradient(90deg, #b9e6ff 0%, #b3c7ff 100%);">
            <div class="container">
                <div
                    class="d-flex flex-column flex-sm-row justify-content-between align-items-center text-center text-sm-start gap-2">

                    <span class="small text-muted">
                        &copy; {{ date('Y') }} AK Watches. All Rights Reserved.
                    </span>

                    <img src="{{ asset('frontend/images/payment.png') }}" alt="Payment Methods" class="img-fluid"
                        style="max-height:40px; width:auto;">
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper.js') }}"></script>

    <script>
        function openWhatsApp() {
            let phoneNumber = "8881268166";
            let message = "Hello";
            let url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

            window.open(url, "_blank");
        }
    </script>
    <script>
        $(document).ready(function () {
            $('.hover-item').each(function () {
                const $item = $(this);
                const $video = $item.find('video');
                const $img = $item.find('img');

                // Hover for desktop
                $item.on('mouseenter', function () {
                    $img.css('opacity', '0');
                    $video.show().get(0).currentTime = 0;
                    $video.get(0).play();
                });

                $item.on('mouseleave', function () {
                    $video.get(0).pause();
                    $video.get(0).currentTime = 0;
                    $video.hide();
                    $img.css('opacity', '1');
                });

                // Touch for mobile
                $item.on('touchstart', function () {
                    $img.css('opacity', '0');
                    $video.show().get(0).currentTime = 0;
                    $video.get(0).play();
                });

                $item.on('touchend', function () {
                    $video.get(0).pause();
                    $video.get(0).currentTime = 0;
                    $video.hide();
                    $img.css('opacity', '1');
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.sign-in').click(function (e) {
                e.stopPropagation();
                $('.menu').toggle();
            });

            // hide when clicking outside
            $(document).click(function () {
                $('.menu').hide();
            });
        });
    </script>
    <script>
        // Mega Menu: Desktop hover, Mobile click
        document.addEventListener('DOMContentLoaded', function() {
            const megaDropdowns = document.querySelectorAll('.mega-dropdown');
            
            function isMobile() {
                return window.innerWidth < 992;
            }
            
            megaDropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.mega-menu');
                
                if (toggle && menu) {
                    // Desktop: Hover to show
                    if (!isMobile()) {
                        dropdown.addEventListener('mouseenter', function() {
                            menu.style.display = 'block';
                        });
                        
                        dropdown.addEventListener('mouseleave', function() {
                            menu.style.display = 'none';
                        });
                    }
                    
                    // Mobile: Click to toggle
                    toggle.addEventListener('click', function(e) {
                        if (isMobile()) {
                            e.preventDefault();
                            e.stopPropagation();
                            
                            const isExpanded = this.getAttribute('aria-expanded') === 'true';
                            
                            // Close all other dropdowns
                            megaDropdowns.forEach(other => {
                                if (other !== dropdown) {
                                    const otherToggle = other.querySelector('.dropdown-toggle');
                                    const otherMenu = other.querySelector('.mega-menu');
                                    if (otherToggle && otherMenu) {
                                        otherToggle.setAttribute('aria-expanded', 'false');
                                        otherMenu.style.display = 'none';
                                        other.classList.remove('show');
                                    }
                                }
                            });
                            
                            // Toggle current dropdown
                            if (isExpanded) {
                                this.setAttribute('aria-expanded', 'false');
                                menu.style.display = 'none';
                                dropdown.classList.remove('show');
                            } else {
                                this.setAttribute('aria-expanded', 'true');
                                menu.style.display = 'block';
                                dropdown.classList.add('show');
                            }
                        }
                    });
                }
            });
            
            // Close dropdowns when clicking outside (mobile only)
            document.addEventListener('click', function(e) {
                if (isMobile()) {
                    if (!e.target.closest('.mega-dropdown')) {
                        megaDropdowns.forEach(dropdown => {
                            const toggle = dropdown.querySelector('.dropdown-toggle');
                            const menu = dropdown.querySelector('.mega-menu');
                            if (toggle && menu) {
                                toggle.setAttribute('aria-expanded', 'false');
                                menu.style.display = 'none';
                                dropdown.classList.remove('show');
                            }
                        });
                    }
                }
            });
            
            // Handle window resize
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    if (!isMobile()) {
                        megaDropdowns.forEach(dropdown => {
                            const menu = dropdown.querySelector('.mega-menu');
                            if (menu) {
                                menu.style.display = 'none';
                            }
                        });
                    }
                }, 250);
            });
        });
    </script>
    <script>
        var swiper = new Swiper(".productSwiper", {
            slidesPerView: 4,
            spaceBetween: 25,
            loop: true,
            //   autoplay: { delay: 2000 },
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            breakpoints: {
                0: { slidesPerView: 1.3 },
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 }
            }
        });

        // BestSeller Swiper
        var bestsellerSwiper = new Swiper(".bestsellerSwiper", {
            slidesPerView: 4,
            spaceBetween: 15,
            loop: true,
            navigation: { 
                nextEl: ".bestsellerSwiper .swiper-button-next", 
                prevEl: ".bestsellerSwiper .swiper-button-prev" 
            },
            breakpoints: {
                0: { slidesPerView: 1.2, spaceBetween: 10 },
                576: { slidesPerView: 2, spaceBetween: 12 },
                768: { slidesPerView: 3, spaceBetween: 15 },
                992: { slidesPerView: 4, spaceBetween: 15 }
            }
        });
    </script>

    <script>
        function openNav(e) {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            document.getElementById("mySidenav").classList.add("open");
            document.getElementById("overlay").classList.add("show");
            document.body.style.overflow = 'hidden'; // Prevent body scroll when drawer is open
        }

        function closeNav() {
            document.getElementById("mySidenav").classList.remove("open");
            document.getElementById("overlay").classList.remove("show");
            document.body.style.overflow = ''; // Restore body scroll
        }

        // Close drawer when clicking outside
        document.addEventListener('click', function(event) {
            const sidenav = document.getElementById("mySidenav");
            const overlay = document.getElementById("overlay");
            const cartIcon = event.target.closest('.cart-icon');
            
            if (!sidenav.contains(event.target) && !cartIcon && sidenav.classList.contains('open')) {
                closeNav();
            }
        });
    </script>


</body>

</html>