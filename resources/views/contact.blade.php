@extends('layouts.app')

@section('title', 'Hubungi Kami - Company Profile')

@section('content')
<style>
    .contact-page {
        margin-top: 90px;
        background: #efefef;
        padding-bottom: 30px;
    }

    .contact-hero {
        position: relative;
        min-height: 350px;
        background-image: linear-gradient(110deg, rgba(190, 88, 0, 0.72), rgba(118, 47, 0, 0.65)), url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1800&q=80');
        background-size: cover;
        background-position: center;
        color: #fff;
        display: flex;
        align-items: center;
    }

    .contact-hero-content {
        max-width: 600px;
    }

    .contact-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.18);
        border: 1px solid rgba(255, 255, 255, 0.35);
        border-radius: 999px;
        padding: 5px 12px;
        font-size: 0.82rem;
        margin-bottom: 14px;
    }

    .contact-hero h1 {
        font-size: 3rem;
        line-height: 1.15;
        margin-bottom: 14px;
        font-weight: 700;
    }

    .contact-hero h1 .accent {
        color: #ff9f14;
    }

    .contact-hero p {
        max-width: 560px;
        font-size: 1.08rem;
        line-height: 1.55;
        margin: 0;
    }

    .contact-main {
        padding: 44px 0 20px;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 18px;
        align-items: start;
    }

    .contact-form-card {
        background: transparent;
        border-radius: 8px;
    }

    .contact-form-title {
        font-size: 2.1rem;
        margin: 0 0 8px;
        color: #202020;
        font-weight: 700;
    }

    .contact-form-subtitle {
        margin: 0 0 22px;
        color: #5f5f5f;
        font-size: 0.95rem;
    }

    .contact-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px 16px;
    }

    .contact-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .contact-group.full {
        grid-column: span 2;
    }

    .contact-group label {
        font-weight: 700;
        color: #222;
        font-size: 1.04rem;
    }

    .contact-required {
        color: #f78b00;
    }

    .contact-input,
    .contact-select,
    .contact-textarea {
        border: 1px solid #d6d6d6;
        background: #f4f4f4;
        border-radius: 10px;
        min-height: 40px;
        padding: 8px 12px;
        color: #333;
        outline: none;
        font-size: 0.92rem;
    }

    .contact-select {
        appearance: none;
        background-image: linear-gradient(45deg, transparent 50%, #777 50%), linear-gradient(135deg, #777 50%, transparent 50%);
        background-position: calc(100% - 16px) calc(50% - 3px), calc(100% - 10px) calc(50% - 3px);
        background-size: 6px 6px, 6px 6px;
        background-repeat: no-repeat;
    }

    .contact-textarea {
        min-height: 150px;
        resize: vertical;
    }

    .contact-input:focus,
    .contact-select:focus,
    .contact-textarea:focus {
        border-color: #f78b00;
        box-shadow: 0 0 0 3px rgba(247, 139, 0, 0.13);
        background: #fff;
    }

    .contact-submit {
        grid-column: span 2;
        margin-top: 8px;
        border: 0;
        border-radius: 8px;
        background: #f78b00;
        color: #fff;
        font-weight: 700;
        padding: 11px 14px;
        font-size: 1.04rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .contact-submit:hover {
        background: #e67f00;
    }

    .contact-side {
        background: #f78b00;
        border-radius: 8px;
        padding: 16px;
        color: #fff;
    }

    .contact-side h3 {
        margin: 0;
        font-size: 1.45rem;
        font-weight: 700;
    }

    .contact-side p {
        margin: 6px 0 14px;
        color: rgba(255, 255, 255, 0.92);
        font-size: 0.9rem;
    }

    .contact-info-card {
        background: #fff;
        color: #222;
        border-radius: 8px;
        padding: 10px 12px;
        margin-bottom: 10px;
    }

    .contact-info-label {
        font-size: 0.7rem;
        color: #888;
        margin-bottom: 4px;
        letter-spacing: 0.2px;
    }

    .contact-info-row {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        font-size: 0.84rem;
        line-height: 1.4;
    }

    .contact-info-row i {
        color: #f78b00;
        margin-top: 2px;
        font-size: 0.95rem;
    }

    .contact-hours {
        background: #fff;
        border-radius: 8px;
        color: #222;
        padding: 12px;
    }

    .contact-hours h4 {
        margin: 0 0 8px;
        font-size: 1.1rem;
        font-weight: 700;
    }

    .contact-hours ul {
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 0.86rem;
    }

    .contact-hours li {
        display: flex;
        justify-content: space-between;
        margin-bottom: 4px;
    }

    .contact-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.28);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1200;
        padding: 16px;
    }

    .contact-success-modal {
        width: 100%;
        max-width: 440px;
        background: #fff;
        border-radius: 26px;
        padding: 18px 20px 16px;
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.25);
        text-align: center;
    }

    .contact-check {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        margin: 0 auto 10px;
        background: #ffe3cc;
        color: #f78b00;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        font-weight: 700;
    }

    .contact-success-title {
        margin: 0;
        color: #1a1448;
        font-size: 2rem;
        font-weight: 700;
        line-height: 1.2;
    }

    .contact-success-title span {
        color: #f78b00;
    }

    .contact-success-caption {
        margin: 6px 0 14px;
        color: #666;
        font-size: 0.83rem;
    }

    .contact-success-box {
        background: #f4f4f6;
        border-radius: 10px;
        padding: 10px;
        text-align: left;
        margin-bottom: 10px;
        font-size: 0.8rem;
        color: #1b1b1b;
    }

    .contact-success-box .line {
        margin-bottom: 5px;
        display: flex;
        gap: 8px;
    }

    .contact-success-box .line i {
        color: #f78b00;
        margin-top: 2px;
    }

    .contact-divider {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #777;
        font-size: 0.78rem;
        margin: 10px 0;
    }

    .contact-divider::before,
    .contact-divider::after {
        content: '';
        height: 1px;
        flex: 1;
        background: #d9d9d9;
    }

    .contact-modal-primary,
    .contact-modal-secondary {
        display: block;
        width: 100%;
        border-radius: 8px;
        text-decoration: none;
        padding: 9px 12px;
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 8px;
    }

    .contact-modal-primary {
        background: #f78b00;
        color: #fff;
    }

    .contact-modal-secondary {
        border: 1px solid #cfcfd3;
        color: #1d1d1d;
        background: #fff;
    }

    .contact-online {
        margin-top: 4px;
        font-size: 0.76rem;
        color: #6d6d6d;
    }

    .contact-online::before {
        content: '';
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #64d870;
        display: inline-block;
        margin-right: 6px;
        vertical-align: middle;
    }

    .contact-error {
        color: #cc2d2d;
        font-size: 0.78rem;
    }

    @media (max-width: 992px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .contact-form-grid {
            grid-template-columns: 1fr;
        }

        .contact-group.full,
        .contact-submit {
            grid-column: span 1;
        }

        .contact-hero h1 {
            font-size: 2.1rem;
        }
    }
