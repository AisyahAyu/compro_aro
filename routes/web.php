<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LegalityController;
use App\Http\Controllers\Admin\WorkProcessController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\FooterController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [HomeController::class, 'products'])->name('products.page');
Route::get('/produk/detail/{index}', [HomeController::class, 'productDetail'])->whereNumber('index')->name('products.detail');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq.page');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('banners', BannerController::class);
    Route::resource('company-profiles', CompanyProfileController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('legalities', LegalityController::class);
    Route::resource('work-processes', WorkProcessController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('products', ProductController::class);
    Route::resource('platforms', PlatformController::class);
    Route::resource('footers', FooterController::class);
    
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
