@extends('layouts.app')
@section('title', 'Tentang Kami - PT ARO')

@section('content')

{{-- ===================== BANNER ===================== --}}
<section class="hero-slider"
    style="
        background-image: url('{{ $banner ? asset($banner->image) : asset('uploads/banner_tentangg.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
    ">

    <div class="hero-content-wrapper">
        <div class="container">
            <div class="hero-content">

                <h1 class="hero-title"
                    style="color: white; font-size: 3.5rem; margin-bottom: 2rem; max-width: 500px;">
                    {{ $banner->title ?? 'Mengenal PT Aro Baskara Esa' }}
                </h1>

                <p class="hero-description"
                    style="color: white; font-size: 1.3rem; max-width: 500px; margin-bottom: 3rem; line-height: 1.6;">
                    {{ $banner->description ?? 'Solusi pengadaan barang dan jasa yang profesional, transparan dan terpercaya untuk sektor bisnis dan pemerintahan.' }}
                </p>

                @if($banner && !empty($banner->button_text))
                <a href="{{ $banner->button_link ?? '#hubungi' }}" class="hero-button"
                    style="background: transparent; border: 2px solid white; color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none;">
                    {{ $banner->button_text }}
                </a>
                @elseif(!$banner)
                <a href="#hubungi" class="hero-button"
                    style="background: transparent; border: 2px solid white; color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none;">
                    Lihat Sekarang
                </a>
                @endif

            </div>
        </div>
    </div>

</section>

{{-- ===================== ABOUT ===================== --}}
@include('partials.about-section', ['company' => $company, 'showButton' => false, 'limitDescription' => false])


{{-- ===================== STATISTIK ===================== --}}
<section class="statistik-section text-white"
    style="
        background-image: url('{{ asset('uploads/point.png') }}');
        background-size: cover;
        background-position: center;
        padding: 100px 0;
        min-height: 400px;
    ">

    <div class="container">
        <div class="row text-center justify-content-center">

            @forelse($statistics as $stat)
            <div class="col-md-3 col-6 mb-4">

                <div class="stat-box">

                    {{-- ICON --}}
                    <div class="stat-icon mb-3">
                        @if($stat->icon)
                            <img src="{{ asset('storage/' . $stat->icon) }}"
                                 style="width:100px; height:100px; object-fit:contain;"
                                 alt="{{ $stat->title }}">
                        @else
                            <i class="fas fa-chart-line"
                               style="font-size: 4rem; color: white;"></i>
                        @endif
                    </div>

                    {{-- TITLE (1 Klien, 1 Produk, dll) --}}
                    <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 0;">
                        {{ $stat->title }}
                    </h2>
                    
                    @if($stat->suffix)
                    <p style="font-size: 1.2rem; margin-top: 5px; margin-bottom: 0;">
                        {{ $stat->suffix }}
                    </p>
                    @endif

                </div>

            </div>
            @empty
            <div class="col-12">
                <p>Data statistik belum tersedia</p>
            </div>
            @endforelse

        </div>
    </div>
</section>

{{-- ===================== VISI MISI ===================== --}}
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" style="color: #EE8E0F; font-family: 'Georgia', 'Times New Roman', serif;">Visi & Misi</h2>
            <div class="divider-line mx-auto" style="background: linear-gradient(90deg, #FFA500, #FF8C00, #FFA500); width: 50px; height: 3px; margin: 12px auto 30px; border-radius: 2px; box-shadow: 0 2px 8px rgba(255, 165, 0, 0.3); /* animation: shimmer-divider 3s ease-in-out infinite; */"></div>
            <p class="mt-3" style="color: #555; max-width: 600px; margin: 0 auto;">
                Berikut visi dan misi yang menjadi arah serta komitmen perusahaan dalam menjalankan setiap kegiatan usaha.
            </p>
        </div>

        <div class="row">

            {{-- VISI --}}
            <div class="col-lg-6 mb-4">
                <div class="vision-mission-card visi-box">
                    <h3 class="vision-mission-title">
                        <div class="vision-mission-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        Visi
                    </h3>
                    @if($visi)
                        <p class="vision-mission-text">
                            {{ $visi->description }}
                        </p>
                    @else
                        <p class="vision-mission-text text-muted">
                            Menjadi perusahaan terdepan dalam solusi pengadaan barang dan jasa yang inovatif dan terpercaya.
                        </p>
                    @endif
                </div>
            </div>

            {{-- MISI --}}
            <div class="col-lg-6 mb-4">
                <div class="vision-mission-card misi-box">
                    <h3 class="vision-mission-title">
                        <div class="vision-mission-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        Misi
                    </h3>
                    @if($misi->count())
                        <div class="vision-mission-text">
                            <ol class="misi-numbered-list">
                                @foreach($misi as $item)
                                    <li>{{ $item->description }}</li>
                                @endforeach
                            </ol>
                        </div>
                    @else
                        <div class="vision-mission-text">
                            <ol class="misi-numbered-list">
                                <li>Memberikan layanan pengadaan yang profesional dan transparan</li>
                                <li>Mengutamakan kepuasan dan kepercayaan klien</li>
                                <li>Inovasi berkelanjutan dalam solusi pengadaan</li>
                            </ol>
                        </div>
                    @endif
                </div>
            </div>

        </div>

        {{-- CSS untuk tampilan visi misi --}}
        <style>
        .vision-mission-card {
            background: #ffffff;
            border-radius: 15px;
            padding: 20px 18px 15px 18px;
            height: auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #f0f0f0;
            overflow: hidden;
            position: relative;
        }

        .vision-mission-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 18px;
            background: linear-gradient(90deg, #EE8E0F, #EE8E0F);
            border-radius: 15px 15px 0 0;
        }

        .vision-mission-icon {
            width: 18px;
            height: 18px;
            background: #EE8E0F;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 6px;
            color: white;
            font-size: 11px;
            flex-shrink: 0;
        }

        .vision-mission-title {
            color: #EE8E0F;
            font-size: 18px;
            font-weight: 700;
            font-family: 'Georgia', 'Times New Roman', serif;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .vision-mission-text {
            color: #555;
            line-height: 1.5;
            font-size: 14px;
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        .misi-numbered-list {
            list-style: none;
            counter-reset: misi-counter;
            padding-left: 0;
        }

        .misi-numbered-list li {
            counter-increment: misi-counter;
            margin-bottom: 15px;
            position: relative;
            padding-left: 25px;
            line-height: 1.6;
            color: #555;
            display: flex;
            align-items: flex-start;
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        .misi-numbered-list li::before {
            content: counter(misi-counter) ".";
            position: absolute;
            left: 0;
            top: 0;
            color: #EE8E0F;
            font-weight: 700;
            font-size: 16px;
            line-height: 1.6;
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        /* ================= ANIMASI VISI MISI ================= */

        .visi-box {
            transform: translateX(-100px);
            opacity: 0;
            transition: all 1s ease;
        }

        .misi-box {
            transform: translateX(100px);
            opacity: 0;
            transition: all 1s ease;
        }

        .show {
            transform: translateX(0);
            opacity: 1;
        }

        /* ================= AUTO SCROLL LOGO ================= */

        .auto-scroll {
            display: flex;
            overflow: hidden;
            position: relative;
        }

        .auto-scroll-track {
            display: flex;
            gap: 30px;
            width: max-content;
            animation: scrollLoop 25s linear infinite;
        }

        @keyframes scrollLoop {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .auto-scroll-track {
    will-change: transform;
}

        /* Brand Scroll Styles */
        .brand-scroll-wrapper {
            position: relative;
        }

        .brand-scroll-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 1rem 0;
            scroll-behavior: smooth;
            justify-content: center;
            scroll-snap-type: x mandatory;
            width: 100%;
            flex-wrap: wrap;
            max-width: 100%;
        }

        .brand-scroll-container::-webkit-scrollbar {
            height: 8px;
        }

        .brand-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .brand-scroll-container::-webkit-scrollbar {
    display: none;
}

        .brand-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #EE8E0F;
        }

        .brand-card {
            flex: 0 0 calc(25% - 0.75rem);
            width: calc(25% - 0.75rem);
            min-width: 200px;
            max-width: 250px;
            scroll-snap-align: start;
            box-sizing: border-box;
        }

        .scroll-dots {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
            padding: 15px;
        }

        .dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 3px solid #EE8E0F;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .dot::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: radial-gradient(circle, #EE8E0F, #FF8C00);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dot.active {
            background: linear-gradient(135deg, #EE8E0F, #FF8C00);
            transform: scale(1.2);
            box-shadow: 0 4px 15px rgba(238, 142, 15, 0.4), 0 0 20px rgba(255, 165, 0, 0.2);
            border-color: #FF8C00;
        }

        .dot.active::before {
            transform: translate(-50%, -50%) scale(1);
        }

        .dot:hover {
            transform: scale(1.1);
            border-color: #FFA500;
            box-shadow: 0 3px 12px rgba(255, 165, 0, 0.3);
        }

        .dot:hover::before {
            transform: translate(-50%, -50%) scale(0.6);
        }

                .brand-item {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;

            transition: all 0.4s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);

            position: relative;
            overflow: hidden;
        }

        /* efek glow background */
        .brand-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #EE8E0F, transparent);
            opacity: 0;
            transition: 0.4s;
        }

        /* LOGO */
        .brand-logo {
            max-width: 100%;
            max-height: 60px;
            width: 100%;
            height: 60px;
            object-fit: contain;
            transition: all 0.35s ease;

            /* PENTING */
            filter: none !important;
            opacity: 1 !important;
        }

        /* HOVER EFFECT */
        .brand-item {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .brand-item:hover {
            transform: translateY(-15px) scale(1.08);
            box-shadow: 0 20px 50px rgba(238, 142, 15, 0.3), 0 0 25px rgba(238, 142, 15, 0.2);
            border-color: #EE8E0F;
        }

        .brand-item:hover::before {
            opacity: 0.12;
        }

        .brand-item:hover .brand-logo {
            filter: grayscale(0%) opacity(1);
            transform: scale(1.15);
        }

        /* Partner Scroll Styles */
        .partner-scroll-wrapper {
            position: relative;
        }

        .partner-scroll-container {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding: 1rem 0;
            scroll-behavior: smooth;
            scroll-snap-type: x mandatory;
        }

        /* hide scrollbar */
        .partner-scroll-container::-webkit-scrollbar {
            display: none;
        }

        /* ================= CARD ================= */
        .partner-card {
            flex: 0 0 calc(25% - 0.75rem);
            min-width: 200px;
            max-width: 250px;
            scroll-snap-align: start;
        }

        /* ================= ITEM (SAMA DENGAN BRAND) ================= */
        .partner-card .brand-item {
            background: #ffffff;
            border-radius: 18px;
            padding: 25px;
            height: 120px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #eee;
            transition: all 0.35s ease;
            position: relative;
        }

        /* logo fix */
        .partner-card .brand-logo {
            max-width: 100%;
            max-height: 60px;
            object-fit: contain;
            transition: all 0.35s ease;
            filter: none !important;
            opacity: 1 !important;
        }

        /* hover effect */
        .partner-card .brand-item {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .partner-card .brand-item:hover {
            transform: translateY(-18px) scale(1.08);
            box-shadow: 
                0 25px 55px rgba(238, 142, 15, 0.35),
                0 0 30px rgba(238, 142, 15, 0.25);
            border-color: #EE8E0F;
        }

        /* glow */
        .partner-card .brand-item::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 18px;
            background: radial-gradient(circle, rgba(238,142,15,0.15), transparent 70%);
            opacity: 0;
            transition: 0.35s;
        }

        .partner-card .brand-item:hover::before {
            opacity: 1;
        }

        .partner-card .brand-item:hover .brand-logo {
            transform: scale(1.08);
        }

        /* ================= DOT ================= */
        .partner-scroll-dots {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 25px;
        }

        .partner-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ddd;
            border: 2px solid #EE8E0F;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .partner-dot.active {
            background: linear-gradient(135deg, #EE8E0F, #FF8C00);
            transform: scale(1.2);
            box-shadow: 0 4px 15px rgba(238, 142, 15, 0.4), 0 0 20px rgba(255, 165, 0, 0.2);
            border-color: #FF8C00;
        }

        .partner-dot:not(.active) {
            background: #ddd;
            transform: scale(1);
            box-shadow: none;
        }

        .partner-dot:hover {
            background: #FFA500;
            transform: scale(1.1);
        }

        /* Team Card Styles */
        .team-section {
            background-color: #ffffff;
            padding: 80px 0;
        }

        /* ================= CARD ================= */
        .team-card {
            background: #ffffff;
            border-radius: 16px;
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
            transition: all 0.4s ease;
            border: 1px solid #eee;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        /* hover */
        .team-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 
                0 20px 50px rgba(0,0,0,0.15),
                0 0 20px rgba(238, 142, 15, 0.25); /* 🔥 glow warna */
            border-color: #EE8E0F;
        }

        /* ================= IMAGE ================= */
        .profile-frame {
            width: 100%;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            position: relative;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;

            /* 🔥 biar foto tidak gelap */
            object-position: center top;
            transition: 0.4s ease;
        }

        .team-card:hover .profile-img {
            transform: scale(1.05);
        }

        /* bagian bawah (nama + jabatan) */
        .team-info {
            background: #0b0430; /* warna gelap seperti contoh */
            padding: 25px;
            text-align: left;
            min-height: 80px;
        }

        /* nama */
        .team-info .team-name {
            color: #fff;
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        /* jabatan */
        .team-info .team-role {
            color: #ccc;
            font-size: 20px;
        }
        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .team-card {
                margin-bottom: 30px;
            }

            .profile-frame {
                height: 250px;
            }

            .team-name {
                font-size: 16px;
            }
        }
        </style>
    </div>
</section>

{{-- ===================== BRAND ===================== --}}
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" style="color: #EE8E0F; font-family: 'Georgia', 'Times New Roman', serif;">Brand Kami</h2>
            <div class="divider-line mx-auto" style="background: linear-gradient(90deg, #FFA500, #FF8C00, #FFA500); width: 50px; height: 3px; margin: 12px auto 30px; border-radius: 2px; box-shadow: 0 2px 8px rgba(255, 165, 0, 0.3); /* animation: shimmer-divider 3s ease-in-out infinite; */"></div>
            <p class="mt-3" style="color: #555; max-width: 600px; margin: 0 auto;">
                Berbagai brand terpercaya yang telah bekerja sama dengan kami untuk memberikan solusi terbaik.
            </p>
        </div>

        <div class="brand-scroll-wrapper">
            <div class="brand-scroll-container">
                @forelse($brands as $brand)
                <div class="brand-card">
                    <div class="brand-item">
                        @if($brand->logo)
                            <img src="{{ asset($brand->logo) }}" class="brand-logo" alt="{{ $brand->name }}" style="max-width: 100%; height: 60px; object-fit: contain; display: block;">
                        @else
                            <div class="text-muted" style="height: 60px; display: flex; align-items: center; justify-content: center;">
                                No Logo
                            </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada brand</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- ===================== PARTNER ===================== --}}
<section class="section-padding text-center">

    <h2 class="section-title" style="color: #EE8E0F; font-family: 'Georgia', 'Times New Roman', serif;">Mitra Teknologi</h2>
    <div class="divider-line mx-auto" style="background: linear-gradient(90deg, #FFA500, #FF8C00, #FFA500); width: 50px; height: 3px; margin: 12px auto 30px; border-radius: 2px; box-shadow: 0 2px 8px rgba(255, 165, 0, 0.3); /* animation: shimmer-divider 3s ease-in-out infinite; */"></div>
    <p class="mb-4 text-muted">
        Didukung oleh mitra teknologi resmi dan terpercaya.
    </p>

    <div class="container">
        <div class="partner-scroll-wrapper">
            <div class="partner-scroll-container auto-scroll">
    <div class="auto-scroll-track">

        @foreach($partners as $partner)
        <div class="partner-card">
            <div class="brand-item">
                <img src="{{ asset($partner->logo) }}" 
                     class="brand-logo" 
                     alt="{{ $partner->name }}">
            </div>
        </div>
        @endforeach

        {{-- DUPLIKASI BIAR LOOP HALUS --}}
        @foreach($partners as $partner)
        <div class="partner-card">
            <div class="brand-item">
                <img src="{{ asset($partner->logo) }}" 
                     class="brand-logo" 
                     alt="{{ $partner->name }}">
            </div>
        </div>
        @endforeach

    </div>
</div>
            </div>
        </div>
    </div>

</section>

{{-- ===================== CTA ===================== --}}
<section style="
    background-image: url('{{ asset('uploads/siap-bekerjasama-tentang.png') }}');
    background-size: cover;
    background-position: center;
    padding: 80px 0;
">
    <div class="container">
        <div class="row align-items-center">

            {{-- TEXT --}}
            <div class="col-md-8 text-white">
                <h3 class="fw-bold">
                    Siap Bekerja Sama dengan Kami?
                </h3>
                <p>
                    Mari wujudkan solusi terbaik untuk kebutuhan Anda bersama tim kami.
                </p>
            </div>

            {{-- BUTTON --}}
            <div class="col-md-4 text-md-end text-center mt-3 mt-md-0">
                <a href="{{ route('contact.page') }}" 
                   class="btn btn-light px-4 py-2 fw-semibold"
                   style="border-radius:30px;">
                    Hubungi Kami
                </a>
            </div>

        </div>
    </div>

</section>

{{-- ===================== JAVASCRIPT ===================== --}}
<script>
function scrollToBrand(index) {
    const container = document.querySelector('.brand-scroll-container');
    const brands = document.querySelectorAll('.brand-card');
    const totalBrands = brands.length;
    const cardsPerView = 4;
    const totalPages = Math.ceil(totalBrands / cardsPerView);
    
    // Calculate which page to scroll to based on dot index
    let targetPage;
    if (index === 0) {
        targetPage = 0;
    } else if (index === 1) {
        // Middle dot goes to middle page
        targetPage = Math.floor(totalPages / 2);
    } else if (index === 2) {
        // Last dot goes to last page
        targetPage = totalPages - 1;
    }
    
    const cardWidth = 268; // card width + gap
    const scrollPosition = targetPage * cardWidth * cardsPerView;
    
    container.scrollTo({
        left: scrollPosition,
        behavior: 'smooth'
    });
    
    // Update active dot immediately
    document.querySelectorAll('.dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
    });
}