</style>

<div class="contact-page">
    <section class="contact-hero">
        <div class="container">
            <div class="contact-hero-content">
                <div class="contact-pill">
                    <i class="fas fa-id-card"></i>
                    Kontak & Dukungan
                </div>
                <h1>Kami Siap<br>membantu <span class="accent">Anda</span></h1>
                <p>Hubungi tim kami untuk pertanyaan produk, penawaran harga, pengadaan, atau dukungan teknis. Kami merespon dalam waktu kurang dari 2 jam.</p>
            </div>
        </div>
    </section>

    <section class="contact-main">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-form-card">
                    <h2 class="contact-form-title">Kirim Pesan kepada Kami</h2>
                    <p class="contact-form-subtitle">Isi formulir dibawah ini dan tim kami akan segera menghubungi Anda.</p>

                    <form method="POST" action="{{ route('contact.submit') }}" class="contact-form-grid">
                        @csrf

                        <div class="contact-group">
                            <label for="full_name">Nama Lengkap <span class="contact-required">*</span></label>
                            <input id="full_name" type="text" name="full_name" class="contact-input" value="{{ old('full_name') }}" placeholder="Masukkan nama lengkap" required>
                            @error('full_name')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="contact-group">
                            <label for="company_name">Nama Perusahaan</label>
                            <input id="company_name" type="text" name="company_name" class="contact-input" value="{{ old('company_name') }}" placeholder="Masukkan nama perusahaan">
                            @error('company_name')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="contact-group">
                            <label for="email">Email <span class="contact-required">*</span></label>
                            <input id="email" type="email" name="email" class="contact-input" value="{{ old('email') }}" placeholder="Masukkan alamat email" required>
                            @error('email')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="contact-group">
                            <label for="phone">No. Telepon / WhatsApp</label>
                            <input id="phone" type="text" name="phone" class="contact-input" value="{{ old('phone') }}" placeholder="Masukkan nomor telepon atau WhatsApp" required>
                            @error('phone')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="contact-group">
                            <label for="product_category">Kategori Produk <span class="contact-required">*</span></label>
                            <select id="product_category" name="product_category" class="contact-select" required>
                                <option value="" disabled selected>Pilih kategori produk</option>
                                @php $selectedCategory = old('product_category', 'Furniture Kantor'); @endphp
                                <option value="Furniture Kantor" {{ $selectedCategory === 'Furniture Kantor' ? 'selected' : '' }}>Furniture Kantor</option>
                                <option value="Furniture Pendidikan" {{ $selectedCategory === 'Furniture Pendidikan' ? 'selected' : '' }}>Furniture Pendidikan</option>
                                <option value="Peralatan Dapur" {{ $selectedCategory === 'Peralatan Dapur' ? 'selected' : '' }}>Peralatan Dapur</option>
                                <option value="Mesin dan Perkakas" {{ $selectedCategory === 'Mesin dan Perkakas' ? 'selected' : '' }}>Mesin dan Perkakas</option>
                            </select>
                            @error('product_category')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="contact-group">
                            <label for="estimated_units">Estimasi Jumlah Unit</label>
                            <select id="estimated_units" name="estimated_units" class="contact-select" required>
                                <option value="" disabled selected>Pilih estimasi jumlah unit</option>
                                @php $selectedUnits = old('estimated_units', '1 - 10 Unit'); @endphp
                                <option value="1 - 10 Unit" {{ $selectedUnits === '1 - 10 Unit' ? 'selected' : '' }}>1 - 10 Unit</option>
                                <option value="11 - 50 Unit" {{ $selectedUnits === '11 - 50 Unit' ? 'selected' : '' }}>11 - 50 Unit</option>
                                <option value="> 50 Unit" {{ $selectedUnits === '> 50 Unit' ? 'selected' : '' }}>&gt; 50 Unit</option>
                            </select>
                            @error('estimated_units')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="contact-group full">
                            <label for="message">Pesan <span class="contact-required">*</span></label>
                            <textarea id="message" name="message" class="contact-textarea" placeholder="Masukkan kebutuhan atau pertanyaan Anda" required>{{ old('message') }}</textarea>
                            @error('message')<span class="contact-error">{{ $message }}</span>@enderror
                        </div>

                        <button type="submit" class="contact-submit">
                            <i class="fas fa-paper-plane"></i>
                            Kirim Pesan Sekarang
                        </button>
                    </form>
                </div>

                <aside class="contact-side">
                    <h3>Informasi Kontak</h3>
                    <p>Pilih cara terbaik untuk menghubungi kami</p>

                    <div class="contact-info-card">
                        <div class="contact-info-label">TELEPON</div>
                        <div class="contact-info-row"><i class="fas fa-phone-alt"></i><div><strong>{{ $companyProfile->phone ?? '(021) 38835187' }}</strong><br>{{ $companyProfile->phone_desc ?? 'Senin-Jumat, 08.00-17.00' }}</div></div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-info-label">EMAIL</div>
                        <div class="contact-info-row"><i class="fas fa-envelope"></i><div><strong>{{ $companyProfile->email ?? 'demo@gmail.com' }}</strong><br>{{ $companyProfile->email_desc ?? 'Untuk penawaran & dokumen resmi' }}</div></div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-info-label">WHATSAPP</div>
                        <div class="contact-info-row"><i class="fab fa-whatsapp"></i><div><strong>{{ $companyProfile->whatsapp ?? '+62 822-8888-6009' }}</strong><br>{{ $companyProfile->whatsapp_desc ?? 'Respon cepat dalam 2 jam' }}</div></div>
                    </div>

                    <div class="contact-info-card">
                        <div class="contact-info-label">ALAMAT KANTOR</div>
                        <div class="contact-info-row"><i class="fas fa-map-marker-alt"></i><div>{{ $companyProfile->address ?? 'Jl. TM. Slamet Riyadi Raya No. 9 RT.1 RW.4 Kb. Manggis, Kec. Matraman, Daerah Khusus Ibukota Jakarta 13150' }}</div></div>
                    </div>

                    <div class="contact-hours">
                        <h4>Jam Operasional</h4>
                        <ul>
                            @if($companyProfile && $companyProfile->operational_hours)
                                @php
                                    $lines = explode("\n", str_replace("\r", "", trim($companyProfile->operational_hours)));
                                @endphp
                                @for($i = 0; $i < count($lines); $i+=2)
                                    <li>
                                        <span>{{ $lines[$i] ?? '' }}</span>
                                        <strong>{{ $lines[$i+1] ?? '' }}</strong>
                                    </li>
                                @endfor
                            @else
                                <li><span>Senin-Jumat</span><strong>08.00 - 17.00</strong></li>
                                <li><span>Sabtu</span><strong>08.00 - 12.00</strong></li>
                                <li><span>Minggu & Hari Libur</span><strong>Tutup</strong></li>
                            @endif
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    @if(session('contact_success'))
        <div class="contact-overlay" id="contactOverlay">
            <div class="contact-success-modal">
                <div class="contact-check"><i class="fas fa-check"></i></div>
                <h3 class="contact-success-title">Pesan Anda<br><span>Berhasil Terkirim !</span></h3>
                <p class="contact-success-caption">Tim kami akan segera menghubungi Anda.<br>Estimasi respons dalam kurang dari 2 jam di hari kerja.</p>

                <div class="contact-success-box">
                    <div class="line"><i class="fas fa-envelope"></i><div>KONFIRMASI DIKIRIM KE<br><strong>{{ data_get(session('contact_payload'), 'email', '-') }}</strong></div></div>
                    <div class="line"><i class="fas fa-map-marker-alt"></i><div>NO.REFERENSI<br><strong>#{{ session('contact_reference', 'ABE-0000-00-0000') }}</strong></div></div>
                    <div class="line"><i class="fab fa-whatsapp"></i><div>HUBUNGI LANGSUNG VIA WHATSAPP<br><strong>{{ $companyProfile->whatsapp ?? '+62 822-8888-6009' }}</strong></div></div>
                </div>

                <div class="contact-divider">ATAU</div>
                <a href="{{ route('home') }}" class="contact-modal-primary"><i class="fas fa-home me-1"></i> Kembali ke Beranda</a>
                <a href="{{ route('products.page') }}" class="contact-modal-secondary">Lihat Produk Lainnya</a>
                <div class="contact-online">Tim kami online Senin–Jumat, 08.00–17.00</div>
            </div>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.querySelector('.transparent-navbar');
        if (navbar) {
            navbar.classList.add('scrolled');
        }

        const overlay = document.getElementById('contactOverlay');
        if (overlay) {
            overlay.addEventListener('click', function (event) {
                if (event.target === overlay) {
                    overlay.remove();
                }
            });
        }
    });
</script>
@endsection
