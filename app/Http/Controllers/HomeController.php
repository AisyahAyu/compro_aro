<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\CompanyProfile;
use App\Models\Category;
use App\Models\Legality;
use App\Models\WorkProcess;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Platform;
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
        $banners = Banner::where('is_active', true)->orderBy('order')->get();
        $companyProfile = CompanyProfile::first();
        $categories = Category::where('is_active', true)->orderBy('order')->limit(3)->get();
        $legalities = Legality::where('is_active', true)->orderBy('order')->limit(3)->get();
        $workProcesses = WorkProcess::where('is_active', true)->orderBy('step_number')->get();
        $partners = Partner::where('is_active', true)->orderBy('order')->get();
        $platforms = Platform::where('is_active', true)->get();

        // Fetch products from API instead of local DB
        $products = Cache::remember('featured_products', 3600, function () {
            $data = $this->fetchFromEcommerceApi('products', ['limit' => 4]);
            return is_array($data) ? array_slice($data, 0, 4) : [];
        });

        // Fallback to local if API fails or returns nothing
        if (empty($products)) {
            $products = Product::where('is_active', true)->inRandomOrder()->limit(4)->get();
        }

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
        $selectedCategory = (string) $request->query('category', '');
        $selectedBrands = (array) $request->query('brands', []);

        // Fetch Categories (Cached)
        $categories = Cache::remember('api_categories', 3600, function () {
            return $this->fetchFromEcommerceApi('categories');
        });

        // To extract brands, we fetch all products once and cache them
        $allProductsForBrands = Cache::remember('all_api_products', 3600, function () {
            return $this->fetchFromEcommerceApi('products');
        });

        $brands = collect($allProductsForBrands ?? [])
            ->map(fn($p) => $p['brand'] ?? null)
            ->filter()
            ->unique('id_brand')
            ->values()
            ->all();

        // Filter products
        $params = [];
        if (!empty($searchKeyword)) $params['q'] = $searchKeyword;
        if (!empty($selectedCategory)) $params['category'] = $selectedCategory;
        if (!empty($selectedBrands)) $params['brands'] = $selectedBrands;

        $products = $this->fetchFromEcommerceApi('products', $params);

        $banner = [
            'greeting' => 'Selamat Datang di Katalog Kami',
            'title_main' => 'Temukan Produk',
            'title_highlight' => 'Terbaik',
            'title_suffix' => 'untuk Kebutuhan Anda',
            'description' => 'Kami menyediakan berbagai macam furniture kantor, pendidikan, dan peralatan lainnya dengan kualitas premium dan harga kompetitif.',
            'primary_button' => 'Lihat Produk',
            'secondary_button' => 'Beli Sekarang',
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

    public function productDetail(string $slug)
    {
        $companyProfile = CompanyProfile::first();
        
        $product = Cache::remember("product_detail_{$slug}", 3600, function () use ($slug) {
            return $this->fetchFromEcommerceApi("products/{$slug}");
        });

        if (empty($product)) {
            abort(404);
        }

        $relatedProducts = Cache::remember('all_api_products', 3600, function () {
            return $this->fetchFromEcommerceApi('products');
        });
        
        $relatedProducts = collect($relatedProducts ?? [])
            ->filter(fn($item) => $item['slug'] !== $slug)
            ->take(3)
            ->all();

        return view('product-detail', compact('companyProfile', 'product', 'relatedProducts'));
    }

    private function fetchFromEcommerceApi($endpoint, $params = [])
    {
        $baseUrl = config('services.ecommerce.base_url') ?? 'https://ayobelanja.co.id/api';
        $token = config('services.ecommerce.token');

        try {
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
