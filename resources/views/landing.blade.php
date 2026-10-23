<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kembar Kencana Wedding Organizer — Wujudkan Pernikahan Impian Anda</title>
    <meta name="description" content="Kembar Kencana Wedding Organizer menyediakan layanan pernikahan profesional dengan paket Bronze, Silver, Gold, dan Platinum. Berbasis di Indonesia, kami hadir untuk mewujudkan momen sakral Anda.">

    {{-- Favicon --}}
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.JPG') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.JPG') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.JPG') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    {{-- AOS Animations --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <style>
        /* ===================================================
           DESIGN TOKENS — Kembar Kencana Wedding Organizer
           =================================================== */
        :root {
            /* === CLEAN IVORY & CHAMPAGNE PALETTE === */
            --gold: #B8933C;
            --gold-light: #D4AF65;
            --gold-dark: #8A6B1F;
            --gold-dim: rgba(184, 147, 60, 0.12);
            --gold-border: rgba(184, 147, 60, 0.3);

            /* Champagne / Taupe accents */
            --champagne: #E8D5A3;
            --taupe: #8A7355;
            --rose: #C4837A;

            /* Light surfaces */
            --ivory: #FDFCF9;
            --cream: #F7F4EF;
            --cream-2: #F0EDE7;
            --cream-3: #E8E4DC;
            --warm-white: #FFFFFF;

            /* Legacy compatibility */
            --obsidian: #FDFCF9;
            --obsidian-2: #F7F4EF;
            --surface-1: #F7F4EF;
            --surface-2: #FFFFFF;
            --surface-3: #F0EDE7;
            --surface-hover: #EDE9E1;
            --blush: #F9F0EE;
            --blush-deep: #D4A5AA;
            --charcoal: #2C2420;
            --charcoal-2: #3D3229;
            --muted: #7A6E65;
            --white: #FFFFFF;

            /* Text */
            --text-primary: #2C2420;
            --text-secondary: #6B5F55;
            --text-muted: #A09288;

            --font-serif: 'Cormorant Garamond', serif;
            --font-sans: 'Jost', sans-serif;

            --shadow-card: 0 4px 24px rgba(44, 36, 32, 0.07);
            --shadow-hover: 0 16px 48px rgba(44, 36, 32, 0.14);
            --shadow-gold: 0 6px 24px rgba(184, 147, 60, 0.18);
            --radius-card: 16px;
            --transition: 0.3s cubic-bezier(.4, 0, .2, 1);
        }

        /* ===================================================
           GLOBAL
           =================================================== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
            max-width: 100%;
        }

        body {
            font-family: var(--font-sans);
            background: var(--ivory);
            color: var(--text-primary);
            overflow-x: hidden;
            max-width: 100%;
            width: 100%;
        }

        /* Prevent all sections from causing horizontal overflow */
        section,
        footer,
        nav,
        header {
            max-width: 100%;
        }

        /* Div max-width: exclude slider track (needs width > 100%) */
        div:not(.portfolio-slider):not(.portfolio-slide) {
            max-width: 100%;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: var(--font-serif);
        }

        .section-label {
            font-family: var(--font-sans);
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--gold);
        }

        .section-title {
            font-size: clamp(1.75rem, 3vw, 2.35rem);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.2;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            color: var(--white);
            border: none;
            border-radius: 50px;
            padding: 0.65rem 1.8rem;
            font-family: var(--font-sans);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.04em;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold) 100%);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 6px 22px rgba(196, 154, 60, 0.35);
        }

        .btn-outline-gold {
            background: transparent;
            color: var(--gold);
            border: 1.5px solid var(--gold);
            border-radius: 50px;
            padding: 0.6rem 1.6rem;
            font-family: var(--font-sans);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.04em;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn-outline-gold:hover {
            background: var(--gold);
            color: var(--white);
            transform: translateY(-2px);
        }

        /* ===================================================
           NAVBAR
           =================================================== */
        #navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1rem 0;
            transition: var(--transition);
            background: transparent;
        }

        #navbar.scrolled {
            background: rgba(253, 252, 249, 0.97);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 2px 20px rgba(44, 36, 32, 0.08), 0 1px 0 rgba(184, 147, 60, 0.15);
            padding: 0.65rem 0;
        }

        .navbar-brand-text {
            font-family: var(--font-serif);
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--white);
            letter-spacing: 0.04em;
            text-decoration: none;
            transition: var(--transition);
        }

        #navbar.scrolled .navbar-brand-text {
            color: var(--text-primary);
        }

        .navbar-logo {
            height: 38px;
            width: auto;
            object-fit: contain;
            border-radius: 6px;
            transition: var(--transition);
        }

        .nav-link-custom {
            font-family: var(--font-sans);
            font-size: 0.84rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9) !important;
            letter-spacing: 0.04em;
            padding: 0.35rem 0.7rem !important;
            transition: var(--transition);
            position: relative;
        }

        .nav-link-custom::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            right: 50%;
            height: 1px;
            background: var(--gold);
            transition: var(--transition);
        }

        .nav-link-custom:hover::after {
            left: 0.7rem;
            right: 0.7rem;
        }

        #navbar.scrolled .nav-link-custom {
            color: var(--text-primary) !important;
        }

        .nav-link-custom:hover {
            color: var(--gold) !important;
        }

        .navbar-toggler-custom {
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 8px;
            padding: 0.3rem 0.6rem;
            background: transparent;
            cursor: pointer;
            transition: var(--transition);
        }

        #navbar.scrolled .navbar-toggler-custom {
            border-color: var(--gold);
        }

        .toggler-icon {
            display: block;
            width: 20px;
            height: 2px;
            background: rgba(255, 255, 255, 0.9);
            margin: 4px 0;
            border-radius: 2px;
            transition: var(--transition);
        }

        #navbar.scrolled .toggler-icon {
            background: var(--text-primary);
        }

        /* ===================================================
           HERO
           =================================================== */
        #home {
            min-height: 92vh;
            position: relative;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #1a0a0d 0%, #2d1420 40%, #1a0a0d 100%);
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-image: url("{{ asset('images/4.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.45;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom,
                    rgba(10, 5, 8, 0.6) 0%,
                    rgba(30, 15, 20, 0.55) 50%,
                    rgba(10, 5, 8, 0.85) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(196, 154, 60, 0.2);
            border: 1px solid rgba(196, 154, 60, 0.5);
            color: var(--gold-light);
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            backdrop-filter: blur(10px);
        }

        .hero-title {
            font-family: var(--font-serif);
            font-size: clamp(2.4rem, 5vw, 4rem);
            font-weight: 700;
            color: var(--white);
            line-height: 1.15;
        }

        .hero-title span {
            color: var(--gold-light);
            font-style: italic;
        }

        .hero-subtitle {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.75);
            max-width: 480px;
            line-height: 1.7;
        }

        .hero-divider {
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat .number {
            font-family: var(--font-serif);
            font-size: 1.7rem;
            font-weight: 700;
            color: var(--gold-light);
        }

        .hero-stat .label {
            font-size: 0.72rem;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 0.05em;
        }

        .hero-scroll {
            position: absolute;
            bottom: 1.5rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.4rem;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.65rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(8px);
            }
        }

        /* ===================================================
           KEUNGGULAN
           =================================================== */
        #keunggulan {
            padding: 4.5rem 0;
            background: #FBF0EF;
        }

        .feature-card {
            background: var(--warm-white);
            border: 1px solid rgba(184, 147, 60, 0.15);
            border-radius: var(--radius-card);
            padding: 1.8rem 1.5rem;
            transition: var(--transition);
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at top left, rgba(184, 147, 60, 0.05) 0%, transparent 60%);
            pointer-events: none;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(184, 147, 60, 0.35);
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, rgba(184, 147, 60, 0.15), rgba(212, 175, 101, 0.08));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            color: var(--gold);
            margin-bottom: 1.1rem;
            border: 1px solid rgba(184, 147, 60, 0.25);
            box-shadow: 0 4px 16px rgba(184, 147, 60, 0.1);
        }

        .feature-title {
            font-family: var(--font-serif);
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.6rem;
        }

        .feature-desc {
            font-size: 0.85rem;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* ===================================================
           PORTOFOLIO
           =================================================== */
        #portofolio {
            padding: 4.5rem 0;
            background: #FBF5E8;
            position: relative;
        }

        #portofolio::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 80% 20%, rgba(184, 147, 60, 0.05) 0%, transparent 60%),
                radial-gradient(ellipse at 20% 80%, rgba(196, 131, 122, 0.04) 0%, transparent 50%);
            pointer-events: none;
        }

        .portfolio-card {
            border: 1px solid rgba(184, 147, 60, 0.15);
            border-radius: var(--radius-card);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            transition: var(--transition);
            background: var(--warm-white);
        }

        .portfolio-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(184, 147, 60, 0.3);
        }

        .portfolio-img-wrap {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        /* Slider wrapper — IMPORTANT: max-width must NOT be applied here */
        .portfolio-slider {
            display: flex;
            height: 100%;
            transition: transform 0.5s cubic-bezier(.4, 0, .2, 1);
            max-width: none !important;
            /* override global div rule */
            min-width: 0;
        }

        .portfolio-slide {
            flex-shrink: 0;
            height: 100%;
            max-width: none !important;
        }

        .portfolio-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Slider nav dots */
        .portfolio-dots {
            position: absolute;
            bottom: 0.6rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 5px;
            z-index: 3;
        }

        .portfolio-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            border: none;
            padding: 0;
        }

        .portfolio-dot.active {
            background: white;
            transform: scale(1.3);
        }

        /* Prev/Next arrow */
        .portfolio-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.25);
            border: none;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            z-index: 3;
            transition: background 0.2s;
            opacity: 0;
            backdrop-filter: blur(4px);
        }

        .portfolio-img-wrap:hover .portfolio-arrow {
            opacity: 1;
        }

        .portfolio-arrow:hover {
            background: rgba(255, 255, 255, 0.45);
        }

        .portfolio-arrow.prev {
            left: 0.5rem;
        }

        .portfolio-arrow.next {
            right: 0.5rem;
        }

        .portfolio-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(28, 28, 28, 0.7) 0%, transparent 60%);
            opacity: 0;
            transition: var(--transition);
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
            pointer-events: none;
            z-index: 2;
        }

        .portfolio-card:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-overlay-text {
            color: white;
            font-size: 0.85rem;
            line-height: 1.5;
        }

        .portfolio-body {
            padding: 1.5rem;
            background: var(--warm-white);
        }

        .portfolio-title {
            font-family: var(--font-serif);
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .portfolio-desc {
            font-size: 0.85rem;
            color: var(--text-secondary);
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .portfolio-img-count {
            font-size: 0.72rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.3rem;
            margin-top: 0.4rem;
        }

        /* Portfolio responsive: 2 columns on mobile */
        @media (max-width: 767px) {
            .portfolio-img-wrap {
                height: 180px;
            }

            .portfolio-body {
                padding: 1rem;
            }

            .portfolio-title {
                font-size: 1rem;
            }

            .portfolio-desc {
                font-size: 0.8rem;
            }

            .portfolio-card:hover {
                transform: none;
            }

            /* disable hover lift on touch */
        }

        @media (max-width: 480px) {
            .portfolio-img-wrap {
                height: 150px;
            }

            .portfolio-body {
                padding: 0.75rem;
            }

            .portfolio-title {
                font-size: 0.92rem;
            }
        }

        /* No data placeholder */
        .no-data-placeholder {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-muted);
        }

        .no-data-placeholder i {
            font-size: 3rem;
            color: rgba(184, 147, 60, 0.3);
        }

        /* ===================================================
           PAKET
           =================================================== */
        .batch-theme-1 {
            --theme-gold: #4A86A8;
            --theme-bg: #F5F9FC;
            --theme-border: rgba(74, 134, 168, 0.2);
        }

        .batch-theme-2 {
            --theme-gold: #B8933C;
            --theme-bg: #FFFDF7;
            --theme-border: rgba(184, 147, 60, 0.2);
        }

        .batch-theme-3 {
            --theme-gold: #B8545D;
            --theme-bg: #FFF8F8;
            --theme-border: rgba(184, 84, 93, 0.2);
        }

        .batch-theme-4 {
            --theme-gold: #6B7D99;
            --theme-bg: #F5F7FA;
            --theme-border: rgba(107, 125, 153, 0.2);
        }

        .batch-theme-5 {
            --theme-gold: #2E8B71;
            --theme-bg: #F3FBF8;
            --theme-border: rgba(46, 139, 113, 0.2);
        }

        #paketan {
            padding: 4.5rem 0;
            background: #EEF2F8;
            position: relative;
        }

        #paketan::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(74, 134, 168, 0.5), transparent);
        }

        .package-card {
            border-radius: var(--radius-card);
            overflow: hidden;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
            background: var(--theme-bg, var(--warm-white));
            box-shadow: var(--shadow-card);
            border: 1px solid var(--theme-border, rgba(184, 147, 60, 0.15));
        }

        .package-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
            border-color: var(--theme-gold, var(--gold));
        }

        .package-card.featured {
            border: 2px solid var(--gold);
            box-shadow: 0 0 0 4px rgba(184, 147, 60, 0.08), var(--shadow-card);
        }

        .package-card.featured::before {
            content: '⭐ Terpopuler';
            position: absolute;
            top: 0.8rem;
            right: -0.5rem;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: white;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding: 0.25rem 0.85rem 0.25rem 0.7rem;
            border-radius: 4px 0 0 4px;
            box-shadow: -2px 2px 8px rgba(0, 0, 0, 0.15);
            z-index: 1;
        }

        .package-header {
            padding: 1.1rem 1rem 0.6rem;
            text-align: center;
        }

        .package-tier-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.35rem;
            flex-shrink: 0;
        }

        .package-tier {
            font-family: var(--font-sans);
            font-size: 0.64rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            margin-bottom: 0.35rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .package-name {
            font-family: var(--font-serif);
            font-size: 1.18rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .package-price {
            font-family: var(--font-serif);
            font-size: 1.08rem;
            font-weight: 700;
            color: var(--theme-gold, var(--gold));
        }

        .package-price sub {
            font-size: 0.72rem;
            font-weight: 400;
            color: var(--muted);
        }

        .package-stars {
            color: var(--theme-gold, var(--gold));
            font-size: 0.82rem;
            margin: 0.35rem 0;
        }

        .package-body {
            padding: 0 1rem 0.5rem;
        }

        .package-desc {
            font-size: 0.76rem;
            color: var(--text-secondary);
            line-height: 1.45;
            text-align: center;
            margin-bottom: 0.6rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .package-cta {
            display: block;
            text-align: center;
            padding: 0.4rem 1rem 0.85rem;
        }

        .package-cta .cta-row {
            display: flex;
            gap: 0.35rem;
            justify-content: center;
            margin-top: 0.35rem;
            flex-wrap: wrap;
        }

        .package-cta .btn-detail {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.3rem;
            width: 100%;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: #fff;
            font-family: var(--font-sans);
            font-weight: 600;
            font-size: 0.74rem;
            letter-spacing: 0.03em;
            padding: 0.42rem 0.8rem;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(184, 147, 60, 0.2);
        }

        .package-cta .btn-detail:hover {
            background: linear-gradient(135deg, var(--gold-dark), var(--gold));
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(184, 147, 60, 0.3);
        }

        .package-cta .btn-calc {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            background: transparent;
            border: 1.5px solid var(--gold);
            color: var(--gold);
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            padding: 0.35rem 0.65rem;
            border-radius: 50px;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .package-cta .btn-calc:hover {
            background: var(--gold);
            color: #fff;
        }

        .package-cta .btn-wa-sm {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            background: #25d366;
            color: #fff;
            font-size: 0.72rem;
            font-weight: 600;
            padding: 0.35rem 0.65rem;
            border-radius: 50px;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            border: none;
        }

        .package-cta .btn-wa-sm:hover {
            background: #1da851;
            color: #fff;
        }

        /* ── Batch Tabs ── */
        .batch-tabs {
            display: flex;
            gap: 0.4rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }

        .batch-tab-btn {
            background: var(--warm-white);
            border: 1.5px solid rgba(184, 147, 60, 0.3);
            border-radius: 50px;
            padding: 0.38rem 1.1rem;
            font-size: 0.74rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 2px 8px rgba(44, 36, 32, 0.06);
        }

        .batch-tab-btn:hover {
            border-color: var(--gold);
            color: var(--gold);
            background: var(--cream);
        }

        .batch-tab-btn.active {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            border-color: transparent;
            color: #fff;
            box-shadow: 0 3px 14px rgba(184, 147, 60, 0.25);
        }

        /* ── Facility preview in card ── */
        .pkg-facility-list {
            list-style: none;
            padding: 0;
            margin: 0 0 0.4rem;
            text-align: left;
        }

        .pkg-facility-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.4rem;
            font-size: 0.72rem;
            color: var(--text-secondary);
            padding: 0.12rem 0;
            line-height: 1.35;
        }

        .pkg-facility-list li i {
            color: var(--theme-gold, var(--gold));
            font-size: 0.62rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .pkg-more {
            font-size: 0.68rem;
            color: var(--theme-gold, var(--gold));
            text-align: left;
            margin-bottom: 0.3rem;
        }

        /* ===================================================
           PACKAGE MODAL
           =================================================== */
        .modal-content {
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(184, 147, 60, 0.2);
            background: var(--warm-white);
        }

        .modal-header {
            background: linear-gradient(135deg, #2C2420 0%, #3D3229 100%);
            color: #fff;
            border-bottom: 1px solid rgba(184, 147, 60, 0.2);
            padding: 1rem 1.3rem;
            position: relative;
        }

        .modal-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            opacity: 0.5;
        }

        .modal-title-custom {
            font-family: var(--font-serif);
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.15rem;
        }

        .modal-price {
            color: var(--champagne);
            font-size: 1.02rem;
            font-weight: 600;
        }

        .modal-body {
            padding: 1.1rem 1.3rem;
            background: var(--warm-white);
        }

        .facility-item {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            padding: 0.4rem 0;
            border-bottom: 1px solid rgba(44, 36, 32, 0.07);
        }

        .facility-item:last-child {
            border-bottom: none;
        }

        .facility-check {
            color: var(--gold);
            font-size: 0.82rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .facility-text {
            font-size: 0.8rem;
            color: var(--text-secondary);
            line-height: 1.45;
        }


        /* ===================================================
           KALKULATOR
           =================================================== */
        #kalkulator {
            padding: 4.5rem 0;
            background: linear-gradient(135deg, #2C2420 0%, #3D3229 100%);
            position: relative;
            overflow: visible;
            z-index: 10;
        }

        #kalkulator::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(184, 147, 60, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        #kalkulator .section-title {
            color: #FAF6F0;
        }

        #kalkulator .section-label {
            color: var(--champagne);
        }

        .calc-card {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-card);
            padding: 1.4rem;
        }

        .calc-section-title {
            font-family: var(--font-serif);
            font-size: 1.22rem;
            font-weight: 700;
            color: #FFF6DE;
            padding-bottom: 0.65rem;
            border-bottom: 1px solid rgba(212, 175, 101, 0.35);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            letter-spacing: 0.02em;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
        }

        .calc-section-title i {
            color: #FBBF24;
            font-size: 1.3rem;
        }

        .form-label-custom {
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            color: rgba(255, 255, 255, 0.75);
            margin-bottom: 0.35rem;
        }

        .form-control-custom {
            background-color: #26201c;
            border: 1.5px solid rgba(212, 175, 101, 0.25);
            border-radius: 10px;
            color: #FAF6F0;
            font-size: 0.88rem;
            padding: 0.65rem 0.9rem;
            transition: all 0.2s ease;
            width: 100%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .form-control-custom:focus {
            background-color: #2e2621;
            border-color: #F59E0B;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.25);
            outline: none;
            color: #FFFFFF;
        }

        .form-control-custom::placeholder {
            color: rgba(255, 255, 255, 0.35);
        }

        .form-select-custom {
            background-color: #26201c;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23D4AF65' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.85rem center;
            background-size: 14px 10px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 1.5px solid rgba(212, 175, 101, 0.3);
            border-radius: 10px;
            color: #FAF6F0;
            font-size: 0.88rem;
            font-weight: 500;
            padding: 0.65rem 2.2rem 0.65rem 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .form-select-custom:focus {
            background-color: #2e2621;
            border-color: #F59E0B;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.25);
            outline: none;
            color: #FFFFFF;
        }

        .form-select-custom:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            border-color: rgba(255, 255, 255, 0.1);
            background-color: rgba(0, 0, 0, 0.25);
        }

        .form-select-custom option {
            background-color: #1f1916;
            color: #FAF6F0;
            padding: 0.65rem 0.85rem;
            font-size: 0.88rem;
            font-weight: 500;
        }

        /* ── Custom Select Component (Kalkulator) ── */
        .calc-card.has-open-select,
        .calc-card:has(.custom-select-wrapper.is-open) {
            z-index: 100 !important;
            position: relative;
        }

        .col-sm-4:has(.custom-select-wrapper.is-open),
        .col-sm-6:has(.custom-select-wrapper.is-open),
        .col-4:has(.custom-select-wrapper.is-open),
        .col-12:has(.custom-select-wrapper.is-open),
        [class*="col-"]:has(.custom-select-wrapper.is-open),
        [class*="col-"].has-open-select {
            position: relative;
            z-index: 105 !important;
        }

        .custom-select-wrapper {
            position: relative;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
        }

        .custom-select-wrapper.is-open {
            z-index: 1100 !important;
        }

        .custom-select-trigger {
            background-color: #26201c;
            border: 1.5px solid rgba(212, 175, 101, 0.35);
            border-radius: 10px;
            color: #FAF6F0;
            font-size: 0.88rem;
            font-weight: 500;
            padding: 0.65rem 0.9rem;
            min-height: 44px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.5rem;
            cursor: pointer;
            user-select: none;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        .custom-select-trigger:hover {
            border-color: rgba(212, 175, 101, 0.7);
            background-color: #2c2420;
        }

        .custom-select-trigger:focus,
        .custom-select-wrapper.is-open .custom-select-trigger {
            background-color: #2e2621;
            border-color: #F59E0B;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.25);
            color: #FFFFFF;
        }

        .custom-select-trigger.is-disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
            border-color: rgba(255, 255, 255, 0.1);
            background-color: rgba(0, 0, 0, 0.25);
        }

        .custom-select-label {
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: left;
            min-width: 0;
            line-height: 1.3;
        }

        .custom-select-label.is-placeholder {
            color: rgba(250, 246, 240, 0.55);
        }

        .custom-select-arrow {
            font-size: 0.75rem;
            color: #D4AF65;
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            flex-shrink: 0;
        }

        .custom-select-wrapper.is-open .custom-select-arrow {
            transform: rotate(180deg);
        }

        .custom-select-menu {
            position: absolute;
            top: calc(100% + 4px);
            left: 0;
            right: 0;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            background: #1c1714 !important;
            background-color: #1c1714 !important;
            border: 1.5px solid rgba(212, 175, 101, 0.5) !important;
            border-radius: 10px;
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.85), 0 4px 12px rgba(0, 0, 0, 0.6) !important;
            max-height: 230px;
            overflow-y: auto;
            z-index: 99999 !important;
            padding: 4px;
            display: none;
            opacity: 1 !important;
        }

        .custom-select-menu.is-dropup {
            top: auto !important;
            bottom: calc(100% + 4px) !important;
            box-shadow: 0 -16px 36px rgba(0, 0, 0, 0.85), 0 -4px 12px rgba(0, 0, 0, 0.6) !important;
        }

        .custom-select-menu::-webkit-scrollbar {
            width: 5px;
        }

        .custom-select-menu::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 99px;
            margin: 3px 0;
        }

        .custom-select-menu::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 101, 0.45);
            border-radius: 99px;
        }

        .custom-select-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 175, 101, 0.75);
        }

        .custom-select-wrapper.is-open .custom-select-menu {
            display: block;
            animation: customSelectIn 0.18s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes customSelectIn {
            from {
                opacity: 0;
                transform: translateY(-4px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .custom-select-option {
            background-color: transparent;
            padding: 0.55rem 0.8rem;
            font-size: 0.86rem;
            font-weight: 500;
            color: #FAF6F0;
            border-radius: 7px;
            cursor: pointer;
            transition: all 0.15s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.5rem;
            box-sizing: border-box;
            word-break: break-word;
            margin-bottom: 2px;
        }

        .custom-select-option:last-child {
            margin-bottom: 0;
        }

        .custom-select-option:hover {
            background-color: rgba(212, 175, 101, 0.18) !important;
            color: #FFFFFF !important;
        }

        .custom-select-option.is-selected {
            background-color: rgba(212, 175, 101, 0.24) !important;
            color: #FCD34D !important;
            font-weight: 600;
        }

        .custom-select-option-text {
            flex: 1;
            min-width: 0;
        }

        .custom-select-check {
            color: #F59E0B;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            cursor: pointer;
        }

        .checkbox-item input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--gold);
            cursor: pointer;
            flex-shrink: 0;
        }

        .checkbox-item label {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.8);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .checkbox-price {
            color: var(--champagne);
            font-weight: 600;
            font-size: 0.78rem;
        }

        /* ===================================================
           MODERN ADD-ON CARDS & STEPPERS (KALKULATOR)
           =================================================== */
        .addon-cat-block {
            margin-bottom: 1.35rem;
        }

        .addon-cat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 0.45rem;
            margin-bottom: 0.85rem;
            border-bottom: 1px solid rgba(245, 158, 11, 0.35);
        }

        .addon-cat-title {
            font-family: var(--font-serif);
            font-size: 0.96rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #FCD34D;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
        }

        .addon-cat-title i {
            color: #F59E0B;
            font-size: 1.05rem;
        }

        .addon-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.65rem;
            width: 100%;
            box-sizing: border-box;
        }

        @media (max-width: 991px) {
            .addon-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.55rem;
            }
        }

        @media (max-width: 575px) {
            .calc-card {
                padding: 0.9rem 0.65rem !important;
            }

            .addon-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 0.45rem !important;
            }

            .addon-card {
                padding: 0.6rem 0.5rem !important;
            }

            .addon-card-name {
                font-size: 0.78rem !important;
            }

            .addon-card-price {
                font-size: 0.72rem !important;
            }

            .addon-card-action {
                justify-content: center !important;
            }

            .addon-unit-label {
                display: none !important;
            }

            .addon-stepper {
                width: 100% !important;
                justify-content: space-between !important;
            }

            .addon-btn-step {
                width: 28px !important;
                height: 25px !important;
                flex-shrink: 0 !important;
            }

            .addon-qty-val {
                width: 100% !important;
                height: 25px !important;
                font-size: 0.8rem !important;
            }
        }

        .addon-card {
            background: rgba(255, 255, 255, 0.035);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            padding: 0.75rem 0.85rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 0.5rem;
            transition: all 0.25s cubic-bezier(.4, 0, .2, 1);
            position: relative;
            min-width: 0;
            overflow: hidden;
            box-sizing: border-box;
            width: 100%;
        }

        .addon-card:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(184, 147, 60, 0.35);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
        }

        .addon-card.is-active {
            background: linear-gradient(135deg, rgba(184, 147, 60, 0.16) 0%, rgba(212, 175, 101, 0.08) 100%);
            border-color: var(--gold);
            box-shadow: 0 0 14px rgba(184, 147, 60, 0.22);
        }

        .addon-card-info {
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
            min-width: 0;
        }

        .addon-card-name {
            font-size: 0.82rem;
            font-weight: 700;
            color: #FAF6F0;
            line-height: 1.25;
            word-break: break-word;
        }

        .addon-card-price {
            font-size: 0.75rem;
            color: var(--champagne);
            font-weight: 600;
            line-height: 1.2;
            word-break: break-word;
        }

        .addon-card-desc {
            font-size: 0.68rem;
            color: rgba(255, 255, 255, 0.45);
            line-height: 1.3;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .addon-card-action {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.35rem;
            padding-top: 0.4rem;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            margin-top: auto;
            min-width: 0;
        }

        .addon-unit-label {
            font-size: 0.68rem;
            color: rgba(255, 255, 255, 0.45);
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .addon-stepper {
            display: inline-flex;
            align-items: center;
            background: rgba(0, 0, 0, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 6px;
            overflow: hidden;
            transition: all 0.2s;
            flex-shrink: 0;
        }

        .addon-card.is-active .addon-stepper {
            border-color: rgba(184, 147, 60, 0.6);
            background: rgba(0, 0, 0, 0.5);
        }

        .addon-btn-step {
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.75);
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.15s;
            user-select: none;
            line-height: 1;
            padding: 0;
            flex-shrink: 0;
        }

        .addon-btn-step:hover {
            background: var(--gold);
            color: #1a1512;
        }

        .addon-btn-step:active {
            transform: scale(0.9);
        }

        .addon-qty-val {
            width: 30px;
            height: 25px;
            background: transparent;
            border: none;
            border-left: 1px solid rgba(255, 255, 255, 0.08);
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            color: #FAF6F0;
            font-size: 0.78rem;
            font-weight: 700;
            text-align: center;
            outline: none;
            padding: 0;
            -moz-appearance: textfield;
            appearance: textfield;
        }

        .addon-qty-val::-webkit-inner-spin-button,
        .addon-qty-val::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* ── Layanan Tambahan (Langkah 2 Mode Paket) ── */
        .layanan-tambahan-block {
            background: rgba(255, 255, 255, 0.035);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 1.1rem;
            margin-bottom: 1.15rem;
            transition: all 0.2s ease;
        }

        .layanan-tambahan-block:hover {
            border-color: rgba(212, 175, 101, 0.25);
            background: rgba(255, 255, 255, 0.05);
        }

        .layanan-tambahan-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.6rem;
            padding-bottom: 0.45rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .layanan-tambahan-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: #FFF6DE;
            display: flex;
            align-items: center;
        }

        .layanan-tambahan-badge {
            font-size: 0.68rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #FBBF24;
            background: rgba(251, 191, 36, 0.12);
            border: 1px solid rgba(251, 191, 36, 0.3);
            padding: 0.15rem 0.5rem;
            border-radius: 20px;
        }

        .layanan-tambahan-desc {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.55);
            margin-bottom: 0.75rem;
            line-height: 1.45;
        }

        .layanan-tambahan-options {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .layanan-option-tile {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.75rem 0.85rem;
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(212, 175, 101, 0.2);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            margin: 0;
            width: 100%;
            box-sizing: border-box;
        }

        .layanan-option-tile:hover {
            background: rgba(212, 175, 101, 0.08);
            border-color: rgba(212, 175, 101, 0.45);
        }

        .layanan-option-tile:has(input:checked) {
            background: rgba(212, 175, 101, 0.16);
            border-color: #F59E0B;
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.15);
        }

        .layanan-option-tile input {
            accent-color: var(--gold);
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .layanan-option-info {
            flex: 1 1 auto;
            min-width: 0;
            display: flex;
            flex-direction: column;
            word-break: break-word;
        }

        .layanan-option-name {
            font-size: 0.88rem;
            font-weight: 600;
            color: #FAF6F0;
            line-height: 1.35;
        }

        .layanan-option-sub {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 3px;
            line-height: 1.4;
            word-break: break-word;
        }

        .layanan-option-price {
            font-size: 0.82rem;
            font-weight: 700;
            color: #FCD34D;
            white-space: nowrap;
            flex-shrink: 0;
            align-self: flex-start;
            margin-left: 0.5rem;
            text-align: right;
        }

        @media (max-width: 576px) {
            .layanan-tambahan-block {
                padding: 0.85rem;
            }
            .layanan-option-tile {
                flex-wrap: wrap;
                gap: 0.5rem;
                padding: 0.65rem 0.75rem;
            }
            .layanan-option-info {
                flex: 1 1 calc(100% - 30px);
            }
            .layanan-option-price {
                margin-left: 28px;
                margin-top: 0.2rem;
                align-self: flex-start;
                font-size: 0.76rem;
                background: rgba(212, 175, 101, 0.12);
                border: 1px solid rgba(212, 175, 101, 0.25);
                padding: 0.15rem 0.5rem;
                border-radius: 4px;
            }
        }

        /* ===================================================
           FACILITY ACCORDION (in package modal)
           =================================================== */
        .fac-accordion-item {
            border: 1px solid rgba(184, 147, 60, 0.18);
            border-radius: 10px;
            margin-bottom: 0.35rem;
            overflow: hidden;
            background: var(--warm-white);
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .fac-accordion-item:has(.fac-accordion-body.open) {
            border-color: rgba(184, 147, 60, 0.35);
            box-shadow: 0 2px 8px rgba(184, 147, 60, 0.06);
        }

        .fac-accordion-btn {
            width: 100%;
            background: var(--warm-white);
            border: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.48rem 0.65rem;
            cursor: pointer;
            gap: 0.45rem;
            transition: background .2s;
        }

        .fac-accordion-btn:hover {
            background: rgba(184, 147, 60, 0.06);
        }

        .fac-accordion-label {
            font-size: 0.76rem;
            font-weight: 700;
            letter-spacing: 0.02em;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.45rem;
            text-align: left;
            line-height: 1.3;
        }

        .fac-accordion-icon-wrap {
            width: 24px;
            height: 24px;
            min-width: 24px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            color: var(--gold);
            background: linear-gradient(135deg, rgba(184, 147, 60, 0.12), rgba(212, 175, 101, 0.06));
            border: 1px solid rgba(184, 147, 60, 0.2);
        }

        .fac-accordion-chevron {
            color: var(--gold);
            transition: transform .25s;
            flex-shrink: 0;
            font-size: 0.68rem;
            opacity: 0.6;
        }

        .fac-accordion-chevron.open {
            transform: rotate(180deg);
            opacity: 1;
        }

        .fac-accordion-body {
            display: none;
            padding: 0.45rem 0.65rem 0.65rem;
            background: linear-gradient(180deg, rgba(247, 244, 239, 0.8) 0%, var(--cream) 100%);
            border-top: 1px solid rgba(184, 147, 60, 0.1);
        }

        .fac-accordion-body.open {
            display: block;
        }

        .fac-item-row {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.22rem 0.4rem;
            margin-bottom: 0.2rem;
            font-size: 0.78rem;
            color: var(--text-secondary);
            line-height: 1.35;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 6px;
            border: 1px solid rgba(184, 147, 60, 0.08);
            transition: background 0.2s, border-color 0.2s;
        }

        .fac-item-row:hover {
            background: rgba(255, 255, 255, 0.95);
            border-color: rgba(184, 147, 60, 0.2);
        }

        .fac-item-row:last-child {
            margin-bottom: 0;
        }

        .fac-item-row i {
            color: var(--gold);
            font-size: 0.58rem;
            flex-shrink: 0;
        }

        .fac-item-row span {
            word-break: break-word;
            flex: 1;
        }

        /* Modal desc styling */
        .modal-desc-text {
            color: var(--text-secondary);
            font-size: 0.82rem;
            line-height: 1.55;
            margin-bottom: 0.85rem;
            padding: 0.6rem 0.8rem;
            background: rgba(184, 147, 60, 0.04);
            border-left: 3px solid var(--gold);
            border-radius: 0 6px 6px 0;
        }

        .modal-fac-heading {
            font-family: var(--font-serif);
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.65rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .modal-fac-heading i {
            color: var(--gold);
            font-size: 0.88rem;
        }

        /* Modal body responsive */
        .modal-body {
            padding: 1.5rem 2rem;
        }

        @media (max-width: 576px) {
            .modal-body {
                padding: 1rem 0.75rem;
            }

            .modal-header {
                padding: 1rem 0.85rem;
            }

            .modal-title-custom {
                font-size: 1.25rem;
            }

            .modal-price {
                font-size: 1rem;
            }

            .fac-accordion-label {
                font-size: 0.75rem;
            }

            .fac-accordion-icon-wrap {
                width: 26px;
                height: 26px;
                min-width: 26px;
                font-size: 0.75rem;
                border-radius: 6px;
            }

            .fac-accordion-btn {
                padding: 0.55rem 0.7rem;
            }

            .fac-item-row {
                font-size: 0.78rem;
                padding: 0.25rem 0.4rem;
            }

            .fac-item-row i {
                font-size: 0.55rem;
            }

            .modal-desc-text {
                font-size: 0.82rem;
                padding: 0.7rem 0.85rem;
                margin-bottom: 1rem;
            }

            .modal-fac-heading {
                font-size: 0.92rem;
                margin-bottom: 0.65rem;
            }

            /* Modal bottom buttons stack vertically on mobile */
            .modal-body .d-flex.gap-3 {
                flex-direction: column;
                gap: 0.5rem !important;
            }

            .modal-body .d-flex.gap-3 .btn-wa,
            .modal-body .d-flex.gap-3 .btn-outline-gold {
                width: 100%;
                text-align: center;
                justify-content: center;
                font-size: 0.82rem;
                padding: 0.65rem 1rem;
            }
        }

        /* ===================================================
           CALCULATOR TABS
           =================================================== */
        .calc-mode-tabs {
            display: flex;
            gap: 0;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 50px;
            padding: 4px;
            width: fit-content;
            margin: 0 auto 2.5rem;
        }

        .calc-mode-tab {
            background: transparent;
            border: none;
            border-radius: 50px;
            padding: 0.6rem 1.8rem;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .calc-mode-tab.active {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: #fff;
            box-shadow: 0 4px 15px rgba(184, 147, 60, 0.35);
        }

        .calc-mode-tab:hover:not(.active) {
            color: var(--champagne);
            background: rgba(184, 147, 60, 0.1);
        }

        /* Venue radio group */
        .venue-radio-group {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 0.5rem;
        }

        .venue-radio-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.88rem;
            background: rgba(255, 255, 255, 0.06);
            border: 1.5px solid rgba(255, 255, 255, 0.14);
            border-radius: 30px;
            padding: 0.4rem 1rem;
            transition: all 0.25s;
        }

        .venue-radio-label:hover {
            border-color: rgba(184, 147, 60, 0.5);
            color: var(--champagne);
        }

        .venue-radio-label input[type="radio"]:checked+span {
            color: var(--champagne);
        }

        .venue-radio-label:has(input:checked) {
            border-color: var(--gold);
            background: rgba(184, 147, 60, 0.14);
            color: var(--champagne);
        }

        /* Hasil Kalkulasi */
        .result-panel {
            background: rgba(184, 147, 60, 0.09);
            border: 1px solid rgba(184, 147, 60, 0.3);
            border-radius: var(--radius-card);
            padding: 1.5rem;
            position: sticky;
            top: 90px;
        }

        .result-title {
            font-family: var(--font-serif);
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--champagne);
            margin-bottom: 1rem;
        }

        .result-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 0.4rem;
            padding: 0.4rem 0;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.12);
            font-size: 0.82rem;
        }

        .result-item:last-of-type {
            border-bottom: none;
        }

        .result-item-name {
            color: rgba(255, 255, 255, 0.75);
            flex: 1;
        }

        .result-item-price {
            color: white;
            font-weight: 600;
            white-space: nowrap;
        }

        .result-total-bar {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border-radius: 10px;
            padding: 0.85rem 1.25rem;
            margin-top: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .result-total-label {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            font-size: 0.85rem;
        }

        .result-total-amount {
            font-family: var(--font-serif);
            font-size: 1.25rem;
            font-weight: 700;
            color: white;
        }

        .btn-wa {
            background: #25D366;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.6rem;
            font-weight: 700;
            font-size: 0.85rem;
            transition: var(--transition);
            cursor: pointer;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
        }

        .btn-wa:hover {
            background: #1ebe5d;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.35);
        }

        /* ===================================================
           VENDOR SHOWCASE
           =================================================== */
        #team {
            padding: 4.5rem 0;
            background: var(--cream);
            position: relative;
        }

        #team::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 50% 0%, rgba(184, 147, 60, 0.06) 0%, transparent 60%);
            pointer-events: none;
        }

        /* Category filter tabs */
        .vendor-tabs-wrapper {
            position: relative;
            margin-bottom: 2rem;
        }

        .vendor-scroll-hint {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            font-size: 0.75rem;
            color: var(--gold-dark);
            font-weight: 600;
            margin-bottom: 0.75rem;
            letter-spacing: 0.02em;
        }

        .vendor-scroll-hint i {
            animation: bounceHorizontal 1.4s infinite ease-in-out;
            font-size: 0.85rem;
        }

        @keyframes bounceHorizontal {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(4px); }
        }

        .vendor-tabs {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.4rem;
        }

        .vendor-tab-btn {
            background: var(--warm-white);
            border: 1px solid rgba(184, 147, 60, 0.2);
            border-radius: 50px;
            padding: 0.45rem 1rem;
            font-family: var(--font-sans);
            font-size: 0.78rem;
            font-weight: 600;
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .vendor-tab-btn:hover {
            border-color: var(--gold);
            color: var(--gold);
            background: rgba(184, 147, 60, 0.06);
        }

        .vendor-tab-btn.active {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: white;
            border-color: var(--gold);
            box-shadow: 0 3px 14px rgba(184, 147, 60, 0.25);
        }

        .vendor-tab-btn i {
            font-size: 0.8rem;
        }

        /* Vendor card */
        .vendor-card {
            background: var(--warm-white);
            border: 1px solid rgba(184, 147, 60, 0.12);
            border-radius: var(--radius-card);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .vendor-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(184, 147, 60, 0.3);
        }

        .vendor-photo-wrap {
            position: relative;
            overflow: hidden;
            height: 155px;
        }

        .vendor-photo-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .vendor-card:hover .vendor-photo-wrap img {
            transform: scale(1.05);
        }

        .vendor-photo-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent 40%, rgba(44, 36, 32, 0.5) 100%);
        }

        .vendor-category-badge {
            position: absolute;
            top: 0.55rem;
            left: 0.55rem;
            background: rgba(184, 147, 60, 0.92);
            color: white;
            font-size: 0.58rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.2rem 0.5rem;
            border-radius: 50px;
            backdrop-filter: blur(6px);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .vendor-body {
            padding: 0.85rem 0.85rem 0.35rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .vendor-name {
            font-family: var(--font-serif);
            font-size: 0.98rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.15rem;
            line-height: 1.3;
        }

        .vendor-handle {
            font-size: 0.72rem;
            color: var(--gold);
            font-weight: 500;
            margin-bottom: 0.35rem;
        }

        .vendor-desc {
            font-size: 0.76rem;
            color: var(--text-secondary);
            line-height: 1.45;
            flex: 1;
            margin-bottom: 0.5rem;
        }

        .vendor-cta {
            padding: 0 0.85rem 0.85rem;
            display: flex;
            gap: 0.4rem;
        }

        .vendor-btn-ig {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            flex: 1;
            padding: 0.45rem 0.6rem;
            font-size: 0.72rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: var(--transition);
            background: linear-gradient(135deg, #833AB4, #E1306C, #F77737);
            color: white;
            border: none;
        }

        .vendor-btn-ig:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 16px rgba(225, 48, 108, 0.35);
            color: white;
        }

        /* Responsive */
        @media (max-width: 767px) {
            .vendor-scroll-hint {
                display: flex;
            }

            .vendor-tabs-wrapper {
                position: relative;
                margin-bottom: 1.5rem;
            }

            .vendor-tabs-wrapper::after {
                content: '';
                position: absolute;
                right: 0;
                top: 0;
                bottom: 0.5rem;
                width: 36px;
                background: linear-gradient(90deg, transparent, var(--cream));
                pointer-events: none;
                z-index: 2;
                border-radius: 0 50px 50px 0;
            }

            .vendor-tabs {
                gap: 0.45rem;
                justify-content: flex-start;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: rgba(184, 147, 60, 0.4) transparent;
                flex-wrap: nowrap;
                padding-bottom: 0.65rem;
                padding-right: 2rem;
            }

            .vendor-tabs::-webkit-scrollbar {
                height: 4px;
                display: block;
            }

            .vendor-tabs::-webkit-scrollbar-track {
                background: rgba(0, 0, 0, 0.05);
                border-radius: 10px;
            }

            .vendor-tabs::-webkit-scrollbar-thumb {
                background: rgba(184, 147, 60, 0.35);
                border-radius: 10px;
            }

            .vendor-tab-btn {
                font-size: 0.72rem;
                padding: 0.45rem 0.85rem;
                white-space: nowrap;
                flex-shrink: 0;
            }

            .vendor-photo-wrap {
                height: 130px;
            }

            .vendor-name {
                font-size: 0.9rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .vendor-handle {
                font-size: 0.7rem;
            }

            .vendor-desc {
                font-size: 0.74rem;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                line-height: 1.5;
            }

            .vendor-body {
                padding: 0.75rem 0.75rem 0.5rem;
            }

            .vendor-cta {
                padding: 0 0.75rem 0.75rem;
            }

            .vendor-btn-ig {
                font-size: 0.72rem;
                padding: 0.5rem 0.6rem;
            }

            .vendor-card:hover {
                transform: none;
            }

            .vendor-category-badge {
                font-size: 0.55rem;
                padding: 0.2rem 0.5rem;
                top: 0.5rem;
                left: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .vendor-photo-wrap {
                height: 110px;
            }

            .vendor-name {
                font-size: 0.82rem;
            }

            .vendor-handle {
                font-size: 0.65rem;
            }

            .vendor-desc {
                font-size: 0.7rem;
                -webkit-line-clamp: 2;
                line-clamp: 2;
            }

            .vendor-btn-ig {
                font-size: 0.68rem;
                padding: 0.45rem 0.5rem;
                gap: 0.3rem;
            }

            .vendor-category-badge {
                font-size: 0.5rem;
                padding: 0.15rem 0.4rem;
                gap: 0.2rem;
            }
        }

        @media (max-width: 360px) {
            .vendor-photo-wrap {
                height: 95px;
            }

            .vendor-name {
                font-size: 0.78rem;
            }

            .vendor-desc {
                -webkit-line-clamp: 2;
                line-clamp: 2;
                font-size: 0.65rem;
            }

            .vendor-btn-ig {
                font-size: 0.62rem;
            }
        }

        /* ===================================================
           KONTAK
           =================================================== */
        #kontak {
            padding: 4.5rem 0;
            background: #EEF3FA;
            position: relative;
        }

        #kontak::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(184, 147, 60, 0.35), transparent);
        }

        .contact-info-card {
            background: var(--warm-white);
            border: 1px solid rgba(184, 147, 60, 0.15);
            border-radius: var(--radius-card);
            padding: 1.5rem;
            height: 100%;
            box-shadow: var(--shadow-card);
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
            padding: 0.85rem 0;
            border-bottom: 1px solid rgba(44, 36, 32, 0.07);
        }

        .contact-info-item:last-child {
            border-bottom: none;
        }

        .contact-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, rgba(184, 147, 60, 0.15), rgba(212, 175, 101, 0.08));
            border: 1px solid rgba(184, 147, 60, 0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 1rem;
            flex-shrink: 0;
            box-shadow: 0 3px 10px rgba(184, 147, 60, 0.1);
        }

        .contact-info-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .contact-info-value {
            font-size: 0.88rem;
            color: var(--text-primary);
            font-weight: 500;
            margin-top: 0.12rem;
        }

        .map-wrapper {
            border-radius: var(--radius-card);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            height: 260px;
        }

        .map-wrapper iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* ===================================================
           FOOTER
           =================================================== */
        footer {
            background: #2A2A2A;
            color: rgba(255, 255, 255, 0.65);
            padding: 2.5rem 0 1.25rem;
            border-top: 1px solid rgba(184, 147, 60, 0.2);
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
            opacity: 0.5;
        }

        .footer-brand {
            font-family: var(--font-serif);
            font-size: 1.5rem;
            font-weight: 700;
            color: #FAF6F0;
        }

        .footer-tagline {
            font-size: 0.82rem;
            margin-top: 0.4rem;
            line-height: 1.65;
            color: rgba(255, 255, 255, 0.5);
        }

        .footer-heading {
            font-family: var(--font-sans);
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--champagne);
            margin-bottom: 0.85rem;
        }

        .footer-link {
            display: block;
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            padding: 0.25rem 0;
            transition: var(--transition);
        }

        .footer-link:hover {
            color: var(--champagne);
            padding-left: 0.4rem;
        }

        .footer-divider {
            border-color: rgba(255, 255, 255, 0.08);
            margin: 1.5rem 0 0.85rem;
        }

        .footer-copy {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.35);
            text-align: center;
        }

        .footer-gold {
            color: var(--champagne);
        }

        /* ===================================================
           RESPONSIVE
           =================================================== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.4rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .section-title,
            .section-title-light {
                font-size: 2.2rem;
            }

            .section-label {
                font-size: 0.7rem;
            }

            .result-panel {
                position: static;
                margin-top: 1.5rem;
            }

            .hero-scroll {
                display: none;
            }

            /* Prevent hero section overflow on mobile */
            #home {
                overflow: hidden;
                min-height: 90vh;
            }

            /* Portfolio height for tablets */
            .portfolio-img-wrap {
                height: 200px;
            }

            .portfolio-body {
                padding: 0.85rem;
            }

            .portfolio-title {
                font-size: 0.95rem;
            }

            .portfolio-desc {
                font-size: 0.78rem;
                -webkit-line-clamp: 2;
                line-clamp: 2;
            }

            /* Feature cards compact */
            .feature-icon {
                width: 48px;
                height: 48px;
                font-size: 1.3rem;
                margin-bottom: 1rem;
            }

            .feature-title {
                font-size: 1.1rem;
            }

            .feature-desc {
                font-size: 0.84rem;
            }

            /* Contact section */
            .contact-info-card {
                padding: 1.25rem;
            }

            .map-wrapper {
                height: 250px;
            }

            /* Kalkulator responsive */
            .checkbox-item label {
                font-size: 0.82rem;
                word-break: break-word;
            }

            .checkbox-price {
                font-size: 0.75rem;
                white-space: nowrap;
            }

            .calc-card {
                padding: 1rem;
            }

            /* Calc section title smaller on tablet/mobile */
            .calc-section-title {
                font-size: 0.95rem;
            }

            /* Calc mode tabs responsive */
            .calc-mode-tabs {
                width: 100%;
                max-width: 100%;
            }

            .calc-mode-tab {
                padding: 0.5rem 1.2rem;
                font-size: 0.78rem;
                flex: 1;
                justify-content: center;
            }

            /* Make sure dek labels don't overflow */
            .dek-item-wrapper label {
                align-items: flex-start !important;
                padding: 0.5rem !important;
            }

            .dek-item-wrapper label>span {
                font-size: 0.85rem !important;
                word-break: break-word;
            }

            /* Navbar brand logo on mobile */
            .navbar-logo {
                height: 36px;
            }

            /* Container padding fix */
            .container-xl {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            /* Reduce section vertical padding on mobile */
            #paketan,
            #portofolio,
            #team,
            #kalkulator,
            #keunggulan,
            #kontak {
                padding: 3.5rem 0;
            }

            /* Tighter card gap on mobile */
            #paketan .row.g-4,
            #portofolio .row.g-4,
            #team .row.g-4 {
                --bs-gutter-x: 0.8rem;
                --bs-gutter-y: 0.8rem;
            }

            /* Form label & input sizing */
            .form-label-custom {
                font-size: 0.78rem;
            }

            .form-control-custom,
            .form-select-custom {
                font-size: 0.84rem;
                padding: 0.5rem 0.8rem;
            }

            /* Venue radio group */
            .venue-radio-label {
                font-size: 0.82rem;
                padding: 0.35rem 0.8rem;
            }

            /* Paket info box dalam kalkulator */
            #paket-info>div {
                flex-direction: column !important;
                gap: 0.4rem !important;
            }

            /* Result panel compact */
            .result-panel {
                padding: 1.25rem;
            }

            .result-title {
                font-size: 1.15rem;
            }

            .result-item {
                font-size: 0.8rem;
            }

            .result-item-name {
                font-size: 0.78rem;
            }

            .result-item-price {
                font-size: 0.8rem;
            }

            .result-total-amount {
                font-size: 1.15rem;
            }

            /* === Add-on kalkulator: layout rapi di HP (768px) === */
            .qty-group {
                padding: 0.5rem 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }

            /* Nama add-on pindah ke baris sendiri agar tidak mepet */
            .qty-group .qty-label {
                flex: 1 1 100%;
                font-size: 0.82rem;
                margin-bottom: 0.25rem;
            }

            /* Badge harga + input + satuan sejajar kiri di bawah nama */
            .qty-group>div:first-child {
                flex-wrap: wrap;
                align-items: center;
                gap: 0.35rem;
            }

            .qty-price-badge {
                font-size: 0.7rem;
                padding: 2px 7px;
            }

            .qty-input {
                width: 58px;
                min-width: 48px;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 0.92rem;
            }

            .section-title,
            .section-title-light {
                font-size: 1.7rem;
            }

            .package-name {
                font-size: 1.4rem;
            }

            .package-price {
                font-size: 1.2rem;
            }

            /* Package card mobile: compact seperti portfolio */
            .package-header {
                padding: 0.85rem 0.85rem 0.6rem;
            }

            .package-body {
                padding: 0 0.85rem 0.5rem;
            }

            .package-cta {
                padding: 0.4rem 0.85rem 0.85rem;
            }

            .package-desc {
                font-size: 0.75rem;
                margin-bottom: 0.5rem;
                -webkit-line-clamp: 2;
                line-clamp: 2;
            }

            .pkg-facility-list {
                display: none;
            }

            /* sembunyikan list fasilitas di mobile */
            .pkg-more {
                display: none;
            }

            .package-name {
                font-size: 1rem !important;
                margin-bottom: 0.3rem;
            }

            .package-price {
                font-size: 0.95rem !important;
            }

            .package-price sub {
                font-size: 0.65rem;
            }

            /* Tombol CTA mobile: stack vertikal, rapi */
            .package-cta .btn-detail {
                font-size: 0.75rem;
                padding: 0.5rem 0.8rem;
                border-radius: 40px;
            }

            .package-cta .cta-row {
                display: none !important;
            }

            /* cukup satu tombol Lihat Detail */
            .batch-tab-btn {
                padding: 0.4rem 1rem;
                font-size: 0.72rem;
            }

            .btn-outline-gold {
                padding: 0.6rem 1.2rem;
                font-size: 0.85rem;
            }

            .dek-detail-box ul li {
                font-size: 0.8rem !important;
            }

            /* Portfolio compact on small screens */
            .portfolio-img-wrap {
                height: 160px;
            }

            .portfolio-body {
                padding: 0.65rem 0.75rem;
            }

            .portfolio-title {
                font-size: 0.85rem;
                margin-bottom: 0.15rem;
            }

            .portfolio-desc {
                font-size: 0.72rem;
                -webkit-line-clamp: 2;
                line-clamp: 2;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .portfolio-img-count {
                font-size: 0.65rem;
            }

            .portfolio-card:hover {
                transform: none;
            }

            /* Feature cards very compact */
            .feature-card {
                padding: 1.2rem;
            }

            .feature-icon {
                width: 42px;
                height: 42px;
                font-size: 1.1rem;
                margin-bottom: 0.85rem;
            }

            .feature-title {
                font-size: 1rem;
                margin-bottom: 0.5rem;
            }

            .feature-desc {
                font-size: 0.78rem;
                line-height: 1.55;
            }

            /* Hero compact */
            .hero-badge {
                font-size: 0.62rem;
                padding: 0.35rem 0.85rem;
                letter-spacing: 0.15em;
            }

            .hero-title {
                font-size: 1.8rem !important;
            }

            .hero-subtitle {
                font-size: 0.88rem;
            }

            .hero-divider {
                margin: 1rem 0 !important;
            }

            .btn-gold,
            .btn-outline-gold {
                font-size: 0.78rem;
                padding: 0.6rem 1rem;
            }

            /* Contact compact */
            .contact-info-card {
                padding: 1rem;
            }

            .contact-icon {
                width: 36px;
                height: 36px;
                font-size: 0.9rem;
            }

            .contact-info-label {
                font-size: 0.65rem;
            }

            .contact-info-value {
                font-size: 0.85rem;
            }

            .map-wrapper {
                height: 200px;
            }

            /* Footer compact */
            .footer-brand {
                font-size: 1.4rem;
            }

            .footer-tagline {
                font-size: 0.78rem;
            }

            .footer-link {
                font-size: 0.8rem;
                padding: 0.25rem 0;
            }

            .footer-heading {
                font-size: 0.65rem;
                margin-bottom: 0.65rem;
            }

            /* ===== KALKULATOR mobile fixes ===== */
            #kalkulator {
                padding: 2.5rem 0;
            }

            /* Calc card lebih compact */
            .calc-card {
                padding: 0.85rem;
            }

            .calc-section-title {
                font-size: 0.88rem;
                padding-bottom: 0.5rem;
                margin-bottom: 0.85rem;
            }

            .calc-section-title i {
                font-size: 0.85rem;
            }

            /* Calc mode tabs — compact untuk layar kecil */
            .calc-mode-tabs {
                padding: 3px;
                border-radius: 40px;
            }

            .calc-mode-tab {
                padding: 0.4rem 0.75rem;
                font-size: 0.72rem;
                gap: 0.3rem;
                flex: 1;
                justify-content: center;
            }

            .calc-mode-tab i {
                font-size: 0.72rem;
            }

            /* Form elements lebih compact */
            .form-label-custom {
                font-size: 0.74rem;
                margin-bottom: 0.3rem;
            }

            .form-control-custom,
            .form-select-custom,
            .custom-select-trigger {
                font-size: 0.82rem;
                padding: 0.5rem 0.75rem;
                border-radius: 8px;
            }

            .custom-select-option {
                font-size: 0.80rem;
                padding: 0.48rem 0.7rem;
            }

            .custom-select-menu {
                max-height: 200px;
                border-radius: 8px;
            }

            /* Paket info box responsive */
            #paket-info {
                padding: 0.75rem !important;
            }

            #paket-info #pi-name {
                font-size: 0.95rem !important;
            }

            #paket-info #pi-price {
                font-size: 1rem !important;
            }

            /* Venue radio compact */
            .venue-radio-group {
                gap: 0.5rem;
            }

            .venue-radio-label {
                font-size: 0.8rem;
                padding: 0.35rem 0.75rem;
                border-radius: 25px;
            }

            .venue-radio-label small {
                font-size: 0.6rem !important;
            }

            /* Dek items compact */
            .dek-item-wrapper label {
                padding: 0.45rem 0.6rem !important;
                gap: 0.5rem !important;
            }

            .dek-item-wrapper label>span {
                font-size: 0.8rem !important;
            }

            .dek-item-wrapper .checkbox-price {
                font-size: 0.72rem;
            }

            .dek-detail-box {
                padding: 0.75rem !important;
            }

            /* Add-on qty group mobile: layout tetap rapi */
            .qty-group {
                padding-top: 0.4rem;
                padding-bottom: 0.4rem;
            }

            .qty-group>div:first-child {
                flex-wrap: wrap;
                gap: 0.4rem;
            }

            .qty-group .qty-label {
                font-size: 0.78rem;
                min-width: 0;
                flex: 1 1 100%;
            }

            .qty-group>div>div {
                flex-shrink: 0;
                gap: 0.3rem;
            }

            .qty-price-badge {
                font-size: 0.65rem;
                padding: 1px 6px;
            }

            .qty-input {
                width: 50px;
                min-width: 42px;
                font-size: 0.8rem;
                padding: 0.3rem 0.35rem;
            }

            /* Result panel compact */
            .result-panel {
                padding: 1rem;
            }

            .result-title {
                font-size: 1.05rem;
                margin-bottom: 0.85rem;
            }

            .result-total-bar {
                flex-direction: column;
                gap: 0.4rem;
                text-align: center;
                padding: 0.85rem 1rem;
                border-radius: 10px;
            }

            .result-total-label {
                font-size: 0.82rem;
            }

            .result-total-amount {
                font-size: 1.15rem;
            }

            .result-item {
                font-size: 0.78rem;
                padding: 0.4rem 0;
            }

            .result-item-name {
                font-size: 0.76rem;
            }

            .result-item-price {
                font-size: 0.78rem;
            }

            #result-mode {
                font-size: 0.65rem;
                margin-bottom: 0.75rem;
            }

            /* WhatsApp button compact */
            .btn-wa {
                font-size: 0.82rem;
                padding: 0.7rem 1.5rem;
            }

            /* Kalkulator description text */
            #kalkulator .section-title {
                font-size: 1.6rem !important;
            }

            /* Add-on description text */
            .qty-group p {
                font-size: 0.72rem !important;
            }

            /* Category dividers in addons */
            #addon-paket-card>div>div:first-child,
            #form-custom .calc-card>div>div:first-child {
                font-size: 0.68rem !important;
            }

            /* Order Modal Responsive on Mobile */
            #orderModal .modal-header {
                padding: 1.1rem 1.2rem !important;
            }

            #orderModal .modal-body {
                padding: 1.1rem 1.2rem !important;
            }

            #orderModal .order-modal-actions {
                flex-direction: column !important;
                gap: 0.5rem !important;
            }

            #orderModal .order-modal-actions button {
                width: 100% !important;
                padding: 0.75rem 1rem !important;
                font-size: 0.84rem !important;
            }
        }

        /* Extra small screens (below 360px) */
        @media (max-width: 360px) {
            .calc-mode-tab {
                font-size: 0.65rem;
                padding: 0.35rem 0.5rem;
            }

            .calc-section-title {
                font-size: 0.82rem;
            }

            .form-control-custom,
            .form-select-custom,
            .custom-select-trigger {
                font-size: 0.78rem;
                padding: 0.45rem 0.6rem;
            }

            .custom-select-option {
                font-size: 0.76rem;
                padding: 0.42rem 0.6rem;
            }

            .venue-radio-label {
                font-size: 0.75rem;
            }

            .qty-group .qty-label {
                font-size: 0.75rem;
            }

            .qty-price-badge {
                font-size: 0.6rem;
            }

            .result-panel {
                padding: 0.85rem;
            }

            .result-title {
                font-size: 0.95rem;
            }

            .package-name {
                font-size: 0.9rem !important;
            }

            .package-price {
                font-size: 0.85rem !important;
            }

            .navbar-brand-text span {
                font-size: 1.2rem;
            }

            /* Extra small: hero, sections, contact, footer */
            .hero-title {
                font-size: 1.6rem !important;
            }

            .hero-subtitle {
                font-size: 0.82rem;
            }

            .hero-badge {
                font-size: 0.55rem;
                padding: 0.3rem 0.7rem;
            }

            .section-title,
            .section-title-light {
                font-size: 1.4rem !important;
            }

            .section-label {
                font-size: 0.62rem;
            }

            .portfolio-img-wrap {
                height: 130px;
            }

            .portfolio-title {
                font-size: 0.78rem;
            }

            .portfolio-desc {
                font-size: 0.68rem;
            }

            .feature-card {
                padding: 1rem;
            }

            .feature-title {
                font-size: 0.9rem;
            }

            .feature-desc {
                font-size: 0.72rem;
            }

            .contact-info-value {
                font-size: 0.78rem;
                word-break: break-word;
            }

            .contact-icon {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
            }

            .map-wrapper {
                height: 180px;
            }

            .footer-brand {
                font-size: 1.2rem;
            }

            .footer-link {
                font-size: 0.75rem;
            }

            .footer-copy {
                font-size: 0.68rem;
            }
        }

        /* ===================================================
           SCROLL ANIMATIONS
           =================================================== */
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>

    {{-- ======================== NAVBAR ======================== --}}
    <nav id="navbar">
        <div class="container-xl">
            <div class="d-flex align-items-center justify-content-between">
                <a href="#home" class="navbar-brand-text d-flex align-items-center gap-2">
                    <img src="{{ asset('images/logo.JPG') }}" alt="Kembar Kencana Logo" class="navbar-logo"
                        style="height:40px;width:auto;object-fit:contain;border-radius:6px;flex-shrink:0;">
                    <span>Kembar Kencana</span>
                </a>

                {{-- Desktop Nav --}}
                <div class="d-none d-md-flex align-items-center gap-1">
                    <a href="#home" class="nav-link-custom">Home</a>
                    <a href="#portofolio" class="nav-link-custom">Portofolio</a>
                    <a href="#paketan" class="nav-link-custom">Paketan</a>
                    <a href="#kalkulator" class="nav-link-custom">Kalkulator</a>
                    <a href="#team" class="nav-link-custom">Vendor</a>
                    <a href="#artikel" class="nav-link-custom">Update</a>
                    <a href="#kontak" class="nav-link-custom">Kontak</a>
                    <a href="{{ route('login') }}" class="btn-outline-gold ms-3 py-2 px-3" style="font-size:0.82rem;">
                        <i class="bi bi-shield-lock me-1"></i> Admin
                    </a>
                </div>

                {{-- Mobile Hamburger --}}
                <button class="navbar-toggler-custom d-md-none" id="menuToggle">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                </button>
            </div>

            {{-- Mobile Dropdown --}}
            <div id="mobileMenu" style="display:none; padding-top:1rem; padding-bottom:0.5rem;">
                <div class="d-flex flex-column gap-1">
                    <a href="#home" class="nav-link-custom">Home</a>
                    <a href="#portofolio" class="nav-link-custom">Portofolio</a>
                    <a href="#paketan" class="nav-link-custom">Paketan</a>
                    <a href="#kalkulator" class="nav-link-custom">Kalkulator</a>
                    <a href="#team" class="nav-link-custom">Vendor</a>
                    <a href="#artikel" class="nav-link-custom">Update</a>
                    <a href="#kontak" class="nav-link-custom">Kontak</a>
                    <a href="{{ route('login') }}" class="btn-gold mt-2" style="font-size:0.82rem;text-align:center;">
                        <i class="bi bi-shield-lock me-1"></i> Login Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ======================== HERO ======================== --}}

    <section id="home">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="container-xl hero-content py-5">
            <div class="row align-items-center" style="min-height:100vh;">
                <div class="col-lg-7" data-aos="fade-right" data-aos-duration="900">
                    <span class="hero-badge mb-4 d-inline-flex">
                        <i class="bi bi-gem"></i> Wedding Planner Profesional
                    </span>
                    <h1 class="hero-title mt-3">
                        Wujudkan<br>
                        <span>Pernikahan</span><br>
                        Impian Anda
                    </h1>
                    <div class="hero-divider my-4"></div>
                    <p class="hero-subtitle mb-5">
                        Kami hadir sebagai mitra terpercaya untuk momen sakral Anda. Dari dekorasi elegan hingga dokumentasi menawan — semua kami tangani dengan penuh cinta dan profesionalisme.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#paketan" class="btn-gold">
                            <i class="bi bi-gem me-2"></i>Lihat Paket Pernikahan
                        </a>
                        <a href="#kalkulator" class="btn-outline-gold" style="color:#E8C97A;border-color:rgba(232,201,122,0.6);">
                            <i class="bi bi-calculator me-2"></i>Hitung Biaya
                        </a>
                    </div>
                </div>

                <div class="col-lg-5 d-none d-lg-flex justify-content-end" data-aos="fade-left" data-aos-duration="900" data-aos-delay="200">
                    <div class="d-flex gap-3">
                        <div class="hero-stat p-3" style="background:rgba(255,255,255,0.08);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.15);border-radius:16px;">
                            <div class="number">250+</div>
                            <div class="label">Pernikahan Sukses</div>
                        </div>
                        <div class="hero-stat p-3" style="background:rgba(196,154,60,0.15);backdrop-filter:blur(12px);border:1px solid rgba(196,154,60,0.35);border-radius:16px;margin-top:2rem;">
                            <div class="number">8+</div>
                            <div class="label">Tahun Pengalaman</div>
                        </div>
                        <div class="hero-stat p-3" style="background:rgba(255,255,255,0.08);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.15);border-radius:16px;margin-top:1rem;">
                            <div class="number">98%</div>
                            <div class="label">Klien Puas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-scroll">
            <span>Scroll</span>
            <i class="bi bi-chevron-double-down"></i>
        </div>
    </section>

    {{-- ======================== KEUNGGULAN ======================== --}}
    <section id="keunggulan">
        <div class="container-xl">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-label">Mengapa Kami</span>
                <h2 class="section-title mt-2">Keunggulan Kembar Kencana<br>Wedding Planner</h2>
                <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
            </div>

            <div class="row g-4">
                @php
                $features = [
                ['icon' => 'bi-gem', 'title' => 'Tim Profesional', 'desc' => 'Lebih dari 8 tahun pengalaman. Tim kami terdiri dari wedding planner, dekorator, fotografer, dan makeup artist berpengalaman.'],
                ['icon' => 'bi-heart-fill', 'title' => 'Sepenuh Hati', 'desc' => 'Setiap detail pernikahan Anda kami tangani dengan dedikasi dan cinta, memastikan momen terbaik sepanjang hari spesial Anda.'],
                ['icon' => 'bi-shield-check','title' => 'Terpercaya & Terstruktur','desc' => 'Laporan progres persiapan transparan, kontrak jelas, dan tim siap mendampingi dari H-6 bulan hingga hari H.'],
                ['icon' => 'bi-palette2', 'title' => 'Dekorasi Eksklusif', 'desc' => 'Konsep dekorasi custom sesuai impian Anda — dari rustic minimal hingga grand ballroom mewah.'],
                ['icon' => 'bi-camera2', 'title' => 'Dokumentasi Premium', 'desc' => 'Abadikan momen berharga dengan fotografer dan videografer profesional menggunakan peralatan kelas atas.'],
                ['icon' => 'bi-telephone-fill','title'=>'Siap Konsultasi 24/7', 'desc' => 'Tim kami siap melayani konsultasi kapan saja. Anda tidak perlu khawatir — kami selalu ada untuk Anda.'],
                ];
                @endphp

                @foreach($features as $idx => $f)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi {{ $f['icon'] }}"></i></div>
                        <div class="feature-title">{{ $f['title'] }}</div>
                        <p class="feature-desc">{{ $f['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ======================== PORTOFOLIO ======================== --}}
    <section id="portofolio">
        <div class="container-xl">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-label">Galeri Karya</span>
                <h2 class="section-title mt-2">Portofolio<br>Pernikahan Kami</h2>
                <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
                <p style="color:var(--text-secondary);max-width:480px;margin:0 auto;font-size:0.92rem;line-height:1.7;">
                    Setiap pernikahan adalah karya unik. Berikut momen-momen indah yang telah kami ciptakan bersama pasangan bahagia.
                </p>
            </div>

            @if($portfolios->count() > 0)
            <div class="row g-4">
                @foreach($portfolios as $idx => $item)
                @php
                // Kumpulkan semua gambar: dari relasi images baru, atau fallback kolom image lama
                $allImages = $item->images->count() > 0
                ? $item->images->pluck('image_path')->toArray()
                : ($item->image ? [$item->image] : []);
                $imageCount = count($allImages);
                $slideWidth = $imageCount > 0 ? round(100 / $imageCount, 4) : 100;
                @endphp
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ ($idx % 4) * 80 }}">
                    <div class="portfolio-card">
                        <div class="portfolio-img-wrap" data-slider>
                            {{-- Slider Track --}}
                            <div class="portfolio-slider" style="width: {{ $imageCount * 100 }}%;">
                                @if($imageCount > 0)
                                @foreach($allImages as $imgPath)
                                <div class="portfolio-slide" style="width: {{ $slideWidth }}%;">
                                    <img src="{{ asset('storage/' . $imgPath) }}" alt="{{ $item->title }}" loading="lazy">
                                </div>
                                @endforeach
                                @else
                                <div class="portfolio-slide">
                                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80" alt="{{ $item->title }}">
                                </div>
                                @endif
                            </div>

                            {{-- Overlay deskripsi --}}
                            <div class="portfolio-overlay">
                                <p class="portfolio-overlay-text">{{ $item->description }}</p>
                            </div>

                            @if($imageCount > 1)
                            {{-- Tombol Prev/Next --}}
                            <button class="portfolio-arrow prev" aria-label="Sebelumnya" onclick="portfolioSlide(this,-1)">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <button class="portfolio-arrow next" aria-label="Berikutnya" onclick="portfolioSlide(this,1)">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                            {{-- Dots --}}
                            <div class="portfolio-dots">
                                @for($d = 0; $d < $imageCount; $d++)
                                    <button class="portfolio-dot {{ $d === 0 ? 'active' : '' }}" onclick="portfolioGoTo(this,{{ $d }})" aria-label="Gambar {{ $d+1 }}"></button>
                                    @endfor
                            </div>
                            @endif
                        </div>
                        <div class="portfolio-body">
                            <h3 class="portfolio-title">{{ $item->title }}</h3>
                            <p class="portfolio-desc">{{ $item->description }}</p>
                            @if($imageCount > 1)
                            <div class="portfolio-img-count">
                                <i class="bi bi-images"></i> {{ $imageCount }} foto
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            {{-- Fallback: tampilkan portofolio dummy jika DB kosong --}}
            <div class="row g-4">
                @php
                $dummyPortfolios = [
                ['title'=>'Azkia & Rafi — Grand Ballroom','imgs'=>['https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80','https://images.unsplash.com/photo-1606800052052-a08af7148866?w=600&q=80'],'desc'=>'Pernikahan mewah di Grand Ballroom dengan tema ivory & gold yang memukau.'],
                ['title'=>'Dina & Surya — Garden Party','imgs'=>['https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=600&q=80'],'desc'=>'Pernikahan outdoor di taman bunga dengan nuansa romantis pastel.'],
                ['title'=>'Risa & Danu — Rustic Chic','imgs'=>['https://images.unsplash.com/photo-1529543544282-ea669407fca3?w=600&q=80','https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=600&q=80','https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=600&q=80'],'desc'=>'Konsep rustic dengan sentuhan modern di venue bernuansa alam.'],
                ['title'=>'Putri & Arya — Ballroom Mewah','imgs'=>['https://images.unsplash.com/photo-1529543544282-ea669407fca3?w=600&q=80'],'desc'=>'Resepsi elegan dengan dekorasi floral dan pencahayaan kristal.'],
                ['title'=>'Maya & Budi — Intimate Ceremony','imgs'=>['https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=600&q=80','https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80'],'desc'=>'Pernikahan intimate penuh kehangatan bersama keluarga dan sahabat.'],
                ['title'=>'Sari & Hendra — Javanese Traditional','imgs'=>['https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=600&q=80'],'desc'=>'Pernikahan adat Jawa yang sakral dan penuh makna budaya.'],
                ];
                @endphp
                @foreach($dummyPortfolios as $idx => $p)
                @php
                $imgCount = count($p['imgs']);
                $dummySlideWidth = $imgCount > 0 ? round(100 / $imgCount, 4) : 100;
                @endphp
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ ($idx % 4) * 80 }}">
                    <div class="portfolio-card">
                        <div class="portfolio-img-wrap" data-slider>
                            <div class="portfolio-slider" style="width: {{ $imgCount * 100 }}%;">
                                @foreach($p['imgs'] as $imgUrl)
                                <div class="portfolio-slide" style="width: {{ $dummySlideWidth }}%;">
                                    <img src="{{ $imgUrl }}" alt="{{ $p['title'] }}">
                                </div>
                                @endforeach
                            </div>
                            <div class="portfolio-overlay">
                                <p class="portfolio-overlay-text">{{ $p['desc'] }}</p>
                            </div>
                            @if($imgCount > 1)
                            <button class="portfolio-arrow prev" onclick="portfolioSlide(this,-1)"><i class="bi bi-chevron-left"></i></button>
                            <button class="portfolio-arrow next" onclick="portfolioSlide(this,1)"><i class="bi bi-chevron-right"></i></button>
                            <div class="portfolio-dots">
                                @for($d = 0; $d < $imgCount; $d++)
                                    <button class="portfolio-dot {{ $d === 0 ? 'active' : '' }}" onclick="portfolioGoTo(this,{{ $d }})"></button>
                                    @endfor
                            </div>
                            @endif
                        </div>
                        <div class="portfolio-body">
                            <h3 class="portfolio-title">{{ $p['title'] }}</h3>
                            <p class="portfolio-desc">{{ $p['desc'] }}</p>
                            @if($imgCount > 1)
                            <div class="portfolio-img-count"><i class="bi bi-images"></i> {{ $imgCount }} foto</div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    {{-- ======================== PAKETAN ======================== --}}
    <section id="paketan">
        <div class="container-xl">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-label">Layanan Kami</span>
                <h2 class="section-title mt-2">Pilih Paket Pernikahan All-In<br>Impian Anda</h2>
                <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
                <p style="color:var(--text-secondary);max-width:480px;margin:0 auto;font-size:0.92rem;line-height:1.7;">
                    Semua paket dapat dikustomisasi sesuai kebutuhan dan anggaran Anda.
                </p>
            </div>

            @if($packages->count() > 0)
            @php $batches = $packages->pluck('batch')->unique()->sort()->values(); @endphp

            {{-- BATCH TABS (hanya tampil jika ada lebih dari 1 batch) --}}
            @if($batches->count() > 1)
            <div class="batch-tabs" data-aos="fade-up">
                @foreach($batches as $b)
                <button id="btab-{{ $b }}" class="batch-tab-btn {{ $loop->first ? 'active' : '' }}"
                    data-batch="{{ $b }}" onclick="switchBatch(this.dataset.batch)">Batch {{ $b }}
                    <span style="font-size:0.7rem;opacity:0.75;">({{ $packages->where('batch', $b)->count() }})</span>
                </button>
                @endforeach
            </div>
            @endif

            {{-- PACKAGE CARDS --}}
            <div class="row g-4" id="pkg-grid">
                @foreach($packages as $idx => $pkg)
                @php
                // Prefer structured facilities_json, fallback to plain text
                $facJson = $pkg->facilities_json ?? [];
                if (is_array($facJson) && count($facJson) > 0) {
                $previewItems = collect();
                $totalCount = 0;
                foreach ($facJson as $group) {
                $cat = $group['category'] ?? '';
                $items = array_filter(array_map('trim', $group['items'] ?? []), fn($v) => $v !== '');
                $totalCount += count($items);
                // Ambil item pertama dari tiap kategori sebagai highlight di card
                if (!empty($items[0])) {
                $previewItems->push(['cat' => $cat, 'text' => $items[0]]);
                }
                }
                $preview = $previewItems->take(3);
                $moreN = max(0, $totalCount - $preview->count());
                } else {
                // Fallback: plain text, skip == Category == lines
                $fLines = collect(explode("\n", $pkg->facilities ?? ''))
                ->map(fn($l) => trim($l, '- \t'))
                ->filter()
                ->reject(fn($l) => preg_match('/^==\s*.*\s*==$/', $l))
                ->values();
                $preview = $fLines->take(3)->map(fn($t) => ['cat' => '', 'text' => $t]);
                $moreN = max(0, $fLines->count() - 3);
                }
                $isFirstBatch = $pkg->batch == $batches->first();
                @endphp
                <div class="col-6 col-md-6 col-lg-3 pkg-col batch-theme-{{ $pkg->batch }}"
                    data-batch="{{ $pkg->batch }}"
                    data-aos="fade-up" data-aos-delay="{{ ($idx % 4) * 80 }}"
                    @if(!$isFirstBatch && $batches->count() > 1) style="display:none;" @endif>
                    <div class="package-card h-100 d-flex flex-column">
                        <div class="package-header">
                            <div style="font-size:0.68rem;font-weight:700;letter-spacing:0.2em;text-transform:uppercase;color:var(--theme-gold, var(--gold));margin-bottom:0.6rem;">✦ Batch {{ $pkg->batch }}</div>
                            <div class="package-name">{{ $pkg->name }}</div>
                            <div class="package-price">Rp {{ number_format($pkg->price, 0, ',', '.') }}<sub>/ paket</sub></div>
                            @if($pkg->pax)
                            <div style="font-size:0.78rem;color:var(--text-secondary);margin-top:0.4rem;">
                                <i class="bi bi-people-fill" style="color:var(--theme-gold, var(--gold));"></i> {{ number_format($pkg->pax,0,',','.') }} pax
                            </div>
                            @endif
                            <div style="width:40px;height:1px;background:linear-gradient(90deg,var(--theme-gold, var(--gold)),transparent);margin:0.75rem auto;"></div>
                        </div>
                        <div class="package-body flex-grow-1">
                            <p class="package-desc">{{ Str::limit($pkg->description, 90) }}</p>
                            @if($preview->count())
                            <ul class="pkg-facility-list">
                                @foreach($preview as $facItem)
                                <li><i class="bi bi-check-circle-fill"></i><span>{{ $facItem['text'] }}</span></li>
                                @endforeach
                            </ul>
                            @if($moreN > 0)
                            <p class="pkg-more">+ {{ $moreN }} fasilitas lainnya...</p>
                            @endif
                            @endif
                        </div>
                        <div class="package-cta">
                            <button class="btn-detail"
                                onclick="openPackageModal('{{ $pkg->id }}')">
                                <i class="bi bi-info-circle"></i> Lihat Detail
                            </button>
                            <div class="cta-row mt-2">
                                <button type="button" class="btn-calc" onclick="calcPackageFromCard('{{ $pkg->id }}', '{{ $pkg->batch }}')">
                                    <i class="bi bi-calculator"></i> Hitung Paket
                                </button>
                                <button class="btn-wa-sm" onclick="quickWaPaket('{{ addslashes($pkg->name) }}','{{ number_format($pkg->price, 0, ',', '.') }}')">
                                    <i class="bi bi-whatsapp"></i> WA
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Hidden data for JS modal --}}
            <script id="packages-data" type="application/json">
                @php
                $packagesJson = $packages->map(function($pkg) {
                    return [
                        'id' => (int) $pkg->id,
                        'batch' => (int) $pkg->batch,
                        'name' => $pkg->name,
                        'pax' => $pkg->pax ? (int) $pkg->pax : null,
                        'price' => (float) $pkg->price,
                        'price_formatted' => 'Rp '.number_format($pkg->price, 0, ',', '.'),
                        'description' => $pkg->description,
                        'facilities' => $pkg->facilities,
                        'facilities_json' => $pkg->facilities_json ?? [],
                    ];
                })->values()->toArray();
                @endphp
                {!! json_encode($packagesJson, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
            </script>

            @else
            {{-- Dummy Packages jika DB kosong --}}
            @php
            $dummyPkgs = [
            ['name'=>'Silver Package', 'price'=>'15.000.000', 'batch'=>1, 'pax'=>300, 'desc'=>'Paket pernikahan sederhana namun berkesan. Cocok untuk budget terbatas dengan tetap menghadirkan momen istimewa.','facilities'=>"Dekorasi Pelaminan Standar\nMakeup Pengantin (1 sesi)\nDokumentasi Foto (4 jam)\nMC Akad & Resepsi\nKoordinasi Hari H"],
            ['name'=>'Gold Package', 'price'=>'25.000.000', 'batch'=>1, 'pax'=>500, 'desc'=>'Paket lengkap untuk pernikahan yang berkesan dengan lebih banyak layanan premium.','facilities'=>"Dekorasi Pelaminan Premium\nMakeup Pengantin & Keluarga Inti\nDokumentasi Foto & Video (6 jam)\nCatering 200 porsi\nMC Akad & Resepsi\nEntertainment Musik"],
            ['name'=>'Platinum Package','price'=>'40.000.000','batch'=>1, 'pax'=>700, 'desc'=>'Paket mewah untuk pernikahan impian. Layanan lengkap dari awal hingga akhir.','facilities'=>"Dekorasi Pelaminan Mewah (Custom)\nMakeup Pengantin & Seluruh Keluarga\nDokumentasi Foto & Video Sinematik\nCatering 300 porsi\nBusana Pengantin Prewedding\nMC & Entertainment Profesional"],
            ['name'=>'Diamond Package','price'=>'65.000.000', 'batch'=>1, 'pax'=>1000,'desc'=>'Paket all-inclusive tanpa batas. Semua detail hari spesial Anda kami tangani.','facilities'=>"Dekorasi Ultra Premium + Venue Styling\nMakeup Artist Internasional\nDokumentasi Foto & Cinema Film + Drone\nCatering 500 porsi Fine Dining\nBusana Pengantin Custom\nEntertainment Band Live"],
            ];
            @endphp
            <div class="batch-tabs" data-aos="fade-up">
                <button class="batch-tab-btn active">Batch 1 (4)</button>
            </div>
            <div class="row g-4">
                @foreach($dummyPkgs as $idx => $p)
                <div class="col-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                    <div class="package-card h-100 d-flex flex-column"
                        onclick="openDummyPackageModal('{{ addslashes($p['name']) }}','{{ $p['price'] }}','{{ addslashes($p['desc']) }}','{{ addslashes($p['facilities']) }}')">
                        <div class="package-header">
                            <div style="font-size:0.68rem;font-weight:700;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:0.6rem;">✦ Batch 1</div>
                            <div class="package-name">{{ $p['name'] }}</div>
                            <div class="package-price">Rp {{ $p['price'] }}<sub>/ paket</sub></div>
                            <div style="font-size:0.78rem;color:var(--text-secondary);margin-top:0.4rem;"><i class="bi bi-people-fill" style="color:var(--gold);"></i> {{ number_format($p['pax'],0,',','.') }} pax</div>
                            <div style="width:40px;height:1px;background:linear-gradient(90deg,var(--gold),transparent);margin:0.75rem auto;"></div>
                        </div>
                        <div class="package-body flex-grow-1">
                            <p class="package-desc">{{ $p['desc'] }}</p>
                            @php $dFac = collect(explode("\n", $p['facilities']))->take(4); @endphp
                            <ul class="pkg-facility-list">
                                @foreach($dFac as $facLine)
                                <li><i class="bi bi-check-circle-fill"></i><span>{{ $facLine }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="package-cta">
                            <span class="btn-gold" style="font-size:0.82rem;padding:0.6rem 1.6rem;width:100%;display:block;">
                                <i class="bi bi-info-circle me-1"></i> Lihat Detail
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    {{-- ======================== PACKAGE MODAL ======================== --}}
    <div class="modal fade" id="packageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width:620px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <div id="modal-tier" style="font-size:0.68rem;letter-spacing:0.18em;text-transform:uppercase;color:var(--gold-light);margin-bottom:0.3rem;"></div>
                        <div class="modal-title-custom" id="modal-name"></div>
                        <div class="modal-price" id="modal-price"></div>
                        <div id="modal-pax" style="font-size:0.78rem;color:rgba(255,255,255,0.6);margin-top:0.25rem;"></div>
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p id="modal-desc" class="modal-desc-text"></p>
                    <h6 class="modal-fac-heading">
                        <i class="bi bi-check-circle-fill"></i> Fasilitas Termasuk
                    </h6>
                    <div id="modal-facilities"></div>
                    <div class="mt-3 d-flex gap-2 flex-wrap">
                        <button class="btn-wa" id="modal-wa-btn" onclick="sendWhatsAppPackage()" style="padding:0.55rem 1.1rem;font-size:0.8rem;width:auto;flex:1;">
                            <i class="bi bi-whatsapp"></i> Konsultasi WhatsApp
                        </button>
                        <button type="button" class="btn-outline-gold" onclick="calcPackageFromModal()" style="padding:0.55rem 1.1rem;font-size:0.8rem;">
                            <i class="bi bi-calculator me-1"></i> Hitung di Kalkulator
                        </button>
                        <button type="button" class="btn-outline-gold" data-bs-dismiss="modal" style="padding:0.55rem 1.1rem;font-size:0.8rem;">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================== KALKULATOR ======================== --}}
    <section id="kalkulator">
        <div class="container-xl">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-label" style="color:var(--gold-light)">Estimasi Biaya</span>
                <h2 class="section-title mt-2" style="color:white;">Kalkulator<br><span style="color:var(--gold-light);font-style:italic;">Biaya Pernikahan</span></h2>
                <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
                <p style="color:rgba(255,255,255,0.6);max-width:520px;margin:0 auto;font-size:0.92rem;line-height:1.7;">
                    Hitung estimasi biaya pernikahan Anda secara real-time. Semua angka bersifat perkiraan dan dapat didiskusikan lebih lanjut.
                </p>
            </div>

            {{-- Embed JSON Data --}}
            <script id="calc-packages-data" type="application/json">
                @php
                $calcPkgs = $packages->map(fn($p) => [
                    'id' => (int) $p->id,
                    'batch' => (int) $p->batch,
                    'name' => $p->name,
                    'price' => (float) $p->price,
                    'pax' => $p->pax ? (int) $p->pax : null,
                    'included' => $p->getIncludedFacilityKeys(),
                    'excluded' => array_values($p->getExcludedFacilityKeys()),
                    'hasVenue' => $p->hasVenue(),
                    'venueName' => $p->venue?->name,
                ])->values()->toArray();
                @endphp
                {!! json_encode($calcPkgs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
            </script>

            {{-- Venues Data --}}
            <script id="calc-venues-data" type="application/json">
                @php
                $calcVenues = isset($venues) ? $venues->map(fn($v) => [
                    'id' => (int) $v->id,
                    'name' => $v->name,
                    'address' => $v->address,
                    'capacity' => $v->capacity,
                    'price_info' => $v->price_info,
                ])->values()->toArray() : [];
                @endphp
                {!! json_encode($calcVenues, JSON_UNESCAPED_UNICODE) !!}
            </script>

            <script id="calc-addons-data" type="application/json">
                @php
                $calcAddons = $addons->map(fn($a) => [
                    'id' => (int) $a->id,
                    'name' => $a->name,
                    'category' => $a->category,
                    'price' => (float) $a->price,
                    'unit' => $a->unit,
                ])->values()->toArray();
                @endphp
                {!! json_encode($calcAddons, JSON_UNESCAPED_UNICODE) !!}
            </script>

            <script id="calc-dekorasi-data" type="application/json">
                @php
                $calcDek = $dekorasiPackages->map(fn($d) => [
                    'id' => (int) $d->id,
                    'name' => $d->name,
                    'category' => $d->category,
                    'price' => (float) $d->price,
                ])->values()->toArray();
                @endphp
                {!! json_encode($calcDek, JSON_UNESCAPED_UNICODE) !!}
            </script>

            {{-- Mode Tabs --}}
            <div class="text-center" data-aos="fade-up">
                <div class="calc-mode-tabs">
                    <button id="ctab-paket" class="calc-mode-tab active" onclick="switchCalcMode('paket')">
                        <i class="bi bi-heart-fill"></i>Paket Pernikahan
                    </button>
                    <button id="ctab-custom" class="calc-mode-tab" onclick="switchCalcMode('custom')">
                        <i class="bi bi-sliders"></i>Custom Tambahan
                    </button>
                </div>
            </div>

            <div class="row g-4">
                {{-- ===== LEFT: Form ===== --}}
                <div class="col-lg-7">

                    {{-- Data Acara (shared) --}}
                    <div class="calc-card mb-4">
                        <div class="calc-section-title"><i class="bi bi-person-fill me-2"></i>Data Acara</div>
                        <div class="row g-2 g-sm-3">
                            <div class="col-12 col-sm-6">
                                <label class="form-label-custom">Nama / Pasangan</label>
                                <input id="c-nama" type="text" class="form-control-custom" placeholder="Budi & Ani">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label-custom">No. HP / WhatsApp</label>
                                <input id="c-hp" type="tel" class="form-control-custom" placeholder="08xxxxxxxxxx">
                            </div>
                            <div class="col-12">
                                <label class="form-label-custom">Alamat Pemesan</label>
                                <input id="c-alamat" type="text" class="form-control-custom" placeholder="Jl. Merdeka No. 10, Bandung">
                            </div>
                            <div class="col-3 col-sm-4">
                                <label class="form-label-custom text-truncate d-block" title="Tanggal Acara">Tanggal</label>
                                <input id="c-tgl" type="number" class="form-control-custom text-center px-1" placeholder="1" min="1" max="31">
                            </div>
                            <div class="col-5 col-sm-4">
                                <label class="form-label-custom text-truncate d-block">Bulan</label>
                                <select id="c-bulan" class="form-select-custom">
                                    <option value="">— Bulan —</option>
                                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                                    <option>{{ $bulan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 col-sm-4">
                                <label class="form-label-custom text-truncate d-block">Tahun</label>
                                <input id="c-tahun" type="number" class="form-control-custom text-center px-1" placeholder="{{ date('Y') + 1 }}" min="{{ date('Y') }}">
                            </div>
                            <div class="col-12">
                                <label style="display:flex;align-items:center;gap:0.5rem;font-size:0.8rem;color:rgba(255,255,255,0.75);cursor:pointer;margin-top:0.2rem;user-select:none;">
                                    <input type="checkbox" id="c-tgl-belum-fix" onchange="toggleTglBelumFix(this)" style="accent-color:var(--gold);width:15px;height:15px;cursor:pointer;">
                                    <span>Tanggal acara belum fix / masih fleksibel</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label-custom">Jumlah Tamu / Undangan</label>
                                <input id="c-tamu" type="number" class="form-control-custom" placeholder="500" min="1">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label-custom">Lokasi Acara</label>
                                <input id="c-lokasi" type="text" class="form-control-custom" placeholder="Gedung / Rumah / Outdoor">
                            </div>
                        </div>
                    </div>

                    {{-- ===== TAB PAKET PERNIKAHAN ===== --}}
                    <div id="form-paket">

                        @if($packages->count() > 0)
                        @php $batches = $packages->pluck('batch')->unique()->sort()->values(); @endphp

                        {{-- Step 1: Pilih Batch & Paket --}}
                        <div class="calc-card mb-4">
                            <div class="calc-section-title"><i class="bi bi-box-seam me-2"></i>Langkah 1 — Pilih Paket</div>

                            <div class="row g-2 g-sm-3">
                                <div class="col-12 col-sm-6">
                                    <label class="form-label-custom">Pilih Batch</label>
                                    <select id="c-batch" class="form-select-custom" onchange="onBatchChange()">
                                        <option value="">— Pilih Batch —</option>
                                        @foreach($batches as $b)
                                        <option value="{{ $b }}">Batch {{ $b }} ({{ $packages->where('batch',$b)->count() }} paket)</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label class="form-label-custom">Pilih Paket</label>
                                    <select id="c-paket" class="form-select-custom" onchange="onPaketChange()" disabled>
                                        <option value="">— Pilih Batch dulu —</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Info paket terpilih --}}
                            <div id="paket-info" style="display:none;margin-top:1rem;padding:1rem;background:rgba(196,154,60,0.1);border:1px solid rgba(196,154,60,0.3);border-radius:12px;">
                                <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:1rem;">
                                    <div>
                                        <div id="pi-name" style="font-family:var(--font-serif);font-size:1.1rem;color:var(--gold-light);font-weight:700;"></div>
                                        <div id="pi-pax" style="font-size:0.8rem;color:rgba(255,255,255,0.5);margin-top:0.2rem;"></div>
                                    </div>
                                    <div id="pi-price" style="font-size:1.2rem;font-weight:700;color:white;white-space:nowrap;"></div>
                                </div>
                                {{-- Fasilitas Termasuk --}}
                                <div id="pi-included-wrap" style="margin-top:0.75rem;display:none;">
                                    <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-bottom:0.4rem;">✅ Sudah Termasuk (Harga Final Paket)</div>
                                    <div id="pi-included" style="display:flex;flex-wrap:wrap;gap:0.4rem;"></div>
                                </div>
                                {{-- Fasilitas Belum Termasuk --}}
                                <div id="pi-excluded-wrap" style="margin-top:0.6rem;display:none;">
                                    <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-bottom:0.4rem;">➕ Belum Termasuk (Dapat Dipilih di Langkah 2)</div>
                                    <div id="pi-excluded" style="display:flex;flex-wrap:wrap;gap:0.4rem;"></div>
                                </div>
                                {{-- Venue info (otomatis) --}}
                                <div id="pi-venue-info" style="margin-top:0.75rem;display:none;font-size:0.83rem;padding:0.5rem 0.85rem;border-radius:8px;">
                                    <span id="pi-venue-text"></span>
                                </div>
                            </div>
                        </div>

                        {{-- Step 2: Layanan Tambahan (HANYA LAYANAN UTAMA YANG BELUM TERMASUK) --}}
                        <div class="calc-card mb-4" id="addon-paket-card" style="display:none;">
                            <div class="calc-section-title"><i class="bi bi-plus-circle me-2"></i>Langkah 2 — Layanan Tambahan</div>
                            <p style="font-size:0.82rem;color:rgba(255,255,255,0.55);margin-bottom:1.15rem;">
                                Berikut adalah opsi layanan utama yang <strong>belum termasuk</strong> dalam paket pilihan Anda. Centang atau pilih layanan yang ingin Anda tambahkan:
                            </p>

                            {{-- Pesan All-in jika semua sudah termasuk --}}
                            <div id="pkg-all-included-msg" style="display:none;padding:1rem;background:rgba(16,185,129,0.12);border:1px solid rgba(16,185,129,0.3);border-radius:10px;text-align:center;color:#6ee7b7;font-size:0.88rem;margin-bottom:0.5rem;">
                                <i class="bi bi-patch-check-fill me-1" style="font-size:1.1rem;vertical-align:middle;"></i>
                                <strong>Paket All-In & Lengkap!</strong> Seluruh fasilitas utama sudah termasuk dalam harga paket ini.
                            </div>

                            <div id="layanan-tambahan-container">
                                {{-- 1. Upacara Adat --}}
                                <div class="layanan-tambahan-block" data-service="Adat" style="display:none;">
                                    <div class="layanan-tambahan-header">
                                        <span class="layanan-tambahan-title"><i class="bi bi-award-fill me-1" style="color:var(--gold);"></i> Upacara Adat</span>
                                        <span class="layanan-tambahan-badge">Belum Termasuk</span>
                                    </div>
                                    <div class="layanan-tambahan-body">
                                        <p class="layanan-tambahan-desc">Pilihan vendor prosesi adat resmi rekanan kami. Rincian prosesi dan paket akan dikonfirmasi langsung oleh admin / vendor.</p>
                                        <div class="layanan-tambahan-options">
                                            @php $adatVendors = $vendors->where('category', 'Upacara Adat'); @endphp
                                            @if($adatVendors->count() > 0)
                                            @foreach($adatVendors as $adatVendor)
                                            <label class="layanan-option-tile">
                                                <input type="checkbox" class="layanan-extra-check"
                                                    data-name="Upacara Adat: {{ $adatVendor->name }}"
                                                    data-price="0"
                                                    onchange="updateCalc()">
                                                <div class="layanan-option-info">
                                                    <span class="layanan-option-name">{{ $adatVendor->name }} (Upacara Adat & Siraman)</span>
                                                    <span class="layanan-option-sub">Vendor Upacara Adat Resmi · Prosesi adat sunda, siraman, sungkeman, & lengser</span>
                                                </div>
                                                <span class="layanan-option-price" style="font-size:0.75rem;color:var(--champagne);font-weight:600;">
                                                    (Dikonfirmasi Admin)
                                                </span>
                                            </label>
                                            @endforeach
                                            @else
                                            <label class="layanan-option-tile">
                                                <input type="checkbox" class="layanan-extra-check"
                                                    data-name="Upacara Adat Tradisional"
                                                    data-price="0"
                                                    onchange="updateCalc()">
                                                <div class="layanan-option-info">
                                                    <span class="layanan-option-name">Upacara Adat Sunda / Tradisional</span>
                                                    <span class="layanan-option-sub">Pemandu prosesi adat, siraman, & lengser</span>
                                                </div>
                                                <span class="layanan-option-price" style="font-size:0.75rem;color:var(--champagne);font-weight:600;">
                                                    (Dikonfirmasi Admin)
                                                </span>
                                            </label>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- 2. Tenda & Perlengkapan --}}
                                <div class="layanan-tambahan-block" data-service="Tenda" style="display:none;">
                                    <div class="layanan-tambahan-header">
                                        <span class="layanan-tambahan-title"><i class="bi bi-house-heart me-1" style="color:var(--gold);"></i> Tenda & Perlengkapan</span>
                                        <span class="layanan-tambahan-badge">Belum Termasuk</span>
                                    </div>
                                    <div class="layanan-tambahan-body">
                                        <p class="layanan-tambahan-desc">Pilihan jenis tenda dekorasi dan penutup dinding sesuai kebutuhan luas lokasi acara.</p>
                                        <div class="addon-grid">
                                            @foreach($addons->where('category', 'Tenda') as $addonTenda)
                                            <div class="addon-card" id="addon-card-{{ $addonTenda->id }}">
                                                <div class="addon-card-info">
                                                    <span class="addon-card-name">{{ $addonTenda->name }}</span>
                                                    <span class="addon-card-price">Rp {{ number_format($addonTenda->price,0,',','.') }} <small style="font-size:0.68rem;opacity:0.65;">/ {{ $addonTenda->unit }}</small></span>
                                                </div>
                                                <div class="addon-card-action">
                                                    <span class="addon-unit-label">Qty ({{ $addonTenda->unit }})</span>
                                                    <div class="addon-stepper">
                                                        <button type="button" class="addon-btn-step" onclick="changeAddonQty('{{ $addonTenda->id }}', -1, false)" title="Kurangi">−</button>
                                                        <input type="number" class="addon-qty-val addon-qty"
                                                            data-id="{{ $addonTenda->id }}"
                                                            data-name="{{ $addonTenda->name }}"
                                                            data-price="{{ $addonTenda->price }}"
                                                            data-unit="{{ $addonTenda->unit }}"
                                                            value="0" min="0" step="1"
                                                            oninput="onAddonInputChange(this)">
                                                        <button type="button" class="addon-btn-step" onclick="changeAddonQty('{{ $addonTenda->id }}', 1, false)" title="Tambah">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                {{-- 3. Catering (Vendor Rekanan) --}}
                                <div class="layanan-tambahan-block" data-service="Catering" style="display:none;">
                                    <div class="layanan-tambahan-header">
                                        <span class="layanan-tambahan-title"><i class="bi bi-cup-hot me-1" style="color:var(--gold);"></i> Catering (Vendor Rekanan)</span>
                                        <span class="layanan-tambahan-badge">Belum Termasuk</span>
                                    </div>
                                    <div class="layanan-tambahan-body">
                                        <p class="layanan-tambahan-desc">Pilih vendor catering rekanan resmi kami untuk hidangan prasmanan dan stall. Pilihan menu & porsi akan dikonfirmasi oleh admin/vendor.</p>
                                        <div class="layanan-tambahan-options">
                                            @php $cateringVendors = $vendors->where('category', 'Catering'); @endphp
                                            @if($cateringVendors->count() > 0)
                                            @foreach($cateringVendors as $catVendor)
                                            <label class="layanan-option-tile">
                                                <input type="radio" name="catering-extra-radio" class="catering-extra-radio"
                                                    data-name="Catering: {{ $catVendor->name }}"
                                                    data-price="0"
                                                    value="{{ $catVendor->id }}"
                                                    onchange="updateCalc()">
                                                <div class="layanan-option-info">
                                                    <span class="layanan-option-name">{{ $catVendor->name }}</span>
                                                    <span class="layanan-option-sub">Vendor Catering Rekanan Resmi · Prasmanan & Aneka Stall</span>
                                                </div>
                                                <span class="layanan-option-price" style="font-size:0.75rem;color:var(--champagne);font-weight:600;">
                                                    (Dikonfirmasi Admin)
                                                </span>
                                            </label>
                                            @endforeach
                                            @else
                                            <label class="layanan-option-tile">
                                                <input type="checkbox" class="layanan-extra-check"
                                                    data-name="Paket Catering Prasmanan"
                                                    data-price="0"
                                                    onchange="updateCalc()">
                                                <div class="layanan-option-info">
                                                    <span class="layanan-option-name">Paket Catering Prasmanan Rekanan</span>
                                                    <span class="layanan-option-sub">Pilihan menu nusantara / modern</span>
                                                </div>
                                                <span class="layanan-option-price" style="font-size:0.75rem;color:var(--champagne);font-weight:600;">
                                                    (Dikonfirmasi Admin)
                                                </span>
                                            </label>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- 4. Venue Gedung Rekanan --}}
                                @if($venues->count() > 0)
                                <div class="layanan-tambahan-block" data-service="Venue" style="display:none;">
                                    <div class="layanan-tambahan-header">
                                        <span class="layanan-tambahan-title"><i class="bi bi-building me-1" style="color:var(--gold);"></i> Venue Gedung Rekanan</span>
                                        <span class="layanan-tambahan-badge">Belum Termasuk</span>
                                    </div>
                                    <div class="layanan-tambahan-body">
                                        <p class="layanan-tambahan-desc">Pilih gedung rekanan resmi jika ingin menyelenggarakan acara di venue gedung.</p>
                                        <div class="layanan-tambahan-options">
                                            @foreach($venues as $venueItem)
                                            <label class="layanan-option-tile">
                                                <input type="radio" name="venue-extra-radio" class="venue-extra-radio"
                                                    data-name="Venue: {{ $venueItem->name }}"
                                                    data-price="0"
                                                    value="{{ $venueItem->id }}"
                                                    onchange="updateCalc()">
                                                <div class="layanan-option-info">
                                                    <span class="layanan-option-name">{{ $venueItem->name }}</span>
                                                    <span class="layanan-option-sub">
                                                        {{ $venueItem->address ?? 'Gedung Rekanan' }}
                                                        @if($venueItem->capacity)
                                                        · Kapasitas: {{ number_format($venueItem->capacity) }} pax
                                                        @endif
                                                    </span>
                                                </div>
                                                <span class="layanan-option-price" style="font-size:0.75rem;color:var(--champagne);font-weight:600;">
                                                    (Dikonfirmasi Admin)
                                                </span>
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif

                                {{-- 5. Music & Entertainment --}}
                                <div class="layanan-tambahan-block" data-service="Music" style="display:none;">
                                    <div class="layanan-tambahan-header">
                                        <span class="layanan-tambahan-title"><i class="bi bi-music-note-beamed me-1" style="color:var(--gold);"></i> Music & Entertainment</span>
                                        <span class="layanan-tambahan-badge">Belum Termasuk</span>
                                    </div>
                                    <div class="layanan-tambahan-body">
                                        <p class="layanan-tambahan-desc">Hiburan musik pengiring resepsi bersama musisi profesional rekanan kami.</p>
                                        <div class="layanan-tambahan-options">
                                            @php $musicVendors = $vendors->where('category', 'Music'); @endphp
                                            @if($musicVendors->count() > 0)
                                            @foreach($musicVendors as $mVendor)
                                            <label class="layanan-option-tile">
                                                <input type="checkbox" class="layanan-extra-check"
                                                    data-name="Music: {{ $mVendor->name }}"
                                                    data-price="0"
                                                    onchange="updateCalc()">
                                                <div class="layanan-option-info">
                                                    <span class="layanan-option-name">{{ $mVendor->name }} (Live Music Acoustic & Sound)</span>
                                                    <span class="layanan-option-sub">Vendor Music Rekanan Resmi · Penyanyi, Player, & Sound System</span>
                                                </div>
                                                <span class="layanan-option-price" style="font-size:0.75rem;color:var(--champagne);font-weight:600;">
                                                    (Dikonfirmasi Admin)
                                                </span>
                                            </label>
                                            @endforeach
                                            @else
                                            <label class="layanan-option-tile">
                                                <input type="checkbox" class="layanan-extra-check"
                                                    data-name="Live Acoustic & Sound System"
                                                    data-price="0"
                                                    onchange="updateCalc()">
                                                <div class="layanan-option-info">
                                                    <span class="layanan-option-name">Live Acoustic Music + Sound System</span>
                                                    <span class="layanan-option-sub">1 Singer, 2 Players, Mic & Sound System Full Set</span>
                                                </div>
                                                <span class="layanan-option-price" style="font-size:0.75rem;color:var(--champagne);font-weight:600;">
                                                    (Dikonfirmasi Admin)
                                                </span>
                                            </label>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- 6. MC Profesional --}}
                                <div class="layanan-tambahan-block" data-service="MC" style="display:none;">
                                    <div class="layanan-tambahan-header">
                                        <span class="layanan-tambahan-title"><i class="bi bi-mic-fill me-1" style="color:var(--gold);"></i> MC Profesional</span>
                                        <span class="layanan-tambahan-badge">Belum Termasuk</span>
                                    </div>
                                    <div class="layanan-tambahan-body">
                                        <p class="layanan-tambahan-desc">Pembawa acara berpengalaman untuk memandu akad nikah dan resepsi pernikahan.</p>
                                        <div class="layanan-tambahan-options">
                                            @php $mcVendors = $vendors->where('category', 'MC'); @endphp
                                            @if($mcVendors->count() > 0)
                                            @foreach($mcVendors as $mcVendor)
                                            <label class="layanan-option-tile">
                                                <input type="checkbox" class="layanan-extra-check"
                                                    data-name="MC: {{ $mcVendor->name }}"
                                                    data-price="0"
                                                    onchange="updateCalc()">
                                                <div class="layanan-option-info">
                                                    <span class="layanan-option-name">{{ $mcVendor->name }} (MC Akad & Resepsi)</span>
                                                    <span class="layanan-option-sub">Master of Ceremony Profesional Rekanan Resmi</span>
                                                </div>
                                                <span class="layanan-option-price" style="font-size:0.75rem;color:var(--champagne);font-weight:600;">
                                                    (Dikonfirmasi Admin)
                                                </span>
                                            </label>
                                            @endforeach
                                            @else
                                            <label class="layanan-option-tile">
                                                <input type="checkbox" class="layanan-extra-check"
                                                    data-name="MC Profesional Akad & Resepsi"
                                                    data-price="0"
                                                    onchange="updateCalc()">
                                                <div class="layanan-option-info">
                                                    <span class="layanan-option-name">MC Profesional Akad & Resepsi</span>
                                                    <span class="layanan-option-sub">Pemandu acara formal akad nikah dan interaktif saat resepsi</span>
                                                </div>
                                                <span class="layanan-option-price" style="font-size:0.75rem;color:var(--champagne);font-weight:600;">
                                                    (Dikonfirmasi Admin)
                                                </span>
                                            </label>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- 7. Panggung Tambahan --}}
                                <div class="layanan-tambahan-block" data-service="Panggung" style="display:none;">
                                    <div class="layanan-tambahan-header">
                                        <span class="layanan-tambahan-title"><i class="bi bi-soundwave me-1" style="color:var(--gold);"></i> Panggung Tambahan</span>
                                        <span class="layanan-tambahan-badge">Belum Termasuk</span>
                                    </div>
                                    <div class="layanan-tambahan-body">
                                        <div class="addon-grid">
                                            @foreach($addons->where('category', 'Panggung') as $addonPanggung)
                                            <div class="addon-card" id="addon-card-{{ $addonPanggung->id }}">
                                                <div class="addon-card-info">
                                                    <span class="addon-card-name">{{ $addonPanggung->name }}</span>
                                                    <span class="addon-card-price">Rp {{ number_format($addonPanggung->price,0,',','.') }} <small style="font-size:0.68rem;opacity:0.65;">/ {{ $addonPanggung->unit }}</small></span>
                                                </div>
                                                <div class="addon-card-action">
                                                    <span class="addon-unit-label">Qty ({{ $addonPanggung->unit }})</span>
                                                    <div class="addon-stepper">
                                                        <button type="button" class="addon-btn-step" onclick="changeAddonQty('{{ $addonPanggung->id }}', -1, false)" title="Kurangi">−</button>
                                                        <input type="number" class="addon-qty-val addon-qty"
                                                            data-id="{{ $addonPanggung->id }}"
                                                            data-name="{{ $addonPanggung->name }}"
                                                            data-price="{{ $addonPanggung->price }}"
                                                            data-unit="{{ $addonPanggung->unit }}"
                                                            value="0" min="0" step="1"
                                                            oninput="onAddonInputChange(this)">
                                                        <button type="button" class="addon-btn-step" onclick="changeAddonQty('{{ $addonPanggung->id }}', 1, false)" title="Tambah">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>{{-- end layanan-tambahan-container --}}
                        </div>{{-- end addon-paket-card --}}

                        @else
                        {{-- Dummy paket jika DB kosong --}}
                        <div class="calc-card mb-4">
                            <div class="calc-section-title"><i class="bi bi-box-seam me-2"></i>Pilih Paket</div>
                            <p style="color:rgba(255,255,255,0.4);font-size:0.88rem;text-align:center;padding:1rem 0;">
                                Belum ada paket pernikahan aktif.<br>Hubungi kami untuk informasi lebih lanjut.
                            </p>
                        </div>
                        @endif

                    </div>{{-- end form-paket --}}

                    {{-- ===== TAB CUSTOM TAMBAHAN ===== --}}
                    <div id="form-custom" style="display:none;">

                        {{-- Paket Dekorasi --}}
                        @if($dekorasiPackages->count() > 0)
                        <div class="calc-card mb-4">
                            <div class="calc-section-title"><i class="bi bi-stars me-2"></i>Paket Dekorasi</div>
                            <p style="font-size:0.82rem;color:rgba(255,255,255,0.45);margin-bottom:1rem;">Pilih satu paket dekorasi yang sesuai dengan konsep acara Anda.</p>
                            @php $dekByCategory = $dekorasiPackages->groupBy('category'); @endphp
                            @foreach($dekByCategory as $cat => $items)
                            <div style="margin-bottom:1rem;">
                                <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--gold);margin-bottom:0.5rem;padding-bottom:0.4rem;border-bottom:1px solid rgba(196,154,60,0.2);">{{ $cat }}</div>
                                @foreach($items as $dek)
                                <div class="dek-item-wrapper" style="margin-bottom:0.5rem;">
                                    <label style="display:flex;align-items:center;gap:0.75rem;cursor:pointer;padding:0.6rem 0.8rem;border-radius:8px;transition:all .2s;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.1);"
                                        onmouseover="if(!this.closest('.dek-item-wrapper').querySelector('.dek-detail-box').classList.contains('show')) this.style.background='rgba(196,154,60,0.08)'"
                                        onmouseout="if(!this.closest('.dek-item-wrapper').querySelector('.dek-detail-box').classList.contains('show')) this.style.background='rgba(255,255,255,0.03)'">
                                        <input type="radio" name="dekorasi-radio" class="dek-radio"
                                            data-id="{{ $dek->id }}"
                                            data-name="{{ $dek->name }}"
                                            data-price="{{ $dek->price }}"
                                            value="{{ $dek->id }}"
                                            onchange="updateCalc(); toggleDekDetail(this);"
                                            style="accent-color:var(--gold);width:16px;height:16px;flex-shrink:0;">
                                        <span style="flex:1;color:rgba(255,255,255,0.9);font-size:0.9rem;font-weight:500;display:flex;align-items:center;flex-wrap:wrap;gap:0.4rem;">
                                            {{ $dek->name }}
                                            @if($dek->location_type)
                                            <span style="font-size:0.65rem;background:rgba(255,255,255,0.1);padding:0.15rem 0.4rem;border-radius:4px;color:rgba(255,255,255,0.75);font-weight:600;letter-spacing:0.02em;">
                                                <i class="bi bi-geo-alt" style="font-size:0.6rem;margin-right:0.1rem;"></i>{{ $dek->location_type }}
                                            </span>
                                            @endif
                                        </span>
                                        <span class="checkbox-price">Rp {{ number_format($dek->price,0,',','.') }}</span>
                                    </label>

                                    <div class="dek-detail-box" id="dek-detail-{{ $dek->id }}" style="display:none; padding:1rem; border:1px solid rgba(196,154,60,0.3); border-top:none; border-radius:0 0 8px 8px; background:rgba(0,0,0,0.15); margin-top:-4px;">
                                        @if($dek->image)
                                        <img src="{{ asset('storage/' . $dek->image) }}" alt="{{ $dek->name }}" style="width:100%; height:auto; border-radius:6px; margin-bottom:1rem; object-fit:cover; max-height:250px;">
                                        @endif
                                        <div style="font-size:0.8rem; color:var(--gold-light); font-weight:700; margin-bottom:0.5rem; letter-spacing:0.05em; text-transform:uppercase;">Fasilitas Termasuk:</div>
                                        <ul style="list-style:none; padding:0; margin:0; color:rgba(255,255,255,0.75); font-size:0.85rem; line-height:1.6;">
                                            @foreach(collect(explode("\n", $dek->facilities))->map(fn($l)=>trim($l,'- \t'))->filter() as $fac)
                                            <li style="display:flex; gap:0.5rem; align-items:flex-start; margin-bottom:0.3rem;">
                                                <i class="bi bi-check-circle-fill" style="color:var(--gold); font-size:0.7rem; margin-top:3px;"></i>
                                                <span>{{ $fac }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        @endif

                        {{-- Add-on Custom --}}
                        @if($addons->count() > 0)
                        <div class="calc-card mb-4">
                            <div class="calc-section-title"><i class="bi bi-plus-circle me-2"></i>Add-on Tambahan</div>
                            <p style="font-size:0.82rem;color:rgba(255,255,255,0.45);margin-bottom:1.15rem;">Pilih perlengkapan tambahan sesuai kebutuhan acara. Gunakan tombol <b style="color:var(--champagne);">+ / −</b>.</p>
                            @php $addonByCategory = $addonByCategory ?? $addons->groupBy('category'); @endphp
                            @foreach($addonByCategory as $catCustom => $addonItems)
                            <div class="addon-cat-block">
                                <div class="addon-cat-header">
                                    <div class="addon-cat-title">
                                        <i class="bi {{ $catIcons[$catCustom] ?? 'bi-grid' }} me-1" style="color:var(--gold);"></i>
                                        {{ $catCustom }}
                                    </div>
                                    <span style="font-size:0.75rem;color:rgba(255,255,255,0.65);background:rgba(255,255,255,0.08);padding:3px 10px;border-radius:20px;font-weight:500;">{{ $addonItems->count() }} pilihan</span>
                                </div>
                                <div class="addon-grid">
                                    @foreach($addonItems as $addonItem)
                                    <div class="addon-card" id="addon-custom-card-{{ $addonItem->id }}">
                                        <div class="addon-card-info">
                                            <span class="addon-card-name">{{ $addonItem->name }}</span>
                                            <span class="addon-card-price">Rp {{ number_format($addonItem->price,0,',','.') }} <small style="font-size:0.68rem;opacity:0.65;">/ {{ $addonItem->unit }}</small></span>
                                            @if($addonItem->description)
                                            <p class="addon-card-desc">{{ $addonItem->description }}</p>
                                            @endif
                                        </div>
                                        <div class="addon-card-action">
                                            <span class="addon-unit-label">Qty ({{ $addonItem->unit }})</span>
                                            <div class="addon-stepper">
                                                <button type="button" class="addon-btn-step" onclick="changeAddonQty('{{ $addonItem->id }}', -1, true)" title="Kurangi">−</button>
                                                <input type="number" class="addon-qty-val addon-custom-qty"
                                                    data-id="{{ $addonItem->id }}"
                                                    data-name="{{ $addonItem->name }}"
                                                    data-price="{{ $addonItem->price }}"
                                                    data-unit="{{ $addonItem->unit }}"
                                                    value="0" min="0" step="1"
                                                    oninput="onAddonInputChange(this)">
                                                <button type="button" class="addon-btn-step" onclick="changeAddonQty('{{ $addonItem->id }}', 1, true)" title="Tambah">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        @if($dekorasiPackages->count() === 0 && $addons->count() === 0)
                        <div class="calc-card mb-4">
                            <p style="color:rgba(255,255,255,0.4);font-size:0.88rem;text-align:center;padding:1.5rem 0;">
                                Belum ada paket dekorasi / add-on aktif.<br>Hubungi kami untuk informasi custom.
                            </p>
                        </div>
                        @endif

                    </div>{{-- end form-custom --}}

                </div>{{-- end col-lg-7 --}}

                {{-- ===== RIGHT: Result Panel ===== --}}
                <div class="col-lg-5">
                    <div class="result-panel" data-aos="fade-left">
                        <div class="result-title"><i class="bi bi-calculator me-2" style="font-size:1rem;"></i>Estimasi Biaya</div>

                        {{-- Mode badge --}}
                        <div id="result-mode" style="font-size:0.72rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:var(--gold);margin-bottom:1rem;padding-bottom:0.75rem;border-bottom:1px solid rgba(196,154,60,0.2);">
                            <i class="bi bi-heart-fill me-1"></i>MODE: PAKET PERNIKAHAN
                        </div>

                        {{-- Item list --}}
                        <div id="result-items" style="min-height:80px;">
                            <p style="color:rgba(255,255,255,0.3);font-size:0.85rem;text-align:center;padding:1.5rem 0;">
                                Pilih paket atau layanan untuk melihat estimasi
                            </p>
                        </div>

                        {{-- Total --}}
                        <div class="result-total-bar mt-3">
                            <span class="result-total-label">Total Estimasi</span>
                            <span class="result-total-amount" id="result-total">Rp 0</span>
                        </div>

                        <p style="font-size:0.72rem;color:rgba(255,255,255,0.35);margin-top:0.75rem;text-align:center;">
                            * Harga belum termasuk pajak. Dapat berubah sesuai negosiasi.
                        </p>

                        {{-- WhatsApp --}}
                        <button class="btn-wa mt-3" id="btn-send-wa" onclick="sendWhatsAppCalcNew()">
                            <i class="bi bi-whatsapp"></i> Konsultasi via WhatsApp
                        </button>

                        {{-- Order Sekarang --}}
                        <button class="btn-wa mt-2" id="btn-order-now" onclick="openOrderModal()"
                            style="background:linear-gradient(135deg,#7c3aed,#a855f7);border:none;box-shadow:0 4px 15px rgba(124,58,237,0.35);">
                            <i class="bi bi-bag-check-fill"></i> Order Sekarang
                        </button>

                        <button type="button" onclick="resetCalc()"
                            style="width:100%;margin-top:0.6rem;background:transparent;border:1px solid rgba(255,255,255,0.15);border-radius:50px;padding:0.55rem;font-size:0.8rem;color:rgba(255,255,255,0.4);cursor:pointer;transition:all .3s;"
                            onmouseover="this.style.borderColor='rgba(255,255,255,0.35)';this.style.color='rgba(255,255,255,0.7)';"
                            onmouseout="this.style.borderColor='rgba(255,255,255,0.15)';this.style.color='rgba(255,255,255,0.4)';">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Kalkulator
                        </button>
                    </div>
                </div>
            </div>{{-- end row --}}
        </div>
    </section>

    {{-- ======================== VENDOR SHOWCASE ======================== --}}
    <section id="team">
        <div class="container-xl">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-label">Vendor & Partner</span>
                <h2 class="section-title mt-2">Tim Profesional<br>di Balik Hari Spesial Anda</h2>
                <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
                <p style="color:var(--text-secondary);max-width:540px;margin:0 auto;font-size:0.92rem;line-height:1.7;">
                    Kami bekerja sama dengan vendor-vendor terbaik di bidangnya. Klik untuk lihat portfolio dan hubungi langsung.
                </p>
            </div>

            @php
            $vendorCategories = $vendors->pluck('category')->unique()->values();
            @endphp

            {{-- Category filter tabs with mobile scroll hint --}}
            <div class="vendor-tabs-wrapper" data-aos="fade-up" data-aos-delay="100">
                <div class="vendor-scroll-hint">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Geser untuk melihat kategori lainnya</span>
                </div>
                <div class="vendor-tabs">
                    <button class="vendor-tab-btn active" onclick="filterVendors('all', this)">
                        <i class="bi bi-grid-fill"></i> Semua
                    </button>
                    @foreach($vendorCategories as $cat)
                    @php
                    $catIcon = match($cat) {
                    'Wedding Planning' => 'bi-heart-fill',
                    'MUA' => 'bi-stars',
                    'Dekorasi' => 'bi-flower1',
                    'Dokumentasi' => 'bi-camera-fill',
                    'Catering' => 'bi-cup-hot-fill',
                    'Entertainment' => 'bi-music-note-beamed',
                    'Upacara Adat' => 'bi-award-fill',
                    'Music' => 'bi-music-note-beamed',
                    'MC' => 'bi-mic-fill',
                    default => 'bi-check-circle-fill',
                    };
                    @endphp
                    <button class="vendor-tab-btn" onclick="filterVendors('{{ $cat }}', this)">
                        <i class="bi {{ $catIcon }}"></i> {{ $cat }}
                    </button>
                    @endforeach
                </div>
            </div>

            {{-- Vendor cards --}}
            <div class="row g-4" id="vendor-grid">
                @foreach($vendors as $idx => $v)
                <div class="col-6 col-md-4 col-lg-3 vendor-col" data-category="{{ $v->category }}" data-aos="fade-up" data-aos-delay="{{ ($idx % 4) * 60 }}">
                    <div class="vendor-card">
                        <div class="vendor-photo-wrap">
                            <img src="{{ $v->image_url }}" alt="{{ $v->name }}" loading="lazy">
                            <div class="vendor-photo-overlay"></div>
                            <div class="vendor-category-badge">
                                <i class="bi {{ $v->category_icon }}"></i> {{ $v->category }}
                            </div>
                        </div>
                        <div class="vendor-body">
                            <div class="vendor-name">{{ $v->name }}</div>
                            <div class="vendor-handle">{{ $v->handle }}</div>
                            <p class="vendor-desc">{{ $v->description }}</p>
                        </div>
                        <div class="vendor-cta">
                            <a href="{{ $v->instagram_url }}" target="_blank" rel="noopener" class="vendor-btn-ig">
                                <i class="bi bi-instagram"></i> Lihat Portfolio
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ======================== INSTAGRAM UPDATE & ARTIKEL ======================== --}}
    <section id="artikel" style="background: var(--bg-dark-secondary, #0b0f19); padding: 5rem 0; border-top: 1px solid rgba(232,201,122,0.1); border-bottom: 1px solid rgba(232,201,122,0.1);">
        <style>
            .ig-card {
                background: rgba(255, 255, 255, 0.02);
                border: 1px solid rgba(232, 201, 122, 0.2);
                border-radius: 16px;
                overflow: hidden;
                transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .ig-card:hover {
                transform: translateY(-8px);
                border-color: rgba(232, 201, 122, 0.6);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.45);
            }

            .ig-card:hover .ig-overlay-link {
                opacity: 1 !important;
            }

            .ig-card:hover .ig-post-img {
                transform: scale(1.06);
            }
        </style>
        <div class="container-xl">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-label">Update & Galeri Instagram</span>
                <h2 class="section-title mt-2" style="color: white;">Kilas Cerita Terbaru<br>@kembarkencanaplanner</h2>
                <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
                <p style="color:var(--text-secondary);max-width:560px;margin:0 auto;font-size:0.92rem;line-height:1.7;">
                    Momen kebahagiaan, dekorasi impian, dan inspirasi pernikahan langsung dari feeds Instagram resmi Kembar Kencana.
                </p>
            </div>

            @if($instagramPosts->isEmpty())
            <div class="text-center py-5" style="color: var(--text-secondary);" data-aos="fade-up">
                <div class="d-inline-flex align-items-center justify-content-center mb-3 rounded-circle" style="width:70px; height:70px; background: rgba(232,201,122,0.1); border: 1px solid rgba(232,201,122,0.3);">
                    <i class="bi bi-instagram" style="font-size: 2rem; color: #E8C97A;"></i>
                </div>
                <p class="mb-3 text-white-50">Kunjungi Instagram resmi kami untuk melihat postingan & update momen pernikahan terbaru.</p>
                <a href="https://www.instagram.com/kembarkencanaplanner/" target="_blank" rel="noopener" class="btn-gold d-inline-flex align-items-center gap-2">
                    <i class="bi bi-instagram"></i> Follow @kembarkencanaplanner
                </a>
            </div>
            @else
            <div class="row g-4">
                @foreach($instagramPosts as $idx => $post)
                <div class="col-12 col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($idx % 3) * 80 }}">
                    <div class="ig-card h-100 d-flex flex-column">
                        <div class="ig-media-wrap position-relative" style="aspect-ratio: 1/1; overflow: hidden; background: #000;">
                            @if($post->is_video && $post->media_url)
                            <video src="{{ $post->media_url }}" controls style="width:100%; height:100%; object-fit:cover;"></video>
                            @else
                            <img src="{{ $post->display_image_url }}" alt="Instagram Post" loading="lazy" style="width:100%; height:100%; object-fit:cover; transition: transform 0.4s ease;" class="ig-post-img">
                            @endif
                            <a href="{{ $post->permalink }}" target="_blank" rel="noopener" class="ig-overlay-link position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-white text-decoration-none" style="background: rgba(0,0,0,0.55); backdrop-filter: blur(2px); opacity: 0; transition: opacity 0.3s ease;">
                                <i class="bi bi-instagram mb-2" style="font-size: 2.2rem; color:#E8C97A;"></i>
                                <span class="btn-gold text-dark font-semibold py-1.5 px-3.5 text-xs rounded-full">Lihat di Instagram</span>
                            </a>
                        </div>
                        <div class="p-3.5 d-flex flex-column flex-grow-1" style="background: rgba(15, 23, 42, 0.4);">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge" style="background: rgba(232,201,122,0.15); color: #E8C97A; font-size:0.7rem; font-weight:600; padding: 0.35rem 0.6rem; border: 1px solid rgba(232,201,122,0.25);">
                                    <i class="bi bi-instagram me-1"></i> {{ ucfirst(strtolower($post->media_type ?? 'POST')) }}
                                </span>
                                @if($post->posted_at)
                                <small style="color: rgba(255,255,255,0.45); font-size:0.75rem;">
                                    {{ $post->posted_at->diffForHumans() }}
                                </small>
                                @endif
                            </div>
                            @if($post->caption)
                            <p class="mb-0 text-white-50" style="font-size: 0.85rem; line-height: 1.55; display: -webkit-box; -webkit-line-clamp: 3; line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $post->caption }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="https://www.instagram.com/kembarkencanaplanner/" target="_blank" rel="noopener" class="btn-outline-gold d-inline-flex align-items-center gap-2 py-2.5 px-4">
                    <i class="bi bi-instagram"></i> Ikuti @kembarkencanaplanner di Instagram
                </a>
            </div>
            @endif
        </div>
    </section>

    {{-- ======================== KONTAK ======================== --}}
    <section id="kontak">
        <div class="container-xl">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-label">Hubungi Kami</span>
                <h2 class="section-title mt-2">Siap Membantu<br>Mewujudkan Impian Anda</h2>
                <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
            </div>

            <div class="row g-4 align-items-start">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info-card">
                        <div class="contact-info-item">
                            <div class="contact-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <div>
                                <div class="contact-info-label">Alamat Kantor</div>
                                <div class="contact-info-value">Jl.Terusan Padasuka Kp.Lebakgede RT 01/04 no 278 Desa. Cimenyan, Kec. Cimenyan, Kabupaten Bandung, Jawa Barat 40197</div>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-icon"><i class="bi bi-telephone-fill"></i></div>
                            <div>
                                <div class="contact-info-label">Nomor Telepon / WA</div>
                                <div class="contact-info-value">0813-1290-1284</div>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-icon"><i class="bi bi-envelope-fill"></i></div>
                            <div>
                                <div class="contact-info-label">Email</div>
                                <div class="contact-info-value">kembarkencanaplanner@gmail.com</div>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-icon"><i class="bi bi-clock-fill"></i></div>
                            <div>
                                <div class="contact-info-label">Jam Operasional</div>
                                <div class="contact-info-value">Senin – Sabtu, 09.00 – 18.00 WIB</div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="https://wa.me/6281312901284?text=Halo%20Kembar%20Kencana%20Wedding%2C%20saya%20ingin%20konsultasi%20pernikahan." target="_blank" class="btn-wa"
                                style="display:inline-flex;border-radius:50px;width:auto;padding:0.75rem 1.5rem;font-size:0.88rem;text-decoration:none;">
                                <i class="bi bi-whatsapp me-2"></i> Chat Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="map-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.0959437434185!2d107.6561308737901!3d-6.879108167308221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7252d647d0b%3A0xa6ec70e370891857!2skembar%20kencana%20wedding%20organizer!5e0!3m2!1sid!2sid!4v1776866584261!5m2!1sid!2sid"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================== FOOTER ======================== --}}
    <footer>
        <div class="container-xl">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <div class="footer-brand">Kembar Kencana</div>
                    <p class="footer-tagline">
                        Wedding Organizer profesional yang hadir untuk mewujudkan momen pernikahan impian Anda. Dengan cinta, dedikasi, dan pengalaman lebih dari 8 tahun.
                    </p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="https://www.instagram.com/kembarkencanaplanner?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" style="width:38px;height:38px;background:rgba(255,255,255,0.08);border-radius:50%;display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.6);text-decoration:none;transition:var(--transition);"
                            onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                            onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='rgba(255,255,255,0.6)';">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/kembar.kencana.73" style="width:38px;height:38px;background:rgba(255,255,255,0.08);border-radius:50%;display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.6);text-decoration:none;transition:var(--transition);"
                            onmouseover="this.style.background='var(--gold)';this.style.color='white';"
                            onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='rgba(255,255,255,0.6)';">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://wa.me/6281312901284" target="_blank" style="width:38px;height:38px;background:rgba(255,255,255,0.08);border-radius:50%;display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.6);text-decoration:none;transition:var(--transition);"
                            onmouseover="this.style.background='#25D366';this.style.color='white';"
                            onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='rgba(255,255,255,0.6)';">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-2">
                    <div class="footer-heading">Navigasi</div>
                    <a href="#home" class="footer-link">Home</a>
                    <a href="#portofolio" class="footer-link">Portofolio</a>
                    <a href="#paketan" class="footer-link">Paketan</a>
                    <a href="#kalkulator" class="footer-link">Kalkulator</a>
                    <a href="#team" class="footer-link">Vendor</a>
                    <a href="#kontak" class="footer-link">Kontak</a>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="footer-heading">Vendor Kami</div>
                    <a href="#team" class="footer-link"><i class="bi bi-heart-fill me-1" style="font-size:0.7rem;"></i>Wedding Planning</a>
                    <a href="#team" class="footer-link"><i class="bi bi-stars me-1" style="font-size:0.7rem;"></i>Makeup Artist</a>
                    <a href="#team" class="footer-link"><i class="bi bi-flower1 me-1" style="font-size:0.7rem;"></i>Dekorasi & Florist</a>
                    <a href="#team" class="footer-link"><i class="bi bi-camera-fill me-1" style="font-size:0.7rem;"></i>Dokumentasi</a>
                    <a href="#team" class="footer-link"><i class="bi bi-cup-hot-fill me-1" style="font-size:0.7rem;"></i>Catering</a>
                    <a href="#team" class="footer-link"><i class="bi bi-award-fill me-1" style="font-size:0.7rem;"></i>Upacara Adat</a>
                </div>

                <div class="col-lg-3">
                    <div class="footer-heading">Kontak Cepat</div>
                    <p style="font-size:0.85rem;line-height:1.7;">
                        <i class="bi bi-geo-alt me-2" style="color:var(--gold);"></i>Bandung, Jawa Barat<br>
                        <i class="bi bi-telephone me-2" style="color:var(--gold);"></i>+62 813-1290-1284<br>
                        <i class="bi bi-envelope me-2" style="color:var(--gold);"></i>kembarkencanaplanner@gmail.com
                    </p>
                </div>
            </div>

            <hr class="footer-divider">
            <p class="footer-copy">
                © {{ date('Y') }} <span class="footer-gold">Kembar Kencana Wedding Organizer</span>. All rights reserved.
                <span class="d-none d-sm-inline">— Dibuat dengan ❤️ untuk pasangan bahagia di Indonesia.</span>
            </p>
        </div>
    </footer>

    {{-- ======================== SCRIPTS ======================== --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        // ============================================================
        // NOMOR WHATSAPP (ambil dari settings atau default)
        // ============================================================
        const WA_NUMBER = '{{ $waNumber ?? "6281312901284" }}';

        // ============================================================
        // AOS (Scroll Animation)
        // ============================================================
        AOS.init({
            once: true,
            duration: 700,
            easing: 'ease-out-quart'
        });

        // ============================================================
        // NAVBAR STICKY
        // ============================================================
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // ============================================================
        // MOBILE MENU TOGGLE
        // ============================================================
        document.getElementById('menuToggle').addEventListener('click', function() {
            const menu = document.getElementById('mobileMenu');
            menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
        });

        // Tutup mobile menu saat link diklik
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobileMenu').style.display = 'none';
            });
        });

        // ============================================================
        // SMOOTH SCROLL
        // ============================================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    const offset = 80;
                    const top = target.getBoundingClientRect().top + window.scrollY - offset;
                    window.scrollTo({
                        top,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // ============================================================
        // KALKULATOR — Data & State
        // ============================================================
        const CALC_PACKAGES = JSON.parse(document.getElementById('calc-packages-data')?.textContent || '[]');
        const CALC_ADDONS = JSON.parse(document.getElementById('calc-addons-data')?.textContent || '[]');
        const CALC_DEKORASI = JSON.parse(document.getElementById('calc-dekorasi-data')?.textContent || '[]');

        let calcMode = 'paket'; // 'paket' | 'custom'
        let calcItems = {}; // { label: price }
        let selectedPkg = null; // selected package object

        // ============================================================
        // HELPERS
        // ============================================================
        function fmt(num) {
            return 'Rp ' + num.toLocaleString('id-ID');
        }

        function fieldVal(id) {
            const el = document.getElementById(id);
            return el ? el.value.trim() : '';
        }

        // ============================================================
        // MODE SWITCHER
        // ============================================================
        function switchCalcMode(mode) {
            calcMode = mode;

            // Toggle tabs
            document.getElementById('ctab-paket').classList.toggle('active', mode === 'paket');
            document.getElementById('ctab-custom').classList.toggle('active', mode === 'custom');

            // Toggle form panels
            document.getElementById('form-paket').style.display = mode === 'paket' ? '' : 'none';
            document.getElementById('form-custom').style.display = mode === 'custom' ? '' : 'none';

            // Update result mode badge
            const badge = document.getElementById('result-mode');
            if (mode === 'paket') {
                badge.innerHTML = '<i class="bi bi-heart-fill me-1"></i>MODE: PAKET PERNIKAHAN';
            } else {
                badge.innerHTML = '<i class="bi bi-sliders me-1"></i>MODE: CUSTOM TAMBAHAN';
            }

            updateCalc();
        }

        // ============================================================
        // BATCH → PAKET CHAIN
        // ============================================================
        function onBatchChange() {
            const batch = parseInt(document.getElementById('c-batch').value) || null;
            const selPaket = document.getElementById('c-paket');

            // Reset dependent state
            selectedPkg = null;
            document.getElementById('paket-info').style.display = 'none';
            const addonCard = document.getElementById('addon-paket-card');
            if (addonCard) addonCard.style.display = 'none';

            if (!batch) {
                selPaket.innerHTML = '<option value="">— Pilih Batch dulu —</option>';
                selPaket.disabled = true;
                updateCalc();
                return;
            }

            const filtered = CALC_PACKAGES.filter(p => p.batch === batch);
            selPaket.innerHTML = '<option value="">— Pilih Paket —</option>' +
                filtered.map(p => `<option value="${p.id}">${p.name} — ${fmt(p.price)}</option>`).join('');
            selPaket.disabled = false;
            updateCalc();
        }

        // ============================================================
        // TOGGLE TANGGAL BELUM FIX
        // ============================================================
        function toggleTglBelumFix(cb) {
            const isFlex = cb.checked;
            const tgl = document.getElementById('c-tgl');
            const bln = document.getElementById('c-bulan');
            const thn = document.getElementById('c-tahun');
            if (tgl) {
                tgl.disabled = isFlex;
                if (isFlex) {
                    tgl.value = '';
                    tgl.style.opacity = '0.5';
                } else {
                    tgl.style.opacity = '1';
                }
            }
            if (bln) {
                bln.disabled = isFlex;
                if (isFlex) {
                    bln.value = '';
                    bln.style.opacity = '0.5';
                } else {
                    bln.style.opacity = '1';
                }
                bln.syncCustomSelect?.();
            }
            if (thn) {
                thn.disabled = isFlex;
                if (isFlex) {
                    thn.value = '';
                    thn.style.opacity = '0.5';
                } else {
                    thn.style.opacity = '1';
                }
            }
        }

        function onPaketChange() {
            const id = parseInt(document.getElementById('c-paket').value) || null;
            selectedPkg = id ? CALC_PACKAGES.find(p => p.id === id) : null;

            const infoBox = document.getElementById('paket-info');
            const addonCard = document.getElementById('addon-paket-card');

            if (selectedPkg) {
                // Show info box
                document.getElementById('pi-name').textContent = selectedPkg.name;
                document.getElementById('pi-pax').textContent = selectedPkg.pax ? `👥 Kapasitas ${selectedPkg.pax.toLocaleString('id-ID')} pax` : '';
                document.getElementById('pi-price').textContent = fmt(selectedPkg.price) + ' / paket';

                // Fasilitas Termasuk (Badge Hijau)
                const incWrap = document.getElementById('pi-included-wrap');
                const incBox = document.getElementById('pi-included');
                if (incWrap && incBox) {
                    if (selectedPkg.included && selectedPkg.included.length > 0) {
                        incBox.innerHTML = selectedPkg.included.map(k =>
                            `<span style="font-size:0.72rem;background:rgba(16,185,129,0.15);color:#6ee7b7;border:1px solid rgba(16,185,129,0.3);padding:2px 8px;border-radius:20px;font-weight:600;">✓ ${k}</span>`
                        ).join('');
                        incWrap.style.display = '';
                    } else {
                        incWrap.style.display = 'none';
                    }
                }

                // Fasilitas Belum Termasuk (Badge Kuning)
                const excWrap = document.getElementById('pi-excluded-wrap');
                const excBox = document.getElementById('pi-excluded');
                if (excWrap && excBox) {
                    if (selectedPkg.excluded && selectedPkg.excluded.length > 0) {
                        excBox.innerHTML = selectedPkg.excluded.map(k =>
                            `<span style="font-size:0.72rem;background:rgba(251,191,36,0.12);color:#fbbf24;border:1px solid rgba(251,191,36,0.3);padding:2px 8px;border-radius:20px;font-weight:600;">+ ${k}</span>`
                        ).join('');
                        excWrap.style.display = '';
                    } else {
                        excWrap.style.display = 'none';
                    }
                }

                // Venue Info Otomatis (Tanpa teks sudah include / sudah termasuk)
                const venueInfo = document.getElementById('pi-venue-info');
                const venueText = document.getElementById('pi-venue-text');
                if (venueInfo && venueText) {
                    if (selectedPkg.hasVenue && selectedPkg.venueName) {
                        venueText.innerHTML = `<span style="color:#34d399;font-weight:700;"><i class="bi bi-building me-1"></i> Venue:</span> <strong style="color:#ffffff;margin-left:0.25rem;">${selectedPkg.venueName}</strong>`;
                        venueInfo.style.background = 'rgba(16, 185, 129, 0.14)';
                        venueInfo.style.border = '1px solid rgba(16, 185, 129, 0.35)';
                        venueInfo.style.color = '#6ee7b7';
                        venueInfo.style.display = 'block';
                    } else {
                        venueText.innerHTML = `<span style="color:rgba(255,255,255,0.7);font-weight:600;"><i class="bi bi-house-door me-1"></i> Lokasi Acara:</span> <strong style="color:#ffffff;margin-left:0.25rem;">Rumah / Lokasi Pribadi</strong>`;
                        venueInfo.style.background = 'rgba(255, 255, 255, 0.05)';
                        venueInfo.style.border = '1px solid rgba(255, 255, 255, 0.12)';
                        venueInfo.style.color = 'rgba(255, 255, 255, 0.75)';
                        venueInfo.style.display = 'block';
                    }
                }

                // ── Filter Langkah 2 Layanan Tambahan (HANYA YANG BELUM TERMASUK) ──
                const excludedList = selectedPkg.excluded || [];
                const allIncludedMsg = document.getElementById('pkg-all-included-msg');

                if (excludedList.length === 0) {
                    if (allIncludedMsg) allIncludedMsg.style.display = 'block';
                } else {
                    if (allIncludedMsg) allIncludedMsg.style.display = 'none';
                }

                // Tampilkan hanya blok layanan yang statusnya excluded (belum termasuk)
                document.querySelectorAll('#addon-paket-card .layanan-tambahan-block').forEach(block => {
                    const sKey = block.dataset.service;
                    const isExcluded = excludedList.includes(sKey);

                    if (isExcluded) {
                        block.style.display = '';
                    } else {
                        block.style.display = 'none';
                        // Reset inputs inside hidden block agar tidak masuk ke hitungan total
                        block.querySelectorAll('.layanan-extra-check').forEach(chk => {
                            chk.checked = false;
                        });
                        block.querySelectorAll('.venue-extra-radio').forEach(r => {
                            r.checked = false;
                        });
                        block.querySelectorAll('.addon-qty').forEach(inp => {
                            inp.value = 0;
                        });
                        block.querySelectorAll('.addon-card').forEach(card => {
                            card.classList.remove('is-active');
                        });
                    }
                });

                infoBox.style.display = '';
                if (addonCard) addonCard.style.display = '';
            } else {
                infoBox.style.display = 'none';
                if (addonCard) addonCard.style.display = 'none';
            }

            updateCalc();
        }

        // ============================================================
        // REAL-TIME CALCULATOR
        // ============================================================
        function updateCalc() {
            calcItems = {};

            if (calcMode === 'paket') {
                // ── 1. Paket Utama (Harga Final Tanpa Double Counting) ──
                if (selectedPkg) {
                    calcItems[selectedPkg.name] = selectedPkg.price;
                }

                // ── 2. Layanan Tambahan di Langkah 2 (Hanya dari blok yang belum termasuk/visible) ──
                // A. Checkbox tambahan (Adat, Music, MC)
                document.querySelectorAll('#addon-paket-card .layanan-tambahan-block:not([style*="display: none"]) .layanan-extra-check:checked').forEach(chk => {
                    const name = chk.dataset.name;
                    const price = parseFloat(chk.dataset.price) || 0;
                    calcItems[name] = price;
                });

                // B. Radio Catering vendor rekanan
                document.querySelectorAll('#addon-paket-card .layanan-tambahan-block:not([style*="display: none"]) .catering-extra-radio:checked').forEach(r => {
                    const name = r.dataset.name;
                    const price = parseFloat(r.dataset.price) || 0;
                    calcItems[name] = price;
                });

                // C. Radio venue gedung rekanan
                document.querySelectorAll('#addon-paket-card .layanan-tambahan-block:not([style*="display: none"]) .venue-extra-radio:checked').forEach(r => {
                    const name = r.dataset.name;
                    const price = parseFloat(r.dataset.price) || 0;
                    calcItems[name] = price;
                });

                // D. Stepper qty (Tenda, Panggung)
                document.querySelectorAll('#addon-paket-card .layanan-tambahan-block:not([style*="display: none"]) .addon-qty').forEach(inp => {
                    const qty = parseInt(inp.value) || 0;
                    if (qty > 0) {
                        const name = inp.dataset.name;
                        const price = parseFloat(inp.dataset.price) || 0;
                        const unit = inp.dataset.unit;
                        calcItems[`${name} (×${qty} ${unit})`] = qty * price;
                    }
                });

            } else {
                // ── Mode Custom Tambahan ──

                // 1. Paket Dekorasi (radio)
                const dekEl = document.querySelector('.dek-radio:checked');
                if (dekEl) {
                    calcItems[dekEl.dataset.name] = parseFloat(dekEl.dataset.price) || 0;
                }

                // 2. Add-on Custom (AC, Tenda, Panggung, Kursi, Alat Catering)
                document.querySelectorAll('.addon-custom-qty').forEach(inp => {
                    const qty = parseInt(inp.value) || 0;
                    if (qty > 0) {
                        const name = inp.dataset.name;
                        const price = parseFloat(inp.dataset.price) || 0;
                        const unit = inp.dataset.unit;
                        calcItems[`${name} (×${qty} ${unit})`] = qty * price;
                    }
                });
            }

            // ── Render result items ──
            const container = document.getElementById('result-items');
            const entries = Object.entries(calcItems);

            if (entries.length === 0) {
                container.innerHTML = `<p style="color:rgba(255,255,255,0.3);font-size:0.85rem;text-align:center;padding:1.5rem 0;">
            Pilih paket atau layanan untuk melihat estimasi</p>`;
            } else {
                container.innerHTML = entries.map(([name, price]) =>
                    `<div class="result-item">
                <span class="result-item-name">${name}</span>
                <span class="result-item-price">${price > 0 ? fmt(price) : '<em style="font-size:0.75rem;color:var(--champagne);font-weight:600;">(Dikonfirmasi Admin)</em>'}</span>
            </div>`
                ).join('');
            }

            // ── Total ──
            const total = entries.reduce((sum, [, p]) => sum + p, 0);
            document.getElementById('result-total').textContent = fmt(total);
        }

        // ============================================================
        // ADD-ON STEPPER & INTERACTION
        // ============================================================
        function changeAddonQty(id, delta, isCustom) {
            const selector = isCustom ? `.addon-custom-qty[data-id="${id}"]` : `.addon-qty[data-id="${id}"]`;
            const input = document.querySelector(selector);
            if (!input) return;
            let val = parseInt(input.value) || 0;
            val = Math.max(0, val + delta);
            input.value = val;

            const card = input.closest('.addon-card');
            if (card) {
                if (val > 0) card.classList.add('is-active');
                else card.classList.remove('is-active');
            }
            updateCalc();
        }

        function onAddonInputChange(input) {
            let val = parseInt(input.value) || 0;
            if (val < 0) val = 0;
            input.value = val;

            const card = input.closest('.addon-card');
            if (card) {
                if (val > 0) card.classList.add('is-active');
                else card.classList.remove('is-active');
            }
            updateCalc();
        }

        // ============================================================
        // DEKORASI DETAIL TOGGLE
        // ============================================================
        function toggleDekDetail(radio) {
            // Sembunyikan semua detail box
            document.querySelectorAll('.dek-detail-box').forEach(box => {
                box.classList.remove('show');
                box.style.display = 'none';
            });
            // Reset style semua label
            document.querySelectorAll('.dek-item-wrapper label').forEach(lbl => {
                lbl.style.borderRadius = '8px';
                lbl.style.borderColor = 'rgba(255,255,255,0.1)';
                lbl.style.background = 'rgba(255,255,255,0.03)';
            });

            if (radio.checked) {
                const detailBox = document.getElementById('dek-detail-' + radio.value);
                if (detailBox) {
                    detailBox.classList.add('show');
                    detailBox.style.display = 'block';

                    const wrapper = radio.closest('.dek-item-wrapper');
                    const lbl = wrapper.querySelector('label');
                    lbl.style.borderRadius = '8px 8px 0 0';
                    lbl.style.borderColor = 'rgba(196,154,60,0.4)';
                    lbl.style.background = 'rgba(196,154,60,0.08)';
                }
            }
        }

        // ============================================================
        // RESET
        // ============================================================
        function resetCalc() {
            // Reset Data Acara inputs
            ['c-nama', 'c-hp', 'c-alamat', 'c-tgl', 'c-bulan', 'c-tahun', 'c-tamu', 'c-lokasi'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.value = '';
            });

            const tglFlex = document.getElementById('c-tgl-belum-fix');
            if (tglFlex) {
                tglFlex.checked = false;
                toggleTglBelumFix(tglFlex);
            }

            const batch = document.getElementById('c-batch');
            if (batch) {
                batch.value = '';
            }

            const paket = document.getElementById('c-paket');
            if (paket) {
                paket.innerHTML = '<option value="">— Pilih Batch dulu —</option>';
                paket.disabled = true;
            }

            selectedPkg = null;
            const infoBox = document.getElementById('paket-info');
            if (infoBox) infoBox.style.display = 'none';

            const addonCard = document.getElementById('addon-paket-card');
            if (addonCard) addonCard.style.display = 'none';

            // Reset Layanan Tambahan checkboxes & radios
            document.querySelectorAll('.layanan-extra-check, .venue-extra-radio').forEach(input => {
                input.checked = false;
            });

            // Reset dekorasi radio
            document.querySelectorAll('.dek-radio').forEach(r => {
                r.checked = false;
                toggleDekDetail(r);
            });

            // Reset all qty inputs & active state cards
            document.querySelectorAll('.addon-qty, .addon-custom-qty').forEach(inp => inp.value = 0);
            document.querySelectorAll('.addon-card').forEach(card => card.classList.remove('is-active'));

            updateCalc();
            document.querySelectorAll('.form-select-custom').forEach(s => s.syncCustomSelect?.());
        }

        // ============================================================
        // WHATSAPP — Kirim estimasi ke WA
        // ============================================================
        function sendWhatsAppCalcNew() {
            const nama = fieldVal('c-nama') || '-';
            const hp = fieldVal('c-hp') || '-';
            const alamat = fieldVal('c-alamat') || '-';
            const tgl = fieldVal('c-tgl') || '';
            const bulan = fieldVal('c-bulan') || '';
            const tahun = fieldVal('c-tahun') || '';
            const tamu = fieldVal('c-tamu') || '-';
            const lokasi = fieldVal('c-lokasi') || '-';
            const isFlex = document.getElementById('c-tgl-belum-fix')?.checked;

            let tglText = isFlex ? 'Tanggal Belum Pasti (Masih Fleksibel)' : ((tgl && bulan && tahun) ? `${tgl} ${bulan} ${tahun}` : '-');

            const total = Object.entries(calcItems).reduce((s, [, p]) => s + p, 0);
            const entries = Object.entries(calcItems);

            let rincian;
            if (entries.length === 0) {
                rincian = '  (Belum ada layanan dipilih — silakan pilih dulu)';
            } else {
                rincian = entries
                    .map(([name, price]) => price > 0 ?
                        `  • ${name}: ${fmt(price)}` :
                        `  • ${name}: (harga dikonfirmasi / include)`
                    ).join('\n');
            }

            const modeLabel = calcMode === 'paket' ? 'Paket Pernikahan' : 'Custom Tambahan';

            let venueLine = '';
            if (calcMode === 'paket' && selectedPkg) {
                venueLine = `• Venue           : ${selectedPkg.venueName ? selectedPkg.venueName : 'Rumah / Lokasi Pribadi'}\n`;
            }

            const msg =
                `Halo Kembar Kencana Wedding Organizer 💍

*Estimasi Biaya Pernikahan — ${modeLabel}*

📋 *Data Pemesan:*
• Nama / Pasangan : ${nama}
• No. HP / WA     : ${hp}
• Alamat          : ${alamat}
• Tanggal Acara   : ${tglText}
• Jumlah Tamu     : ${tamu} orang
• Lokasi Acara    : ${lokasi}
${venueLine}
🛎️ *Rincian Paket & Layanan:*
${rincian}

💰 *Total Estimasi: ${fmt(total)}*

Saya ingin berkonsultasi lebih lanjut mengenai detail dan ketersediaan tanggal. Terima kasih! 🙏`;

            window.open(`https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(msg)}`, '_blank');
        }

        // ============================================================
        // BATCH TAB SWITCHER
        // ============================================================
        function switchBatch(batchNum) {
            const num = parseInt(batchNum);
            // Update active tab button
            document.querySelectorAll('.batch-tab-btn').forEach(btn => btn.classList.remove('active'));
            const activeBtn = document.getElementById('btab-' + num);
            if (activeBtn) activeBtn.classList.add('active');

            // Show/hide package columns
            document.querySelectorAll('.pkg-col[data-batch]').forEach(col => {
                const isMatch = parseInt(col.dataset.batch) === num;
                if (isMatch) {
                    col.style.display = '';
                    col.style.opacity = '0';
                    col.style.transform = 'translateY(15px)';
                    requestAnimationFrame(() => {
                        col.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                        col.style.opacity = '1';
                        col.style.transform = 'translateY(0)';
                    });
                } else {
                    col.style.display = 'none';
                }
            });
        }

        // ============================================================
        // VENDOR CATEGORY FILTER
        // ============================================================
        function filterVendors(category, activeBtn) {
            // Update active tab
            document.querySelectorAll('.vendor-tab-btn').forEach(btn => btn.classList.remove('active'));
            if (activeBtn) activeBtn.classList.add('active');

            // Filter vendor cards with animation
            document.querySelectorAll('.vendor-col').forEach(col => {
                const match = category === 'all' || col.dataset.category === category;
                if (match) {
                    col.style.display = '';
                    col.style.opacity = '0';
                    col.style.transform = 'translateY(20px)';
                    requestAnimationFrame(() => {
                        col.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                        col.style.opacity = '1';
                        col.style.transform = 'translateY(0)';
                    });
                } else {
                    col.style.display = 'none';
                }
            });
        }

        // ============================================================
        // PACKAGE MODAL
        // ============================================================
        let currentModalPackage = null;

        function openPackageModal(id) {
            const dataEl = document.getElementById('packages-data');
            if (!dataEl) return;

            const packages = JSON.parse(dataEl.textContent);
            const pkg = packages.find(p => p.id == id);
            if (!pkg) return;

            currentModalPackage = pkg;

            document.getElementById('modal-tier').textContent = `✦ Batch ${pkg.batch || 1}`;
            document.getElementById('modal-name').textContent = pkg.name;
            document.getElementById('modal-price').textContent = pkg.price_formatted + ' / paket';
            document.getElementById('modal-desc').textContent = pkg.description;

            // Pax info
            const paxEl = document.getElementById('modal-pax');
            if (paxEl) paxEl.textContent = pkg.pax ? `👥 ${pkg.pax.toLocaleString('id-ID')} pax` : '';

            // Facilities rendering — accordion by category from facilities_json
            const facilitiesEl = document.getElementById('modal-facilities');
            facilitiesEl.innerHTML = renderFacilitiesAccordion(pkg.facilities_json, pkg.facilities);

            // Activate first accordion item by default
            const firstBody = facilitiesEl.querySelector('.fac-accordion-body');
            const firstChev = facilitiesEl.querySelector('.fac-accordion-chevron');
            if (firstBody) {
                firstBody.classList.add('open');
                firstChev && firstChev.classList.add('open');
            }

            new bootstrap.Modal(document.getElementById('packageModal')).show();
        }

        /**
         * Render facilities as accordion if facilities_json exists,
         * otherwise fall back to legacy newline-separated flat list.
         */
        function getCategoryIcon(cat) {
            const c = String(cat).toLowerCase();
            if (c.includes('mua') || c.includes('makeup') || c.includes('busana') || c.includes('rias')) return 'bi-stars';
            if (c.includes('dekor') || c.includes('pelaminan')) return 'bi-flower1';
            if (c.includes('dokumen') || c.includes('foto') || c.includes('video')) return 'bi-camera-fill';
            if (c.includes('catering') || c.includes('katering') || c.includes('prasmanan')) return 'bi-cup-hot-fill';
            if (c.includes('tenda')) return 'bi-house-heart';
            if (c.includes('mc') || c.includes('music') || c.includes('musik') || c.includes('band')) return 'bi-music-note-beamed';
            if (c.includes('organizer') || c.includes('wo') || c.includes('planner')) return 'bi-heart-fill';
            if (c.includes('adat') || c.includes('lengser')) return 'bi-award-fill';
            if (c.includes('venue') || c.includes('gedung')) return 'bi-building';
            if (c.includes('bonus') || c.includes('free') || c.includes('hadiah')) return 'bi-gift-fill';
            return 'bi-check-circle-fill';
        }

        /**
         * Render facilities as accordion if facilities_json exists,
         * otherwise fall back to legacy newline-separated flat list.
         */
        function renderFacilitiesAccordion(facilitiesJson, facilitiesText) {
            // ── Mode 1: structured JSON accordion ──────────────────────────────────
            if (Array.isArray(facilitiesJson) && facilitiesJson.length > 0) {
                return facilitiesJson.map((group, gi) => {
                    const cat = group.category || 'Lainnya';
                    const items = (group.items || []).filter(Boolean);
                    const icon = getCategoryIcon(cat);
                    const uid = 'fac-' + gi;
                    const count = items.length;

                    const itemsHtml = items.length ?
                        items.map(it =>
                            `<div class="fac-item-row">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>${escHtmlModal(it)}</span>
                    </div>`).join('') :
                        '<div class="fac-item-row" style="color:var(--muted); opacity: 0.7;"><i class="bi bi-dash"></i><span><em>Belum ada item</em></span></div>';

                    return `
            <div class="fac-accordion-item">
                <button type="button" class="fac-accordion-btn" onclick="toggleFacAccordion('${uid}')">
                    <span class="fac-accordion-label">
                        <span class="fac-accordion-icon-wrap"><i class="bi ${icon}"></i></span>
                        <span>${escHtmlModal(cat)}${count > 0 ? ' <span style="font-size:0.68rem;opacity:0.5;font-weight:400;">(' + count + ')</span>' : ''}</span>
                    </span>
                    <i class="bi bi-chevron-down fac-accordion-chevron" id="chev-${uid}"></i>
                </button>
                <div class="fac-accordion-body" id="body-${uid}">${itemsHtml}</div>
            </div>`;
                }).join('');
            }

            // ── Mode 2: legacy plain-text fallback ─────────────────────────────────
            const lines = facilitiesText ? facilitiesText.split('\n').filter(l => l.trim()) : [];
            if (lines.length > 0) {
                return lines.map(f => {
                    const trimmed = f.trim();
                    // Detect == Category == header lines
                    const catMatch = trimmed.match(/^==\s*(.+?)\s*==$/);
                    if (catMatch) {
                        return `<div style="font-size:0.72rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:var(--gold);margin:0.8rem 0 0.4rem;padding-bottom:0.3rem;border-bottom:1px solid rgba(184,147,60,0.2);">
                    <i class="bi bi-tag-fill" style="font-size:0.65rem;margin-right:0.3rem;"></i>${escHtmlModal(catMatch[1])}
                </div>`;
                    }
                    return `<div class="facility-item">
                <i class="bi bi-check-circle-fill facility-check"></i>
                <span class="facility-text">${escHtmlModal(trimmed.replace(/^[-•]\s*/,''))}</span>
            </div>`;
                }).join('');
            }

            return '<p style="color:var(--muted);">Detail fasilitas akan dikonfirmasi saat konsultasi.</p>';
        }

        function toggleFacAccordion(uid) {
            const body = document.getElementById('body-' + uid);
            const chev = document.getElementById('chev-' + uid);
            if (body) body.classList.toggle('open');
            if (chev) chev.classList.toggle('open');
        }

        function escHtmlModal(str) {
            return String(str)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        function openDummyPackageModal(name, price, desc, facilities) {
            currentModalPackage = {
                name,
                price_formatted: 'Rp ' + price,
                description: desc,
                facilities
            };

            document.getElementById('modal-tier').textContent = `✦ ${name}`;
            document.getElementById('modal-name').textContent = name;
            document.getElementById('modal-price').textContent = `Rp ${price} / paket`;
            document.getElementById('modal-desc').textContent = desc;
            const paxEl = document.getElementById('modal-pax');
            if (paxEl) paxEl.textContent = '';

            const lines = facilities.split('\n').filter(l => l.trim());
            document.getElementById('modal-facilities').innerHTML = lines.map(f =>
                `<div class="facility-item">
            <i class="bi bi-check-circle-fill facility-check"></i>
            <span class="facility-text">${f.replace(/^[-•]\s*/,'').trim()}</span>
        </div>`
            ).join('');

            new bootstrap.Modal(document.getElementById('packageModal')).show();
        }

        function sendWhatsAppPackage() {
            if (!currentModalPackage) return;
            const msg = `Halo Kembar Kencana Wedding Organizer 💍\n\nSaya tertarik dengan *${currentModalPackage.name}* dengan harga *${currentModalPackage.price_formatted}*.\n\nBoleh saya mendapatkan informasi lebih lanjut? Terima kasih 🙏`;
            window.open(`https://wa.me/6281312901284?text=${encodeURIComponent(msg)}`, '_blank');
        }

        function quickWaPaket(name, price) {
            const msg = `Halo Kembar Kencana Wedding Organizer 💍\n\nSaya tertarik dengan paket *${name}* seharga *Rp ${price}*.\n\nBoleh saya mendapatkan informasi lebih lanjut? Terima kasih 🙏`;
            window.open(`https://wa.me/6281312901284?text=${encodeURIComponent(msg)}`, '_blank');
        }

        // ============================================================
        // HITUNG DI KALKULATOR (Dari Modal & Card)
        // ============================================================
        function calcPackageFromModal() {
            if (!currentModalPackage) return;
            const pkgId = currentModalPackage.id;
            const batch = currentModalPackage.batch;

            // 1. Tutup modal secara eksplisit via Bootstrap Modal instance
            const modalEl = document.getElementById('packageModal');
            if (modalEl) {
                const modalInstance = bootstrap.Modal.getInstance(modalEl);
                if (modalInstance) {
                    modalInstance.hide();
                } else {
                    const closeBtn = modalEl.querySelector('.btn-close');
                    if (closeBtn) closeBtn.click();
                }
            }

            // 2. Set kalkulator dan scroll
            applyPackageToCalculator(pkgId, batch);
        }

        function calcPackageFromCard(pkgId, batch) {
            applyPackageToCalculator(pkgId, batch);
        }

        function applyPackageToCalculator(pkgId, batch) {
            // 1. Beralih ke Mode Paket
            if (typeof switchCalcMode === 'function') {
                switchCalcMode('paket');
            }

            // 2. Pilih Batch
            const batchSelect = document.getElementById('c-batch');
            if (batchSelect && batch) {
                batchSelect.value = batch;
                if (typeof onBatchChange === 'function') {
                    onBatchChange();
                }
            }

            // 3. Pilih Paket
            const paketSelect = document.getElementById('c-paket');
            if (paketSelect && pkgId) {
                paketSelect.value = pkgId;
                if (typeof onPaketChange === 'function') {
                    onPaketChange();
                }
            }

            // Sync custom selects
            batchSelect?.syncCustomSelect?.();
            paketSelect?.syncCustomSelect?.();

            // 4. Scroll ke kalkulator dengan transisi halus
            setTimeout(() => {
                const calcSection = document.getElementById('kalkulator');
                if (calcSection) {
                    calcSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }, 150);
        }

        // ============================================================
        // PORTFOLIO IMAGE SLIDER
        // ============================================================
        function getSliderWrap(btn) {
            // btn is inside portfolio-img-wrap
            return btn.closest('[data-slider]');
        }

        function portfolioSlide(btn, dir) {
            const wrap = getSliderWrap(btn);
            if (!wrap) return;
            const slider = wrap.querySelector('.portfolio-slider');
            const slides = wrap.querySelectorAll('.portfolio-slide');
            const dots = wrap.querySelectorAll('.portfolio-dot');
            const total = slides.length;
            if (total <= 1) return;

            let current = parseInt(wrap.dataset.current || '0');
            current = (current + dir + total) % total;
            wrap.dataset.current = current;

            // Move slider
            slider.style.transform = `translateX(-${current * (100 / total)}%)`;

            // Update dots
            dots.forEach((d, i) => d.classList.toggle('active', i === current));
        }

        function portfolioGoTo(dot, idx) {
            const wrap = dot.closest('[data-slider]');
            if (!wrap) return;
            const slider = wrap.querySelector('.portfolio-slider');
            const dots = wrap.querySelectorAll('.portfolio-dot');
            const total = dots.length;

            wrap.dataset.current = idx;
            slider.style.transform = `translateX(-${idx * (100 / total)}%)`;
            dots.forEach((d, i) => d.classList.toggle('active', i === idx));
        }

        // Auto-play setiap 4 detik untuk slider yang punya lebih dari 1 slide
        document.querySelectorAll('[data-slider]').forEach(wrap => {
            const total = wrap.querySelectorAll('.portfolio-slide').length;
            if (total > 1) {
                setInterval(() => {
                    const nextBtn = wrap.querySelector('.portfolio-arrow.next');
                    if (nextBtn) portfolioSlide(nextBtn, 1);
                }, 4000);
            }
        });

        // ============================================================
        // INIT
        // ============================================================
        const CALC_VENUES = JSON.parse(document.getElementById('calc-venues-data')?.textContent || '[]');
        updateCalc(); // inisialisasi kalkulasi awal
    </script>

    {{-- ======================== ORDER MODAL ======================== --}}
    <div class="modal fade" id="orderModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width:580px;">
            <div class="modal-content" style="border-radius:16px;overflow:hidden;border:none;box-shadow:0 12px 40px rgba(0,0,0,0.25);">
                <div class="modal-header" style="background:linear-gradient(135deg,#1a0533,#2d1059);border:none;padding:1.1rem 1.4rem;">
                    <div>
                        <div style="font-size:0.68rem;letter-spacing:0.18em;text-transform:uppercase;color:#c084fc;margin-bottom:0.2rem;">
                            ✦ Kembar Kencana Wedding Organizer
                        </div>
                        <h5 style="color:white;font-weight:700;margin:0;font-size:1.05rem;">Form Order / Pesanan</h5>
                        <p style="color:rgba(255,255,255,0.5);font-size:0.75rem;margin:0.15rem 0 0;">Data akan disimpan dan kami hubungi via WhatsApp.</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="padding:1.1rem 1.4rem;background:#fdfcf9;">
                    <form id="orderForm" method="POST" action="{{ route('order.store') }}">
                        @csrf

                        {{-- Hidden fields dari kalkulator --}}
                        <input type="hidden" id="order-package-id" name="package_id">
                        <input type="hidden" id="order-decoration-id" name="decoration_package_id">
                        <input type="hidden" id="order-venue-id" name="venue_id">
                        <input type="hidden" id="order-total" name="total_estimate" value="0">
                        {{-- Addon IDs dan Qtys akan diisi oleh JS --}}

                        {{-- Ringkasan order --}}
                        <div id="order-summary" style="background:#f7f4ef;border-radius:10px;padding:0.75rem 1rem;margin-bottom:1rem;border:1px solid #e8e4dc;display:none;">
                            <p style="font-size:0.68rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#8a7355;margin-bottom:0.4rem;">📋 Ringkasan Order</p>
                            <div id="order-summary-content" style="font-size:0.8rem;color:#2c2420;line-height:1.6;"></div>
                            <div style="margin-top:0.5rem;padding-top:0.5rem;border-top:1px solid #e8e4dc;display:flex;justify-content:space-between;align-items:center;">
                                <span style="font-size:0.78rem;color:#8a7355;font-weight:600;">Total Estimasi:</span>
                                <span id="order-total-display" style="font-size:0.98rem;font-weight:700;color:#b8933c;">Rp 0</span>
                            </div>
                        </div>

                        {{-- Data Pemesan --}}
                        <div class="row g-2">
                            <div class="col-sm-6">
                                <label style="font-size:0.78rem;font-weight:600;color:#3d3229;display:block;margin-bottom:0.25rem;">
                                    Nama Lengkap <span style="color:#e11d48;">*</span>
                                </label>
                                <input type="text" id="order-nama" name="visitor_name" required
                                    style="width:100%;padding:0.48rem 0.75rem;border:1.5px solid #e8e4dc;border-radius:8px;font-size:0.82rem;outline:none;transition:border-color 0.2s;background:#fff;color:#2c2420;"
                                    onfocus="this.style.borderColor='#b8933c'" onblur="this.style.borderColor='#e8e4dc'"
                                    placeholder="Budi Santoso">
                            </div>
                            <div class="col-sm-6">
                                <label style="font-size:0.78rem;font-weight:600;color:#3d3229;display:block;margin-bottom:0.25rem;">
                                    No. HP / WhatsApp <span style="color:#e11d48;">*</span>
                                </label>
                                <input type="tel" id="order-hp" name="visitor_phone" required
                                    style="width:100%;padding:0.48rem 0.75rem;border:1.5px solid #e8e4dc;border-radius:8px;font-size:0.82rem;outline:none;transition:border-color 0.2s;background:#fff;color:#2c2420;"
                                    onfocus="this.style.borderColor='#b8933c'" onblur="this.style.borderColor='#e8e4dc'"
                                    placeholder="08xxxxxxxxxx">
                            </div>
                            <div class="col-12">
                                <label style="font-size:0.78rem;font-weight:600;color:#3d3229;display:block;margin-bottom:0.25rem;">Alamat</label>
                                <input type="text" id="order-address" name="visitor_address"
                                    style="width:100%;padding:0.48rem 0.75rem;border:1.5px solid #e8e4dc;border-radius:8px;font-size:0.82rem;outline:none;transition:border-color 0.2s;background:#fff;color:#2c2420;"
                                    onfocus="this.style.borderColor='#b8933c'" onblur="this.style.borderColor='#e8e4dc'"
                                    placeholder="Jl. Merdeka No. 1, Kota Baru">
                            </div>
                            <div class="col-sm-6">
                                <label style="font-size:0.78rem;font-weight:600;color:#3d3229;display:block;margin-bottom:0.25rem;">
                                    Tanggal Pelaksanaan <span style="color:#e11d48;">*</span>
                                </label>
                                <input type="date" id="order-date" name="execution_date" required
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    style="width:100%;padding:0.48rem 0.75rem;border:1.5px solid #e8e4dc;border-radius:8px;font-size:0.82rem;outline:none;transition:border-color 0.2s;background:#fff;color:#2c2420;"
                                    onfocus="this.style.borderColor='#b8933c'" onblur="this.style.borderColor='#e8e4dc'">
                            </div>
                            <div class="col-sm-6">
                                <label style="font-size:0.78rem;font-weight:600;color:#3d3229;display:block;margin-bottom:0.25rem;">Catatan Tambahan</label>
                                <input type="text" id="order-notes" name="notes"
                                    style="width:100%;padding:0.48rem 0.75rem;border:1.5px solid #e8e4dc;border-radius:8px;font-size:0.82rem;outline:none;transition:border-color 0.2s;background:#fff;color:#2c2420;"
                                    onfocus="this.style.borderColor='#b8933c'" onblur="this.style.borderColor='#e8e4dc'"
                                    placeholder="Permintaan khusus...">
                            </div>
                        </div>

                        {{-- Addon hidden fields (diisi JS) --}}
                        <div id="order-addon-inputs"></div>

                        <div class="order-modal-actions" style="margin-top:1.1rem;display:flex;gap:0.6rem;">
                            <button type="submit"
                                style="flex:1;background:linear-gradient(135deg,#7c3aed,#a855f7);color:white;border:none;border-radius:50px;padding:0.65rem 1.2rem;font-size:0.84rem;font-weight:700;cursor:pointer;transition:all 0.3s;display:flex;align-items:center;justify-content:center;gap:0.45rem;"
                                onmouseover="this.style.transform='translateY(-1px)'" onmouseout="this.style.transform='translateY(0)'">
                                <i class="bi bi-bag-check-fill"></i>
                                Kirim Order + Chat WhatsApp
                            </button>
                            <button type="button" data-bs-dismiss="modal"
                                style="flex:0 0 auto;background:#f0ede7;color:#6b5f55;border:none;border-radius:50px;padding:0.65rem 1.2rem;font-size:0.82rem;font-weight:600;cursor:pointer;">
                                Batal
                            </button>
                        </div>
                        <p style="font-size:0.72rem;color:#a09288;text-align:center;margin-top:0.6rem;margin-bottom:0;">
                            * Order tersimpan di database kami. Kami akan menghubungi Anda untuk konfirmasi.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ============================================================
        // BUKA MODAL ORDER — isi data dari kalkulator
        // ============================================================
        function openOrderModal() {
            if (calcMode === 'paket' && !selectedPkg) {
                alert('Silakan pilih paket pernikahan terlebih dahulu pada Langkah 1.');
                return;
            }
            if (calcMode === 'custom' && Object.keys(calcItems).length === 0) {
                alert('Silakan pilih paket dekorasi atau add-on terlebih dahulu.');
                return;
            }

            // Set hidden fields
            if (document.getElementById('order-package-id')) {
                document.getElementById('order-package-id').value = selectedPkg ? selectedPkg.id : '';
            }
            if (document.getElementById('order-total')) {
                document.getElementById('order-total').value = Object.entries(calcItems).reduce((s, [, p]) => s + p, 0);
            }

            // Isi dekorasi jika ada
            const dekEl = document.querySelector('.dek-radio:checked');
            if (document.getElementById('order-decoration-id')) {
                document.getElementById('order-decoration-id').value = dekEl ? dekEl.dataset.id : '';
            }

            // Isi venue jika dipilih dari radio
            const venueEl = document.querySelector('.venue-extra-radio:checked');
            if (document.getElementById('order-venue-id')) {
                document.getElementById('order-venue-id').value = venueEl ? venueEl.value : '';
            }

            // Isi addon inputs
            const addonContainer = document.getElementById('order-addon-inputs');
            if (addonContainer) {
                addonContainer.innerHTML = '';
                document.querySelectorAll('.addon-qty, .addon-custom-qty').forEach((inp) => {
                    const qty = parseInt(inp.value) || 0;
                    if (qty > 0) {
                        addonContainer.innerHTML +=
                            `<input type="hidden" name="addon_ids[]" value="${inp.dataset.id}">` +
                            `<input type="hidden" name="addon_qtys[]" value="${qty}">`;
                    }
                });
            }

            // Ringkasan
            const entries = Object.entries(calcItems);
            const total = entries.reduce((s, [, p]) => s + p, 0);
            let summaryHtml = '';
            if (selectedPkg) summaryHtml += `<div style="margin-bottom:0.35rem;">📦 <strong>${selectedPkg.name}</strong> <span style="color:#b8933c;font-weight:700;">(${fmt(selectedPkg.price)})</span></div>`;
            entries.filter(([name]) => name !== selectedPkg?.name).forEach(([name, price]) => {
                summaryHtml += `<div style="color:#4a3f35;font-size:0.8rem;margin-top:3px;">• ${name} <span style="color:#b8933c;font-weight:600;">${price > 0 ? '— ' + fmt(price) : '— (Dikonfirmasi Admin)'}</span></div>`;
            });

            const summaryDiv = document.getElementById('order-summary');
            if (summaryDiv) {
                document.getElementById('order-summary-content').innerHTML = summaryHtml;
                document.getElementById('order-total-display').textContent = fmt(total);
                if (entries.length > 0) summaryDiv.style.display = '';
            }

            // Isi nama, HP, alamat dari form kalkulator
            const nama = document.getElementById('c-nama')?.value;
            const hp = document.getElementById('c-hp')?.value;
            const alamat = document.getElementById('c-alamat')?.value;
            if (nama && document.getElementById('order-nama')) document.getElementById('order-nama').value = nama;
            if (hp && document.getElementById('order-hp')) document.getElementById('order-hp').value = hp;
            if (alamat && document.getElementById('order-address')) document.getElementById('order-address').value = alamat;

            // Isi tanggal dari form kalkulator
            const tgl = document.getElementById('c-tgl')?.value;
            const bulan = document.getElementById('c-bulan')?.value;
            const tahun = document.getElementById('c-tahun')?.value;
            const isFlex = document.getElementById('c-tgl-belum-fix')?.checked;
            const bulanMap = {
                Januari: '01',
                Februari: '02',
                Maret: '03',
                April: '04',
                Mei: '05',
                Juni: '06',
                Juli: '07',
                Agustus: '08',
                September: '09',
                Oktober: '10',
                November: '11',
                Desember: '12'
            };

            const dateInput = document.getElementById('order-date');
            if (dateInput) {
                if (!isFlex && tgl && bulan && tahun && bulanMap[bulan]) {
                    dateInput.value = `${tahun}-${bulanMap[bulan]}-${tgl.padStart(2,'0')}`;
                }
            }

            const notesInput = document.getElementById('order-notes');
            if (notesInput) {
                let defaultNotes = [];
                if (isFlex) defaultNotes.push('Tanggal acara masih fleksibel / belum fix.');
                const confirmedItems = entries.filter(([name, p]) => p === 0 && name !== selectedPkg?.name).map(([name]) => name);
                if (confirmedItems.length > 0) defaultNotes.push('Layanan tambahan: ' + confirmedItems.join('; '));
                notesInput.value = defaultNotes.join(' | ');
            }

            new bootstrap.Modal(document.getElementById('orderModal')).show();
        }

        // ============================================================
        // CUSTOM RESPONSIVE SELECT DROPDOWNS (KALKULATOR)
        // ============================================================
        function initCustomSelects() {
            function clearAllOpenSelects() {
                document.querySelectorAll('.custom-select-wrapper.is-open').forEach(w => {
                    w.classList.remove('is-open');
                    w.querySelector('.custom-select-trigger')?.setAttribute('aria-expanded', 'false');
                });
                document.querySelectorAll('.has-open-select').forEach(el => {
                    el.classList.remove('has-open-select');
                });
            }

            document.querySelectorAll('.form-select-custom').forEach(select => {
                if (select.dataset.customSelectInit) return;
                select.dataset.customSelectInit = 'true';

                // Hide original select visually but keep in DOM for form & script compatibility
                select.style.display = 'none';

                const wrapper = document.createElement('div');
                wrapper.className = 'custom-select-wrapper';
                if (select.id) wrapper.dataset.for = select.id;

                const trigger = document.createElement('div');
                trigger.className = 'custom-select-trigger' + (select.disabled ? ' is-disabled' : '');
                trigger.setAttribute('tabindex', select.disabled ? '-1' : '0');
                trigger.setAttribute('role', 'combobox');
                trigger.setAttribute('aria-expanded', 'false');

                const label = document.createElement('span');
                label.className = 'custom-select-label';

                const arrow = document.createElement('i');
                arrow.className = 'bi bi-chevron-down custom-select-arrow';

                trigger.appendChild(label);
                trigger.appendChild(arrow);

                const menu = document.createElement('div');
                menu.className = 'custom-select-menu';

                wrapper.appendChild(trigger);
                wrapper.appendChild(menu);

                select.parentNode.insertBefore(wrapper, select.nextSibling);

                function renderOptions() {
                    menu.innerHTML = '';
                    const options = Array.from(select.options);
                    let selectedText = '';
                    let isPlaceholder = false;
                    const hasRealOptions = options.some(opt => opt.value !== '');

                    options.forEach(opt => {
                        // If this is a placeholder option (value === '') and there are real options, skip rendering it as a choice in the dropdown menu
                        if (!opt.value && hasRealOptions) {
                            if (select.value === '') {
                                selectedText = opt.textContent;
                                isPlaceholder = true;
                            }
                            return;
                        }

                        const isSelected = opt.value === select.value;
                        const item = document.createElement('div');
                        item.className = 'custom-select-option' + (isSelected ? ' is-selected' : '');
                        item.dataset.value = opt.value;

                        const textSpan = document.createElement('span');
                        textSpan.className = 'custom-select-option-text';
                        textSpan.textContent = opt.textContent;
                        item.appendChild(textSpan);

                        if (isSelected) {
                            selectedText = opt.textContent;
                            if (!opt.value) isPlaceholder = true;

                            const check = document.createElement('i');
                            check.className = 'bi bi-check-lg custom-select-check';
                            item.appendChild(check);
                        }

                        item.addEventListener('click', (e) => {
                            e.stopPropagation();
                            if (select.disabled) return;

                            select.value = opt.value;
                            label.textContent = opt.textContent;
                            if (!opt.value) {
                                label.classList.add('is-placeholder');
                            } else {
                                label.classList.remove('is-placeholder');
                            }

                            renderOptions();
                            closeDropdown();

                            // Dispatch standard change and input events
                            select.dispatchEvent(new Event('change', {
                                bubbles: true
                            }));
                            select.dispatchEvent(new Event('input', {
                                bubbles: true
                            }));
                            if (typeof select.onchange === 'function') {
                                select.onchange();
                            }
                        });

                        menu.appendChild(item);
                    });

                    if (!selectedText && options.length > 0) {
                        const currOpt = options.find(o => o.value === select.value) || options[0];
                        selectedText = currOpt ? currOpt.textContent : '';
                        if (currOpt && !currOpt.value) isPlaceholder = true;
                    }
                    label.textContent = selectedText || '— Pilih —';
                    if (isPlaceholder || !select.value) {
                        label.classList.add('is-placeholder');
                    } else {
                        label.classList.remove('is-placeholder');
                    }

                    // Sync disabled state
                    if (select.disabled) {
                        trigger.classList.add('is-disabled');
                        trigger.setAttribute('tabindex', '-1');
                        wrapper.classList.remove('is-open');
                        trigger.setAttribute('aria-expanded', 'false');
                        wrapper.closest('.calc-card')?.classList.remove('has-open-select');
                        wrapper.closest('[class*="col-"]')?.classList.remove('has-open-select');
                    } else {
                        trigger.classList.remove('is-disabled');
                        trigger.setAttribute('tabindex', '0');
                    }
                }

                function openDropdown() {
                    if (select.disabled) return;
                    // Close any other open custom selects
                    clearAllOpenSelects();

                    wrapper.classList.add('is-open');
                    trigger.setAttribute('aria-expanded', 'true');

                    // Elevate ancestor card and column
                    const parentCard = wrapper.closest('.calc-card');
                    if (parentCard) parentCard.classList.add('has-open-select');
                    const parentCol = wrapper.closest('[class*="col-"]');
                    if (parentCol) parentCol.classList.add('has-open-select');

                    // Smart dropup detection
                    const rect = trigger.getBoundingClientRect();
                    const spaceBelow = window.innerHeight - rect.bottom;
                    if (spaceBelow < 220 && rect.top > 220) {
                        menu.classList.add('is-dropup');
                    } else {
                        menu.classList.remove('is-dropup');
                    }

                    // Auto scroll to selected option in menu
                    const selectedOpt = menu.querySelector('.custom-select-option.is-selected');
                    if (selectedOpt) {
                        selectedOpt.scrollIntoView({
                            block: 'nearest'
                        });
                    }
                }

                function closeDropdown() {
                    wrapper.classList.remove('is-open');
                    trigger.setAttribute('aria-expanded', 'false');

                    const parentCard = wrapper.closest('.calc-card');
                    if (parentCard && !parentCard.querySelector('.custom-select-wrapper.is-open')) {
                        parentCard.classList.remove('has-open-select');
                    }
                    const parentCol = wrapper.closest('[class*="col-"]');
                    if (parentCol && !parentCol.querySelector('.custom-select-wrapper.is-open')) {
                        parentCol.classList.remove('has-open-select');
                    }
                }

                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (wrapper.classList.contains('is-open')) {
                        closeDropdown();
                    } else {
                        openDropdown();
                    }
                });

                trigger.addEventListener('keydown', (e) => {
                    if (select.disabled) return;
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        if (wrapper.classList.contains('is-open')) {
                            closeDropdown();
                        } else {
                            openDropdown();
                        }
                    } else if (e.key === 'Escape') {
                        closeDropdown();
                    } else if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                        e.preventDefault();
                        if (!wrapper.classList.contains('is-open')) {
                            openDropdown();
                        } else {
                            const items = Array.from(menu.querySelectorAll('.custom-select-option'));
                            const currentIndex = items.findIndex(i => i.classList.contains('is-selected'));
                            let nextIndex = e.key === 'ArrowDown' ? currentIndex + 1 : currentIndex - 1;
                            if (nextIndex >= 0 && nextIndex < items.length) {
                                items[nextIndex].click();
                                items[nextIndex].scrollIntoView({
                                    block: 'nearest'
                                });
                            }
                        }
                    }
                });

                // Initial render
                renderOptions();

                // Observe DOM changes on <select>
                const observer = new MutationObserver(() => {
                    renderOptions();
                });
                observer.observe(select, {
                    childList: true,
                    subtree: true,
                    attributes: true,
                    attributeFilter: ['disabled', 'value']
                });

                // Method to manually sync
                select.syncCustomSelect = renderOptions;
            });

            // Close on click outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.custom-select-wrapper')) {
                    clearAllOpenSelects();
                }
            });

            // Close on page scroll
            window.addEventListener('scroll', (e) => {
                if (e.target && e.target.classList && e.target.classList.contains('custom-select-menu')) return;
                clearAllOpenSelects();
            }, {
                passive: true
            });
        }

        // Auto init custom selects on DOM ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCustomSelects);
        } else {
            initCustomSelects();
        }
    </script>

</body>

</html>