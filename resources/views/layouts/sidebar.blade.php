<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">

        <!-- User -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
                     class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- MENU -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Product Links -->
                <li class="nav-item">
                    <a href="{{ route('admin.product-links.edit') }}"
                       class="nav-link {{ request()->is('admin/product-links*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-link"></i>
                        <p>Product Links</p>
                    </a>
                </li>

                <!-- Pesan Masuk -->
                <li class="nav-item">
                    <a href="{{ route('admin.contact-messages.index') }}"
                       class="nav-link {{ request()->is('admin/contact-messages*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Pesan Masuk
                            @php $unreadMessages = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                            @if($unreadMessages > 0)
                                <span class="badge badge-warning right">{{ $unreadMessages }}</span>
                            @endif
                        </p>
                    </a>
                </li>

                <!-- Banner -->
                <li class="nav-item">
                    <a href="{{ route('admin.banners.index') }}"
                       class="nav-link {{ request()->is('admin/banners*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Banners</p>
                    </a>
                </li>

                <!-- Company Profile -->
                <li class="nav-item">
                    <a href="{{ route('admin.company-profiles.index') }}"
                       class="nav-link {{ request()->is('admin/company-profiles*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Company Profile</p>
                    </a>
                </li>

                <!-- Category -->
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}"
                       class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <!-- Partner -->
                <li class="nav-item">
                    <a href="{{ route('admin.partners.index') }}"
                       class="nav-link {{ request()->is('admin/partners*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Partners</p>
                    </a>
                </li>

                <!-- Legalities -->
                <li class="nav-item">
                    <a href="{{ route('admin.work-processes.index') }}"
                       class="nav-link {{ request()->is('admin/work-processes*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>Work Processes</p>
                    </a>
                </li>

                <!-- Platform -->
                <li class="nav-item has-treeview {{ request()->is('admin/platforms*') ? 'menu-open' : '' }}">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fas fa-laptop"></i>
                        <p>
                            Platform
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.platforms.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Platform</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.platforms.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Platform</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- TENTANG -->
                <li class="nav-item has-treeview 
                {{ request()->is('admin/statistics*') 
                || request()->is('admin/visi-misi*') 
                || request()->is('admin/team-members*') 
                || request()->is('admin/partners*') 
                || request()->is('admin/brands*') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link 
                    {{ request()->is('admin/statistics*') 
                    || request()->is('admin/visi-misi*') 
                    || request()->is('admin/team-members*') 
                    || request()->is('admin/partners*')
                    || request()->is('admin/brands*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Tentang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.statistics.index') }}"
                            class="nav-link {{ request()->is('admin/statistics*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statistik</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.visi-misi.index') }}"
                            class="nav-link {{ request()->is('admin/visi-misi*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Visi & Misi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.brands.index') }}"
                               class="nav-link {{ request()->is('admin/brands*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brands</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.partners.index') }}"
                            class="nav-link {{ request()->is('admin/partners*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mitra Teknologi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.team-members.index') }}"
                            class="nav-link {{ request()->is('admin/team-members*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Team</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>