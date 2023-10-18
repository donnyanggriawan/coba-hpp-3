<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BahanbakuController;
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
    Route::post('/kategori/tambah', [KategoriController::class, 'store'])->name('kategori.tambah');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

    Route::get('/bahanbaku', [BahanbakuController::class, 'index'])->name('bahanbaku');
    Route::get('/bahanbaku/tambah', [BahanbakuController::class, 'create'])->name('bahanbaku.tambah');
    Route::post('/bahanbaku/store', [BahanbakuController::class, 'store'])->name('bahanbaku.store');
    Route::get('/bahanbaku/edit/{id}', [BahanbakuController::class, 'edit'])->name('bahanbaku.edit');
    Route::post('/bahanbaku/update/{id}', [BahanbakuController::class, 'update'])->name('bahanbaku.update');
    Route::delete('/bahanbaku/delete/{id}', [BahanbakuController::class, 'destroy'])->name('bahanbaku.delete');

    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::get('/menu/tambah', [MenuController::class, 'create'])->name('menu.tambah');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/delete', [MenuController::class, 'destroy'])->name('menu.delete');
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function() {
    Route::get('/admin', [DashboardController::class, 'halamanAdmin'])->name('halamanadmin');
});

Route::group(['middleware' => ['auth', 'ceklevel:user']], function() {
    Route::get('/user', [DashboardController::class, 'halamanUser'])->name('halamanuser');
});
