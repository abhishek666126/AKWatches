@extends('backend.layout.main')
@section('title', 'CategoryCreate')
@section('heading','Category Create')
@section('main.content')
    <div class="container mt-4">
        <h4>Add New Category</h4>
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row name-slug">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="category_name" class="form-control" placeholder="Enter category name" value="{{ old('category_name') }}">
                    @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control"
                        placeholder="slug"
                        value="{{ old('slug') }}">
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="category_description" class="form-control" rows="3" placeholder="Enter Category">{{ old('category_description') }}</textarea>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 text-dark">Category Image</label>
                <div class="image-upload-wrapper" id="upload-area">
                    <i class="fa fa-camera" id="placeholder-icon"></i>
                    <img id="preview-image" src="#" alt="Image Preview">
                    <div class="delete-image-icon" id="delete-icon">
                        <i class="fa fa-trash"></i>
                    </div>
                </div>
                <input type="file" id="category_image" name="category_image" accept="image/*" style="display: none;">
                @error('category_image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <h5 class="mt-4">SEO Metadata</h5>
            <div class="mb-3">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control" placeholder="Enter meta title" value="{{ old('meta_title') }}">
                @error('meta_title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control" placeholder="Enter keywords (comma separated)" value="{{ old('meta_keywords') }}">
                @error('meta_keywords')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3"
                    placeholder="Enter meta description">{{ old('meta_description') }}</textarea>
                @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Category</button>
        </form>
    </div>

@endsection