@extends('layouts.admin')

@section('title', 'Edit job-vacancy')
@section('page-title', 'Edit Job-vacancy')
@section('breadcrumb', 'Job-Vacancy')

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Job Information: {{ $jobVacancy->name }}</h3>
            </div>
            <form action="{{ route('admin.job_vacancies.update', $jobVacancy->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- PENTING: Untuk proses Update --}}
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $jobVacancy->name) }}" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_category_id">Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="job_category_id" id="job_category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('job_category_id', $jobVacancy->job_category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Job Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="type" id="type" required>
                                    @php $types = ['full_time', 'part_time', 'internship', 'freelance']; @endphp
                                    @foreach($types as $t)
                                        <option value="{{ $t }}" {{ old('type', $jobVacancy->type) == $t ? 'selected' : '' }}>
                                            {{ ucwords(str_replace('_', ' ', $t)) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <input type="text" class="form-control" name="experience" value="{{ old('experience', $jobVacancy->experience) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="location">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="location" value="{{ old('location', $jobVacancy->location) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="min_salary">Min Salary (IDR)</label>
                                <input type="number" class="form-control" name="min_salary" value="{{ old('min_salary', $jobVacancy->min_salary) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_salary">Max Salary (IDR)</label>
                                <input type="number" class="form-control" name="max_salary" value="{{ old('max_salary', $jobVacancy->max_salary) }}">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="description">Job Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $jobVacancy->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="responsibility">Key Responsibilities <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="responsibility" name="responsibility" rows="4" required>{{ old('responsibility', $jobVacancy->responsibility) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="qualification">Qualifications <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="qualification" name="qualification" rows="4" required>{{ old('qualification', $jobVacancy->qualification) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="active" {{ old('status', $jobVacancy->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $jobVacancy->status) == 'inactive' ? 'selected' : '' }}>Inactive (Draft)</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.job_vacancies.index') }}" class="btn btn-default">Back to List</a>
                    <button type="submit" class="btn btn-primary float-right">Update Changes</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Last Updated</h3>
            </div>
            <div class="card-body">
                <p>Created at: <br><strong>{{ $jobVacancy->created_at->format('d M Y, H:i') }}</strong></p>
                <p>Last Edit: <br><strong>{{ $jobVacancy->updated_at->format('d M Y, H:i') }}</strong></p>
                <hr>
                <small>Pastikan data gaji dan kualifikasi sudah benar sebelum mengaktifkan kembali status lowongan.</small>
            </div>
        </div>
    </div>
</div>
@endsection