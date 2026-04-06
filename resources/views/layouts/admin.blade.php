<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') - Company Profile</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <!-- AdminLTE Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom styles -->
    <style>
        .content-wrapper {
            min-height: calc(100vh - calc(3.5rem + 1px) - 57px);
        }
        .brand-link {
            color: #fff !important;
        }
        .main-sidebar {
            background: #343a40 !important;
        }
        .nav-sidebar .nav-link {
            color: rgba(255,255,255,.8) !important;
        }
        .nav-sidebar .nav-link:hover {
            color: #fff !important;
            background: rgba(255,255,255,.1) !important;
        }
        .nav-sidebar .nav-link.active {
            color: #fff !important;
            background: #007bff !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <i class="fas fa-spinner fa-spin text-primary" style="font-size: 3rem;"></i>
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <span class="brand-text font-weight-light">{{ $companyProfile->company_name ?? 'Admin Panel' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://ui-avatars.com/api/?name=Administrator&background=007bff&color=ffffff" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-white">Administrator</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin') || request()->is('admin/') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ request()->is('admin/statistics*') || request()->is('admin/visi-misi*') || request()->is('admin/team-members*') || request()->is('admin/brands*') ? 'menu-open' : '' }}">

    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-info-circle"></i>
        <p>
            Tentang
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="/admin/statistics" class="nav-link {{ request()->is('admin/statistics*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Statistik</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/admin/visi-misi" class="nav-link {{ request()->is('admin/visi-misi*') ? 'active' : '' }}">
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
            <a href="/admin/team-members" class="nav-link {{ request()->is('admin/team-members*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Team</p>
            </a>
        </li>

    </ul>
</li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('admin/banners*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Banners
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.banners.index') }}" class="nav-link {{ request()->is('admin/banners') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.banners.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Banner</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('admin/company-profiles*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Company Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.company-profiles.index') }}" class="nav-link {{ request()->is('admin/company-profiles') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil Perusahaan</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Kategori
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.categories.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Kategori</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.products.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('admin/partners*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Mitra
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.partners.index') }}" class="nav-link {{ request()->is('admin/partners') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Mitra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.partners.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Mitra</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('admin/legalities*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-gavel"></i>
              <p>
                Legalitas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.legalities.index') }}" class="nav-link {{ request()->is('admin/legalities') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Legalitas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.legalities.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Legalitas</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('admin/work-processes*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Proses Kerja
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.work-processes.index') }}" class="nav-link {{ request()->is('admin/work-processes') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Proses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.work-processes.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Proses</p>
                </a>
              </li>
            </ul>
          </li>
          

          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('admin/platforms*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-laptop"></i>
              <p>
                Platform
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.platforms.index') }}" class="nav-link {{ request()->is('admin/platforms') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Platform</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.platforms.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Platform</p>
                </a>
              </li>
            </ul>
              <li class="nav-item">
              <a href="{{ route('admin.job_vacancies.index') }}" class="nav-link {{ request()->is('admin/job-vacancies*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-briefcase"></i>
                  <p>Lowongan Pekerjaan</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.job_categories.index') }}" class="nav-link {{ request()->is('admin/job-categories*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Pekerjaan</p>
            </a>
        </li>
                  <li class="nav-item">
            <a href="{{ route('admin.benefits.index') }}" class="nav-link {{ request()->is('admin/benefits*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-gift"></i>
                <p>Benefit</p>
            </a>
        </li>

           <li class="nav-item">
              <a href="{{ route('admin.aktivitas.index') }}" class="nav-link {{ request()->is('admin/aktivitas*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>Aktivitas</p>
              </a>
          </li>

           <li class="nav-item">
              <a href="{{ route('admin.applications.index') }}" class="nav-link {{ request()->is('admin/applications*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Lamaran Kerja</p>
              </a>
          </li>

 <li class="nav-item">
    <a href="{{ route('admin.upcoming_event.index') }}" 
       class="nav-link {{ request()->is('admin/upcoming_event*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>Agenda Mendatang</p>
    </a>
</li>

            <li class="nav-item">
              <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->is('admin/faqs*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-question-circle"></i>
                <p>FAQ</p>
              </a>
            </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page-title', 'Dashboard')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">@yield('breadcrumb')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                {{ session('error') }}
            </div>
        @endif
        
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} {{ $companyProfile->company_name ?? 'Company' }}.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

<!-- bs-custom-file-input -->
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@yield('scripts')
</body>
</html>
