{{-- ===================== ABOUT SECTION PARTIAL ===================== --}}
<section id="tentang" class="section-padding">
    <div class="container">
        <div class="row align-items-center">

            {{-- Image Section --}}
            <div class="col-lg-6 mb-4">
                @if($company && $company->image)
                    <img src="{{ asset($company->image) }}" alt="{{ $company->company_name }}" class="img-fluid rounded">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 350px;">
                        <i class="fas fa-building fa-5x text-muted"></i>
                    </div>
                @endif
            </div>

            {{-- Text Section --}}
            <div class="col-lg-6">
                <h2 class="section-title" style="color: #EE8E0F;">Tentang Perusahaan</h2>
                <div class="divider-line" style="background: linear-gradient(90deg, #FFA500, #FF8C00, #FFA500); width: 50px; height: 3px; margin: 12px 0; border-radius: 2px; box-shadow: 0 2px 8px rgba(255, 165, 0, 0.3); animation: shimmer-divider 3s ease-in-out infinite;"></div>

                @if($company && !empty($company->description))
                    <p style="line-height:1.8; color:#555; text-align: justify; font-size: 1.1rem;">
                        @if(isset($limitDescription) && $limitDescription)
                            {{ Str::limit($company->description, 250) }}
                        @else
                            {{ $company->description }}
                        @endif
                    </p>
                @else
                    <p class="text-muted">Belum ada deskripsi perusahaan</p>
                @endif

                @if(isset($showButton) && $showButton)
                    <div class="mt-4">
                        <a href="{{ route('about.index') }}" class="btn btn-contact">Lihat Selengkapnya</a>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
