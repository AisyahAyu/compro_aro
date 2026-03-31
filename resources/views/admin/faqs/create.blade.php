@extends('layouts.admin')

@section('title', 'Tambah FAQ')
@section('page-title', 'Tambah FAQ')
@section('breadcrumb', 'FAQ / Tambah')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Form FAQ</h3>
            </div>

            <form action="{{ route('admin.faqs.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="question">Pertanyaan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="question" name="question" value="{{ old('question') }}" required>
                        @error('question')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="answer">Jawaban <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="answer" name="answer" rows="6" required>{{ old('answer') }}</textarea>
                        @error('answer')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="order">Urutan</label>
                                <input type="number" min="0" class="form-control" id="order" name="order" value="{{ old('order', 0) }}">
                                @error('order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mt-4 pt-2">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="is_active">Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-success float-right">Simpan FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
