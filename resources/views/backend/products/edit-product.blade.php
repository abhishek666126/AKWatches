@extends('backend.layout.main')
@section('title', 'Edit Product')
@section('heading', 'Edit Product')

@section('main.content')
    <div class="container mt-4">
        <h3>Edit Product</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- <div class="mb-3">
                <label>Select Category</label>
                <select name="category_id" class="form-control">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
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
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand', $product->brand) }}">
                    @error('brand')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Product Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $product->title) }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $product->slug) }}">
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label>Short Description</label>
                <textarea name="short_description" class="form-control"
                    rows="2">{{ old('short_description', $product->short_description) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Full Description</label>
                <textarea name="description" class="form-control"
                    rows="4">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Price (₹)</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                </div>

                <div class="col-md-3 mb-3">
                    <label>Discount Price (₹)</label>
                    <input type="number" name="discount_price" class="form-control"
                        value="{{ old('discount_price', $product->discount_price) }}">
                </div>

                <div class="col-md-3 mb-3">
                    <label>Stock Quantity</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
                </div>

                <div class="col-md-3 mb-3">
                    <label>GST %</label>
                    <select name="gst_type" class="form-control">
                        <option value="">Select GST</option>
                        <option value="5%" {{ $product->gst_type == '5%' ? 'selected' : '' }}>5%</option>
                        <option value="12%" {{ $product->gst_type == '12%' ? 'selected' : '' }}>12%</option>
                        <option value="18%" {{ $product->gst_type == '18%' ? 'selected' : '' }}>18%</option>
                        <option value="28%" {{ $product->gst_type == '28%' ? 'selected' : '' }}>28%</option>
                    </select>
                </div>
            </div>

            <hr>
            <h5>Product Variants</h5>
            <div id="variant-container">
                @if(!empty($product->variants))
                    @foreach($product->variants as $index => $variant)
                        <div class="row variant-item mb-2">
                            <div class="col-md-2">
                                <input type="text" name="variant_color[]" class="form-control" value="{{ $variant['color'] ?? '' }}"
                                    placeholder="Color">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="variant_size[]" class="form-control" value="{{ $variant['size'] ?? '' }}"
                                    placeholder="Size">
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="variant_gender[]" class="form-control"
                                    value="{{ $variant['gender'] ?? '' }}" placeholder="Gender">
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="variant_price[]" class="form-control"
                                    value="{{ $variant['price'] ?? '' }}" placeholder="Price">
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="variant_stock[]" class="form-control"
                                    value="{{ $variant['stock'] ?? '' }}" placeholder="Stock">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger remove-variant w-100">-</button>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="row variant-item mb-2">
                    <div class="col-md-2"><input type="text" name="variant_color[]" class="form-control"
                            placeholder="Color"></div>
                    <div class="col-md-2"><input type="text" name="variant_size[]" class="form-control" placeholder="Size">
                    </div>
                    <div class="col-md-2"><input type="text" name="variant_gender[]" class="form-control"
                            placeholder="Gender"></div>
                    <div class="col-md-2"><input type="number" name="variant_price[]" class="form-control"
                            placeholder="Price"></div>
                    <div class="col-md-2"><input type="number" name="variant_stock[]" class="form-control"
                            placeholder="Stock"></div>
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
                        @if(!empty($product->images))
                            @foreach($product->images as $img)
                                <div class="preview-box existing-media">
                                    <img src="{{ asset('backend/images/products/' . $img) }}" alt="{{ $img }}">
                                    <i class="fa fa-trash delete-icon text-dark"></i>
                                    <input type="hidden" name="old_images[]" value="{{ $img }}">
                                </div>
                            @endforeach
                        @endif

                        <div class="upload-wrapper" id="imageUploadBox">
                            <i class="fa fa-camera"></i>
                        </div>
                    </div>
                    <input type="file" id="imageInput" name="images[]" class="hidden" multiple accept="image/*">
                </div>
            </div>

            <div class="mb-4 row">
                <label class="col-sm-3 text-dark">Product Videos</label>
                <div class="col-md-9">
                    <div class="preview-container" id="videoPreviewContainer">
                        @if(!empty($product->videos))
                            @foreach($product->videos as $vid)
                                <div class="preview-box existing-media">
                                    <video src="{{ asset('backend/videos/products/' . $vid) }}" controls muted></video>
                                    <i class="fa fa-trash delete-icon text-dark"></i>
                                    <input type="hidden" name="old_videos[]" value="{{ $vid }}">
                                </div>
                            @endforeach
                        @endif

                        <div class="upload-wrapper" id="videoUploadBox">
                            <i class="fa fa-video-camera"></i>
                        </div>
                    </div>
                    <input type="file" id="videoInput" name="videos[]" class="hidden" multiple accept="video/*">
                </div>
            </div>

            <hr>
            <h5>SEO Meta Information</h5>
            <div class="mb-3">
                <label>Meta Title</label>
                <input type="text" name="meta_title" class="form-control"
                    value="{{ old('meta_title', $product->meta_title) }}">
            </div>
            <div class="mb-3">
                <label>Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control"
                    value="{{ old('meta_keywords', $product->meta_keywords) }}">
            </div>
            <div class="mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" class="form-control"
                    rows="3">{{ old('meta_description', $product->meta_description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection