<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/categories',[HomeController::class,'categories'])->name('categories');

Route::get('/products', function () {
    $query = request('q');
    $allProducts = [
        ['id' => 1, 'name' => 'Classic Leather Watch', 'price' => 199, 'category' => 'watches', 'image' => 'https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?q=80&w=1200&auto=format&fit=crop'],
        ['id' => 2, 'name' => 'Digital Sport Watch', 'price' => 99, 'category' => 'watches', 'image' => 'https://images.unsplash.com/photo-1524805444758-089113d48a6d?q=80&w=1200&auto=format&fit=crop'],
        ['id' => 3, 'name' => 'Modern Wall Clock', 'price' => 59, 'category' => 'clocks', 'image' => 'https://images.unsplash.com/photo-1521170813716-0b4a9c4f1056?q=80&w=1200&auto=format&fit=crop'],
        ['id' => 4, 'name' => 'Aviator Sunglasses', 'price' => 79, 'category' => 'googles', 'image' => 'https://images.unsplash.com/photo-1518544801976-3e188ea27043?q=80&w=1200&auto=format&fit=crop'],
        ['id' => 5, 'name' => 'Leather Belt', 'price' => 39, 'category' => 'belt', 'image' => 'https://images.unsplash.com/photo-1616002852419-c70c8c159c40?q=80&w=1200&auto=format&fit=crop'],
        ['id' => 6, 'name' => 'Classic Purse', 'price' => 89, 'category' => 'purse', 'image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?q=80&w=1200&auto=format&fit=crop'],
    ];

    $products = collect($allProducts)
        ->when($query, function ($c) use ($query) {
            return $c->filter(function ($p) use ($query) {
                return str_contains(strtolower($p['name']), strtolower($query));
            });
        })
        ->values()
        ->all();

    return view('products.index', compact('products', 'query'));
})->name('products.index');

Route::get('/products/{id}', function ($id) {
    $product = collect([
        1 => ['id' => 1, 'name' => 'Classic Leather Watch', 'price' => 199, 'category' => 'watches', 'image' => 'https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?q=80&w=1200&auto=format&fit=crop', 'description' => 'Elegant leather strap with minimalist dial.'],
        2 => ['id' => 2, 'name' => 'Digital Sport Watch', 'price' => 99, 'category' => 'watches', 'image' => 'https://images.unsplash.com/photo-1524805444758-089113d48a6d?q=80&w=1200&auto=format&fit=crop', 'description' => 'Durable, water-resistant, and perfect for workouts.'],
        3 => ['id' => 3, 'name' => 'Modern Wall Clock', 'price' => 59, 'category' => 'clocks', 'image' => 'https://images.unsplash.com/photo-1521170813716-0b4a9c4f1056?q=80&w=1200&auto=format&fit=crop', 'description' => 'Silent sweep movement with modern style.'],
        4 => ['id' => 4, 'name' => 'Aviator Sunglasses', 'price' => 79, 'category' => 'googles', 'image' => 'https://images.unsplash.com/photo-1518544801976-3e188ea27043?q=80&w=1200&auto=format&fit=crop', 'description' => 'Classic aviator frames with UV protection.'],
        5 => ['id' => 5, 'name' => 'Leather Belt', 'price' => 39, 'category' => 'belt', 'image' => 'https://images.unsplash.com/photo-1616002852419-c70c8c159c40?q=80&w=1200&auto=format&fit=crop', 'description' => 'Full-grain leather with matte buckle.'],
        6 => ['id' => 6, 'name' => 'Classic Purse', 'price' => 89, 'category' => 'purse', 'image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?q=80&w=1200&auto=format&fit=crop', 'description' => 'Compact design with premium stitching.'],
    ])->get((int) $id);

    abort_unless($product, 404);
    return view('products.show', compact('product'));
})->name('products.show');

Route::get('/cart', function () {
    $cartItems = [];
    return view('cart', compact('cartItems'));
})->name('cart');
