@extends('layouts.admin')

@section('page-title', 'Edit Produk')
@section('breadcrumb', 'Edit Produk')

@section('content')
<div class="container pb-5">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Produk: {{ $data->name }}</h3>
        </div>

        <form action="{{ route('admin.products.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
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
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $data->name) }}" required placeholder="Masukkan nama produk">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Kategori (Solusi)</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $data->category_id) == $category->id ? 'selected' : '' }}>
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
                                    <option value="{{ $brand->id }}" {{ old('brand_id', $data->brand_id) == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">Atau isi nama merek manual di bawah jika tidak ada di pilihan:</small>
                            <input type="text" name="brand_name" class="form-control mt-1" value="{{ old('brand_name', $data->brand_name) }}" placeholder="Masukkan nama merek manual">
                        </div>

                        <div class="form-group">
                            <label for="type">Tipe Produk</label>
                            <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $data->type) }}" placeholder="Contoh: Meja Kantor, Kursi Kerja">
                        </div>

                        <div class="form-group">
                            <label for="sku">SKU</label>
                            <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku', $data->sku) }}" placeholder="Contoh: SKU-10023">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Ganti Gambar Produk</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                            <small class="text-muted d-block mt-1">Kosongkan jika tidak ingin mengganti gambar. Format: jpeg, png, jpg, gif, webp. Maks: 2MB.</small>
                            
                            @if($data->image)
                                <div class="mt-3">
                                    <label class="d-block">Gambar Saat Ini:</label>
                                    <img src="{{ asset($data->image) }}" width="150" alt="{{ $data->name }}" class="img-thumbnail">
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="dimensions">Dimensi</label>
                            <input type="text" name="dimensions" id="dimensions" class="form-control" value="{{ old('dimensions', $data->dimensions) }}" placeholder="Contoh: 120 x 60 x 75 cm">
                        </div>

                        <div class="form-group">
                            <label for="country_of_origin">Asal Negara</label>
                            <input type="text" name="country_of_origin" id="country_of_origin" class="form-control" value="{{ old('country_of_origin', $data->country_of_origin) }}" placeholder="Contoh: Indonesia, Jepang">
                        </div>

                        <div class="form-group">
                            <label for="specification">Spesifikasi</label>
                            <textarea name="specification" id="specification" class="form-control" rows="4" placeholder="Detail spesifikasi produk...">{{ old('specification', $data->specification) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
