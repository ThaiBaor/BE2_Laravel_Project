<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getAllProducts()
    {
        $products = DB::table('products')->get();
        return view('shop', compact('products'));
    }
}
