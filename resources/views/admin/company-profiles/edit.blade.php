@extends('layouts.admin')

@section('title', 'Edit Company Profile')
@section('page-title', 'Edit Company Profile')
@section('breadcrumb', 'Company Profile / Edit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Company Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.company-profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="company_name">Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $profile->company_name) }}" placeholder="Enter company name" required>
                        @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter company description" required>{{ old('description', $profile->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $profile->email) }}" placeholder="Enter email address">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" placeholder="Enter phone number">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="whatsapp">WhatsApp</label>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp) }}" placeholder="Enter WhatsApp number (e.g., +62 822-8888-6009)">
                        @error('whatsapp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">This number will be displayed in the footer with a WhatsApp link</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter company address">{{ old('address', $profile->address) }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="logo">Company Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/*">
                                        <label class="custom-file-label" for="logo">Choose logo file</label>
                                    </div>
                                </div>
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Leave empty to keep current logo. Recommended: 200x200px, Max size: 2MB</small>
                                @if($profile->logo)
                                    <div class="mt-2">
                                        <small class="text-muted">Current logo:</small><br>
                                        <img src="{{ asset($profile->logo) }}" alt="Current Logo" style="max-width: 100px; max-height: 50px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="logo_dark">Company Logo (Dark Background)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo_dark" name="logo_dark" accept="image/*">
                                        <label class="custom-file-label" for="logo_dark">Choose logo file for dark background</label>
                                    </div>
                                </div>
                                @error('logo_dark')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Leave empty to keep current logo. Recommended: 200x200px, Max size: 2MB. This logo will be used for dark backgrounds like footer.</small>
                                @if($profile->logo_dark)
                                    <div class="mt-2">
                                        <small class="text-muted">Current dark logo:</small><br>
                                        <img src="{{ asset($profile->logo_dark) }}" alt="Current Dark Logo" style="max-width: 100px; max-height: 50px; object-fit: cover; border: 1px solid #ddd;">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="image">Company Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                        <label class="custom-file-label" for="image">Choose image file</label>
                                    </div>
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Leave empty to keep current image. Recommended: 800x400px, Max size: 2MB</small>
                                @if($profile->image)
                                    <div class="mt-2">
                                        <small class="text-muted">Current image:</small><br>
                                        <img src="{{ asset($profile->image) }}" alt="Current Image" style="max-width: 150px; max-height: 75px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h5>Social Media Links</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $profile->social_media['facebook'] ?? '') }}" placeholder="https://facebook.com/yourpage">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="url" class="form-control" id="twitter" name="twitter" value="{{ old('twitter', $profile->social_media['twitter'] ?? '') }}" placeholder="https://twitter.com/yourhandle">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $profile->social_media['instagram'] ?? '') }}" placeholder="https://instagram.com/yourhandle">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $profile->social_media['linkedin'] ?? '') }}" placeholder="https://linkedin.com/company/yourcompany">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning float-right">Update Profile</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Current Profile Preview</h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                    @if($profile->logo)
                        <img src="{{ asset($profile->logo) }}" alt="{{ $profile->company_name }}" class="img-fluid mb-3" style="max-height: 100px;">
                    @endif
                    <h5>{{ $profile->company_name }}</h5>
                    <small class="text-muted">{{ $profile->email }}</small><br>
                    <small class="text-muted">{{ $profile->phone }}</small><br>
                    <small class="text-muted">{{ $profile->whatsapp ?? 'Not set' }}</small><br>
                    <small class="text-muted">{{ $profile->address }}</small>
                </div>
                
                <hr>
                
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tips:</h5>
                    <ul>
                        <li>Company name appears in navbar and footer</li>
                        <li>Description should be concise and informative</li>
                        <li>Use high-quality logo and images</li>
                        <li>Social media links appear in footer</li>
                        <li>All marked fields are required</li>
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
