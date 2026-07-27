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
            --gold: #FFD700;
            --amber: #FFA500;
            --yellow: #FFC107;
            --orange-light: #FFB74D;
            --orange-dark: #E65100;
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
            z-index: 1050;
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
            color: #050052 !important;
            /* text-shadow: 0 1px 3px rgba(0,0,0,0.3); */
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
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.3));
            transition: all 0.3s ease;
        }
        
        .navbar-brand img:hover {
            filter: drop-shadow(0 4px 12px rgba(254, 152, 0, 0.5));
            transform: scale(1.05);
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
            height: 100%;
            object-fit: contain;
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
                height: 70vh;
                min-height: 450px;
            }
            
            .hero-overlay {
                background: linear-gradient(to right, rgba(254, 152, 0, 0.95) 0%, rgba(254, 152, 0, 0.6) 100%);
            }
            
            .hero-content {
                position: absolute;
                top: 58%;
                left: 5%;
                transform: translateY(-50%);
                max-width: 90%;
                width: 90%;
                padding: 1.5rem 1rem;
            }

            .hero-title {
                font-size: 2rem;
                margin-bottom: 1rem;
                line-height: 1.2;
            }
            
            .hero-description {
                font-size: 1rem;
                margin-bottom: 1.5rem;
                max-width: 100%;
                line-height: 1.5;
            }
            
            .hero-button {
                padding: 0.8rem 2rem;
                font-size: 0.9rem;
            }
            
            .section-padding {
                padding: 50px 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .platform-section {
                padding: 30px 16px;
                margin: 0;
                border-radius: 16px;
                overflow: visible;
            }

            .platform-title {
                font-size: 1.6rem !important;
                line-height: 1.3;
                word-break: break-word;
            }

            .platform-tag {
                font-size: 0.8rem;
                padding: 6px 14px;
                margin-bottom: 15px;
            }

            .platform-features {
                margin: 15px 0;
            }

            .platform-features li {
                margin-bottom: 10px;
                font-size: 0.9rem;
            }

            .btn-platform {
                padding: 10px 24px;
                font-size: 0.9rem;
                width: 100%;
                text-align: center;
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

        /* Modern Animation Effects */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        @keyframes slideInLeft {
            0% { transform: translateX(-100px); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }

        @keyframes slideInRight {
            0% { transform: translateX(100px); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }

        @keyframes fadeInUp {
            0% { transform: translateY(50px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        @keyframes glow {
            0%, 100% { box-shadow: 0 0 20px rgba(254, 152, 0, 0.3); }
            50% { box-shadow: 0 0 40px rgba(254, 152, 0, 0.6), 0 0 60px rgba(254, 152, 0, 0.4); }
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Enhanced Hero Section */
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
            transition: opacity 1.5s ease-in-out;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(0.9);
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: transparent;
            z-index: 1;
        }
        
        .hero-slide::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60%;
            background: linear-gradient(0deg, rgba(255, 255, 255, 0.9) 0%, transparent 100%);
            z-index: 2;
        }

        .hero-slide.active {
            opacity: 1;
            animation: fadeInUp 1.5s ease-out;
        }

        .hero-content {
            max-width: 600px;
            color: white;
            text-align: left;
            z-index: 3;
            position: relative;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 25px;
            line-height: 1.1;
            color: var(--primary-blue) !important;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            animation: slideInLeft 1s ease-out;
        }

        .hero-description {
            font-size: 1.3rem;
            line-height: 1.6;
            margin-bottom: 35px;
            color: var(--primary-blue) !important;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
            animation: slideInLeft 1.2s ease-out;
        }

        .hero-button {
            display: inline-block;
            padding: 15px 40px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            background: linear-gradient(45deg, var(--primary-orange), #ffaa00);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.4s ease;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
            position: relative;
            overflow: hidden;
            animation: slideInLeft 1.4s ease-out;
        }

        .hero-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .hero-button:hover::before {
            left: 100%;
        }

        .hero-button:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 35px rgba(254, 152, 0, 0.4);
            text-decoration: none;
            color: white;
            border-color: white;
        }

        /* Floating Particles Background */
        .floating-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 2;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 1s; }
        .particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 2s; }
        .particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 3s; }
        .particle:nth-child(5) { width: 7px; height: 7px; left: 50%; animation-delay: 4s; }
        .particle:nth-child(6) { width: 4px; height: 4px; left: 60%; animation-delay: 5s; }
        .particle:nth-child(7) { width: 6px; height: 6px; left: 70%; animation-delay: 2.5s; }
        .particle:nth-child(8) { width: 3px; height: 3px; left: 80%; animation-delay: 1.5s; }
        .particle:nth-child(9) { width: 5px; height: 5px; left: 90%; animation-delay: 3.5s; }

        /* Enhanced Section Animations */
        .section-animate {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease-out;
        }

        .section-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Enhanced Category Cards */
        .category-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-orange), var(--primary-blue));
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .category-card:hover::before {
            transform: scaleX(1);
        }

        .category-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .category-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .category-card:hover img {
            transform: scale(1.1);
        }

        /* Enhanced Product Cards */
        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
        }

        .product-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(254, 152, 0, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .product-card:hover::after {
            opacity: 1;
        }

        .product-card:hover {
            transform: translateY(-15px) rotateX(5deg);
            box-shadow: 0 25px 60px rgba(0,0,0,0.15);
        }

        .product-card-img-wrap {
            position: relative;
            overflow: hidden;
        }

        .product-card-img {
            transition: transform 0.6s ease;
        }

        .product-card:hover .product-card-img {
            transform: scale(1.15) rotate(2deg);
        }

        /* Enhanced Legality Cards */
        .legality-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            height: 100%;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .legality-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(254, 152, 0, 0.05), transparent);
            transform: rotate(45deg);
            transition: all 0.6s ease;
        }

        .legality-card:hover::before {
            /* animation: pulse 2s ease-in-out infinite; */
        }

        .legality-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }

        .legality-card .icon {
            font-size: 3.5rem;
            background: linear-gradient(45deg, var(--primary-orange), #ffaa00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 25px;
            transition: all 0.4s ease;
        }

        .legality-card:hover .icon {
            transform: scale(1.2) rotate(10deg);
        }

        /* Enhanced Platform Section */
        .platform-section {
            background: linear-gradient(135deg, var(--dark-blue) 0%, #1a1a3e 100%);
            color: white;
            border-radius: 30px;
            padding: 70px;
            margin: 0 15px;
            position: relative;
            overflow: hidden;
        }

        .platform-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(254, 152, 0, 0.1) 0%, transparent 70%);
            animation: float 8s ease-in-out infinite;
        }

        .platform-tag {
            display: inline-block;
            background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(254, 152, 0, 0.2));
            border: 2px solid var(--primary-orange);
            color: var(--primary-orange);
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            margin-bottom: 25px;
            backdrop-filter: blur(10px);
            /* animation: pulse 3s ease-in-out infinite; */
        }

        .platform-title {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 25px;
            background: linear-gradient(45deg, #ffffff, #FFDE9B);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .platform-title .highlight {
            color: var(--primary-orange);
            -webkit-text-fill-color: var(--primary-orange);
        }

        /* Enhanced Process Timeline */
        .process-number-horizontal {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(45deg, #160C4B, #2a1a7e);
            border: 4px solid var(--primary-orange);
            color: var(--primary-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.4rem;
            margin-bottom: 25px;
            position: relative;
            z-index: 2;
            box-shadow: 0 8px 25px rgba(254, 152, 0, 0.3);
            transition: all 0.4s ease;
        }

        .process-step-horizontal:hover .process-number-horizontal {
            transform: scale(1.15) rotate(10deg);
            box-shadow: 0 12px 35px rgba(254, 152, 0, 0.5);
            /* animation: glow 2s ease-in-out infinite; */
        }

        /* Enhanced Partner Logos */
        .partner-logo {
            background: white;
            border-radius: 15px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 140px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .partner-logo::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(254, 152, 0, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .partner-logo:hover::before {
            left: 100%;
        }

        .partner-logo:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        /* Enhanced Section Titles */
        .section-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-blue), var(--primary-orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-orange), var(--primary-blue));
            border-radius: 2px;
            animation: gradientShift 3s ease-in-out infinite;
        }

        /* Enhanced Buttons */
        .btn-contact {
            background: linear-gradient(45deg, var(--primary-orange), #ffaa00) !important;
            color: white !important;
            border-radius: 25px !important;
            padding: 12px 35px !important;
            font-weight: 600 !important;
            transition: all 0.4s ease !important;
            text-decoration: none !important;
            display: inline-block !important;
            border: none !important;
            cursor: pointer !important;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(254, 152, 0, 0.3);
        }

        .btn-contact::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn-contact:hover::before {
            left: 100%;
        }

        .btn-contact:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(254, 152, 0, 0.4);
            color: white;
        }

        /* Parallax Effect */
        .parallax-section {
            position: relative;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .parallax-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(5, 0, 82, 0.8);
        }

        /* Scroll Reveal Animations */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease-out;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-reveal-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease-out;
        }

        .scroll-reveal-left.revealed {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-reveal-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease-out;
        }

        .scroll-reveal-right.revealed {
            opacity: 1;
            transform: translateX(0);
        }

        /* Super Enhanced About Section */
        #tentang {
            background: white;
            position: relative;
            overflow: hidden;
        }

        #tentang::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(254, 152, 0, 0.05) 0%, transparent 70%);
            animation: float 15s ease-in-out infinite;
        }

        .about-image-wrapper {
            position: relative;
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .about-image-wrapper img {
            width: 100%;
            height: auto;
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 2;
        }

        .about-image-wrapper::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, var(--primary-orange), var(--gold), var(--amber));
            border-radius: 30px;
            z-index: 1;
            opacity: 0;
            transition: opacity 0.6s ease;
            animation: gradientShift 4s ease-in-out infinite;
        }

        
        .about-content {
            position: relative;
            z-index: 3;
        }

        .about-title {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(45deg, var(--primary-orange), var(--gold), var(--amber));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% 200%;
            animation: gradientShift 3s ease-in-out infinite;
            position: relative;
            margin-bottom: 1.5rem;
        }

        .about-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-orange), var(--gold));
            border-radius: 2px;
            /* animation: glow 2s ease-in-out infinite; */
        }

        .about-description {
            font-size: 0.85rem;
            line-height: 1.8;
            color: #495057;
            position: relative;
            padding: 20px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(254, 152, 0, 0.1);
            transition: all 0.4s ease;
        }

        .about-description::before {
            content: '"';
            position: absolute;
            top: -20px;
            left: 20px;
            font-size: 4rem;
            color: var(--primary-orange);
            opacity: 0.3;
            font-family: Georgia, serif;
        }

        .about-description:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.9);
        }

        .about-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 30px 0;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(254, 152, 0, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .stat-item:hover::before {
            left: 100%;
        }

        .stat-item:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 40px rgba(254, 152, 0, 0.2);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-orange);
            display: block;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .about-features {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 25px 0;
        }

        .feature-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: linear-gradient(45deg, rgba(254, 152, 0, 0.1), rgba(255, 215, 0, 0.1));
            border: 1px solid rgba(254, 152, 0, 0.3);
            border-radius: 25px;
            font-size: 0.9rem;
            color: var(--primary-blue);
            transition: all 0.3s ease;
        }

        .feature-badge:hover {
            background: linear-gradient(45deg, var(--primary-orange), var(--gold));
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(254, 152, 0, 0.3);
        }

        .feature-badge i {
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .about-title {
                font-size: 2.5rem;
            }
            
            .about-stats {
                grid-template-columns: 1fr;
            }
            
            .about-features {
                justify-content: center;
            }
        }

        /* ==========================================================================
           PT ARO BASKARA ESA - MEGA DROPDOWN MENU NAVBAR
           ========================================================================== */
        
        .custom-dropdown-wrapper {
            position: relative;
        }

        @media (min-width: 992px) {
            .custom-dropdown-wrapper::before {
                content: '';
                position: absolute;
                top: 100%;
                left: -20px;
                right: -20px;
                height: 25px;
                background: transparent;
                z-index: 1079;
            }
        }

        /* Desktop Mode Dropdown Styling & Animations */
        @media (min-width: 992px) {
            .navbar .custom-dropdown-wrapper:hover .custom-mega-dropdown {
                opacity: 1 !important;
                visibility: visible !important;
                transform: translateX(-50%) translateY(0);
                pointer-events: auto !important;
            }
            
            .navbar .custom-mega-dropdown {
                position: absolute;
                top: 100%;
                left: 50%;
                transform: translateX(-50%) translateY(15px);
                width: 380px; /* Lebar proporsional ±300–400px */
                background: #ffffff;
                border-radius: 14px; /* Border radius 12-16px */
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); /* Shadow lembut */
                border: 1px solid rgba(5, 0, 82, 0.05);
                padding: 12px 0 0 0;
                opacity: 0 !important;
                visibility: hidden !important;
                transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1), 
                            transform 0.3s cubic-bezier(0.4, 0, 0.2, 1),
                            visibility 0.3s;
                z-index: 1080;
                pointer-events: none !important;
                overflow: hidden;
            }
            
            .dropdown-arrow-icon {
                transition: transform 0.3s ease;
                font-size: 0.75rem;
                vertical-align: middle;
            }
            
            .custom-dropdown-wrapper:hover .dropdown-arrow-icon {
                transform: rotate(180deg);
            }
        }

        /* Dropdown Category List Structure */
        .dropdown-category-list {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 400px;
            overflow-y: auto;
        }

        .dropdown-category-list li {
            padding: 0 12px;
            margin-bottom: 6px;
        }

        .dropdown-category-list li:last-child {
            margin-bottom: 0;
        }

        /* Category Item Design with hover animation */
        .dropdown-category-item {
            display: flex;
            align-items: center;
            padding: 10px 16px;
            border-radius: 10px;
            color: var(--primary-blue); /* Default dark blue text */
            text-decoration: none !important;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
        }

        .dropdown-category-item .category-icon {
            font-size: 1.05rem;
            width: 24px;
            margin-right: 12px;
            color: var(--primary-orange);
            transition: transform 0.25s ease;
            text-align: center;
        }

        .dropdown-category-item:hover {
            background-color: rgba(254, 152, 0, 0.08) !important; /* Warna oranye muda */
            color: var(--primary-orange) !important; /* Warna oranye / utama website */
            padding-left: 20px; /* Transisi geser halus */
        }

        .dropdown-category-item:hover .category-icon {
            transform: scale(1.2);
            color: var(--primary-orange) !important;
        }

        /* Dropdown Footer Area */
        .dropdown-footer {
            background-color: #fcfcfc;
            border-top: 1px solid #f1f1f1;
            margin-top: 8px;
            padding: 12px 20px;
            text-align: center;
        }

        .btn-all-products {
            display: inline-flex;
            align-items: center;
            color: var(--primary-orange) !important;
            font-weight: 600;
            text-decoration: none !important;
            font-size: 0.9rem;
            transition: color 0.25s ease, transform 0.25s ease;
        }

        .btn-all-products:hover {
            color: #e68900 !important;
            transform: translateX(4px);
        }

        /* Responsive Mobile/Tablet Breakpoint Configuration */
        @media (max-width: 991.98px) {
            .dropdown-arrow-icon {
                float: right;
                margin-top: 6px;
                transition: transform 0.3s ease;
            }
            
            .custom-dropdown-wrapper.open .dropdown-arrow-icon {
                transform: rotate(180deg);
            }
            
            .custom-mega-dropdown {
                display: none;
                width: 100%;
                background: #fcfcfc;
                border-radius: 10px;
                border-left: 4px solid var(--primary-orange);
                margin: 8px 0;
                padding: 10px 0 0 0;
                box-shadow: inset 0 2px 8px rgba(0,0,0,0.03);
                overflow: hidden;
            }
            
            .custom-dropdown-wrapper.open .custom-mega-dropdown {
                display: block;
            }
            
            .dropdown-category-item {
                padding: 8px 16px;
                font-size: 0.95rem;
                background: transparent !important;
            }
            
            .dropdown-category-item:hover {
                background-color: rgba(254, 152, 0, 0.05) !important;
                padding-left: 20px;
            }
            
            .dropdown-footer {
                text-align: left;
                padding: 10px 16px;
            }
        }
    </style>
