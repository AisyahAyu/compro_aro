<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\CompanyProfile;
use App\Models\Category;
use App\Models\Legality;
use App\Models\WorkProcess;
use App\Models\Partner;
use App\Models\Platform;
use App\Models\ProductLink;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Footer;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Faq;
use App\Models\AboutStatistic;

class HomeController extends Controller
{
    private function getFaqData(): array
    {
        return Faq::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->map(function ($faq) {
                return [
                    'question' => $faq->question,
                    'answer' => $faq->answer,
                ];
            })
            ->toArray();
    }


    public function index()
    {
        $banners = Banner::where('is_active', true)
            ->where(function($query) {
                $query->where('page_type', 'home')->orWhereNull('page_type');
            })
            ->orderBy('order')
            ->get();
        $companyProfile = CompanyProfile::first();
        $categories = Category::where('is_active', true)->orderBy('order')->limit(3)->get();
        $legalities = Legality::where('is_active', true)->orderBy('order')->limit(4)->get();
        $workProcesses = WorkProcess::where('is_active', true)->orderBy('step_number')->get();
        $partners = Partner::where('is_active', true)->orderBy('order')->get();
        $platforms = Platform::where('is_active', true)->get();

        // Fetch only the products needed for home page display
        $products = Product::latest()->limit(4)->get();

        // Process platform URL safely
        foreach ($platforms as $platform) {
            if ($platform->platform_url) {
                $url = $platform->platform_url;
                if (is_array($url)) {
                    $url = implode('', $url);
                }
                $platform->clean_url = preg_replace('/^https?:\/\//', '', $url);
            }
        }
        $footers = Footer::where('is_active', true)->orderBy('order')->get();

        return view('home', compact(
            'banners',
            'companyProfile',
            'categories',
            'legalities',
            'workProcesses',
            'partners',
            'products',
            'platforms',
            'footers'
        ));
    }

    public function products(Request $request)
    {
        $companyProfile = CompanyProfile::first();
        $searchKeyword = trim((string) $request->query('q', ''));
        $selectedCategory = $request->query('category', '');
        $selectedBrands = (array) $request->query('brands', []);

        // Fetch local active categories
        $categories = Category::where('is_active', true)->orderBy('order')->get();

        // Fetch local active brands
        $brands = Brand::where('is_active', true)->orderBy('order')->get();

        // Filter products from local DB
        $query = Product::with(['category', 'brand']);

        if (!empty($searchKeyword)) {
            $query->where(function($q) use ($searchKeyword) {
                $q->where('name', 'like', "%{$searchKeyword}%")
                  ->orWhere('type', 'like', "%{$searchKeyword}%")
                  ->orWhere('specification', 'like', "%{$searchKeyword}%")
                  ->orWhere('brand_name', 'like', "%{$searchKeyword}%");
            });
        }

        if (!empty($selectedCategory)) {
            $query->where('category_id', $selectedCategory);
        }

        if (!empty($selectedBrands)) {
            $query->whereIn('brand_id', $selectedBrands);
        }

        $products = $query->latest()->get();

        // Get product links from ProductLink model
        $productLink = ProductLink::where('is_active', true)->first();
        $marketplaceUrl = $productLink->marketplace_url ?? 'https://ayobelanja.co.id';
        $inaprocUrl = $productLink->inaproc_url ?? 'https://inaproc.lkpp.go.id';

        $banner = [
            'greeting' => 'Selamat Datang di Katalog Kami',
            'title_main' => 'Temukan Produk',
            'title_highlight' => 'Terbaik',
            'title_suffix' => 'untuk Kebutuhan Anda',
            'description' => 'Temukan berbagai produk berkualitas untuk kebutuhan kantor, pendidikan, dan industri. Belanja melalui marketplace resmi atau akses katalog pengadaan di INAPROC sesuai kebutuhan.',
            'primary_button' => '🛒 Marketplace Resmi',
            'secondary_button' => '🏛️ Katalog INAPROC',
            'primary_button_url' => $marketplaceUrl,
            'secondary_button_url' => $inaprocUrl,
            'image' => asset('uploads/banners/banner1.jpg'),
        ];

        return view('products', compact(
            'companyProfile',
            'banner',
            'categories',
            'brands',
            'products',
            'searchKeyword',
            'selectedCategory',
            'selectedBrands'
        ));
    }

    public function productDetail(int $id)
    {
        $companyProfile = CompanyProfile::first();
        
        $product = Product::with(['category', 'brand', 'variants'])->findOrFail($id);

        // Fetch related products from DB
        $relatedProducts = Product::where('id', '!=', $id)->limit(5)->get();

        return view('product-detail', compact('companyProfile', 'product', 'relatedProducts'));
    }

    private function fetchFromEcommerceApi($endpoint, $params = [])
    {
        $baseUrl = rtrim(config('services.ecommerce.base_url') ?? 'https://ayobelanja.co.id/api', '/');
        $token = config('services.ecommerce.token');

        try {
            // Remove trailing slash to avoid double slash
            $baseUrl = rtrim($baseUrl, '/');
            $response = Http::withToken($token)
                ->timeout(10)
                ->get("{$baseUrl}/{$endpoint}", $params);

            if ($response->successful()) {
                return $response->json();
            }
            
            \Log::warning("eCommerce API Warning ({$endpoint}): Status " . $response->status());
        } catch (\Exception $e) {
            \Log::error("eCommerce API Error ({$endpoint}): " . $e->getMessage());
        }

        return [];
    }

    public function faq()
    {
        $companyProfile = CompanyProfile::first();
        $searchKeyword = trim((string) request()->query('q', ''));

        $faqs = collect($this->getFaqData());

        if ($searchKeyword !== '') {
            $needle = strtolower($searchKeyword);
            $faqs = $faqs->filter(function ($faq) use ($needle) {
                return str_contains(strtolower($faq['question']), $needle)
                    || str_contains(strtolower($faq['answer']), $needle);
            });
        }

        $faqs = $faqs->values()->all();

        return view('faq', compact('companyProfile', 'faqs', 'searchKeyword'));
    }

    public function contact()
    {
        $companyProfile = CompanyProfile::first();

        return view('contact', compact('companyProfile'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'company_name' => ['nullable', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'product_category' => ['required', 'string', 'max:100'],
            'estimated_units' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:1000'],
        ]);

        return redirect()
            ->route('contact.page')
            ->with('contact_success', true)
            ->with('contact_payload', $validated);
    }

    public function solusi()
    {
        $companyProfile = CompanyProfile::first();
        $categories = Category::where('is_active', true)->orderBy('order')->get();
        $statistics = AboutStatistic::where('is_active', true)->orderBy('order')->get();
        $platforms = Platform::where('is_active', true)->get();

        return view('solusi', compact(
            'companyProfile',
            'categories',
            'statistics',
            'platforms'
        ));
    }
}
