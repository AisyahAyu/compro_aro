@extends('layouts.app')

@section('title', 'Home - Company Profile')

@section('content')
<!-- Hero Banner/Slider -->
@if($banners->count() > 0)
<section class="hero-slider">
    <style>

    
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
                    <div class="hero-content home-hero">
                        @if($banner->title)
                            <h1 class="hero-title">{{ $banner->title }}</h1>
                        @endif
                        @if($banner->description)
                            <p class="hero-description">{{ $banner->description }}</p>
                        @endif
                        @if($banner->button_text)
                            @if($banner->button_link && $banner->button_link != '#produk')
                                <a href="{{ $banner->button_link }}" class="hero-button">{{ $banner->button_text }}</a>
                            @else
                                <a href="{{ route('products.page') }}" class="hero-button">{{ $banner->button_text }}</a>
                            @endif
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
<section class="solutions-premium-section section-padding">
    <!-- Decorative Background -->
    <div class="bg-decorative-solutions">
        <div class="blur-shape blur-1"></div>
        <div class="blur-shape blur-2"></div>
        <div class="blur-shape blur-3"></div>
    </div>
    
    <div class="container">
        <!-- Modern Section Header -->
        <div class="text-center mb-5">
            <div class="section-header-premium">
                <div class="icon-wrapper">
                    <i class="fas fa-rocket"></i>
                </div>
                <h2 class="solutions-premium-title">Solusi Terbaik</h2>
                <div class="title-underline-premium"></div>
            </div>
            <p class="solutions-premium-subtitle">Solusi lengkap kebutuhan operasional bisnis dan instansi</p>
        </div>
        
        <!-- Dynamic Cards Grid -->
        <div class="solutions-grid-premium">
            @foreach($categories as $index => $category)
                <div class="solution-card-premium scroll-reveal" style="animation-delay: {{ $index * 0.15 }}s;">
                    <a href="{{ route('products.page', ['category' => $category->id]) }}" class="card-inner" style="display: block; text-decoration: none;">
                        <!-- Image with Overlay -->
                        <div class="card-image-wrapper">
                            @if($category->image)
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="card-image">
                                <div class="image-overlay"></div>
                            @endif
                            
                            <!-- Category Badge -->
                            <div class="category-badge">
                                <i class="fas fa-tag"></i>
                                <span>{{ Str::limit($category->name, 15) }}</span>
                            </div>
                        </div>
                        
                        <!-- Card Content -->
                        <div class="card-content">
                            <div class="card-icon">
                                <i class="fas fa-cube"></i>
                            </div>
                            <h3 class="card-title">{{ $category->name }}</h3>
                            <p class="card-description">{{ Str::limit($category->description, 80) }}</p>
                            
                            <!-- Card Action -->
                            <div class="card-action">
                                <span class="action-text">Jelajahi</span>
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        
                        <!-- Hover Effects -->
                        <div class="card-effects">
                            <div class="glow-effect"></div>
                            <div class="border-effect"></div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <!-- Modern CTA Button -->
        <div class="text-center mt-5">
            <div class="cta-wrapper">
                <a href="{{ route('products.page') }}" class="cta-premium-btn">
                    <span>Lihat Semua</span>
                    <i class="fas fa-arrow-right"></i>
                    <div class="btn-glow"></div>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Premium Solutions Section */
.solutions-premium-section {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 50%, #ffffff 100%);
    padding: 120px 0;
    position: relative;
    overflow: hidden;
}


/* Decorative Background */
.bg-decorative-solutions {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.blur-shape {
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    opacity: 0.3;
    animation: floatShape 15s ease-in-out infinite;
}

.blur-1 {
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.4), transparent);
    top: -100px;
    right: -100px;
    animation-delay: 0s;
}

.blur-2 {
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(147, 51, 234, 0.3), transparent);
    bottom: -50px;
    left: 20%;
    animation-delay: 5s;
}

