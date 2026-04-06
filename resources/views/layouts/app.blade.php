<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Company Profile')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-orange: #FE9800;
            --primary-blue: #050052;
            --light-yellow: #FFDE9B;
            --dark-blue: #0B042E;
            --text-gray: #6c757d;
        }
        
        /* Add padding to body to account for fixed navbar */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        /* Navbar Transparan */
        .transparent-navbar {
            background: transparent !important;
            backdrop-filter: none;
            transition: all 0.3s ease;
            box-shadow: none !important;
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1040;
            width: 100%;
            padding: 1rem 0;
            min-height: 80px;
        }
        
        .transparent-navbar.scrolled {
            background: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
            backdrop-filter: blur(10px);
        }
        
        /* Warna teks dan link saat transparan */
        .transparent-navbar .navbar-brand,
        .transparent-navbar .navbar-nav .nav-link {
            color: white !important;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }
        
        .transparent-navbar .navbar-brand:hover,
        .transparent-navbar .navbar-nav .nav-link:hover {
            color: var(--primary-orange) !important;
        }
        
        /* Warna teks dan link saat di-scroll */
        .transparent-navbar.scrolled .navbar-brand,
        .transparent-navbar.scrolled .navbar-nav .nav-link {
            color: var(--primary-blue) !important;
            text-shadow: none;
        }
        
        .transparent-navbar.scrolled .navbar-brand:hover,
        .transparent-navbar.scrolled .navbar-nav .nav-link:hover {
            color: var(--primary-orange) !important;
        }
        
        /* Tombol Hubungi Kami saat transparan */
        .transparent-navbar .btn-contact {
            background: #FE9800 !important;
            color: white !important;
            border: none !important;
            border-radius: 25px !important;
            padding: 8px 20px !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
            text-decoration: none !important;
            display: inline-block !important;
            cursor: pointer !important;
            margin-left: 8px !important;
            white-space: nowrap !important;
        }
        
        .transparent-navbar .btn-contact:hover {
            background: #e68900 !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(254, 152, 0, 0.3);
            color: white !important;
        }
        
        /* Tombol Hubungi Kami saat di-scroll */
        .transparent-navbar.scrolled .btn-contact {
            background: var(--primary-orange) !important;
            color: white !important;
            border: none !important;
        }
        
        .transparent-navbar.scrolled .btn-contact:hover {
            background: #e68900 !important;
            color: white !important;
        }
        
        /* Logo dan Branding */
        
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: var(--primary-orange) !important;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand:hover {
            color: var(--primary-blue) !important;
        }
        
        .navbar-brand img {
            height: 60px;
            object-fit: contain;
            margin-right: 10px;
        }
        
        .navbar-collapse {
            align-items: center;
            justify-content: flex-end !important;
            margin-left: 60px !important;
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                margin-left: 0 !important;
                justify-content: flex-start !important;
                background: #fff;
                box-shadow: 0 2px 10px rgba(0,0,0,0.08);
                padding: 1rem 0.5rem;
                /* Hapus display agar Bootstrap bisa collapse/expand */
                /* display: flex !important; */
            }
            .navbar-nav {
                flex-direction: column !important;
                align-items: flex-start !important;
                width: 100% !important;
            }
            .navbar-nav .nav-item {
                margin: 0.5rem 0 !important;
            }
            .navbar-nav .nav-link {
                font-size: 1.1rem;
                padding: 0.6rem 0.5rem !important;
            }
            .btn-contact {
                width: 100%;
                margin: 1rem 0 0 0 !important;
                text-align: center;
            }
        }
        }
        
        .navbar-nav {
            list-style: none;
            margin: 0 !important;
            padding: 0 !important;
            align-items: center !important;
            justify-content: flex-end !important;
            width: 100% !important;
        }
        
        .navbar-nav .nav-item {
            margin: 0 10px !important; /* Menambah jarak antar menu item */
        }
        
        .navbar-nav .nav-item:last-child {
            margin-right: 0 !important;
        }
        
        .navbar-nav.mx-auto {
            margin: 0 !important;
        }
        
        .navbar-nav .nav-link {
            color: var(--primary-blue) !important;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 0.5rem 0 !important;
            font-size: 1rem;
            text-decoration: none;
            display: block;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--primary-orange) !important;
        }
        
        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
            background: none;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%285, 0, 82, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 24px;
            height: 24px;
        }
        
        /* Hide hamburger menu on desktop - more aggressive */
        @media (min-width: 992px) {
            .navbar-toggler {
                display: none !important;
                visibility: hidden !important;
                opacity: 0 !important;
                width: 0 !important;
                height: 0 !important;
                overflow: hidden !important;
            }
        }
        
        /* Show hamburger menu only on mobile */
        @media (max-width: 991.98px) {
            .navbar-toggler {
                display: block !important;
                visibility: visible !important;
                opacity: 1 !important;
                width: auto !important;
                height: auto !important;
                overflow: visible !important;
            }
            
            .navbar-collapse .d-flex {
                flex-direction: column;
                align-items: center;
            }
            
            .navbar-nav {
                flex-direction: column;
                text-align: center;
                margin: 1rem 0;
            }
            
            .navbar-nav .nav-item {
                margin: 0.5rem 0;
            }
            
            .btn-contact {
                margin: 1rem 0 0 0;
            }
        }
        
        .btn-contact {
            background: #FE9800 !important;
            color: white !important;
            border-radius: 10px !important;
            padding: 8px 20px !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
            text-decoration: none !important;
            display: inline-block !important;
            border: none !important;
            cursor: pointer !important;
            margin-left: 8px !important;
            white-space: nowrap !important;
        }
        
        .btn-contact:hover {
            background: #e68900;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(254, 152, 0, 0.3);
            color: white;
        }
        
        /* Ensure navbar is visible */
        /*  */
        .navbar, .navbar * {
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        .navbar .navbar-nav {
            /* display: flex !important; */
        }
        
        .navbar .navbar-nav .nav-item {
            display: block !important;
        }
        
        .navbar .navbar-nav .nav-link {
            display: block !important;
        }
        
        .navbar .navbar-toggler {
            display: block !important;
        }
        
        .btn-contact:hover {
            background: #e68900;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(254, 152, 0, 0.3);
        }
        
        /* URL Styling */
        .url-link {
            color: var(--primary-blue) !important;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .url-link:hover {
            color: var(--primary-orange) !important;
            text-decoration: none;
        }
        
        .url-link .url-icon {
            font-size: 0.8em;
            opacity: 0.7;
        }
        
        .url-text {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        /* Clean URL display */
        .clean-url {
            background: rgba(5, 0, 82, 0.05);
            border: 1px solid rgba(5, 0, 82, 0.1);
            border-radius: 15px;
            padding: 4px 12px;
            font-size: 0.85rem;
            color: var(--primary-blue);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .clean-url:hover {
            background: rgba(254, 152, 0, 0.1);
            border-color: var(--primary-orange);
            color: var(--primary-orange);
            text-decoration: none;
            transform: translateY(-1px);
        }
        
        .clean-url .url-icon {
            font-size: 0.9em;
        }
        
        /* Remove https://www. from display */
        .clean-url-text {
            font-weight: 500;
        }
        
        .hero-slider {
            position: relative;
            height: 700px;
            overflow: hidden;
            top: 0;
            width: 100%;
            z-index: 1;
        }
        
        .hero-slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .hero-slide.active {
            opacity: 1;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            z-index: 2;
        }
        
        .hero-content-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 3;
            display: flex;
            align-items: center;
        }
        
        .hero-content {
            max-width: 500px;
            color: white;
            text-align: left;
        }
        
        .hero-title {
            font-size: 2.8rem;
            font-weight: bold;
            margin-bottom: 20px;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.7);
        }
        
        .hero-description {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 30px;
            color: white;
            text-shadow: 0 1px 2px rgba(0,0,0,0.7);
        }
        
        .hero-button {
            display: inline-block;
            padding: 12px 30px;
            border: 2px solid white;
            background: transparent;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-shadow: 0 1px 2px rgba(0,0,0,0.7);
        }
        
        .hero-button:hover {
            background: var(--primary-orange);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            text-decoration: none;
        }
        
        .slider-dots {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }
        
        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dot.active {
            background: var(--primary-orange);
            transform: scale(1.2);
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 1rem;
        }
        
        .category-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .category-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .legality-section {
            background: var(--light-yellow);
        }
        
        .legality-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            height: 100%;
            transition: all 0.3s ease;
        }
        
        .legality-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .legality-card .icon {
            font-size: 3rem;
            color: var(--primary-orange);
            margin-bottom: 20px;
        }
        
        .legality-card .divider {
            width: 50px;
            height: 3px;
            background: var(--primary-orange);
            margin: 15px auto;
        }
        
        .process-timeline {
            position: relative;
            padding: 20px 0;
        }
        
        .process-item {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            position: relative;
        }
        
        .process-number {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary-orange);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            flex-shrink: 0;
            z-index: 2;
        }
        
        .process-content {
            margin-left: 30px;
            flex: 1;
        }
        
        .process-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }
        
        .process-description {
            color: var(--text-gray);
            line-height: 1.6;
        }

        /* Horizontal Process Timeline */
        .process-timeline-horizontal {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: relative;
            padding: 40px 0;
            overflow-x: auto;
        }

        .process-step-horizontal {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            flex: 1;
            min-width: 200px;
            max-width: 240px;
        }

        .process-number-horizontal {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #160C4B;
            border: 3px solid #FE9800;
            color: #FE9800;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.3rem;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
            box-shadow: 0 4px 15px rgba(254, 152, 0, 0.3);
            transition: all 0.3s ease;
        }

        .process-step-horizontal:hover .process-number-horizontal {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(254, 152, 0, 0.4);
        }

        .process-content-horizontal {
            flex: 1;
        }

        .process-title-horizontal {
            font-size: 1.1rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .process-description-horizontal {
            color: var(--text-gray);
            font-size: 0.9rem;
            line-height: 1.5;
            margin: 0;
        }

        .process-connector {
            position: absolute;
            top: 30px;
            left: 50%;
            width: calc(100% - 60px);
            height: 3px;
            background: var(--primary-orange);
            z-index: 1;
            opacity: 0.7;
        }

        .process-step-horizontal:last-child .process-connector {
            display: none;
        }

        /* Responsive adjustments for horizontal timeline */
        @media (max-width: 991px) {
            .process-timeline-horizontal {
                flex-wrap: wrap;
                justify-content: center;
                gap: 30px;
            }
            
            .process-step-horizontal {
                flex: 0 0 calc(50% - 15px);
                max-width: calc(50% - 15px);
            }
            
            .process-connector {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .process-step-horizontal {
                flex: 0 0 100%;
                max-width: 100%;
            }
            
            .process-timeline-horizontal {
                gap: 20px;
            }
        }
        
        .partner-logo {
            background: white;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 120px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .partner-logo:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .partner-logo img {
            max-width: 100%;
            max-height: 80px;
            object-fit: contain;
        }
        
        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-name {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }
        
        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .product-location {
            color: var(--text-gray);
            font-size: 0.9rem;
        }
        
        .product-rating {
            color: #ffc107;
            font-size: 0.9rem;
        }
        
        .product-type {
            color: var(--text-gray);
            font-size: 0.85rem;
            font-style: italic;
        }
        
        .platform-section {
            background: var(--dark-blue);
            color: white;
            border-radius: 30px;
            padding: 60px;
            margin: 0 15px;
        }
        
        .platform-tag {
            display: inline-block;
            background: rgba(255,255,255,0.1);
            border: 2px solid var(--primary-orange);
            color: var(--primary-orange);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        
        .platform-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .platform-title .highlight {
            color: var(--primary-orange);
        }
        
        .platform-features {
            list-style: none;
            padding: 0;
            margin: 30px 0;
        }
        
        .platform-features li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .platform-features .check-icon {
            color: var(--primary-orange);
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        .btn-platform {
            background: var(--primary-orange);
            color: white;
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-platform:hover {
            background: #e68900;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(254, 152, 0, 0.3);
            color: white;
        }
        
        footer {
            background: var(--primary-blue);
            color: white;
            padding: 60px 0 30px;
        }
        
        .footer-logo {
            height: 60px;
            margin-bottom: 20px;
            transition: transform 0.3s ease, filter 0.3s ease;
        }
        
        .footer-logo:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }
        
        .navbar-logo {
            height: 60px;
            transition: transform 0.3s ease;
        }
        
        .navbar-logo:hover {
            transform: scale(1.05);
        }
        
        .logo-light-bg {
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }
        
        .logo-dark-bg {
            filter: drop-shadow(0 2px 4px rgba(255,255,255,0.2));
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--primary-orange);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            color: white;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }
        
        .social-links a:hover {
            color: var(--primary-orange);
        }
        
        @media (max-width: 768px) {
            .hero-slider {
                height: 500px;
            }
            
            .hero-content {
                padding-left: 30px;
                padding-right: 20px;
                max-width: 90%;
            }
            
            .hero-title {
                font-size: 1.8rem;
                margin-bottom: 15px;
            }
            
            .hero-description {
                font-size: 0.9rem;
                margin-bottom: 20px;
            }
            
            .hero-button {
                padding: 10px 20px;
                font-size: 0.8rem;
            }
            
            .section-padding {
                padding: 50px 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .platform-section {
                padding: 40px 20px;
                margin: 0;
                border-radius: 20px;
            }
            
            .process-item {
                flex-direction: column;
                text-align: center;
            }
            
            .process-content {
                margin-left: 0;
                margin-top: 20px;
            }
            
            .navbar-nav {
                text-align: center;
            }
            
            .btn-contact {
                margin-top: 10px;
            }
        }
        
        /* Divider Line Style */
        .divider-line {
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-orange), var(--primary-blue));
            margin: 0.5rem 0;
            border-radius: 2px;
        }

        @keyframes shimmer-divider {
            0% { background-position: -100% 0; }
            100% { background-position: 100% 0; }
        }
    </style>
</head>
<body>
    @include('partials.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.transparent-navbar');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
        
        // Handle hamburger menu visibility based on screen size
        function handleHamburgerMenu() {
            const toggler = document.querySelector('.navbar-toggler');
            if (toggler) {
                if (window.innerWidth >= 992) {
                    toggler.style.display = 'none !important';
                    toggler.style.visibility = 'hidden';
                    toggler.style.opacity = '0';
                } else {
                    toggler.style.display = 'block !important';
                    toggler.style.visibility = 'visible';
                    toggler.style.opacity = '1';
                }
            }
        }
        
        // Enable hover dropdown for desktop
        function enableHoverDropdown() {
            const dropdowns = document.querySelectorAll('.navbar-nav .dropdown');
            
            dropdowns.forEach(function(dropdown) {
                const dropdownToggle = dropdown.querySelector('.dropdown-toggle');
                const dropdownMenu = dropdown.querySelector('.dropdown-menu');
                
                if (dropdownToggle && dropdownMenu) {
                    // Show dropdown on hover
                    dropdown.addEventListener('mouseenter', function(e) {
                        if (window.innerWidth >= 992) {
                            e.preventDefault();
                            e.stopPropagation();
                            dropdownToggle.classList.add('show');
                            dropdownMenu.classList.add('show');
                            dropdownToggle.setAttribute('aria-expanded', 'true');
                            dropdownMenu.style.position = 'absolute';
                            dropdownMenu.style.top = '100%';
                            dropdownMenu.style.left = '0';
                            dropdownMenu.style.margin = '0';
                            dropdownMenu.style.minWidth = '150px';
                            dropdownMenu.style.transform = 'translateY(0)';
                        }
                    });
                    
                    // Hide dropdown on mouse leave
                    dropdown.addEventListener('mouseleave', function(e) {
                        if (window.innerWidth >= 992) {
                            e.preventDefault();
                            e.stopPropagation();
                            dropdownToggle.classList.remove('show');
                            dropdownMenu.classList.remove('show');
                            dropdownToggle.setAttribute('aria-expanded', 'false');
                        }
                    });
                    
                    // Handle click for mobile
                    dropdownToggle.addEventListener('click', function(e) {
                        if (window.innerWidth < 992) {
                            e.preventDefault();
                            e.stopPropagation();
                            
                            // Close other dropdowns
                            document.querySelectorAll('.navbar-nav .dropdown .dropdown-menu.show').forEach(function(menu) {
                                if (menu !== dropdownMenu) {
                                    menu.classList.remove('show');
                                    menu.previousElementSibling.classList.remove('show');
                                    menu.previousElementSibling.setAttribute('aria-expanded', 'false');
                                }
                            });
                            
                            // Toggle current dropdown
                            const isShowing = dropdownMenu.classList.contains('show');
                            if (isShowing) {
                                dropdownToggle.classList.remove('show');
                                dropdownMenu.classList.remove('show');
                                dropdownToggle.setAttribute('aria-expanded', 'false');
                            } else {
                                dropdownToggle.classList.add('show');
                                dropdownMenu.classList.add('show');
                                dropdownToggle.setAttribute('aria-expanded', 'true');
                            }
                        } else {
                            e.preventDefault();
                            e.stopPropagation();
                        }
                    });
                }
            });
        }
        
        // Run on load and resize
        document.addEventListener('DOMContentLoaded', function() {
            handleHamburgerMenu();
            enableHoverDropdown();
        });
        window.addEventListener('resize', function() {
            handleHamburgerMenu();
            enableHoverDropdown();
        });
    </script>
    @yield('scripts')
</body>
</html>
