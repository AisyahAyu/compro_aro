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
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobVacancyController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\Admin\AktivitasController as AdminAktivitasController;
use App\Http\Controllers\Admin\JobApplicationController as AdminJobApplicationController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aktivitas', [AktivitasController::class, 'index'])->name('aktivitas');
Route::get('/aktivitas/{id}', [AktivitasController::class, 'show'])->name('detail-aktivitas');
Route::get('/Career', [CareerController::class, 'index'])->name('career');
Route::post('/apply', [JobApplicationController::class, 'store'])->name('apply');

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
    Route::resource('aktivitas', AdminAktivitasController::class);
    Route::resource('job_categories', JobCategoryController::class);
    Route::resource('job_vacancies', JobVacancyController::class);
    Route::resource('benefits', BenefitController::class);
    Route::resource('applications', AdminJobApplicationController::class);

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
