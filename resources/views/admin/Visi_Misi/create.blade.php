@extends('layouts.admin')

@section('page-title', 'Tambah Visi & Misi')
@section('breadcrumb', 'Visi & Misi / Tambah')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Tambah Visi / Misi</h3>
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.visi-misi.store') }}">
            @csrf

            <div class="form-group">
                <label>Jenis</label>
                <select name="name" class="form-control">
                    <option value="visi">Visi</option>
                    <option value="misi">Misi</option>
                </select>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.visi-misi.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection