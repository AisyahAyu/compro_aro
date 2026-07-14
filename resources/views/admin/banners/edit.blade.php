@extends('layouts.admin')

@section('title', 'Edit Banner')
@section('page-title', 'Edit Banner')
@section('breadcrumb', 'Banners / Edit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Banner Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                        
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $banner->title) }}" placeholder="Enter banner title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter banner description">{{ old('description', $banner->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="button_text" class="form-label">Button Text</label>
                                <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text', $banner->button_text) }}" placeholder="Biarkan kosong jika tidak ingin menampilkan tombol">
                                    @error('button_text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="button_link" class="form-label">Button Link</label>
                                <select class="form-control" id="button_link" name="button_link">
                                    <option value="">Select Page</option>
                                    <option value="#tentang" {{ old('button_link', $banner->button_link) == '#tentang' ? 'selected' : '' }}>Tentang</option>
                                    <option value="#produk" {{ old('button_link', $banner->button_link) == '#produk' ? 'selected' : '' }}>Produk</option>
                                    <option value="#solusi" {{ old('button_link', $banner->button_link) == '#solusi' ? 'selected' : '' }}>Solusi</option>
                                    <option value="#mitra" {{ old('button_link', $banner->button_link) == '#mitra' ? 'selected' : '' }}>Mitra</option>
                                    <option value="/kontak" {{ old('button_link', $banner->button_link) == '/kontak' ? 'selected' : '' }}>Kontak</option>
                                </select>
                                    @error('button_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="page_type" class="form-label">Halaman (Page Type)</label>
                            <select class="form-control" id="page_type" name="page_type" required>
                                <option value="home" {{ old('page_type', $banner->page_type) == 'home' ? 'selected' : '' }}>Home / Beranda</option>
                                <option value="about" {{ old('page_type', $banner->page_type) == 'about' ? 'selected' : '' }}>Tentang / About</option>
                            </select>
                            @error('page_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $banner->order) }}" min="0">
                            @error('order')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-text">Leave empty to keep current image. Allowed formats: jpeg, png, jpg, gif. Max size: 2MB</div>
                            
                            @if($banner->image)
                                <div class="mt-2">
                                    <small class="text-muted">Current image:</small><br>
                                    <img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}" style="max-width: 200px; max-height: 100px; object-fit: cover;">
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input class="custom-control-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $banner->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right">Update Banner</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Current Banner</h3>
            </div>
            <div class="card-body">
                @if($banner->image)
                    <div class="text-center">
                        <img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}" class="img-fluid mb-3" style="max-height: 200px;">
                        <p class="text-muted">Current image preview</p>
                    </div>
                @else
                    <p class="text-muted">No image available</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
