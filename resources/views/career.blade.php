@extends('layouts.app')

@section('title', 'Karier - PT Aro Baskara Esa')

@section('content')

{{-- CSS UNTUK BANNER ORANYE & PENCARIAN OVERLAP --}}
<style>
    /* Reset & Background Global */
.hero-career {
    position: relative;
    /* padding: 120px 20px; <--- Ini yang bikin lowong */
    
    /* Ganti jadi seperti ini agar lebih rapat: */
    padding-top: 80px;    /* Jarak atas tetap atau sedikit kurangi */
    padding-bottom: 80px; /* Jarak bawah dipangkas biar ga terlalu kosong */
    padding-left: 20px;
    padding-right: 20px;

    margin-bottom: 40px;  
    /* -------------------- */

    overflow: hidden;
    background: linear-gradient(
        to right,
        #ffffff 0%,
        #ffffff 60%,
        rgba(255, 140, 0, 0.08) 100%
    );
}

/* GRID */
.hero-career::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: 
        linear-gradient(rgba(0,0,0,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0,0,0,0.04) 1px, transparent 1px);
    background-size: 40px 40px;
}

/* GLOW */
.hero-career::after {
    content: "";
    position: absolute;
    right: 0;
    top: 0;
    width: 60%;
    height: 100%;
    background: radial-gradient(circle, rgba(255,140,0,0.2), transparent 70%);
}

/* CONTENT -> PINDAH KE KIRI */
.hero-content {
    max-width: 650px;
    margin-left: 30 !important;   /* 🔥 ini kunci */
    margin-right: auto;
    text-align: left;
}

/* TAG */
.tag {
    display: inline-block;
    background: #e6f4ea;
    color: #1e7e34;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

/* TITLE (DIPERKECIL & RAPI) */
.hero-career h1 {
    font-size: 44px;   /* dari 58 → 44 */
    font-weight: 800;
    margin: 20px 0;
    color: #111;
    line-height: 1.3;
}

/* ORANGE NYA TETAP KELIHATAN */
.hero-career h1 span {
    color: #ff7a00;
}

/* TEXT */
.hero-career p {
    font-size: 16px;
    color: #555;
    line-height: 1.7;
    max-width: 520px;
}

/* BUTTON */
.hero-btn {
    margin-top: 40px;
}

.btn-primary {
    padding: 12px 26px;
    background: #ff8c00; /* Warna orange gelap (Dark Orange) */
    color: #fff;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
}
.career-header {
    margin-bottom: 80px; 
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .hero-career h1 {
        font-size: 32px;
    }
}




    /* 2. SEARCH SECTION - EFEK OVERLAP (Masuk ke Banner) */
/* Header Styling */
.career-header .badge {
    background-color: rgba(243, 112, 33, 0.1);
    color: #f37021;
    padding: 8px 16px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
}

.career-header h1 {
    color: #1e293b;
    letter-spacing: -1px;
    
}

/* WRAPPER */

/* 2. SEARCH SECTION - EFEK CARD OVERLAP */

/* Container Utama untuk Filter */
.filter-wrapper {
    max-width: 1100px;
    margin: -60px auto 40px; /* -60px menarik card naik ke atas banner */
    padding: 40px;
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.07); /* Bayangan halus agar melayang */
    position: relative;
    z-index: 10;
    border: 1px solid #f0f0f0;
}

/* Judul di dalam Card */
.filter-title {
    font-size: 18px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 20px;
}

/* Row untuk Input & Select */
.top-filter-bar {
    display: flex;
    gap: 10px;
    align-items: center;
}

/* SEARCH BOX */
.top-search {
    flex: 1.5; /* Search dibuat sedikit lebih lebar */
    position: relative;
}

.top-search input {
    width: 100%;
    height: 52px;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    padding: 0 20px 0 45px;
    font-size: 14px;
    background: #f9fafb;
    transition: all 0.3s ease;
}

.top-search input:focus {
    outline: none;
    border-color: #f37021; /* Warna orange saat diklik */
    background: #fff;
    box-shadow: 0 0 0 4px rgba(243, 112, 33, 0.1);
}

/* ICON SEARCH */
.top-search i {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #f37021;
    font-size: 16px;
}

