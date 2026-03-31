@extends('layouts.admin')

@section('title', 'Kelola FAQ')
@section('page-title', 'FAQ Management')
@section('breadcrumb', 'FAQ')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar FAQ</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah FAQ
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table id="faqTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th style="width: 220px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td>{{ $faq->question }}</td>
                                <td>{{ Str::limit(strip_tags($faq->answer), 120) }}</td>
                                <td>{{ $faq->order }}</td>
                                <td>
                                    <span class="badge {{ $faq->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.faqs.show', $faq->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus FAQ ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
    $('#faqTable').DataTable({
      responsive: true,
      lengthChange: false,
            autoWidth: false,
            language: {
                emptyTable: 'Belum ada data FAQ.'
            }
    });
  });
</script>
@endsection