// Auto-update dots on scroll
document.querySelector('.brand-scroll-container')?.addEventListener('scroll', function() {
    const container = this;
    const brands = document.querySelectorAll('.brand-card');
    const totalBrands = brands.length;
    const cardsPerView = 4;
    const totalPages = Math.ceil(totalBrands / cardsPerView);
    const cardWidth = 268;
    const currentScroll = container.scrollLeft;
    const currentPage = Math.round(currentScroll / (cardWidth * cardsPerView));
    
    // Determine which dot should be active based on current page
    let activeDotIndex;
    if (currentPage <= 0) {
        activeDotIndex = 0;
    } else if (currentPage >= totalPages - 1) {
        activeDotIndex = 2;
    } else {
        // Middle section - use middle dot
        activeDotIndex = 1;
    }
    
    document.querySelectorAll('.dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === activeDotIndex);
    });
});

function scrollToPartner(index) {
    const container = document.querySelector('.partner-scroll-container');
    const partners = document.querySelectorAll('.partner-card');
    const totalPartners = partners.length;
    const cardsPerView = 4;
    const totalPages = Math.ceil(totalPartners / cardsPerView);
    
    // Calculate which page to scroll to based on dot index
    let targetPage;
    if (index === 0) {
        targetPage = 0;
    } else if (index === 1) {
        // Middle dot goes to middle page
        targetPage = Math.floor(totalPages / 2);
    } else if (index === 2) {
        // Last dot goes to last page
        targetPage = totalPages - 1;
    }
    
    const cardWidth = 268; // card width + gap
    const scrollPosition = targetPage * cardWidth * cardsPerView;
    
    container.scrollTo({
        left: scrollPosition,
        behavior: 'smooth'
    });
    
    // Update active dot immediately
    document.querySelectorAll('.partner-dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
    });
}

