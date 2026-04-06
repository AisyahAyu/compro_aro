@extends('layouts.admin')

@section('page-title', 'Edit Statistik')
@section('breadcrumb', 'Data Statistik')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Data Statistik</h3>
    </div>

    <div class="card-body">

        {{-- Show validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- Show success message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.statistics.update', $statistic->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $statistic->title }}" required>
            </div>

            <div class="form-group">
                <label>Value</label>
                <input type="number" name="value" class="form-control" value="{{ $statistic->value }}" required>
            </div>

            <div class="form-group">
                <label>Suffix</label>
                <input type="text" name="suffix" class="form-control" value="{{ $statistic->suffix }}" placeholder="e.g., +, %">
            </div>

            <div class="form-group">
                <label>Icon</label>
                <input type="file" name="icon" class="form-control" accept="image/*">
                @if($statistic->icon)
                    <br>
                    <small>Icon saat ini: {{ $statistic->icon }}</small><br>
                    <img src="{{ asset('storage/' . $statistic->icon) }}" style="max-width: 50px; max-height: 50px;" alt="Icon">
                @endif
            </div>

            <div class="form-group">
                <label>Order (Urutan Tampil)</label>
                <input type="number" name="order" class="form-control" value="{{ $statistic->order }}">
            </div>

            <div class="form-group">
                <label>
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ $statistic->is_active ? 'checked' : '' }}>
                    Aktif
                </label>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection