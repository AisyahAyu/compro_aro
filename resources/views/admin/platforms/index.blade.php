@extends('layouts.admin')

@section('title', 'Manage Platforms')
@section('page-title', 'Platform Management')
@section('breadcrumb', 'Platforms')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Available Platforms</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.platforms.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add New Platform
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Features</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($platforms as $platform)
                            <tr>
                                <td>
                                    @if($platform->image)
                                        <img src="{{ asset($platform->image) }}" alt="{{ $platform->title }}" style="max-width: 60px; max-height: 40px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>{{ $platform->title }}</td>
                                <td>
                                    @if($platform->platform_url && !is_array($platform->platform_url))
                                        <a href="{{ $platform->platform_url }}" target="_blank" class="clean-url">
                                            <i class="fas fa-external-link-alt url-icon"></i>
                                            <span class="clean-url-text">{{ Str::cleanUrlDisplay($platform->platform_url) }}</span>
                                        </a>
                                    @else
                                        <span class="text-muted">No URL</span>
                                    @endif
                                </td>
                                <td>
                                    @if($platform->features && count($platform->features) > 0)
                                        <div class="d-flex flex-wrap gap-1">
                                            @foreach(array_slice($platform->features, 0, 2) as $feature)
                                                <span class="badge bg-info">{{ $feature }}</span>
                                            @endforeach
                                            @if(count($platform->features) > 2)
                                                <span class="badge bg-secondary">+{{ count($platform->features) - 2 }}</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted">No features</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $platform->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $platform->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.platforms.edit', $platform->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.platforms.destroy', $platform->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this platform?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No platforms found</td>
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
