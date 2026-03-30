@extends('layouts.app')

@section('title', 'FAQ - Company Profile')

@section('content')
<style>
    .faq-page {
        margin-top: 90px;
        background: #f1f1f1;
        padding: 56px 0 34px;
        min-height: 70vh;
        overflow: hidden;
    }

    .faq-title {
        text-align: center;
        color: #f78b00;
        font-weight: 500;
        font-size: 2.6rem;
        line-height: 1.25;
        margin-bottom: 22px;
        animation: faqFadeUp 0.5s ease both;
    }

    .faq-subtitle {
        text-align: center;
        color: #4f4f4f;
        font-size: 1.15rem;
        margin-bottom: 24px;
        animation: faqFadeUp 0.5s ease 0.08s both;
    }

    .faq-search {
        max-width: 760px;
        margin: 0 auto 40px;
        display: grid;
        grid-template-columns: 1fr 110px;
        gap: 12px;
        animation: faqFadeUp 0.5s ease 0.16s both;
    }

    .faq-input-wrap {
        position: relative;
    }

    .faq-input-wrap i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #a3a3a3;
    }

    .faq-search input {
        width: 100%;
        border: 1px solid #d5d5d5;
        border-radius: 999px;
        padding: 11px 16px 11px 42px;
        outline: none;
        background: #fff;
        font-size: 0.96rem;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .faq-search input:focus {
        border-color: #f78b00;
        box-shadow: 0 0 0 3px rgba(247, 139, 0, 0.12);
    }

    .faq-search button {
        border: 0;
        border-radius: 999px;
        background: #f78b00;
        color: #fff;
        font-weight: 600;
        transition: transform 0.2s ease, background 0.2s ease;
    }

    .faq-search button:hover {
        background: #e67f00;
        transform: translateY(-1px);
    }

    .faq-list-wrap {
        position: relative;
        max-width: 1020px;
        margin: 0 auto;
        padding-right: 0;
        animation: faqFadeUp 0.55s ease 0.24s both;
    }

    .faq-list-wrap.is-empty {
        min-height: 120px;
    }

    .faq-list-wrap::before,
    .faq-list-wrap::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-radius: 42% 58% 56% 44% / 44% 36% 64% 56%;
        pointer-events: none;
        z-index: 0;
    }

    .faq-list-wrap::before {
        width: 310px;
        height: 310px;
        background: #ff6400;
        box-shadow: inset -10px -8px 0 rgba(255, 255, 255, 0.2);
        opacity: 0.94;
        animation: faqFloat 5.4s ease-in-out infinite, faqPulse 4.2s ease-in-out infinite;
    }

    .faq-list-wrap::after {
        content: '?';
        width: 310px;
        height: 310px;
        color: #fff;
        font-weight: 700;
        font-size: 9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        text-shadow: 0 2px 0 rgba(255, 255, 255, 0.15);
        animation: faqFloat 5.4s ease-in-out infinite;
    }

    .faq-list-wrap.is-empty::before,
    .faq-list-wrap.is-empty::after {
        display: none;
    }

    .faq-list {
        width: 100%;
        position: relative;
        z-index: 2;
    }

    .faq-item {
        background: #fff;
        border: 1px solid #e2e2e2;
        border-radius: 6px;
        margin-bottom: 12px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.04);
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        position: relative;
        z-index: 2;
    }

    .faq-item:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.06);
    }

    .faq-question-btn {
        width: 100%;
        border: 0;
        background: #fff;
        display: grid;
        grid-template-columns: 34px 1fr 30px;
        align-items: center;
        gap: 12px;
        text-align: left;
        padding: 11px 14px;
    }

    .faq-plus-left {
        font-size: 1.9rem;
        color: #f97800;
        line-height: 1;
        font-weight: 300;
        text-align: center;
    }

    .faq-question-text {
        color: #262648;
        font-weight: 700;
        font-size: 1.02rem;
        line-height: 1.35;
    }

    .faq-plus-right {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #f97800;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.05rem;
        font-weight: 700;
        transition: transform 0.2s ease;
    }

    .faq-item.active .faq-plus-right {
        transform: rotate(45deg);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        padding: 0 60px;
        color: #666;
        font-size: 0.96rem;
        line-height: 1.55;
        opacity: 0;
        transition: max-height 0.28s ease, opacity 0.22s ease, padding 0.22s ease;
    }

    .faq-item.active .faq-answer {
        max-height: 220px;
        opacity: 1;
        padding: 0 60px 16px;
    }

    .faq-cta {
        margin-top: 34px;
        background: linear-gradient(90deg, #e8df4a 0%, #ff8500 100%);
        border-radius: 8px;
        padding: 26px 34px;
        animation: faqFadeUp 0.55s ease 0.34s both;
    }

    .faq-cta-title {
        margin: 0 0 8px;
        font-size: 2.95rem;
        font-weight: 500;
        color: #2f2300;
    }

    .faq-cta-text {
        margin: 0 0 18px;
        font-size: 2.25rem;
        color: #2f2300;
        font-weight: 500;
    }

    .faq-cta-btn {
        display: inline-block;
        background: #0a0055;
        color: #fff;
        text-decoration: none;
        border-radius: 999px;
        padding: 12px 34px;
        font-size: 1.9rem;
        font-weight: 600;
        transition: transform 0.2s ease;
    }

    .faq-cta-btn:hover {
        color: #fff;
        transform: translateY(-1px);
    }

    .faq-empty {
        background: #fff;
        border: 1px solid #e2e2e2;
        border-radius: 8px;
        padding: 20px 18px;
        text-align: center;
        color: #666;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.04);
        position: relative;
        z-index: 2;
    }

    @keyframes faqFadeUp {
        from {
            opacity: 0;
            transform: translateY(16px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes faqFloat {
        0%, 100% {
            transform: translate(-50%, -50%) translate(0, 0) rotate(0deg);
        }
        50% {
            transform: translate(-50%, -50%) translate(-6px, 6px) rotate(-2deg);
        }
    }

    @keyframes faqPulse {
        0%,
        100% {
            box-shadow: inset -10px -8px 0 rgba(255, 255, 255, 0.2), 0 0 0 0 rgba(255, 100, 0, 0.05);
        }
        50% {
            box-shadow: inset -12px -10px 0 rgba(255, 255, 255, 0.24), 0 0 0 10px rgba(255, 100, 0, 0.02);
        }
    }

    @media (max-width: 992px) {
        .faq-list-wrap {
            padding-right: 0;
        }

        .faq-list-wrap::before {
            width: 220px;
            height: 220px;
            opacity: 0.9;
        }

        .faq-list-wrap::after {
            width: 220px;
            height: 220px;
            font-size: 6.2rem;
        }

        .faq-title {
            font-size: 2rem;
        }

        .faq-subtitle {
            font-size: 1.1rem;
        }

        .faq-cta-title,
        .faq-cta-text {
            font-size: 1.6rem;
        }

        .faq-cta-btn {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 640px) {
        .faq-list-wrap::before {
            width: 150px;
            height: 150px;
            opacity: 0.78;
        }

        .faq-list-wrap::after {
            width: 150px;
            height: 150px;
            font-size: 4.2rem;
        }

        .faq-search {
            grid-template-columns: 1fr;
        }

        .faq-answer {
            padding: 0 14px 14px 56px;
        }

        .faq-item.active .faq-answer {
            padding: 0 14px 14px 56px;
        }

        .faq-cta {
            padding: 20px;
        }
    }
</style>

<div class="faq-page">
    <div class="container">
        <h1 class="faq-title">Frequently Asked<br>Questions</h1>
        <p class="faq-subtitle">Temukan jawaban atas pertanyaan yang sering diajukan mengenai layanan dan produk kami</p>

        <form class="faq-search" method="GET" action="{{ route('faq.page') }}">
            <div class="faq-input-wrap">
                <i class="fas fa-search"></i>
                <input type="text" name="q" value="{{ $searchKeyword }}" placeholder="Cari Pertanyaan">
            </div>
            <button type="submit">Cari</button>
        </form>

        <div class="faq-list-wrap {{ count($faqs) === 0 ? 'is-empty' : '' }}">
            <div class="faq-list" id="faqAccordion">
                @forelse($faqs as $index => $faq)
                    <article class="faq-item {{ $index === 0 ? 'active' : '' }}">
                        <button type="button" class="faq-question-btn" data-faq-toggle>
                            <span class="faq-plus-left">+</span>
                            <span class="faq-question-text">{{ $faq['question'] }}</span>
                            <span class="faq-plus-right">+</span>
                        </button>
                        <div class="faq-answer">{{ $faq['answer'] }}</div>
                    </article>
                @empty
                    <div class="faq-empty">Pertanyaan tidak ditemukan. Coba kata kunci lain.</div>
                @endforelse
            </div>
        </div>

        <section class="faq-cta">
            <h2 class="faq-cta-title">Masih Memiliki Pertanyaan ?</h2>
            <p class="faq-cta-text">Silahkan hubungi Tim kami untuk mendapatkan informasi lebih lanjut</p>
            <a href="#hubungi" class="faq-cta-btn">Hubungi Kami</a>
        </section>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.querySelector('.transparent-navbar');
        if (navbar) {
            navbar.classList.add('scrolled');
        }

        const items = document.querySelectorAll('.faq-item');
        items.forEach(function (item) {
            const trigger = item.querySelector('[data-faq-toggle]');
            if (!trigger) {
                return;
            }

            trigger.addEventListener('click', function () {
                const isActive = item.classList.contains('active');
                items.forEach(function (faqItem) {
                    faqItem.classList.remove('active');
                });

                if (!isActive) {
                    item.classList.add('active');
                }
            });
        });
    });
</script>
@endsection
