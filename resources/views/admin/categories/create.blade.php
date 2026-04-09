@extends('layouts.admin')

@section('title', 'Create Category')
@section('page-title', 'Create New Category')
@section('breadcrumb', 'Categories / Create')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Category Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter category name" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="subtitle">Subtitle (Solusi Page Only)</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', 'Series Pro') }}" placeholder="e.g. Series Pro">
                        @error('subtitle')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter category description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="text-primary font-weight-bold"><i class="fas fa-magic mr-1"></i> Solusi Page Details</label>
                        <hr class="mt-0">
                        
                        <div class="form-group">
                            <label for="features_raw">Features List (Solusi Card Checkboxes)</label>
                            <textarea class="form-control" id="features_raw" name="features_raw" rows="6" placeholder="Enter one feature per line...">{{ old('features_raw', "Ergonomis, jaga postur tetap sehat\nErgonomis, jaga postur tetap sehat\nErgonomis, jaga postur tetap sehat") }}</textarea>
                            <small class="text-muted">Type each feature on a new line. These will appear with checkmarks.</small>
                        </div>

                        <div class="row">
                            <div class="col-12"><label>Bottom Highlights (3 Items)</label></div>
                            @for($i = 0; $i < 3; $i++)
                            <div class="col-md-4">
                                <div class="card card-outline card-warning p-2">
                                    <h6 class="font-weight-bold">Highlight {{ $i+1 }}</h6>
                                    <div class="form-group mb-1">
                                        <input type="text" name="highlights_raw[{{ $i }}][icon]" class="form-control form-control-sm" placeholder="FA Icon (e.g. fas fa-medal)" value="{{ old("highlights_raw.$i.icon", $i == 0 ? 'fas fa-medal' : ($i == 1 ? 'fas fa-gem' : 'fas fa-palette')) }}">
                                    </div>
                                    <div class="form-group mb-1">
                                        <input type="text" name="highlights_raw[{{ $i }}][title]" class="form-control form-control-sm" placeholder="Title" value="{{ old("highlights_raw.$i.title", $i == 0 ? 'Ergonomis Maksimal' : ($i == 1 ? 'Material Premium' : 'Pilihan Warna')) }}">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="text" name="highlights_raw[{{ $i }}][desc]" class="form-control form-control-sm" placeholder="Short Desc" value="{{ old("highlights_raw.$i.desc", $i == 0 ? 'Nyaman untuk harian' : ($i == 1 ? 'Kayu berkualitas' : '50+ kombinasi')) }}">
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="order">Display Order</label>
                                <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 0) }}" min="0">
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
                                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" required>
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Recommended: 400x300px, Max size: 2MB</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Only active categories will be displayed on the website</small>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success float-right">Create Category</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Category Guidelines</h3>
            </div>
            <div class="card-body">
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
