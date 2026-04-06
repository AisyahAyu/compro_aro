@extends('layouts.app')

@section('title', 'FAQ - Company Profile')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    .faq-page {
        margin-top: 90px;
        background: #f5f5f7;
        padding: 60px 0 50px;
        min-height: 70vh;
        font-family: 'Poppins', Arial, sans-serif;
    }

    /* Hero header */
    .faq-hero {
        text-align: center;
        margin-bottom: 40px;
    }

    .faq-badge {
        display: inline-block;
        background: rgba(247, 139, 0, 0.12);
        color: #f78b00;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 999px;
        margin-bottom: 14px;
    }

    .faq-title {
        color: #1a1a2e;
        font-weight: 700;
        font-size: 2.4rem;
        line-height: 1.2;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }

    .faq-title span {
        color: #f78b00;
    }

    .faq-subtitle {
        color: #6b7280;
        font-size: 1rem;
        max-width: 520px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Search */
    .faq-search-wrap {
        max-width: 600px;
        margin: 0 auto 48px;
    }

    .faq-search {
        display: flex;
        background: #fff;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .faq-search:focus-within {
        border-color: #f78b00;
        box-shadow: 0 0 0 4px rgba(247, 139, 0, 0.1);
    }

    .faq-input-wrap {
        position: relative;
        flex: 1;
    }

    .faq-input-wrap i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 0.9rem;
    }

    .faq-search input {
        width: 100%;
        border:
 none;
        outline: none;
        background: transparent;
        padding: 13px 16px 13px 42px;
        font-size: 0.95rem;
        font-family: 'Poppins', Arial, sans-serif;
        color: #1a1a2e;
    }

    .faq-search input::placeholder {
        color: #9ca3af;
    }

    .faq-search button {
        border: none;
        background: #f78b00;
        color: #fff;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 0 24px;
        cursor: pointer;
        font-family: 'Poppins', Arial, sans-serif;
        transition: background 0.2s;
        white-space: nowrap;
    }

    .faq-search button:hover {
        background: #e07a00;
    }

    /* Accordion */
    .faq-list-wrap {
        max-width: 780px;
        margin: 0 auto;
    }

    .faq-item {
        background: #fff;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        margin-bottom: 10px;
        overflow: hidden;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .faq-item:hover {
        border-color: #f78b00;
        box-shadow: 0 4px 16px rgba(247, 139, 0, 0.08);
    }

    .faq-item.active {
        border-color: #f78b00;
        box-shadow: 0 4px 20px rgba(247, 139, 0, 0.1);
    }

    .faq-question-btn {
        width: 100%;
        border: none;
        background: transparent;
        display: flex;
        align-items: center;
        gap: 14px;
        text-align: left;
        padding: 18px 20px;
        cursor: pointer;
    }

    .faq-num {
        flex-shrink: 0;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #fff7ed;
        color: #f78b00;
        font-size: 0.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s, color 0.2s;
    }

    .faq-item.active .faq-num {
        background: #f78b00;
        color: #fff;
    }

    .faq-question-text {
        flex: 1;
        color: #1a1a2e;
        font-weight: 600;
        font-size: 0.97rem;
        line-height: 1.4;
    }

    .faq-chevron {
        flex-shrink: 0;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: 1.5px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        font-size: 0.75rem;
        transition: transform 0.25s, border-color 0.2s, color 0.2s, background 0.2s;
    }

    .faq-item.active .faq-chevron {
        transform: rotate(180deg);
        border-color: #f78b00;
        color: #f78b00;
        background: #fff7ed;
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transition: max-height 0.3s ease, opacity 0.25s ease, padding 0.25s ease;
        padding: 0 20px 0 66px;
        color: #6b7280;
        font-size: 0.93rem;
        line-height: 1.7;
    }

    .faq-item.active .faq-answer {
        max-height: 300px;
        opacity: 1;
        padding: 0 20px 18px 66px;
    }

    /* Divider inside item */
    .faq-item.active .faq-question-btn {
        border-bottom: 1px solid #fde8c8;
    }

    /* Empty state */
    .faq-empty {
        background: #fff;
        border: 1.5px dashed #e5e7eb;
        border-radius: 12px;
        padding: 40px 20px;
        text-align: center;
        color: #9ca3af;
        font-size: 0.95rem;
    }

    .faq-empty i {
        font-size: 2rem;
        margin-bottom: 10px;
        display: block;
        color: #d1d5db;
    }

    /* CTA */
    .faq-cta {
        max-width: 780px;
        margin: 40px auto 0;
        background: linear-gradient(135deg, #1a1a2e 0%, #2d2d5e 100%);
        border-radius: 16px;
        padding: 40px 48px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
    }

    .faq-cta-body {
        flex: 1;
    }

    .faq-cta-title {
        margin: 0 0 6px;
        font-size: 1.25rem;
        font-weight: 700;
        color: #fff;
        line-height: 1.3;
    }

    .faq-cta-text {
        margin: 0;
        font-size: 0.9rem;
        color: rgba(255,255,255,0.65);
        line-height: 1.5;
    }

    .faq-cta-btn {
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #f78b00;
        color: #fff;
        text-decoration: none;
        border-radius: 10px;
        padding: 13px 28px;
        font-size: 0.92rem;
        font-weight: 600;
        font-family: 'Poppins', Arial, sans-serif;
        transition: background 0.2s, transform 0.2s;
        white-space: nowrap;
    }

    .faq-cta-btn:hover {
        background: #e07a00;
        color: #fff;
        transform: translateY(-1px);
    }

    /* Animations */
    @keyframes faqFadeUp {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .faq-hero    { animation: faqFadeUp 0.45s ease both; }
    .faq-search-wrap { animation: faqFadeUp 0.45s ease 0.08s both; }
    .faq-list-wrap   { animation: faqFadeUp 0.45s ease 0.16s both; }
    .faq-cta         { animation: faqFadeUp 0.45s ease 0.24s both; }

    /* Responsive */
    @media (max-width: 767px) {
        .faq-page { padding: 40px 0 36px; }
        .faq-title { font-size: 1.7rem; }
        .faq-cta {
            flex-direction: column;
            text-align: center;
            padding: 28px 24px;
        }
        .faq-answer,
        .faq-item.active .faq-answer {
            padding-left: 20px;
        }
    }
</style>

<div class="faq-page">
    <div class="container">

        {{-- Hero --}}
        <div class="faq-hero">
            <span class="faq-badge">FAQ</span>
            <h1 class="faq-title">Ada yang ingin kamu <span>tanyakan?</span></h1>
            <p class="faq-subtitle">Temukan jawaban atas pertanyaan yang sering diajukan mengenai layanan dan produk kami.</p>
        </div>

        {{-- Search --}}
        <div class="faq-search-wrap">
            <form class="faq-search" method="GET" action="{{ route('faq.page') }}">
                <div class="faq-input-wrap">
                    <i class="fas fa-search"></i>
                    <input type="text" name="q" value="{{ $searchKeyword }}" placeholder="Cari pertanyaan...">
                </div>
                <button type="submit">Cari</button>
            </form>
        </div>

        {{-- Accordion --}}
        <div class="faq-list-wrap">
            @forelse($faqs as $index => $faq)
                <article class="faq-item {{ $index === 0 ? 'active' : '' }}">
                    <button type="button" class="faq-question-btn" data-faq-toggle>
                        <span class="faq-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="faq-question-text">{{ $faq['question'] }}</span>
                        <span class="faq-chevron"><i class="fas fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-answer">{{ $faq['answer'] }}</div>
                </article>
            @empty
                <div class="faq-empty">
                    <i class="fas fa-search"></i>
                    Pertanyaan tidak ditemukan. Coba kata kunci lain.
                </div>
            @endforelse
        </div>

        {{-- CTA --}}
        <section class="faq-cta">
            <div class="faq-cta-body">
                <h2 class="faq-cta-title">Masih punya pertanyaan?</h2>
                <p class="faq-cta-text">Tim kami siap membantu kamu mendapatkan informasi lebih lanjut.</p>
            </div>
            <a href="{{ route('contact.page') }}" class="faq-cta-btn">
                Hubungi Kami <i class="fas fa-arrow-right"></i>
            </a>
        </section>

    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.querySelector('.transparent-navbar');
        if (navbar) navbar.classList.add('scrolled');

        document.querySelectorAll('.faq-item').forEach(function (item) {
            const trigger = item.querySelector('[data-faq-toggle]');
            if (!trigger) return;

            trigger.addEventListener('click', function () {
                const isActive = item.classList.contains('active');
                document.querySelectorAll('.faq-item').forEach(function (el) {
                    el.classList.remove('active');
                });
                if (!isActive) item.classList.add('active');
            });
        });
    });
</script>
@endsection
