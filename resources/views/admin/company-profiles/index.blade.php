@extends('layouts.admin')

@section('title', 'Company Profile Management')
@section('page-title', 'Company Profile')
@section('breadcrumb', 'Company Profile')

@section('content')
<div class="row">
    <div class="col-12">
        @if($profile)
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Current Company Profile</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.company-profiles.edit', $profile->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit Profile
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($profile->logo)
                                <img src="{{ asset($profile->logo) }}" alt="{{ $profile->company_name }}" class="img-fluid mb-3" style="max-height: 200px;">
                            @endif
                            @if($profile->image)
                                <h5>Company Image</h5>
                                <img src="{{ asset($profile->image) }}" alt="{{ $profile->company_name }}" class="img-fluid">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $profile->company_name }}</h4>
                            <p>{{ $profile->description }}</p>
                            
                            <hr>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Email:</strong> {{ $profile->email ?? 'N/A' }}<br>
                                    <strong>Phone:</strong> {{ $profile->phone ?? 'N/A' }}<br>
                                    <strong>Address:</strong> {{ $profile->address ?? 'N/A' }}
                                </div>
                                <div class="col-md-6">
                                    @if($profile->social_media)
                                        <strong>Social Media:</strong><br>
                                        @if(isset($profile->social_media['facebook']))
                                            <a href="{{ $profile->social_media['facebook'] }}" target="_blank" class="btn btn-sm btn-primary mr-2">
                                                <i class="fab fa-facebook"></i> Facebook
                                            </a>
                                        @endif
                                        @if(isset($profile->social_media['twitter']))
                                            <a href="{{ $profile->social_media['twitter'] }}" target="_blank" class="btn btn-sm btn-info mr-2">
                                                <i class="fab fa-twitter"></i> Twitter
                                            </a>
                                        @endif
                                        @if(isset($profile->social_media['instagram']))
                                            <a href="{{ $profile->social_media['instagram'] }}" target="_blank" class="btn btn-sm btn-danger mr-2">
                                                <i class="fab fa-instagram"></i> Instagram
                                            </a>
                                        @endif
                                        @if(isset($profile->social_media['linkedin']))
                                            <a href="{{ $profile->social_media['linkedin'] }}" target="_blank" class="btn btn-sm btn-secondary mr-2">
                                                <i class="fab fa-linkedin"></i> LinkedIn
                                            </a>
                                        @endif
                                    @else
                                        <strong>Social Media:</strong> Not configured
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        @else
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">No Company Profile Found</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="alert alert-warning">
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Warning!</h5>
                        No company profile has been set up yet. Please create a company profile to display your company information on the website.
                    </div>
                    <div class="text-center">
                        <a href="{{ route('admin.company-profiles.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus"></i> Create Company Profile
                        </a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        @endif
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection
