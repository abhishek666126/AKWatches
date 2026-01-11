@extends('backend.layout.main')
@section('title', 'Product List')
@section('heading', 'Product List')
@section('main.content')

@if (session('success'))
    <div class="alert alert-success fade-out">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="header-title">Product List</h4>
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> Add Product
            </a>
        </div>

        <div class="data-tables mt-2 datatable-dark">
            <table id="dataTable3" class="table text-center table-striped align-middle">
                <thead class="text-capitalize">
                    <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Image</th>
                        <th>Stock</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category->category_name ?? 'N/A' }}</td>
                            <td>{{ $product->brand ?? 'N/A' }}</td>
                            <td>
                                @php
                                    $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                                @endphp
                                @if (!empty($images) && isset($images[0]))
                                    <img src="{{ asset('backend/images/products/' . $images[0]) }}"
                                         width="60" height="60" class="rounded">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="btn btn-primary btn-sm me-1 mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('products.toggle', $product->id) }}"
                                   class="btn btn-sm btn-{{ $product->status ? 'success' : 'danger' }}">
                                    <i class="fa {{ $product->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-muted text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
