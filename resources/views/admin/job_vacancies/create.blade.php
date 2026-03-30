@extends('layouts.admin')

@section('title', 'Create Job Vacancy')
@section('page-title', 'Post New Job Vacancy')
@section('breadcrumb', 'Job Vacancy')

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Job Information</h3>
            </div>
            
            <form action="{{ route('admin.job_vacancies.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. UI/UX Designer" required>
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_category_id">Category <span class="text-danger">*</span></label>
                                <select class="form-control @error('job_category_id') is-invalid @enderror" name="job_category_id" id="job_category_id" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('job_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('job_category_id') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type">Job Type <span class="text-danger">*</span></label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="full_time" {{ old('type') == 'full_time' ? 'selected' : '' }}>Full Time</option>
                                    <option value="part_time" {{ old('type') == 'part_time' ? 'selected' : '' }}>Part Time</option>
                                    <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                    <option value="freelance" {{ old('type') == 'freelance' ? 'selected' : '' }}>Freelance</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <input type="text" class="form-control" name="experience" value="{{ old('experience') }}" placeholder="e.g. 1-2 Years">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="location">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="e.g. Jakarta / Remote" required>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="description">Job Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Briefly describe the role" required>{{ old('description') }}</textarea>
                        @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="responsibility">Key Responsibilities <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('responsibility') is-invalid @enderror" id="responsibility" name="responsibility" rows="4" placeholder="Enter job responsibilities" required>{{ old('responsibility') }}</textarea>
                        <small class="text-info"><i class="fas fa-info-circle"></i> Press <b>Enter</b> for each new point.</small>
                        @error('responsibility') <br><span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="qualification">Qualifications <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('qualification') is-invalid @enderror" id="qualification" name="qualification" rows="4" placeholder="Enter requirements" required>{{ old('qualification') }}</textarea>
                        <small class="text-info"><i class="fas fa-info-circle"></i> Press <b>Enter</b> for each new requirement.</small>
                        @error('qualification') <br><span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active (Publish)</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive (Draft)</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.job_vacancies.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success float-right">Publish Job</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-info shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-book-open mr-2"></i> Posting Guide</h3>
            </div>
            <div class="card-body">
                <p class="text-muted small">Follow these steps to ensure the job listing is professional and clear:</p>
                
                <h6 class="font-weight-bold small">1. Clear Title</h6>
                <p class="small text-muted">Use standard job titles. This helps in SEO and candidate searching.</p>

                <h6 class="font-weight-bold small">2. Use Lists</h6>
                <p class="small text-muted">In <b>Responsibilities</b> and <b>Qualifications</b>, type one point per line.
                <br><span class="badge badge-warning">Pro Tip:</span> Press <b>Enter</b> to start a new bullet point.</p>

                <h6 class="font-weight-bold small">3. Accurate Category</h6>
                <p class="small text-muted">Ensure the category matches the role so candidates can filter properly.</p>

                <div class="alert alert-light border mt-3 p-2">
                    <small class="text-dark">
                        <i class="fas fa-check-circle text-success mr-1"></i> 
                        Fields marked with <span class="text-danger">*</span> are mandatory.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection