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
                    <a class="nav-link {{ request()->is('solusi*') ? 'active' : '' }}" href="{{ route('solusi.page') }}">Solusi</a>
                </li>
                <li class="nav-item custom-dropdown-wrapper">
                    <a class="nav-link {{ request()->is('product') || request()->is('produk*') ? 'active' : '' }} dropdown-toggle-custom" href="{{ route('product.page') }}">
                        Produk <i class="fas fa-chevron-down ms-1 dropdown-arrow-icon"></i>
                    </a>
                    
                    @if(isset($navbarCategories) && $navbarCategories->count() > 0)
                        <!-- Mega Dropdown Menu -->
                        <div class="custom-mega-dropdown">
                            <ul class="dropdown-category-list">
                                @php
                                    if (!function_exists('getNavbarCategoryIcon')) {
                                        function getNavbarCategoryIcon($name) {
                                            $name = strtolower($name);
                                            if (str_contains($name, 'kantor') && str_contains($name, 'furniture')) {
                                                return 'fa-chair';
                                            } elseif (str_contains($name, 'pendidikan') && str_contains($name, 'furniture')) {
                                                return 'fa-school';
                                            } elseif (str_contains($name, 'kantor')) {
                                                return 'fa-briefcase';
                                            } elseif (str_contains($name, 'pendidikan')) {
                                                return 'fa-book-open';
                                            } elseif (str_contains($name, 'mesin') || str_contains($name, 'perkakas')) {
                                                return 'fa-tools';
                                            } elseif (str_contains($name, 'dapur')) {
                                                return 'fa-utensils';
                                            } elseif (str_contains($name, 'elektronik')) {
                                                return 'fa-laptop';
                                            } elseif (str_contains($name, 'kit') || str_contains($name, 'p3k') || str_contains($name, 'aid')) {
                                                return 'fa-kit-medical';
                                            }
                                            return 'fa-folder';
                                        }
                                    }
                                @endphp
                                @foreach($navbarCategories as $category)
                                    <li>
                                        <a href="{{ route('products.page', ['category' => $category->id]) }}" class="dropdown-category-item">
                                            <i class="fas {{ getNavbarCategoryIcon($category->name) }} category-icon"></i>
                                            <span>{{ $category->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="dropdown-footer">
                                <a href="{{ route('products.page') }}" class="btn-all-products">
                                    Lihat Semua Produk <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    @endif
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
