@extends('layouts.app')
@section('title', 'Tentang Kami - PT ARO')

@section('content')

{{-- ===================== BANNER ===================== --}}
<section class="hero-slider"
    style="
        background-image: url('{{ asset('uploads/banners_about.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 80vh;
    ">

    <div class="hero-content-wrapper">
        <div class="container">
            <div class="hero-content">

                <h1 class="hero-title"
                    style="color: white; font-size: 3.5rem; margin-bottom: 2rem; max-width: 500px;">
                    Mengenal PT Aro Baskara Esa
                </h1>

                <p class="hero-description"
                    style="color: white; font-size: 1.3rem; max-width: 500px; margin-bottom: 3rem; line-height: 1.6;">
                    Solusi pengadaan barang dan jasa yang profesional, transparan dan terpercaya untuk sektor bisnis dan pemerintahan.
                </p>

                <a href="#hubungi" class="hero-button"
                    style="background: transparent; border: 2px solid white; color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none;">
                    Lihat Sekarang
                </a>

            </div>
        </div>
    </div>

</section>

{{-- ===================== ABOUT ===================== --}}
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">

            {{-- GAMBAR DARI DB --}}
            <div class="col-lg-6 mb-4">
                @if($companyProfile->image)
                    <img src="{{ asset($companyProfile->image) }}" alt="{{ $companyProfile->company_name }}" class="img-fluid rounded">
                @endif
            </div>

            {{-- TEKS DARI DB --}}
            <div class="col-lg-6">
                <h2 class="section-title" style="color: #EE8E0F;">Tentang Perusahaan</h2>
                <div class="divider-line" style="background: linear-gradient(90deg, #FFA500, #FF8C00, #FFA500); width: 50px; height: 3px; margin: 12px 0; border-radius: 2px; box-shadow: 0 2px 8px rgba(255, 165, 0, 0.3); animation: shimmer-divider 3s ease-in-out infinite;"></div>

                @if(!empty($company?->description))
                    <p style="line-height:1.8; color:#555; text-align: justify;">
                        {{ $company->description }}
                    </p>
                @else
                    <p class="text-muted">Belum ada deskripsi perusahaan</p>
                @endif

            </div>

        </div>
    </div>
</section>


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
                                 style="width:60px; height:60px; object-fit:contain;"
                                 alt="{{ $stat->title }}">
                        @else
                            <i class="fas fa-chart-line"
                               style="font-size: 2.5rem; color: white;"></i>
                        @endif
                    </div>

                    {{-- TITLE (1 Klien, 1 Produk, dll) --}}
                    <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 5px;">
                        {{ $stat->title }}
                    </h2>

                    {{-- ANGKA (HANYA SEKALI DI BAWAH) --}}
                    <p style="font-size: 1rem; margin-bottom: 0;">
                        {{ $stat->formatted_value }}
                    </p>

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
            <h2 class="section-title" style="color: #EE8E0F;">Visi & Misi Perusahaan</h2>
            <div class="divider-line mx-auto" style="background: linear-gradient(90deg, #FFA500, #FF8C00, #FFA500); width: 50px; height: 3px; margin: 12px auto 30px; border-radius: 2px; box-shadow: 0 2px 8px rgba(255, 165, 0, 0.3); animation: shimmer-divider 3s ease-in-out infinite;"></div>
            <p class="mt-3" style="color: #555; max-width: 600px; margin: 0 auto;">
                Berikut visi dan misi yang menjadi arah serta komitmen perusahaan dalam menjalankan setiap kegiatan usaha.
            </p>
        </div>

        <div class="row">

            {{-- VISI --}}
            <div class="col-lg-6 mb-4">
                <div class="vision-mission-card">
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
                <div class="vision-mission-card">
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
            padding: 35px 25px 25px 25px;
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
            height: 25px;
            background: linear-gradient(90deg, #EE8E0F, #EE8E0F);
            border-radius: 15px 15px 0 0;
        }

        .vision-mission-icon {
            width: 25px;
            height: 25px;
            background: #EE8E0F;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: white;
            font-size: 14px;
            flex-shrink: 0;
        }

        .vision-mission-title {
            color: #EE8E0F;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .vision-mission-text {
            color: #555;
            line-height: 1.6;
            font-size: 16px;
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
        }

        @keyframes shimmer-divider {
            0% { background-position: -100% 0; }
            100% { background-position: 100% 0; }
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
            border: 1px solid #eee;

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
            height: 60px;
            object-fit: contain;
            transition: all 0.35s ease;

            /* PENTING */
            filter: none !important;
            opacity: 1 !important;
        }

        /* HOVER EFFECT */
        .brand-item:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 15px 40px rgba(238, 142, 15, 0.25);
            border-color: #EE8E0F;
        }

        .brand-item:hover::before {
            opacity: 0.08;
        }

        .brand-item:hover .brand-logo {
            filter: grayscale(0%) opacity(1);
            transform: scale(1.1);
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
        .partner-card .brand-item:hover {
            transform: translateY(-12px) scale(1.05);
            box-shadow: 
                0 20px 45px rgba(238, 142, 15, 0.25),
                0 0 20px rgba(238, 142, 15, 0.15);
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
            transition: 0.3s;
        }

        .partner-dot.active {
            background: #EE8E0F;
            transform: scale(1.2);
        }

        .partner-dot:hover {
            background: #FFA500;
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
            <h2 class="section-title" style="color: #EE8E0F;">Brand Kami</h2>
            <p class="mt-3" style="color: #555; max-width: 600px; margin: 0 auto;">
                Berbagai brand terpercaya yang telah bekerja sama dengan kami untuk memberikan solusi terbaik.
            </p>
        </div>

        <div class="brand-scroll-wrapper">
            <div class="brand-scroll-container">
                @forelse($brands as $brand)
                <div class="brand-card">
    <div class="brand-item">
        <img src="{{ $brand->logo_url }}" class="brand-logo" alt="brand">
    </div>
</div>
                @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada brand</p>
                </div>
                @endforelse
            </div>
            @if($brands->count() > 4)
            <div class="scroll-dots">
                <button class="dot active" onclick="scrollToBrand(0)"></button>
                <button class="dot" onclick="scrollToBrand(1)"></button>
                <button class="dot" onclick="scrollToBrand(2)"></button>
                <button class="dot" onclick="scrollToBrand(3)"></button>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ===================== PARTNER ===================== --}}
