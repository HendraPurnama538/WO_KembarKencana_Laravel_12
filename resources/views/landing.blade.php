<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kembar Kencana Wedding Organizer — Wujudkan Pernikahan Impian Anda</title>
    <meta name="description" content="Kembar Kencana Wedding Organizer menyediakan layanan pernikahan profesional dengan paket Bronze, Silver, Gold, dan Platinum. Berbasis di Indonesia, kami hadir untuk mewujudkan momen sakral Anda.">

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
            --gold:        #C49A3C;
            --gold-light:  #E8C97A;
            --gold-dark:   #8B6914;
            --blush:       #F5E6E8;
            --blush-deep:  #D4A5AA;
            --ivory:       #FAF8F5;
            --charcoal:    #1C1C1C;
            --charcoal-2:  #2D2D2D;
            --muted:       #6B6B6B;
            --white:       #FFFFFF;

            --font-serif:  'Cormorant Garamond', serif;
            --font-sans:   'Jost', sans-serif;

            --shadow-card: 0 8px 40px rgba(0,0,0,0.08);
            --shadow-hover: 0 20px 60px rgba(0,0,0,0.15);
            --radius-card: 16px;
            --transition:  0.3s cubic-bezier(.4,0,.2,1);
        }

        /* ===================================================
           GLOBAL
           =================================================== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font-sans);
            background: var(--ivory);
            color: var(--charcoal);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 { font-family: var(--font-serif); }

        .section-label {
            font-family: var(--font-sans);
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--gold);
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--charcoal);
            line-height: 1.2;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            color: var(--white);
            border: none;
            border-radius: 50px;
            padding: 0.8rem 2.2rem;
            font-family: var(--font-sans);
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.05em;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
        .btn-gold:hover {
            background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold) 100%);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(196,154,60,0.4);
        }

        .btn-outline-gold {
            background: transparent;
            color: var(--gold);
            border: 2px solid var(--gold);
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-family: var(--font-sans);
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.05em;
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
            padding: 1.25rem 0;
            transition: var(--transition);
            background: transparent;
        }
        #navbar.scrolled {
            background: rgba(250, 248, 245, 0.96);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 2px 30px rgba(0,0,0,0.08);
            padding: 0.8rem 0;
        }
        .navbar-brand-text {
            font-family: var(--font-serif);
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--white);
            letter-spacing: 0.05em;
            text-decoration: none;
            transition: var(--transition);
        }
        #navbar.scrolled .navbar-brand-text { color: var(--charcoal); }

        .nav-link-custom {
            font-family: var(--font-sans);
            font-size: 0.88rem;
            font-weight: 500;
            color: rgba(255,255,255,0.9) !important;
            letter-spacing: 0.05em;
            padding: 0.4rem 0.8rem !important;
            transition: var(--transition);
            position: relative;
        }
        .nav-link-custom::after {
            content: '';
            position: absolute;
            bottom: 0; left: 50%; right: 50%;
            height: 1px;
            background: var(--gold);
            transition: var(--transition);
        }
        .nav-link-custom:hover::after { left: 0.8rem; right: 0.8rem; }
        #navbar.scrolled .nav-link-custom { color: var(--charcoal) !important; }
        .nav-link-custom:hover { color: var(--gold) !important; }

        .navbar-toggler-custom {
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 8px;
            padding: 0.3rem 0.6rem;
            background: transparent;
            cursor: pointer;
            transition: var(--transition);
        }
        #navbar.scrolled .navbar-toggler-custom { border-color: var(--gold); }
        .toggler-icon { display: block; width: 20px; height: 2px; background: white; margin: 4px 0; border-radius: 2px; transition: var(--transition); }
        #navbar.scrolled .toggler-icon { background: var(--charcoal); }

        /* ===================================================
           HERO
           =================================================== */
        #home {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #1a0a0d 0%, #2d1420 40%, #1a0a0d 100%);
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-image: var(url('/public/images/Bg.jpg'));
            background-size: cover;
            background-position: center;
            opacity: 0.38;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(10,5,8,0.6) 0%,
                rgba(30,15,20,0.55) 50%,
                rgba(10,5,8,0.85) 100%
            );
        }

        .hero-content { position: relative; z-index: 2; }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(196,154,60,0.2);
            border: 1px solid rgba(196,154,60,0.5);
            color: var(--gold-light);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            backdrop-filter: blur(10px);
        }

        .hero-title {
            font-family: var(--font-serif);
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 700;
            color: var(--white);
            line-height: 1.1;
        }
        .hero-title span { color: var(--gold-light); font-style: italic; }

        .hero-subtitle {
            font-size: 1.05rem;
            color: rgba(255,255,255,0.75);
            max-width: 520px;
            line-height: 1.8;
        }

        .hero-divider {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        .hero-stat {
            text-align: center;
        }
        .hero-stat .number {
            font-family: var(--font-serif);
            font-size: 2rem;
            font-weight: 700;
            color: var(--gold-light);
        }
        .hero-stat .label {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.6);
            letter-spacing: 0.05em;
        }

        .hero-scroll {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255,255,255,0.5);
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(8px); }
        }

        /* ===================================================
           KEUNGGULAN
           =================================================== */
        #keunggulan {
            padding: 6rem 0;
            background: var(--white);
        }

        .feature-card {
            background: var(--ivory);
            border: 1px solid rgba(196,154,60,0.15);
            border-radius: var(--radius-card);
            padding: 2.5rem 2rem;
            transition: var(--transition);
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(196,154,60,0.4);
        }
        .feature-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, rgba(196,154,60,0.15), rgba(232,201,122,0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: var(--gold);
            margin-bottom: 1.5rem;
            border: 1px solid rgba(196,154,60,0.25);
        }
        .feature-title {
            font-family: var(--font-serif);
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--charcoal);
            margin-bottom: 0.75rem;
        }
        .feature-desc {
            font-size: 0.9rem;
            color: var(--muted);
            line-height: 1.7;
        }

        /* ===================================================
           PORTOFOLIO
           =================================================== */
        #portofolio {
            padding: 6rem 0;
            background: var(--blush);
        }

        .portfolio-card {
            border: none;
            border-radius: var(--radius-card);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            transition: var(--transition);
            background: var(--white);
        }
        .portfolio-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }
        .portfolio-img-wrap {
            position: relative;
            overflow: hidden;
            height: 260px;
        }
        /* Slider wrapper */
        .portfolio-slider {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 0.5s cubic-bezier(.4,0,.2,1);
        }
        .portfolio-slide {
            flex-shrink: 0;
            width: 100%;
            height: 100%;
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
            width: 6px; height: 6px;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
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
            background: rgba(255,255,255,0.25);
            border: none;
            border-radius: 50%;
            width: 32px; height: 32px;
            display: flex; align-items: center; justify-content: center;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            z-index: 3;
            transition: background 0.2s;
            opacity: 0;
            backdrop-filter: blur(4px);
        }
        .portfolio-img-wrap:hover .portfolio-arrow { opacity: 1; }
        .portfolio-arrow:hover { background: rgba(255,255,255,0.45); }
        .portfolio-arrow.prev { left: 0.5rem; }
        .portfolio-arrow.next { right: 0.5rem; }
        .portfolio-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(28,28,28,0.7) 0%, transparent 60%);
            opacity: 0;
            transition: var(--transition);
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
            pointer-events: none;
            z-index: 2;
        }
        .portfolio-card:hover .portfolio-overlay { opacity: 1; }
        .portfolio-overlay-text {
            color: white;
            font-size: 0.85rem;
            line-height: 1.5;
        }
        .portfolio-body {
            padding: 1.5rem;
        }
        .portfolio-title {
            font-family: var(--font-serif);
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }
        .portfolio-desc {
            font-size: 0.85rem;
            color: var(--muted);
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .portfolio-img-count {
            font-size: 0.72rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 0.3rem;
            margin-top: 0.4rem;
        }

        /* No data placeholder */
        .no-data-placeholder {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--muted);
        }
        .no-data-placeholder i { font-size: 3rem; color: var(--blush-deep); }

        /* ===================================================
           PAKET
           =================================================== */
        #paketan {
            padding: 6rem 0;
            background: var(--white);
        }

        .package-card {
            border-radius: var(--radius-card);
            overflow: hidden;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
            background: var(--white);
            box-shadow: var(--shadow-card);
            border: 1px solid rgba(196,154,60,0.15);
        }
        .package-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
            border-color: var(--gold);
        }
        .package-card.featured {
            border: 2px solid var(--gold);
        }
        .package-card.featured::before {
            content: '⭐ Terpopuler';
            position: absolute;
            top: 1rem; right: -0.5rem;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding: 0.35rem 1rem 0.35rem 0.8rem;
            border-radius: 4px 0 0 4px;
            box-shadow: -2px 2px 8px rgba(0,0,0,0.15);
            z-index: 1;
        }
        .package-header {
            padding: 2rem 2rem 1.5rem;
            text-align: center;
        }
        .package-tier-dot {
            width: 10px; height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.5rem;
            flex-shrink: 0;
        }
        .package-tier {
            font-family: var(--font-sans);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .package-name {
            font-family: var(--font-serif);
            font-size: 2rem;
            font-weight: 700;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }
        .package-price {
            font-family: var(--font-serif);
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--gold);
        }
        .package-price sub { font-size: 0.85rem; font-weight: 400; color: var(--muted); }
        .package-stars { color: var(--gold); font-size: 1rem; margin: 0.75rem 0; }
        .package-body {
            padding: 0 2rem 1.5rem;
        }
        .package-desc {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.7;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .package-cta {
            display: block;
            text-align: center;
            padding: 1rem 2rem 1.5rem;
        }

        /* ===================================================
           PACKAGE MODAL
           =================================================== */
        .modal-content { border-radius: 20px; overflow: hidden; border: none; }
        .modal-header {
            background: linear-gradient(135deg, var(--charcoal), var(--charcoal-2));
            color: white;
            border: none;
            padding: 1.5rem 2rem;
        }
        .modal-title-custom { font-family: var(--font-serif); font-size: 1.6rem; font-weight: 700; }
        .modal-price { color: var(--gold-light); font-size: 1.2rem; font-weight: 600; }
        .modal-body { padding: 2rem; }
        .facility-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.6rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        .facility-item:last-child { border-bottom: none; }
        .facility-check { color: var(--gold); font-size: 1rem; margin-top: 2px; flex-shrink: 0; }
        .facility-text { font-size: 0.9rem; color: var(--charcoal); line-height: 1.5; }

        /* ===================================================
           KALKULATOR
           =================================================== */
        #kalkulator {
            padding: 6rem 0;
            background: linear-gradient(135deg, var(--charcoal) 0%, var(--charcoal-2) 100%);
            position: relative;
            overflow: hidden;
        }
        #kalkulator::before {
            content: '';
            position: absolute;
            top: -50%; right: -20%;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(196,154,60,0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        #kalkulator .section-title { color: var(--white); }
        #kalkulator .section-label { color: var(--gold-light); }

        .calc-card {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: var(--radius-card);
            padding: 2rem;
        }

        .calc-section-title {
            font-family: var(--font-serif);
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gold-light);
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(196,154,60,0.3);
            margin-bottom: 1.25rem;
        }

        .form-label-custom {
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            color: rgba(255,255,255,0.75);
            margin-bottom: 0.4rem;
        }

        .form-control-custom,
        .form-select-custom {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 10px;
            color: white;
            font-size: 0.9rem;
            padding: 0.6rem 1rem;
            transition: var(--transition);
            width: 100%;
        }
        .form-control-custom:focus,
        .form-select-custom:focus {
            background: rgba(255,255,255,0.12);
            border-color: var(--gold);
            outline: none;
            box-shadow: 0 0 0 3px rgba(196,154,60,0.2);
            color: white;
        }
        .form-control-custom::placeholder { color: rgba(255,255,255,0.35); }
        .form-select-custom option { background: var(--charcoal); color: white; }

        .checkbox-group { display: flex; flex-direction: column; gap: 0.6rem; }
        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
        }
        .checkbox-item input[type="checkbox"] {
            width: 18px; height: 18px;
            accent-color: var(--gold);
            cursor: pointer;
            flex-shrink: 0;
        }
        .checkbox-item label {
            font-size: 0.88rem;
            color: rgba(255,255,255,0.8);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .checkbox-price { color: var(--gold-light); font-weight: 600; font-size: 0.82rem; }

        /* Number input group */
        .qty-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }
        .qty-label {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.75);
            flex: 1;
        }
        .qty-price-badge {
            font-size: 0.72rem;
            color: var(--gold-light);
            background: rgba(196,154,60,0.15);
            border: 1px solid rgba(196,154,60,0.3);
            border-radius: 20px;
            padding: 2px 8px;
        }
        .qty-input {
            width: 80px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 8px;
            color: white;
            font-size: 0.88rem;
            padding: 0.4rem 0.6rem;
            text-align: center;
        }
        .qty-input:focus { border-color: var(--gold); outline: none; }

        /* Hasil Kalkulasi */
        .result-panel {
            background: rgba(196,154,60,0.1);
            border: 1px solid rgba(196,154,60,0.35);
            border-radius: var(--radius-card);
            padding: 2rem;
            position: sticky;
            top: 100px;
        }
        .result-title {
            font-family: var(--font-serif);
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--gold-light);
            margin-bottom: 1.25rem;
        }
        .result-item {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 0.5rem;
            padding: 0.5rem 0;
            border-bottom: 1px dashed rgba(255,255,255,0.1);
            font-size: 0.85rem;
        }
        .result-item:last-of-type { border-bottom: none; }
        .result-item-name { color: rgba(255,255,255,0.75); flex: 1; }
        .result-item-price { color: white; font-weight: 600; white-space: nowrap; }
        .result-total-bar {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-top: 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .result-total-label { color: rgba(255,255,255,0.9); font-weight: 600; font-size: 0.9rem; }
        .result-total-amount {
            font-family: var(--font-serif);
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
        }

        .btn-wa {
            background: #25D366;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.85rem 2rem;
            font-weight: 700;
            font-size: 0.9rem;
            transition: var(--transition);
            cursor: pointer;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .btn-wa:hover {
            background: #1ebe5d;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37,211,102,0.35);
        }

        /* ===================================================
           TEAM
           =================================================== */
        #team {
            padding: 6rem 0;
            background: var(--blush);
        }

        .team-card {
            background: var(--white);
            border-radius: var(--radius-card);
            overflow: hidden;
            text-align: center;
            box-shadow: var(--shadow-card);
            transition: var(--transition);
            padding-bottom: 1.5rem;
        }
        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
        }
        .team-photo-wrap {
            position: relative;
            overflow: hidden;
            height: 200px;
        }
        .team-photo-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .team-card:hover .team-photo-wrap img { transform: scale(1.05); }
        .team-photo-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(196,154,60,0.4) 100%);
        }
        .team-name {
            font-family: var(--font-serif);
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--charcoal);
            margin: 1rem 1rem 0.25rem;
        }
        .team-role {
            font-size: 0.8rem;
            color: var(--gold);
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        /* ===================================================
           KONTAK
           =================================================== */
        #kontak {
            padding: 6rem 0;
            background: var(--white);
        }

        .contact-info-card {
            background: var(--ivory);
            border: 1px solid rgba(196,154,60,0.2);
            border-radius: var(--radius-card);
            padding: 2rem;
            height: 100%;
        }
        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.06);
        }
        .contact-info-item:last-child { border-bottom: none; }
        .contact-icon {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, rgba(196,154,60,0.15), rgba(232,201,122,0.1));
            border: 1px solid rgba(196,154,60,0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        .contact-info-label { font-size: 0.72rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: var(--muted); }
        .contact-info-value { font-size: 0.95rem; color: var(--charcoal); font-weight: 500; margin-top: 0.15rem; }

        .map-wrapper {
            border-radius: var(--radius-card);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            height: 320px;
        }
        .map-wrapper iframe { width: 100%; height: 100%; border: none; }

        /* ===================================================
           FOOTER
           =================================================== */
        footer {
            background: var(--charcoal);
            color: rgba(255,255,255,0.7);
            padding: 3rem 0 1.5rem;
        }
        .footer-brand {
            font-family: var(--font-serif);
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white);
        }
        .footer-tagline { font-size: 0.85rem; margin-top: 0.5rem; line-height: 1.7; }
        .footer-heading {
            font-family: var(--font-sans);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold-light);
            margin-bottom: 1rem;
        }
        .footer-link {
            display: block;
            font-size: 0.88rem;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            padding: 0.3rem 0;
            transition: var(--transition);
        }
        .footer-link:hover { color: var(--gold-light); padding-left: 0.5rem; }
        .footer-divider { border-color: rgba(255,255,255,0.1); margin: 2rem 0 1rem; }
        .footer-copy { font-size: 0.8rem; color: rgba(255,255,255,0.4); text-align: center; }
        .footer-gold { color: var(--gold-light); }

        /* ===================================================
           RESPONSIVE
           =================================================== */
        @media (max-width: 768px) {
            .hero-title { font-size: 2.6rem; }
            .result-panel { position: static; }
            .hero-scroll { display: none; }
        }

        /* ===================================================
           SCROLL ANIMATIONS
           =================================================== */
        .fade-up { opacity: 0; transform: translateY(30px); transition: opacity 0.6s ease, transform 0.6s ease; }
        .fade-up.visible { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body>

{{-- ======================== NAVBAR ======================== --}}
<nav id="navbar">
    <div class="container-xl">
        <div class="d-flex align-items-center justify-content-between">
            <a href="#home" class="navbar-brand-text">✦ Kembar Kencana</a>

            {{-- Desktop Nav --}}
            <div class="d-none d-md-flex align-items-center gap-1">
                <a href="#home"       class="nav-link-custom">Home</a>
                <a href="#portofolio" class="nav-link-custom">Portofolio</a>
                <a href="#paketan"    class="nav-link-custom">Paketan</a>
                <a href="#kalkulator" class="nav-link-custom">Kalkulator</a>
                <a href="#team"       class="nav-link-custom">Team</a>
                <a href="#kontak"     class="nav-link-custom">Kontak</a>
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
                <a href="#home"       class="nav-link-custom">Home</a>
                <a href="#portofolio" class="nav-link-custom">Portofolio</a>
                <a href="#paketan"    class="nav-link-custom">Paketan</a>
                <a href="#kalkulator" class="nav-link-custom">Kalkulator</a>
                <a href="#team"       class="nav-link-custom">Team</a>
                <a href="#kontak"     class="nav-link-custom">Kontak</a>
                <a href="{{ route('login') }}" class="btn-gold mt-2" style="font-size:0.82rem;text-align:center;">
                    <i class="bi bi-shield-lock me-1"></i> Login Admin
                </a>
            </div>
        </div>
    </div>
</nav>

{{-- ======================== HERO ======================== --}}
{{-- Untuk ganti background: taruh foto di public/images/hero-bg.jpg --}}
<section id="home"
    style="--hero-bg-image: url('{{ file_exists(public_path('images/hero-bg.jpg')) ? asset('images/hero-bg.jpg') : '' }}');">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>

    <div class="container-xl hero-content py-5">
        <div class="row align-items-center" style="min-height:100vh;">
            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="900">
                <span class="hero-badge mb-4 d-inline-flex">
                    <i class="bi bi-gem"></i> Wedding Organizer Profesional
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
                        <i class="bi bi-gem me-2"></i>Lihat Paket
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
            <h2 class="section-title mt-2">Keunggulan Kembar Kencana<br>Wedding Organizer</h2>
            <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
        </div>

        <div class="row g-4">
            @php
            $features = [
                ['icon' => 'bi-gem',         'title' => 'Tim Profesional',      'desc' => 'Lebih dari 8 tahun pengalaman. Tim kami terdiri dari wedding planner, dekorator, fotografer, dan makeup artist berpengalaman.'],
                ['icon' => 'bi-heart-fill',  'title' => 'Sepenuh Hati',         'desc' => 'Setiap detail pernikahan Anda kami tangani dengan dedikasi dan cinta, memastikan momen terbaik sepanjang hari spesial Anda.'],
                ['icon' => 'bi-shield-check','title' => 'Terpercaya & Terstruktur','desc' => 'Laporan progres persiapan transparan, kontrak jelas, dan tim siap mendampingi dari H-6 bulan hingga hari H.'],
                ['icon' => 'bi-palette2',    'title' => 'Dekorasi Eksklusif',   'desc' => 'Konsep dekorasi custom sesuai impian Anda — dari rustic minimal hingga grand ballroom mewah.'],
                ['icon' => 'bi-camera2',     'title' => 'Dokumentasi Premium',  'desc' => 'Abadikan momen berharga dengan fotografer dan videografer profesional menggunakan peralatan kelas atas.'],
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
            <p style="color:var(--muted);max-width:480px;margin:0 auto;font-size:0.92rem;line-height:1.7;">
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
            @endphp
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($idx % 3) * 100 }}">
                <div class="portfolio-card">
                    <div class="portfolio-img-wrap" data-slider>
                        {{-- Slider Track --}}
                        <div class="portfolio-slider" style="width:{{ $imageCount * 100 }}%;">
                            @if($imageCount > 0)
                                @foreach($allImages as $imgPath)
                                <div class="portfolio-slide" style="width:{{ 100 / $imageCount }}%;">
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
            @php $imgCount = count($p['imgs']); @endphp
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($idx % 3) * 100 }}">
                <div class="portfolio-card">
                    <div class="portfolio-img-wrap" data-slider>
                        <div class="portfolio-slider" style="width:{{ $imgCount * 100 }}%;">
                            @foreach($p['imgs'] as $imgUrl)
                            <div class="portfolio-slide" style="width:{{ 100 / $imgCount }}%;">
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
            <h2 class="section-title mt-2">Pilih Paket<br>Impian Anda</h2>
            <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
            <p style="color:var(--muted);max-width:480px;margin:0 auto;font-size:0.92rem;line-height:1.7;">
                Semua paket dapat dikustomisasi sesuai kebutuhan dan anggaran Anda.
            </p>
        </div>

        @if($packages->count() > 0)
        <div class="row g-4">
            @foreach($packages as $idx => $pkg)
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                <div class="package-card" onclick="openPackageModal({{ $pkg->id }})">
                    <div class="package-header">
                        {{-- Nomor urut paket --}}
                        <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:0.75rem;">
                            ✦ Paket {{ $idx + 1 }}
                        </div>
                        <div class="package-name">{{ $pkg->name }}</div>
                        <div class="package-price">
                            Rp {{ number_format($pkg->price, 0, ',', '.') }}
                            <sub>/ paket</sub>
                        </div>
                        <div style="width:40px;height:1px;background:linear-gradient(90deg,var(--gold),transparent);margin:0.75rem auto;"></div>
                    </div>
                    <div class="package-body">
                        <p class="package-desc">{{ $pkg->description }}</p>
                    </div>
                    <div class="package-cta">
                        <span class="btn-gold" style="font-size:0.85rem;padding:0.65rem 1.8rem;">
                            <i class="bi bi-info-circle me-1"></i> Lihat Detail
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Hidden data for JS --}}
        <script id="packages-data" type="application/json">
        @php
            $packagesJson = $packages->map(function ($pkg, $idx) {
                return [
                    'id'              => (int) $pkg->id,
                    'name'            => $pkg->name,
                    'price'           => (float) $pkg->price,
                    'price_formatted' => 'Rp ' . number_format($pkg->price, 0, ',', '.'),
                    'description'     => $pkg->description,
                    'facilities'      => $pkg->facilities,
                    'paket_ke'        => $idx + 1,
                ];
            })->values()->toArray();
        @endphp
        {!! json_encode($packagesJson, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
        </script>

        @else
        {{-- Dummy Packages jika DB kosong --}}
        @php
        $dummyPkgs = [
            ['name'=>'Paket Hemat',    'price'=>'5.000.000', 'desc'=>'Paket pernikahan sederhana namun berkesan. Cocok untuk budget terbatas dengan tetap menghadirkan momen istimewa.','facilities'=>"Dekorasi Pelaminan Standar\nMakeup Pengantin (1 sesi)\nDokumentasi Foto (4 jam)\nMC Akad & Resepsi\nKoordinasi Hari H"],
            ['name'=>'Paket Standar',  'price'=>'12.000.000','desc'=>'Paket lengkap untuk pernikahan yang berkesan. Lebih banyak layanan dengan kualitas premium.','facilities'=>"Dekorasi Pelaminan Premium\nMakeup Pengantin & Keluarga Inti\nDokumentasi Foto & Video (6 jam)\nCatering 100 porsi\nMC Akad & Resepsi\nEntertainment Musik\nKoordinasi 2 Asisten"],
            ['name'=>'Paket Premium',  'price'=>'25.000.000','desc'=>'Paket mewah untuk pernikahan impian. Layanan lengkap dari awal hingga akhir dengan standar premium.','facilities'=>"Dekorasi Pelaminan Mewah (Custom Design)\nMakeup Pengantin & Seluruh Keluarga\nDokumentasi Foto & Video Sinematik (Full Day)\nCatering 200 porsi\nBusana Pengantin Prewedding\nMC & Entertainment Profesional\nSiraman & Adat Lengkap\nSouvenir 150 pcs\nUndangan 200 lembar\nKoordinasi 5 Asisten"],
            ['name'=>'Paket Eksklusif','price'=>'50.000.000','desc'=>'Paket all-inclusive tanpa batas. Kami tangani semua detail hingga hari pernikahan Anda sempurna.','facilities'=>"Dekorasi Ultra Premium + Venue Styling\nMakeup Artist Internasional (Full Package)\nDokumentasi Foto & Cinema Film + Drone\nCatering 500 porsi Fine Dining\nBusana Pengantin Custom + Prewedding\nEntertainment Band Live + Photo Booth\nAdat Lengkap (Siraman, Lamaran, Midodareni)\nSouvenir Premium 300 pcs\nHoneymoon Package\nKoordinasi Tim 10 Orang"],
        ];
        @endphp
        <div class="row g-4">
            @foreach($dummyPkgs as $idx => $p)
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                <div class="package-card"
                     onclick="openDummyPackageModal('{{ $p['name'] }}', '{{ $p['price'] }}', '{{ addslashes($p['desc']) }}', '{{ addslashes($p['facilities']) }}')">
                    <div class="package-header">
                        <div style="font-size:0.72rem;font-weight:700;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:0.75rem;">
                            ✦ Paket {{ $idx + 1 }}
                        </div>
                        <div class="package-name">{{ $p['name'] }}</div>
                        <div class="package-price">Rp {{ $p['price'] }}<sub>/ paket</sub></div>
                        <div style="width:40px;height:1px;background:linear-gradient(90deg,var(--gold),transparent);margin:0.75rem auto;"></div>
                    </div>
                    <div class="package-body">
                        <p class="package-desc">{{ $p['desc'] }}</p>
                    </div>
                    <div class="package-cta">
                        <span class="btn-gold" style="font-size:0.85rem;padding:0.65rem 1.8rem;">
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <div id="modal-tier" style="font-size:0.72rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold-light);margin-bottom:0.5rem;"></div>
                    <div class="modal-title-custom" id="modal-name"></div>
                    <div class="modal-price" id="modal-price"></div>
                </div>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="modal-desc" style="color:var(--muted);font-size:0.92rem;line-height:1.7;margin-bottom:1.5rem;"></p>
                <h6 style="font-family:var(--font-serif);font-size:1.1rem;font-weight:700;color:var(--charcoal);margin-bottom:1rem;">
                    <i class="bi bi-check-circle-fill" style="color:var(--gold);"></i> Fasilitas Termasuk
                </h6>
                <div id="modal-facilities"></div>
                <div class="mt-4 d-flex gap-3 flex-wrap">
                    <button class="btn-wa" id="modal-wa-btn" onclick="sendWhatsAppPackage()">
                        <i class="bi bi-whatsapp"></i> Konsultasi via WhatsApp
                    </button>
                    <button type="button" class="btn-outline-gold" data-bs-dismiss="modal">Tutup</button>
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
            <p style="color:rgba(255,255,255,0.6);max-width:480px;margin:0 auto;font-size:0.92rem;line-height:1.7;">
                Hitung estimasi biaya pernikahan impian Anda secara real-time. Semua angka bersifat perkiraan.
            </p>
        </div>

        <div class="row g-4">
            {{-- Kolom Kiri: Form Input --}}
            <div class="col-lg-8">

                {{-- Data Acara --}}
                <div class="calc-card mb-4" data-aos="fade-up">
                    <div class="calc-section-title"><i class="bi bi-calendar-heart me-2"></i>Data Acara</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label-custom">Nama Acara / Pasangan</label>
                            <input type="text" id="calc-nama" class="form-control-custom" placeholder="cth: Pernikahan Andi & Sari">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Nomor HP / WhatsApp</label>
                            <input type="text" id="calc-hp" class="form-control-custom" placeholder="cth: 08123456789">
                        </div>
                        <div class="col-12">
                            <label class="form-label-custom">Alamat Lengkap</label>
                            <input type="text" id="calc-alamat" class="form-control-custom" placeholder="Alamat domisili">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label-custom">Tanggal</label>
                            <input type="number" id="calc-tgl" class="form-control-custom" placeholder="1-31" min="1" max="31">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label-custom">Bulan</label>
                            <select id="calc-bulan" class="form-select-custom">
                                <option value="">Pilih Bulan</option>
                                @php $months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']; @endphp
                                @foreach($months as $m)
                                <option value="{{ $m }}">{{ $m }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label-custom">Tahun</label>
                            <input type="number" id="calc-tahun" class="form-control-custom" placeholder="2025" min="2025" max="2030">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Jumlah Undangan (Tamu)</label>
                            <input type="number" id="calc-tamu" class="form-control-custom" placeholder="cth: 300" min="0" oninput="calculate()">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-custom">Lokasi Acara</label>
                            <input type="text" id="calc-lokasi" class="form-control-custom" placeholder="cth: Gedung Graha Nusa">
                        </div>
                        <div class="col-12">
                            <label class="checkbox-item" style="cursor:pointer;">
                                <input type="checkbox" id="calc-belumfix" style="width:18px;height:18px;accent-color:var(--gold);">
                                <span style="font-size:0.88rem;color:rgba(255,255,255,0.7);">Tanggal belum fix / masih tentatif</span>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Layanan Utama --}}
                <div class="calc-card mb-4" data-aos="fade-up">
                    <div class="calc-section-title"><i class="bi bi-stars me-2"></i>Layanan Utama</div>
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" id="cb-layanan" onchange="calculate()">
                            <label for="cb-layanan">Koordinasi & Manajemen Hari H <span class="checkbox-price">Rp 5.000.000</span></label>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" id="cb-dekorasi" onchange="calculate()">
                            <label for="cb-dekorasi">Dekorasi Pelaminan <span class="checkbox-price">Rp 7.000.000</span></label>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" id="cb-entertainment" onchange="calculate()">
                            <label for="cb-entertainment">Entertainment / Live Music <span class="checkbox-price">Rp 3.000.000</span></label>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" id="cb-adat" onchange="calculate()">
                            <label for="cb-adat">Upacara Adat (Seserahan dll) <span class="checkbox-price">Rp 2.000.000</span></label>
                        </label>
                    </div>
                </div>

                {{-- Makeup --}}
                <div class="calc-card mb-4" data-aos="fade-up">
                    <div class="calc-section-title"><i class="bi bi-brush me-2"></i>Makeup & Beauty</div>
                    <div class="checkbox-group mb-3">
                        <label class="checkbox-item">
                            <input type="radio" name="makeup-utama" id="mk-none" value="none" checked onchange="calculate()" style="accent-color:var(--gold);">
                            <label for="mk-none">Tidak Termasuk Makeup Pengantin</label>
                        </label>
                        <label class="checkbox-item">
                            <input type="radio" name="makeup-utama" id="mk-a" value="a" onchange="calculate()" style="accent-color:var(--gold);">
                            <label for="mk-a">Makeup Pengantin Paket A <span class="checkbox-price">Rp 2.000.000</span></label>
                        </label>
                        <label class="checkbox-item">
                            <input type="radio" name="makeup-utama" id="mk-b" value="b" onchange="calculate()" style="accent-color:var(--gold);">
                            <label for="mk-b">Makeup Pengantin Paket B (Premium) <span class="checkbox-price">Rp 3.500.000</span></label>
                        </label>
                    </div>
                    <hr style="border-color:rgba(255,255,255,0.1);">
                    <p style="font-size:0.78rem;color:rgba(255,255,255,0.5);margin-bottom:0.75rem;text-transform:uppercase;letter-spacing:0.1em;">Makeup Tambahan</p>
                    <div class="qty-group">
                        <span class="qty-label">Makeup Keluarga <span class="qty-price-badge">Rp 300.000/org</span></span>
                        <input type="number" id="qty-mk-keluarga" class="qty-input" value="0" min="0" oninput="calculate()" placeholder="0">
                    </div>
                    <div class="qty-group">
                        <span class="qty-label">Makeup CPW Siraman <span class="qty-price-badge">Rp 500.000/sesi</span></span>
                        <input type="number" id="qty-mk-siraman" class="qty-input" value="0" min="0" oninput="calculate()" placeholder="0">
                    </div>
                    <div class="qty-group">
                        <span class="qty-label">Makeup CPW Prewedding <span class="qty-price-badge">Rp 700.000/sesi</span></span>
                        <input type="number" id="qty-mk-prewed" class="qty-input" value="0" min="0" oninput="calculate()" placeholder="0">
                    </div>
                </div>

                {{-- Catering --}}
                <div class="calc-card mb-4" data-aos="fade-up">
                    <div class="calc-section-title"><i class="bi bi-cup-hot me-2"></i>Catering</div>
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="radio" name="catering" id="cat-none" value="none" checked onchange="calculate()" style="accent-color:var(--gold);">
                            <label for="cat-none">Tanpa Catering</label>
                        </label>
                        <label class="checkbox-item">
                            <input type="radio" name="catering" id="cat-a" value="a" onchange="calculate()" style="accent-color:var(--gold);">
                            <label for="cat-a">Catering Standar <span class="checkbox-price">Rp 50.000/porsi × tamu</span></label>
                        </label>
                        <label class="checkbox-item">
                            <input type="radio" name="catering" id="cat-b" value="b" onchange="calculate()" style="accent-color:var(--gold);">
                            <label for="cat-b">Catering Premium <span class="checkbox-price">Rp 75.000/porsi × tamu</span></label>
                        </label>
                    </div>
                </div>

                {{-- Dokumentasi --}}
                <div class="calc-card mb-4" data-aos="fade-up">
                    <div class="calc-section-title"><i class="bi bi-camera me-2"></i>Dokumentasi</div>
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="radio" name="dokumentasi" id="dok-none" value="none" checked onchange="calculate()" style="accent-color:var(--gold);">
                            <label for="dok-none">Tanpa Dokumentasi</label>
                        </label>
                        <label class="checkbox-item">
                            <input type="radio" name="dokumentasi" id="dok-basic" value="basic" onchange="calculate()" style="accent-color:var(--gold);">
                            <label for="dok-basic">Dokumentasi Basic (Foto) <span class="checkbox-price">Rp 2.500.000</span></label>
                        </label>
                        <label class="checkbox-item">
                            <input type="radio" name="dokumentasi" id="dok-premium" value="premium" onchange="calculate()" style="accent-color:var(--gold);">
                            <label for="dok-premium">Dokumentasi Premium (Foto + Video) <span class="checkbox-price">Rp 5.000.000</span></label>
                        </label>
                    </div>
                </div>

                {{-- MC --}}
                <div class="calc-card mb-4" data-aos="fade-up">
                    <div class="calc-section-title"><i class="bi bi-mic me-2"></i>Master of Ceremony (MC)</div>
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" id="cb-mc-akad" onchange="calculate()">
                            <label for="cb-mc-akad">MC Akad Nikah <span class="checkbox-price">Rp 1.000.000</span></label>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" id="cb-mc-resepsi" onchange="calculate()">
                            <label for="cb-mc-resepsi">MC Resepsi <span class="checkbox-price">Rp 1.500.000</span></label>
                        </label>
                    </div>
                </div>

                {{-- Upacara Adat --}}
                <div class="calc-card mb-4" data-aos="fade-up">
                    <div class="calc-section-title"><i class="bi bi-flower1 me-2"></i>Upacara Adat</div>
                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" id="cb-siraman-jawa" onchange="calculate()">
                            <label for="cb-siraman-jawa">Siraman Adat Jawa <span class="checkbox-price">Rp 2.500.000</span></label>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" id="cb-siraman-sunda" onchange="calculate()">
                            <label for="cb-siraman-sunda">Siraman Adat Sunda <span class="checkbox-price">Rp 2.500.000</span></label>
                        </label>
                        <label class="checkbox-item">
                            <input type="checkbox" id="cb-lamaran" onchange="calculate()">
                            <label for="cb-lamaran">Paket Lamaran <span class="checkbox-price">Rp 3.000.000</span></label>
                        </label>
                    </div>
                </div>

                {{-- Busana --}}
                <div class="calc-card mb-4" data-aos="fade-up">
                    <div class="calc-section-title"><i class="bi bi-bag-heart me-2"></i>Busana</div>
                    <div class="qty-group">
                        <span class="qty-label">Busana Keluarga Laki-laki <span class="qty-price-badge">Rp 250.000/set</span></span>
                        <input type="number" id="qty-busana-keluarga" class="qty-input" value="0" min="0" oninput="calculate()" placeholder="0">
                    </div>
                    <div class="qty-group">
                        <span class="qty-label">Busana Prewedding <span class="qty-price-badge">Rp 1.000.000/set</span></span>
                        <input type="number" id="qty-busana-prewed" class="qty-input" value="0" min="0" oninput="calculate()" placeholder="0">
                    </div>
                </div>

                {{-- Suvenir & Undangan --}}
                <div class="calc-card" data-aos="fade-up">
                    <div class="calc-section-title"><i class="bi bi-gift me-2"></i>Suvenir & Undangan</div>
                    <div class="qty-group">
                        <span class="qty-label">Suvenir <span class="qty-price-badge">Rp 10.000/pcs</span></span>
                        <input type="number" id="qty-souvenir" class="qty-input" value="0" min="0" oninput="calculate()" placeholder="0">
                    </div>
                    <div class="qty-group">
                        <span class="qty-label">Undangan Fisik <span class="qty-price-badge">Rp 5.000/lembar</span></span>
                        <input type="number" id="qty-undangan" class="qty-input" value="0" min="0" oninput="calculate()" placeholder="0">
                    </div>
                </div>

            </div>

            {{-- Kolom Kanan: Hasil Kalkulasi --}}
            <div class="col-lg-4" data-aos="fade-left">
                <div class="result-panel" id="result-panel">
                    <div class="result-title"><i class="bi bi-receipt me-2"></i>Estimasi Biaya</div>
                    <div id="result-items">
                        <p style="color:rgba(255,255,255,0.4);font-size:0.85rem;text-align:center;padding:1rem 0;">
                            Pilih layanan di sebelah kiri untuk melihat estimasi biaya
                        </p>
                    </div>
                    <div class="result-total-bar">
                        <span class="result-total-label">Total Estimasi</span>
                        <span class="result-total-amount" id="result-total">Rp 0</span>
                    </div>
                    <div class="mt-4">
                        <button class="btn-wa" onclick="sendWhatsAppCalc()">
                            <i class="bi bi-whatsapp"></i> Konsultasi via WhatsApp
                        </button>
                    </div>
                    <p style="color:rgba(255,255,255,0.35);font-size:0.72rem;text-align:center;margin-top:0.75rem;line-height:1.5;">
                        * Harga bersifat estimasi. Harga final dikonfirmasi saat konsultasi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ======================== TEAM ======================== --}}
<section id="team">
    <div class="container-xl">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-label">Kenali Kami</span>
            <h2 class="section-title mt-2">Tim Profesional<br>Kami</h2>
            <div style="width:50px;height:2px;background:linear-gradient(90deg,var(--gold),transparent);margin:1.25rem auto;"></div>
            <p style="color:var(--muted);max-width:480px;margin:0 auto;font-size:0.92rem;line-height:1.7;">
                Kami adalah tim berpengalaman yang berdedikasi menjadikan hari pernikahan Anda luar biasa.
            </p>
        </div>

        @php
        $team = [
            ['name'=>'amelana',    'role'=>'Founder & Lead Planner',   'img'=>'https://randomuser.me/api/portraits/women/44.jpg'],
            ['name'=>'Reza Firmansyah', 'role'=>'Creative Director',        'img'=>'https://randomuser.me/api/portraits/men/32.jpg'],
            ['name'=>'Sinta Dewi',      'role'=>'Makeup & Beauty Artist',   'img'=>'https://randomuser.me/api/portraits/women/68.jpg'],
            ['name'=>'Dion Prasetyo',   'role'=>'Fotografer & Videografer', 'img'=>'https://randomuser.me/api/portraits/men/55.jpg'],
            ['name'=>'Laras Safitri',   'role'=>'Dekorator / Florist',      'img'=>'https://randomuser.me/api/portraits/women/28.jpg'],
            ['name'=>'Ahmad Rifaldi',   'role'=>'Katering & Logistik',      'img'=>'https://randomuser.me/api/portraits/men/74.jpg'],
        ];
        @endphp

        <div class="row g-4">
            @foreach($team as $idx => $t)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                <div class="team-card">
                    <div class="team-photo-wrap">
                        <img src="{{ $t['img'] }}" alt="{{ $t['name'] }}">
                        <div class="team-photo-overlay"></div>
                    </div>
                    <div class="team-name">{{ $t['name'] }}</div>
                    <div class="team-role">{{ $t['role'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
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
                            <div class="contact-info-value">Kembarkencan.id</div>
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
                <div class="footer-brand">✦ Kembar Kencana</div>
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
                <a href="#home"       class="footer-link">Home</a>
                <a href="#portofolio" class="footer-link">Portofolio</a>
                <a href="#paketan"    class="footer-link">Paketan</a>
                <a href="#kalkulator" class="footer-link">Kalkulator</a>
                <a href="#team"       class="footer-link">Team</a>
                <a href="#kontak"     class="footer-link">Kontak</a>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="footer-heading">Layanan</div>
                <span class="footer-link">Wedding Planning</span>
                <span class="footer-link">Dekorasi & Florist</span>
                <span class="footer-link">Makeup Artist</span>
                <span class="footer-link">Dokumentasi</span>
                <span class="footer-link">Catering</span>
                <span class="footer-link">Upacara Adat</span>
            </div>

            <div class="col-lg-3">
                <div class="footer-heading">Kontak Cepat</div>
                <p style="font-size:0.85rem;line-height:1.7;">
                    <i class="bi bi-geo-alt me-2" style="color:var(--gold);"></i>Bandung, Jawa Barat<br>
                    <i class="bi bi-telephone me-2" style="color:var(--gold);"></i>+62 813-1290-1284<br>
                    <i class="bi bi-envelope me-2" style="color:var(--gold);"></i>kembarkencana.id
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
// HARGA REFERENSI
// ============================================================
const HARGA = {
    layanan:             5_000_000,
    makeupA:             2_000_000,
    makeupB:             3_500_000,
    cateringA:              50_000,   // per orang
    cateringB:              75_000,   // per orang
    dekorasi:            7_000_000,
    dokumentasiBasic:    2_500_000,
    dokumentasiPremium:  5_000_000,
    entertainment:       3_000_000,
    adat:                2_000_000,
    mcAkad:              1_000_000,
    mcResepsi:           1_500_000,
    siramanJawa:         2_500_000,
    siramanSunda:        2_500_000,
    lamaran:             3_000_000,
    makeupKeluarga:        300_000,   // per orang
    makeupSiraman:         500_000,   // per sesi
    makeupPrewed:          700_000,   // per sesi
    busanaKeluarga:        250_000,   // per set
    busanaPrewed:        1_000_000,   // per set
    souvenir:               10_000,   // per pcs
    undangan:                5_000,   // per lembar
};

// ============================================================
// AOS (Scroll Animation)
// ============================================================
AOS.init({ once: true, duration: 700, easing: 'ease-out-quart' });

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
document.getElementById('menuToggle').addEventListener('click', function () {
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
    anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            const offset = 80;
            const top = target.getBoundingClientRect().top + window.scrollY - offset;
            window.scrollTo({ top, behavior: 'smooth' });
        }
    });
});

