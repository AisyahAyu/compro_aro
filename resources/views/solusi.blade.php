@extends('layouts.app')
@section('title', 'Solusi - PT. Aro Baskara Esa')

@section('content')
<style>
body {
    background-color: white !important;
}

/* ==================== HERO ==================== */
.solusi-hero {
    position: relative;
    min-height: 600px;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    overflow: hidden;
}
.solusi-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0.2) 100%);
    z-index: 1;
}
.solusi-hero .container { position: relative; z-index: 2; }

.solusi-hero-title {
    font-size: 3rem;
    font-weight: 800;
    color: #333;
    line-height: 1.2;
    margin-bottom: 1.5rem;
    max-width: 550px;
}
.solusi-hero-title .highlight {
    color: var(--primary-orange);
    font-style: italic;
}
.solusi-hero-subtitle {
    color: rgba(51,51,51,0.9);
    font-size: 1.05rem;
    line-height: 1.7;
    margin-bottom: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}
.solusi-hero-subtitle i {
    color: var(--primary-orange);
    font-size: 1.1rem;
    flex-shrink: 0;
}
.solusi-hero-list {
    list-style: none;
    padding: 0;
    margin: 0 0 2.5rem 0;
}
.solusi-hero-list li {
    color: rgba(51,51,51,0.92);
    font-size: 1.05rem;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.solusi-hero-list li i {
    color: var(--primary-orange);
    font-size: 1.1rem;
    flex-shrink: 0;
}

/* Stats Row */
.solusi-stats {
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
}
.solusi-stat-item {
    text-align: left;
}
.solusi-stat-value {
    font-size: 2.5rem;
    font-weight: 800;
    color: #333;
    line-height: 1;
    margin-bottom: 2px;
}
.solusi-stat-value span { color: var(--primary-orange); }
.solusi-stat-label {
    color: rgba(51,51,51,0.7);
    font-size: 0.9rem;
}

/* ==================== INTRO ==================== */
.solusi-intro {
    padding: 80px 0 40px;
    text-align: center;
}
.solusi-intro-badge {
    color: var(--primary-orange);
    font-weight: 700;
    font-size: 0.9rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 10px;
}
.solusi-intro-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--primary-blue);
    margin-bottom: 8px;
}
.solusi-intro-title .highlight {
    color: var(--primary-orange);
}
.solusi-intro-desc {
    color: #666;
    font-size: 1.05rem;
    max-width: 650px;
    margin: 0 auto;
    line-height: 1.7;
}

/* ==================== SOLUTION CARDS ==================== */
.solusi-card-section {
    padding: 40px 0 80px;
}
.solusi-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 35px rgba(0,0,0,0.08);
    margin-bottom: 50px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #f0f0f0;
}
.solusi-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 50px rgba(0,0,0,0.12);
}
.solusi-card .row { min-height: 400px; }

/* Number badge */
.solusi-card-number {
    position: absolute;
    top: 15px;
    font-size: 7rem;
    font-weight: 900;
    color: rgba(0,0,0,0.04);
    line-height: 1;
    z-index: 1;
    pointer-events: none;
    user-select: none;
}
.solusi-card-number.right { right: 25px; }
.solusi-card-number.left { left: 25px; }

/* Image side */
.solusi-card-img-wrap {
    position: relative;
    height: 100%;
    min-height: 380px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
}
.solusi-card-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.solusi-card:hover .solusi-card-img-wrap img {
    transform: scale(1.05);
}

/* Content side */
.solusi-card-content {
    padding: 40px 35px;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.solusi-card-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #fff8ef;
    border: 1px solid #fde8c8;
    color: var(--primary-orange);
    font-weight: 600;
    font-size: 0.8rem;
    padding: 5px 14px;
    border-radius: 20px;
    width: fit-content;
    margin-bottom: 12px;
}
.solusi-card-badge i { font-size: 0.75rem; }
.solusi-card-title {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary-blue);
    margin-bottom: 5px;
    line-height: 1.2;
}
.solusi-card-title .highlight { color: var(--primary-orange); }

/* Feature grid */
.solusi-feature-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px 20px;
    margin: 20px 0;
}
.solusi-feature-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-size: 0.9rem;
    color: #555;
    line-height: 1.4;
}
.solusi-feature-item i {
    color: var(--primary-orange);
    font-size: 0.85rem;
    margin-top: 3px;
    flex-shrink: 0;
}