/* SELECT BOX */
.top-select {
    flex: 1;
}

.top-select select {
    width: 100%;
    height: 52px;
    border-radius: 12px;
    padding: 0 20px;
    border: 1px solid #e5e7eb;
    background: #f9fafb;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.top-select select:focus {
    outline: none;
    border-color: #f37021;
    box-shadow: 0 0 0 4px rgba(243, 112, 33, 0.1);
}

/* RESPONSIVE (Untuk HP) */
@media (max-width: 768px) {
    .filter-wrapper {
        margin: -40px 15px 30px; /* Margin diperkecil untuk layar HP */
        padding: 25px 20px;
    }
    
    .top-filter-bar {
        flex-direction: column;
        gap: 15px;
    }
    
    .top-select,
    .top-search {
        width: 100%;
    }
}

/* 3. JOB LIST & SIDEBAR */
.career-container {
  max-width: 1200px;       /* Membatasi lebar maksimal */
  margin: 0 auto;          /* Mengetengahkan container */
  padding: 0 80px;         /* Tambah jarak kiri-kanan */
}

.job-card { 
    background: white; 
    border-radius: 8px; 
    border: 1px solid #eee; 
    padding: 20px 40px;      /* Padding dalam card */
    margin-bottom: 20px; 
    transition: 0.3s; 
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}
.job-card:hover { 
    border-color: #f37021; 
    box-shadow: 0 5px 15px rgba(0,0,0,0.05); 
}

