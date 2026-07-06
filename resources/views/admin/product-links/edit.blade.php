@extends('layouts.admin')

@section('title', 'Edit Product Links')
@section('page-title', 'Edit Product Links')
@section('breadcrumb', 'Product Links / Edit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Product Page Links</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.product-links.update') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="marketplace_url">Marketplace Resmi URL</label>
                        <input type="text" class="form-control" id="marketplace_url" name="marketplace_url" value="{{ old('marketplace_url', $productLink->marketplace_url) }}" placeholder="https://ayobelanja.co.id">
                        @error('marketplace_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">URL untuk tombol "Marketplace Resmi" di halaman produk</small>
                    </div>

                    <div class="form-group">
                        <label for="inaproc_url">Katalog INAPROC URL</label>
                        <input type="text" class="form-control" id="inaproc_url" name="inaproc_url" value="{{ old('inaproc_url', $productLink->inaproc_url) }}" placeholder="https://inaproc.lkpp.go.id">
                        @error('inaproc_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small class="form-text text-muted">URL untuk tombol "Katalog INAPROC" di halaman produk</small>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $productLink->is_active) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Only active links will be displayed on the product page</small>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning float-right">Update Links</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Product Links Info</h3>
            </div>
            <div class="card-body">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Info:</h5>
                    <p>These links are used for the buttons on the product page:</p>
                    <ul>
                        <li><strong>Marketplace Resmi:</strong> Link to your official marketplace</li>
                        <li><strong>Katalog INAPROC:</strong> Link to INAPROC procurement catalog</li>
                    </ul>
                </div>

                <div class="callout callout-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Note:</h5>
                    <p>Make sure the URLs are valid and accessible. Include https:// for secure links.</p>
                </div>

                <div class="callout callout-primary">
                    <h5><i class="fas fa-lightbulb"></i> Tips:</h5>
                    <ul>
                        <li>Test the links before saving</li>
                        <li>Use the full URL including https://</li>
                        <li>Disable links temporarily by unchecking Active</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
