@extends('layouts.admin')

@section('title', 'Team Member')
@section('page-title', 'Team')
@section('breadcrumb', 'Team')
@section('content')

<div class="card">
    <div class="card-header">
        <h3> Data Team Members</h3>
        <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary btn-sm float-right">
            + Tambah
        </a>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Jabatan</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <img src="{{ $item->photo_url }}" width="50" height="50" style="object-fit:cover;border-radius:50%;">
                    </td>
                    <td>{{ $item->position }}</td>
                    <td>{{ $item->order }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.team-members.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.team-members.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection