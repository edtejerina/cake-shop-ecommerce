<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at', 'desc')->paginate(6);
        $categories = Category::all();
        return view('home', compact('products', 'categories'));
    }
}
