@extends('layouts.admin')

@section('page-title', 'Tambah Produk')
@section('breadcrumb', 'Tambah Produk')

@section('content')
<div class="container pb-5">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Produk Baru</h3>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required placeholder="Masukkan nama produk">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Kategori (Solusi)</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="brand_id">Merek (Brand)</label>
                            <select name="brand_id" id="brand_id" class="form-control mb-2">
                                <option value="">-- Pilih Merek --</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">Atau isi nama merek manual di bawah jika tidak ada di pilihan:</small>
                            <input type="text" name="brand_name" class="form-control mt-1" value="{{ old('brand_name') }}" placeholder="Masukkan nama merek manual">
                        </div>

                        <div class="form-group">
                            <label for="type">Tipe Produk</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}" placeholder="Contoh: Meja Kantor, Kursi Kerja">
                        </div>

                        <div class="form-group">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku') }}" placeholder="Contoh: SKU-10023">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Upload Gambar Produk <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control-file" required>
                            <small class="text-muted d-block mt-1">Format: jpeg, png, jpg, gif, webp. Ukuran maks: 2MB.</small>
                        </div>

                        <div class="form-group">
                            <label for="dimensions">Dimensi</label>
                            <input type="text" name="dimensions" id="dimensions" class="form-control" value="{{ old('dimensions') }}" placeholder="Contoh: 120 x 60 x 75 cm">
                        </div>

                        <div class="form-group">
                            <label for="country_of_origin">Asal Negara</label>
                            <input type="text" name="country_of_origin" id="country_of_origin" class="form-control" value="{{ old('country_of_origin') }}" placeholder="Contoh: Indonesia, Jepang">
                        </div>

                        <div class="form-group">
                            <label for="specification">Spesifikasi</label>
                            <textarea name="specification" id="specification" class="form-control" rows="4" placeholder="Detail spesifikasi produk...">{{ old('specification') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
