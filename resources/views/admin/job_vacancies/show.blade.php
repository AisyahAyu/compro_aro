@extends('layouts.admin')

@section('title', 'Job Vacancy Details')
@section('page-title', 'Job Vacancy Details')
@section('breadcrumb', 'Job Vacancy')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Detailed Information</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.job_vacancies.edit', $jobVacancy->id) }}" class="btn btn-tool">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
            <div class="card-body">
                <strong><i class="fas fa-briefcase mr-1"></i> Job Title</strong>
                <p class="text-muted">{{ $jobVacancy->name }}</p>
                <hr>

                <strong><i class="fas fa-align-left mr-1"></i> Description</strong>
                <p class="text-muted">{!! nl2br(e($jobVacancy->description)) !!}</p>
                <hr>

                <strong><i class="fas fa-tasks mr-1"></i> Responsibilities</strong>
                <ul class="text-muted mt-2">
                    @foreach(explode("\n", str_replace("\r", "", $jobVacancy->responsibility)) as $point)
                        @if(trim($point))
                            <li>{{ $point }}</li>
                        @endif
                    @endforeach
                </ul>
                <hr>

                <strong><i class="fas fa-graduation-cap mr-1"></i> Qualifications</strong>
                <ul class="text-muted mt-2">
                    @foreach(explode("\n", str_replace("\r", "", $jobVacancy->qualification)) as $point)
                        @if(trim($point))
                            <li>{{ $point }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Quick Stats</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Category</b> <a class="float-right text-primary">{{ $jobVacancy->category->name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Type</b> <a class="float-right">{{ ucfirst(str_replace('_', ' ', $jobVacancy->type)) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Experience</b> <a class="float-right">{{ $jobVacancy->experience ?? '-' }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Location</b> <a class="float-right">{{ $jobVacancy->location }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Status</b> 
                        <span class="float-right badge {{ $jobVacancy->status == 'active' ? 'badge-success' : 'badge-secondary' }}">
                            {{ ucfirst($jobVacancy->status) }}
                        </span>
                    </li>
                </ul>
                <a href="{{ route('admin.job_vacancies.index') }}" class="btn btn-default btn-block">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection