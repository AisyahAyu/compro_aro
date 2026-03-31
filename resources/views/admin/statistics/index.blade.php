@extends('layouts.admin')

@section('page-title', 'Statistik')
@section('breadcrumb', 'Statistik')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Data Statistik</h3>
        <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary btn-sm float-right">
            + Tambah
        </a>
    </div>

    <div class="card-body">

        {{-- ✅ NOTIF SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Suffix</th>
                    <th>Icon (Gambar)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($statistics as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->suffix ?? '-' }}</td>

                    {{-- ✅ FIX AMAN (CEK FILE ADA / TIDAK) --}}
                    <td>
                        @if(!empty($item->icon) && file_exists(public_path('storage/'.$item->icon)))
                            <img src="{{ asset('storage/'.$item->icon) }}" 
                                 width="50" height="50"
                                 style="object-fit:cover;border-radius:8px;">
                        @else
                            <span>-</span>
                        @endif
                    </td>

                    <td>
                        @if($item->is_active)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-secondary">Nonaktif</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.statistics.edit', $item->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.statistics.destroy', $item->id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada data
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection