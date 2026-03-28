@extends('layouts.admin')

@section('title', 'Detail Pelamar - ' . $application->full_name)

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Pelamar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.applications.index') }}">Applications</a></li>
        <li class="breadcrumb-item active">{{ $application->full_name }}</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold">
                    <i class="fas fa-user me-1"></i> Profil Pelamar
                </div>
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($application->full_name) }}&background=random&size=128" class="rounded-circle mb-3" alt="Avatar">
                    <h4>{{ $application->full_name }}</h4>
                    <p class="text-muted">{{ $application->job_vacancy->name ?? 'N/A' }}</p>
                    
                    @if($application->status == 'pending')
                        <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                    @elseif($application->status == 'reviewed')
                        <span class="badge bg-info px-3 py-2">Reviewed</span>
                    @elseif($application->status == 'accepted')
                        <span class="badge bg-success px-3 py-2">Accepted</span>
                    @else
                        <span class="badge bg-danger px-3 py-2">Rejected</span>
                    @endif
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <strong class="text-muted">Email</strong>
                        <span>{{ $application->email }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <strong class="text-muted">No. HP</strong>
                        <span>{{ $application->phone ?? $application->phone_number }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <strong class="text-muted">Pendidikan</strong>
                        <span>{{ $application->last_education }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <strong class="text-muted">Pengalaman</strong>
                        <span>{{ $application->years_of_experience ?? '0' }} Tahun</span>
                    </li>
                </ul>
                <div class="card-footer bg-white border-0 py-3">
                    <a href="{{ $application->linkedin_url }}" target="_blank" class="btn btn-primary w-100 {{ !$application->linkedin_url ? 'disabled' : '' }}">
                        <i class="fab fa-linkedin me-1"></i> Profil LinkedIn
                    </a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold">
                    <i class="fas fa-edit me-1"></i> Update Status & Email
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.applications.update', $application->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label small text-muted font-weight-bold text-uppercase">Ganti Status Ke:</label>
                            <select name="status" class="form-select border-primary shadow-sm">
                                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted (Kirim Email)</option>
                                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected (Kirim Email)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-2 shadow-sm" onclick="return confirm('Update status dan kirim email notifikasi?')">
                            <i class="fas fa-paper-plane me-1"></i> Update & Notify Applicant
                        </button>
                    </form>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="text-muted italic">
                        <i class="fas fa-info-circle me-1"></i> Sistem otomatis mengirim email jika status <strong>Accepted</strong> atau <strong>Rejected</strong>.
                    </small>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white font-weight-bold">
                    <i class="fas fa-envelope-open-text me-1"></i> Cover Letter / Pesan Pelamar
                </div>
                <div class="card-body bg-light">
                    <div style="white-space: pre-wrap; line-height: 1.6;">{{ $application->cover_letter ?? 'Pelamar tidak menyertakan cover letter.' }}</div>
                </div>
            </div>

            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <span class="font-weight-bold"><i class="fas fa-file-pdf me-1"></i> Curriculum Vitae (CV)</span>
                    <a href="{{ asset('storage/' . $application->resume_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-external-link-alt me-1"></i> Buka Fullscreen
                    </a>
                </div>
                <div class="card-body p-0">
                    {{-- Preview PDF --}}
                    <iframe src="{{ asset('storage/' . $application->resume_path) }}" width="100%" height="600px" style="border: none;"></iframe>
                </div>
                <div class="card-footer bg-white text-center py-2">
                    <small class="text-muted font-italic">Jika PDF tidak muncul, klik tombol "Buka Fullscreen" di atas.</small>
                </div>
            </div>

            <div class="mb-4">
                <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection