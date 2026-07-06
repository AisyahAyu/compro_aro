@extends('layouts.admin')

@section('title', 'Create Company Profile')
@section('page-title', 'Create Company Profile')
@section('breadcrumb', 'Company Profile / Create')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Company Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.company-profiles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="company_name">Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" placeholder="Enter company name" required>
                        @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter company description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email address">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="whatsapp">WhatsApp</label>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="Enter WhatsApp number (e.g., +62 822-8888-6009)">
                        @error('whatsapp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">This number will be displayed in the footer with a WhatsApp link</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter company address">{{ old('address') }}</textarea>
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
                                <small class="form-text text-muted">Recommended: 200x200px, Max size: 2MB</small>
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
                                <small class="form-text text-muted">Recommended: 200x200px, Max size: 2MB. This logo will be used for dark backgrounds like footer.</small>
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
                                <small class="form-text text-muted">Recommended: 800x400px, Max size: 2MB</small>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h5>Social Media Links</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}" placeholder="https://facebook.com/yourpage">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="url" class="form-control" id="twitter" name="twitter" value="{{ old('twitter') }}" placeholder="https://twitter.com/yourhandle">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram') }}" placeholder="https://instagram.com/yourhandle">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin') }}" placeholder="https://linkedin.com/company/yourcompany">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.company-profiles.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right">Create Profile</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Profile Guidelines</h3>
            </div>
            <div class="card-body">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tips:</h5>
                    <ul>
                        <li>Company name will appear in navbar and footer</li>
                        <li>Description should be concise and informative</li>
                        <li>Use high-quality logo and images</li>
                        <li>Social media links will appear in footer</li>
                        <li>All marked fields are required</li>
                    </ul>
                </div>
                
                <div class="callout callout-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Note:</h5>
                    <p>Only one company profile can exist. Creating a new profile will replace any existing profile.</p>
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
