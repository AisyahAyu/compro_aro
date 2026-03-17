@extends('layouts.admin')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')
@section('breadcrumb', 'Products / Edit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Product Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Product Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter product name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter product description" required>{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="location">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $product->location) }}" placeholder="Enter location" required>
                                @error('location')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="type">Product Type <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $product->type) }}" placeholder="Enter product type" required>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rating">Rating <span class="text-danger">*</span></label>
                                <select class="form-control" id="rating" name="rating" required>
                                    <option value="">Select Rating</option>
                                    @for($i = 5; $i >= 0; $i -= 0.5)
                                        <option value="{{ $i }}" {{ old('rating', $product->rating) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('rating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="image">Product Image</label>
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
                                @if($product->image)
                                    <div class="mt-2">
                                        <small class="text-muted">Current image:</small><br>
                                        <img src="{{ asset($product->image) }}" alt="Current Image" style="max-width: 100px; max-height: 60px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Only active products will be displayed on the website</small>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning float-right">Update Product</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Current Product Preview</h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid mb-3" style="max-height: 150px;">
                    @endif
                    <h5>{{ $product->name }}</h5>
                    <p class="text-muted">{{ Str::limit($product->description, 100) }}</p>
                    <div class="mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </span>
                            <span class="text-muted">
                                <i class="fas fa-star text-warning"></i> {{ $product->rating }}
                            </span>
                        </div>
                        <div class="mt-1">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt"></i> {{ $product->location }}
                            </small>
                        </div>
                        <div>
                            <small class="text-muted">Type: {{ $product->type }}</small>
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tips:</h5>
                    <ul>
                        <li>Product name should be descriptive and clear</li>
                        <li>Description should highlight key features</li>
                        <li>Use high-quality images for best results</li>
                        <li>Rating affects product visibility</li>
                        <li>Location helps customers find local products</li>
                    </ul>
                </div>
                
                <div class="callout callout-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Note:</h5>
                    <p>Products will appear in the "Best Products" section of the website. 4 random products are displayed based on active status.</p>
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
