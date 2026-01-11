<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class HomeController extends Controller
{
    public function home(){
        $categories = Category::where('status', 1)->get();
        $products = Products::where('status',1)->get();
        return view('frontend.home',compact('categories','products'));
    }
    public function categories(){
        return view('frontend.categories');
    }
}
