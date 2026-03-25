<footer style="background: #0B042E; color: white; padding: 60px 0 30px;">
    <div class="container">
        <div class="row g-4">
            <!-- KOLOM 1: LOGO & DESKRIPSI PERUSAHAAN -->
            <div class="col-lg-3 col-md-6 mb-4">
                @if($companyProfile && getCompanyLogo($companyProfile, 'dark'))
                    <img src="{{ getCompanyLogoUrl($companyProfile, 'dark') }}" alt="{{ $companyProfile->company_name ?? 'PT ARO Baskara Esa' }}" class="footer-logo logo-dark-bg" style="height: 60px; margin-bottom: 20px; object-fit: contain;">
                @endif
                <p class="mt-3" style="color: rgba(255,255,255,0.9); line-height: 1.6;">
                    PT ARO Baskara Esa berkomitmen menjadi mitra pengadaan yang andal bagi sektor swasta dan instansi pemerintah. Dengan mengutamakan integritas, efisiensi, dan kepatuhan terhadap regulasi, kami menghadirkan solusi pengadaan yang dirancang sesuai kebutuhan spesifik setiap mitra.
                </p>
            </div>
            
            <!-- KOLOM 2: TENTANG KAMI / ALAMAT -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-4" style="color: var(--primary-orange); font-weight: 600;">Tentang Kami</h5>
                <div class="address-info">
                    <div class="d-flex mb-3">
                        <i class="fas fa-map-marker-alt me-3" style="color: var(--primary-orange); font-size: 1.2rem; margin-top: 2px;"></i>
                        <div style="color: rgba(255,255,255,0.9); line-height: 1.6;">
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
                </div>
            </div>
            
            <!-- KOLOM 3: HUBUNGI KAMI -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-4" style="color: var(--primary-orange); font-weight: 600;">Hubungi Kami</h5>
                <div class="contact-info">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope me-3" style="color: var(--primary-orange); font-size: 1.2rem; width: 20px;"></i>
                        <a href="mailto:{{ $companyProfile->email ?? 'arobaskara@gmail.com' }}" style="color: rgba(255,255,255,0.9); text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='var(--primary-orange)'" onmouseout="this.style.color='rgba(255,255,255,0.9)'">
                            {{ $companyProfile->email ?? 'arobaskara@gmail.com' }}
                        </a>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone me-3" style="color: var(--primary-orange); font-size: 1.2rem; width: 20px;"></i>
                        <span style="color: rgba(255,255,255,0.9);">
                            {{ $companyProfile->phone ?? '(021) 38835187' }}
                        </span>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="fab fa-whatsapp me-3" style="color: var(--primary-orange); font-size: 1.2rem; width: 20px;"></i>
                        <a href="https://wa.me/6282288886009" target="_blank" style="color: rgba(255,255,255,0.9); text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='var(--primary-orange)'" onmouseout="this.style.color='rgba(255,255,255,0.9)'">
                            +62 822-8888-6009
                        </a>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-globe me-3" style="color: var(--primary-orange); font-size: 1.2rem; width: 20px;"></i>
                        <a href="https://ayobelanja.co.id" target="_blank" style="color: rgba(255,255,255,0.9); text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='var(--primary-orange)'" onmouseout="this.style.color='rgba(255,255,255,0.9)'">
                            ayobelanja.co.id
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- KOLOM 4: TAUTAN & LOKASI -->
            <div class="col-lg-3 col-md-6 mb-4">
                <!-- A. Tautan Navigasi -->
                <div class="mb-4">
                    <h5 class="mb-3" style="color: var(--primary-orange); font-weight: 600;">Tautan</h5>
                    <ul class="footer-links" style="list-style: none; padding: 0;">
                        <li class="mb-2">
                            <a href="{{ url('/') }}" style="color: rgba(255,255,255,0.9); text-decoration: none; transition: color 0.3s ease; display: flex; align-items: center;" onmouseover="this.style.color='var(--primary-orange)'" onmouseout="this.style.color='rgba(255,255,255,0.9)'">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>
                                Beranda
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#tentang" style="color: rgba(255,255,255,0.9); text-decoration: none; transition: color 0.3s ease; display: flex; align-items: center;" onmouseover="this.style.color='var(--primary-orange)'" onmouseout="this.style.color='rgba(255,255,255,0.9)'">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>
                                Tentang
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('products.page') }}" style="color: rgba(255,255,255,0.9); text-decoration: none; transition: color 0.3s ease; display: flex; align-items: center;" onmouseover="this.style.color='var(--primary-orange)'" onmouseout="this.style.color='rgba(255,255,255,0.9)'">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>
                                Produk
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#aktivitas" style="color: rgba(255,255,255,0.9); text-decoration: none; transition: color 0.3s ease; display: flex; align-items: center;" onmouseover="this.style.color='var(--primary-orange)'" onmouseout="this.style.color='rgba(255,255,255,0.9)'">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>
                                Aktivitas
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#faq" style="color: rgba(255,255,255,0.9); text-decoration: none; transition: color 0.3s ease; display: flex; align-items: center;" onmouseover="this.style.color='var(--primary-orange)'" onmouseout="this.style.color='rgba(255,255,255,0.9)'">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>
                                FAQ
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- B. Lokasi Kami -->
                <div>
                    <h5 class="mb-3" style="color: var(--primary-orange); font-weight: 600;">Lokasi Kami</h5>
                    <p class="mb-3" style="color: rgba(255,255,255,0.8); font-size: 0.9rem; line-height: 1.5;">
                        Kunjungi kantor kami di alamat di bawah ini atau temukan kami di peta.
                    </p>
                    
                    <button onclick="openGoogleMaps()" class="btn btn-outline-light btn-sm" style="border-color: var(--primary-orange); color: var(--primary-orange); border-radius: 20px; padding: 6px 16px; font-size: 0.85rem; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='var(--primary-orange)'; this.style.color='white';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--primary-orange)';">
                        <i class="fas fa-map-marked-alt me-2"></i>
                        Buka Lokasi
                    </button>
                    
                    <!-- Google Maps Embed -->
                    <div class="mt-3" style="border-radius: 10px; overflow: hidden; border: 2px solid var(--primary-orange);">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8495693507864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJl.%20TM.%20Slamet%20Riyadi%20Raya%20No.9%2C%20RT.1%2FRW.4%2C%20Kb.%20Manggis%2C%20Kec.%20Matraman%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2013150!5e0!3m2!1sen!2sid!4v1234567890"
                            width="100%" 
                            height="150" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Copyright Section -->
        <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
        
        <div class="text-center">
            <p style="color: rgba(255,255,255,0.7); margin: 0;">
                &copy; {{ date('Y') }} {{ $companyProfile->company_name ?? 'PT ARO Baskara Esa' }}. All rights reserved.
            </p>
        </div>
    </div>
    
    <script>
        function openGoogleMaps() {
            const address = 'Jl. TM. Slamet Riyadi Raya No. 9 RT.1 RW.4 Kb. Manggis, Kec. Matraman Daerah Khusus Ibukota Jakarta 13150';
            const encodedAddress = encodeURIComponent(address);
            window.open(`https://www.google.com/maps/search/?api=1&query=${encodedAddress}`, '_blank');
        }
    </script>
</footer>
