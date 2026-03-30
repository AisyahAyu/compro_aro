@extends('layouts.app')

@section('title', 'Tentang Kami - PT ARO')

@section('content')
<!-- Hero Section -->
<section class="hero-slider">
    <div class="hero-slide active" style="background-image: url('/uploads/banners/banner tentang.png'); background-size: cover; background-position: center; min-height: 80vh;">
        <div class="hero-content-wrapper">
            <div class="container">
                <div class="hero-content" style="text-align: left;">
                    <h1 class="hero-title" style="font-size: 3.5rem; margin-bottom: 2rem; max-width: 500px;">Mengenal PT Aro Baskara Esa</h1>
                    <p class="hero-description" style="font-size: 1.3rem; max-width: 500px; margin-bottom: 3rem; line-height: 1.6;">
                        Solusi pengadaan barang dan jasa yang profesional, transparan dan terpercaya untuk sektor bisnis dan pemerintahan.
                    </p>
                    <a href="#hubungi" class="hero-button" style="background: transparent; border: 2px solid white; color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none; font-weight: 500; transition: all 0.3s ease; display: inline-block;" onmouseover="this.style.background='#FE9800'; this.style.borderColor='#FE9800';" onmouseout="this.style.background='transparent'; this.style.borderColor='white';">
                        Lihat Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="/uploads/tentang perusahaan.png" alt="About Us" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title" style="color: #FE9800;">Tentang Perusahaan</h2>
                <div class="divider-line" style="background-color: #FE9800;"></div>
                <p class="mb-4" style="text-align: justify;">
                    PT. Aro Baskara Esa adalah perusahaan penyedia solusi barang dan jasa terintegrasi untuk sektor swasta (B2B) dan instansi pemerintah (B2G). Sejak didirikan pada November 2023, perusahaan berkomitmen memberikan layanan yang profesional, efisien, dan terpercaya dengan mengutamakan kualitas serta ketepatan waktu dalam setiap proyek.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Point Section -->
