@extends('layouts.admin')

@section('title', 'Manage Legalities')
@section('page-title', 'Legality & Compliance')
@section('breadcrumb', 'Legalities')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Legalities & Compliance</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.legalities.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add New Legality
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($legalities as $legality)
                            <tr>
                                <td>
                                    @if($legality->icon)
                                        <i class="{{ $legality->icon }} fa-lg text-primary"></i>
                                    @else
                                        <i class="fas fa-gavel fa-lg text-muted"></i>
                                    @endif
                                </td>
                                <td>{{ $legality->title }}</td>
                                <td>{{ Str::limit($legality->description, 50) }}</td>
                                <td>{{ $legality->order }}</td>
                                <td>
                                    <span class="badge {{ $legality->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $legality->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.legalities.edit', $legality->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.legalities.destroy', $legality->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this legality?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No legalities found</td>
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
  $.fn.DataTable.ext.errMode = 'none';
  $(function () {
    var table = $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "print", "colvis"]
    });
    if (table.buttons) {
      table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    }
  });
</script>
@endsection
