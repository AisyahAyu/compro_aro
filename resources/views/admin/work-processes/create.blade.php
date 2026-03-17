@extends('layouts.admin')

@section('title', 'Create Work Process')
@section('page-title', 'Create New Work Process')
@section('breadcrumb', 'Work Processes / Create')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Work Process Information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.work-processes.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="step_number">Step Number <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="step_number" name="step_number" value="{{ old('step_number') }}" placeholder="1" min="1" required>
                                @error('step_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">Order of the step in the process (1, 2, 3, etc.)</small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter step title" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter step description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
                        <small class="form-text text-muted">Only active work process steps will be displayed on the website</small>
                    </div>
                </div>
                <!-- /.card-body -->
                
                <div class="card-footer">
                    <a href="{{ route('admin.work-processes.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success float-right">Create Work Process</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Work Process Guidelines</h3>
            </div>
            <div class="card-body">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Tips:</h5>
                    <ul>
                        <li>Step number determines the order of display</li>
                        <li>Title should be short and descriptive</li>
                        <li>Description should explain what happens in this step</li>
                        <li>Use consecutive numbers (1, 2, 3, etc.)</li>
                        <li>Only active steps appear on website</li>
                    </ul>
                </div>
                
                <div class="callout callout-warning">
                    <h5><i class="fas fa-exclamation-triangle"></i> Note:</h5>
                    <p>Work processes will appear in the "Work Process" section of the website. Steps are displayed in numerical order.</p>
                </div>
                
                <div class="callout callout-primary">
                    <h5><i class="fas fa-lightbulb"></i> Example Steps:</h5>
                    <div class="mb-2">
                        <small><strong>Step 1:</strong> Consultation & Planning</small><br>
                        <small><strong>Step 2:</strong> Design & Development</small><br>
                        <small><strong>Step 3:</strong> Testing & Quality Assurance</small><br>
                        <small><strong>Step 4:</strong> Deployment & Launch</small><br>
                        <small><strong>Step 5:</strong> Support & Maintenance</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
