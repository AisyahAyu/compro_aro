@forelse($sidebarPosts as $item)
<div class="row no-gutters mb-4 align-items-start border-bottom pb-4">
    <div class="col-4">
        {{-- UBAH DI SINI: ganti 'detail-aktivitas' menjadi 'detail-aktivitas' --}}
        <a href="{{ route('detail-aktivitas', $item->id) }}">
            <img src="{{ asset('storage/aktivitas/' . $item->gambar) }}" class="img-fluid rounded shadow-sm" style="height: 85px; width: 100%; object-fit: cover;" alt="thumb">
        </a>
    </div>
    <div class="col-8 pl-3">
        {{-- UBAH DI SINI: ganti 'detail-aktivitas' menjadi 'detail-aktivitas' --}}
        <a href="{{ route('detail-aktivitas', $item->id) }}" class="text-dark text-decoration-none">
            <h6 class="font-weight-bold mb-1" style="font-size: 0.95rem; line-height: 1.4;">{{ Str::limit($item->judul, 55) }}</h6>
        </a>

        {{-- Deskripsi Ringkas - Pastikan $item->Deskripsi (huruf besar) sesuai database --}}
        <p class="text-muted mb-2" style="font-size: 0.8rem; line-height: 1.4;">
            {{ Str::limit(strip_tags($item->Deskripsi), 60) }}
        </p>
        <p class="small text-muted mb-0" style="font-size: 0.75rem;">
            {{ $item->created_at->translatedFormat('d M Y') }}
        </p>
    </div>
</div>
@empty
...
@endforelse