// ============================================================
// KALKULATOR — Real-time
// ============================================================
function fmt(num) {
    return 'Rp ' + num.toLocaleString('id-ID');
}

function getVal(id) {
    const el = document.getElementById(id);
    return el ? (parseFloat(el.value) || 0) : 0;
}

function isChecked(id) {
    const el = document.getElementById(id);
    return el ? el.checked : false;
}

function getRadio(name) {
    const el = document.querySelector(`input[name="${name}"]:checked`);
    return el ? el.value : 'none';
}

let calcItems = {};

function calculate() {
    calcItems = {};
    const tamu = getVal('calc-tamu');

    // Layanan utama
    if (isChecked('cb-layanan'))      calcItems['Koordinasi Hari H']       = HARGA.layanan;
    if (isChecked('cb-dekorasi'))     calcItems['Dekorasi Pelaminan']      = HARGA.dekorasi;
    if (isChecked('cb-entertainment'))calcItems['Entertainment / Live Music'] = HARGA.entertainment;
    if (isChecked('cb-adat'))         calcItems['Upacara Adat']             = HARGA.adat;

    // Makeup utama
    const mk = getRadio('makeup-utama');
    if (mk === 'a') calcItems['Makeup Pengantin Paket A']          = HARGA.makeupA;
    if (mk === 'b') calcItems['Makeup Pengantin Paket B (Premium)'] = HARGA.makeupB;

    // Makeup tambahan
    const mkKel = getVal('qty-mk-keluarga');
    const mkSir = getVal('qty-mk-siraman');
    const mkPre = getVal('qty-mk-prewed');
    if (mkKel > 0) calcItems[`Makeup Keluarga (×${mkKel})`]     = mkKel * HARGA.makeupKeluarga;
    if (mkSir > 0) calcItems[`Makeup Siraman (×${mkSir})`]      = mkSir * HARGA.makeupSiraman;
    if (mkPre > 0) calcItems[`Makeup Prewedding (×${mkPre})`]   = mkPre * HARGA.makeupPrewed;

    // Catering
    const cat = getRadio('catering');
    if (cat === 'a' && tamu > 0) calcItems[`Catering Standar (×${tamu} tamu)`]   = tamu * HARGA.cateringA;
    if (cat === 'b' && tamu > 0) calcItems[`Catering Premium (×${tamu} tamu)`]   = tamu * HARGA.cateringB;

    // Dokumentasi
    const dok = getRadio('dokumentasi');
    if (dok === 'basic')   calcItems['Dokumentasi Basic (Foto)']          = HARGA.dokumentasiBasic;
    if (dok === 'premium') calcItems['Dokumentasi Premium (Foto+Video)']  = HARGA.dokumentasiPremium;

    // MC
    if (isChecked('cb-mc-akad'))    calcItems['MC Akad Nikah']  = HARGA.mcAkad;
    if (isChecked('cb-mc-resepsi')) calcItems['MC Resepsi']     = HARGA.mcResepsi;

    // Siraman & Lamaran
    if (isChecked('cb-siraman-jawa'))  calcItems['Siraman Adat Jawa']  = HARGA.siramanJawa;
    if (isChecked('cb-siraman-sunda')) calcItems['Siraman Adat Sunda'] = HARGA.siramanSunda;
    if (isChecked('cb-lamaran'))       calcItems['Paket Lamaran']      = HARGA.lamaran;

    // Busana
    const busKel = getVal('qty-busana-keluarga');
    const busPre = getVal('qty-busana-prewed');
    if (busKel > 0) calcItems[`Busana Keluarga (×${busKel})`]   = busKel * HARGA.busanaKeluarga;
    if (busPre > 0) calcItems[`Busana Prewedding (×${busPre})`] = busPre * HARGA.busanaPrewed;

    // Suvenir & Undangan
    const qSouv = getVal('qty-souvenir');
    const qUnd  = getVal('qty-undangan');
    if (qSouv > 0) calcItems[`Suvenir (×${qSouv} pcs)`]        = qSouv * HARGA.souvenir;
    if (qUnd  > 0) calcItems[`Undangan Fisik (×${qUnd} lembar)`] = qUnd * HARGA.undangan;

    // Hitung total
    const total = Object.values(calcItems).reduce((a, b) => a + b, 0);

    // Render result
    const container = document.getElementById('result-items');
    if (Object.keys(calcItems).length === 0) {
        container.innerHTML = `<p style="color:rgba(255,255,255,0.4);font-size:0.85rem;text-align:center;padding:1rem 0;">
            Pilih layanan di sebelah kiri untuk melihat estimasi biaya</p>`;
    } else {
        container.innerHTML = Object.entries(calcItems).map(([name, price]) =>
            `<div class="result-item">
                <span class="result-item-name">${name}</span>
                <span class="result-item-price">${fmt(price)}</span>
            </div>`
        ).join('');
    }

    document.getElementById('result-total').textContent = fmt(total);
}

