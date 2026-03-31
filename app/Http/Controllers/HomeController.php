<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Banner;
use App\Models\CompanyProfile;
use App\Models\Category;
use App\Models\Legality;
use App\Models\WorkProcess;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Platform;
use App\Models\Footer;
use App\Models\Faq;

class HomeController extends Controller
{
    private function getFaqData(): array
    {
        return [
            [
                'question' => 'Apa saja layanan yang disediakan oleh perusahaan?',
                'answer' => 'Perusahaan menyediakan berbagai layanan seperti instalasi sistem, pengembangan software, konsultasi teknologi, serta pelatihan di bidang teknologi informasi untuk mendukung kebutuhan klien.',
            ],
            [
                'question' => 'Bagaimana cara melakukan pemesanan produk atau layanan?',
                'answer' => 'Anda dapat melakukan pemesanan melalui tim sales kami via email, telepon, atau WhatsApp. Tim kami akan membantu proses kebutuhan, penawaran, hingga tahap pengadaan.',
            ],
            [
                'question' => 'Bagaimana cara menghubungi tim perusahaan?',
                'answer' => 'Silakan hubungi kami melalui email arobaskara@gmail.com, telepon (021) 38835187, atau WhatsApp +62 822-8888-6009 pada jam kerja.',
            ],
            [
                'question' => 'Apakah perusahaan menyediakan layanan pelatihan atau workshop?',
                'answer' => 'Ya, kami menyediakan pelatihan dan workshop sesuai kebutuhan implementasi sistem agar tim Anda dapat menggunakan solusi secara maksimal.',
            ],
            [
                'question' => 'Apakah perusahaan menyediakan layanan konsultasi teknologi?',
                'answer' => 'Ya, kami menyediakan layanan konsultasi teknologi untuk membantu perencanaan, pemilihan solusi, hingga strategi implementasi yang tepat.',
            ],
        ];
    }

