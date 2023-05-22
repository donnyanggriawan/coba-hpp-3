<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('dashboard.dashboard', $data);
    }

    public function halamanAdmin()
    {
        return view('dashboard.admin');
    }

    public function halamanUser()
    {
        return view('dashboard.user');
    }
}
