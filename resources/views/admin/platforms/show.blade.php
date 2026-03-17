@extends('layouts.admin')

@section('title', 'View Platform')
@section('page-title', 'Platform Details')
@section('breadcrumb', 'Platforms / View')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Platform Information</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.platforms.edit', $platform->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.platforms.index') }}" class="btn btn-default btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if($platform->image)
                            <img src="{{ asset($platform->image) }}" alt="{{ $platform->title }}" class="img-fluid rounded">
                        @else
                            <div class="bg-gray-200 rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x text-gray-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h4>{{ $platform->title }}</h4>
                        <p class="text-muted">{{ $platform->description }}</p>
                        
                        <div class="mt-3">
                            <strong>Platform URL:</strong><br>
                            @if($platform->platform_url)
                                <a href="{{ $platform->platform_url }}" target="_blank" class="clean-url">
                                    <i class="fas fa-external-link-alt url-icon"></i>
                                    <span class="clean-url-text">{{ $platform->platform_url }}</span>
                                </a>
                            @else
                                <span class="text-muted">No URL provided</span>
                            @endif
                        </div>
                        
                        <div class="mt-3">
                            <strong>Features:</strong><br>
                            @if($platform->features)
                                @if(is_array($platform->features) && count($platform->features) > 0)
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        @foreach($platform->features as $feature)
                                            <span class="badge bg-info">{{ $feature }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-muted">{{ $platform->features }}</span>
                                @endif
                            @else
                                <span class="text-muted">No features listed</span>
                            @endif
                        </div>
                        
                        <div class="mt-3">
                            <strong>Status:</strong><br>
                            <span class="badge {{ $platform->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $platform->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        
                        <div class="mt-3">
                            <small class="text-muted">
                                Created: {{ $platform->created_at->format('M d, Y') }} | 
                                Updated: {{ $platform->updated_at->format('M d, Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Actions</h3>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.platforms.edit', $platform->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Platform
                    </a>
                    <a href="{{ $platform->platform_url }}" target="_blank" class="btn btn-info">
                        <i class="fas fa-external-link-alt"></i> Visit Platform
                    </a>
                    <form action="{{ route('admin.platforms.destroy', $platform->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this platform?')">
                            <i class="fas fa-trash"></i> Delete Platform
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card card-success mt-3">
            <div class="card-header">
                <h3 class="card-title">Platform Statistics</h3>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <h4 class="text-primary">
                            @if($platform->features && is_array($platform->features))
                                {{ count($platform->features) }}
                            @else
                                0
                            @endif
                        </h4>
                        <small class="text-muted">Features</small>
                    </div>
                    <div class="col-6">
                        <h4 class="text-success">
                            {{ $platform->is_active ? 'Active' : 'Inactive' }}
                        </h4>
                        <small class="text-muted">Status</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
