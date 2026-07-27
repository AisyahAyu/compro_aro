@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan')
@section('breadcrumb', 'Detail Pesan')

@section('content')
<div class="row">
    {{-- Kolom Kiri: Isi Pesan --}}
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mb-0">
                    <i class="fas fa-envelope-open-text mr-2"></i>Pesan dari {{ $contact_message->full_name }}
                </h3>
                <div class="ml-auto">
                    <span class="badge {{ $contact_message->is_read ? 'bg-success' : 'bg-warning' }}">
                        {{ $contact_message->is_read ? 'Sudah Dibaca' : 'Baru' }}
                    </span>
                </div>
            </div>
            <div class="card-body">
                {{-- Nomor Referensi --}}
                <div class="mb-3">
                    <span class="text-muted small">NO. REFERENSI</span><br>
                    <span class="badge badge-dark px-3 py-2" style="font-size: 0.95em;">
                        #{{ $contact_message->reference_number ?? '-' }}
                    </span>
                </div>

                <hr>

                {{-- Isi Pesan --}}
                <div class="p-3 bg-light rounded" style="border-left: 4px solid #007bff;">
                    <p class="mb-0" style="white-space: pre-line; line-height: 1.8; font-size: 0.95rem;">{{ $contact_message->message }}</p>
                </div>
            </div>
            <div class="card-footer text-muted small">
                <i class="fas fa-clock mr-1"></i>
                Dikirim pada {{ $contact_message->created_at->format('d F Y, H:i') }} WIB
                <span class="ml-1">({{ $contact_message->created_at->diffForHumans() }})</span>
            </div>
        </div>

        {{-- Tombol Aksi di bawah pesan --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap" style="gap: 8px;">
                    @if($contact_message->phone)
                        @php
                            $waPhone = preg_replace('/[^0-9]/', '', $contact_message->phone);
                            if (substr($waPhone, 0, 1) == '0') {
                                $waPhone = '62' . substr($waPhone, 1);
                            }
                        @endphp
                        <a href="https://wa.me/{{ $waPhone }}" target="_blank" class="btn btn-success">
                            <i class="fab fa-whatsapp mr-1"></i> Balas via WhatsApp
                        </a>
                    @endif
                    <a href="mailto:{{ $contact_message->email }}" class="btn btn-primary">
                        <i class="fas fa-reply mr-1"></i> Balas via Email
                    </a>
                    <form action="{{ route('admin.contact-messages.toggle-read', $contact_message->id) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="fas fa-{{ $contact_message->is_read ? 'envelope' : 'envelope-open' }} mr-1"></i>
                            {{ $contact_message->is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.contact-messages.destroy', $contact_message->id) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"
                                onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                            <i class="fas fa-trash mr-1"></i> Hapus
                        </button>
                    </form>

                    <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-default ml-auto">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan: Info Pengirim & Kebutuhan --}}
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user mr-2"></i>Informasi Pengirim</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <tr>
                        <td class="font-weight-bold" width="40%">
                            <i class="fas fa-user mr-1 text-muted"></i> Nama
                        </td>
                        <td>{{ $contact_message->full_name }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">
                            <i class="fas fa-building mr-1 text-muted"></i> Perusahaan
                        </td>
                        <td>{{ $contact_message->company_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">
                            <i class="fas fa-envelope mr-1 text-muted"></i> Email
                        </td>
                        <td>
                            <a href="mailto:{{ $contact_message->email }}">{{ $contact_message->email }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">
                            <i class="fas fa-phone mr-1 text-muted"></i> Telepon
                        </td>
                        <td>{{ $contact_message->phone ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-box mr-2"></i>Detail Kebutuhan</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <tr>
                        <td class="font-weight-bold" width="45%">
                            <i class="fas fa-tag mr-1 text-muted"></i> Kategori
                        </td>
                        <td><span class="badge badge-info">{{ $contact_message->product_category }}</span></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">
                            <i class="fas fa-cubes mr-1 text-muted"></i> Estimasi Unit
                        </td>
                        <td><span class="badge badge-secondary">{{ $contact_message->estimated_units }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
