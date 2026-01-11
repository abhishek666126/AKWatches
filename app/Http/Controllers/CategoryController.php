<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createcategoryShow()
    {
        return view('backend.category.create-category');
    }


    public function createcategorystore(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
            'category_description' => 'nullable|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string|max:500',
        ]);
        $originalName = null;
        if ($request->hasFile('category_image')) {
            $originalName = time() . '_' . $request->category_image->getClientOriginalName();
            $request->category_image->move(public_path('backend/images/categories'), $originalName);
        }
        $slug = Str::slug($request->category_name);
        $count = Category::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        Category::create([
            'category_name' => $request->category_name,
            'slug' => $slug,
            'category_description' => $request->category_description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'category_image' => $originalName,
            'status' => 1,
        ]);

        return redirect()->route('categorylist')->with('success', 'Category added successfully!');
    }


    public function categorylist(Request $request)
    {
        $categories = Category::latest()->get();
        if ($request->is('api/*')) {
            return response()->json([
                'status' => true,
                'data' => $categories
            ]);
        }

        return view('backend.category.category-list', compact('categories'));
    }

    public function categorydestroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        if ($category->category_image) {
            $imagePath = public_path('backend/images/categories/' . $category->category_image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
    public function categorytoggleStatus($id)
    {
        $category = Category::find($id);
        $category->status = !$category->status;
        $category->save();

        return redirect()->back()->with('success', 'Category status updated successfully!');
    }

    public function categoryeditShow($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
        return view('backend.category.edit-category', compact('category'));
    }
    // public function categoryeditStore(Request $request, $id)
    // {
    //     $category = Category::find($id);
    //     $request->validate([
    //         'category_name' => 'required|string|max:255|unique:category,category_name,' . $id,
    //         'category_description' => 'nullable|string',
    //         'category_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
    //         'meta_title' => 'required|string|max:255',
    //         'meta_keywords' => 'required|string|max:255',
    //         'meta_description' => 'required|string|max:500',
    //     ]);
    //     $originalName = $category->category_image;
    //     if ($request->hasFile('category_image')) {
    //         if ($category->category_image && file_exists(public_path('backend/images/categories/' . $category->category_image))) {
    //             unlink(public_path('backend/images/categories/' . $category->category_image));
    //         }

    //         $originalName = $request->category_image->getClientOriginalName();
    //         $request->category_image->move(public_path('backend/images/categories'), $originalName);
    //     }
    //     $category->update([
    //         'category_name' => $request->input('category_name'),
    //         'category_description' => $request->input('category_description'),
    //         'meta_title' => $request->input('meta_title'),
    //         'meta_keywords' => $request->input('meta_keywords'),
    //         'meta_description' => $request->input('meta_description'),
    //         'category_image' => $originalName,
    //     ]);

    //     return redirect()->route('categorylist')->with('success', 'Category updated successfully!');
    // }

    public function categoryeditStore(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name,' . $id,
            'category_description' => 'nullable|string',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string|max:500',
        ]);
        $originalName = $category->category_image;
        if ($request->hasFile('category_image')) {
            if (
                $category->category_image &&
                file_exists(public_path('backend/images/categories/' . $category->category_image))
            ) {
                unlink(public_path('backend/images/categories/' . $category->category_image));
            }

            $originalName = time() . '_' . $request->category_image->getClientOriginalName();
            $request->category_image->move(public_path('backend/images/categories'), $originalName);
        }
        $slug = $category->slug;
        if ($request->category_name !== $category->category_name) {
            $baseSlug = Str::slug($request->category_name);

            $count = Category::where('slug', 'LIKE', "{$baseSlug}%")
                ->where('id', '!=', $id)
                ->count();

            $slug = $count > 0 ? $baseSlug . '-' . ($count + 1) : $baseSlug;
        }
        $category->update([
            'category_name' => $request->category_name,
            'slug' => $slug,
            'category_description' => $request->category_description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'category_image' => $originalName,
        ]);

        return redirect()->route('categorylist')->with('success', 'Category updated successfully!');
    }

}
