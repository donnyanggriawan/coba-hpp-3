<?php

namespace App\Http\Controllers;

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
        //dd($request->all());
        if (Auth::attempt($request->only('username', 'password'))){
            return redirect('/dashboard');
        }
        return redirect('login.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/')->with('loginError','Berhasil Logout!');
    }
}
