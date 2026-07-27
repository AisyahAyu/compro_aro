@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')
@section('breadcrumb', 'Pesan Masuk')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-envelope mr-2"></i>Daftar Pesan dari Pengunjung
                </h3>
                <div class="card-tools">
                    @php $unreadCount = $messages->where('is_read', false)->count(); @endphp
                    @if($unreadCount > 0)
                        <span class="badge badge-warning">{{ $unreadCount }} belum dibaca</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session('success') }}
                    </div>
                @endif

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>No. Referensi</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kategori Produk</th>
                            <th>Tanggal</th>
                            <th width="8%">Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                            <tr class="{{ !$msg->is_read ? 'font-weight-bold' : '' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span class="badge badge-dark" style="font-size: 0.85em;">
                                        #{{ $msg->reference_number ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    @if(!$msg->is_read)
                                        <i class="fas fa-circle text-warning mr-1" style="font-size: 0.5rem; vertical-align: middle;"></i>
                                    @endif
                                    {{ $msg->full_name }}
                                    @if($msg->company_name)
                                        <br><small class="text-muted">{{ $msg->company_name }}</small>
                                    @endif
                                </td>
                                <td>{{ $msg->email }}</td>
                                <td>
                                    <span class="badge badge-info">{{ $msg->product_category }}</span>
                                </td>
                                <td>{{ $msg->created_at->format('d M Y, H:i') }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $msg->is_read ? 'bg-success' : 'bg-warning' }}">
                                        {{ $msg->is_read ? 'Dibaca' : 'Baru' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.contact-messages.show', $msg->id) }}"
                                       class="btn btn-info btn-sm mr-1" title="Lihat Detail">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>
                                    <form action="{{ route('admin.contact-messages.toggle-read', $msg->id) }}"
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                                class="btn btn-{{ $msg->is_read ? 'outline-secondary' : 'success' }} btn-sm mr-1"
                                                title="{{ $msg->is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca' }}">
                                            <i class="fas fa-{{ $msg->is_read ? 'envelope' : 'envelope-open' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.contact-messages.destroy', $msg->id) }}"
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                                title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Belum ada pesan masuk
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
  $.fn.DataTable.ext.errMode = 'none';
  $(function () {
    var table = $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "order": [[5, "desc"]],
      "buttons": ["copy", "csv", "print", "colvis"]
    });
    if (table.buttons) {
      table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    }
  });
</script>
@endsection
