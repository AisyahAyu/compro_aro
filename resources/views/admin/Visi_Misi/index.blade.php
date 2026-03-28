@extends('layouts.admin')

@section('page-title', 'Visi & Misi')
@section('breadcrumb', 'Visi & Misi')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Data Visi & Misi</h3>
        <a href="{{ route('admin.visi-misi.create') }}" class="btn btn-primary btn-sm float-right">
            + Tambah
        </a>
    </div>

    <div class="card-body">

        {{-- NOTIF SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- VISI --}}
                @if($visi)
                <tr>
                    <td>1</td>
                    <td><span class="badge badge-info">Visi</span></td>
                    <td>{{ $visi->description }}</td>
                    <td>
                        <a href="{{ route('admin.visi-misi.edit', $visi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endif

                {{-- MISI --}}
                @foreach($misi as $key => $item)
                <tr>
                    <td>{{ $visi ? $key + 2 : $key + 1 }}</td>
                    <td><span class="badge badge-success">Misi</span></td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <div style="display: flex; gap: 5px; align-items: center;">
                            <a href="{{ route('admin.visi-misi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.visi-misi.destroy', $item->id) }}" method="POST" style="display:inline; margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

                @if(!$visi && $misi->count() == 0)
                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>

@endsection