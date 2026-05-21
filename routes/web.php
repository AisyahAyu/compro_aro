<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AktivitasController as FrontendAktivitasController;

// Admin Controllers
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LegalityController;
use App\Http\Controllers\Admin\WorkProcessController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ContactSectionController;
use App\Http\Controllers\Admin\AktivitasController as AdminAktivitasController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\UpcomingEventController;


// ======================
// FRONTEND
// ======================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [HomeController::class, 'products'])->name('products.page');
Route::get('/product', [HomeController::class, 'products'])->name('product.page');
Route::get('/produk/detail/{index}', [HomeController::class, 'productDetail'])->whereNumber('index')->name('products.detail');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq.page');
Route::get('/hubungi-kami', [HomeController::class, 'contact'])->name('contact.page');
Route::post('/hubungi-kami', [HomeController::class, 'submitContact'])->name('contact.submit');
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about.index');
Route::get('/tentang-kami/visi-misi', [AboutController::class, 'visiMisi'])->name('about.visi-misi');
Route::get('/tentang-kami/tim-kami', [AboutController::class, 'team'])->name('about.team');
Route::get('/tentang-kami/mitra-teknologi', [AboutController::class, 'partners'])->name('about.partners');
Route::get('/tentang-kami/brand', [AboutController::class, 'brands'])->name('about.brands');
Route::get('/tentang-kami/legality', [AboutController::class, 'legality'])->name('about.legality');
Route::get('/tentang-kami/proses-kerja', [AboutController::class, 'workProcess'])->name('about.work-process');
Route::get('/kategori/{slug}', [HomeController::class, 'categoryProducts'])->name('category.products');
Route::get('/platform/{slug}', [HomeController::class, 'platformProducts'])->name('platform.products');
Route::get('/search', [HomeController::class, 'search'])->name('products.search');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [HomeController::class, 'robots'])->name('robots');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-of-service', [HomeController::class, 'termsOfService'])->name('terms-of-service');
Route::get('/aktivitas', [FrontendAktivitasController::class, 'index'])->name('aktivitas');
Route::get('/aktivitas/{id}', [FrontendAktivitasController::class, 'show'])->whereNumber('id')->name('detail-aktivitas');
Route::get('/solusi', [HomeController::class, 'solusi'])->name('solusi.page');

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
    Route::resource('platforms', PlatformController::class);
    Route::resource('footers', FooterController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('statistics', StatisticsController::class);
    Route::resource('visi-misi', VisiMisiController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('aktivitas', AdminAktivitasController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('upcoming_event', UpcomingEventController::class);

    // ======================
    // CONTACT SECTION (SINGLE)
    // ======================
    Route::get('contact-section', [ContactSectionController::class, 'index'])->name('contact-section.index');
    Route::post('contact-section/update', [ContactSectionController::class, 'update'])->name('contact-section.update');

});
