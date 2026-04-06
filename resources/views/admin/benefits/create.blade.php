@extends('layouts.admin')

@section('title', 'Add Benefit')
@section('page-title', 'Create New Benefit')
@section('breadcrumb', 'Benefit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-success shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus-circle mr-2"></i> Benefit Information</h3>
            </div>
            
            <form action="{{ route('admin.benefits.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title"><i class="fas fa-tag mr-1"></i> Benefit Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="e.g. Flexible Working Hours" required>
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="order"><i class="fas fa-sort-numeric-down mr-1"></i> Display Order</label>
                                <input type="number" name="order" id="order" class="form-control" value="{{ old('order', 0) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-7">
                            <div class="form-group">
                             <label for="icon"><i class="fas fa-image mr-1"></i> Benefit Icon</label>
                                <div class="custom-file">
                                    <input type="file" name="icon" class="custom-file-input @error('icon') is-invalid @enderror" id="icon" accept="image/*">
                                    <label class="custom-file-label" for="icon">Choose image...</label>
                                </div>
                                @error('icon') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="status"><i class="fas fa-toggle-on mr-1"></i> Visibility Status</label>
                                <select name="status" id="status" class="form-control shadow-sm">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active (Visible)</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive (Draft)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="description"><i class="fas fa-align-left mr-1"></i> Short Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Explain the value of this benefit to the candidates..." required>{{ old('description') }}</textarea>
                        @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="card-footer bg-white border-top">
                    <a href="{{ route('admin.benefits.index') }}" class="btn btn-default">
                        <i class="fas fa-times mr-1"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-success float-right px-4">
                        <i class="fas fa-save mr-1"></i> Save Benefit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-info shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-info-circle mr-2"></i> Creation Guide</h3>
            </div>
            <div class="card-body">
                <h6 class="font-weight-bold text-info"><i class="fas fa-pencil-alt mr-1"></i> Writing Tips</h6>
                <p class="small text-muted text-justify">
                    Use clear and punchy titles like <strong>"Comprehensive Healthcare"</strong> or <strong>"Remote Work Option"</strong>. Avoid overly long sentences in the description.
                </p>

                <hr>

                <h6 class="font-weight-bold text-info"><i class="fas fa-file-image mr-1"></i> Icon Standards</h6>
                <ul class="small text-muted pl-3">
                    <li>Use PNG or SVG files for better quality.</li>
                    <li>Recommended size is 512x512 pixels.</li>
                    <li>Ensure the background is transparent.</li>
                </ul>

                <hr>

                <h6 class="font-weight-bold text-info"><i class="fas fa-layer-group mr-1"></i> Display Order</h6>
                <p class="small text-muted text-justify">
                    The <strong>Order</strong> value determines the sequence of cards on the landing page. Lower numbers (e.g., 0, 1) will appear first.
                </p>

                <div class="alert alert-warning mt-4 py-2 border-0 shadow-sm">
                    <small><i class="fas fa-exclamation-triangle mr-1"></i> Fields marked with <strong>*</strong> are mandatory and must be filled.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Show filename in custom file input
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("icon").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endpush