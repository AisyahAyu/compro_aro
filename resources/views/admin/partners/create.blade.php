@extends('layouts.admin')

@section('content')
<div class="container">

    <h2 class="mb-4">Tambah Partner</h2>

    <form action="{{ route('admin.partners.store') }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Nama Partner</label>
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
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection