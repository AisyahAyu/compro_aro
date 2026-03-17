@extends('layouts.app')

@section('title', 'Home - Company Profile')

@section('content')
<!-- Hero Banner/Slider -->
@if($banners->count() > 0)
<section class="hero-slider">
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
                <a href="#tentang" class="btn btn-contact">Lihat Selengkapnya</a>
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
                <a href="#produk" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right me-2"></i>Lihat Semua
                </a>
            </div>
        </div>
        
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="category-card">
                        @if($category->image)
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                        @endif
                        <div class="p-4">
                            <h4 class="fw-bold">{{ $category->name }}</h4>
                            <p class="text-muted">{{ $category->description }}</p>
                        </div>
                    </div>
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
            @foreach($products as $product)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="product-card">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        @endif
                        <div class="product-info">
                            <h5 class="product-name">{{ $product->name }}</h5>
                            <div class="product-meta">
                                <span class="product-location">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $product->location }}
                                </span>
                                <span class="product-rating">
                                    <i class="fas fa-star me-1"></i>{{ $product->rating }}
                                </span>
                            </div>
                            <p class="product-type">Tipe: {{ $product->type }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="#produk" class="btn btn-contact">Lihat Selengkapnya</a>
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
