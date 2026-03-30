@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Tambah Team Member</h3>
        <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary btn-sm float-right">
            ← Kembali
        </a>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="position" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <div class="form-group">
                <label>Order</label>
                <input type="number" name="order" class="form-control" value="0">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="is_active" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>

        </form>

    </div>
</div>

@endsection