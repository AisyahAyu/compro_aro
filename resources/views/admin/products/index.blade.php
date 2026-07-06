@extends('layouts.admin')

@section('title', 'Daftar Produk')
@section('page-title', 'Daftar Produk')
@section('breadcrumb', 'Produk')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Produk</h3>
        <div class="float-right d-flex align-items-center">
            <a href="{{ route('admin.products.download-template') }}" class="btn btn-info btn-sm mr-2">
                <i class="fas fa-download mr-1"></i> Download Template Excel
            </a>
            <button type="button" class="btn btn-success btn-sm mr-2" data-toggle="modal" data-target="#importExcelModal">
                <i class="fas fa-file-excel mr-1"></i> Import Excel
            </button>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                + Tambah Produk
            </a>
        </div>
    </div>

    <div class="card-body">
        @if(session('import_summary'))
            @php
                $summary = session('import_summary');
            @endphp
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info-circle"></i> Hasil Import Excel</h5>
                <p class="mb-1">Berhasil diimpor: <strong>{{ $summary['success'] }}</strong> data.</p>
                <p class="mb-1">Gagal diimpor: <strong>{{ $summary['fail'] }}</strong> data.</p>
                
                @if(count($summary['errors']) > 0)
                    <div class="mt-3" style="max-height: 250px; overflow-y: auto;">
                        <h6><strong>Detail Baris yang Bermasalah:</strong></h6>
                        <table class="table table-sm table-bordered bg-white text-dark mb-0" style="font-size: 13px;">
                            <thead>
                                <tr class="bg-light">
                                    <th width="100">Baris Excel</th>
                                    <th width="150">SKU</th>
                                    <th>Alasan Kegagalan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($summary['errors'] as $err)
                                    <tr>
                                        <td>{{ $err['row'] }}</td>
                                        <td><code>{{ $err['sku'] }}</code></td>
                                        <td>
                                            <ul class="pl-3 mb-0 text-danger">
                                                @foreach($err['errors'] as $msg)
                                                    <li>{{ $msg }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif

        <!-- Search bar -->
        <form method="GET" action="{{ route('admin.products.index') }}" class="mb-4">
            <div class="input-group col-md-4 pl-0">
                <input type="text" name="search" class="form-control" placeholder="Cari nama, tipe, sku, atau merek..." value="{{ $search }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    @if($search)
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-danger">Reset</a>
                    @endif
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th width="100">Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Merek</th>
                    <th>Tipe</th>
                    <th>SKU</th>
                    <th>Asal Negara</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $product)
                <tr>
                    <td>{{ $data->firstItem() + $index }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" width="80" alt="{{ $product->name }}" class="img-thumbnail">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? '-' }}</td>
                    <td>{{ $product->resolved_brand_name }}</td>
                    <td>{{ $product->type ?? '-' }}</td>
                    <td><code>{{ $product->sku ?? '-' }}</code></td>
                    <td>{{ $product->country_of_origin ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" 
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" 
                              method="POST" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Yakin ingin menghapus produk ini?')" 
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">Belum ada data produk</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $data->appends(['search' => $search])->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Import Excel Modal -->
<div class="modal fade" id="importExcelModal" tabindex="-1" role="dialog" aria-labelledby="importExcelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importExcelModalLabel">Import Produk via Excel & Gambar ZIP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="excel_file">Pilih File Excel (.xlsx, .xls) <span class="text-danger">*</span></label>
                        <input type="file" name="file" id="excel_file" class="form-control-file" accept=".xlsx, .xls" required>
                        <small class="text-muted d-block mt-1">
                            Format kolom harus sesuai dengan template. Kategori dan Merek yang baru akan didaftarkan otomatis ke database sistem.
                        </small>
                        <div class="mt-2" style="font-size: 12px; line-height: 1.5; max-height: 150px; overflow-y: auto;">
                            <strong>Kategori saat ini:</strong>
                            @forelse($categories as $c)
                                <span class="badge badge-secondary mr-1 mb-1" style="font-weight: normal; font-size: 11px;">{{ $c->name }}</span>
                            @empty
                                <span class="text-muted">- Belum ada kategori -</span>
                            @endforelse
                            <br/>
                            <strong class="mt-1 d-inline-block">Merek saat ini:</strong>
                            @forelse($brands as $b)
                                <span class="badge badge-secondary mr-1 mb-1" style="font-weight: normal; font-size: 11px;">{{ $b->name }}</span>
                            @empty
                                <span class="text-muted">- Belum ada merek -</span>
                            @endforelse
                        </div>
                    </div>
                    
                    <div class="form-group mt-3">
                        <label for="zip_file">Pilih File ZIP Gambar (.zip) <span class="text-danger">*</span></label>
                        <input type="file" name="zip" id="zip_file" class="form-control-file" accept=".zip" required>
                        <small class="text-muted d-block mt-1">
                            Berisi seluruh gambar produk yang dirujuk di Excel. Nama file gambar di Excel harus sama dengan file di dalam ZIP.
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Mulai Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
