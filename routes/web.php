<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\CKEditorCOntroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\YouthorganizationController;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
    Route::get('/umkm/create', [UmkmController::class, 'create'])->name('umkm.create');
    Route::post('/umkm/create', [UmkmController::class, 'store'])->name('umkm.store');
    // Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
    Route::delete('/umkm/{id}', [UmkmController::class, 'destroy'])->name('umkm.destroy');
    Route::get('/umkm/{id}/edit', [UmkmController::class, 'edit'])->name('umkm.edit');
    Route::put('/umkm/{id}', [UmkmController::class, 'update'])->name('umkm.update');

    Route::get('/village-organization', [VillageController::class, 'index'])->name('village.index');
    Route::get('/village-organization/create', [VillageController::class, 'create'])->name('village.create');
    Route::post('/village-organization/create', [VillageController::class, 'store'])->name('village.store');
    Route::get('/village-organization/{id}/edit', [VillageController::class, 'edit'])->name('village.edit');
    Route::put('/village-organization/{id}', [VillageController::class, 'update'])->name('village.update');
    Route::delete('/village-organization/{id}', [VillageController::class, 'destroy'])->name('village.destroy');
    Route::get('/youth-organization', [YouthorganizationController::class, 'index'])->name('youth-organization.index');
    Route::get('/youth-organization/create', [YouthorganizationController::class, 'create'])->name('youth-organization.create');
    Route::post('/youth-organization/create', [YouthorganizationController::class, 'store'])->name('youth-organization.store');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



