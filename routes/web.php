<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','LandingPageController@index');
Route::get('/shop','ShopController@index')->name('shop.index');
Route::post('/shop','ShopController@search')->name('shop.search');
Route::get('/shop/{product}','ShopController@show')->name('shop.show');
Route::get('/cart', function(){
    return view('cart');
});
Route::get('/cart/add/{id}', 'CartController@addToCart')->name('cart.addtocart');
Route::get('/cart/reduce/{id}', 'CartController@reduce')->name('cart.reduce');

Route::get('/admin/home', 'AdminController@dashboard')->name('admin');
Route::get('/admin/products', 'ProductController@indexAdmin')->name('admin.products');
Route::get('/admin/categories', 'CategoryController@indexAdmin')->name('admin.categories');

Route::post('/admin/products','ProductController@store')->name('products.store');
Route::delete('admin/products/{product}', 'ProductController@destroy')->name('products.destroy');
Route::post('/admin/categories','CategoryController@store')->name('categories.store');
Route::delete('/admin/categories/{category}','CategoryController@destroy')->name('categories.destroy');