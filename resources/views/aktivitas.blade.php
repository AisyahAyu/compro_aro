@extends('layouts.app')

@section('title', 'Aktivitas - PT Aro Baskara Esa')

@section('content')

{{-- HERO SECTION --}}
<section class="hero-section d-flex align-items-center text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="fw-bold mb-3 judul-banner">
                    Bersama Menciptakan Inovasi
                </h1>
                <p class="deskripsi-banner">
                    Ikuti berbagai kegiatan, kolaborasi, dan perjalanan PT Aro Baskara Esa <br class="d-none d-md-block">
                    dalam menghadirkan solusi bagi mitra, pelanggan, dan berbagai sektor.
                </p>
            </div>
        </div>
    </div>
</section>


{{-- CONTENT --}}
<section class="py-5">
    <div class="container">
        {{-- TITLE --}}
        <h2 class="fw-bold mb-4"
            style="color:#f38100; border-left:4px solid #f38100; padding-left:12px; font-size:22px;">
            Berita & Kegiatan
        </h2>

        <div class="row">
            {{-- LEFT CONTENT --}}
            <div class="col-lg-8">
                @if($utama)
                <div class="mb-5">
                    <div class="position-relative">
                        <span class="badge text-white position-absolute m-3 px-3 py-1"
                              style="background:#f38100;">TERBARU</span>

                        <a href="{{ route('detail-aktivitas', $utama->id) }}">
                            <img src="{{ asset('storage/' . $utama->gambar) }}"
                                 class="img-fluid rounded mb-3 shadow-sm"
                                 style="width:100%; height:320px; object-fit:cover;">
                        </a>
                    </div>


                        <a href="{{ route('detail-aktivitas', $utama->id) }}" class="text-dark text-decoration-none">
          <h3 class="fw-bold text-dark mb-3" style="font-size:1.4rem;">
                {{ $utama->judul }}
            </h3>
        </a>

                         <div class="text-muted mb-3 small">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ $utama->created_at->translatedFormat('d F Y') }}
                        <span class="mx-2">|</span>
                        <i class="fas fa-tag me-2"></i>
                        {{ $utama->kategori }}
                    </div>

                    <p class="text-muted" style="line-height:1.6; font-size:14px;">
                        {{ Str::limit(strip_tags($utama->Deskripsi), 250) }}
                    </p>

                    <a href="{{ route('detail-aktivitas', $utama->id) }}"
                       class="btn text-white px-3 py-2 mt-2"
                       style="background:#f38100; border-radius:6px; font-size:13px;">
                        Baca Selengkapnya
                    </a>
                </div>
                @endif
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                {{-- Bagian sticky-top telah dihapus di sini --}}
                <div>
                    {{-- SEARCH --}}
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2" style="color:#f38100;">
                            Telusuri Aktivitas
                        </h6>
                        <div class="input-group shadow-sm">
                            <input type="text" id="search-input"
                                   class="form-control border-0"
                                   placeholder="Cari aktivitas..."
                                   style="height:40px; font-size:14px;">
                            <button class="btn text-white"
                                    style="background:#f38100; width:45px;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    {{-- LIST --}}
                    <div>
                        <h6 class="fw-bold mb-3" id="sidebar-title">
                            Aktivitas Lainnya
                        </h6>
                        <div id="sidebar-results">
                            @include('partials.sidebar-items', ['sidebarPosts' => $sidebarPosts])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- GALERI --}}
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4" style="color:#f38100; font-size:22px;">
            Galeri Kegiatan
        </h2>

        <div class="row">
            @foreach($galeri as $g)
            <div class="col-lg-4 col-md-6 mb-4">
                <img src="{{ asset('storage/' . $g->gambar) }}"
                     class="img-fluid rounded shadow-sm"
                     style="height:200px; width:100%; object-fit:cover;">
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SCRIPT SEARCH TETAP SAMA --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search-input').on('keyup', function() {
        let query = $(this).val();
        $.ajax({
            url: "{{ route('aktivitas') }}",
            type: "GET",
            data: {q: query},
            success: function(data) {
                $('#sidebar-results').html(data.html);
                if(query !== "") {
                    $('#sidebar-title').text('Hasil Pencarian');
                } else {
                    $('#sidebar-title').text('Aktivitas Lainnya');
                }
            }
        });
    });
});
</script>

<style>
.hero-section {
        background: linear-gradient(rgba(243, 112, 33, 0.9), rgba(229, 93, 10, 0.8)), 
                    url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1350&q=80');
        
        height: 400px; 
        background-size: cover;
        background-position: center;
        background-blend-mode: multiply;
        margin-top: 70px;
        display: flex;
        align-items: center;
    }

    .judul-banner {
        font-size: 3rem;
        letter-spacing: -1px;
        line-height: 1.2;
    }

    .deskripsi-banner {
        max-width: 800px;
        font-size: 1.1rem;
        line-height: 1.6;
        opacity: 0.95;
    }

    @media (max-width: 768px) {
        .hero-section {
            height: 320px !important;
            margin-top: 60px !important;
        }
        .judul-banner {
            font-size: 2rem !important;
        }
        .deskripsi-banner {
            font-size: 1rem !important;
        }
    }
</style>

@endsection