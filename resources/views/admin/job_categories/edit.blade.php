@extends('layouts.admin')

@section('title', 'Edit Job Category')
@section('page-title', 'Edit Category')
@section('breadcrumb', 'Job Category')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Modify Category Name</h3>
            </div>
            <form action="{{ route('admin.job_categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               value="{{ old('name', $category->name) }}" 
                               placeholder="e.g. Information Technology" 
                               required>
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <p class="text-muted small">
                        <i class="fas fa-exclamation-triangle"></i> Changing this name will affect all job vacancies currently linked to this category.
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.job_categories.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning float-right">Update Category</button>
                </div>
            </form>
        </div>
        </div>
</div>
@endsection