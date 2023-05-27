<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.dashboard');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/postlogin', [LoginController::class, 'auth'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel:admin,user']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile' ,[ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update' ,[ProfileController::class, 'update'])->name('profile.update');

    Route::get('/password' ,[ProfileController::class, 'viewPassword'])->name('password');
    Route::put('/password/update' ,[ProfileController::class, 'changePassword'])->name('password.update');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function() {
    Route::get('/admin', [DashboardController::class, 'halamanAdmin'])->name('halamanadmin');
});

Route::group(['middleware' => ['auth', 'ceklevel:user']], function() {
    Route::get('/user', [DashboardController::class, 'halamanUser'])->name('halamanuser');
});
