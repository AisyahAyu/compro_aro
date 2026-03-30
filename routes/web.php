<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;

// Admin Controllers
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LegalityController;
use App\Http\Controllers\Admin\WorkProcessController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ContactSectionController;


// ======================
// FRONTEND
// ======================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [HomeController::class, 'products'])->name('products.page');
Route::get('/produk/detail/{index}', [HomeController::class, 'productDetail'])->whereNumber('index')->name('products.detail');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq.page');
Route::get('/hubungi-kami', [HomeController::class, 'contact'])->name('contact.page');
Route::post('/hubungi-kami', [HomeController::class, 'submitContact'])->name('contact.submit');

// ======================
// ADMIN
// ======================
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // ======================
    // CRUD
    // ======================
    Route::resource('banners', BannerController::class);
    Route::resource('company-profiles', CompanyProfileController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('legalities', LegalityController::class);
    Route::resource('work-processes', WorkProcessController::class);
    Route::resource('partners', PartnerController::class); // ✅ MITRA TEKNOLOGI
    Route::resource('products', ProductController::class);
    Route::resource('platforms', PlatformController::class);
    Route::resource('footers', FooterController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('statistics', StatisticsController::class);
    Route::resource('visi-misi', VisiMisiController::class);
    Route::resource('brands', BrandController::class);

    // ======================
    // CONTACT SECTION (SINGLE)
    // ======================
    Route::get('contact-section', [ContactSectionController::class, 'index'])->name('contact-section.index');
    Route::post('contact-section/update', [ContactSectionController::class, 'update'])->name('contact-section.update');

});
