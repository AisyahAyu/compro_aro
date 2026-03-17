@extends('layouts.admin')

@section('title', 'Manage Partners')
@section('page-title', 'Partner Management')
@section('breadcrumb', 'Partners')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Partner Brands</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add New Partner
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($partners as $partner)
                            <tr>
                                <td>
                                    @if($partner->logo)
                                        <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" style="max-width: 80px; max-height: 40px; object-fit: contain;">
                                    @else
                                        <span class="text-muted">No logo</span>
                                    @endif
                                </td>
                                <td>{{ $partner->name }}</td>
                                <td>{{ $partner->order }}</td>
                                <td>
                                    <span class="badge {{ $partner->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $partner->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this partner?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No partners found</td>
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
