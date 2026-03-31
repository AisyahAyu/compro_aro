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
    
    /* Product card styling - exact copy from products page */
    .product-card-link {
        display: block;
        text-decoration: none;
        color: inherit;
        width: 200px;
    }

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

    .product-card {
        width: 200px;
        min-height: 350px;
        background-color: #ffffff;
        border: 1px solid #e5e7eb;
        display: flex;
        flex-direction: column;
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .product-card-link:hover .product-card {
        box-shadow: 0 6px 18px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    /* Image area */
    .product-card-img-wrap {
        width: 100%;
        height: 200px;
        position: relative;
        background-color: #fff;
        border-bottom: 3px solid #000000;
    }

    .product-card-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    /* Content area */
    .product-card-body {
        padding: 12px 16px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .product-name {
        font-size: 13px;
        font-weight: 500;
        color: #333;
        line-height: 1.4;
        margin-bottom: 8px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-label {
        font-size: 11px;
        color: #888;
        margin-bottom: 2px;
    }

    .product-price {
        font-size: 15px;
        font-weight: 700;
        color: #E5A800;
        margin-bottom: 8px;
    }

    .product-meta {
        margin-top: auto;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .product-location {
        font-size: 11px;
        color: #1a5fa8;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .product-type {
        font-size: 11px;
        color: #888;
    }
    
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .product-card {
            min-height: 320px;
        }
    }
    </style>
    @foreach($banners as $index => $banner)
        <div class="hero-slide {{ $index == 0 ? 'active' : '' }}" style="background-image: url({{ asset($banner->image) }})">
            <div class="hero-overlay"></div>
            <div class="hero-content-wrapper">
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
<section id="tentang" class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                @if($companyProfile->image)
                    <img src="{{ asset($companyProfile->image) }}" alt="{{ $companyProfile->company_name }}" class="img-fluid rounded">
                @endif
            </div>
            <div class="col-lg-6 mb-4">
                <h2 class="section-title">{{ $companyProfile->company_name }}</h2>
                <div class="divider-line mb-3"></div>
                <p class="lead">{{ Str::limit($companyProfile->description, 200) }}</p>
                <a href="{{ route('about.index') }}" class="btn btn-contact">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</section>
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
@if($products->count() > 0)
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Produk Terbaik</h2>
            <div class="d-flex justify-content-center">
                <div style="width: 100px; height: 3px; background: var(--primary-orange);"></div>
            </div>
        </div>
        
        <div class="row mb-4">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-6 mb-4">
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
                                    {{ $product['asal_produk'] ?? $product->location ?? 'Indonesia' }}
                                </div>
                                @if($product['rating'] ?? $product->rating ?? null)
                                    <div class="product-rating">
                                        <i class="fas fa-star"></i>
                                        {{ $product['rating'] ?? $product->rating }}
                                    </div>
                                @endif
                                @if($product['tipe_produk'] ?? $product->type ?? null)
                                    <div class="product-type">Tipe: {{ $product['tipe_produk'] ?? $product->type }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(isset($product['slug']))
                        </a>
                    @endif
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Produk tidak tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center">
            <a href="{{ route('products.page') }}" class="btn btn-contact">Lihat Selengkapnya</a>
        </div>
    </div>
</section>
@endif

<!-- Platform Digital -->
@if($platform)
<section class="section-padding">
    <div class="platform-section">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <span class="platform-tag">Platform Digital</span>
                <h2 class="platform-title">
                    Belanja Mudah di<br>
                    <span class="highlight">{{ $platform->clean_url ?? 'ayobelanja.co.id' }}</span>
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
                
                <a href="{{ $platform->platform_url }}" class="btn btn-platform" target="_blank">
                    Lihat Selengkapnya
                </a>
            </div>
            <div class="col-lg-6 mb-4">
                @if($platform->image)
                    <img src="{{ asset($platform->image) }}" alt="{{ $platform->title }}" class="img-fluid rounded">
                @endif
            </div>
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
