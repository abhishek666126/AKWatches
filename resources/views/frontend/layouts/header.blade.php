 <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm border-bottom" style="z-index: 1030;">
        <div class="container-fluid">
            <a class="navbar-brand ps-2 ps-md-4" href="{{ route('home') }}">
                <img src="{{ asset('frontend/images/ak-logo.png') }}" alt="AK Watches logo" class="logo-img">
            </a>
            <button class="navbar-toggler pe-2 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @php
                        $categories = \App\Models\Category::where('status', 1)->with(['products' => function($q) {
                            $q->where('status', 1)->latest()->take(6);
                        }])->get();
                    @endphp
                    @foreach($categories->take(5) as $category)
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link fw-semibold dropdown-toggle" href="{{ route('products.index') }}?category={{ urlencode($category->category_name) }}" 
                           id="category{{ $category->id }}" role="button" data-bs-toggle="dropdown" 
                           data-bs-auto-close="outside" aria-expanded="false">
                            {{ $category->category_name }}
                        </a>
                        <ul class="dropdown-menu mega-menu p-4" aria-labelledby="category{{ $category->id }}">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <h6 class="fw-bold mb-3 text-uppercase">{{ $category->category_name }}</h6>
                                </div>
                                @if($category->products->count() > 0)
                                    @foreach($category->products->take(6) as $product)
                                    <div class="col-md-4 col-lg-3">
                                        <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                                            <div class="d-flex align-items-center mb-2">
                                                @php
                                                    $image = is_array($product->images) ? $product->images[0] : $product->images;
                                                @endphp
                                                <img src="{{ asset('backend/images/products/' . $image) }}" alt="{{ $product->title }}" 
                                                     class="me-2" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                                <div>
                                                    <h6 class="mb-0 small fw-bold">{{ Str::limit($product->title, 25) }}</h6>
                                                    <p class="mb-0 small text-primary">₹{{ number_format($product->price, 2) }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                @endif
                                <div class="col-12 mt-3">
                                    <a href="{{ route('products.index') }}?category={{ urlencode($category->category_name) }}" 
                                       class="btn btn-sm btn-primary w-100">
                                        View All {{ $category->category_name }}
                                    </a>
                                </div>
                            </div>
                        </ul>
                    </li>
                    @endforeach
                    @if($categories->count() > 5)
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-semibold dropdown-toggle" href="#" id="moreCategories" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="moreCategories">
                            <div class="row g-2">
                                @foreach($categories->skip(5) as $category)
                                <div class="col-6 col-md-4">
                                    <li><a class="dropdown-item" href="{{ route('products.index') }}?category={{ urlencode($category->category_name) }}">{{ $category->category_name }}</a></li>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                    </li>
                    @endif
                </ul>

                <!-- Search Bar -->
                <form class="d-flex search-form me-3 mb-2 mb-lg-0" role="search" action="{{ route('products.index') }}" method="get">
                    <div class="input-group search-input-group">
                        <input class="form-control border-end-0" type="search" placeholder="Search products..." name="q"
                            value="{{ request('q') }}" aria-label="Search" autocomplete="off">
                        <button class="btn btn-primary border-start-0" type="submit" aria-label="Search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                </form>

                <!-- User Actions -->
                <div class="d-flex align-items-center gap-3 pe-2 pe-md-4">
                    @auth
                        <div class="user-menu position-relative">
                            <button class="btn btn-link text-dark p-0 user-icon-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle fa-lg"></i>
                                <span class="d-none d-md-inline ms-1 small">{{ Str::limit(Auth::user()->name, 10) }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2" style="min-width: 220px; margin-top: 10px;">
                                <li class="px-3 py-2 border-bottom">
                                    <strong class="small d-block">{{ Auth::user()->name }}</strong>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </li>
                                <li><hr class="dropdown-divider my-2"></li>
                                <li><a class="dropdown-item py-2" href="{{ route('my-account') }}"><i class="fas fa-user me-2"></i>My Account</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('order-history') }}"><i class="fas fa-shopping-bag me-2"></i>Order History</a></li>
                                @if(Auth::user()->role === 'admin')
                                    <li><hr class="dropdown-divider my-2"></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</a></li>
                                @endif
                                <li><hr class="dropdown-divider my-2"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="mb-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger py-2 border-0 bg-transparent w-100 text-start">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="user-menu position-relative">
                            <button class="btn btn-link text-dark p-0 user-icon-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle fa-lg"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2" style="min-width: 150px; margin-top: 10px;">
                                <li><a class="dropdown-item py-2" href="{{ route('login.show') }}"><i class="fas fa-sign-in-alt me-2"></i>Login</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('signup.show') }}"><i class="fas fa-user-plus me-2"></i>Signup</a></li>
                            </ul>
                        </div>
                    @endauth

                    <a href="{{ route('wishlist') }}" class="btn btn-link text-dark p-0 position-relative wishlist-icon-btn" title="Wishlist">
                        <i class="fas fa-heart fa-lg"></i>
                        @php
                            $wishlistCount = count(session()->get('wishlist', []));
                        @endphp
                        @if($wishlistCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem; padding: 2px 5px;">
                                {{ $wishlistCount }}
                            </span>
                        @endif
                    </a>

                    <button class="btn btn-link text-dark p-0 position-relative cart-icon-btn" onclick="openNav(event);" type="button" title="Cart">
                        <i class="fas fa-shopping-bag fa-lg"></i>
                        @php
                            $cart = session()->get('cart', []);
                            $cartCount = array_sum(array_column($cart, 'quantity'));
                        @endphp
                        @if($cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary" style="font-size: 0.65rem; padding: 2px 5px;">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </button>
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
        <div class="sidenav-body p-3">
            @php
                $cart = session()->get('cart', []);
                $cartCount = array_sum(array_column($cart, 'quantity'));
            @endphp
            @if($cartCount > 0)
                @php
                    $cartItems = [];
                    $subtotal = 0;
                    foreach($cart as $id => $item) {
                        $product = \App\Models\Products::find($id);
                        if($product) {
                            $itemTotal = $product->price * $item['quantity'];
                            $subtotal += $itemTotal;
                            $cartItems[] = [
                                'id' => $product->id,
                                'name' => $product->title,
                                'price' => $product->price,
                                'quantity' => $item['quantity'],
                                'image' => is_array($product->images) ? $product->images[0] : $product->images,
                                'total' => $itemTotal,
                            ];
                        }
                    }
                    $shipping = $subtotal > 5000 ? 0 : 99;
                    $tax = $subtotal * 0.12;
                    $total = $subtotal + $shipping + $tax;
                @endphp
                <div style="max-height: calc(100vh - 250px); overflow-y: auto;">
                    @foreach($cartItems as $item)
                    <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                        <img src="{{ asset('backend/images/products/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0 small fw-bold">{{ Str::limit($item['name'], 25) }}</h6>
                            <p class="mb-0 small text-muted">Qty: {{ $item['quantity'] }} × ₹{{ number_format($item['price'], 2) }}</p>
                            <p class="mb-0 small fw-bold text-primary">₹{{ number_format($item['total'], 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="border-top pt-3 mt-3" style="position: sticky; bottom: 0; background: #fff;">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="small">Subtotal:</span>
                        <span class="small fw-bold">₹{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold">Total:</span>
                        <span class="fw-bold text-primary">₹{{ number_format($total, 2) }}</span>
                    </div>
                    <a href="{{ route('cart') }}" class="btn btn-primary w-100 mb-2" onclick="closeNav()">
                        <i class="fas fa-shopping-cart me-2"></i>View Cart
                    </a>
                    <a href="{{ route('checkout') }}" class="btn btn-outline-primary w-100" onclick="closeNav()">
                        <i class="fas fa-lock me-2"></i>Checkout
                    </a>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                    <p class="text-muted mb-4">Cart is empty...</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary w-100" onclick="closeNav()">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Optional overlay background -->
    <div id="overlay" class="overlay" onclick="closeNav()"></div>
    <!-- cart end -->