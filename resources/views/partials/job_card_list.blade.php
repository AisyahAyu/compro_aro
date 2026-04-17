<div id="career" class="career-container">
    <div class="section-header d-flex justify-content-between align-items-center mb-4">
        <span class="text-muted small fw-semibold">Posisi yang Tersedia</span>
        <span class="text-muted small fw-semibold">
            Ditemukan {{ method_exists($vacancies, 'total') ? $vacancies->total() : $vacancies->count() }} Lowongan
        </span>
    </div>

    @forelse($vacancies as $job)
    <div class="job-card mb-3">
        <div class="row align-items-center">
            {{-- LEFT: Info Pekerjaan --}}
            <div class="col-12 col-md-8">
                <a href="javascript:void(0)" class="job-name" onclick="toggleJobDetail({{ $job->id }})">
                    {{ $job->name }}
                </a>
                <div class="info-bar">
                    <div class="info-item">
                        <i class="fas fa-briefcase"></i>
                        {{ str_replace('_', ' ', ucwords($job->type)) }}
                    </div>
                    <div class="info-item">
                        <i class="fas fa-chart-line"></i>
                        {{ $job->experience ?? '2-3 Tahun' }}
                    </div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $job->location }}
                    </div>
                </div>
            </div>

            {{-- RIGHT: Tombol Aksi (Pastikan satu baris) --}}
            <div class="col-12 col-md-4 d-flex justify-content-end align-items-center action-group-wrapper">
                <div class="action-group">
                    <a href="javascript:void(0)" 
                       class="btn-detail-outline" 
                       onclick="toggleJobDetail({{ $job->id }})" 
                       id="btn-text-{{ $job->id }}">
                        Detail
                    </a>
                    <button class="btn-lamar-solid" 
                            data-bs-toggle="modal" 
                            data-bs-target="#applyModal" 
                            data-id="{{ $job->id }}" 
                            data-name="{{ $job->name }}">
                        Lamar
                    </button>
                </div>
            </div>
        </div>

        {{-- DETAIL --}}
        <hr class="job-divider d-none" id="divider-{{ $job->id }}">

        <div class="detail-expand-box d-none" id="detail-{{ $job->id }}">
            <div class="mb-17">
                <div class="detail-title">Deskripsi Pekerjaan</div>
                <div class="detail-text">{{ $job->description }}</div>
            </div>

            @if($job->responsibility)
            <div class="mb-12">
                <div class="detail-title">Tanggung Jawab</div>
                <ul class="detail-list ps-4">
                    @foreach(explode("\n", str_replace("\r", "", $job->responsibility)) as $line)
                        @if(trim($line))
                            <li class="mb-1">{{ trim($line) }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif

            @if($job->qualification)
            <div class="mb-4">
                <div class="detail-title">Kualifikasi</div>
                <ul class="detail-list ps-4">
                    @foreach(explode("\n", str_replace("\r", "", $job->qualification)) as $line)
                        @if(trim($line))
                            <li class="mb-1">{{ trim($line) }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif

        </div>

    </div>
    @empty
    <div class="text-center py-5 bg-white rounded border">
        <p class="text-muted">Maaf, lowongan kerja tidak ditemukan.</p>
    </div>
    @endforelse

    {{-- PAGINATION --}}
    @if(method_exists($vacancies, 'links'))
    <div class="custom-pagination-wrapper mt-4">
        {{ $vacancies->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>

