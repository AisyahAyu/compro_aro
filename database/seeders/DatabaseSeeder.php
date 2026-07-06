<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CompanyProfile;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Legality;
use App\Models\WorkProcess;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Platform;
use App\Models\Footer;
use App\Models\Statistic;
use App\Models\VisiMisi;
use App\Models\Brand;
use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call(AdminUserSeeder::class);

        // FAQ Default
        \App\Models\Faq::insert([
            [
                'question' => 'Apa saja layanan yang disediakan oleh perusahaan?',
                'answer' => 'Perusahaan menyediakan berbagai layanan seperti instalasi sistem, pengembangan software, konsultasi teknologi, serta pelatihan di bidang teknologi informasi untuk mendukung kebutuhan klien.',
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara melakukan pemesanan produk atau layanan?',
                'answer' => 'Anda dapat melakukan pemesanan melalui tim sales kami via email, telepon, atau WhatsApp. Tim kami akan membantu proses kebutuhan, penawaran, hingga tahap pengadaan.',
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara menghubungi tim perusahaan?',
                'answer' => 'Silakan hubungi kami melalui email arobaskara@gmail.com, telepon (021) 38835187, atau WhatsApp +62 822-8888-6009 pada jam kerja.',
                'order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah perusahaan menyediakan layanan pelatihan atau workshop?',
                'answer' => 'Ya, kami menyediakan pelatihan dan workshop sesuai kebutuhan implementasi sistem agar tim Anda dapat menggunakan solusi secara maksimal.',
                'order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah perusahaan menyediakan layanan konsultasi teknologi?',
                'answer' => 'Ya, kami menyediakan layanan konsultasi teknologi untuk membantu perencanaan, pemilihan solusi, hingga strategi implementasi yang tepat.',
                'order' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // Company Profile
        CompanyProfile::create([
            'company_name' => 'PT. Solusi Bisnis Indonesia',
            'description' => 'Kami adalah perusahaan yang berkomitmen untuk memberikan solusi terbaik untuk kebutuhan bisnis Anda. Dengan pengalaman lebih dari 10 tahun, kami telah membantu ratusan perusahaan dan instansi untuk meningkatkan efisiensi operasional mereka.',
            'image' => 'uploads/company-image.jpg',
            'logo' => 'uploads/company-logo.png',
            'email' => 'info@solusibisnis.com',
            'phone' => '+62 21 1234 5678',
            'address' => 'Jl. Sudirman No. 123, Jakarta Pusat, Indonesia',
            'social_media' => [
                'facebook' => 'https://facebook.com/solusibisnis',
                'twitter' => 'https://twitter.com/solusibisnis',
                'instagram' => 'https://instagram.com/solusibisnis',
                'linkedin' => 'https://linkedin.com/company/solusibisnis'
            ]
        ]);

        // Banners
        Banner::create([
            'title' => 'Solusi Terbaik untuk Bisnis Anda',
            'image' => 'uploads/banners/banner1.jpg',
            'order' => 1,
            'is_active' => true
        ]);

        Banner::create([
            'title' => 'Platform Digital Terintegrasi',
            'image' => 'uploads/banners/banner2.jpg',
            'order' => 2,
            'is_active' => true
        ]);

        Banner::create([
            'title'     => 'Mengenal PT Aro Baskara Esa',
            'subtitle'  => 'Solusi pengadaan barang dan jasa yang profesional',
            'image'     => 'uploads/banners/banner tentang.png',
            'page'      => 'tentang',
            'order'     => 3,
            'is_active' => true
        ]);

        // Categories
        Category::create([
            'name' => 'Pendidikan',
            'description' => 'Meja, Kursi, Papan Tulis, dll',
            'image' => 'uploads/categories/pendidikan.jpg',
            'order' => 1,
            'is_active' => true
        ]);

        Category::create([
            'name' => 'Kantor',
            'description' => 'Meja Kerja, Kursi Kantor, Filing Cabinet, dll',
            'image' => 'uploads/categories/kantor.jpg',
            'order' => 2,
            'is_active' => true
        ]);

        Category::create([
            'name' => 'Kesehatan',
            'description' => 'Tempat Tidur Pasien, Alat Medis, dll',
            'image' => 'uploads/categories/kesehatan.jpg',
            'order' => 3,
            'is_active' => true
        ]);

        // Legalities
        Legality::create([
            'title' => 'Legalitas Resmi',
            'description' => 'Terdaftar dan memiliki izin usaha lengkap sesuai regulasi nasional.',
            'icon' => 'fas fa-certificate',
            'order' => 1,
            'is_active' => true
        ]);

        Legality::create([
            'title' => 'Sertifikasi ISO',
            'description' => 'Bersertifikat ISO 9001:2015 untuk sistem manajemen mutu.',
            'icon' => 'fas fa-award',
            'order' => 2,
            'is_active' => true
        ]);

        Legality::create([
            'title' => 'Kepatuhan Pajak',
            'description' => 'Selalu mematuhi kewajiban perpajakan sesuai peraturan berlaku.',
            'icon' => 'fas fa-shield-alt',
            'order' => 3,
            'is_active' => true
        ]);

        // Work Processes
        WorkProcess::create([
            'step_number' => 1,
            'title' => 'Konsultasi',
            'description' => 'Diskusi kebutuhan produk dan anggaran bersama tim ahli.',
            'is_active' => true
        ]);

        WorkProcess::create([
            'step_number' => 2,
            'title' => 'Penawaran',
            'description' => 'Memberikan penawaran harga sesuai kebutuhan.',
            'is_active' => true
        ]);

        WorkProcess::create([
            'step_number' => 3,
            'title' => 'Persetujuan',
            'description' => 'Konfirmasi pesanan dan kesepakatan.',
            'is_active' => true
        ]);

        WorkProcess::create([
            'step_number' => 4,
            'title' => 'Pengiriman',
            'description' => 'Produk dikirim ke lokasi.',
            'is_active' => true
        ]);

        WorkProcess::create([
            'step_number' => 5,
            'title' => 'Dukungan',
            'description' => 'Layanan purna jual dan dukungan teknis.',
            'is_active' => true
        ]);

        // Partners
        Partner::create([
            'name' => 'Brand A',
            'logo' => 'uploads/partners/brand-a.png',
            'order' => 1,
            'is_active' => true
        ]);

        Partner::create([
            'name' => 'Brand B',
            'logo' => 'uploads/partners/brand-b.png',
            'order' => 2,
            'is_active' => true
        ]);

        Partner::create([
            'name' => 'Brand C',
            'logo' => 'uploads/partners/brand-c.png',
            'order' => 3,
            'is_active' => true
        ]);

        Partner::create([
            'name' => 'Brand D',
            'logo' => 'uploads/partners/brand-d.png',
            'order' => 4,
            'is_active' => true
        ]);

        Partner::create([
            'name' => 'Brand E',
            'logo' => 'uploads/partners/brand-e.png',
            'order' => 5,
            'is_active' => true
        ]);

        // Products
        Product::create([
            'name' => 'Meja Kantor Executive',
            'description' => 'Meja kerja premium dengan desain modern dan material berkualitas tinggi.',
            'image' => 'uploads/products/meja-kantor.jpg',
            'location' => 'Jakarta',
            'rating' => 4.8,
            'type' => 'Meja Kantor',
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Kursi Direktur Ergonomis',
            'description' => 'Kursi dengan dukungan punggung yang nyaman untuk produktivitas maksimal.',
            'image' => 'uploads/products/kursi-direktur.jpg',
            'location' => 'Surabaya',
            'rating' => 4.6,
            'type' => 'Kursi Kantor',
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Papan Tulis Interaktif',
            'description' => 'Papan tulis digital dengan fitur touchscreen untuk presentasi modern.',
            'image' => 'uploads/products/papan-tulis.jpg',
            'location' => 'Bandung',
            'rating' => 4.9,
            'type' => 'Alat Tulis',
            'is_active' => true
        ]);

        Product::create([
            'name' => 'Filing Cabinet 4 Laci',
            'description' => 'Rak penyimpanan dokumen dengan sistem keamanan terpadu.',
            'image' => 'uploads/products/filing-cabinet.jpg',
            'location' => 'Medan',
            'rating' => 4.5,
            'type' => 'Penyimpanan',
            'is_active' => true
        ]);

        // Platform
        Platform::create([
            'title' => 'Platform E-Commerce',
            'description' => 'Platform e-commerce one-stop-shopping untuk kebutuhan bisnis.',
            'platform_url' => 'ayobelanja.co.id',
            'image' => 'uploads/platform-image.jpg',
            'features' => [
                'Beragam produk berkualitas',
                'Sistem pembelian cepat',
                'Pengiriman ke seluruh Indonesia',
                'Dukungan layanan profesional'
            ],
            'is_active' => true
        ]);

        // Footer sections
        Footer::create([
            'section' => 'about',
            'content' => 'PT. Solusi Bisnis Indonesia adalah perusahaan terpercaya yang menyediakan solusi lengkap untuk kebutuhan operasional bisnis dan instansi.',
            'order' => 1,
            'is_active' => true
        ]);

        Footer::create([
            'section' => 'quick_links',
            'content' => 'Tentang Kami,Produk,Aktivitas,Karir,FAQ',
            'links' => [
                'Tentang Kami' => '#tentang',
                'Produk' => '#produk',
                'Aktivitas' => '#aktivitas',
                'Karir' => '#karir',
                'FAQ' => '#faq'
            ],
            'order' => 2,
            'is_active' => true
        ]);

        Footer::create([
            'section' => 'contact',
            'content' => 'Jl. Sudirman No. 123, Jakarta Pusat, Indonesia | +62 21 1234 5678 | info@solusibisnis.com',
            'order' => 3,
            'is_active' => true
        ]);
        // SECTION 15 — STATISTIK
        $statistics = [
            ['label'=>'Klien',            'value'=>150, 'suffix'=>'+', 'icon'=>'users',     'order'=>1],
            ['label'=>'Produk',           'value'=>30,  'suffix'=>'+', 'icon'=>'box',        'order'=>2],
            ['label'=>'Mitra',            'value'=>20,  'suffix'=>'+', 'icon'=>'handshake',  'order'=>3],
            ['label'=>'Tahun Pengalaman', 'value'=>10,  'suffix'=>'+', 'icon'=>'calendar',   'order'=>4],
        ];
        foreach ($statistics as $item) {
            Statistic::create(array_merge($item, ['is_active' => true]));
        }
        // SECTION 16 — VISI & MISI
        VisiMisi::create([
            'type'    => 'visi',
            'title'   => 'Visi Kami',
            'content' => 'Menjadi perusahaan teknologi terdepan yang memberikan solusi inovatif dan berdampak nyata bagi perkembangan bisnis di Indonesia.',
            'order'   => 0, 'is_active' => true,
        ]);
        $misi = [
            ['content'=>'Menghadirkan produk dan layanan teknologi berkualitas tinggi.',            'order'=>1],
            ['content'=>'Membangun ekosistem kemitraan yang kuat bersama klien dan mitra bisnis.', 'order'=>2],
            ['content'=>'Mendorong inovasi berkelanjutan melalui riset dan pengembangan.',          'order'=>3],
            ['content'=>'Memberikan dampak positif bagi masyarakat melalui program CSR.',           'order'=>4],
        ];
        foreach ($misi as $item) {
            VisiMisi::create(array_merge($item, ['type'=>'misi', 'is_active'=>true]));
        }
        // SECTION 17 — BRAND
        $brands = [
            ['name'=>'Brand Alpha',   'logo'=>'brands/brand-alpha.png',   'order'=>1],
            ['name'=>'Brand Beta',    'logo'=>'brands/brand-beta.png',    'order'=>2],
            ['name'=>'Brand Gamma',   'logo'=>'brands/brand-gamma.png',   'order'=>3],
            ['name'=>'Brand Delta',   'logo'=>'brands/brand-delta.png',   'order'=>4],
            ['name'=>'Brand Epsilon', 'logo'=>'brands/brand-epsilon.png', 'order'=>5],
        ];
        foreach ($brands as $item) {
            Brand::create(array_merge($item, ['is_active' => true]));
        }
        // SECTION 19 — TIM
        $team = [
            ['name'=>'Ahmad Fauzi',  'position'=>'Chief Executive Officer', 'division'=>'Management', 'order'=>1],
            ['name'=>'Siti Rahayu',  'position'=>'Chief Technology Officer','division'=>'Engineering','order'=>2],
            ['name'=>'Budi Santoso', 'position'=>'Head of Marketing',       'division'=>'Marketing',  'order'=>3],
            ['name'=>'Dewi Kusuma',  'position'=>'Lead UI/UX Designer',     'division'=>'Design',     'order'=>4],
            ['name'=>'Rizky Pratama','position'=>'Backend Developer',       'division'=>'Engineering','order'=>5],
            ['name'=>'Nadia Putri',  'position'=>'Business Development',    'division'=>'Marketing',  'order'=>6],
        ];
        foreach ($team as $item) {
            TeamMember::create(array_merge($item, ['is_active' => true]));
        }
    }
}
