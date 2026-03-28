@extends('layouts.admin')

@section('page-title', 'Edit Visi & Misi')
@section('breadcrumb', 'Visi & Misi / Edit')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Edit Data</h3>
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.visi-misi.update', $visiMisi->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Jenis</label>
                <input type="text" class="form-control" value="{{ $visiMisi->name }}" disabled>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="4">
{{ $visiMisi->description }}
                </textarea>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="{{ route('admin.visi-misi.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection