@extends('layouts.admin')

@section('title', 'Brands')
@section('page-title', 'Brands')
@section('breadcrumb', 'Brands')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Data Brand</h3>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-primary btn-sm float-right">
            + Tambah Brand
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
                @forelse($data as $index => $brand)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>
                        <img src="{{ $brand->logo_url }}" width="80">
                    </td>

                    <td>
                        @if($brand->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.brands.edit', $brand->id) }}" 
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" 
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
                    <td colspan="4">Belum ada data brand</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection