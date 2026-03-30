@extends('layouts.admin')

@section('page-title', 'Contact')
@section('breadcrumb', 'Contact')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Data Contact</h3>
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
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Button</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($data)
                <tr>
                    <td>1</td>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->button_text }}</td>
                    <td>
                        @if($data->is_active)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.contact-section.edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @else
                <tr>
                    <td colspan="8" class="text-center">
                        Belum ada data
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>

@endsection