/* Bottom highlights */
.solusi-card-highlights {
    display: flex;
    gap: 20px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #f0f0f0;
    flex-wrap: wrap;
}
.solusi-highlight-item {
    display: flex;
    align-items: center;
    gap: 10px;
}
.solusi-highlight-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, #fff4e0, #ffe8c2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-orange);
    font-size: 1rem;
    flex-shrink: 0;
}
.solusi-highlight-title {
    font-weight: 700;
    font-size: 0.85rem;
    color: var(--primary-blue);
    line-height: 1.2;
}
.solusi-highlight-desc {
    font-size: 0.75rem;
    color: #999;
    line-height: 1.3;
}

/* ==================== CTA ==================== */
.solusi-cta {
    background: var(--dark-blue);
    border-radius: 25px;
    padding: 50px 60px;
    margin: 0 15px 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}
.solusi-cta-title {
    font-size: 1.8rem;
    font-weight: 800;
    color: #fff;
    margin: 0;
    line-height: 1.3;
}
.solusi-cta-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}
.btn-cta-primary {
    background: var(--primary-orange);
    color: #fff;
    border: none;
    padding: 12px 28px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.btn-cta-primary:hover {
    background: #e68900;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(254,152,0,0.35);
}
.btn-cta-secondary {
    background: transparent;
    color: #fff;
    border: 2px solid rgba(255,255,255,0.4);
    padding: 12px 28px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.btn-cta-secondary:hover {
    border-color: var(--primary-orange);
    color: var(--primary-orange);
    transform: translateY(-2px);
}

/* ==================== RESPONSIVE ==================== */
@media (max-width: 991px) {
    .solusi-hero { min-height: 500px; }
    .solusi-hero-title { font-size: 2.2rem; }
    .solusi-stat-value { font-size: 2rem; }
    .solusi-card-content { padding: 30px 25px; }
    .solusi-card-img-wrap { min-height: 280px; }
    .solusi-card .row { min-height: auto; }
    .solusi-cta { padding: 40px 30px; }
    .solusi-cta-title { font-size: 1.4rem; }
    .solusi-feature-grid { grid-template-columns: 1fr; }
}
@media (max-width: 767px) {
    .solusi-hero { min-height: 450px; padding: 100px 0 40px; }
    .solusi-hero-title { font-size: 1.8rem; }
    .solusi-stat-value { font-size: 1.8rem; }
    .solusi-stats { gap: 25px; }
    .solusi-intro-title { font-size: 1.6rem; }
    .solusi-card-title { font-size: 1.4rem; }
    .solusi-card-number { font-size: 4rem; }
    .solusi-card-img-wrap { min-height: 250px; }
    .solusi-cta {
        padding: 30px 20px;
        border-radius: 18px;
        margin: 0 10px 60px;
        flex-direction: column;
        text-align: center;
    }
    .solusi-cta-buttons { justify-content: center; }
    .solusi-card-highlights { flex-direction: column; gap: 12px; }
}
</style>

{{-- ==================== HERO ==================== --}}
<section class="solusi-hero" style="background-image: url('{{ asset('uploads/banner_solusi.png') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1 class="solusi-hero-title">
                    Kami Hadir dengan<br>
                    <span class="highlight">Solusi Terlengkap</span><br>
                    untuk Anda
                </h1>
                <ul class="solusi-hero-list">
                    <li><i class="fas fa-check-circle"></i> Pengadaan satu pintu untuk semua kebutuhan bisnis</li>
                    <li><i class="fas fa-check-circle"></i> Kualitas produk terjamin dengan garansi performa resmi</li>
                    <li><i class="fas fa-check-circle"></i> Konsultasi & solusi khusus untuk institusi pemerintahan</li>
                </ul>

                {{-- Stats --}}
                <div class="solusi-stats">
                    @forelse($statistics as $stat)
                    <div class="solusi-stat-item">
                        <div class="solusi-stat-value">{{ $stat->title }}<span>+</span></div>
                        <div class="solusi-stat-label">{{ $stat->suffix ?? '' }}</div>
                    </div>
                    @empty
                    <div class="solusi-stat-item">
                        <div class="solusi-stat-value">500<span>+</span></div>
                        <div class="solusi-stat-label">Produk</div>
                    </div>
                    <div class="solusi-stat-item">
                        <div class="solusi-stat-value">12<span>+</span></div>
                        <div class="solusi-stat-label">Kepuasan</div>
                    </div>
                    <div class="solusi-stat-item">
                        <div class="solusi-stat-value">20<span>+</span></div>
                        <div class="solusi-stat-label">Klien</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== INTRO ==================== --}}
