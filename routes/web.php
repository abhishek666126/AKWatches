<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Models\Products;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('categories',[HomeController::class,'categories'])->name('categories');
Route::post('newsletter/store', [MailController::class, 'sendmail'])->name('newsletter.store');

// Products Routes
Route::get('/products', function () {
    $query = request('q');
    $category = request('category');
    
    $productsQuery = Products::where('status', 1)->with('category');
    
    if ($query) {
        $productsQuery->where(function($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%')
              ->orWhere('description', 'like', '%' . $query . '%')
              ->orWhere('brand', 'like', '%' . $query . '%');
        });
    }
    
    if ($category) {
        $productsQuery->whereHas('category', function($q) use ($category) {
            $q->where('category_name', 'like', '%' . $category . '%');
        });
    }
    
    $products = $productsQuery->latest()->get()->map(function($product) {
        return [
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'category' => $product->category->category_name ?? 'Uncategorized',
            'image' => asset('backend/images/products/' . (is_array($product->images) ? $product->images[0] : $product->images)),
            'description' => $product->description ?? '',
        ];
    });

    return view('frontend.products.index', compact('products', 'query', 'category'));
})->name('products.index');

Route::get('/products/{id}', function ($id) {
    $product = Products::with('category')->find($id);
    
    abort_unless($product, 404);
    
    $productData = [
        'id' => $product->id,
        'name' => $product->title,
        'price' => $product->price,
        'category' => $product->category->category_name ?? 'Uncategorized',
        'image' => asset('backend/images/products/' . (is_array($product->images) ? $product->images[0] : $product->images)),
        'images' => is_array($product->images) ? $product->images : [$product->images],
        'description' => $product->description ?? 'No description available.',
    ];
    
    return view('frontend.products.show', compact('product', 'productData'));
})->name('products.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Wishlist Routes
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::post('/wishlist/toggle/{id}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

// Frontend Pages
Route::get('/about-us', function () {
    return view('frontend.about-us');
})->name('about-us');

Route::get('/contact-us', function () {
    return view('frontend.contact-us');
})->name('contact-us');

Route::post('/contact-us', [MailController::class, 'contact'])->name('contact.store');

Route::get('/checkout', function () {
    return view('frontend.checkout');
})->name('checkout');


Route::get('/my-account', function () {
    return view('frontend.my-account');
})->name('my-account');

Route::get('/order-history', function () {
    return view('frontend.order-history');
})->name('order-history');

Route::get('/faq', function () {
    return view('frontend.faq');
})->name('faq');

Route::get('/privacy-policy', function () {
    return view('frontend.privacy-policy');
})->name('privacy-policy');

Route::get('/terms-conditions', function () {
    return view('frontend.terms-conditions');
})->name('terms-conditions');

Route::get('/shipping-returns', function () {
    return view('frontend.shipping-returns');
})->name('shipping-returns');

Route::get('signup',[BackendController::class,'signupshow'])->name('signup.show');
Route::post('signup', [BackendController::class, 'signupstore'])->name('signup.store');
Route::get('login',[BackendController::class,'loginshow'])->name('login.show');
Route::post('login', [BackendController::class, 'loginstore'])->name('login.store');

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [BackendController::class, 'logout'])->name('logout');
    Route::get('admin/dashboard',[BackendController::class,'dashboard'])->name('dashboard');

    Route::get('admin/productlist', [ProductController::class, 'productlist'])->name('productlist');
    Route::get('admin/products/create', [ProductController::class, 'createproductShow'])->name('products.create');
    Route::post('admin/products/store', [ProductController::class, 'createproductStore'])->name('products.store');
    Route::get('admin/products/edit/{id}', [ProductController::class, 'editproductShow'])->name('products.edit');
    Route::post('admin/products/edit/{id}', [ProductController::class, 'editproductStore'])->name('products.update');
    Route::get('admin/products/status/{id}', [ProductController::class, 'producttoggleStatus'])->name('products.toggle');
    Route::get('admin/products/delete/{id}', [ProductController::class, 'productdestroy'])->name('products.destroy');

    Route::get('admin/categorylist', [CategoryController::class, 'categorylist'])->name('categorylist');
    Route::get('admin/category/create', [CategoryController::class, 'createcategoryShow'])->name('category.create');
    Route::post('admin/category/create', [CategoryController::class, 'createcategorystore'])->name('category.store');
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'categoryeditShow'])->name('category.edit');
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'categoryeditStore'])->name('category.editstore');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'categorydestroy'])->name('category.destroy');
    Route::get('admin/category/status/{id}', [CategoryController::class, 'categorytoggleStatus'])->name('category.toggle');
});