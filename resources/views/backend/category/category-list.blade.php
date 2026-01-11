@extends('backend.layout.main')
@section('title', 'Category List')
@section('heading', 'Category List')
@section('main.content')

@if (session('success'))
    <div class="alert alert-success fade-out">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="header-title">Category List</h4>
            <a href="{{ route('category.create') }}" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> Add Category
            </a>
        </div>

        <div class="data-tables mt-2 datatable-dark">
            <table id="dataTable3" class="table text-center table-striped align-middle">
                <thead class="text-capitalize">
                    <tr>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                @if ($category->category_image)
                                    <img src="{{ asset('backend/images/categories/' . $category->category_image) }}" width="60" height="60" class="rounded">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm me-1 mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('category.toggle', $category->id) }}"
                                   class="btn btn-sm btn-{{ $category->status ? 'success' : 'danger' }}">
                                    <i class="fa {{ $category->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-muted text-center">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
