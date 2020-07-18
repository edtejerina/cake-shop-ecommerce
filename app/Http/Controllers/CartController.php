<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addToCart($id){
        $product = Product::find($id);
    
        if(!$product){
            abort(404);
        }

        $cart = session()->get('cart');
    
        // Si esta vacio, es el primer producto
        if(!$cart) {    
            $cart = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "img_url" => $product->img_url
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Producto agregado!');
            }
    
        // Si el producto ya esta en el carrito, lo incrementa en cantidad
        if(isset($cart[$id])) {
            if($cart[$id]['quantity'] >= $product->stock){
                return redirect()->back()->with('success', 'Sin stock!');
            }else{
                $cart[$id]['quantity']++;
            }
            session()->put('cart', $cart);
            return redirect()->back();
        }
        // Si no exite previamente en el carrito, por defecto la cantidad es 1
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "img_url" => $product->img_url
        ];
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function reduce($id){
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            if($cart[$id]['quantity'] > 1){
                $cart[$id]['quantity']--;
            }
            session()->put('cart', $cart);

            return redirect()->back();

        }
    }

    public function remove($id){

    }

}
