@extends('layouts.admin')

@section('title', 'Edit Partner')
@section('page-title', 'Edit Partner')
@section('breadcrumb', 'Partners / Edit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Partner Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Partner Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $partner->name) }}" placeholder="Enter partner name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="order">Display Order</label>
                                <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $partner->order) }}" min="0">
                                @error('order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Lower numbers appear first</small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="logo">Partner Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/*">
                                        <label class="custom-file-label" for="logo">Choose logo file</label>
                                    </div>
                                </div>
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Leave empty to keep current logo. Recommended: 200x100px, Max size: 2MB</small>
                                @if($partner->logo)
                                    <div class="mt-2">
                                        <small class="text-muted">Current logo:</small><br>
                                        <img src="{{ asset($partner->logo) }}" alt="Current Logo" style="max-width: 120px; max-height: 60px; object-fit: contain;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $partner->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Only active partners will be displayed on the website</small>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning float-right">Update Partner</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Current Partner Preview</h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if($partner->logo)
                        <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid mb-3" style="max-height: 120px;">
                    @endif
                    <h5>{{ $partner->name }}</h5>
                    <div class="mb-2">
                        <span class="badge {{ $partner->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $partner->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        <span class="badge bg-primary ml-2">Order: {{ $partner->order }}</span>
                    </div>
                </div>
                
                <hr>
                
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tips:</h5>
                    <ul>
                        <li>Partner name should be the brand name</li>
                        <li>Use high-quality logo with transparent background</li>
                        <li>Logos should be in PNG format for best results</li>
                        <li>Set order to control display sequence</li>
                        <li>Only active partners appear on website</li>
                    </ul>
                </div>
                
                <div class="callout callout-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Note:</h5>
                    <p>Partners will appear in the "Partner Brands" section of the website. Logos are displayed in a responsive grid layout.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Custom file input
    bsCustomFileInput.init();
</script>
@endsection
