@extends('layouts.app')

@section('content')

	<!-- Top Banner Slider -->
	<div id="topBannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#topBannerCarousel" data-bs-slide-to="0" class="active"
				aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#topBannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#topBannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner rounded-3 overflow-hidden border" style="border-color:#e5e7eb;">
			<div class="carousel-item active">
				<img src="{{ asset('images/banner1.webp') }}" class="d-block w-100" alt="Premium Watches Banner">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="fw-bold">Premium Watches</h5>
					<p>Timeless designs for every occasion.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="{{ asset('images/banner2.webp') }}" class="d-block w-100" alt="Purses & Accessories Banner">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="fw-bold">Purses & Accessories</h5>
					<p>Elegant essentials to elevate your look.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="{{ asset('images/banner3.webp') }}" class="d-block w-100" alt="Purses & Accessories Banner">
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
		<div class="container">
			<h2 class="h4 mb-3">Shop by Category</h2>
			<div class="row g-3">
				@php
					$categories = [
						['slug' => 'watches', 'name' => 'Watches', 'image' =>  asset('images/categories/watches.webp')],
						['slug' => 'smart-watches', 'name' => 'Smart Watches', 'image' => asset('images/categories/smartwatch.webp')],
						['slug' => 'clocks', 'name' => 'Clocks', 'image' => asset('images/categories/clock.webp')],
						['slug' => 'googles', 'name' => 'Goggles', 'image' => asset('images/categories/goggles.webp')],
						['slug' => 'wallet ', 'name' => 'Wallet ', 'image' => asset('images/categories/wallet.webp')],
						['slug' => 'belt', 'name' => 'Belt', 'image' => asset('images/categories/belt.webp')],
					];
				@endphp

				@foreach ($categories as $c)
					<div class="col-12 col-sm-6 col-lg-4">
						<a href="{{ route('products.index', ['q' => $c['name']]) }}" class="text-decoration-none text-dark">
							<div class="card h-100 shadow-sm">
								<img src="{{ $c['image'] }}" class="card-img-top object-cover" alt="{{ $c['name'] }}"
									style="height: 180px;">
								<div class="card-body">
									<h3 class="h6 mb-0">{{ $c['name'] }}</h3>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>


@endsection