</head>
<body @yield('body-id')>
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

            // Scroll Reveal Animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, observerOptions);

            // Observe all scroll-reveal elements
            document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right').forEach(el => {
                observer.observe(el);
            });

            // Parallax Effect
            function updateParallax() {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.parallax-section');
                
                parallaxElements.forEach(element => {
                    const speed = 0.5;
                    const yPos = -(scrolled * speed);
                    element.style.backgroundPosition = `center ${yPos}px`;
                });
            }

            window.addEventListener('scroll', updateParallax);

            // Enhanced Hero Slider with Particles
            const heroSlider = document.querySelector('.hero-slider');
            if (heroSlider) {
                // Add floating particles
                const particlesContainer = document.createElement('div');
                particlesContainer.className = 'floating-particles';
                
                for (let i = 1; i <= 9; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    particlesContainer.appendChild(particle);
                }
                
                heroSlider.appendChild(particlesContainer);
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add hover effects to cards
            document.querySelectorAll('.category-card, .product-card, .legality-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-15px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Animated counter for statistics
            function animateCounter(element, target, duration = 2000) {
                let start = 0;
                const increment = target / (duration / 16);
                
                const timer = setInterval(() => {
                    start += increment;
                    if (start >= target) {
                        element.textContent = target;
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(start);
                    }
                }, 16);
            }

            // Initialize counters when visible
            const counters = document.querySelectorAll('.counter');
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                        const target = parseInt(entry.target.getAttribute('data-target'));
                        animateCounter(entry.target, target);
                        entry.target.classList.add('counted');
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });

            // Add ripple effect to buttons
            document.querySelectorAll('.btn-contact, .hero-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Add CSS for ripple effect
            const style = document.createElement('style');
            style.textContent = `
                .ripple {
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.5);
                    transform: scale(0);
                    animation: ripple-animation 0.6s ease-out;
                    pointer-events: none;
                }
                
                @keyframes ripple-animation {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
                
                .btn-contact, .hero-button {
                    position: relative;
                    overflow: hidden;
                }
            `;
            document.head.appendChild(style);
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
        
        // Handle mobile toggle for custom mega dropdown
        function initCustomMegaDropdown() {
            const dropdownWrapper = document.querySelector('.custom-dropdown-wrapper');
            const dropdownToggle = document.querySelector('.dropdown-toggle-custom');
            const megaDropdown = document.querySelector('.custom-mega-dropdown');
            
            if (dropdownToggle && megaDropdown && dropdownWrapper) {
                // Click behavior for mobile
                dropdownToggle.addEventListener('click', function(e) {
                    if (window.innerWidth < 992) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        const isOpen = dropdownWrapper.classList.contains('open');
                        if (isOpen) {
                            dropdownWrapper.classList.remove('open');
                            megaDropdown.style.display = 'none';
                        } else {
                            dropdownWrapper.classList.add('open');
                            megaDropdown.style.display = 'block';
                        }
                    }
                });
                
                // Close when clicking outside on mobile
                document.addEventListener('click', function(e) {
                    if (window.innerWidth < 992) {
                        if (!dropdownWrapper.contains(e.target)) {
                            dropdownWrapper.classList.remove('open');
                            megaDropdown.style.display = 'none';
                        }
                    }
                });
            }
        }
        
        // Run on load and resize
        document.addEventListener('DOMContentLoaded', function() {
            handleHamburgerMenu();
            enableHoverDropdown();
            initCustomMegaDropdown();
        });
        window.addEventListener('resize', function() {
            handleHamburgerMenu();
            enableHoverDropdown();
            
            // Reset mobile styles for custom mega dropdown on resize to desktop
            const dropdownWrapper = document.querySelector('.custom-dropdown-wrapper');
            const megaDropdown = document.querySelector('.custom-mega-dropdown');
            if (megaDropdown && dropdownWrapper) {
                if (window.innerWidth >= 992) {
                    dropdownWrapper.classList.remove('open');
                    megaDropdown.style.display = '';
                }
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
