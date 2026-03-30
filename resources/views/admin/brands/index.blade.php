@extends('layouts.admin')

@section('title', 'Brands')
@section('page-title', 'Brands')
@section('breadcrumb', 'Brands')
@section('content')
<div class="container">

    <h2 class="mb-4">Data Brand</h2>

    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary mb-3">
        + Tambah Brand
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
            @forelse($data as $index => $brand)
            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    <img src="{{ $brand->logo_url }}" width="80">
                </td>

                <td>{{ $brand->order }}</td>

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
                <td colspan="5">Belum ada data brand</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection