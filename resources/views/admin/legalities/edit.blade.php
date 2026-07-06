@extends('layouts.admin')

@section('title', 'Edit Legality')
@section('page-title', 'Edit Legality')
@section('breadcrumb', 'Legalities / Edit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Legality Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.legalities.update', $legality->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $legality->title) }}" placeholder="Enter legality title" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter legality description" required>{{ old('description', $legality->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="icon">Icon Class</label>
                                <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', $legality->icon) }}" placeholder="fas fa-certificate">
                                @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Font Awesome icon class (e.g., fas fa-certificate)</small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="order">Display Order</label>
                                <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $legality->order) }}" min="0">
                                @error('order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Lower numbers appear first</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $legality->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Only active legalities will be displayed on the website</small>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.legalities.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning float-right">Update Legality</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Current Legality Preview</h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if($legality->icon)
                        <i class="{{ $legality->icon }} fa-3x text-primary mb-3"></i>
                    @else
                        <i class="fas fa-gavel fa-3x text-muted mb-3"></i>
                    @endif
                    <h5>{{ $legality->title }}</h5>
                    <p class="text-muted">{{ Str::limit($legality->description, 100) }}</p>
                    <div class="mb-2">
                        <span class="badge {{ $legality->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $legality->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        <span class="badge bg-primary ml-2">Order: {{ $legality->order }}</span>
                    </div>
                </div>
                
                <hr>
                
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tips:</h5>
                    <ul>
                        <li>Title should be clear and professional</li>
                        <li>Description should explain the compliance aspect</li>
                        <li>Use Font Awesome icons for visual appeal</li>
                        <li>Set order to control display sequence</li>
                        <li>Only active legalities appear on website</li>
                    </ul>
                </div>
                
                <div class="callout callout-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Note:</h5>
                    <p>Legalities will appear in the "Legalities & Compliance" section of the website. Maximum 4 legalities are displayed based on order.</p>
                </div>
                
                <div class="callout callout-primary">
                    <h5><i class="fas fa-lightbulb"></i> Icon Examples:</h5>
                    <div class="row">
                        <div class="col-6">
                            <small><i class="fas fa-certificate"></i> fas fa-certificate</small><br>
                            <small><i class="fas fa-shield-alt"></i> fas fa-shield-alt</small><br>
                            <small><i class="fas fa-check-circle"></i> fas fa-check-circle</small>
                        </div>
                        <div class="col-6">
                            <small><i class="fas fa-award"></i> fas fa-award</small><br>
                            <small><i class="fas fa-medal"></i> fas fa-medal</small><br>
                            <small><i class="fas fa-trophy"></i> fas fa-trophy</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
