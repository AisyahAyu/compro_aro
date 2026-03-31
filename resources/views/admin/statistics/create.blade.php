@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Tambah Statistik</h3>
    </div>

    <div class="card-body">

        {{-- 🔥 TAMPILKAN ERROR --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- 🔥 PENTING: enctype untuk upload --}}
        <form action="{{ route('admin.statistics.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Suffix</label>
            <input type="text" name="suffix" class="form-control">
        </div>

        {{-- 🔥 ICON SEKARANG = GAMBAR --}}
        <div class="form-group">
            <label>Icon (Upload Gambar)</label>
            <input type="file" name="icon" class="form-control">
        </div>

        <div class="form-group">
            <label>Status</label><br>
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" checked> Aktif
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>

    </div>
</div>

@endsection