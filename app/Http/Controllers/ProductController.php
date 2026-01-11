<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productlist()
    {
        $products = Products::with('category')->orderBy('id', 'desc')->get();
        return view('backend.products.product-list', compact('products'));
    }

    public function createproductShow()
    {
        $categories = Category::where('status', 1)->get();
        return view('backend.products.create-product', compact('categories'));
    }

    public function createproductStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'videos.*' => 'nullable|mimetypes:video/mp4,video/mpeg,video/quicktime|max:10240',
        ]);

        $variants = [];
        if ($request->variant_color) {
            foreach ($request->variant_color as $key => $color) {
                if (!empty($color) || !empty($request->variant_size[$key]) || !empty($request->variant_gender[$key])) {
                    $variants[] = [
                        'color' => $color,
                        'size' => $request->variant_size[$key] ?? null,
                        'gender' => $request->variant_gender[$key] ?? null,
                        'price' => $request->variant_price[$key] ?? null,
                        'stock' => $request->variant_stock[$key] ?? null,
                    ];
                }
            }
        }

        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $originalName = $image->getClientOriginalName();
                $image->move(public_path('backend/images/products'), $originalName);
                $imageNames[] = $originalName;
            }
        }
        $videoNames = [];
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $originalName = $video->getClientOriginalName();
                $video->move(public_path('backend/videos/products'), $originalName);
                $videoNames[] = $originalName;
            }
        }
        Products::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'brand' => $request->brand,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock,
            'gst_type' => $request->gst_type,
            'variants' => $variants,
            'images' => $imageNames,
            'videos' => $videoNames,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('productlist')->with('success', 'Product added successfully!');
    }

    public function editproductShow($id)
    {
        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        $categories = Category::where('status', 1)->get();
        return view('backend.products.edit-product', compact('product', 'categories'));
    }

    public function editproductStore(Request $request, $id)
    {
        $product = Products::find($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'images.*' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'videos.*' => 'nullable|mimetypes:video/mp4,video/mpeg,video/quicktime|max:10240',
        ]);

        $variants = [];
        if ($request->variant_color) {
            foreach ($request->variant_color as $key => $color) {
                if (!empty($color) || !empty($request->variant_size[$key]) || !empty($request->variant_gender[$key])) {
                    $variants[] = [
                        'color' => $color,
                        'size' => $request->variant_size[$key] ?? null,
                        'gender' => $request->variant_gender[$key] ?? null,
                        'price' => $request->variant_price[$key] ?? null,
                        'stock' => $request->variant_stock[$key] ?? null,
                    ];
                }
            }
        }

        
        $existingImages = is_array($product->images) ? $product->images : json_decode($product->images, true);
        $imageNames = $existingImages ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $originalName = $image->getClientOriginalName();
                $image->move(public_path('backend/images/products'), $originalName);
                $imageNames[] = $originalName;
            }
        }

        
        $existingVideos = is_array($product->videos) ? $product->videos : json_decode($product->videos, true);
        $videoNames = $existingVideos ?? [];

        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $originalName = $video->getClientOriginalName();
                $video->move(public_path('backend/videos/products'), $originalName);
                $videoNames[] = $originalName;
            }
        }

        $product->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'brand' => $request->brand,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock,
            'gst_type' => $request->gst_type,
            'variants' => $variants,
            'images' => $imageNames,
            'videos' => $videoNames,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->route('productlist')->with('success', 'Product updated successfully!');
    }

    public function productdestroy($id)
    {
        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        $product->delete();

        return redirect()->route('productlist')->with('success', 'Product deleted successfully!');
    }

    public function producttoggleStatus($id)
    {
        $product = Products::find($id);
        $product->status = !$product->status;
        $product->save();
        return redirect()->back()->with('success', 'Product status updated successfully.');
    }
}
