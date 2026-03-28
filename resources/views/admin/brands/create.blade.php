@extends('layouts.admin')

@section('page-title', 'Tambah Brand')
@section('breadcrumb', 'Tambah Brand')

@section('content')
<div class="container">

    <h2 class="mb-4">Tambah Brand</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Brand</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Order</label>
            <input type="number" name="order" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection