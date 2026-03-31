@extends('layouts.admin')

@section('title', 'Detail FAQ')
@section('page-title', 'Detail FAQ')
@section('breadcrumb', 'FAQ / Detail')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Informasi FAQ</h3>
            </div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-2">Pertanyaan</dt>
                    <dd class="col-sm-10">{{ $faq->question }}</dd>

                    <dt class="col-sm-2">Jawaban</dt>
                    <dd class="col-sm-10">{!! nl2br(e($faq->answer)) !!}</dd>

                    <dt class="col-sm-2">Urutan</dt>
                    <dd class="col-sm-10">{{ $faq->order }}</dd>

                    <dt class="col-sm-2">Status</dt>
                    <dd class="col-sm-10">
                        <span class="badge {{ $faq->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </dd>
                </dl>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-default">Kembali</a>
                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning float-right">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
