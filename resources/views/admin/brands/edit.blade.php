@extends('layouts.admin')

@section('page-title', 'Edit Brand')
@section('breadcrumb', 'Edit Brand')

@section('content')
<div class="container">

    <h2 class="mb-4">Edit Brand</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.brands.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Brand</label>
            <input type="text" name="name" class="form-control" 
                   value="{{ $data->name }}" required>
        </div>

        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah logo</small>
            @if($data->logo)
                <br><img src="{{ $data->logo_url }}" width="80" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $data->is_active ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$data->is_active ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection