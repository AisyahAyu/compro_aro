@extends('layouts.admin')

@section('title', 'Edit Upcoming Event')
@section('page-title', 'Edit Upcoming Event')
@section('breadcrumb', 'Upcoming Event')

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card card-warning shadow-sm">
            <div class="card-header">
                <h3 class="card-title text-dark">Event Information</h3>
            </div>
            
            <form action="{{ route('admin.upcoming_event.update', $upcomingEvent->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Event Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $upcomingEvent->title) }}" placeholder="e.g. Webinar Cyber Security" required>
                                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="event_date">Event Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('event_date') is-invalid @enderror" id="event_date" name="event_date" value="{{ old('event_date', $upcomingEvent->event_date->format('Y-m-d')) }}" required>
                                @error('event_date') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time', $upcomingEvent->start_time ? \Carbon\Carbon::parse($upcomingEvent->start_time)->format('H:i') : '') }}">
                                @error('start_time') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $upcomingEvent->location) }}" placeholder="e.g. Zoom Meeting">
                                @error('location') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="description">Event Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Detailed event description" required>{{ old('description', $upcomingEvent->description) }}</textarea>
                        @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="upcoming" {{ old('category', $upcomingEvent->category) == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                    <option value="past" {{ old('category', $upcomingEvent->category) == 'past' ? 'selected' : '' }}>Past Event</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_published">Status</label>
                                <select class="form-control" name="is_published" id="is_published">
                                    <option value="1" {{ old('is_published', $upcomingEvent->is_published) == '1' ? 'selected' : '' }}>Published (Visible)</option>
                                    <option value="0" {{ old('is_published', $upcomingEvent->is_published) == '0' ? 'selected' : '' }}>Draft (Hidden)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Update Poster</label>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                @if($upcomingEvent->image)
                                    <p class="small text-muted mb-1">Current Image:</p>
                                    <img src="{{ asset('storage/' . $upcomingEvent->image) }}" class="img-thumbnail" style="max-height: 150px;">
                                @else
                                    <div class="p-3 bg-light text-center border small text-muted">No Image Available</div>
                                @endif
                            </div>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose new image...</label>
                        </div>
                        <small class="text-muted">Format: JPG, PNG. Max: 2MB. Leave blank to keep current image.</small>
                        @error('image') <br><span class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.upcoming_event.index') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-warning float-right text-dark font-weight-bold">Update Event</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-info shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit mr-2"></i> Editing Guide</h3>
            </div>
            <div class="card-body">
                <h6 class="font-weight-bold small">1. Content Accuracy</h6>
                <p class="small text-muted">Ensure all updated information, such as dates or locations, is accurate to avoid misleading users.</p>

                <h6 class="font-weight-bold small">2. Image Updates</h6>
                <p class="small text-muted">If you upload a new image, the old one will be automatically replaced in the server storage.</p>

                <h6 class="font-weight-bold small">3. Slug Persistence</h6>
                <p class="small text-muted">Changing the title will regenerate the slug, which might break old shared links. Use caution.</p>

                <h6 class="font-weight-bold small">4. Status Control</h6>
                <p class="small text-muted">Switching to <b>Draft</b> will immediately hide the event from the public website.</p>

                <div class="alert alert-light border mt-3 p-2">
                    <small class="text-dark">
                        <i class="fas fa-info-circle text-info mr-1"></i> 
                        Fields with <span class="text-danger">*</span> must be filled.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Show selected filename on custom file input
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("image").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection