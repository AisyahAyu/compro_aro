@extends('layouts.admin')

@section('title', 'Edit Platform')
@section('page-title', 'Edit Platform')
@section('breadcrumb', 'Platforms / Edit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Platform Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.platforms.update', $platform->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Platform Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $platform->title) }}" placeholder="Enter platform title" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter platform description" required>{{ old('description', $platform->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="platform_url">Platform URL <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="platform_url" name="platform_url" value="{{ old('platform_url', !is_array($platform->platform_url) ? Str::cleanUrlDisplay($platform->platform_url) : '') }}" placeholder="ayobelanja.co.id" required>
                        @error('platform_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">Masukkan domain saja (contoh: ayobelanja.co.id) atau URL lengkap</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Platform Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                <label class="custom-file-label" for="image">Choose image file</label>
                            </div>
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">Leave empty to keep current image. Recommended: 400x200px, Max size: 2MB</small>
                        @if($platform->image)
                            <div class="mt-2">
                                <small class="text-muted">Current image:</small><br>
                                <img src="{{ asset($platform->image) }}" alt="Current Image" style="max-width: 100px; max-height: 60px; object-fit: cover;">
                            </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="features">Platform Features</label>
                        <div id="features-container">
                            @php
                                $features = old('features', $platform->features ?? []);
                                if(empty($features)) $features = [''];
                            @endphp
                            @foreach($features as $index => $feature)
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="features[]" placeholder="Enter feature" value="{{ $feature }}">
                                    <div class="input-group-append">
                                        @if($index == 0)
                                            <button type="button" class="btn btn-success add-feature"><i class="fas fa-plus"></i></button>
                                        @else
                                            <button type="button" class="btn btn-danger remove-feature"><i class="fas fa-minus"></i></button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('features.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">Add multiple features by clicking the + button</small>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $platform->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Only active platforms will be displayed on the website</small>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.platforms.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning float-right">Update Platform</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Current Platform Preview</h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if($platform->image)
                        <img src="{{ asset($platform->image) }}" alt="{{ $platform->title }}" class="img-fluid mb-3" style="max-height: 150px;">
                    @endif
                    <h5>{{ $platform->title }}</h5>
                    <p class="text-muted">{{ $platform->description }}</p>
                    <div class="mb-2">
                        <span class="badge {{ $platform->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $platform->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    @if($platform->features && count($platform->features) > 0)
                        <div class="mb-2">
                            <small class="text-muted">Features:</small><br>
                            <div class="d-flex flex-wrap gap-1 justify-content-center">
                                @foreach(array_slice($platform->features, 0, 3) as $feature)
                                    <span class="badge bg-info">{{ $feature }}</span>
                                @endforeach
                                @if(count($platform->features) > 3)
                                    <span class="badge bg-secondary">+{{ count($platform->features) - 3 }}</span>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
                
                <hr>
                
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tips:</h5>
                    <ul>
                        <li>Platform title should be descriptive and clear</li>
                        <li>Description should highlight key capabilities</li>
                        <li>URL should be a valid, accessible platform link</li>
                        <li>Use high-quality images for best results</li>
                        <li>Add features to showcase platform capabilities</li>
                    </ul>
                </div>
                
                <div class="callout callout-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Note:</h5>
                    <p>Platforms will appear in the "Available Platforms" section of the website. Maximum 3 platforms are displayed based on active status.</p>
                </div>
                
                <div class="callout callout-primary">
                    <h5><i class="fas fa-lightbulb"></i> Feature Examples:</h5>
                    <div class="mb-2">
                        <small><strong>Web Platform:</strong> Responsive Design, SEO Optimized, Fast Loading</small><br>
                        <small><strong>Mobile App:</strong> iOS & Android, Offline Mode, Push Notifications</small><br>
                        <small><strong>Desktop Software:</strong> Cross-platform, Cloud Sync, Auto Updates</small>
                    </div>
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
    
    // Dynamic features management
    $(document).ready(function() {
        $('.add-feature').click(function() {
            var container = $('#features-container');
            var newInput = $('<div class="input-group mb-2">' +
                '<input type="text" class="form-control" name="features[]" placeholder="Enter feature">' +
                '<div class="input-group-append">' +
                '<button type="button" class="btn btn-danger remove-feature"><i class="fas fa-minus"></i></button>' +
                '</div>' +
                '</div>');
            container.append(newInput);
        });
        
        $(document).on('click', '.remove-feature', function() {
            $(this).closest('.input-group').remove();
        });
    });
</script>
@endsection
