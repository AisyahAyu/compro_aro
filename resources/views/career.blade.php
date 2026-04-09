@extends('layouts.app')

@section('title', 'Karier - PT Aro Baskara Esa')

@section('content')

{{-- CSS UNTUK BANNER ORANYE & PENCARIAN OVERLAP --}}
<style>
    /* Reset & Background Global */
.hero-career {
    background: linear-gradient(rgba(243, 112, 33, 0.9), rgba(229, 93, 10, 0.8)),
                url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1350&q=80');
    background-size: cover;
    background-position: center;
    background-blend-mode: multiply;

    min-height: 85vh;
    display: flex;
    align-items: center;
    padding-top: 150px;
    padding-bottom: 150px;

    color: white;
    margin-top: 0;
    text-align: center;
}
/* Ukuran Font diperbesar sedikit agar seimbang dengan bannernya */
.hero-career h1 { 
    font-size: 4rem; 
    font-weight: 800; 
    margin-bottom: 20px; 
    line-height: 1.1;
    text-shadow: 2px 2px 15px rgba(0,0,0,0.2); 
}

.hero-career p { 
    font-size: 1.3rem; 
    max-width: 850px; 
    margin: 0 auto; 
    opacity: 1; 
}
    /* 2. SEARCH SECTION - EFEK OVERLAP (Masuk ke Banner) */
    
  .search-overlap {
        margin-top: -50px;
        position: relative;
        z-index: 10;
        margin-bottom: 40px;
    }
    .search-card {
        background: #fff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: 1px solid #eee;
    }
    .search-wrapper {
        display: flex;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 50px;
        overflow: hidden;
        transition: 0.3s;
        padding: 5px;
    }
    .search-input-area { flex: 1; display: flex; align-items: center; padding-left: 20px; }
    .search-input-area input {
        border: none;
        outline: none;
        width: 100%;
        padding: 12px;
        font-size: 15px;
    }
    .search-btn {
        background: #f37021;
        color: white;
        border: none;
        padding: 0 35px;
        border-radius: 50px;
        font-weight: 600;
        transition: 0.2s;
    }

    /* 2. KODE RESPONSIVE (MOBILE) - WAJIB DI PALING BAWAH */
    @media (max-width: 768px) {
        .search-overlap {
            margin-top: -30px !important;
            padding: 0 15px !important;
        }

        .search-wrapper {
            flex-direction: column !important; /* Paksa tumpuk ke bawah */
            border-radius: 20px !important;
            padding: 10px !important;
            gap: 10px !important;
        }

        .search-input-area {
            padding-left: 10px !important;
            width: 100% !important;
        }

        .search-btn {
            width: 100% !important;
            padding: 12px 0 !important;
            border-radius: 15px !important;
        }
    }

    /* 3. JOB LIST & SIDEBAR (Tetap Sesuai Kodemu) */
    .job-card { 
        background: white; 
        border-radius: 12px; 
        border: 1px solid #eee; 
        padding: 22px 28px; 
        margin-bottom: 18px; 
        transition: 0.3s; 
    }
    .job-card:hover { border-color: #f37021; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    
/* Update pada class .job-name */
.job-name { 
    font-size: 1.3rem; 
    font-weight: 700; 
    color: #334155; /* Abu-abu gelap profesional (Slate 700) */
    margin-bottom: 6px; 
    display: block; 
    text-decoration: none; 
    transition: 0.2s;
}

/* Berikan efek hover agar interaktif */
.job-name:hover {
    color: #f37021; /* Berubah oranye saat diarahkan kursor */
}
    /* Kunci agar info tetap satu baris */
    .info-bar { 
        display: flex; 
        flex-wrap: nowrap; /* Mencegah turun ke bawah */
        gap: 20px; 
        align-items: center; 
        color: #777; 
        font-size: 14px;
        overflow: hidden;
    }
/* Update Info Item: Teks Abu-abu & Ikon Oranye Kalem */
.info-item { 
    display: flex; 
    align-items: center; 
    white-space: nowrap; 
    color: #757575; /* Teks abu-abu netral (tidak terlalu terang) */
    font-size: 14px;
}

.info-item i { 
    color: #d9641d; /* Oranye yang lebih deep/tua (tidak terlalu neon/terang) */
    font-size: 15px; 
    margin-right: 8px; 
    opacity: 0.9; /* Sedikit transparansi agar lebih soft */
}
/* --- STYLE DASAR (DESKTOP & GLOBAL) --- */
    .action-group { 
        display: flex; 
        align-items: center; 
        gap: 12px; 
        justify-content: flex-end; 
    }
    
    .btn-detail-outline { 
        border: 2px solid #f37021 !important; 
        color: #f37021 !important; 
        background: white !important; 
        padding: 8px 22px; 
        border-radius: 8px; 
        font-weight: 600; 
        font-size: 14px; 
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }

    .btn-lamar-solid { 
        background-color: #f37021 !important; 
        color: white !important; 
        border: none; 
        padding: 10px 35px; 
        border-radius: 8px; 
        font-weight: 600; 
        font-size: 14px; 
        transition: 0.3s;
    }

    /* --- KHUSUS TAMPILAN HP (MOBILE) --- */
    @media (max-width: 768px) {
        /* Paksa baris card tidak turun ke bawah */
        .job-card .row {
            display: flex !important;
            flex-wrap: nowrap !important;
            align-items: flex-start;
        }

        /* Bagian Teks (Nama Job & Info) */
        .job-card .col-md-8 {
            flex: 1; 
            padding-right: 10px;
        }

        /* Bagian Tombol (Tetap di Samping) */
        .job-card .col-md-4 {
            width: auto !important;
            flex: 0 0 auto !important;
            margin-top: 0 !important;
        }

        /* Buat Tombol Atas-Bawah tapi Ukuran Tetap Kecil */
        .action-group { 
            flex-direction: column !important; 
            gap: 8px !important;
            align-items: flex-end;
        }

        /* Ukuran Tombol di HP (Disesuaikan agar pas) */
        .btn-detail-outline, .btn-lamar-solid {
            width: 90px !important; /* Lebar tetap supaya rapi bertumpuk */
            padding: 6px 0 !important;
            font-size: 12px !important;
            text-align: center;
            display: block;
        }

        /* Info bar (lokasi, dll) agar tidak tabrakan */
        .info-bar {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
            display: flex !important;
        }
    }

    

    

        .job-divider { margin: 20px 0; border-top: 1px dashed #ddd; display: none; }
        .detail-expand-box { padding: 5px 0; }
        .detail-title { font-size: 15px; color: #003366; font-weight: 700; margin-bottom: 8px; }
        .detail-text, .detail-list { font-size: 14px; color: #555; line-height: 1.7; }


    .filter-box { background: white; padding: 20px; border-radius: 12px; border: 1px solid #eee; }
    .filter-title { font-size: 16px; font-weight: 700; margin-bottom: 20px; color: #333; }
    .form-check-input:checked { background-color: #f37021; border-color: #f37021; }

    /* PAGINATION */
    .custom-pagination-wrapper { margin-top: 40px; display: flex; justify-content: center; }
    .custom-pagination-wrapper nav div:first-child { display: none !important; } 
    .custom-pagination-wrapper svg { width: 20px !important; } 
    .custom-pagination-wrapper .page-link { border-radius: 8px !important; margin: 0 2px; color: #f37021 !important; border: 1px solid #ddd !important; }
    .active .page-link { background-color: #f37021 !important; border-color: #f37021 !important; color: white !important; }

    /* CTA SECTION - THEMA ORANGE & NAVY */
/* CTA SECTION - THEME FULL ORANGE (Lebih Nyambung) */
.cta-career {
    background: linear-gradient(135deg, #f37021 0%, #ff9452 100%); /* Gradasi Oranye */
    border-radius: 20px;
    padding: 50px 40px;
    color: white;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(243, 112, 33, 0.2); /* Shadow halus warna oranye */
}

/* Dekorasi Putih Transparan (Glass Effect) */
.cta-career::before {
    content: '';
    position: absolute;
    top: -50px;
    right: -50px;
    width: 250px;
    height: 250px;
    background: rgba(255, 255, 255, 0.15); 
    border-radius: 50%;
}

.cta-career::after {
    content: '';
    position: absolute;
    bottom: -20px;
    left: 5%;
    width: 120px;
    height: 120px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}

.cta-career h2 {
    font-size: 2.2rem;
    font-weight: 800;
    text-shadow: 2px 2px 10px rgba(0,0,0,0.1);
}

.cta-career p {
    font-weight: 500;
    opacity: 0.95;
}

/* Tombol Putih Bersih */
.cta-career .btn-light {
    background-color: #ffffff !important;
    color: #f37021 !important; /* Teks balik ke oranye */
    border: none;
    font-size: 1.1rem;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.cta-career .btn-light:hover {
    transform: scale(1.05);
    background-color: #fff !important;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
}

/* Responsive */
@media (max-width: 768px) {
    .cta-career {
        padding: 40px 25px;
        text-align: center;
    }
}

/* BENEFITS */
/* BENEFITS */
.benefit-card { 
    background: #fff; 
    border-radius: 16px; 
    box-shadow: 0 4px 15px rgba(0,0,0,0.08); 
    padding: 30px 20px; 
    text-align: center; 
    
    /* Flexbox Internal agar konten rapi */
    display: flex;
    flex-direction: column;
    align-items: center;
    
    width: 100%;
    height: 100%; /* Agar sejajar dalam satu baris */
    transition: all 0.3s ease;
}

.benefit-card:hover {
    transform: translateY(-5px);
}

.icon-wrapper { 
    width: 100px; 
    height: 100px; 
    border-radius: 50%; 
    margin-bottom: 20px; 
    background-color: #fff3eb; 
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0; 
}

.icon-wrapper img { 
    width: 70%; 
    height: 70%; 
    object-fit: contain; 
}

.benefit-card h6 {
    min-height: 2.5rem; 
    display: flex;
    align-items: center;
    justify-content: center;
}

.benefit-card p {
    text-align: center;
    line-height: 1.5;
    color: #666;
    flex-grow: 1; /* Mendorong konten jika ada tinggi sisa */
}
/* Styling Dropdown di Sidebar */
.sidebar-select-career {
    border-radius: 10px; /* Tidak perlu terlalu lonjong karena di sidebar */
    border: 1px solid #ddd;
    padding: 12px 15px;
    font-size: 14px;
    color: #444;
    cursor: pointer;
    background-color: #fdfdfd;
    transition: all 0.3s ease;
}

.sidebar-select-career:focus {
    border-color: #f37021;
    box-shadow: 0 0 0 3px rgba(243, 112, 33, 0.1);
    background-color: #fff;
}

/* Memastikan filter box tetap rapi di mobile */
@media (max-width: 991px) {
    .filter-box {
        margin-top: 20px;
        padding: 15px;
    }
    
    .filter-title {
        font-size: 15px;
        margin-bottom: 15px;
    }
}

</style>

{{-- HERO BANNER SECTION (ORANGE STYLE) --}}
<section class="hero-career">
    <div class="container">
        <h1 class="animate__animated animate__fadeInDown">Bangun Karier Anda <br> Bersama Kami</h1>
        <p class="animate__animated animate__fadeInUp">
            Jadilah bagian dari tim yang berkembang bersama dan menciptakan solusi yang berdampak bagi industri teknologi di Indonesia.
        </p>
    </div>
</section>

{{-- OVERLAP SEARCH AREA --}}
<section class="search-overlap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="search-card">
                    {{-- Hapus onsubmit="return false;" agar form bisa mengirim data --}}
                    <form action="{{ route('career') }}" method="GET" id="search-form">
                        <div class="search-wrapper">
                            <div class="search-input-area">
                                <i class="fas fa-search"></i>
                                <input type="text" name="search" id="search-input" placeholder="Cari posisi pekerjaan impianmu..." value="{{ request('search') }}" autocomplete="off">
                            </div>
                            {{-- Ubah type="button" menjadi type="submit" --}}
                            <button type="submit" class="search-btn">Cari Lowongan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- MAIN CONTENT --}}
<div class="container main-container pb-5">
    <div class="row g-4">
        
        {{-- 1. SIDEBAR FILTER (Diletakkan di atas dalam kode agar muncul di atas saat Mobile) --}}
  <div class="col-lg-3 order-1 order-lg-2"> 
    <div class="filter-box shadow-sm mb-4 mb-lg-0">
        <h6 class="filter-title mb-3">Filter Departemen</h6>
        <form action="{{ route('career') }}" method="GET" id="filterForm">
            {{-- Pastikan keyword search tetap terbawa saat filter kategori diubah --}}
            @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
            @endif

            <select name="category[]" class="form-select sidebar-select-career" onchange="this.form.submit()">
                {{-- Opsi untuk menampilkan semua kategori --}}
                <option value="" {{ !request('category') ? 'selected' : '' }}>Semua Departemen</option>
                
                @foreach($jobCategories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ is_array(request('category')) && in_array($cat->id, request('category')) ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            
            <p class="text-muted mt-3 small">
                <i class="fas fa-info-circle me-1"></i> Pilih departemen untuk mempersempit pencarian.
            </p>
        </form>
    </div>
</div>

        {{-- 2. LIST LOWONGAN (Muncul di bawah sidebar saat mobile, muncul di kiri saat desktop) --}}
        <div class="col-lg-9 order-2 order-lg-1">
            <div class="d-flex justify-content-between align-items-center mb-4 px-1">
                <h4 class="fw-bold mb-0">Posisi yang Tersedia</h4>
                <span class="text-muted small fw-semibold">Ditemukan {{ $vacancies->total() }} Lowongan</span>
            </div>

            @forelse($vacancies as $job)
            <div class="job-card shadow-sm">
                <div class="row align-items-center">
                    {{-- Bagian Nama & Info --}}
                    <div class="col-md-8 col-12">
                        <a href="javascript:void(0)" class="job-name" onclick="toggleJobDetail({{ $job->id }})">{{ $job->name }}</a>
                        <div class="info-bar">
                            <div class="info-item"><i class="fas fa-briefcase"></i> {{ str_replace('_', ' ', ucwords($job->type)) }}</div>
                            <div class="info-item"><i class="fas fa-chart-line"></i> {{ $job->experience ?? '2 years' }}</div>
                            <div class="info-item"><i class="fas fa-map-marker-alt"></i> {{ $job->location }}</div>
                        </div>
                    </div>
                    {{-- Bagian Tombol --}}
                    <div class="col-md-4 col-12 mt-3 mt-md-0">
                        <div class="action-group">
                            <a href="javascript:void(0)" class="btn-detail-outline" onclick="toggleJobDetail({{ $job->id }})" id="btn-text-{{ $job->id }}">Detail</a>
                            <button class="btn-lamar-solid" data-bs-toggle="modal" data-bs-target="#applyModal" onclick="setVacancyData({{ $job->id }}, '{{ $job->name }}')">Lamar</button>
                        </div>
                    </div>
                </div>

                {{-- Garis Pemisah (Hanya muncul saat detail dibuka) --}}
                <hr class="job-divider" id="divider-{{ $job->id }}">

                {{-- Bagian Detail (Hidden by default) --}}
                <div class="detail-expand-box d-none" id="detail-{{ $job->id }}">
                    <div class="mb-4">
                        <div class="detail-title">Deskripsi Pekerjaan</div>
                        <div class="detail-text">{{ $job->description }}</div>
                    </div>

                    @if($job->responsibility)
                    <div class="mb-4">
                        <div class="detail-title">Tanggung Jawab</div>
                        <ul class="detail-list ps-4">
                            @foreach(explode("\n", str_replace("\r", "", $job->responsibility)) as $line)
                                @if(trim($line)) <li class="mb-1">{{ trim($line) }}</li> @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($job->qualification)
                    <div class="mb-2">
                        <div class="detail-title">Kualifikasi</div>
                        <ul class="detail-list ps-4">
                            @foreach(explode("\n", str_replace("\r", "", $job->qualification)) as $line)
                                @if(trim($line)) <li class="mb-1">{{ trim($line) }}</li> @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="text-center py-5 bg-white rounded border">
                <p class="text-muted">Maaf, lowongan kerja tidak ditemukan.</p>
            </div>
            @endforelse

            {{-- Pagination --}}
            <div class="custom-pagination-wrapper">
                {{ $vacancies->onEachSide(1)->links() }}
            </div>
        </div>

    </div>
</div>


{{-- SECTION CTA: AJAKAN BERGABUNG --}}
<section class="pb-5">
    <div class="container">
        <div class="cta-career shadow-lg animate__animated animate__fadeInUp" style="padding: 40px; border-radius: 20px; background: linear-gradient(45deg, #f37021, #ff8c42); color: white;">
            <div class="row text-center justify-content-center">
                <div class="col-lg-10">
                    <h2 class="fw-bold mb-3">Mulai Karier Anda Bersama Kami</h2>
                    <p class="mb-0 opacity-90" style="font-size: 1.2rem; font-style: italic;">
                        "Bergabunglah dengan PT Aro Baskara Esa dan jadilah bagian dari tim yang inovatif, dinamis, dan suportif dalam membangun masa depan teknologi."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BENEFITS SECTION --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #f37021;">Kenapa Bergabung dengan Kami</h2>
        </div>

        @php
            $count = count($benefits);
        @endphp

        <div class="row g-4 justify-content-center">
            @foreach($benefits as $benefit)
            <div class="
                @if($count == 4)
                    col-md-6 col-lg-3
                @elseif($count > 4)
                    col-md-6 col-lg-4
                @else
                    col-md-6 col-lg-4
                @endif
            ">
                <div class="benefit-card h-100">
                    <div class="icon-wrapper">
                        <img src="{{ asset('storage/'.$benefit->icon) }}" alt="{{ $benefit->title }}">
                    </div>
                    <h6 class="fw-bold mb-2" style="color: #003366;">
                        {{ $benefit->title }}
                    </h6>
                    <p class="small text-muted mb-0">
                        {{ $benefit->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
      

{{-- MODAL APPLY --}}
<div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
    {{-- Container dikecilkan dari modal-lg ke modal-md --}}
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content overflow-hidden" style="border-radius: 20px; border: none;">
            
            {{-- Header: Padding dikurangi dari 30px ke 20px --}}
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #003366 0%, #f37021 100%); padding: 20px 25px;">
                <h6 class="modal-title fw-bold">Melamar sebagai <span id="vacancy_name_text"></span></h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('apply') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Body: Padding dikurangi dari p-5 ke p-4 --}}
                <div class="modal-body p-4">
                    <input type="hidden" name="job_vacancy_id" id="modal_job_vacancy_id">
                    
                    {{-- Gutter (jarak antar kolom) dikecilkan ke g-2 agar lebih rapat --}}
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control form-control-sm" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Alamat Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" placeholder="email@contoh.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Nomor WhatsApp</label>
                            <input type="text" name="phone_number" class="form-control form-control-sm" placeholder="0812..." required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Pendidikan Terakhir</label>
                            <select name="last_education" class="form-select form-select-sm" required>
                                <option value="" selected disabled>Pilih Pendidikan</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D3">D3</option>
                                <option value="D4/S1">D4/S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Pengalaman (Tahun)</label>
                            <input type="number" name="years_of_experience" class="form-control form-control-sm" placeholder="0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Pekerjaan Sebelumnya</label>
                            <input type="text" name="previous_job" class="form-control form-control-sm" placeholder="Contoh: UI/UX Designer">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold mb-1">LinkedIn URL</label>
                            <input type="url" name="linkedin_url" class="form-control form-control-sm" placeholder="https://linkedin.com/in/...">
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold mb-1">Cover Letter</label>
                            {{-- Rows dikurangi agar tidak terlalu tinggi --}}
                            <textarea name="cover_letter" class="form-control form-control-sm" rows="3" placeholder="Tuliskan alasan Anda tertarik..."></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold mb-1">Upload Resume (PDF)</label>
                            <input type="file" name="resume" class="form-control form-control-sm" accept="application/pdf" required>
                        </div>

                        <div class="col-12 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="confirmData" required style="transform: scale(0.9);">
                                <label class="form-check-label text-muted" for="confirmData" style="font-size: 11px;">
                                    Saya menyatakan bahwa semua informasi di atas adalah benar.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer: Padding bawah dikurangi --}}
                <div class="modal-footer border-0 pb-4 justify-content-center">
                    <button type="submit" class="btn btn-orange px-5 rounded-pill shadow-sm py-2 btn-sm text-white fw-bold" style="background-color: #f37021;">
                        Kirim Lamaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- JAVASCRIPT --}}
<script>
function toggleJobDetail(id) {
    const detailDiv = document.getElementById(`detail-${id}`);
    const divider = document.getElementById(`divider-${id}`); // Ambil element garis
    const btnText = document.getElementById(`btn-text-${id}`);
    
    if (detailDiv.classList.contains('d-none')) {
        detailDiv.classList.remove('d-none');
        divider.style.display = 'block'; // Tampilkan garis
        btnText.innerText = 'Sembunyikan';
    } else {
        detailDiv.classList.add('d-none');
        divider.style.display = 'none'; // Sembunyikan garis
        btnText.innerText = 'Detail';
    }
}

function setVacancyData(id, name) {
    document.getElementById('modal_job_vacancy_id').value = id;
    document.getElementById('vacancy_name_text').innerText = name;
}

document.querySelector('.search-btn').addEventListener('click', function(e) {
        document.getElementById('search-form').submit();
    });

    // Fitur tambahan: Menekan 'Enter' di keyboard akan otomatis mencari
    document.getElementById('search-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Mencegah perilaku default browser
            document.getElementById('search-form').submit();
        }
    });

</script>

@endsection