@extends('layouts.admin')

@section('title', 'Create Banner')
@section('page-title', 'Create New Banner')
@section('breadcrumb', 'Banners / Create')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Banner Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter banner title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter banner description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="button_text">Button Text</label>
                                <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text', 'Lihat Selengkapnya') }}" placeholder="Button text">
                                @error('button_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="button_link">Button Link</label>
                                <select class="form-control" id="button_link" name="button_link">
                                    <option value="">Select Page</option>
                                    <option value="#tentang" {{ old('button_link') == '#tentang' ? 'selected' : '' }}>Tentang</option>
                                    <option value="#produk" {{ old('button_link') == '#produk' ? 'selected' : '' }}>Produk</option>
                                    <option value="#solusi" {{ old('button_link') == '#solusi' ? 'selected' : '' }}>Solusi</option>
                                    <option value="#mitra" {{ old('button_link') == '#mitra' ? 'selected' : '' }}>Mitra</option>
                                    <option value="/karir" {{ old('button_link') == '/karir' ? 'selected' : '' }}>Karir</option>
                                    <option value="/kontak" {{ old('button_link') == '/kontak' ? 'selected' : '' }}>Kontak</option>
                                </select>
                                @error('button_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 0) }}" min="0">
                        @error('order')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Banner Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" required>
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">Allowed formats: jpeg, png, jpg, gif. Max size: 2MB</small>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right">Create Banner</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Banner Guidelines</h3>
            </div>
            <div class="card-body">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tips:</h5>
                    <ul>
                        <li>Recommended image size: 1920x800 pixels</li>
                        <li>Use high-quality images for best results</li>
                        <li>Keep text minimal and readable</li>
                        <li>Set order to control banner sequence</li>
                        <li>Only active banners will be displayed</li>
                    </ul>
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
