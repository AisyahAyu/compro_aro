@extends('layouts.admin')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')
@section('breadcrumb', 'Categories / Edit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Category Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" placeholder="Enter category name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter category description" required>{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="order">Display Order</label>
                                <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $category->order) }}" min="0">
                                @error('order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Lower numbers appear first</small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="image">Category Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Leave empty to keep current image. Recommended: 400x300px, Max size: 2MB</small>
                                @if($category->image)
                                    <div class="mt-2">
                                        <small class="text-muted">Current image:</small><br>
                                        <img src="{{ asset($category->image) }}" alt="Current Image" style="max-width: 100px; max-height: 60px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Only active categories will be displayed on the website</small>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning float-right">Update Category</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Current Category Preview</h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if($category->image)
                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="img-fluid mb-3" style="max-height: 150px;">
                    @endif
                    <h5>{{ $category->name }}</h5>
                    <p class="text-muted">{{ Str::limit($category->description, 100) }}</p>
                    <div class="mb-2">
                        <span class="badge {{ $category->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        <span class="badge bg-primary ml-2">Order: {{ $category->order }}</span>
                    </div>
                </div>
                
                <hr>
                
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tips:</h5>
                    <ul>
                        <li>Category name should be descriptive and clear</li>
                        <li>Description should explain what products/services are included</li>
                        <li>Use high-quality images for best results</li>
                        <li>Set order to control display sequence</li>
                        <li>Only active categories appear on website</li>
                    </ul>
                </div>
                
                <div class="callout callout-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Note:</h5>
                    <p>Categories will appear in the "Best Solutions" section of the website. Maximum 3 categories are displayed based on order.</p>
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
