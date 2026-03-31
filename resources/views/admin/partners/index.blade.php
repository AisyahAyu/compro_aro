@extends('layouts.admin')

@section('title', 'Mitra Teknologi')
@section('page-title', 'Mitra Teknologi')
@section('breadcrumb', 'Mitra Teknologi')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Data Mitra Teknologi</h3>
        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary btn-sm float-right">
            + Tambah Partner
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $index => $partner)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>
                        <img src="{{ asset($partner->logo) }}" width="80">
                    </td>

                    <td>
                        @if($partner->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.partners.edit', $partner->id) }}" 
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" 
                              method="POST" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Yakin hapus?')" 
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada data partner</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection