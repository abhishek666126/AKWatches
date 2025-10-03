@extends('layouts.app')

@section('content')
	<div class="d-flex align-items-center justify-content-between mb-3">
		<h1 class="h3 mb-0">Products</h1>
		@if(!empty($query))
			<span class="text-muted small">Search: "{{ $query }}"</span>
		@endif
	</div>

	@if(empty($products))
		<div class="alert alert-light border">No products found.</div>
	@else
		<div class="row g-3">
			@foreach($products as $product)
				<div class="col-12 col-sm-6 col-lg-4">
					<div class="card h-100 shadow-sm">
						<img src="{{ $product['image'] }}" class="card-img-top object-cover" alt="{{ $product['name'] }}" style="height: 200px;">
						<div class="card-body d-flex flex-column">
							<h3 class="h6">{{ $product['name'] }}</h3>
							<p class="fw-semibold mb-2">$ {{ number_format($product['price'], 2) }}</p>
							<div class="mt-auto d-flex gap-2">
								<a href="{{ route('products.show', $product['id']) }}" class="btn btn-sm btn-primary">View</a>
								<a href="{{ route('cart') }}" class="btn btn-sm btn-outline-secondary">Add to Cart</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	@endif
@endsection

