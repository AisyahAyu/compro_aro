@extends('layouts.admin')

@section('content')
<div class="container">

    <h2 class="mb-4">Edit Partner</h2>

    <form action="{{ route('admin.partners.update', $partner->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Partner</label>
            <input type="text" name="name" 
                   class="form-control" 
                   value="{{ $partner->name }}" required>
        </div>

        <div class="mb-3">
            <label>Logo (Kosongkan jika tidak diubah)</label><br>

            <img src="{{ asset($partner->logo) }}" width="100" class="mb-2">

            <input type="file" name="logo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Order</label>
            <input type="number" name="order" 
                   class="form-control" 
                   value="{{ $partner->order }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $partner->is_active ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$partner->is_active ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection