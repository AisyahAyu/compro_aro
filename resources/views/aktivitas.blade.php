@extends('layouts.app')

@section('title', 'Aktivitas - PT Aro Baskara Esa')

@section('content')

{{-- HERO SECTION --}}
<section class="hero-section d-flex align-items-center text-white">
    <div class="container">
        <div class="row justify-content-center"> {{-- Menambah justify-content-center --}}
            <div class="col-lg-10 text-center"> {{-- Mengubah ke text-center --}}
                <h1 class="fw-bold mb-3 judul-banner">
                    Bangun Karier Anda<br>Bersama Kami
                </h1>
                <p class="deskripsi-banner">
                    Jadilah bagian dari tim yang berkembang bersama dan menciptakan solusi yang <br class="d-none d-md-block">
                    berdampak bagi industri teknologi di Indonesia.
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
<img src="{{ $utama->gambar_url }}"
     srcset="{{ $utama->gambar_url }} 1x, {{ $utama->gambar_url_hd }} 2x"
     class="img-fluid rounded mb-3 shadow-sm"
     style="width:100%; height:300px; object-fit:cover;">
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


{{-- AGENDA MENDATANG --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3" style="color:#f38100; font-size: 28px;">Mendatang</h2>
            <p class="text-muted" style="font-size: 16px; line-height: 1.6;">   
            </p>
        </div>

        <div class="row justify-content-center mt-4">
            @forelse($agendaMendatang as $event)
                <div class="col-lg-4 col-md-6 mb-4" style="max-width: 350px;">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 20px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05) !important;">
                        
                        <div style="height: 180px; overflow: hidden;">
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 100%; width: 100%; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center h-100 text-muted">
                                    <i class="fas fa-image fa-2x"></i>
                                </div>
                            @endif
                        </div>

                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="fw-bold mb-3" style="font-size: 18px; line-height: 1.4;">{{ $event->title }}</h5>
                            
                            <div class="text-muted mb-4" style="font-size: 14px; line-height: 1.6;">
                                {!! $event->description !!}
                            </div>

                            <div class="mt-auto pt-3 border-top" style="font-size: 13px; color: #6c757d;">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="far fa-calendar-alt me-2 text-secondary"></i>
                                    {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d M Y') }}
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt me-2 text-secondary"></i>
                                    {{ $event->location ?? 'TBA' }}
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="far fa-clock me-2 text-secondary"></i>
                                    {{ \Carbon\Carbon::parse($event->start_time)->format('H.i') }} WIB - Selesai
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada agenda mendatang.</p>
                </div>
            @endforelse
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
                <img src="{{ $g->gambar_url }}"
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
    /* Gaya Warna & Background Tetap Sama */
    background: linear-gradient(rgba(243, 112, 33, 0.85), rgba(229, 93, 10, 0.85)), 
                url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1350&q=80');
    background-size: cover;
    background-position: center;
    background-blend-mode: multiply;

    /* --- PERUBAHAN UTAMA UNTUK BESARKAN KE BAWAH --- */
    min-height: 100vh;       /* Full 1 layar penuh, atau ganti misal 800px jika ingin spesifik */
    padding-top: 120px;      /* Ruang lebih untuk navbar di atas */
    padding-bottom: 100px;   /* Memberi ruang nafas di bagian bawah banner */
    /* ----------------------------------------------- */

    margin-top: 0;          
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;     
}

.judul-banner {
    font-size: 4rem;        
    font-weight: 800;
    letter-spacing: -1px;
    line-height: 1.1;
    text-transform: none;
}

.deskripsi-banner {
    margin: 0 auto;
    max-width: 900px;
    font-size: 1.25rem;
    line-height: 1.6;
    opacity: 1;
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
img {
  filter: contrast(1.05) sharpness(1.1);
}


</style>

@endsection