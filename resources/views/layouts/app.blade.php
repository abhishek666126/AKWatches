<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AK Watches - Simple Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold text-gold" href="{{ route('home') }}">AK Watches</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">Cart</a></li>
                </ul>
                <form class="d-flex" role="search" action="{{ route('products.index') }}" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search products" name="q"
                        value="{{ request('q') }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                <div class="cart-icon" onclick="openNav()">
                    <i class="fas fa-shopping-bag"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- cart -->
    <!-- Drawer (Right Side) -->
    <div id="mySidenav" class="sidenav">
        <div class="sidenav-header">
            <h3>Your Cart</h3>
            <span class="closebtn" onclick="closeNav()">&times;</span>
        </div>
        <p>Cart is empty...</p>
    </div>

    <!-- Optional overlay background -->
    <div id="overlay" class="overlay" onclick="closeNav()"></div>
    <!-- cart end -->

    @yield('content')

    <button class="whatsapp-floating-btn" onclick="openWhatsApp()">
        <i class="fab fa-whatsapp"></i>
    </button>

    <footer class="footer-light mt-auto">

        <div class="footer-top py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="{{ route('home') }}"><img src="{{ asset('images/akwatches-logo.svg') }}"
                                    alt="AK Watches logo"></a>
                        </div>
                        <div class="textwidget pb-30">
                            <p>AK Watches brings you timeless watches, elegant purses, durable belts, stylish goggles,
                                and classic clocks. Quality accessories for everyday style.</p>
                        </div>
                        <ul class="footer-social md-mb-30">
                            <li><a href="#" aria-label="Facebook"><span><i class="fa fa-facebook"></i></span></a></li>
                            <li><a href="#" aria-label="Instagram"><span><i class="fa fa-instagram"></i></span></a></li>
                            <li><a href="#" aria-label="YouTube"><span><i class="fa fa-youtube"></i></span></a></li>
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
                        <ul class="address-widget">
                            <li>
                                <div class="desc">Contact US</div>
                            </li>
                            <li>
                                <div class="desc">About Us</div>
                            </li>
                            <li>
                                <div class="desc">Careers</div>
                            </li>
                            <li>
                                <div class="desc">Privacy Policy</div>
                            </li>
                            <li>
                                <div class="desc">Terms & Conditions</div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 md-mb-30">
                        <h3 class="widget-title">Help</h3>
                        <ul class="address-widget">
                            <li>
                                <div class="desc">Payments</div>
                            </li>
                            <li>
                                <div class="desc">Shipping</div>
                            </li>
                            <li>
                                <div class="desc">Cancellation & Return</div>
                            </li>
                            <li>
                                <div class="desc">FAQ</div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <h3 class="widget-title">Newsletter</h3>
                        <p class="widget-desc">Get new arrivals and offers in your inbox.</p>
                        <form action="#" method="POST">
                            <p>
                                <input type="email" name="email" placeholder="Your email address">
                                <em class="paper-plane">
                                    <input type="submit" value="Sign up">
                                </em>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="container small text-muted d-flex flex-column flex-sm-row align-items-center justify-content-center  py-3">
            <span>&copy; {{ date('Y') }} AK Watches. All Rights Reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openWhatsApp() {
            let phoneNumber = "8881268166";
            let message = "Hello";
            let url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

            window.open(url, "_blank");
        }
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").classList.add("open");
            document.getElementById("overlay").classList.add("show");
        }

        function closeNav() {
            document.getElementById("mySidenav").classList.remove("open");
            document.getElementById("overlay").classList.remove("show");
        }
    </script>
</body>

</html>