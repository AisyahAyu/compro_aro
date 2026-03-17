@extends('layouts.admin')

@section('title', 'Manage Work Processes')
@section('page-title', 'Work Process Management')
@section('breadcrumb', 'Work Processes')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Work Process Steps</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.work-processes.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add New Step
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Step</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($workProcesses as $workProcess)
                            <tr>
                                <td>
                                    <span class="badge badge-primary">Step {{ $workProcess->step_number }}</span>
                                </td>
                                <td>{{ $workProcess->title }}</td>
                                <td>{{ Str::limit($workProcess->description, 50) }}</td>
                                <td>
                                    <span class="badge {{ $workProcess->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $workProcess->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.work-processes.edit', $workProcess->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.work-processes.destroy', $workProcess->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this work process step?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No work processes found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('scripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
