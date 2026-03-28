<nav class="navbar navbar-expand-lg navbar-light fixed-top transparent-navbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            @if($companyProfile && getCompanyLogo($companyProfile, 'light'))
                <img src="{{ getCompanyLogoUrl($companyProfile, 'light') }}" alt="{{ $companyProfile->company_name ?? 'Company' }}" class="navbar-logo logo-light-bg" style="height: 60px;">
            @else
                <span style="font-weight: bold; color: var(--primary-orange); font-size: 1.2rem;">PT. ARO BASKARA ESA</span>
            @endif
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="display: none !important;">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="display: flex; align-items: center; justify-content: flex-end; width: 100%;">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tentang') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#karir">Karir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aktivitas">Aktivitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#e-belanja">E-Belanja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faq">FAQ</a>
                </li>
                <li class="nav-item ms-4">
                    <a href="#hubungi" class="btn btn-contact text-decoration-none">Hubungi Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
