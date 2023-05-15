<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();

class AdminController extends Controller
{
    public function checkAuth(){
        $account = Session::get('account');
        if ($account){
            return redirect('admin.dashboard');
        }
        else{
            return redirect('admin.adminlogin');
        }
    }
    public function index()
    {
        return view('admin.adminlogin');
    }
    public function dashboard(Request $request)
    {
        $account = $request->account;
        $password = $request->password;

        $result = DB::table('admin')->where('account',$account)->where('password',$password);
        if ($result){
            Session::put('account',$result->account);
            return redirect('admin.dashboard');
        }
        else{
            return redirect('admin.adminlogin');
        }
    }
}