/* Job Name */
.job-name { 
    font-size: 1.1rem; 
    font-weight: 500; 
    color: #334155; 
    margin-bottom: 6px; 
    display: block; 
    text-decoration: none; 
    transition: 0.2s;
}
.job-name:hover { color: #f37021; }

/* Info Bar */
.info-bar { 
    display: flex; 
    flex-wrap: nowrap; 
    gap: 30px; 
    align-items: center; 
    color: #777; 
    font-size: 14px;
    overflow: hidden;
}
.info-item { 
    display: flex; 
    align-items: center; 
    white-space: nowrap; 
    color: #757575; 
    font-size: 12px;
}
.info-item i { 
    color: #d9641d; 
    font-size: 15px; 
    margin-right: 14px; 
    opacity: 0.9; 
}

/* Action Buttons */
.action-group { 
    display: flex; 
    align-items: center; 
    gap: 12px; 
    justify-content: flex-end; 
}
.btn-detail-outline { 
    border: 1px solid #f37021 !important; 
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
    padding: 10px 30px; 
    border-radius: 8px; 
    font-weight: 600; 
    font-size: 14px; 
    transition: 0.3s;
}

/* Mobile */
@media (max-width: 768px) {
    .career-container { padding: 0 15px; } /* ➜ lebih rapat di HP */

    .job-card .row {
        display: flex !important;
        flex-wrap: nowrap !important;
        align-items: flex-start;
    }
    .job-card .col-md-8 { flex: 1; padding-right: 10px; }
    .job-card .col-md-4 { width: auto !important; flex: 0 0 auto !important; margin-top: 0 !important; }
    .action-group { flex-direction: column !important; gap: 8px !important; align-items: flex-end; }
    .btn-detail-outline, .btn-lamar-solid {
        width: 90px !important; padding: 6px 0 !important; font-size: 12px !important; text-align: center; display: block;
    }
    .info-bar { flex-direction: column; align-items: flex-start; gap: 5px; display: flex !important; }
}

/* Divider & Detail */
.job-divider { margin: 20px 0; border-top: 30px dashed #ddd; display: none; }
.detail-expand-box {
  padding: 30px 10px;       /* ruang atas-bawah 24px, kiri-kanan 32px */
  background: #fff;         /* opsional: biar lebih jelas */
  border-radius: 8px;       /* sudut halus */
}

.detail-title {
  font-size: 14px;          /* sedikit lebih besar */
  color: #343a40;
  font-weight: 500;
  margin-bottom: 5px;      /* jarak judul ke isi */
}

.detail-text,
.detail-list {
  font-size: 12px;          /* lebih mudah dibaca */
  color: #555;
  line-height: 1.7;         /* teks lebih lega */
  margin-bottom: 20px;      /* jarak antar blok detail */
}

.detail-list li {
  margin-bottom: 8px;       /* jarak antar bullet */
}


/* Sidebar Filter */
.filter-box { background: white; padding: 20px; border-radius: 12px; border: 1px solid #eee; }
.filter-title { font-size: 16px; font-weight: 700; margin-bottom: 20px; color: #333; }
.form-check-input:checked { background-color: #f37021; border-color: #f37021; }

/* Pagination */
.custom-pagination-wrapper { margin-top: 40px; display: flex; justify-content: center; }
.custom-pagination-wrapper nav div:first-child { display: none !important; } 
.custom-pagination-wrapper svg { width: 20px !important; } 
.custom-pagination-wrapper .page-link { border-radius: 8px !important; margin: 0 2px; color: #f37021 !important; border: 1px solid #ddd !important; }
.active .page-link { background-color: #f37021 !important; border-color: #f37021 !important; color: white !important; }

/* CTA Section */
.cta-section {
    padding: 60px 0;
    background-color: #f8f9fa; /* Background luar tetap terang agar card menonjol */
}

.cta-card {
    background: linear-gradient(135deg, #161e2d 0%, #1f2937 100%); /* Warna gelap elegan */
    border-radius: 24px;
    padding: 50px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.cta-left {
    display: flex;
    align-items: center;
    gap: 30px;
}

/* Kotak Icon */
.cta-icon-box {
    width: 64px;
    height: 64px;
    background-color: rgba(255, 255, 255, 0.1); /* Transparan putih */
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: #ffffff;
    flex-shrink: 0;
}

/* Tipografi */
.cta-text h2 {
    color: #ffffff;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 10px;
    letter-spacing: -0.5px;
}

.cta-text p {
    color: #9ca3af; /* Warna abu-abu soft */
    font-size: 16px;
    margin-bottom: 0;
    max-width: 550px;
    line-height: 1.6;
}

/* Tombol Putih */
.btn-send-resume {
    background-color: #ffffff;
    color: #111827 !important;
    padding: 16px 32px;
    border-radius: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
}

.btn-send-resume:hover {
    background-color: #f3f4f6;
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Responsif untuk layar HP */
@media (max-width: 991px) {
    .cta-card {
        flex-direction: column;
        text-align: center;
        padding: 40px 30px;
        gap: 30px;
    }
    
    .cta-left {
        flex-direction: column;
        gap: 20px;
    }
    
    .cta-text p {
        max-width: 100%;
    }
    
    .cta-right {
        width: 100%;
    }
    
    .btn-send-resume {
        justify-content: center;
    }
}

/* BENEFITS */
/* BENEFITS CARD STYLING */
.benefit-card { 
    background: #fff; 
    border-radius: 16px; 
    border: 1px solid #f2f2f2; 
    box-shadow: 0 4px 12px rgba(0,0,0,0.03); 
    padding: 20px; 
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    transition: all 0.3s ease;
}
/* Sesuaikan selector-nya dengan class pembungkus section benefit kamu */
.benefit-section h2 {
    margin-top: 80px;    /* Memberi jarak ke atas (agar tidak mepet list job) */
    margin-bottom: 100px; /* Memberi jarak ke bawah (agar tidak mepet card benefit) */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Opsional: ganti font agar tidak Times New Roman */
}
.benefit-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* Container Ikon & Judul */
.card-header-flex {
    display: flex;
    align-items: center;
    gap: 12px;
    width: 100%;
    margin-bottom: 12px;
}

.icon-wrapper { 
    width: 42px; 
    height: 42px; 
    border-radius: 10px; 
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0; 
}

.icon-wrapper img { 
    width: 60%; 
    height: 60%; 
    object-fit: contain; 
    filter: brightness(0) invert(1); /* Membuat ikon jadi putih */
}

.benefit-card h6 {
    font-size: 1rem;
    margin: 0;
    line-height: 1.2;
}

/* Deskripsi Teks */
.description-text {
    font-size: 0.85rem;
    line-height: 1.5;
    color: #666;
    margin: 0;
    text-align: left;
}
    .toast-notif {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #28a745;
    color: white;
    padding: 12px 20px;
    border-radius: 8px;
    z-index: 9999;
    opacity: 1;
    transition: all 0.5s ease;
}
.hero-career::before,
.hero-career::after {
    pointer-events: none;
}
/* Class untuk memicu animasi muncul */
    .toast-active #toast-content {
        transform: translateY(0) !important;
        opacity: 1 !important;
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
    <div class="container hero-content">

        <span class="tag">WE'RE HIRING</span>

        <h1>
            Bangun Karier Anda <br>
            <span>Bersama PT Aro Baskara Esa</span>
        </h1>

        <p>
            Kami mencari talenta berbakat yang siap bekerja keras dan berdedikasi dalam menghadirkan solusi barang dan jasa terbaik.
            Jika Anda ingin membangun karier yang memberikan dampak nyata, mari menjadi bagian dari tim kami sekarang.
        </p>

        <div class="hero-btn">
            <a href="#career" class="btn-primary">Lihat lowongan</a>
        </div>

    </div>
</section>

<section class="career-header py-5 text-center">
    <div class="container">
        <div class="badge mb-3">
            <i class="fas fa-briefcase me-2"></i> Bergabung Bersama Kami
        </div>
        <h1 class="fw-bold mb-3">Temukan Karier Impianmu</h1>
        <p class="lead text-muted mx-auto" style="max-width: 720px;">
          Temukan peluang karier yang menarik dan jadilah bagian dari tim kami yang terus berkembang. Kami mencari individu penuh semangat yang ingin memberikan perubahan positif
        </p>
    </div>
</section>



<form id="filter-form">

    <div class="filter-wrapper">

        {{-- TEXT HEADER --}}
        <div class="filter-title">
            Temukan peluang karier terbaik untukmu 
        </div>

        <div class="top-filter-bar">

            {{-- SEARCH --}}
            <div class="top-search">
                <i class="fas fa-search"></i>
                <input type="text"
                    name="search"
                    id="search-input"
                    placeholder="Cari posisi yang kamu inginkan..."
                    value="{{ request('search') }}">
            </div>

            {{-- FILTER --}}
            <div class="top-select">
                <select name="category" id="category-select">
                    <option value="" {{ empty($selectedCategory) ? 'selected' : '' }}>
                        Semua Departemen
                    </option>

                    @foreach($jobCategories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ $selectedCategory == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

    </div>

</form>

<div id="job-list">
    @include('partials.job_card_list')
</div>


{{-- BENEFITS SECTION --}}
@if($benefits->isNotEmpty())
<section class="bg-light" style="padding-top: 100px; padding-bottom: 100px;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #f37021; font-family: 'Times New Roman', serif; margin-top: 0; margin-bottom: 20px;">
                Kenapa Bergabung dengan Kami
            </h2>
        </div>

        @php
            $count = count($benefits);
            $colors = ['#f37021', '#28a745', '#007bff', '#6f42c1', '#e83e8c'];
        @endphp

        {{-- Gunakan mx-auto agar container tetap di tengah meskipun jumlah card sedikit --}}
        <div class="row g-4 justify-content-center mx-auto" style="max-width: 1100px;">
            @foreach($benefits as $benefit)
            <div class="
                @if($count == 4) 
                    col-md-6 col-lg-3 
                @else 
                    col-md-6 col-lg-4 
                @endif
            ">
                <div class="benefit-card h-100">
                    <div class="card-header-flex">
                        <div class="icon-wrapper" style="background-color: {{ $colors[$loop->index % count($colors)] }};">
                            <img src="{{ asset('storage/'.$benefit->icon) }}" alt="{{ $benefit->title }}">
                        </div>
                        <h6 class="fw-bold mb-0" style="color: #000;">
                            {{ $benefit->title }}
                        </h6>
                    </div>
                    <p class="description-text">
                        {{ $benefit->description }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


{{-- MODAL APPLY --}}
{{-- MODAL APPLY --}}
<div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
    {{-- Tambahkan modal-dialog-scrollable supaya header & footer otomatis terkunci di tempat --}}
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="border-radius: 20px; border: none; max-height: 85vh;">
            
            {{-- Header (Diam di atas) --}}
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #003366 0%, #f37021 100%); padding: 20px 25px;">
                <h6 class="modal-title fw-bold">Melamar sebagai <span id="vacancy_name_text"></span></h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            {{-- Form membungkus isi agar input & footer sinkron --}}
            <form id="applyJobForm" action="{{ route('apply') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column" style="overflow: hidden;">
                @csrf
                
                {{-- Modal Body (Hanya bagian ini yang bergerak saat di-scroll) --}}
                <div class="modal-body p-4">
                    <input type="hidden" name="job_vacancy_id" id="modal_job_vacancy_id">
                    
                    <div class="row g-2">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="full_name" class="form-control form-control-sm" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Alamat Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control form-control-sm" placeholder="email@contoh.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Nomor WhatsApp <span class="text-danger">*</span></label>
                            <input type="text" name="phone_number" class="form-control form-control-sm" placeholder="0812..." required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <select name="last_education" class="form-select form-select-sm" required>
                                <option value="" selected disabled>Pilih Pendidikan</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D3">D3</option>
                                <option value="D4/S1">D4/S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold mb-1">Pengalaman (Tahun) <span class="text-danger">*</span></label>
                            <select name="years_of_experience" class="form-select form-select-sm" required>
                                <option value="" selected disabled>Pilih Pengalaman</option>
                                <option value="0">Fresh Graduate / < 1 Tahun</option>
                                <option value="1">1 Tahun</option>
                                <option value="2">2 Tahun</option>
                                <option value="3">3 Tahun</option>
                                <option value="5">5 Tahun++</option>
                            </select>
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
                            <textarea name="cover_letter" class="form-control form-control-sm" rows="3" placeholder="Tuliskan alasan Anda tertarik..."></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold mb-1">Upload Resume (PDF) <span class="text-danger">*</span></label>
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

                {{-- Footer (Diam di bawah) --}}
                <div class="modal-footer border-0 pb-4 justify-content-center bg-white" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                    <button type="submit" class="btn px-5 rounded-pill shadow-sm py-2 btn-sm text-white fw-bold" style="background-color: #f37021;">
                        Kirim Lamaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="toast" class="d-none" style="position: fixed; top: 25px; right: 25px; z-index: 9999;">
    <div id="toast-content" style="padding: 15px 25px; border-radius: 12px; color: white; display: flex; align-items: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2); transition: all 0.4s ease; transform: translateY(-20px); opacity: 0;">
        <i id="toast-icon" class="fas fa-check-circle me-2"></i>
        <span id="toast-text" class="fw-bold"></span>
    </div>
</div>

<!-- cta -->
<section class="cta-section">
    <div class="container">
        <div class="cta-card">
            <div class="cta-left">
                <div class="cta-icon-box">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="cta-text">
                    <h2>Tidak Menemukan Posisi yang Tepat?</h2>
                    <p>Cek kembali secara berkala untuk posisi terbaru yang sesuai dengan keahlian Anda.</p>
                </div>
            </div>

            <div class="cta-right">
                <a href="#career" class="btn-send-resume">
                    Lihat lowongan <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ======================================================
    2. JAVASCRIPT (LOGIC)
======================================================= --}}
<script>
/* ================================
   TOAST NOTIFICATION
================================ */
function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    const content = document.getElementById('toast-content');
    const text = document.getElementById('toast-text');
    const icon = document.getElementById('toast-icon');

    if (!toast || !text || !content) return;

    text.innerText = message;

    if (type === 'error') {
        content.style.background = '#dc3545';
        icon.className = 'fas fa-times-circle me-2';
    } else {
        content.style.background = '#28a745';
        icon.className = 'fas fa-check-circle me-2';
    }

    content.style.transform = 'translateY(-20px)';
    content.style.opacity = '0';
    toast.classList.remove('d-none');

    setTimeout(() => {
        content.style.transform = 'translateY(0)';
        content.style.opacity = '1';
    }, 50);

    setTimeout(() => {
        content.style.transform = 'translateY(-20px)';
        content.style.opacity = '0';
        setTimeout(() => toast.classList.add('d-none'), 400);
    }, 3000);
}


/* ================================
   TOGGLE DETAIL
================================ */
function toggleJobDetail(id) {
    const detailBox = document.getElementById('detail-' + id);
    const divider   = document.getElementById('divider-' + id);
    const btnText   = document.getElementById('btn-text-' + id);

    if (!detailBox) return;

    const isHidden = detailBox.classList.contains('d-none');

    detailBox.classList.toggle('d-none', !isHidden);
    if (divider) divider.classList.toggle('d-none', !isHidden);
    if (btnText) btnText.innerText = isHidden ? 'Tutup' : 'Detail';
}


/* ================================
   MAIN LOGIC
================================ */
document.addEventListener('DOMContentLoaded', function () {

    const searchInput   = document.getElementById('search-input');
    const categorySelect = document.getElementById('category-select');
    const jobList       = document.getElementById('job-list');


    let timeout = null;
    let controller = null; // buat cancel request

    /* ================================
       FETCH JOBS (LIVE SEARCH)
    ================================= */
    function fetchJobs(target = null) {

        // ❗ cancel request lama
        if (controller) {
            controller.abort();
        }

        controller = new AbortController();

        const search   = searchInput   ? searchInput.value   : '';
        const category = categorySelect ? categorySelect.value : '';

        const baseUrl  = (typeof target === 'string') ? target : `{{ route('career') }}`;
        const urlTarget = new URL(baseUrl, window.location.origin);

        if (search) urlTarget.searchParams.set('search', search);
        if (category) urlTarget.searchParams.set('category', category);

        fetch(urlTarget.toString(), {
            signal: controller.signal,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(res => res.text())
        .then(html => {
            jobList.innerHTML = html;
            window.history.pushState({}, '', urlTarget.toString());
        })
        .catch(err => {
            if (err.name !== 'AbortError') {
                console.error('Fetch error:', err);
            }
        });
    }

    /* ================================
       LIVE SEARCH (DEBOUNCE)
    ================================= */
    if (searchInput) {
        searchInput.addEventListener('input', () => {
            clearTimeout(timeout);
            timeout = setTimeout(() => fetchJobs(), 700); // ❗ jangan kecil-kecil
        });
    }

    /* ================================
       FILTER
    ================================= */
    if (categorySelect) {
        categorySelect.addEventListener('change', () => {
            fetchJobs();
        });
    }

    /* ================================
       PAGINATION AJAX
    ================================= */
    document.addEventListener('click', function (e) {
        const link = e.target.closest('.pagination a');
        if (link) {
            e.preventDefault();
            fetchJobs(link.getAttribute('href'));
        }
    });

    /* ================================
       SET MODAL DATA
    ================================= */
    const applyModal = document.getElementById('applyModal');

    if (applyModal) {
        applyModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            if (!button) return;

            const id   = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            document.getElementById('modal_job_vacancy_id').value = id;
            document.getElementById('vacancy_name_text').innerText = name;
        });
    }

    /* ================================
       SUBMIT APPLY FORM (AJAX)
    ================================= */
const applyForm = document.getElementById('applyJobForm');

if (applyForm) {
    applyForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const jobIdEl = document.getElementById('modal_job_vacancy_id');
        const jobId = jobIdEl ? jobIdEl.value : null;

        if (!jobId) {
            showToast('ID Lowongan tidak terbaca!', 'error');
            return;
        }

        const submitBtn = applyForm.querySelector('button[type="submit"]');
        const originalBtnHTML = submitBtn ? submitBtn.innerHTML : '';

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Mengirim...';
        }

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                'Accept': 'application/json'
            }
        })
        .then(async (res) => {
            let data;
            try {
                data = await res.json();
            } catch {
                throw new Error('Server tidak mengembalikan JSON');
            }

            if (!res.ok) {
                if (res.status === 422 && data.errors) {
                    const firstError = Object.values(data.errors)[0][0];
                    throw new Error(firstError);
                }
                throw new Error(data.message || 'Error server');
            }

            return data;
        })
        .then((data) => {
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('applyModal')).hide();
                applyForm.reset();
                showToast(data.message || 'Berhasil kirim!', 'success');
            } else {
                showToast(data.message || 'Gagal', 'error');
            }
        })
        .catch((err) => {
            console.error(err);
            showToast(err.message, 'error');
        })
        .finally(() => {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHTML;
            }
        });
    });
}

 });


</script>