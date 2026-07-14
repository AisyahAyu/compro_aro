@extends('layouts.app')

@section('title', $product->name . ' - Detail Produk')

@section('content')
<style>
    .pd-page {
        margin-top: 90px;
        background: #ffffff;
        color: #333333;
        padding-bottom: 60px;
    }

    .pd-main {
        padding: 36px 0 18px;
    }

    .pd-breadcrumb {
        font-size: 0.95rem;
        color: #1a73e8;
        margin-bottom: 25px;
        padding: 0;
    }
    .pd-breadcrumb a {
        color: #1a73e8;
        text-decoration: none;
    }
    .pd-breadcrumb a:hover {
        text-decoration: underline;
    }
    .pd-breadcrumb span {
        margin: 0 12px;
        color: #888;
        font-size: 0.8rem;
    }
    .pd-breadcrumb span.active {
        color: #1a73e8;
    }

    .pd-title-section {
        margin-bottom: 30px;
    }
    .pd-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 5px;
    }
    .pd-type-subtitle {
        font-size: 1.1rem;
        color: #555;
        font-weight: 500;
    }

    .pd-grid {
        display: grid;
        grid-template-columns: 0.8fr 1.2fr;
        gap: 50px;
        align-items: start;
    }

    .pd-main-image-wrap {
        border: 1px solid #f0f0f0;
        border-radius: 8px;
        padding: 5px;
        background: #fff;
    }
    .pd-main-image {
        width: 100%;
        height: auto;
        object-fit: contain;
        border-radius: 4px;
        display: block;
    }

    .pd-thumbs {
        margin-top: 15px;
        display: flex;
        gap: 10px;
    }
    .pd-thumb-item {
        width: 65px;
        height: 65px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 2px;
        cursor: pointer;
        background: #fff;
    }
    .pd-thumb-item img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .pd-details-col {
        border: 1px solid #f2e3d5;
        border-radius: 6px;
        overflow: hidden;
        background: #fff;
    }

    .pd-details-header {
        background: #fff8f3;
        padding: 15px;
        text-align: center;
        border-bottom: 2px solid #e27d3b;
    }
    .pd-details-header h3 {
        margin: 0;
        font-size: 1rem;
        color: #e27d3b;
        font-weight: 600;
    }

    .pd-table {
        width: 100%;
        border-collapse: collapse;
    }
    .pd-table tr {
        border-bottom: 1px solid #f9f9f9;
    }
    .pd-table tr:last-child {
        border-bottom: none;
    }
    .pd-table td {
        padding: 16px 20px;
        vertical-align: top;
        font-size: 0.95rem;
        line-height: 1.6;
    }
    .pd-table td:first-child {
        width: 25%;
        color: #888;
        font-weight: 500;
    }
    .pd-table td:last-child {
        color: #333;
        font-weight: 500;
    }

    .pd-order-btn-container {
        text-align: right;
        margin-top: 25px;
    }

    .pd-order-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #e27d3b;
        color: #e27d3b;
        background: #fff;
        padding: 10px 24px;
        border-radius: 4px;
        font-size: 0.95rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
    }
    .pd-order-btn:hover {
        background: #fff8f3;
        color: #d16b2a;
    }

    /* Related Products Section */
    .pd-related {
        padding: 40px 0 26px;
        border-top: 1px solid #eaeaea;
        margin-top: 80px;
    }

    .pd-related-grid {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .pd-related-grid > a {
        width: 195px; /* Exact width from products page grid */
    }

    .pp-card-link {
        display: block;
        text-decoration: none;
        color: inherit;
        height: 100%;
    }

    .pp-card {
        width: 100%;
        background-color: #ffffff;
        border: 1px solid #e8e8e8;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        transition: box-shadow 0.2s ease, transform 0.2s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        height: 100%;
    }

    .pp-card-link:hover .pp-card {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transform: translateY(-4px);
    }

    .pp-card-img-wrap {
        width: 100%;
        position: relative;
        background-color: #fff;
        overflow: visible;
    }

    .pp-card-img {
        width: 100%;
        aspect-ratio: 1 / 1; /* Force square like the products page */
        object-fit: contain;
        display: block;
        transition: transform 0.3s ease;
    }

    .pp-card-link:hover .pp-card-img {
        transform: scale(1.05);
    }

    .pp-card-img-wrap::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: #000;
        z-index: 1;
    }

    .pp-card-body {
        padding: 10px;
        display: flex;
        flex-direction: column;
        flex: 1;
        border-top: 1px solid #f0f0f0;
    }

    .pp-card-name {
        font-size: 13px;
        font-weight: 600;
        color: #222;
        line-height: 1.3;
        margin-bottom: 6px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 34px;
    }

    .pp-card-meta {
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #f5f5f5;
        padding-top: 8px;
        gap: 8px;
        margin-bottom: 8px;
    }

    .pp-card-location {
        font-size: 11px;
        color: #1a5fa8;
        display: flex;
        align-items: center;
        gap: 4px;
        font-weight: 500;
    }

    .pp-type {
        font-size: 11px;
        color: #888;
        background: #f4f4f4;
        padding: 2px 6px;
        border-radius: 4px;
    }

    /* CTA Section */
    .pd-cta {
        background: #fff;
        margin-top: 40px;
        border-radius: 12px;
        border: 1px solid #eaeaea;
        overflow: hidden;
    }

    .pd-cta-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 40px;
        background: #fafafa;
    }

    .pd-cta-small {
        margin: 0 0 5px 0;
        color: #f78b00;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .pd-cta-title {
        margin: 0;
        color: #222;
        font-size: 2rem;
        line-height: 1.2;
        font-weight: 700;
    }

    .pd-cta-btn {
        border-radius: 6px;
        background: #111;
        color: #fff;
        text-decoration: none;
        padding: 12px 28px;
        font-weight: 600;
        font-size: 1.05rem;
        white-space: nowrap;
        transition: all 0.2s;
    }

    .pd-cta-btn:hover {
        background: #333;
        color: #fff;
    }

    @media (max-width: 991px) {
        .pd-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .pd-related-grid {
            grid-template-columns: 1fr;
        }

        .pd-cta-inner {
            flex-direction: column;
            align-items: flex-start;
        }

        .pd-title {
            font-size: 1.6rem;
        }

        .pd-cta-title {
            font-size: 1.5rem;
        }

        .pd-cta-btn {
            font-size: 0.9rem;
        }
    }
</style>

<div class="pd-page">
    <section class="pd-main">
        <div class="container">
            
            <!-- Breadcrumbs -->
            <div class="pd-breadcrumb">
                <a href="{{ route('products.page', ['category' => $product->category_id]) }}">{{ $product->category->name ?? 'Kategori' }}</a>
                <span>&gt;</span>
                <span class="active">{{ $product->name }}</span>
            </div>

            <!-- Title Section -->
            <div class="pd-title-section">
                <h1 class="pd-title">{{ $product->name }}</h1>
                <div class="pd-type-subtitle">{{ $product->type ?? '-' }}</div>
            </div>

            <!-- Grid -->
            <div class="pd-grid">
                <!-- Left: Image -->
                <div class="pd-image-col">
                    <div class="pd-main-image-wrap">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="pd-main-image">
                        @endif
                    </div>
                    @if($product->image)
                    <div class="pd-thumbs">
                        <div class="pd-thumb-item">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right: Details -->
                <div class="pd-details-container">
                    <div class="pd-details-col">
                        <div class="pd-details-header">
                            <h3>Detail Produk</h3>
                        </div>
                        <table class="pd-table">
                            <tr>
                                <td>Nama Produk</td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td>Tipe Produk</td>
                                <td>{{ $product->type ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Dimensi</td>
                                <td>{{ $product->dimensions ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Spesifikasi</td>
                                <td style="white-space: pre-line;">{{ $product->specification ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Merek</td>
                                <td>{{ $product->resolved_brand_name }}</td>
                            </tr>
                            <tr>
                                <td>SKU</td>
                                <td>{{ $product->sku ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Asal Negara</td>
                                <td>{{ $product->country_of_origin ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="pd-order-btn-container">
                        @php
                            $phone = preg_replace('/[^0-9]/', '', $companyProfile->phone ?? '');
                            if (substr($phone, 0, 1) === '0') {
                                $phone = '62' . substr($phone, 1);
                            }
                        @endphp
                        <a href="https://wa.me/{{ $phone }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}" target="_blank" class="pd-order-btn">
                            <i class="fab fa-whatsapp"></i> Info Pemesanan
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="pd-related">
        <div class="container">
            <h3 class="mb-4 text-center font-weight-bold">Produk Lainnya</h3>
            <div class="pd-related-grid">
                @foreach($relatedProducts as $relatedProduct)
                    <a href="{{ route('products.detail', $relatedProduct->id) }}" class="pp-card-link">
                        <article class="pp-card">
                            <div class="pp-card-img-wrap">
                                @if($relatedProduct->image)
                                    <img src="{{ asset($relatedProduct->image) }}" alt="{{ $relatedProduct->name }}"
                                        class="pp-card-img" loading="lazy">
                                @endif
                            </div>
                            <div class="pp-card-body">
                                <h4 class="pp-card-name">{{ $relatedProduct->name }}</h4>
                                <div class="pp-card-meta">
                                    <div class="pp-card-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $relatedProduct->country_of_origin ?? 'Indonesia' }}</span>
                                    </div>
                                    @if(!empty($relatedProduct->type))
                                        <div class="pp-type">{{ $relatedProduct->type }}</div>
                                    @endif
                                </div>
                                <div class="mt-auto pt-2">
                                    <span class="btn btn-warning btn-sm w-100 text-white" style="background-color: #f78b00; border-color: #f78b00; font-size: 12px; font-weight: 600;">Lihat Detail</span>
                                </div>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="pd-cta">
        <div class="container">
            <div class="pd-cta-inner">
                <div>
                    <p class="pd-cta-small">MULAI SEKARANG</p>
                    <h2 class="pd-cta-title">Cari produk dengan harga terbaik?</h2>
                </div>
                <a href="{{ route('contact.page') }}" class="pd-cta-btn">Hubungi Kami</a>
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
