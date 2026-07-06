@extends('layouts.app')

@section('title', $product->name . ' - Detail Produk')

@section('content')
<style>
    .pd-page {
        margin-top: 90px;
        background: #f2f3f5;
        color: #1f1f1f;
        padding-bottom: 44px;
    }

    .pd-main {
        padding: 36px 0 18px;
    }

    .pd-shell {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 2px 6px rgba(15, 23, 42, 0.04);
    }

    .pd-top {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 34px;
        align-items: start;
    }

    .pd-label {
        background: #f78b00;
        color: #fff;
        font-size: 0.74rem;
        font-weight: 600;
        border-radius: 4px;
        display: inline-block;
        padding: 4px 10px;
        margin-bottom: 10px;
    }

    .pd-main-image-wrap {
        background: #fafafa;
        border: 1px solid #dddddd;
        border-radius: 8px;
        padding: 10px;
    }

    .pd-main-image {
        width: 100%;
        height: 340px;
        object-fit: cover;
        border-radius: 6px;
        display: block;
    }

    .pd-thumbs {
        margin-top: 12px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .pd-thumb-item {
        width: 78px;
        height: 62px;
        border-radius: 6px;
        border: 1px solid #d8d8d8;
        background: #fff;
        padding: 2px;
        overflow: hidden;
    }

    .pd-thumbs img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 4px;
        display: block;
    }

    .pd-title {
        font-size: 2rem;
        line-height: 1.2;
        margin-bottom: 12px;
        font-weight: 700;
        color: #111827;
    }

    .pd-category {
        margin-bottom: 14px;
        font-size: 1.1rem;
    }

    .pd-category-label {
        color: #f78b00;
        font-weight: 700;
    }

    .pd-description {
        font-size: 0.98rem;
        color: #353535;
        line-height: 1.65;
        margin-bottom: 12px;
        max-width: 720px;
    }

    .pd-highlights {
        list-style: none;
        margin: 0 0 16px;
        padding: 0;
    }

    .pd-highlights li {
        margin-bottom: 5px;
        color: #222;
        font-size: 0.95rem;
    }

    .pd-highlights li::before {
        content: "✓";
        margin-right: 8px;
        font-weight: 700;
    }

    .pd-btn-market {
        background: #f78b00;
        color: #fff;
        border: 1px solid #f78b00;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 14px;
        font-size: 0.92rem;
    }

    .pd-btn-market:hover {
        background: #e87f00;
        color: #fff;
    }

    .pd-spec-grid {
        margin-top: 22px;
        display: grid;
        grid-template-columns: 1.2fr 0.95fr;
        gap: 24px;
        padding-top: 18px;
        border-top: 1px solid #ececec;
    }

    .pd-sec-title {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .pd-sec-desc {
        color: #2f2f2f;
        line-height: 1.6;
        margin-bottom: 16px;
        font-size: 0.97rem;
    }

    .pd-subtitle {
        font-size: 1.35rem;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .pd-mini-list {
        color: #252525;
        margin: 0;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .pd-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: #fff;
        border: 1px solid #d7d7d7;
        border-radius: 6px;
        overflow: hidden;
    }

    .pd-table td {
        padding: 10px 13px;
        border-bottom: 1px solid #e9e9e9;
        border-right: 1px solid #e9e9e9;
        font-size: 0.92rem;
    }

    .pd-table tr:last-child td {
        border-bottom: 0;
    }

    .pd-table td:last-child {
        border-right: 0;
        color: #353535;
    }

    .pd-related {
        padding: 14px 0 26px;
    }

    .pd-related-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
    }

    .pd-related-card {
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #dedede;
        padding: 12px;
        display: flex;
        gap: 12px;
        align-items: center;
        min-height: 120px;
    }

    .pd-related-card img {
        width: 120px;
        height: 86px;
        object-fit: cover;
        border-radius: 6px;
        background: #fff;
    }

    .pd-related-name {
        font-size: 1.05rem;
        font-weight: 600;
        line-height: 1.35;
        margin-bottom: 8px;
    }

    .pd-related-btn {
        background: #f78b00;
        border: 1px solid #f78b00;
        color: #fff;
        border-radius: 10px;
        text-decoration: none;
        padding: 6px 12px;
        display: inline-block;
        font-weight: 600;
        font-size: 0.86rem;
    }

    .pd-cta {
        background: linear-gradient(90deg, #ff8f15 0%, #ebda45 100%);
        margin-top: 6px;
        border-radius: 10px;
        overflow: hidden;
    }

    .pd-cta-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 24px 18px;
    }

    .pd-cta-small {
        margin: 0;
        color: #523000;
        font-size: 0.95rem;
        letter-spacing: 0.4px;
        font-weight: 600;
    }

    .pd-cta-title {
        margin: 0;
        color: #4a2600;
        font-size: 2.1rem;
        line-height: 1.15;
        font-weight: 700;
    }

    .pd-cta-btn {
        border-radius: 999px;
        background: #0b0550;
        color: #fff;
        text-decoration: none;
        padding: 10px 22px;
        font-weight: 600;
        font-size: 1rem;
        white-space: nowrap;
    }

    .pd-cta-btn:hover {
        color: #fff;
    }

    @media (max-width: 991px) {
        .pd-shell {
            padding: 18px;
        }

        .pd-top,
        .pd-spec-grid {
            grid-template-columns: 1fr;
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

        .pd-main-image {
            height: 260px;
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
            <div class="pd-shell">
                <div class="pd-top">
                    <div>
                        <div class="pd-main-image-wrap">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="pd-main-image">
                            @endif
                        </div>
                    </div>

                    <div>
                        <h1 class="pd-title">{{ $product->name }}</h1>
                        <div class="pd-category">
                            <span class="pd-category-label">Kategori :</span>
                            <span>{{ $product->category->name ?? '-' }}</span>
                        </div>
                        <div class="pd-category">
                            <span class="pd-category-label">Merek :</span>
                            <span>{{ $product->resolved_brand_name }}</span>
                        </div>
                        <div class="pd-category">
                            <span class="pd-category-label">Tipe Produk :</span>
                            <span>{{ $product->type ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <div class="pd-spec-grid">
                    <div>
                        <h2 class="pd-sec-title">Deskripsi / Spesifikasi</h2>
                        <p class="pd-sec-desc" style="white-space: pre-line;">{{ $product->specification ?? 'Tidak ada spesifikasi khusus.' }}</p>
                    </div>

                    <div>
                        <table class="pd-table">
                            <tbody>
                            <tr>
                                <td>Merek</td>
                                <td>{{ $product->resolved_brand_name }}</td>
                            </tr>
                            <tr>
                                <td>Tipe</td>
                                <td>{{ $product->type ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Dimensi</td>
                                <td>{{ $product->dimensions ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>SKU</td>
                                <td><code>{{ $product->sku ?? '-' }}</code></td>
                            </tr>
                            <tr>
                                <td>Asal Negara</td>
                                <td>{{ $product->country_of_origin ?? '-' }}</td>
                            </tr>
                            </tbody>
                        </table>
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
                    <article class="pd-related-card">
                        @if($relatedProduct->image)
                            <img src="{{ asset($relatedProduct->image) }}" alt="{{ $relatedProduct->name }}">
                        @endif
                        <div>
                            <h4 class="pd-related-name">{{ $relatedProduct->name }}</h4>
                            <a href="{{ route('products.detail', $relatedProduct->id) }}" class="pd-related-btn">Lihat Detail</a>
                        </div>
                    </article>
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
