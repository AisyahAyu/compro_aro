@extends('layouts.admin')

@section('title', 'detail-aktivitas')
@section('page-title', 'detail-aktivitas')
@section('breadcrumb', 'Aktivitas / Detail')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center mb-3">
                        @if($aktivitas->gambar)
                            <img class="img-fluid rounded" src="{{ asset('storage/aktivitas/' . $aktivitas->gambar) }}" alt="Gambar Aktivitas">
                        @else
                            <img class="img-fluid rounded" src="{{ asset('images/no-image.png') }}" alt="No Image">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">{{ $aktivitas->judul }}</h3>
                    <p class="text-muted text-center">{{ $aktivitas->kategori }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Status</b> 
                            <a class="float-right">
                                @if($aktivitas->active == \App\Models\Aktivitas::STATUS_PUBLISHED)
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-secondary">Draft</span>
                                @endif
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>Total Views</b> <a class="float-right"><i class="fas fa-eye"></i> {{ $aktivitas->views ?? 0 }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Dibuat Pada</b> <a class="float-right">{{ $aktivitas->created_at->format('d M Y') }}</a>
                        </li>
                    </ul>

                    <a href="{{ route('admin.aktivitas.edit', $aktivitas->id) }}" class="btn btn-warning btn-block"><b>Edit Data</b></a>
                    <a href="{{ route('admin.aktivitas.index') }}" class="btn btn-secondary btn-block"><b>Kembali</b></a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Lengkap</h3>
                </div>
                <div class="card-body">
                    <strong><i class="fas fa-align-left mr-1"></i> Ringkasan</strong>
                    <p class="text-muted">{{ $aktivitas->ringkasan }}</p>
                    <hr>

                    <strong><i class="fas fa-file-alt mr-1"></i> Deskripsi Lengkap</strong>
                    <div class="mt-2">
                        {!! nl2br(e($aktivitas->Deskripsi)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection