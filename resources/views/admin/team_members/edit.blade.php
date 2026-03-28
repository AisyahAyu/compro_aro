@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Edit Team</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.team-members.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="position" class="form-control" value="{{ $data->position }}" required>
            </div>

            <div class="form-group">
                <label>Foto Lama</label><br>
                <img src="{{ $data->photo_url }}" width="80" style="border-radius:50%;">
            </div>

            <div class="form-group">
                <label>Ganti Foto</label>
                <input type="file" name="photo" class="form-control" onchange="previewImage(event)">
                <br>
                <img id="preview" width="100" style="display:none;">
            </div>

            <div class="form-group">
                <label>Order</label>
                <input type="number" name="order" class="form-control" value="{{ $data->order }}">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_active" {{ $data->is_active ? 'checked' : '' }}>
                    Aktif
                </label>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

<script>
function previewImage(event) {
    let reader = new FileReader();
    reader.onload = function(){
        let img = document.getElementById('preview');
        img.src = reader.result;
        img.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection