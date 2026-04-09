<nav class="navbar navbar-expand-lg navbar-light fixed-top transparent-navbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            @if($companyProfile && getCompanyLogo($companyProfile, 'light'))
                <img src="{{ getCompanyLogoUrl($companyProfile, 'light') }}" alt="{{ $companyProfile->company_name ?? 'Company' }}" class="navbar-logo logo-light-bg" style="height: 60px;">
            @else
                <span style="font-weight: bold; color: var(--primary-orange); font-size: 1.2rem;">PT. ARO BASKARA ESA</span>
            @endif
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.index') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('karir*') ? 'active' : '' }}" href="{{ route('career') }}">Karir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('solusi*') ? 'active' : '' }}" href="{{ route('solusi.page') }}">Solusi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('product') || request()->is('produk*') ? 'active' : '' }}" href="{{ route('product.page') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('aktivitas*') ? 'active' : '' }}" href="{{ route('aktivitas') }}">
                        Aktivitas
                    </a>
                </li>
                                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq.page') }}">FAQ</a>
                </li>
                <li class="nav-item ms-4">
                    <a href="{{ route('contact.page') }}" class="btn btn-contact text-decoration-none">Hubungi Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
