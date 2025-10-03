@extends('layouts.app')

@section('content')
	<h1 class="h3 mb-3">Your Cart</h1>
	@if(empty($cartItems))
		<div class="alert alert-light border">Your cart is empty.</div>
		<a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
	@else
		<div class="table-responsive">
			<table class="table align-middle">
				<thead>
					<tr>
						<th>Product</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cartItems as $item)
						<tr>
							<td>{{ $item['name'] }}</td>
							<td>$ {{ number_format($item['price'], 2) }}</td>
							<td>{{ $item['qty'] }}</td>
							<td>$ {{ number_format($item['price'] * $item['qty'], 2) }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="text-end">
			<a href="#" class="btn btn-success">Checkout</a>
		</div>
	@endif
@endsection

