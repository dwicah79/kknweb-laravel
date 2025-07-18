<?php

use App\Models\Speech;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PKKController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpeechController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\CKEditorCOntroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\YouthorganizationController;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/PKK-organization', [PKKController::class, 'index'])->name('pkk.index');
    Route::get('/PKK-organization/create', [PKKController::class, 'create'])->name('pkk.create');
    Route::post('/PKK-organization/create', [PKKController::class, 'store'])->name('pkk.store');
    Route::get('/PKK-organization/{id}/edit', [PKKController::class, 'edit'])->name('pkk.edit');
    Route::put('/PKK-organization/{id}', [PKKController::class, 'update'])->name('pkk.update');
    Route::delete('/PKK-organization/{id}', [PKKController::class, 'destroy'])->name('pkk.destroy');

    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:Pengurus-UMKM|Super-Admin'])->group(function () {
    Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
    Route::get('/umkm/create', [UmkmController::class, 'create'])->name('umkm.create');
    Route::post('/umkm/create', [UmkmController::class, 'store'])->name('umkm.store');
    // Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
    Route::delete('/umkm/{id}', [UmkmController::class, 'destroy'])->name('umkm.destroy');
    Route::get('/umkm/{id}/edit', [UmkmController::class, 'edit'])->name('umkm.edit');
    Route::put('/umkm/{id}', [UmkmController::class, 'update'])->name('umkm.update');
});

Route::middleware(['auth', 'role:Super-Admin|Pengurus-Desa'])->group(function () {
    Route::get('/village', [VillageController::class, 'index'])->name('village.index');
    Route::get('/village/create', [VillageController::class, 'create'])->name('village.create');
    Route::post('/village/create', [VillageController::class, 'store'])->name('village.store');
    Route::get('/village/{id}/edit', [VillageController::class, 'edit'])->name('village.edit');
    Route::put('/village/{id}', [VillageController::class, 'update'])->name('village.update');
    Route::delete('/village/{id}', [VillageController::class, 'destroy'])->name('village.destroy');
});

Route::middleware(['auth', 'role:Super-Admin|Pengurus-Pemuda'])->group(function () {
    Route::get('/youth-organization', [YouthorganizationController::class, 'index'])->name('youth-organization.index');
    Route::get('/youth-organization/create', [YouthorganizationController::class, 'create'])->name('youth-organization.create');
    Route::post('/youth-organization/create', [YouthorganizationController::class, 'store'])->name('youth-organization.store');
    Route::get('/youth-organization/{id}/edit', [YouthorganizationController::class, 'edit'])->name('youth-organization.edit');
    Route::put('/youth-organization/{id}', [YouthorganizationController::class, 'update'])->name('youth-organization.update');
    Route::delete('/youth-organization/{id}', [YouthorganizationController::class, 'destroy'])->name('youth-organization.destroy');
});

Route::middleware(['auth', 'role:Super-Admin'])->group(function () {
    Route::get('/user-management', [UserController::class, 'index'])->name('user.index');
    Route::get('/user-management/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user-management/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user-management/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user-management/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user-management/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/speechmanagement', [SpeechController::class, 'index'])->name('speech.index');
    Route::get('/speechmanagement/create', [SpeechController::class, 'create'])->name('speech.create');
    Route::post('/speechmanagement/create', [SpeechController::class, 'store'])->name('speech.store');
    Route::get('/speechmanagement/{id}/edit', [SpeechController::class, 'edit'])->name('speech.edit');
    Route::put('/speechmanagement/{id}', [SpeechController::class, 'update'])->name('speech.update');
    Route::delete('/speechmanagement/{id}', [SpeechController::class, 'destroy'])->name('speech.destroy');
});

Route::middleware(['auth', 'role:Super-Admin|Pengurus-Desa|Pengurus-Pemuda|Pengurus-PKK'])->group(function () {
    Route::get('/about-website', [AboutusController::class, 'index'])->name('about.index');
    Route::get('/about-website/create-slider', [AboutusController::class, 'createslider'])->name('about.slider.create');
    Route::post('/about-website/create-slider', [AboutusController::class, 'sliderstore'])->name('about.slider.store');
    Route::get('/about-website/{id}/edit-slider', [AboutusController::class, 'editslider'])->name('about.slider.edit');
    Route::put('/about-website/{id}/edit-slider', [AboutusController::class, 'updateslider'])->name('about.slider.update');
    Route::delete('/about-website/{id}', [AboutusController::class, 'destroyslider'])->name('about.slider.destroy');

    Route::get('/management-gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/management-gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/management-gallery/create', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/management-gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/management-gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/management-gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

//main page

Route::get(('/'), [HomeController::class, 'index'])->name('home.index');
Route::get('/guestnews', [HomeController::class, 'newsindex'])->name('home.news.index');
Route::get('/guestnews/{id}', [HomeController::class, 'newsdetile'])->name('home.news.detile');
Route::get('/guestumkm', [HomeController::class, 'umkmindex'])->name('home.umkm.index');
Route::get('/guestumkm/{id}', [HomeController::class, 'umkmdetile'])->name('home.umkm.detile');
Route::get('/guestyouth', [HomeController::class, 'youthindex'])->name('home.youth.index');
Route::get('/guestgallery', [HomeController::class, 'galleryindex'])->name('home.gallery.index');
Route::get('/guestpkk', [HomeController::class, 'pkkindex'])->name('home.pkk.index');
Route::get('/loading', function () {
    return view('loading');
});



