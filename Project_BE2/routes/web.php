<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopByCategoryController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LangController;

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
Route::get('searchproduct', [ProductController::class, 'searchProduct'])->name('searchproduct');
Route::get('searchproductuser', [ProductController::class, 'searchProductUser'])->name('searchproductuser');
//--------------


// Voucher
Route::get('addvoucher', [VoucherController::class, 'addVoucher'])->name('addvoucher');
Route::post('customvoucher', [VoucherController::class, 'customVoucher'])->name('customvoucher.custom');
Route::get('listvoucher', [VoucherController::class, 'listVoucher'])->name('listvoucher');
Route::get('getdataedtvoucher/id{id}', [VoucherController::class, 'getDataEditVoucher'])->name('getdataedtvoucher');
Route::post('editvoucher', [VoucherController::class, 'updateVoucher'])->name('editvoucher');
Route::get('deletevoucher/id{id}', [VoucherController::class, 'deleteVoucher'])->name('deletevoucher');
Route::get('searchvoucher', [VoucherController::class, 'searchVoucher'])->name('searchvoucher');
//---------

// Layout fontend
Route::get('/shop',[ShopController::class, 'getAllProducts'])->name('shop');
Route::get('/home',[HomeController::class, 'goHome'])->name('home');
Route::get('/shopbycategory',[ShopByCategoryController::class, 'goShopByCategory'])->name('shopbycategory');

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/wishlist', function () {
    return view('wishlist');
});
Route::get('/', function () {
    return view('home');
});

Route::get('/test', function () {
    return view('test');
});
//-----------




// Category
Route::get('listcategory', [CategoryController::class, 'listCategory'])->name('listcategory');
Route::get('addcategory', [CategoryController::class, 'addCategory'])->name('addcategory');
Route::post('customcategory', [CategoryController::class, 'customCategory'])->name('customcategory.custom');
Route::get('getdataedtcategory/id{id}', [CategoryController::class, 'getDataEditCategory'])->name('getdataedtcategory');
Route::post('editcategory', [CategoryController::class, 'updateCategory'])->name('editcategory');
Route::get('deletecategory/id{id}', [CategoryController::class, 'deleteCategory'])->name('deletecategory');
Route::get('searchcategory', [CategoryController::class, 'searchCategory'])->name('searchcategory');
//---------

// Invoice
Route::get('addinvoice', 'App\Http\Controllers\InvoiceController@addInvoice')->name('addinvoice');
Route::post('custominvoice', 'App\Http\Controllers\InvoiceController@customInvoice')->name('custominvoice.custom');
Route::get('listinvoice', 'App\Http\Controllers\InvoiceController@listInvoice')->name('listinvoice');
Route::get('getdataedtinvoice/id{id}', 'App\Http\Controllers\InvoiceController@getDataEditInvoice')->name('getdataedtinvoice');
Route::post('editinvoice', 'App\Http\Controllers\InvoiceController@updateInvoice')->name('editinvoice');
Route::get('deleteinvoice/id{id}', 'App\Http\Controllers\InvoiceController@deleteInvoice')->name('deleteinvoice');
Route::get('searchinvoice', 'App\Http\Controllers\InvoiceController@searchInvoice')->name('searchinvoice');
//---------



// Login, logout, registration
Route::get('login', [CustomAuthController::class, 'showFormLogin'])->name('login');
Route::post('submit-login', [CustomAuthController::class, 'submitLogin'])->name('submit-login');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('registration', [CustomAuthController::class, 'showFormRegistration'])->name('registration');
Route::post('submit-registration', [CustomAuthController::class, 'submitRegistration'])->name('submit-registration');
//login google
Route::get('/google',[GoogleController::class,'redirect'])->name('google');
Route::get('/callback',[GoogleController::class,'callBackGoogle'])->name('callback');
//login facebook
Route::get('/facebook',[FacebookController::class,'redirect'])->name('facebook');
Route::get('/callback',[FacebookController::class,'callBackFaceBook'])->name('callback');

Route::get('/dashboard', [AdminController::class, 'showDashboard']);
//-----------

// Multilang

Route::get('change-language/{language}', [LangController::class, 'changeLanguage'])->name('change-language');
//---------