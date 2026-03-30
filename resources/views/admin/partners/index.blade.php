@extends('layouts.admin')

@section('title', 'Mitra Teknologi')
@section('page-title', 'Mitra Teknologi')
@section('breadcrumb', 'Mitra Teknologi')
@section('content')
<div class="container">

    <h2 class="mb-4">Data Mitra Teknologi</h2>

    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary mb-3">
        + Tambah Partner
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Logo</th>
                <th>Order</th>
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

                <td>{{ $partner->order }}</td>

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
                <td colspan="5">Belum ada data partner</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection