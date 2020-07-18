<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexAdmin(){
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $req){
        $category = new Category();
        $category->name = $req['name'];
        $category->save();
        return redirect()->route('admin.categories');
    }

    public function destroy(Category $category){
        $products = $category->products()->get();
        foreach($products as $product) {
            $product->update(['category_id' => null]);
        };
        $category->delete();
        
        return redirect()->route('admin.categories');
    }
}
