@extends('layouts.admin')

@section('title', 'Job Categories')
@section('page-title', 'Manage Job Categories')
@section('breadcrumb', 'Job Category')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h3 class="card-title text-bold text-dark">List of Categories</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.job_categories.create') }}" class="btn btn-primary btn-sm px-3">
                        <i class="fas fa-plus mr-1"></i> Add New Category
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                {{-- Alert session tetap dipertahankan jika ada --}}
                @if(session('success'))
                    <div class="alert alert-success m-3">
                        {{ session('success') }}
                    </div>
                @endif

                <table id="categoryTable" class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width: 70px">No</th>
                            <th>Category Name</th>
                            <th>Related Jobs</th>
                            <th class="text-center" style="width: 180px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle text-bold">{{ $category->name }}</td>
                            <td class="align-middle">
                                <span class="badge badge-info px-2 py-1">
                                    {{ $category->job_vacancies_count ?? $category->jobVacancies->count() }} Jobs
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group">
                                    <a href="{{ route('admin.job_categories.show', $category->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.job_categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- Trigger Modal --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $category->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>

                                <div class="modal fade" id="modal-delete-{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px;">
                                        <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                                            <div class="modal-body text-center p-5">
                                                <div class="mb-4">
                                                    <i class="fas fa-exclamation-circle text-danger" style="font-size: 80px; opacity: 0.9;"></i>
                                                </div>
                                                
                                                <h3 class="text-bold mb-3" style="color: #333;">Delete Category?</h3>
                                                
                                                <p class="text-muted mb-4">
                                                    Are you sure you want to delete <strong>{{ $category->name }}</strong>? This action cannot be undone.
                                                </p>
                                                
                                                <div class="d-flex justify-content-center" style="gap: 15px;">
                                                    <button type="button" class="btn btn-light btn-lg px-4" data-dismiss="modal" style="font-weight: 600; background-color: #f8f9fa; color: #444; border: none; min-width: 120px; border-radius: 8px;">
                                                        Cancel
                                                    </button>
                                                    
                                                    <form action="{{ route('admin.job_categories.destroy', $category->id) }}" method="POST">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
  $(function () {
    $("#categoryTable").DataTable({
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "language": {
          "search": "Search Category:",
          "emptyTable": "No categories found"
      }
    });
  });
</script>
@endsection