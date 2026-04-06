@extends('layouts.app')

@section('title', $aktivitas->judul . ' - PT Aro Baskara Esa')

@section('content')
@php
$imgs = is_array($aktivitas->gambar) ? $aktivitas->gambar : [$aktivitas->gambar];
@endphp

{{--
    Gunakan 'pt-5' dan margin-top yang lebih besar (160px) 
    agar seluruh konten turun dan tidak mepet navbar 
--}}
<div class="container pb-5 main-wrapper-detail">

    {{-- 1. BANNER UTAMA --}}
    <div class="row mb-5 px-3">
        <div class="col-12">
            <div class="banner-container shadow-sm rounded overflow-hidden">
                <img src="{{ $aktivitas->gambar_url }}"
                    alt="{{ $aktivitas->judul }}"
                    class="img-fluid w-100 main-banner-img">
            </div>
        </div>
    </div>

{{-- 2. JUDUL, KATEGORI, & TANGGAL --}}
{{-- CONTENT --}}
    <div class="container content-area">

        {{-- TITLE --}}
        <div class="text-center header-content">
            <h2 class="title-orange">
                {{ $aktivitas->judul }}
            </h2>

            <p class="subtitle">
                {{ Str::limit(strip_tags($aktivitas->ringkasan), 150) }}
            </p>

            <div class="meta d-flex justify-content-center gap-4">
                <span>
                    <i class="far fa-calendar-alt me-1"></i>
                    {{ $aktivitas->created_at->translatedFormat('d F Y') }}
                </span>

                <span>
                    @php
                        $katUtama = strtolower($aktivitas->kategori ?? 'pengumuman');
                        $iconUtama = 'fas fa-tag';
                        if (str_contains($katUtama, 'pengumuman')) $iconUtama = 'fas fa-bullhorn';
                        elseif (str_contains($katUtama, 'rapat') || str_contains($katUtama, 'koordinasi')) $iconUtama = 'fas fa-users';
                        elseif (str_contains($katUtama, 'proyek')) $iconUtama = 'fas fa-briefcase';
                    @endphp
                    <i class="{{ $iconUtama }} me-1"></i>
                    {{ $aktivitas->kategori ?? 'Pengumuman' }}
                </span>
            </div>
        </div>



    {{-- 3. KONTEN DESKRIPSI --}}
    <div class="row mt-4 px-3 justify-content-center">
        <div class="col-lg-10">
            <div class="content-text custom-article-body">
                {!! $aktivitas->Deskripsi !!}
            </div>
        </div>
    </div>

    {{-- 4. FOOTER: AKTIVITAS LAINNYA --}}
    <div class="mt-5 pt-5 border-top px-3">
        <h4 class="font-weight-bold mb-4 text-dark-custom">Aktivitas Lainnya</h4>
        <div class="row">
            @foreach($aktivitasLainnya as $item)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100 custom-card">
                    <a href="{{ route('detail-aktivitas', $item->id) }}" class="overflow-hidden">
                        @php $itemImgs = is_array($item->gambar) ? $item->gambar : [$item->gambar]; @endphp
                        <img src="{{ $item->gambar_url }}"
                            class="card-img-top thumb-img"
                            alt="{{ $item->judul }}">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h6 class="font-weight-bold mb-2">
                            <a href="{{ route('detail-aktivitas', $item->id) }}" class="text-dark text-decoration-none hover-orange">
                                {{ Str::limit($item->judul, 50) }}
                            </a>
                        </h6>
                        <p class="text-muted small flex-grow-1">
                            {{ Str::limit(strip_tags($item->Deskripsi), 85, '...') }}
                        </p>
                        <div class="mt-auto pt-2">
                            <p class="text-muted mb-0" style="font-size: 0.75rem; border-top: 1px solid #eee; pt-2">
                                <i class="far fa-calendar-alt mr-1 text-warning"></i>
                                {{ $item->created_at->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>

    .main-wrapper-detail {
        margin-top: 160px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .text-dark-custom {
        color: #333;
    }

    .main-banner-img {
        height: 550px;
        /* Ukuran banner sedikit lebih besar agar elegan */
        object-fit: cover;
    }

    .lead-text {
        max-width: 850px;
        font-size: 1.1rem;
    }

    .custom-article-body {
        line-height: 1.8;
        font-size: 1.1rem;
        color: #444;
        text-align: justify;
    }

    /* kategori dan tanggal */
.meta {
    color: #6c757d; /* abu Bootstrap, clean */
    font-size: 0.9rem;
}

.meta i {
    color: #adb5bd; /* ikon lebih soft dikit */
}

.title-orange {
    color: #00000;
}
    /* Card Styling */
    .custom-card {
        border-radius: 12px;
        transition: all 0.3s ease;
    }


    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1) !important;
    }

    .thumb-img {
        height: 200px;
        object-fit: cover;
    }

    .hover-orange:hover {
        color: #f38100 !important;
    }

    /* Responsive untuk HP */
    @media (max-width: 991px) {
        .main-wrapper-detail {
            margin-top: 100px !important;
        }

        .main-banner-img {
            height: 320px;
        }
    }
</style>
@endsection