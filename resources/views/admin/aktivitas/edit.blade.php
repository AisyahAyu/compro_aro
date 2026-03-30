@extends('layouts.admin')

@section('title', 'Activities')
@section('page-title', 'Edit Activity')
@section('breadcrumb', 'Activities')

@section('content')
<div class="container-fluid">
    <div class="card card-primary">

        {{-- GLOBAL ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger m-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.aktivitas.update', $aktivitas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">

                    {{-- LEFT COLUMN --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Activity Title</label>
                            <input 
                                type="text" 
                                name="judul" 
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $aktivitas->judul) }}">
                            @error('judul')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                                <option value="">-- Select Category --</option>
                                @foreach(\App\Models\Aktivitas::KATEGORI as $kat)
                                    <option value="{{ $kat }}" {{ old('kategori', $aktivitas->kategori) == $kat ? 'selected' : '' }}>
                                        {{ $kat }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- RIGHT COLUMN --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Header Image</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">

                            <small class="text-muted">
                                Leave blank if you do not want to change the image.
                            </small>

                            @error('gambar')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Publication Status</label>
                            <select name="active" class="form-control">
                                <option value="0" {{ old('active', $aktivitas->active) == 0 ? 'selected' : '' }}>Draft</option>
                                <option value="10" {{ old('active', $aktivitas->active) == 10 ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>
                    </div>

                    {{-- FULL WIDTH --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Brief Summary</label>
                            <textarea 
                                name="ringkasan" 
                                class="form-control @error('ringkasan') is-invalid @enderror" 
                                rows="2">{{ old('ringkasan', $aktivitas->ringkasan) }}</textarea>
                            @error('ringkasan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Full Description</label>
                            <textarea 
                                name="Deskripsi" 
                                class="form-control @error('Deskripsi') is-invalid @enderror" 
                                rows="5">{{ old('Deskripsi', $aktivitas->Deskripsi) }}</textarea>
                            @error('Deskripsi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer text-right">
                <a href="{{ route('admin.aktivitas.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </div>

        </form>
    </div>
</div>
@endsection