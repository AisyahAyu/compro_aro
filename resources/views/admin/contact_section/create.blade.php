@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Tambah Contact Section</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.contact-section.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label>Button Text</label>
                <input type="text" name="button_text" class="form-control">
            </div>

            <div class="form-group">
                <label>Button Link</label>
                <input type="text" name="button_link" class="form-control">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_active" checked>
                    Aktif
                </label>
            </div>

            <button class="btn btn-success">Simpan</button>

        </form>

    </div>
</div>

@endsection