// Auto-update dots on scroll
document.querySelector('.partner-scroll-container')?.addEventListener('scroll', function() {
    const container = this;
    const partners = document.querySelectorAll('.partner-card');
    const totalPartners = partners.length;
    const cardsPerView = 4;
    const totalPages = Math.ceil(totalPartners / cardsPerView);
    const cardWidth = 268;
    const currentScroll = container.scrollLeft;
    const currentPage = Math.round(currentScroll / (cardWidth * cardsPerView));
    
    // Determine which dot should be active based on current page
    let activeDotIndex;
    if (currentPage <= 0) {
        activeDotIndex = 0;
    } else if (currentPage >= totalPages - 1) {
        activeDotIndex = 2;
    } else {
        // Middle section - use middle dot
        activeDotIndex = 1;
    }
    
    document.querySelectorAll('.partner-dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === activeDotIndex);
    });
});


// Auto-scroll functionality for brands
let brandAutoScrollInterval;
let brandCurrentPage = 0;
const brandContainer = document.querySelector('.brand-scroll-container');

function startBrandAutoScroll() {
    if (!brandContainer) return;
    
    const brands = document.querySelectorAll('.brand-card');
    const totalBrands = brands.length;
    const cardsPerView = 4;
    const totalPages = Math.ceil(totalBrands / cardsPerView);
    
    // Only start auto-scroll if there are more than 5 items
    if (totalBrands > 5) {
        brandAutoScrollInterval = setInterval(() => {
            // Progress to next page sequentially (1, 2, 3, 4, ...)
            brandCurrentPage = (brandCurrentPage + 1) % totalPages;
            
            const cardWidth = 268;
            const scrollPosition = brandCurrentPage * cardWidth * cardsPerView;
            
            brandContainer.scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
            });
        }, 3500); // Change every 3.5 seconds (slightly different from partners)
    }
}

function stopBrandAutoScroll() {
    if (brandAutoScrollInterval) {
        clearInterval(brandAutoScrollInterval);
    }
}

// Start auto-scroll on page load
document.addEventListener('DOMContentLoaded', function() {
    startBrandAutoScroll();
});

// ================= ANIMASI VISI MISI =================
const vmElements = document.querySelectorAll('.visi-box, .misi-box');

const vmObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // masuk layar → tampil
            entry.target.classList.add('show');
        } else {
            // keluar layar → reset (biar bisa animasi lagi)
            entry.target.classList.remove('show');
        }
    });
});

vmElements.forEach(el => vmObserver.observe(el));

// Stop auto-scroll on hover and resume on mouse leave
brandContainer?.addEventListener('mouseenter', stopBrandAutoScroll);
brandContainer?.addEventListener('mouseleave', startBrandAutoScroll);
</script>

@endsection
