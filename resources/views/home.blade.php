@extends('layouts.app')

@section('title', 'Home - Company Profile')

@section('content')
<!-- Hero Banner/Slider -->
@if($banners->count() > 0)
<section class="hero-slider">
    <style>
    @media (max-width: 767.98px) {
        .hero-title {
            font-size: 1.3rem !important;
        }
        .hero-description {
            font-size: 1rem !important;
        }
        .hero-content {
            padding: 1.2rem 0.5rem !important;
        }
        .section-title {
            font-size: 1.2rem !important;
        }
        .img-fluid.rounded {
            max-width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }
    }
    
    /* Category card styling */
    .category-card-link {
        display: block;
        text-decoration: none;
        color: inherit;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .category-card-link:hover {
        transform: translateY(-5px);
    }

    .category-card-link:hover .category-card {
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    /* Product Grid - Fixed centering and premium width */
    .home-product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 24px;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        justify-content: center;
    }

    /* Product card styling - refined ecommerce look */
    .product-card-link {
        display: block;
        text-decoration: none;
        color: inherit;
        width: 100%;
    }

    .product-card {
        width: 100% !important;
        max-width: 100% !important;
        background-color: #ffffff;
        border: 1px solid #e5e7eb;
        display: flex;
        flex-direction: column;
        transition: box-shadow 0.2s ease, transform 0.2s ease;
        border-radius: 8px; /* Refined roundness */
        overflow: hidden;
        height: 100%;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05); /* Base shadow */
    }

    .product-card-link:hover .product-card {
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transform: translateY(-4px);
    }

    /* Image area */
    .product-card-img-wrap {
        width: 100%;
        aspect-ratio: 1 / 1;
        position: relative;
        background-color: #fff;
        overflow: hidden;
    }

    .product-card-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        transition: transform 0.3s ease;
    }

    .product-card-link:hover .product-card-img {
        transform: scale(1.05);
    }

    /* Refined Overlay for Ecommerce Look */
    .product-card-img-wrap::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: #000;
    }

    .product-card-badge {
        position: absolute;
        top: 0;
        right: 0;
        background: linear-gradient(135deg, #f78b00 0%, #f76f00 100%);
        color: white;
        padding: 4px 12px;
        font-size: 10px;
        font-weight: bold;
        text-transform: uppercase;
        border-bottom-left-radius: 8px;
        z-index: 2;
        box-shadow: -2px 2px 5px rgba(0,0,0,0.1);
    }

    /* Content area */
    .product-card-body {
        padding: 14px 16px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .product-name {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        line-height: 1.4;
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 40px; /* Refined height */
    }

    .product-label {
        font-size: 11px;
        color: #999;
        margin-bottom: 2px;
    }

    .product-price {
        font-size: 16px;
        font-weight: 700;
        color: #f78b00;
        margin-bottom: 12px;
    }

    .product-meta {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #f2f2f2;
        padding-top: 8px;
        gap: 8px;
    }

    .product-location {
        font-size: 11px;
        color: #1a5fa8;
        display: flex;
        align-items: center;
        gap: 4px;
        font-weight: 500;
    }

    .product-type {
        font-size: 11px;
        color: #888;
        background: #f4f4f4;
        padding: 2px 6px;
        border-radius: 4px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .hero-title {
            font-size: 1.3rem !important;
        }
        .hero-description {
            font-size: 1rem !important;
        }
        .hero-content {
            padding: 1.2rem 0.5rem !important;
        }
        .section-title {
            font-size: 1.2rem !important;
        }
        .img-fluid.rounded {
            max-width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }
        
        /* Product cards mobile responsiveness */
        .product-card {
            margin-bottom: 1rem;
        }
        
        .product-card-img-wrap {
            aspect-ratio: 1 / 1;
            height: auto !important;
        }
        
        .product-card-img {
            aspect-ratio: 1 / 1;
            height: auto !important;
        }
        
        .product-card-body {
            padding: 1rem !important;
        }
        
        .product-name {
            font-size: 1rem !important;
            line-height: 1.3 !important;
        }
        
        .product-price {
            font-size: 1.1rem !important;
        }
        
        .product-location {
            font-size: 0.8rem !important;
        }
        
        .product-type {
            font-size: 0.8rem !important;
        }
        
        /* Product grid mobile adjustments */
        .row.g-3 .col-sm-6 {
            margin-bottom: 1rem;
        }
        
        .row.g-3 .col-12 {
            margin-bottom: 1rem;
        }
        
        /* Category cards mobile responsiveness */
        .category-card-link {
            display: block;
            text-decoration: none;
            color: inherit;
            width: 100%;
        }
        
        .category-card {
            margin-bottom: 1rem;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .category-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }
        
        .category-card .p-4 {
            padding: 1rem !important;
        }
        
        .category-card h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }
        
        .category-card p {
            font-size: 0.9rem;
            line-height: 1.4;
            margin-bottom: 0;
        }
        
        /* "Lihat Semua" button mobile */
        .btn-outline-primary {
            width: 100%;
            padding: 12px 20px;
            font-size: 0.95rem;
            border-radius: 8px;
            margin-top: 1rem;
        }
        
        /* Section title mobile */
        .section-title {
            font-size: 1.5rem !important;
            margin-bottom: 0.5rem;
        }
        
        .lead {
            font-size: 1rem !important;
            margin-bottom: 1rem;
        }
    }
    
    /* Tablet responsive adjustments */
    @media (max-width: 991.98px) and (min-width: 768px) {
        .product-card {
            margin-bottom: 1rem;
        }
        
        .product-card-img-wrap {
            aspect-ratio: 1 / 1;
            height: auto !important;
        }
        
        .product-card-img {
            aspect-ratio: 1 / 1;
            height: auto !important;
        }
        
        .product-name {
            font-size: 0.95rem !important;
        }
        
        .product-price {
            font-size: 1.05rem !important;
        }
        
        .product-location, .product-type {
            font-size: 0.85rem !important;
        }
    }
    
    /* Small mobile adjustments */
    @media (max-width: 575.98px) {
        .product-card {
            margin-bottom: 1rem;
        }
        
        .product-card-img-wrap {
            aspect-ratio: 1 / 1;
            height: auto !important;
        }
        
        .product-card-img {
            aspect-ratio: 1 / 1;
            height: auto !important;
        }
        
        .product-card-body {
            padding: 0.8rem !important;
        }
        
        .product-name {
            font-size: 0.9rem !important;
            line-height: 1.2 !important;
        }
        
        .product-price {
            font-size: 1rem !important;
        }
        
        .product-location, .product-type {
            font-size: 0.75rem !important;
        }
    }
    </style>
    @foreach($banners as $index => $banner)
        <div class="hero-slide {{ $index == 0 ? 'active' : '' }}" style="background-image: url({{ asset($banner->image) }})">
            <div class="hero-overlay"></div>
            <div class="hero-content-wrapper">
                <div class="container">
                    <div class="hero-content">
                        @if($banner->title)
                            <h1 class="hero-title">{{ $banner->title }}</h1>
                        @endif
                        @if($banner->description)
                            <p class="hero-description">{{ $banner->description }}</p>
                        @endif
                        @if($banner->button_text && $banner->button_link)
                            <a href="{{ $banner->button_link }}" class="hero-button">{{ $banner->button_text }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    @if($banners->count() > 1)
        <div class="slider-dots">
            @foreach($banners as $index => $banner)
                <div class="dot {{ $index == 0 ? 'active' : '' }}" data-slide="{{ $index }}"></div>
            @endforeach
        </div>
    @endif
</section>
@endif

<!-- Tentang Perusahaan -->
@if($companyProfile)
    @include('partials.about-section', ['company' => $companyProfile, 'showButton' => true, 'limitDescription' => true])
@endif

<!-- Solusi Terbaik -->
@if($categories->count() > 0)
<section class="section-padding bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-star text-warning me-3" style="font-size: 2rem;"></i>
                    <h3 class="mb-0 fw-bold">Solusi Terbaik</h3>
                </div>
                <p class="lead">Solusi lengkap kebutuhan operasional bisnis dan instansi.</p>
            </div>
            <div class="col-lg-4 text-end">
                <a href="{{ route('products.page') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right me-2"></i>Lihat Semua
                </a>
            </div>
        </div>
        
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('products.page') }}" class="category-card-link">
                        <div class="category-card">
                            @if($category->image)
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                            @endif
                            <div class="p-4">
                                <h4 class="fw-bold">{{ $category->name }}</h4>
                                <p class="text-muted">{{ $category->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Legalitas & Kepatuhan -->
@if($legalities->count() > 0)
<section class="legality-section section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <p class="mb-2" style="color: var(--primary-blue); font-weight: bold; font-size: 1.2rem;">Legalitas & Kepatuhan</p>
            <h2 class="section-title">
                <span style="color: var(--primary-blue);">Kami berkomitmen pada</span><br>
                <span style="color: var(--primary-orange);">Standar Tertinggi</span>
            </h2>
            <p class="lead">Terdaftar resmi dan mematuhi regulasi untuk setiap layanan yang disediakan.</p>
        </div>
        
        <div class="row">
            @foreach($legalities as $legality)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="legality-card">
                        @if($legality->icon)
                            <div class="icon">
                                <i class="{{ $legality->icon }}"></i>
                            </div>
                        @endif
                        <h5 class="fw-bold">{{ $legality->title }}</h5>
                        <div class="divider"></div>
                        <p>{{ $legality->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Proses Kerja Kami -->
@if($workProcesses->count() > 0)
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <div class="d-inline-flex align-items-center mb-3">
                <div style="width: 50px; height: 3px; background: var(--primary-orange); margin-right: 15px;"></div>
                <span class="text-uppercase fw-bold">Cara Kerja</span>
            </div>
            <h2 class="section-title">
                <span style="color: var(--primary-blue);">Proses Kerja</span> 
                <span style="color: var(--primary-orange);">Kami</span>
            </h2>
            <p class="lead">Sistematis, transparan, dan sesuai regulasi.</p>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="process-timeline-horizontal">
                    @foreach($workProcesses as $index => $process)
                        <div class="process-step-horizontal">
                            <div class="process-number-horizontal">{{ $process->step_number }}</div>
                            <div class="process-content-horizontal">
                                <h4 class="process-title-horizontal">{{ $process->title }}</h4>
                                <p class="process-description-horizontal">{{ $process->description }}</p>
                            </div>
                            @if($index < $workProcesses->count() - 1)
                                <div class="process-connector"></div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Mitra Brand -->
@if($partners->count() > 0)
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" style="color: var(--primary-orange);">Mitra Brand</h2>
            <p class="lead">Kami berkolaborasi dengan berbagai brand terpercaya.</p>
        </div>
        
        <div class="row">
            @foreach($partners as $partner)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="partner-logo">
                        @if($partner->logo)
                            <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}">
                        @else
                            <span class="text-muted">{{ $partner->name }}</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Produk Terbaik -->
@if(count($products) > 0)
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Produk Terbaik</h2>
            <div class="d-flex justify-content-center">
                <div style="width: 100px; height: 3px; background: var(--primary-orange);"></div>
            </div>
        </div>
        
        <div class="home-product-grid">
            @forelse($products as $product)
                @if(isset($product['slug']))
                    <a href="https://ayobelanja.co.id/products/{{ $product['slug'] }}" target="_blank" rel="noopener noreferrer" class="product-card-link">
                @endif
                <div class="product-card">
                    <div class="product-card-img-wrap">
                        @if($product['image_url'] ?? $product->image ?? null)
                            <img src="{{ $product['image_url'] ?? asset($product->image) }}" alt="{{ $product['nama_produk'] ?? $product->name }}" class="product-card-img">
                        @endif
                    </div>
                    <div class="product-card-body">
                        <h5 class="product-name">{{ $product['nama_produk'] ?? $product->name }}</h5>
                        @if(isset($product['harga_produk']) || isset($product->price))
                            <div class="product-label">Mulai dari</div>
                            <div class="product-price">Rp {{ number_format($product['harga_produk'] ?? $product->price, 0, ',', '.') }}</div>
                        @endif
                        <div class="product-meta">
                            <div class="product-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $product['asal_produk'] ?? $product->location ?? 'Indonesia' }}</span>
                            </div>
                            @if($product['tipe_produk'] ?? $product->type ?? null)
                                <div class="product-type">{{ $product['tipe_produk'] ?? $product->type }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @if(isset($product['slug']))
                    </a>
                @endif
            @empty
                <div class="text-center w-100">
                    <p class="text-muted">Produk tidak tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('products.page') }}" class="btn btn-contact">Lihat Selengkapnya</a>
        </div>
    </div>
</section>
@endif

<!-- Platform Digital -->
@if(isset($platforms) && $platforms->count() > 0)
<section class="section-padding">
    <style>
        #platformCarousel .carousel-indicators {
            margin-bottom: -40px;
        }
        #platformCarousel .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 6px;
            background-color: rgba(255, 255, 255, 0.4);
            border: none;
            transition: all 0.3s ease;
        }
        #platformCarousel .carousel-indicators button.active {
            background-color: var(--primary-orange);
            transform: scale(1.3);
        }
        #platformCarousel .carousel-control-prev,
        #platformCarousel .carousel-control-next {
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.8;
            transition: all 0.3s ease;
            z-index: 5;
        }
        #platformCarousel .carousel-control-prev {
            left: -20px;
        }
        #platformCarousel .carousel-control-next {
            right: -20px;
        }
        #platformCarousel .carousel-control-prev:hover,
        #platformCarousel .carousel-control-next:hover {
            background: var(--primary-orange);
            opacity: 1;
            box-shadow: 0 4px 15px rgba(254, 152, 0, 0.4);
        }
        @media (max-width: 768px) {
            #platformCarousel .carousel-control-prev { left: -10px; }
            #platformCarousel .carousel-control-next { right: -10px; }
        }
    </style>
    <div class="platform-section position-relative">
        <div id="platformCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            @if($platforms->count() > 1)
            <div class="carousel-indicators">
                @foreach($platforms as $index => $platform)
                    <button type="button" data-bs-target="#platformCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            @endif

            <div class="carousel-inner">
                @foreach($platforms as $index => $platform)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4">
                            <span class="platform-tag">Platform Digital</span>
                            <h2 class="platform-title">
                                {{ $platform->title ?? 'Platform Digital' }}<br>
                                @if(!empty($platform->clean_url))
                                    <span class="highlight">{{ $platform->clean_url }}</span>
                                @endif
                            </h2>
                            <p class="lead mb-4">{{ $platform->description }}</p>
                            
                            @if($platform->features)
                                <ul class="platform-features">
                                    @foreach($platform->features as $feature)
                                        <li>
                                            <i class="fas fa-check-circle check-icon"></i>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            
                            @if($platform->platform_url)
                            <a href="{{ $platform->platform_url }}" class="btn btn-platform" target="_blank">
                                Lihat Selengkapnya
                            </a>
                            @endif
                        </div>
                        <div class="col-lg-6 mb-4">
                            @if($platform->image)
                                <img src="{{ asset($platform->image) }}" alt="{{ $platform->title }}" class="img-fluid rounded">
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($platforms->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#platformCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#platformCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
    </div>
</section>
@endif
@endsection

@section('scripts')
@if($banners->count() > 1)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.dot');
    let currentSlide = 0;
    let slideInterval;
    
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }
    
    function nextSlide() {
        const nextIndex = (currentSlide + 1) % slides.length;
        showSlide(nextIndex);
    }
    
    function startSlideshow() {
        slideInterval = setInterval(nextSlide, 5000);
    }
    
    function stopSlideshow() {
        clearInterval(slideInterval);
    }
    
    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            stopSlideshow();
            startSlideshow();
        });
    });
    
    // Start automatic slideshow
    startSlideshow();
    
    // Pause on hover
    const slider = document.querySelector('.hero-slider');
    slider.addEventListener('mouseenter', stopSlideshow);
    slider.addEventListener('mouseleave', startSlideshow);
});
</script>
@endif
@endsection