// ============================================================
// WHATSAPP — Kalkulator
// ============================================================
function sendWhatsAppCalc() {
    const nama    = document.getElementById('calc-nama').value    || '-';
    const hp      = document.getElementById('calc-hp').value      || '-';
    const alamat  = document.getElementById('calc-alamat').value  || '-';
    const tgl     = document.getElementById('calc-tgl').value     || '-';
    const bulan   = document.getElementById('calc-bulan').value   || '-';
    const tahun   = document.getElementById('calc-tahun').value   || '-';
    const tamu    = document.getElementById('calc-tamu').value    || '-';
    const lokasi  = document.getElementById('calc-lokasi').value  || '-';
    const belumfix= document.getElementById('calc-belumfix').checked ? ' *(Belum Fix)*' : '';

    const total   = Object.values(calcItems).reduce((a, b) => a + b, 0);

    let rincian = Object.entries(calcItems)
        .map(([name, price]) => `  • ${name}: ${fmt(price)}`)
        .join('\n');

    if (!rincian) rincian = '  (Belum ada layanan dipilih)';

    const msg = `Halo Kembar Kencana Wedding Organizer 💍

*Estimasi Biaya Pernikahan*

📋 *Data Acara:*
• Nama/Pasangan  : ${nama}
• No. HP         : ${hp}
• Alamat         : ${alamat}
• Tanggal        : ${tgl} ${bulan} ${tahun}${belumfix}
• Jumlah Tamu    : ${tamu} orang
• Lokasi Acara   : ${lokasi}

🛎️ *Layanan yang Dipilih:*
${rincian}

💰 *Total Estimasi: ${fmt(total)}*

Saya ingin berkonsultasi lebih lanjut. Terima kasih! 🙏`;

    const waNumber = '6281312901284';
    window.open(`https://wa.me/${waNumber}?text=${encodeURIComponent(msg)}`, '_blank');
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

    document.getElementById('modal-tier').textContent  = `✦ Paket ${pkg.paket_ke || ''}`;
    document.getElementById('modal-name').textContent  = pkg.name;
    document.getElementById('modal-price').textContent = pkg.price_formatted + ' / paket';
    document.getElementById('modal-desc').textContent  = pkg.description;

    // Facilities rendering
    const facilitiesEl = document.getElementById('modal-facilities');
    const lines = pkg.facilities ? pkg.facilities.split('\n').filter(l => l.trim()) : [];
    if (lines.length > 0) {
        facilitiesEl.innerHTML = lines.map(f =>
            `<div class="facility-item">
                <i class="bi bi-check-circle-fill facility-check"></i>
                <span class="facility-text">${f.trim()}</span>
            </div>`
        ).join('');
    } else {
        // coba split koma
        const byComma = pkg.facilities ? pkg.facilities.split(',').filter(l => l.trim()) : [];
        facilitiesEl.innerHTML = byComma.map(f =>
            `<div class="facility-item">
                <i class="bi bi-check-circle-fill facility-check"></i>
                <span class="facility-text">${f.trim()}</span>
            </div>`
        ).join('') || '<p style="color:var(--muted);">Detail fasilitas akan dikonfirmasi saat konsultasi.</p>';
    }

    new bootstrap.Modal(document.getElementById('packageModal')).show();
}

