<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\VoucherController; 
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

// Product
Route::get('listproduct', [ProductController::class, 'listProduct'])->name('listproduct');
Route::get('addproduct', [ProductController::class, 'registrationProduct'])->name('addproduct');
Route::post('customproduct', [ProductController::class, 'customProduct'])->name('registerproduct.custom');
Route::get('getdataedt/id{id}', [ProductController::class, 'getDataEdit'])->name('getdataedt');
Route::post('editproduct', [ProductController::class, 'updateProduct'])->name('editproduct');
Route::get('deleteproduct/id{id}', [ProductController::class, 'deleteProduct'])->name('deleteproduct');
//--------------


// Voucher
Route::get('searchproduct', [ProductController::class, 'searchProduct'])->name('searchproduct');
Route::get('addvoucher', [VoucherController::class, 'addVoucher'])->name('addvoucher');
Route::post('customvoucher', [VoucherController::class, 'customVoucher'])->name('customvoucher.custom');
Route::get('listvoucher', [VoucherController::class, 'listVoucher'])->name('listvoucher');
Route::get('getdataedtvoucher/id{id}', [VoucherController::class, 'getDataEditVoucher'])->name('getdataedtvoucher');
Route::post('editvoucher', [VoucherController::class, 'updateVoucher'])->name('editvoucher');
Route::get('deletevoucher/id{id}', [VoucherController::class, 'deleteVoucher'])->name('deletevoucher');
Route::get('searchvoucher', [VoucherController::class, 'searchVoucher'])->name('searchvoucher');
//---------

// Category
Route::get('/{shop}',[CategoryController::class, 'index'])->name('shop');
Route::get('/{home}',[CategoryController::class, 'index'])->name('home');
//-----------














// Layout
Route::get('/detail', FUNCTION () {
    return view('detail');
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
Route::get('/', function () {
    return view('home');
});

Route::get('/test', FUNCTION () {
    return view('test');
});

//-------------


// Login, logout, registration
Route::get('login', [CustomAuthController::class, 'showFormLogin'])->name('login');
Route::post('submit-login', [CustomAuthController::class, 'submitLogin'])->name('submit-login');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('registration', [CustomAuthController::class, 'showFormRegistration'])->name('registration');
Route::post('submit-registration', [CustomAuthController::class, 'submitRegistration'])->name('submit-registration');

//-------------
