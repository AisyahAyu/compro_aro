<style>
    .footer-link-dynamic {
        color: {{ $footerSettings->footer_link_color }} !important;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .footer-link-dynamic:hover {
        color: {{ $footerSettings->footer_link_hover_color }} !important;
    }
    .footer-heading-dynamic {
        color: {{ $footerSettings->footer_heading_color }} !important;
        font-weight: 600;
    }
    .footer-icon-dynamic {
        color: {{ $footerSettings->contact_icon_color }} !important;
    }
    .footer-social-dynamic {
        color: {{ $footerSettings->social_icon_color }} !important;
        transition: color 0.3s ease;
    }
    .footer-social-dynamic:hover {
        color: {{ $footerSettings->social_icon_hover_color }} !important;
    }
    .footer-btn-dynamic {
        background-color: {{ $footerSettings->location_btn_bg_color }} !important;
        color: {{ $footerSettings->location_btn_text_color }} !important;
        border: 1px solid {{ $footerSettings->location_btn_border_color }} !important;
        border-radius: 20px;
        padding: 6px 16px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }
    .footer-btn-dynamic:hover {
        background-color: {{ $footerSettings->location_btn_bg_color === 'transparent' || $footerSettings->location_btn_bg_color === '' ? $footerSettings->location_btn_text_color : 'transparent' }} !important;
        color: {{ $footerSettings->location_btn_bg_color === 'transparent' || $footerSettings->location_btn_bg_color === '' ? '#fff' : $footerSettings->location_btn_text_color }} !important;
    }
    .footer-map-border {
        border-radius: 10px;
        overflow: hidden;
        border: 2px solid {{ $footerSettings->footer_border_color }} !important;
    }
    .footer-divider {
        border-color: {{ $footerSettings->footer_border_color }} !important;
        opacity: 0.2;
    }
</style>

<footer style="background: {{ $footerSettings->footer_bg_color }}; color: {{ $footerSettings->footer_text_color }}; padding: 60px 0 30px; border-top: 1px solid {{ $footerSettings->footer_border_color }};">
    <div class="container">
        <div class="row g-4">
            <!-- KOLOM 1: LOGO & DESKRIPSI PERUSAHAAN -->
            <div class="col-lg-3 col-md-6 mb-4">
                @php
                    $footerLogoPath = $footerSettings->footer_logo ?? null;
                    $hasFooterLogo = $footerLogoPath && file_exists(public_path('storage/' . $footerLogoPath));
                    
                    $companyLogoPath = $companyProfile ? getCompanyLogo($companyProfile, 'dark') : null;
                    $hasCompanyLogo = $companyLogoPath && file_exists(public_path($companyLogoPath));
                @endphp
                @if($hasFooterLogo)
                    <img src="{{ asset('storage/' . $footerSettings->footer_logo) }}" alt="{{ $companyProfile->company_name ?? 'PT ARO Baskara Esa' }}" class="footer-logo logo-dark-bg" style="height: 60px; margin-bottom: 20px; object-fit: contain;">
                @elseif($hasCompanyLogo)
                    <img src="{{ getCompanyLogoUrl($companyProfile, 'dark') }}" alt="{{ $companyProfile->company_name ?? 'PT ARO Baskara Esa' }}" class="footer-logo logo-dark-bg" style="height: 60px; margin-bottom: 20px; object-fit: contain;">
                @endif
                <p class="mt-3" style="color: {{ $footerSettings->footer_text_color }}; line-height: 1.6; opacity: 0.9;">
                    PT ARO Baskara Esa berkomitmen menjadi mitra pengadaan yang andal bagi sektor swasta dan instansi pemerintah. Dengan mengutamakan integritas, efisiensi, dan kepatuhan terhadap regulasi, kami menghadirkan solusi pengadaan yang dirancang sesuai kebutuhan spesifik setiap mitra.
                </p>
            </div>
            
            <!-- KOLOM 2: TAUTAN -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="mb-4 footer-heading-dynamic">Tautan</h5>
                <ul class="footer-links" style="list-style: none; padding: 0;">
                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="footer-link-dynamic" style="display: flex; align-items: center;">
                            <i class="fas fa-chevron-right me-2 footer-icon-dynamic" style="font-size: 0.8rem;"></i>
                            Beranda
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('about.index') }}" class="footer-link-dynamic" style="display: flex; align-items: center;">
                            <i class="fas fa-chevron-right me-2 footer-icon-dynamic" style="font-size: 0.8rem;"></i>
                            Tentang
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('products.page') }}" class="footer-link-dynamic" style="display: flex; align-items: center;">
                            <i class="fas fa-chevron-right me-2 footer-icon-dynamic" style="font-size: 0.8rem;"></i>
                            Produk
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('aktivitas') }}" class="footer-link-dynamic" style="display: flex; align-items: center;">
                            <i class="fas fa-chevron-right me-2 footer-icon-dynamic" style="font-size: 0.8rem;"></i>
                            Aktivitas
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('faq.page') }}" class="footer-link-dynamic" style="display: flex; align-items: center;">
                            <i class="fas fa-chevron-right me-2 footer-icon-dynamic" style="font-size: 0.8rem;"></i>
                            FAQ
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- KOLOM 3: HUBUNGI KAMI -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-4 footer-heading-dynamic">Hubungi Kami</h5>
                <div class="contact-info">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope me-3 footer-icon-dynamic" style="font-size: 1.2rem; width: 20px;"></i>
                        <a href="mailto:{{ $companyProfile->email ?? 'arobaskara@gmail.com' }}" class="footer-link-dynamic">
                            {{ $companyProfile->email ?? 'arobaskara@gmail.com' }}
                        </a>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone me-3 footer-icon-dynamic" style="font-size: 1.2rem; width: 20px;"></i>
                        <span style="color: {{ $footerSettings->footer_text_color }}; opacity: 0.9;">
                            {{ $companyProfile->phone ?? '(021) 38835187' }}
                        </span>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="fab fa-whatsapp me-3 footer-icon-dynamic" style="font-size: 1.2rem; width: 20px;"></i>
                        @if($companyProfile && $companyProfile->whatsapp)
                            @php
                                $waNumber = preg_replace('/[^0-9]/', '', $companyProfile->whatsapp);
                                $waLink = 'https://wa.me/' . $waNumber;
                            @endphp
                            <a href="{{ $waLink }}" target="_blank" class="footer-link-dynamic">
                                {{ $companyProfile->whatsapp }}
                            </a>
                        @else
                            <a href="https://wa.me/6282288886009" target="_blank" class="footer-link-dynamic">
                                +62 822-8888-6009
                            </a>
                        @endif
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-globe me-3 footer-icon-dynamic" style="font-size: 1.2rem; width: 20px;"></i>
                        <a href="https://ayobelanja.co.id" target="_blank" class="footer-link-dynamic">
                            ayobelanja.co.id
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- KOLOM 4: LOKASI KAMI -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="mb-4 footer-heading-dynamic">Lokasi Kami</h5>
                <p class="mb-2" style="color: {{ $footerSettings->footer_text_color }}; opacity: 0.8; font-size: 0.9rem; line-height: 1.5;">
                    Kunjungi kantor kami di alamat di bawah ini atau temukan kami di peta.
                </p>

                <div class="d-flex mb-3">
                    <i class="fas fa-map-marker-alt me-3 footer-icon-dynamic" style="font-size: 1.2rem; margin-top: 2px;"></i>
                    <div style="color: {{ $footerSettings->footer_text_color }}; line-height: 1.6; opacity: 0.9; font-size: 0.9rem;">
                        @if($companyProfile && $companyProfile->address)
                            {!! nl2br(e($companyProfile->address)) !!}
                        @else
                            Jl. TM. Slamet Riyadi Raya No. 9 RT.1 RW.4<br>
                            Kb. Manggis, Kec. Matraman<br>
                            Daerah Khusus Ibukota Jakarta<br>
                            13150
                        @endif
                    </div>
                </div>

                <button onclick="openGoogleMaps()" class="btn btn-sm footer-btn-dynamic mb-3">
                    <i class="fas fa-map-marked-alt me-2"></i>
                    Buka Lokasi
                </button>
                
                <!-- Google Maps Embed -->
                @if($footerSettings->footer_google_maps_iframe)
                <div class="mt-2 footer-map-border">
                    <iframe 
                        src="{{ $footerSettings->footer_google_maps_iframe }}"
                        width="100%" 
                        height="150" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Copyright Section -->
        <hr class="my-4 footer-divider">
        
        <div class="text-center">
            <p style="color: {{ $footerSettings->footer_text_color }}; opacity: 0.7; margin: 0;">
                &copy; {{ date('Y') }} {{ $footerSettings->footer_copyright ?? ($companyProfile->company_name ?? 'PT. ARO Baskara Esa') }}. All rights reserved.
            </p>
        </div>
    </div>
    
    <script>
        function openGoogleMaps() {
            window.open('{{ $footerSettings->footer_google_maps_link ?? "https://www.google.com/maps/place/PT+Aro+Baskara+Esa/@-6.2119878,106.8585438" }}', '_blank');
        }
    </script>
</footer>
