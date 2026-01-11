@extends('backend.layout.main')
@section('title', 'Add Product')
@section('heading', 'Add Product')
@section('main.content')
    <div class="container mt-4">
        <h3>Add New Product</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- <div class="mb-3">
                <label>Select Category</label>
                <select name="category_id" class="form-control">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> -->
            <div class="row">
                <div class="col-md-6 mb-3">
                     <label>Select Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
                    @error('brand')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Product Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control" rows="2">{{ old('short_description') }}</textarea>
                @error('short_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Full Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Price (₹)</label>
                    <input type="number" step="1" name="price" class="form-control" value="{{ old('price') }}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="col-md-3 mb-3">
                    <label>Discount Price (₹)</label>
                    <input type="number" step="1" name="discount_price" class="form-control"
                        value="{{ old('discount_price') }}">
                    @error('discount_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label>Stock Quantity</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
                    @error('stock')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label>GST %</label>
                    <select name="gst_type" class="form-control">
                        <option value="">Select GST</option>
                        <option value="5%">5%</option>
                        <option value="12%">12%</option>
                        <option value="18%">18%</option>
                        <option value="28%">28%</option>
                    </select>
                    @error('gst_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <hr>
            <h5>Product Variants</h5>
            <div id="variant-container">
                <div class="row variant-item mb-2">
                    <div class="col-md-2">
                        <select name="variant_color[]" class="form-control">
                            <option value="">Select Color</option>
                            <option>Red</option>
                            <option>Blue</option>
                            <option>Green</option>
                            <option>Black</option>
                            <option>White</option>
                        </select>
                        @error('variant_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <select name="variant_size[]" class="form-control">
                            <option value="">Select Size</option>
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>XL</option>
                        </select>
                        @error('variant_size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <select name="variant_gender[]" class="form-control">
                            <option value="">Select Gender</option>
                            <option>Boys</option>
                            <option>Girls</option>
                            <option>Unisex</option>
                        </select>
                        @error('variant_gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <input type="number" name="variant_price[]" class="form-control" placeholder="Price">
                        @error('variant_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <input type="number" name="variant_stock[]" class="form-control" placeholder="Stock">
                        @error('variant_stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-success add-variant w-100">+</button>
                    </div>
                </div>
            </div>

            <hr>
            <div class="mb-4 row">
                <label class="col-sm-3 text-dark">Product Images</label>
                <div class="col-md-9">
                    <div class="preview-container" id="imagePreviewContainer">
                        <div class="upload-wrapper" id="imageUploadBox">
                            <i class="fa fa-camera"></i>
                        </div>
                    </div>
                    <input type="file" id="imageInput" name="images[]" class="hidden" multiple accept="image/*">
                </div>
                @error('images')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 row">
                <label class="col-sm-3 text-dark">Product Videos</label>
                <div class="col-md-9">
                    <div class="preview-container" id="videoPreviewContainer">
                        <div class="upload-wrapper" id="videoUploadBox">
                            <i class="fa fa-video-camera"></i>
                        </div>
                    </div>
                    <input type="file" id="videoInput" name="videos[]" class="hidden" multiple accept="video/*">
                </div>
                @error('videos')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <hr>
            <h5>SEO Meta Information</h5>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                @error('meta_title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control"  value="{{ old('meta_keywords') }}">
                @error('meta_keywords')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description') }}</textarea>
                @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection