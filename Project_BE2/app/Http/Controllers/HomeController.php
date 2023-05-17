<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function goHome()
    {
        return view('home');
    }
    public function goShop()
    {
        return view('shop');
    }
    public function goShopByCategory()
    {
        return view('shopbycategory');
    }
}
