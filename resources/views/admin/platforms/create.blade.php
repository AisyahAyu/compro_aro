@extends('layouts.admin')

@section('title', 'Create formPlat')
@section('page-title', 'Create New Platform')
@section('breadcrumb', 'Platforms / Create')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Platform Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.platforms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Platform Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter platform title" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter platform description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="platform_url">Platform URL <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="platform_url" name="platform_url" value="{{ old('platform_url') }}" placeholder="ayobelanja.co.id" required>
                        @error('platform_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">Masukkan domain saja (contoh: ayobelanja.co.id) atau URL lengkap</small>
                    </div>

                    <div class="form-group">
                        <label for="image">Platform Image <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" required>
                                <label class="custom-file-label" for="image">Choose image file</label>
                            </div>
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">Recommended: 400x200px, Max size: 2MB</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="features">Platform Features</label>
                        <div id="features-container">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="features[]" placeholder="Enter feature" value="{{ old('features.0') }}">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success add-feature"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        @error('features.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">Add multiple features by clicking the + button</small>
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Only active platforms will be displayed on the website</small>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.platforms.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success float-right">Create Platform</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Platform Guidelines</h3>
            </div>
            <div class="card-body">
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
