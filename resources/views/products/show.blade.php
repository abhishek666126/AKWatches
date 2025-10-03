@extends('layouts.app')

@section('content')
	<div class="row g-4">
		<div class="col-12 col-md-6">
			<img src="{{ $product['image'] }}" class="img-fluid rounded shadow-sm" alt="{{ $product['name'] }}">
		</div>
		<div class="col-12 col-md-6">
			<h1 class="h3">{{ $product['name'] }}</h1>
			<p class="text-muted">Category: {{ ucfirst($product['category']) }}</p>
			<p>{{ $product['description'] }}</p>
			<p class="display-6">$ {{ number_format($product['price'], 2) }}</p>
			<div class="d-flex gap-2">
				<a href="{{ route('cart') }}" class="btn btn-primary">Add to Cart</a>
				<a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back to Products</a>
			</div>
		</div>
	</div>
@endsection