<section class="section-padding text-center">

    <h2 class="section-title" style="color: #EE8E0F;">Mitra Teknologi Resmi</h2>
    <div class="divider-line mx-auto" style="background: linear-gradient(90deg, #FFA500, #FF8C00, #FFA500); width: 50px; height: 3px; margin: 12px auto 30px; border-radius: 2px; box-shadow: 0 2px 8px rgba(255, 165, 0, 0.3); animation: shimmer-divider 3s ease-in-out infinite;"></div>
    <p class="mb-4 text-muted">
        Didukung oleh mitra teknologi resmi dan terpercaya.
    </p>

    <div class="container">
        <div class="partner-scroll-wrapper">
            <div class="partner-scroll-container">
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
            @if($partners->count() > 4)
            <div class="partner-scroll-dots">
                <button class="partner-dot active" onclick="scrollToPartner(0)"></button>
                <button class="partner-dot" onclick="scrollToPartner(1)"></button>
                <button class="partner-dot" onclick="scrollToPartner(2)"></button>
                <button class="partner-dot" onclick="scrollToPartner(3)"></button>
            </div>
            @endif
        </div>
    </div>

</section>

{{-- ===================== TEAM ===================== --}}
<section class="team-section py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
    
        <!-- KIRI -->
        <div class="col-md-6 text-start">
            <p style="color:#888; font-size:14px; margin-bottom:5px;">
                Tim Profesional Kami
            </p>

            <h2 style="font-size:2.5rem; font-weight:800; color:#000;">
                Perkenalan Tim
            </h2>

            <div style="
                width:50px;
                height:3px;
                background:#000;
                margin-top:10px;
                border-radius:2px;
            "></div>
        </div>

        <!-- KANAN -->
        <div class="col-md-6 text-md-end text-start mt-3 mt-md-0">
            <p style="color:#555; max-width:400px; margin-left:auto;">
                Didukung oleh tim yang profesional, berpengalaman, dan berdedikasi.
            </p>
        </div>

    </div>
        <div class="row g-4">
            @forelse($team as $member)
            <div class="col-lg-4 col-md-6 d-flex">
                <div class="team-card">

                    <div class="profile-frame">
                        <img src="{{ $member->photo_url }}" class="profile-img">
                    </div>

                    <div class="team-info">
                        <h5 class="team-name">{{ $member->name }}</h5>
                        <span class="team-role">{{ $member->position }}</span>
                    </div>

                </div>
            </div>
            @empty
            <p>Belum ada tim</p>
            @endforelse
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
                <a href="{{ $contact->whatsapp_link ?? '#' }}" 
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
    const cardWidth = 268; // card width + gap
    const scrollPosition = index * cardWidth * 4; // 4 cards per view
    container.scrollTo({
        left: scrollPosition,
        behavior: 'smooth'
    });
    
    // Update active dot
    document.querySelectorAll('.dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
    });
}

// Auto-update dots on scroll
document.querySelector('.brand-scroll-container')?.addEventListener('scroll', function() {
    const container = this;
    const cardWidth = 268;
    const currentScroll = container.scrollLeft;
    const activeIndex = Math.round(currentScroll / (cardWidth * 4));
    
    document.querySelectorAll('.dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === activeIndex);
    });
});

function scrollToPartner(index) {
    const container = document.querySelector('.partner-scroll-container');
    const cardWidth = 268; // card width + gap
    const scrollPosition = index * cardWidth * 4; // 4 cards per view
    container.scrollTo({
        left: scrollPosition,
        behavior: 'smooth'
    });
    
    // Update active dot
    document.querySelectorAll('.partner-dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
    });
}

// Auto-update dots on scroll
document.querySelector('.partner-scroll-container')?.addEventListener('scroll', function() {
    const container = this;
    const cardWidth = 268;
    const currentScroll = container.scrollLeft;
    const activeIndex = Math.round(currentScroll / (cardWidth * 4));
    
    document.querySelectorAll('.partner-dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === activeIndex);
    });
});
</script>

@endsection
