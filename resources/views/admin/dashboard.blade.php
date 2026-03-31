@extends('layouts.admin')

@section('title', 'Admin Statistik')
@section('page-title', 'Statistik')
@section('breadcrumb', 'Statistik')

@section('content')
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-image"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Banners</span>
                <span class="info-box-number">{{ App\Models\Banner::count() }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-th-large"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Categories</span>
                <span class="info-box-number">{{ App\Models\Category::count() }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-box"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">{{ App\Models\Product::count() }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-handshake"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Partners</span>
                <span class="info-box-number">{{ App\Models\Partner::count() }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-3">
        <div class="info-box mb-3 bg-secondary">
            <span class="info-box-icon elevation-1"><i class="fas fa-gavel"></i></span>
            <div class="info-box-content">
                <span class="info-box-text text-white">Legalities</span>
                <span class="info-box-number text-white">{{ App\Models\Legality::count() }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box mb-3 bg-dark">
            <span class="info-box-icon elevation-1"><i class="fas fa-cogs"></i></span>
            <div class="info-box-content">
                <span class="info-box-text text-white">Work Processes</span>
                <span class="info-box-number text-white">{{ App\Models\WorkProcess::count() }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box mb-3 bg-info">
            <span class="info-box-icon elevation-1"><i class="fas fa-laptop"></i></span>
            <div class="info-box-content">
                <span class="info-box-text text-white">Platforms</span>
                <span class="info-box-number text-white">{{ App\Models\Platform::count() }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box mb-3 bg-primary">
            <span class="info-box-icon elevation-1"><i class="fas fa-building"></i></span>
            <div class="info-box-content">
                <span class="info-box-text text-white">Company Profile</span>
                <span class="info-box-number text-white">{{ App\Models\CompanyProfile::count() }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-purple">
        <span class="info-box-icon elevation-1">
            <i class="fas fa-info-circle"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text text-white">Team</span>
<span class="info-box-number text-white">
    {{ App\Models\TeamMember::count() }}
</span>
        </div>
    </div>
</div>
</div>

<!-- Main content -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Content Statistics
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#revenue-chart" data-toggle="pill">Data Overview</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.statistics.index') }}" class="nav-link">
                                <i class="fas fa-cog mr-1"></i>Manage Statistics
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                        <div class="text-center">
                            <h4>Content Management Overview</h4>
                            <p>Total content items managed through admin panel</p>
                            
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-image text-info mr-2"></i>
                                        <span>Banners: {{ App\Models\Banner::count() }}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-th-large text-success mr-2"></i>
                                        <span>Categories: {{ App\Models\Category::count() }}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-box text-warning mr-2"></i>
                                        <span>Products: {{ App\Models\Product::count() }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-handshake text-danger mr-2"></i>
                                        <span>Partners: {{ App\Models\Partner::count() }}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-gavel text-secondary mr-2"></i>
                                        <span>Legalities: {{ App\Models\Legality::count() }}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="fas fa-cogs text-dark mr-2"></i>
                                        <span>Processes: {{ App\Models\WorkProcess::count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Recent Activities</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Module</th>
                                <th>Total Items</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fas fa-chart-bar text-info"></i> Statistics</td>
                                <td>{{ App\Models\AboutStatistic::count() }} items</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <a href="{{ route('admin.statistics.index') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Manage
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-image text-info"></i> Banners</td>
                                <td>{{ App\Models\Banner::count() }} items</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <a href="{{ route('admin.banners.index') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Manage
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-th-large text-success"></i> Categories</td>
                                <td>{{ App\Models\Category::count() }} items</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Manage
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-box text-warning"></i> Products</td>
                                <td>{{ App\Models\Product::count() }} items</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Manage
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-handshake text-danger"></i> Partners</td>
                                <td>{{ App\Models\Partner::count() }} items</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <a href="{{ route('admin.partners.index') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Manage
                                    </a>
                                </td>
                            </tr>
                            <tr>
    <td><i class="fas fa-users text-primary"></i> Team</td>
<td>{{ App\Models\TeamMember::count() }} items</td>
<td><span class="badge badge-success">Active</span></td>
<td>
    <a href="{{ route('admin.team-members.index') }}" class="btn btn-sm btn-primary">
        <i class="fas fa-edit"></i> Manage
    </a>
</td>
</tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info text-white float-left">View All Activities</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">See All Entries</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.Left col -->

    <!-- Right col -->
    <section class="col-lg-5 connectedSortable">
        <!-- Map card -->
        <div class="card bg-gradient-primary">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Company Information
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <div class="card-body">
                @if($companyProfile)
                    <div class="text-white">
                        <h4>{{ $companyProfile->company_name }}</h4>
                        <p>{{ $companyProfile->description }}</p>
                        
                        <hr class="my-3">
                        
                        <div class="row">
                            <div class="col-12">
                                <i class="fas fa-envelope mr-2"></i> {{ $companyProfile->email ?? 'N/A' }}
                            </div>
                            <div class="col-12 mt-2">
                                <i class="fas fa-phone mr-2"></i> {{ $companyProfile->phone ?? 'N/A' }}
                            </div>
                            <div class="col-12 mt-2">
                                <i class="fas fa-map-marker-alt mr-2"></i> {{ $companyProfile->address ?? 'N/A' }}
                            </div>
                        </div>
                        
                        <div class="mt-3">
                            <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Profile
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-white">
                        <p>No company profile found. Please set up your company profile.</p>
                        <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-warning">
                            <i class="fas fa-plus"></i> Create Profile
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <!-- /.card -->

        <!-- solid sales graph -->
        <div class="card bg-gradient-info">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Quick Actions
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 text-center">
                        <a href="{{ route('admin.statistics.create') }}" class="btn btn-block btn-outline-light">
                            <i class="fas fa-plus fa-2x mb-2"></i><br>
                            Add Statistics
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="{{ route('admin.statistics.index') }}" class="btn btn-block btn-outline-light">
                            <i class="fas fa-chart-bar fa-2x mb-2"></i><br>
                            Manage Statistics
                        </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-center">
                        <a href="{{ route('admin.banners.create') }}" class="btn btn-block btn-outline-light">
                            <i class="fas fa-plus fa-2x mb-2"></i><br>
                            Add Banner
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-block btn-outline-light">
                            <i class="fas fa-plus fa-2x mb-2"></i><br>
                            Add Category
                        </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-center">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-block btn-outline-light">
                            <i class="fas fa-plus fa-2x mb-2"></i><br>
                            Add Product
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="{{ route('admin.partners.create') }}" class="btn btn-block btn-outline-light">
                            <i class="fas fa-plus fa-2x mb-2"></i><br>
                            Add Partner
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
@endsection
