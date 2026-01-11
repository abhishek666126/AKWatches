<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session()->get('wishlist', []);
        $wishlistItems = [];

        foreach ($wishlist as $id) {
            $product = Products::find($id);
            if ($product) {
                $wishlistItems[] = [
                    'id' => $product->id,
                    'name' => $product->title,
                    'price' => $product->price,
                    'image' => is_array($product->images) ? $product->images[0] : $product->images,
                    'description' => $product->description ?? '',
                ];
            }
        }

        return view('frontend.wishlist', compact('wishlistItems'));
    }

    public function add($id)
    {
        $product = Products::find($id);
        
        if (!$product) {
            return back()->with('error', 'Product not found!');
        }

        $wishlist = session()->get('wishlist', []);

        if (!in_array($id, $wishlist)) {
            $wishlist[] = $id;
            session()->put('wishlist', $wishlist);
            return back()->with('success', 'Product added to wishlist!');
        }

        return back()->with('info', 'Product already in wishlist!');
    }

    public function remove($id)
    {
        $wishlist = session()->get('wishlist', []);
        $wishlist = array_values(array_diff($wishlist, [$id]));
        session()->put('wishlist', $wishlist);

        return back()->with('success', 'Product removed from wishlist!');
    }

    public function toggle($id)
    {
        $wishlist = session()->get('wishlist', []);

        if (in_array($id, $wishlist)) {
            return $this->remove($id);
        } else {
            return $this->add($id);
        }
    }
}

