<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//Unknow
class CustomAuthController extends Controller
{
    public function showFormLogin()
    {
        return view('login');
    }

    public function submitlogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }

        return redirect("login");
    }

    public function showFormRegistration()
    {
        return view('registration');
    }

    public function submitRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required:unique|min:6',
            'password' => 'required|min:4',
            'password-confirm' => 'required|min:4|same:password',
        ]);

        $data = $request->all();
        $this->create($data);
        return redirect()->route('login')->with('Success','Signup Success');
    }

    
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('home');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Auth::logout();
        return redirect('login');
    }

    public function listUser(){
        $users = DB::table('users')->paginate(5);
        return view('listUser', compact('users'));
    }
}