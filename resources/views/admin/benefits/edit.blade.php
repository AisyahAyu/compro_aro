@extends('layouts.admin')

@section('title', 'Benefit')
@section('page-title', 'Edit Benefit')
@section('breadcrumb', 'Benefit')

@section('content')
<div class="container-fluid">
    <div class="card card-primary">

        {{-- ERROR GLOBAL --}}
        @if ($errors->any())
            <div class="alert alert-danger m-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.benefits.update', $benefit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">

                    {{-- LEFT --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Benefit Title</label>
                            <input 
                                type="text" 
                                name="title" 
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $benefit->title) }}"
                                placeholder="e.g. Health Insurance">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Display Order</label>
                            <input 
                                type="number" 
                                name="order" 
                                class="form-control"
                                value="{{ old('order', $benefit->order) }}">
                        </div>
                    </div>

                    {{-- RIGHT --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Benefit Icon</label>
                            <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengubah icon.
                            </small>

                            @error('icon')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{ old('status', $benefit->status) == 'active' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="inactive" {{ old('status', $benefit->status) == 'inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    {{-- FULL WIDTH --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea 
                                name="description" 
                                class="form-control @error('description') is-invalid @enderror" 
                                rows="4">{{ old('description', $benefit->description) }}</textarea>

                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer text-right">
                <a href="{{ route('admin.benefits.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update Benefit</button>
            </div>

        </form>
    </div>
</div>
@endsection