@extends('layouts.admin')

@section('title', 'Detail Kategori')
@section('page-title', 'Detail Kategori: ' . $category->name)
@section('breadcrumb', 'Job Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <span class="btn btn-info btn-circle btn-lg mb-3">
                            <i class="fas fa-folder-open"></i>
                        </span>
                    </div>
                    <h3 class="profile-username text-center font-weight-bold">{{ $category->name }}</h3>
                    <p class="text-muted text-center">Job Category Information</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Total Lowongan</b> 
                            <span class="float-right badge badge-info">
                                {{ $category->jobVacancies->count() }} Lowongan
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Dibuat Pada</b> 
                            <span class="float-right text-muted small">
                                {{ $category->created_at->format('d M Y, H:i') }}
                            </span>
                        </li>
                        <li class="list-group-item">
                            <b>Terakhir Update</b> 
                            <span class="float-right text-muted small">
                                {{ $category->updated_at->format('d M Y, H:i') }}
                            </span>
                        </li>
                    </ul>

                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('admin.job_categories.index') }}" class="btn btn-default btn-block">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admin.job_categories.edit', $category->id) }}" class="btn btn-warning btn-block text-white">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header border-0">
                    <h3 class="card-title">Daftar Pekerjaan dalam Kategori Ini</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Posisi Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($category->jobVacancies as $job)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="font-weight-bold">{{ $job->name }}</div>
                                        <div class="text-muted small">
                                            <i class="fas fa-clock mr-1"></i> {{ $job->type }} | 
                                            <i class="fas fa-map-marker-alt mr-1"></i> {{ $job->location }}
                                        </div>
                                    </td>
                        
                                    <td>
                                        <a href="{{ route('admin.job_vacancies.show', $job->id) }}" class="btn btn-sm btn-info shadow-sm">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fas fa-info-circle fa-2x mb-2"></i><br>
                                            Belum ada lowongan untuk kategori ini.
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <p class="text-muted small mb-0 mt-1">
                        *Menampilkan semua lowongan yang menggunakan kategori <strong>{{ $category->name }}</strong>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection