@extends('layouts.admin')

@section('title', 'Manage Upcoming Events')
@section('page-title', 'Upcoming Events Management')
@section('breadcrumb', 'Upcoming Events')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h3 class="card-title text-bold">Upcoming Events List</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.upcoming_event.create') }}" class="btn btn-primary btn-sm px-3">
                        <i class="fas fa-plus mr-1"></i> Add New Event
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="eventTable" class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 80px">Poster</th>
                                <th>Event Title</th>
                                <th>Date & Time</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events as $event)
                                <tr>
                                    <td class="align-middle text-center">
                                        @if($event->image)
                                            <img src="{{ asset('storage/' . $event->image) }}" class="img-thumbnail" style="height: 50px; width: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center border" style="height: 50px; width: 50px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-bold">{{ $event->title }}</div>
                                        <small class="text-muted">{{ Str::limit($event->description, 40) }}</small>
                                    </td>
                                    <td class="align-middle">
                                        <div><i class="far fa-calendar-alt mr-1"></i> {{ $event->event_date ? $event->event_date->format('d M Y') : '-' }}</div>
                                        <small class="text-muted"><i class="far fa-clock mr-1"></i> {{ $event->start_time ?? '-' }} WIB</small>
                                    </td>
                                    <td class="align-middle">
                                        <i class="fas fa-map-marker-alt text-danger mr-1 small"></i> {{ $event->location }}
                                    </td>
                                    <td class="align-middle">
                                        @if($event->is_published)
                                            <span class="badge bg-success px-2 py-1">Published</span>
                                        @else
                                            <span class="badge bg-secondary px-2 py-1">Draft</span>
                                        @endif
                                    </td>
                                    
                                    <td class="text-center align-middle">
                                        <div class="btn-group">
                                            {{-- Tombol Show --}}
                                            <a href="{{ route('admin.upcoming_event.show', $event->id) }}" class="btn btn-info btn-sm" title="Show Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('admin.upcoming_event.edit', $event->id) }}" class="btn btn-warning btn-sm" title="Edit Event">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- Tombol Delete --}}
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $event->id }}" title="Delete Event">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        {{-- Delete Modal --}}
                                        <div class="modal fade" id="modal-delete-{{ $event->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px;">
                                                <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                                                    <div class="modal-body text-center p-5">
                                                        <div class="mb-4">
                                                            <i class="fas fa-exclamation-circle text-danger" style="font-size: 80px; opacity: 0.9;"></i>
                                                        </div>
                                                        <h3 class="text-bold mb-3">Delete Event?</h3>
                                                        <p class="text-muted mb-4">Are you sure you want to delete <strong>{{ $event->title }}</strong>?</p>
                                                        <div class="d-flex justify-content-center" style="gap: 15px;">
                                                            <button type="button" class="btn btn-light btn-lg px-4" data-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('admin.upcoming_event.destroy', $event->id) }}" method="POST">
                                                                @csrf @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-lg px-4">Yes, Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">No events found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection