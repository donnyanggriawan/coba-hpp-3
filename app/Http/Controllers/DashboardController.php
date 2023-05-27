<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $data = [
            'title' => 'Home',
            'user' => $user
        ];

        return view('dashboard.dashboard', $data);
    }

    public function halamanAdmin()
    {
        $data = [
            'title' => 'Halaman Admin'
        ];

        return view('dashboard.admin', $data);
    }

    public function halamanUser()
    {
        $data = [
            'title' => 'Halaman User'
        ];

        return view('dashboard.user', $data);
    }
}
