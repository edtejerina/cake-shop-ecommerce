<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        return view('shop', compact('products', 'categories'));
    }

    public function search(Request $req){
        $categories = Category::all();
        if($req['category'] == 'todos'){
            $products = Product::all();
            $categorySelect = 'Todos';
        }elseif($req['category'] == 'otros'){
            $products = Product::Where('category_id', '=', null)->get();
            $categorySelect = 'Otros';
        }
        else{
            $products = Product::where('category_id', '=', $req['category'])->get();
            $categorySelect = Category::find($req['category'])->name;
        }
        return view('shop', compact('categories', 'products', 'categorySelect'));
    }
    public function show(Product $product){
        $relatedProducts = Product::where('category_id', '=', $product->category_id)->get();
        return view('product', compact('product', 'relatedProducts'));
    }
}