    private function getCatalogData(): array
    {
        $banner = [
            'greeting' => 'Halo, Selamat Datang',
            'title_main' => 'Produk &',
            'title_highlight' => 'Solusi Pengadaan',
            'title_suffix' => 'Untuk Kebutuhan Bisnis Anda',
            'description' => 'Menyediakan berbagai produk berkualitas untuk industri perkantoran, pendidikan, dan instansi pemerintah.',
            'image' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=1200&q=80',
            'primary_button' => 'Lihat Produk Unggulan',
            'secondary_button' => 'Kunjungi E-Commerce',
        ];

        $categories = [
            'Semua',
            'Furniture Kantor',
            'Furniture Pendidikan',
            'Peralatan Dapur',
            'Peralatan IDT IK',
            'Mesin dan Perkakas',
        ];

        $brands = ['ABE edu', 'ABE living', 'Acer', 'APC', 'Ferro', 'Umalo'];

        $products = [
            [
                'name' => 'Meja Kerja Konfigurasi PT-03B uk. 3200',
                'location' => 'Indonesia',
                'rating' => '0.0',
                'type' => 'WB0-01',
                'brand' => 'ABE edu',
                'category' => 'Furniture Kantor',
                'material' => 'Kayu MDF',
                'size' => '120 × 60 × 75 cm',
                'color' => 'Coklat / Putih',
                'weight' => '25 kg',
                'description' => 'Meja kerja modern merupakan meja kerja dengan desain minimalis yang cocok digunakan di ruang kerja kantor, ruang meeting, maupun workspace pribadi.',
                'highlights' => [
                    'Material kayu solid',
                    'Desain minimalis',
                    'Cocok untuk kantor dan workspace',
                ],
                'image' => 'https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?auto=format&fit=crop&w=800&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'name' => 'Meja Rapat CT-04 uk. 4000',
                'location' => 'Indonesia',
                'rating' => '0.0',
                'type' => 'WB0-01',
                'brand' => 'ABE living',
                'category' => 'Furniture Kantor',
                'material' => 'Kayu MDF',
                'size' => '400 × 120 × 75 cm',
                'color' => 'Putih',
                'weight' => '40 kg',
                'description' => 'Meja rapat berukuran besar untuk ruang meeting formal dengan konstruksi kokoh dan tampilan modern.',
                'highlights' => [
                    'Permukaan lebar untuk meeting tim',
                    'Konstruksi kuat untuk penggunaan intensif',
                    'Mudah dipadukan dengan kursi kantor',
                ],
                'image' => 'https://images.unsplash.com/photo-1505843513577-22bb7d21e455?auto=format&fit=crop&w=800&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1505843513577-22bb7d21e455?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1497215842964-222b430dc094?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'name' => 'Meja Rapat CT-09B uk. 6400',
                'location' => 'Indonesia',
                'rating' => '0.0',
                'type' => 'WB0-01',
                'brand' => 'Acer',
                'category' => 'Furniture Kantor',
                'material' => 'Kayu Laminasi',
                'size' => '640 × 140 × 75 cm',
                'color' => 'Oak Natural',
                'weight' => '55 kg',
                'description' => 'Pilihan meja rapat premium untuk kapasitas peserta yang lebih besar dengan finishing elegan.',
                'highlights' => [
                    'Desain premium untuk ruang direksi',
                    'Kapasitas besar',
                    'Finishing rapi dan tahan lama',
                ],
                'image' => 'https://images.unsplash.com/photo-1497215842964-222b430dc094?auto=format&fit=crop&w=800&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1497215842964-222b430dc094?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'name' => 'Meja Staff WS-01 uk. 3200',
                'location' => 'Indonesia',
                'rating' => '0.0',
                'type' => 'WB0-01',
                'brand' => 'APC',
                'category' => 'Furniture Kantor',
                'material' => 'Partikel Board',
                'size' => '320 × 60 × 75 cm',
                'color' => 'Putih / Hijau',
                'weight' => '28 kg',
                'description' => 'Meja staff modular untuk area kerja tim dengan konfigurasi fleksibel dan tampilan bersih.',
                'highlights' => [
                    'Konfigurasi fleksibel',
                    'Cocok untuk area staff',
                    'Mudah dirakit',
                ],
                'image' => 'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=800&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'name' => 'Meja Kerja Kubikal CWD-05C uk. 3600',
                'location' => 'Indonesia',
                'rating' => '0.0',
                'type' => 'WB0-01',
                'brand' => 'Ferro',
                'category' => 'Furniture Kantor',
                'material' => 'Kayu MDF + Metal',
                'size' => '360 × 120 × 75 cm',
                'color' => 'Abu / Coklat',
                'weight' => '38 kg',
                'description' => 'Meja kubikal untuk kebutuhan kantor modern dengan partisi yang mendukung fokus kerja.',
                'highlights' => [
                    'Partisi kerja ergonomis',
                    'Ideal untuk open space office',
                    'Material kokoh',
                ],
                'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1497215842964-222b430dc094?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80',
                ],
            ],
            [
                'name' => 'Meja Kerja Kubikal CWD-05D uk. 4200',
                'location' => 'Indonesia',
                'rating' => '0.0',
                'type' => 'WB0-01',
                'brand' => 'Umalo',
                'category' => 'Furniture Kantor',
                'material' => 'Kayu MDF + Metal',
                'size' => '420 × 120 × 75 cm',
                'color' => 'Abu Muda',
                'weight' => '42 kg',
                'description' => 'Varian kubikal dengan area kerja lebih luas untuk tim operasional dan administrasi.',
                'highlights' => [
                    'Area kerja ekstra luas',
                    'Konstruksi stabil',
                    'Desain modern minimalis',
                ],
                'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=800&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=900&q=80',
                    'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=900&q=80',
                ],
            ],
        ];

        return compact('banner', 'categories', 'brands', 'products');
    }

    public function index()
    {
        $banners = Banner::where('is_active', true)->orderBy('order')->get();
        $companyProfile = CompanyProfile::first();
        $categories = Category::where('is_active', true)->orderBy('order')->limit(3)->get();
        $legalities = Legality::where('is_active', true)->orderBy('order')->limit(3)->get();
        $workProcesses = WorkProcess::where('is_active', true)->orderBy('step_number')->get();
        $partners = Partner::where('is_active', true)->orderBy('order')->get();
        $products = Product::where('is_active', true)->inRandomOrder()->limit(4)->get();
        $platform = Platform::where('is_active', true)->first();
        
        // Process platform URL safely
        if ($platform && $platform->platform_url) {
            $url = $platform->platform_url;
            if (is_array($url)) {
                $url = implode('', $url);
            }
            $platform->clean_url = preg_replace('/^https?:\/\//', '', $url);
        } else {
            $platform = null;
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
            'platform',
            'footers'
        ));
    }


    public function products()
    {
        $companyProfile = CompanyProfile::first();
        $banner = [
            'greeting'          => 'Halo, Selamat Datang',
            'title_main'        => 'Produk &',
            'title_highlight'   => 'Solusi Pengadaan',
            'title_suffix'      => 'Untuk Kebutuhan Bisnis Anda',
            'description'       => 'Menyediakan berbagai produk berkualitas untuk industri perkantoran, pendidikan, dan instansi pemerintah.',
            'image'             => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=1200&q=80',
            'primary_button'    => 'Lihat Produk Unggulan',
            'secondary_button'  => 'Kunjungi E-Commerce',
        ];

        $searchKeyword   = trim((string) request()->query('q', ''));
        $selectedCategory = request()->query('category', '');
        $selectedBrands  = request()->query('brands', []);
        if (! is_array($selectedBrands)) {
            $selectedBrands = [$selectedBrands];
        }
        $selectedBrands = array_map('intval', array_filter($selectedBrands));

        $apiBase  = rtrim(config('services.ecommerce.base_url'), '/');
        $apiToken = config('services.ecommerce.token');

        // Cache kategori & brand selama 30 menit
        $categories = Cache::remember('ecommerce_categories', 1800, function () use ($apiBase, $apiToken) {
            $resp = \Illuminate\Support\Facades\Http::withToken($apiToken)
                ->withHeaders(['Accept' => 'application/json'])
                ->get("{$apiBase}/categories");
            return $resp->successful() ? $resp->json() : [];
        });

        $brands = Cache::remember('ecommerce_brands', 1800, function () use ($apiBase, $apiToken) {
            $resp = \Illuminate\Support\Facades\Http::withToken($apiToken)
                ->withHeaders(['Accept' => 'application/json'])
                ->get("{$apiBase}/filters");
            return $resp->successful() ? ($resp->json()['brands'] ?? []) : [];
        });

        // Produk tidak di-cache karena ada filter dinamis
        $productParams = ['page' => request()->query('page', 1)];
        if ($selectedCategory !== '') {
            $productParams['category'] = (int) $selectedCategory;
        }
        if (! empty($selectedBrands)) {
            $productParams['brands'] = $selectedBrands;
        }
        if ($searchKeyword !== '') {
            $productParams['q'] = $searchKeyword;
        }

        $products   = [];
        $pagination = null;
        $prodResp = \Illuminate\Support\Facades\Http::withToken($apiToken)
            ->withHeaders(['Accept' => 'application/json'])
            ->get("{$apiBase}/products", $productParams);
        if ($prodResp->successful()) {
            $json       = $prodResp->json();
            $products   = $json['data'] ?? $json;
            $pagination = isset($json['data']) ? collect($json)->except('data')->toArray() : null;
        }

        return view('products', compact(
            'companyProfile', 'banner', 'categories', 'brands',
            'products', 'pagination', 'searchKeyword', 'selectedCategory', 'selectedBrands'
        ));
    }

    public function productDetail(int $index)
    {
        $companyProfile = CompanyProfile::first();
        ['products' => $products] = $this->getCatalogData();

        if (! isset($products[$index])) {
            abort(404);
        }

        $product = $products[$index];
        $relatedProducts = collect($products)
            ->map(function ($item, $itemIndex) {
                $item['original_index'] = $itemIndex;

                return $item;
            })
            ->except($index)
            ->values()
            ->take(3)
            ->all();

        return view('product-detail', compact('companyProfile', 'product', 'relatedProducts', 'index'));
    }

    public function faq()
    {
        $companyProfile = CompanyProfile::first();
        $searchKeyword = trim((string) request()->query('q', ''));

        $faqs = Faq::query()
            ->where('is_active', true)
            ->when($searchKeyword !== '', function ($query) use ($searchKeyword) {
                $query->where(function ($builder) use ($searchKeyword) {
                    $builder->where('question', 'like', '%' . $searchKeyword . '%')
                        ->orWhere('answer', 'like', '%' . $searchKeyword . '%');
                });
            })
            ->orderBy('order')
            ->orderByDesc('id')
            ->get(['question', 'answer'])
            ->map(function ($faq) {
                return [
                    'question' => $faq->question,
                    'answer' => $faq->answer,
                ];
            });

        if ($faqs->isEmpty()) {
            $faqs = collect($this->getFaqData());

            if ($searchKeyword !== '') {
                $needle = strtolower($searchKeyword);
                $faqs = $faqs->filter(function ($faq) use ($needle) {
                    return str_contains(strtolower($faq['question']), $needle)
                        || str_contains(strtolower($faq['answer']), $needle);
                });
            }
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
}
