@extends('layouts.admin')

@section('title', 'Create Upcoming Event')
@section('page-title', 'Post New Upcoming Event')
@section('breadcrumb', 'Upcoming Event')

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card card-success shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Event Information</h3>
            </div>
            
            <form action="{{ route('admin.upcoming_event.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Event Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="e.g. International Tech Conference 2026" required>
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="event_date">Event Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="event_date" name="event_date" value="{{ old('event_date') }}" required>
                                @error('event_date') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}">
                                @error('start_time') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" placeholder="e.g. Zoom / Head Office">
                                @error('location') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="description">Event Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Provide a detailed description of the event..." required>{{ old('description') }}</textarea>
                        @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="upcoming" {{ old('category') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                    <option value="past" {{ old('category') == 'past' ? 'selected' : '' }}>Past Event</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_published">Status</label>
                                <select class="form-control" name="is_published" id="is_published">
                                    <option value="1" {{ old('is_published') == '1' ? 'selected' : '' }}>Published (Visible)</option>
                                    <option value="0" {{ old('is_published') == '0' ? 'selected' : '' }}>Draft (Hidden)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose image...</label>
                            </div>
                        </div>
                        <small class="text-muted">Format: JPG, PNG. Max: 2MB. (Optional)</small>
                        @error('image') <br><span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.upcoming_event.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-success float-right">Save Event</button>
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
                <h6 class="font-weight-bold small">1. SEO Friendly Slug</h6>
                <p class="small text-muted">The URL slug will be auto-generated from the title. Ensure your title is unique to avoid data conflicts.</p>

                <h6 class="font-weight-bold small">2. Event Category</h6>
                <p class="small text-muted">Select <b>Upcoming</b> for future events and <b>Past Event</b> for documentation of finished activities.</p>

                <h6 class="font-weight-bold small">3. Schedule & Venue</h6>
                <p class="small text-muted">Double-check the event date and time. If it's a webinar, you can fill the location with the meeting platform name (e.g., Zoom).</p>

                <h6 class="font-weight-bold small">4. High-Quality Poster</h6>
                <p class="small text-muted">Upload a clear image . This image will be the first thing users see on the landing page.</p>

                <div class="alert alert-light border mt-3 p-2">
                    <small class="text-dark">
                        <i class="fas fa-info-circle text-info mr-1"></i> 
                        Fields marked with <span class="text-danger">*</span> are mandatory.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Update the label of custom file input when a file is selected
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("image").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection