<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UmkmController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', [DashboardController::class, 'index']);

Route::view('/dashboard', 'dashboard.index')->name('dashboard');
// Route::view('/umkm', 'dashboard.umkm.index')->name('dashboard');
Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
Route::get('/umkm/create', [UmkmController::class, 'create'])->name('umkm.create');


Route::view('/login', 'auth.login')->name('login');
