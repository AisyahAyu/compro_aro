{{-- ===================== ABOUT SECTION PARTIAL ===================== --}}
<section id="tentang" class="section-padding scroll-reveal">
    <div class="container">
        <div class="row align-items-center">

            {{-- Image Section --}}
            <div class="col-lg-6 mb-4 scroll-reveal-left">
                <div class="about-image-wrapper">
                    @if($company && $company->image)
                        <img src="{{ asset($company->image) }}" alt="{{ $company->company_name }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 350px;">
                            <i class="fas fa-building fa-5x text-muted"></i>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Text Section --}}
            <div class="col-lg-6 scroll-reveal-right">
                <div class="about-content">
                    <h2 class="about-title">Tentang Perusahaan</h2>
                    
                    @if($company && !empty($company->description))
                        <div class="about-description">
                            @if(isset($limitDescription) && $limitDescription)
                                {{ Str::limit($company->description, 250) }}
                            @else
                                {{ $company->description }}
                            @endif
                        </div>
                    @else
                        <div class="about-description">
                            <p>Belum ada deskripsi perusahaan</p>
                        </div>
                    @endif

                    
                    <!-- Features Badges -->
                    <div class="about-features">
                        <div class="feature-badge">
                            <i class="fas fa-award"></i>
                            <span>Berkualitas</span>
                        </div>
                        <div class="feature-badge">
                            <i class="fas fa-clock"></i>
                            <span>Tepat Waktu</span>
                        </div>
                        <div class="feature-badge">
                            <i class="fas fa-shield-alt"></i>
                            <span>Bergaransi</span>
                        </div>
                        <div class="feature-badge">
                            <i class="fas fa-users"></i>
                            <span>Profesional</span>
                        </div>
                    </div>

                    @if(isset($showButton) && $showButton)
                        <div class="mt-4">
                            <a href="{{ route('about.index') }}" class="btn btn-contact">
                                <i class="fas fa-arrow-right me-2"></i>
                                Lihat Selengkapnya
                            </a>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
