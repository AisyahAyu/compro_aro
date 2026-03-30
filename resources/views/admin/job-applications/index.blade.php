@extends('layouts.admin')

@section('title', 'Manage Job Applications')
@section('page-title', 'Job Applications')
@section('breadcrumb', 'Job Applications')

@section('content')

<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-table me-1"></i> Incoming Applications</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="datatablesSimple" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width: 50px">No</th>
                            <th>Date</th>
                            <th>Applicant Name</th>
                            <th>Position</th>
                            <th>Education</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applications as $index => $app)
                        <tr>
                            <td class="text-center align-middle">{{ $index + 1 }}</td>
                            <td class="align-middle">{{ $app->created_at->format('d M Y') }}</td>
                            <td class="align-middle">
                                <strong>{{ $app->full_name }}</strong><br>
                                <small class="text-muted">{{ $app->email }}</small>
                            </td>
                            <td class="align-middle">{{ $app->job_vacancy->name ?? 'N/A' }}</td>
                            <td class="align-middle">{{ $app->last_education }}</td>
                            <td class="align-middle">
                                @if($app->status == 'pending')
                                    <span class="badge bg-warning text-dark px-2 py-1">Pending</span>
                                @elseif($app->status == 'reviewed')
                                    <span class="badge bg-info px-2 py-1">Reviewing</span>
                                @elseif($app->status == 'accepted')
                                    <span class="badge bg-success px-2 py-1">Accepted</span>
                                @else
                                    <span class="badge bg-danger px-2 py-1">Rejected</span>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.applications.show', $app->id) }}" class="btn btn-sm btn-primary" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    
                                    <a href="{{ asset('storage/' . $app->resume_path) }}" target="_blank" class="btn btn-sm btn-info text-white" title="Download Resume">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>

                                    {{-- Trigger Modal --}}
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $app->id }}" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>

                                <div class="modal fade" id="modal-delete-{{ $app->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px;">
                                        <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                                            <div class="modal-body text-center p-5">
                                                <div class="mb-4">
                                                    <i class="fas fa-exclamation-circle text-danger" style="font-size: 80px; opacity: 0.9;"></i>
                                                </div>
                                                
                                                <h3 class="text-bold mb-3" style="color: #333;">Delete Application?</h3>
                                                
                                                <p class="text-muted mb-4">
                                                    Are you sure you want to delete application from <strong>{{ $app->full_name }}</strong>? This action cannot be undone.
                                                </p>
                                                
                                                <div class="d-flex justify-content-center" style="gap: 15px;">
                                                    <button type="button" class="btn btn-light btn-lg px-4" data-dismiss="modal" style="font-weight: 600; background-color: #f8f9fa; color: #444; border: none; min-width: 120px; border-radius: 8px;">
                                                        Cancel
                                                    </button>
                                                    
                                                    <form action="{{ route('admin.applications.destroy', $app->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-lg px-4" style="font-weight: 600; background-color: #e3342f; border: none; min-width: 140px; border-radius: 8px;">
                                                            Yes, Delete It
                                                        </button>
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
                            <td colspan="7" class="text-center py-4 text-muted">No applications found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection