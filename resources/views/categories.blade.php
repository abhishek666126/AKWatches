@extends('layouts.app')

@section('content')
	<h1 class="h3 mb-3">Categories</h1>
	<div class="row g-3">
		@php
			$categories = [
				['slug' => 'watches', 'name' => 'Watches'],
				['slug' => 'clocks', 'name' => 'Clocks'],
				['slug' => 'googles', 'name' => 'Goggles'],
				['slug' => 'purse', 'name' => 'Purse'],
				['slug' => 'belt', 'name' => 'Belt'],
			];
		@endphp
		@foreach ($categories as $c)
			<div class="col-12 col-sm-6 col-lg-4">
				<a href="{{ route('products.index', ['q' => $c['name']]) }}" class="btn btn-outline-secondary w-100">{{ $c['name'] }}</a>
			</div>
		@endforeach
	</div>
@endsection

