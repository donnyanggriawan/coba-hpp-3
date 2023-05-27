<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function auth(Request $request)
    {
        $credentials =$request -> validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect('/dashboard');
            }
            if ($user->level == 'user') {
                return redirect('/dashboard');
            }
        }

        return back()->with('loginError','Username & Password not match');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/')->with('logout','Logout Success');
    }
}