.blur-3 {
    width: 250px;
    height: 250px;
    background: radial-gradient(circle, rgba(79, 172, 254, 0.3), transparent);
    top: 30%;
    left: -50px;
    animation-delay: 10s;
}

@keyframes floatShape {
    0%, 100% { transform: translateY(0px) scale(1); }
    25% { transform: translateY(-30px) scale(1.05); }
    50% { transform: translateY(20px) scale(0.95); }
    75% { transform: translateY(-20px) scale(1.02); }
}

/* Section Header */
.section-header-premium {
    position: relative;
    z-index: 10;
}

.icon-wrapper {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: linear-gradient(45deg, #ff6b35, #ffa500);
    border-radius: 20px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
}

.icon-wrapper:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 12px 35px rgba(255, 107, 53, 0.4);
}

.icon-wrapper i {
    font-size: 1.5rem;
    color: white;
}

.solutions-premium-title {
    font-size: 3.5rem;
    font-weight: 900;
    color: #2d3748;
    margin-bottom: 15px;
    letter-spacing: -1px;
    position: relative;
}

.title-underline-premium {
    width: 120px;
    height: 4px;
    background: linear-gradient(90deg, #ff6b35, #ffa500, #ff6b35);
    margin: 0 auto 30px;
    border-radius: 2px;
    position: relative;
    overflow: hidden;
}

.title-underline-premium::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
    animation: shimmer 3s ease-in-out infinite;
}

@keyframes shimmer {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
}

.solutions-premium-subtitle {
    font-size: 1.2rem;
    color: #718096;
    max-width: 600px;
    margin: 0 auto 40px;
    font-weight: 300;
    line-height: 1.6;
}

/* Modern CTA Button */
.cta-wrapper {
    position: relative;
    z-index: 10;
}

.cta-premium-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 18px 40px;
    background: linear-gradient(45deg, #ff6b35, #ffa500);
    background-size: 200% 200%;
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
    animation: btnGradient 3s ease infinite;
}

@keyframes btnGradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.cta-premium-btn:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow: 0 20px 40px rgba(255, 107, 53, 0.4);
}

.cta-premium-btn i {
    transition: transform 0.3s ease;
}

.cta-premium-btn:hover i {
    transform: translateX(5px);
}

.btn-glow {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, rgba(255, 255, 255, 0.3), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.cta-premium-btn:hover .btn-glow {
    opacity: 1;
}

/* Dynamic Cards Grid */
.solutions-grid-premium {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 350px));
    justify-content: center;
    gap: 30px;
    margin-top: 80px;
    position: relative;
    z-index: 10;
}

.solution-card-premium {
    opacity: 0;
    transform: translateY(50px);
    animation: fadeInUpPremium 0.8s ease forwards;
}

@keyframes fadeInUpPremium {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card-inner {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    overflow: hidden;
    position: relative;
    transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.card-inner:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
    background: rgba(255, 255, 255, 1);
}

/* Card Image */
.card-image-wrapper {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.card-inner:hover .card-image {
    transform: scale(1.1);
    filter: brightness(1.1) saturate(1.2);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(79, 172, 254, 0.1));
    opacity: 0;
    transition: all 0.8s ease;
}

.card-inner:hover .image-overlay {
    opacity: 1;
}

/* Category Badge */
.category-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #ff6b35;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    z-index: 5;
    transition: all 0.3s ease;
}

.category-badge i {
    font-size: 0.7rem;
}

.card-inner:hover .category-badge {
    transform: translateY(-2px);
    background: rgba(255, 255, 255, 1);
}

/* Card Content */
.card-content {
    padding: 30px;
    position: relative;
    z-index: 5;
}

.card-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    background: linear-gradient(45deg, #ff6b35, #ffa500);
    border-radius: 15px;
    margin-bottom: 20px;
    color: white;
    font-size: 1.2rem;
    box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
    transition: all 0.3s ease;
}

.card-inner:hover .card-icon {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 12px 30px rgba(255, 107, 53, 0.4);
}

.card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 12px;
    line-height: 1.3;
}