function openDummyPackageModal(name, price, desc, facilities) {
    currentModalPackage = { name, price_formatted: 'Rp ' + price, description: desc, facilities };

    document.getElementById('modal-tier').textContent  = `✦ ${name}`;
    document.getElementById('modal-name').textContent  = name;
    document.getElementById('modal-price').textContent = `Rp ${price} / paket`;
    document.getElementById('modal-desc').textContent  = desc;

    const lines = facilities.split('\n').filter(l => l.trim());
    document.getElementById('modal-facilities').innerHTML = lines.map(f =>
        `<div class="facility-item">
            <i class="bi bi-check-circle-fill facility-check"></i>
            <span class="facility-text">${f.trim()}</span>
        </div>`
    ).join('');

    new bootstrap.Modal(document.getElementById('packageModal')).show();
}

function sendWhatsAppPackage() {
    if (!currentModalPackage) return;
    const msg = `Halo Kembar Kencana Wedding Organizer 💍\n\nSaya tertarik dengan *${currentModalPackage.name}* dengan harga *${currentModalPackage.price_formatted}*.\n\nBoleh saya mendapatkan informasi lebih lanjut? Terima kasih 🙏`;
    const waNumber = '6281312901284';
    window.open(`https://wa.me/${waNumber}?text=${encodeURIComponent(msg)}`, '_blank');
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
    const dots   = wrap.querySelectorAll('.portfolio-dot');
    const total  = slides.length;
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
    const dots   = wrap.querySelectorAll('.portfolio-dot');
    const total  = dots.length;

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
calculate(); // inisialisasi kalkulasi awal
</script>

</body>
</html>