<section class="section-padding" style="background-image: url('/uploads/point.png'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <div class="row mt-5">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="point-card text-center">
                                <div class="point-icon mb-3">
                                    <i class="fas fa-users" style="font-size: 3rem; color: white;"></i>
                                </div>
                                <h4 class="text-white mb-3">100+ Klien</h4>
                                <p class="text-white-50">Lebih dari 100 klien puas dengan layanan kami yang berkualitas</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="point-card text-center">
                                <div class="point-icon mb-3">
                                    <i class="fas fa-box" style="font-size: 3rem; color: white;"></i>
                                </div>
                                <h4 class="text-white mb-3">200+ Produk</h4>
                                <p class="text-white-50">Berbagai macam produk dan jasa terintegrasi untuk kebutuhan bisnis</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="point-card text-center">
                                <div class="point-icon mb-3">
                                    <i class="fas fa-handshake" style="font-size: 3rem; color: white;"></i>
                                </div>
                                <h4 class="text-white mb-3">10+ Mitra</h4>
                                <p class="text-white-50">Bekerja sama dengan lebih dari 10 mitra bisnis terpercaya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Visi & Misi</h2>
            <div class="divider-line mx-auto" style="background-color: #FE9800;"></div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="vision-mission-content">
                    <h3 class="mb-3" style="color: #050052; font-weight: 600;">Visi</h3>
                    <p class="mb-0">
                        Menjadi perusahaan penyedia solusi barang dan jasa terdepan yang terpercaya dan menjadi mitra strategis bagi klien di sektor swasta dan pemerintah.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="vision-mission-content">
                    <h3 class="mb-3" style="color: #050052; font-weight: 600;">Misi</h3>
                    <p class="mb-0">
                        Memberikan solusi barang dan jasa berkualitas tinggi dengan harga kompetitif, menjunjung tinggi integritas dan profesionalisme, serta membangun hubungan jangka panjang dengan klien dan mitra bisnis.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Brands Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Brand Kami</h2>
            <div class="divider-line mx-auto"></div>
            <p class="text-muted">Kami memiliki beberapa brand yang fokus pada solusi teknologi spesifik</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-mobile-alt" style="font-size: 2.5rem; color: #FE9800;"></i>
                        </div>
                        <h5 class="card-title">ARO Mobile</h5>
                        <p class="card-text small">Solusi aplikasi mobile untuk iOS dan Android</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-cloud" style="font-size: 2.5rem; color: #FE9800;"></i>
                        </div>
                        <h5 class="card-title">ARO Cloud</h5>
                        <p class="card-text small">Layanan cloud computing terpercaya</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-shield-alt" style="font-size: 2.5rem; color: #FE9800;"></i>
                        </div>
                        <h5 class="card-title">ARO Secure</h5>
                        <p class="card-text small">Solusi keamanan siber terpadu</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="fas fa-chart-line" style="font-size: 2.5rem; color: #FE9800;"></i>
                        </div>
                        <h5 class="card-title">ARO Analytics</h5>
                        <p class="card-text small">Platform analisis data dan business intelligence</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Official Technology Partners Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Mitra Teknologi Resmi</h2>
            <div class="divider-line mx-auto"></div>
            <p class="text-muted">Kami bermitra dengan perusahaan teknologi terkemuka dunia</p>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="partner-logo text-center">
                    <img src="https://via.placeholder.com/120x60/FFFFFF/050052?text=Microsoft" alt="Microsoft" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="partner-logo text-center">
                    <img src="https://via.placeholder.com/120x60/FFFFFF/050052?text=Google" alt="Google" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="partner-logo text-center">
                    <img src="https://via.placeholder.com/120x60/FFFFFF/050052?text=Amazon" alt="Amazon" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="partner-logo text-center">
                    <img src="https://via.placeholder.com/120x60/FFFFFF/050052?text=Oracle" alt="Oracle" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="partner-logo text-center">
                    <img src="https://via.placeholder.com/120x60/FFFFFF/050052?text=IBM" alt="IBM" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-4">
                <div class="partner-logo text-center">
                    <img src="https://via.placeholder.com/120x60/FFFFFF/050052?text=SAP" alt="SAP" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Introduction Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Tim Profesional Kami</h2>
            <div class="divider-line mx-auto"></div>
            <p class="text-muted">Tim ahli yang siap membantu kesuksesan bisnis Anda</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://via.placeholder.com/300x300/050052/FFFFFF?text=CEO" class="card-img-top" alt="Team Member">
                    <div class="card-body text-center">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text text-muted small">Chief Executive Officer</p>
                        <div class="social-links justify-content-center">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://via.placeholder.com/300x300/050052/FFFFFF?text=CTO" class="card-img-top" alt="Team Member">
                    <div class="card-body text-center">
                        <h5 class="card-title">Jane Smith</h5>
                        <p class="card-text text-muted small">Chief Technology Officer</p>
                        <div class="social-links justify-content-center">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://via.placeholder.com/300x300/050052/FFFFFF?text=CFO" class="card-img-top" alt="Team Member">
                    <div class="card-body text-center">
                        <h5 class="card-title">Mike Johnson</h5>
                        <p class="card-text text-muted small">Chief Financial Officer</p>
                        <div class="social-links justify-content-center">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://via.placeholder.com/300x300/050052/FFFFFF?text=COO" class="card-img-top" alt="Team Member">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sarah Williams</h5>
                        <p class="card-text text-muted small">Chief Operating Officer</p>
                        <div class="social-links justify-content-center">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="section-padding" style="background: linear-gradient(135deg, #050052 0%, #160C4B 100%);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-white mb-4">Siap untuk Memulai Proyek Anda?</h2>
                <p class="text-white-50 mb-4">Hubungi kami sekarang dan dapatkan solusi teknologi terbaik untuk bisnis Anda</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#contact" class="btn btn-lg px-4" style="background-color: #FE9800; color: white; border: none; border-radius: 25px;">Hubungi Kami</a>
                    <a href="#portfolio" class="btn btn-outline-light btn-lg px-4" style="border-radius: 25px;">Lihat Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection