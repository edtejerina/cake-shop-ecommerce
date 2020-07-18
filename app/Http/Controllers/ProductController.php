<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::all();
        return compact('categories', 'products');
    }
    public function indexAdmin(){
        $categories = Category::all();
        $products = Product::all();
        return view('admin.products', compact('categories', 'products'));
    }
    public function home(){
        $categories = Category::all();
        $products = Product::all();
        return view('home', compact('categories', 'products'));
    }

    public function store(Request $req){
        $product = new Product();

        $imgUrl = basename($req->file('image')->store('public/products_img'));
        $img = basename($imgUrl);

        $productUrl = preg_replace('/\s+/', '-',$req['name']);

        $product->name = $req['name'];
        $product->description = $req['description'];
        $product->price = $req['price'];
        $product->stock = $req['stock'];
        if($req['category'] == 0){
            $product->category_id = null;
        }else{
            $product->category_id = $req['category'];
        }
        $product->url = $productUrl;
        $product->img_url = $img;

        $product->save();
        return redirect()->route('admin.products');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('admin.products');
    }

}