<section class="solusi-intro">
    <div class="container">
        <p class="solusi-intro-badge">PRODUK KAMI</p>
        <h2 class="solusi-intro-title">
            Transformasi Bisnis Anda dengan<br>
            <span class="highlight">Solusi Terintegrasi</span>
        </h2>
        <p class="solusi-intro-desc">
            Dari produk eksklusif kami hingga distribusi brand ternama, temukan bagaimana solusi kami mendorong efisiensi operasional dan keberhasilan bisnis Anda.
        </p>
    </div>
</section>

{{-- ==================== SOLUTION CARDS ==================== --}}
<section class="solusi-card-section">
    <div class="container">
        @forelse($categories as $index => $category)
        <div class="solusi-card">
            <div class="row g-0 {{ $index % 2 != 0 ? 'flex-row-reverse' : '' }}">
                {{-- Image Side --}}
                <div class="col-lg-5">
                    <div class="solusi-card-img-wrap">
                        <span class="solusi-card-number {{ $index % 2 != 0 ? 'left' : 'right' }}">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        @if($category->image)
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center w-100 h-100" style="background: linear-gradient(135deg, #f0f4ff, #e8f0fe);">
                                <i class="fas fa-box-open" style="font-size: 4rem; color: #ccc;"></i>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Content Side --}}
                <div class="col-lg-7">
                    <div class="solusi-card-content">
                        <div class="solusi-card-badge">
                            <i class="fas fa-couch"></i> {{ $category->name }}
                        </div>
                        <h3 class="solusi-card-title">
                            {{ $category->name }}<br>
                            <span class="highlight">{{ $category->subtitle ?? 'Series Pro' }}</span>
                        </h3>

                        {{-- Dynamic Features List --}}
                        <div class="solusi-feature-grid">
                            @if($category->features && is_array($category->features) && count($category->features) > 0)
                                @foreach($category->features as $feature)
                                    <div class="solusi-feature-item">
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ $feature }}</span>
                                    </div>
                                @endforeach
                            @else
                                {{-- Fallback for older categories --}}
                                @php
                                    $descParts = preg_split('/[.\n]+/', $category->description);
                                    $descParts = array_filter(array_map('trim', $descParts));
                                    if(count($descParts) <= 1) $descParts = [$category->description];
                                @endphp
                                @foreach($descParts as $part)
                                    @if(!empty($part))
                                    <div class="solusi-feature-item">
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ $part }}</span>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        {{-- Dynamic Highlights --}}
                        <div class="solusi-card-highlights">
                            @if($category->highlights && is_array($category->highlights) && count($category->highlights) > 0)
                                @foreach($category->highlights as $highlight)
                                    <div class="solusi-highlight-item">
                                        <div class="solusi-highlight-icon">
                                            <i class="{{ $highlight['icon'] ?? 'fas fa-check' }}"></i>
                                        </div>
                                        <div>
                                            <div class="solusi-highlight-title">{{ $highlight['title'] ?? '' }}</div>
                                            <div class="solusi-highlight-desc">{{ $highlight['desc'] ?? '' }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- Fallback to default check icons if empty --}}
                                <div class="text-muted"><small>Detail teknis belum diatur</small></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <p class="text-muted">Belum ada kategori solusi tersedia.</p>
        </div>
        @endforelse
    </div>
</section>

{{-- ==================== CTA ==================== --}}
<div class="container">
    <div class="solusi-cta">
        <h3 class="solusi-cta-title">
            Butuh Solusi Khusus<br>
            untuk Bisnis Anda?
        </h3>
        <div class="solusi-cta-buttons">
            <a href="{{ route('contact.page') }}" class="btn-cta-primary">
                <i class="fas fa-headset"></i> Konsultasi Gratis
            </a>
            @php
                $ecommerceUrl = null;
                if(isset($platforms) && $platforms->count() > 0) {
                    $ecommerceUrl = $platforms->first()->platform_url;
                }
            @endphp
            @if($ecommerceUrl)
            <a href="{{ $ecommerceUrl }}" target="_blank" class="btn-cta-secondary">
                <i class="fas fa-shopping-bag"></i> Lihat E-Belanja
            </a>
            @else
            <a href="{{ route('products.page') }}" class="btn-cta-secondary">
                <i class="fas fa-shopping-bag"></i> Lihat Produk
            </a>
            @endif
        </div>
    </div>
</div>
@endsection
