@extends('layouts.app')

@section('title', 'Produk - Company Profile')

@section('content')
<style>
    .products-page {
        background: #f0f0f0;
        color: #1f1f1f;
    }

    .pp-hero {
        margin-top: 90px;
        background: linear-gradient(90deg, #efe3d2 0%, #efe3d2 52%, #f78b00 52%, #f78b00 100%);
        padding: 40px 0;
    }

    .pp-hero-inner {
        display: grid;
        grid-template-columns: 1.1fr 1fr;
        gap: 25px;
        align-items: center;
    }

    .pp-greeting {
        font-size: 1rem;
        color: #4e4e4e;
        margin-bottom: 8px;
    }

    .pp-title {
        font-size: 2.8rem;
        font-weight: 700;
        line-height: 1.15;
        margin-bottom: 16px;
    }

    .pp-title .accent {
        color: #f76f00;
    }

    .pp-description {
        color: #4f4f4f;
        max-width: 540px;
        margin-bottom: 24px;
        font-size: 1.06rem;
    }

    .pp-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .pp-btn-main {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 18px;
        border-radius: 10px;
        background: #f78b00;
        color: #fff;
        border: 1px solid #f78b00;
        text-decoration: none;
        font-weight: 600;
    }

    .pp-btn-main:hover {
        color: #fff;
        background: #e77f00;
    }

    .pp-btn-alt {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 18px;
        border-radius: 10px;
        background: #fff;
        color: #333;
        border: 1px solid #cfcfcf;
        text-decoration: none;
        font-weight: 500;
    }

    .pp-btn-alt:hover {
        color: #1f1f1f;
    }

    .pp-hero-image-wrap {
        text-align: right;
    }

    .pp-hero-image {
        width: 100%;
        max-width: 550px;
        border-radius: 14px;
        object-fit: cover;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .pp-catalog {
        padding: 36px 0 44px;
        background: #ededed;
    }

    .pp-search {
        max-width: 760px;
        margin: 0 auto 30px;
        display: grid;
        grid-template-columns: 160px 1fr 110px;
        border: 1px solid #d7d7d7;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
    }

    .pp-search select,
    .pp-search input {
        border: 0;
        padding: 11px 14px;
        outline: none;
        font-size: 0.95rem;
    }

    .pp-search select {
        border-right: 1px solid #e6e6e6;
        color: #555;
    }

    .pp-search button {
        border: 0;
        background: #f78b00;
        color: #fff;
        font-weight: 600;
    }

    .pp-sidebar-card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #dedede;
        padding: 18px;
        margin-bottom: 18px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
    }

    .pp-sidebar-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 14px;
    }

    .pp-category-list,
    .pp-brand-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .pp-category-list li,
    .pp-brand-list li {
        margin-bottom: 10px;
        font-size: 0.94rem;
        color: #484848;
    }

    .pp-category-list li {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .pp-arrow {
        font-size: 0.9rem;
        color: #999;
    }

    .pp-brand-list input {
        margin-right: 8px;
    }

    .pp-products {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .pp-card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #dadada;
        overflow: hidden;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .pp-card-link {
        display: block;
        text-decoration: none;
        color: inherit;
    }

    .pp-card-link:hover .pp-card {
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
    }

    .pp-card-img {
        width: 100%;
        height: 165px;
        object-fit: cover;
        display: block;
        background: #fafafa;
    }

    .pp-card-body {
        padding: 14px 14px 12px;
    }

    .pp-card-name {
        font-size: 1rem;
        margin-bottom: 9px;
        line-height: 1.35;
        font-weight: 600;
        min-height: 44px;
    }

    .pp-meta {
        display: flex;
        align-items: center;
        gap: 14px;
        color: #7a7a7a;
        font-size: 0.84rem;
        margin-bottom: 4px;
    }

    .pp-type {
        color: #9b9b9b;
        font-size: 0.8rem;
    }

    .pp-more {
        margin-top: 24px;
        text-align: center;
    }

    .pp-cta {
        margin: 12px 0 0;
        padding: 0 0 40px;
    }

    .pp-cta-box {
        background: linear-gradient(90deg, #efb36d 0%, #d89038 100%);
        border-radius: 0;
        padding: 34px 34px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .pp-cta-title {
        color: #fff;
        font-weight: 700;
        font-size: 2.5rem;
        line-height: 1.1;
        margin: 0;
        max-width: 500px;
    }

    @media (max-width: 1100px) {
        .pp-hero-inner {
            grid-template-columns: 1fr;
        }

        .pp-hero-image-wrap {
            text-align: left;
        }

        .pp-products {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 767px) {
        .pp-title {
            font-size: 2rem;
        }

        .pp-search {
            grid-template-columns: 1fr;
        }

        .pp-products {
            grid-template-columns: 1fr;
        }

        .pp-cta-box {
            flex-direction: column;
            align-items: flex-start;
        }

        .pp-cta-title {
            font-size: 1.8rem;
        }
    }
</style>

<div class="products-page" id="produk">
    <section class="pp-hero">
        <div class="container">
            <div class="pp-hero-inner">
                <div>
                    <p class="pp-greeting">{{ $banner['greeting'] }}</p>
                    <h1 class="pp-title">
                        {{ $banner['title_main'] }} <span class="accent">{{ $banner['title_highlight'] }}</span><br>
                        {{ $banner['title_suffix'] }}
                    </h1>
                    <p class="pp-description">{{ $banner['description'] }}</p>
                    <div class="pp-actions">
                        <a href="#daftar-produk" class="pp-btn-main">{{ $banner['primary_button'] }}</a>
                        <a href="https://ayobelanja.co.id/" class="pp-btn-alt" target="_blank" rel="noopener noreferrer">{{ $banner['secondary_button'] }}</a>
                    </div>
                </div>
                <div class="pp-hero-image-wrap">
                    <img src="{{ $banner['image'] }}" alt="Banner Produk" class="pp-hero-image">
                </div>
            </div>
        </div>
    </section>

    <section class="pp-catalog" id="daftar-produk">
        <div class="container">
            <form class="pp-search" method="GET" action="{{ route('products.page') }}">
                <select aria-label="Kategori produk" name="category">
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ $selectedCategory === $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                <input type="text" name="q" value="{{ $searchKeyword }}" placeholder="Cari Produk yang Anda butuhkan" aria-label="Cari produk">
                <button type="submit"><i class="fas fa-search me-1"></i>Cari</button>
            </form>

            <div class="row g-4">
                <div class="col-lg-3">
                    <div class="pp-sidebar-card">
                        <h3 class="pp-sidebar-title">Kategori</h3>
                        <ul class="pp-category-list">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('products.page', ['category' => $category, 'q' => $searchKeyword, 'brands' => $selectedBrands]) }}" class="text-decoration-none {{ $selectedCategory === $category ? 'fw-bold text-dark' : 'text-secondary' }}">{{ $category }}</a>
                                    <span class="pp-arrow">{{ $selectedCategory === $category ? '•' : '›' }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="pp-sidebar-card">
                        <h3 class="pp-sidebar-title">Brand</h3>
                        <form method="GET" action="{{ route('products.page') }}">
                            <input type="hidden" name="q" value="{{ $searchKeyword }}">
                            <input type="hidden" name="category" value="{{ $selectedCategory }}">

                            <ul class="pp-brand-list">
                                @foreach($brands as $brand)
                                    <li>
                                        <label>
                                            <input type="checkbox" name="brands[]" value="{{ $brand }}" {{ in_array($brand, $selectedBrands, true) ? 'checked' : '' }}>
                                            {{ $brand }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>

                            <button type="submit" class="pp-btn-main mt-2 w-100">Terapkan</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="pp-products">
                        @forelse($products as $product)
                            <a href="{{ route('products.detail', ['index' => $product['original_index']]) }}" class="pp-card-link">
                                <article class="pp-card">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="pp-card-img">
                                    <div class="pp-card-body">
                                        <h4 class="pp-card-name">{{ $product['name'] }}</h4>
                                        <div class="pp-meta">
                                            <span><i class="fas fa-map-marker-alt me-1"></i>{{ $product['location'] }}</span>
                                            <span><i class="fas fa-star me-1" style="color:#f0b300"></i>{{ $product['rating'] }}</span>
                                        </div>
                                        <div class="pp-type">Tipe : {{ $product['type'] }}</div>
                                    </div>
                                </article>
                            </a>
                        @empty
                            <div class="pp-sidebar-card" style="grid-column: 1 / -1;">
                                Produk tidak ditemukan. Coba ubah kata kunci, kategori, atau brand.
                            </div>
                        @endforelse
                    </div>

                    <div class="pp-more">
                        <button class="pp-btn-main" type="button">Lihat Selengkapnya <i class="fas fa-chevron-down ms-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pp-cta" id="e-belanja">
        <div class="container">
            <div class="pp-cta-box">
                <h2 class="pp-cta-title">Cari produk dengan harga terbaik?</h2>
                <a class="pp-btn-alt" href="https://ayobelanja.co.id/" target="_blank" rel="noopener noreferrer">Kunjungi E-Commerce</a>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.querySelector('.transparent-navbar');
        if (navbar) {
            navbar.classList.add('scrolled');
        }
    });
</script>
@endsection