.card-description {
    color: #718096;
    line-height: 1.6;
    margin-bottom: 25px;
    font-size: 0.95rem;
}

.card-action {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #ff6b35;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.card-action i {
    transition: transform 0.3s ease;
}

.card-inner:hover .card-action {
    color: #ffa500;
}

.card-inner:hover .card-action i {
    transform: translateX(5px);
}

/* Card Effects */
.card-effects {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    border-radius: 24px;
    overflow: hidden;
}

.glow-effect {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 107, 53, 0.1), transparent);
    opacity: 0;
    transition: all 0.6s ease;
    animation: rotateGlow 8s linear infinite;
}

@keyframes rotateGlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.card-inner:hover .glow-effect {
    opacity: 1;
}

.border-effect {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 24px;
    padding: 2px;
    background: linear-gradient(45deg, #ff6b35, #ffa500, #ff8c42, #ff6b35);
    background-size: 300% 300%;
    animation: borderGradient 4s ease infinite;
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.6s ease;
}

@keyframes borderGradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.card-inner:hover .border-effect {
    opacity: 1;
}

/* Responsive Design */
@media (max-width: 768px) {
    .solutions-premium-section {
        padding: 80px 0;
    }
    
    .solutions-premium-title {
        font-size: 2.5rem;
    }
    
    .solutions-premium-subtitle {
        font-size: 1rem;
    }
    
    .solutions-grid-premium {
        grid-template-columns: 1fr;
        gap: 30px;
        margin-top: 60px;
    }
    
    .card-content {
        padding: 25px;
    }
    
    .card-title {
        font-size: 1.3rem;
    }
    
    .cta-premium-btn {
        padding: 15px 30px;
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .solutions-premium-section {
        padding: 60px 0;
    }
    
    .solutions-premium-title {
        font-size: 2rem;
    }
    
    .icon-wrapper {
        width: 50px;
        height: 50px;
    }
    
    .icon-wrapper i {
        font-size: 1.2rem;
    }
    
    .card-image-wrapper {
        height: 180px;
    }
    
    .card-content {
        padding: 20px;
    }
    
    .category-badge {
        top: 15px;
        left: 15px;
        padding: 6px 12px;
        font-size: 0.7rem;
    }
}

/* Premium Orange Button */
.btn-premium-orange {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 15px 35px;
    background: linear-gradient(45deg, #ff6b35, #ffa500);
    background-size: 200% 200%;
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
    animation: btnOrangeGradient 3s ease infinite;
    border: none;
}

@keyframes btnOrangeGradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.btn-premium-orange:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow: 0 20px 40px rgba(255, 107, 53, 0.4);
    color: white;
    text-decoration: none;
}

.btn-premium-orange i {
    transition: transform 0.3s ease;
}

.btn-premium-orange:hover i {
    transform: translateX(5px);
}

.btn-premium-orange::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, rgba(255, 255, 255, 0.3), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.btn-premium-orange:hover::before {
    opacity: 1;
}

.btn-premium-orange:focus {
    outline: none;
    box-shadow: 0 20px 40px rgba(255, 107, 53, 0.4);
}

.btn-premium-orange:active {
    transform: translateY(-2px) scale(1.02);
}
</style>
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
<section class="section-padding" style="background-color: white;">
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
<style>
/* Best Products Section Animations */
@keyframes shimmer {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: 100%; }
}

@keyframes btnGradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.best-products-section .btn-premium-orange:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow: 0 20px 40px rgba(255, 107, 53, 0.4);
    color: white;
    text-decoration: none;
}

.best-products-section .btn-premium-orange:hover i {
    transform: translateX(3px);
    transition: transform 0.3s ease;
}

.best-products-section .btn-premium-orange i {
    transition: transform 0.3s ease;
}

/* Icon hover effect */
.best-products-section .text-center > div:first-child:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 12px 35px rgba(255, 107, 53, 0.4);
}

/* Product cards entrance animation */
.best-products-section .home-product-grid {
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .best-products-section .section-title {
        font-size: 2rem !important;
    }
    
    .best-products-section .lead {
        font-size: 1rem !important;
    }
    
    .best-products-section .btn-premium-orange {
        padding: 15px 30px !important;
        font-size: 1rem !important;
    }
}
</style>
<section class="best-products-section section-padding" style="position: relative; background-color: white; overflow: hidden;">
    <!-- Decorative Background Elements -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;">
        <div style="position: absolute; top: -100px; right: -100px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(255, 165, 0, 0.1), transparent); border-radius: 50%; filter: blur(60px);"></div>
        <div style="position: absolute; bottom: -50px; left: 10%; width: 250px; height: 250px; background: radial-gradient(circle, rgba(255, 107, 53, 0.08), transparent); border-radius: 50%; filter: blur(50px);"></div>
        <div style="position: absolute; top: 30%; left: -50px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(255, 165, 0, 0.06), transparent); border-radius: 50%; filter: blur(40px);"></div>
    </div>
    
    <div class="container" style="position: relative; z-index: 2;">
        <!-- Enhanced Section Header -->
        <div class="text-center mb-5">
            <div style="display: inline-flex; align-items: center; justify-content: center; width: 80px; height: 80px; background: linear-gradient(45deg, #ff6b35, #ffa500); border-radius: 20px; margin-bottom: 25px; box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3); transition: all 0.3s ease;">
                <i class="fas fa-star" style="font-size: 2rem; color: white;"></i>
            </div>
            <h2 class="section-title" style="font-size: 3rem; font-weight: 800; color: #2d3748; margin-bottom: 20px; position: relative;">
                Produk Terbaik
                <div style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 120px; height: 4px; background: linear-gradient(90deg, #ff6b35, #ffa500, #ff6b35); border-radius: 2px; overflow: hidden;">
                    <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent); /* animation: shimmer 3s ease-in-out infinite; */"></div>
                </div>
            </h2>
            <p class="lead" style="color: #718096; font-size: 1.2rem; max-width: 600px; margin: 30px auto 0; font-weight: 300;">
                Temukan pilihan produk unggulan kami dengan kualitas terbaik dan harga kompetitif
            </p>
        </div>
        
        <!-- Enhanced Product Grid Container -->
        <div class="home-product-grid" style="position: relative; padding: 20px 0;">
            @forelse($products as $product)
                <a href="{{ route('products.detail', $product->id) }}" class="product-card-link">
                    <div class="product-card">
                        <div class="product-card-img-wrap">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-card-img">
                            @endif
                        </div>
                        <div class="product-card-body">
                            <h5 class="product-name">{{ $product->name }}</h5>
                            <div class="product-meta">
                                <div class="product-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $product->country_of_origin ?? 'Indonesia' }}</span>
                                </div>
                                @if($product->type)
                                    <div class="product-type">{{ $product->type }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center w-100">
                    <p class="text-muted">Produk tidak tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
        
        <!-- Enhanced CTA Button -->
        <div class="text-center" style="margin-top: 50px; position: relative;">
            <div style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); width: 200px; height: 40px; background: radial-gradient(ellipse at center, rgba(255, 165, 0, 0.1), transparent); filter: blur(20px);"></div>
            <a href="{{ route('products.page') }}" class="btn btn-premium-orange" style="position: relative; z-index: 2; padding: 18px 45px; font-size: 1.1rem; font-weight: 700; background: linear-gradient(45deg, #ff6b35, #ffa500); background-size: 200% 200%; /* animation: btnGradient 3s ease infinite; */ box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3); border-radius: 50px; transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);">
                <i class="fas fa-shopping-bag me-2"></i>
                Lihat Selengkapnya
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
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
            #platformCarousel .carousel-control-prev { left: -15px; width: 35px; height: 35px; }
            #platformCarousel .carousel-control-next { right: -15px; width: 35px; height: 35px; }
            #platformCarousel .carousel-indicators { margin-bottom: -25px; }
            #platformCarousel .carousel-indicators button { width: 8px; height: 8px; margin: 0 4px; }
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
