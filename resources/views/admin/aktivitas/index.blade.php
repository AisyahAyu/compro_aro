@extends('layouts.admin')

@section('title', 'Activities')
@section('page-title', 'Manage Activities')
@section('breadcrumb', 'Activities')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold">Activity List</h3>
            <div class="card-tools">
                <a href="{{ route('admin.aktivitas.create') }}" class="btn btn-primary btn-sm px-3">
                    <i class="fas fa-plus mr-1"></i> Add Activity
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="text-center" style="width: 70px">No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th class="text-center" style="width: 180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aktivitas as $item)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->judul }}</td>
                        <td class="align-middle">{{ $item->kategori }}</td>
                        <td class="text-center align-middle">
                            <div class="btn-group">
                                <a href="{{ route('admin.aktivitas.show', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.aktivitas.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $item->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>

                            <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px;">
                                    <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                                        <div class="modal-body text-center p-5">
                                            <div class="mb-4">
                                                <i class="fas fa-exclamation-circle text-danger" style="font-size: 80px; opacity: 0.9;"></i>
                                            </div>
                                            
                                            <h3 class="text-bold mb-3" style="color: #333;">Delete Activity?</h3>
                                            
                                            <p class="text-muted mb-4">
                                                Are you sure you want to delete <strong>{{ $item->judul }}</strong>? This action cannot be undone.
                                            </p>
                                            
                                            <div class="d-flex justify-content-center" style="gap: 15px;">
                                                <button type="button" class="btn btn-light btn-lg px-4" data-dismiss="modal" style="font-weight: 600; background-color: #f8f9fa; color: #444; border: none; min-width: 120px;">
                                                    Cancel
                                                </button>
                                                
                                                <form action="{{ route('admin.aktivitas.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-lg px-4" style="font-weight: 600; background-color: #e3342f; border: none; min-width: 140px;">
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
                        <td colspan="4" class="text-center py-4 text-muted">No activity data available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    /* Additional styling to make the modal match the visual reference */
    .modal-content {
        overflow: hidden;
    }
    .btn-lg {
        font-size: 1rem;
        border-radius: 8px;
    }
    .text-bold {
        font-weight: 700;
    }
</style>
@endpush