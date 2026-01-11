@extends('frontend.layouts.app')

@section('content')

	
	<div id="topBannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#topBannerCarousel" data-bs-slide-to="0" class="active"
				aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#topBannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#topBannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner rounded-3 overflow-hidden border" style="border-color:#e5e7eb;">
			<div class="carousel-item active">
				<img src="{{ asset('frontend/images/banner1.webp') }}" class="d-block w-100" alt="Premium Watches Banner">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="fw-bold">Premium Watches</h5>
					<p>Timeless designs for every occasion.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="{{ asset('frontend/images/banner2.webp') }}" class="d-block w-100"
					alt="Purses & Accessories Banner">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="fw-bold">Purses & Accessories</h5>
					<p>Elegant essentials to elevate your look.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="{{ asset('frontend/images/banner3.webp') }}" class="d-block w-100"
					alt="Purses & Accessories Banner">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="fw-bold">Wall Clocks</h5>
					<p>Elegant essentials to elevate your look.</p>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#topBannerCarousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#topBannerCarousel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
	
	<div class="py-5">
		<div class="explore-container">
			<div class="sec-title2 mb-4">
				<h2 class="title testi-title">Shop by Category</h2>
				<div class="heading-line mb-3" style="width: 80px; height: 3px; background: #fecc4a; border-radius: 2px; margin-left: 0;"></div>
			</div>
			<div class="row g-3">
				@forelse ($categories as $category)
					<div class="col-12 col-sm-6 col-lg-4">
						<a href="{{ route('products.index') }}?category={{ $category->category_name }}" class="text-decoration-none text-dark">
							<div class="card h-100 shadow-sm">
								<img src="{{ url('backend/images/categories/' . $category->category_image) }}"
									alt="{{ $category->category_name }}" class="card-img-top object-cover" style="height:200px;">

								<h5 class="fw-bold text-center py-3">{{ $category->category_name }}</h5>
							</div>
						</a>
					</div>
				@empty
					<div class="col-12 text-center py-5">
						<p class="text-muted">No categories available at the moment.</p>
					</div>
				@endforelse
			</div>
		</div>
	</div>
	
	<div class="py-5">
		<div class="explore-container">
			<div class="sec-title2 mb-4">
				<h2 class="title testi-title">Explore AK Watches</h2>
				<div class="heading-line mb-3" style="width: 80px; height: 3px; background: #fecc4a; border-radius: 2px; margin-left: 0;"></div>
			</div>

			<div class="explore-image">
				<img src="{{ asset('frontend/images/boatimg.webp') }}" alt="explore" class="img-fluid explore-img">
			</div>
		</div>
	</div>
	<!-- Explore End -->

	<!-- BestSeller Start-->
	<div class="py-5">
		<div class="explore-container">
			<div class="sec-title2 mb-4">
				<h2 class="title testi-title">Explore BestSeller</h2>
				<div class="heading-line mb-3" style="width: 80px; height: 3px; background: #fecc4a; border-radius: 2px; margin-left: 0;"></div>
			</div>

			<div class="swiper bestsellerSwiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="hover-item">
							<img src="{{ asset('frontend/images/categories/belt.webp') }}" alt="Belts">
							<video src="{{ asset('frontend/videos/video1.mp4') }}" muted playsinline preload="metadata" loop></video>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="hover-item">
							<img src="{{ asset('frontend/images/categories/clock.webp') }}" alt="Clocks">
							<video src="{{ asset('frontend/videos/video2.mp4') }}" muted playsinline preload="metadata" loop></video>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="hover-item">
							<img src="{{ asset('frontend/images/categories/goggles.webp') }}" alt="Goggles">
							<video src="{{ asset('frontend/videos/video1.mp4') }}" muted playsinline preload="metadata" loop></video>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="hover-item">
							<img src="{{ asset('frontend/images/categories/smartwatch.webp') }}" alt="Smartwatch">
							<video src="{{ asset('frontend/videos/video2.mp4') }}" muted playsinline preload="metadata" loop></video>
						</div>
					</div>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
	</div>
	<!-- BestSeller End-->

	<!-- slider start -->
	<section class="featured-products py-5">
		<div class="explore-container">
			<div class="sec-title2 mb-4">
				<h2 class="title testi-title">Featured Products</h2>
				<div class="heading-line mb-3" style="width: 80px; height: 3px; background: #fecc4a; border-radius: 2px; margin-left: 0;"></div>
			</div>
			<div class="swiper productSwiper">
				<div class="swiper-wrapper">
					@forelse($products->take(8) as $product)
					<div class="swiper-slide">
						<div class="product-card text-center p-3 position-relative">
							<form action="{{ route('wishlist.toggle', $product->id) }}" method="POST" class="position-absolute" style="right: 15px; top: 15px; z-index: 10;">
								@csrf
								<button type="submit" class="wishlist-btn border-0 bg-white">
									<i class="fas fa-heart"></i>
								</button>
							</form>
							<a href="{{ route('products.show', $product->id) }}">
								@php
								$image = is_array($product->images) ? $product->images[0] : $product->images;
								@endphp
								<img src="{{ asset('backend/images/products/' . $image) }}" class="img-fluid product-img" alt="{{ $product->title }}">
							</a>
							<h6 class="mt-3">{{ $product->title }}</h6>
							<p class="price">₹{{ number_format($product->price, 2) }}
								@if($product->discount_price)
									<span class="old-price">₹{{ number_format($product->discount_price, 2) }}</span>
								@endif
							</p>
							<form action="{{ route('cart.add', $product->id) }}" method="POST">
								@csrf
								<button type="submit" class="btn btn-primary btn-sm w-100">Add to Cart</button>
							</form>
						</div>
					</div>
					@empty
					<div class="swiper-slide">
						<div class="product-card text-center p-3">
							<p class="text-muted">No featured products available.</p>
						</div>
					</div>
					@endforelse
				</div>

				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
	</section>
	<!-- slider end -->

	<!-- Recently view start -->
	<section class="recent-viewed py-5">
		<div class="explore-container">
			<div class="sec-title2 mb-4">
				<h2 class="title testi-title">Recently Viewed</h2>
				<div class="heading-line mb-3" style="width: 80px; height: 3px; background: #fecc4a; border-radius: 2px; margin-left: 0;"></div>
			</div>

			<div class="row g-3">
				@forelse($products as $product)
				<div class="col-6 col-sm-6 col-md-4 col-lg-3">
					<div class="recent-card">
						<a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
							@php
							$image = is_array($product->images) ? $product->images[0] : $product->images;
							@endphp
							<img src="{{ asset('backend/images/products/' . $image) }}" class="img-fluid" alt="{{ $product->title }}">
							<h6 class="mt-2">{{ $product->title }}</h6>
							<p class="price">₹{{ number_format($product->price, 2) }}
								@if($product->discount_price)
									<span class="old-price">₹{{ number_format($product->discount_price, 2) }}</span>
								@endif
							</p>
						</a>
						<div class="d-flex gap-2 mt-2">
							<form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-fill">
								@csrf
								<button type="submit" class="btn btn-sm btn-primary w-100">
									<i class="fas fa-shopping-cart me-1"></i>Add to Cart
								</button>
							</form>
							<form action="{{ route('wishlist.toggle', $product->id) }}" method="POST">
								@csrf
								<button type="submit" class="btn btn-sm btn-outline-danger">
									<i class="fas fa-heart"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
				@empty
				<div class="col-12 text-center py-5">
					<p class="text-muted">No products available at the moment.</p>
				</div>
				@endforelse
			</div>
		</div>
	</section>
	<!-- Recently view End -->


@endsection