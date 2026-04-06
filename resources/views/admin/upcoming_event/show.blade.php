@extends('layouts.admin')

@section('title', 'Event Detail')
@section('page-title', 'Detail Event')
@section('breadcrumb', 'Events / Detail')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body text-center">
                    <div class="mb-3">
                        @if($upcomingEvent->is_published)
                            <span class="badge badge-pill badge-success px-3 py-2">
                                <i class="fas fa-check-circle mr-1"></i> Published
                            </span>
                        @else
                            <span class="badge badge-pill badge-secondary px-3 py-2">
                                <i class="fas fa-pencil-alt mr-1"></i> Draft Mode
                            </span>
                        @endif
                    </div>
                    
                    <div class="position-relative">
                        @if($upcomingEvent->image)
                            <img src="{{ asset('storage/' . $upcomingEvent->image) }}" 
                                 class="img-fluid rounded shadow-sm border" 
                                 style="width: 100%; max-height: 450px; object-fit: cover;" 
                                 alt="Poster">
                        @else
                            <div class="bg-light rounded border py-5">
                                <i class="fas fa-image fa-4x text-muted mb-2"></i>
                                <p class="text-muted small">No Poster Available</p>
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <h6 class="text-muted text-uppercase small font-weight-bold">Registration Link</h6>
                        @if($upcomingEvent->registration_link)
                            <a href="{{ $upcomingEvent->registration_link }}" target="_blank" class="btn btn-primary btn-block shadow-sm">
                                <i class="fas fa-external-link-alt mr-1"></i> Visit Link
                            </a>
                        @else
                            <button class="btn btn-light btn-block disabled">No Link Provided</button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between small text-muted">
                        <span><i class="far fa-calendar-plus mr-1"></i> Created</span>
                        <span>{{ $upcomingEvent->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <hr class="my-2">
                    <div class="d-flex justify-content-between small text-muted">
                        <span><i class="fas fa-history mr-1"></i> Last Update</span>
                        <span>{{ $upcomingEvent->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-dark">
                        <i class="fas fa-info-circle text-primary mr-2"></i>Informasi Agenda
                    </h5>
                    <div class="btn-group">
                        <a href="{{ route('admin.upcoming_event.index') }}" class="btn btn-light btn-sm border">
                            <i class="fas fa-chevron-left mr-1"></i> Kembali
                        </a>
                        <a href="{{ route('admin.upcoming_event.edit', $upcomingEvent->id) }}" class="btn btn-warning btn-sm mx-1">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <h2 class="font-weight-bold mb-4 text-dark">{{ $upcomingEvent->title }}</h2>
                    
                    <div class="row mb-5">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="p-3 bg-light rounded-lg border-left border-primary shadow-sm h-100">
                                <small class="text-muted text-uppercase d-block mb-1 font-weight-bold">Tanggal</small>
                                <span class="h6 font-weight-bold mb-0 text-dark">
                                    <i class="far fa-calendar-alt text-primary mr-2"></i>
                                    {{ $upcomingEvent->event_date ? $upcomingEvent->event_date->format('l, d M Y') : '-' }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="p-3 bg-light rounded-lg border-left border-info shadow-sm h-100">
                                <small class="text-muted text-uppercase d-block mb-1 font-weight-bold">Waktu</small>
                                <span class="h6 font-weight-bold mb-0 text-dark">
                                    <i class="far fa-clock text-info mr-2"></i>
                                    {{ $upcomingEvent->start_time ?? '-' }} WIB
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-lg border-left border-danger shadow-sm h-100">
                                <small class="text-muted text-uppercase d-block mb-1 font-weight-bold">Lokasi</small>
                                <span class="h6 font-weight-bold mb-0 text-dark text-truncate d-block">
                                    <i class="fas fa-map-marker-alt text-danger mr-2"></i>
                                    {{ $upcomingEvent->location ?? 'Online/TBA' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="event-content">
                        <h6 class="font-weight-bold text-dark mb-2">Deskripsi Agenda:</h6>
                        <p class="text-muted text-justify mb-4" style="line-height: 1.8; white-space: pre-line;">
                            {{ $upcomingEvent->description }}
                        </p>

                        <h6 class="font-weight-bold text-dark mb-2">Konten Detail:</h6>
                        <div class="p-4 bg-white rounded border" style="min-height: 150px; background-image: radial-gradient(#f1f1f1 1px, transparent 1px); background-size: 20px 20px;">
                            {!! $upcomingEvent->content ?? '<em class="text-muted">Tidak ada detail konten tambahan.</em>' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card { border-radius: 12px; }
    .badge-pill { font-weight: 500; border-radius: 50px; }
    .bg-light { background-color: #f8f9fc !important; }
    .border-left { border-left-width: 4px !important; }
    .h6 { font-size: 0.95rem; }
</style>
@endsection