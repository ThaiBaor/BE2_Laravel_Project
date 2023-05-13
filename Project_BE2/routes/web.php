<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/test', FUNCTION () {
    return view('test');
});
Route::get('/detail', FUNCTION () {
    return view('detail');
});
Route::get('/shop', FUNCTION () {
    return view('shop');
});
Route::get('/cart', FUNCTION () {
    return view('cart');
});
Route::get('/checkout', FUNCTION () {
    return view('checkout');
});
Route::get('/wishlist', FUNCTION () {
    return view('wishlist');
});