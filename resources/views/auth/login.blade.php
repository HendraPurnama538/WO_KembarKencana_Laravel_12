<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Admin Panel — Kembar Kencana Wedding Organizer">
    <title>Login — Kembar Kencana Admin</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* ── Root ── */
        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;   /* NO horizontal OR vertical scroll on the root */
        }

        /* ── Full-screen background wrapper ── */
        .login-bg {
            position: fixed;       /* covers entire viewport, never causes scroll */
            inset: 0;
            background: linear-gradient(135deg, #0f0c29, #1a1040, #24243e);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            overflow: hidden;      /* clips all decorative elements */
        }

        /* ── Decorative orbs (clipped by parent overflow:hidden) ── */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: .28;
            animation: float 8s ease-in-out infinite;
            pointer-events: none;
        }
        .orb-1 {
            width: 320px; height: 320px;
            background: radial-gradient(circle, #f43f5e, #e11d48);
            top: -100px; left: -80px;
        }
        .orb-2 {
            width: 280px; height: 280px;
            background: radial-gradient(circle, #a855f7, #7c3aed);
            bottom: -80px; right: -80px;
            animation-delay: -3s;
        }
        .orb-3 {
            width: 200px; height: 200px;
            background: radial-gradient(circle, #ec4899, #db2777);
            top: 40%; left: 58%;
            animation-delay: -5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-18px) scale(1.03); }
        }

        /* ── Dot grid pattern ── */
        .dot-pattern {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,.06) 1px, transparent 1px);
            background-size: 28px 28px;
            pointer-events: none;
        }

        /* ── Login Card ── */
        .login-card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 400px;   /* exactly 400 px max on laptop */
            background: rgba(255,255,255,.04);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,.10);
            border-radius: 24px;
            box-shadow: 0 32px 64px rgba(0,0,0,.45),
                        inset 0 1px 0 rgba(255,255,255,.10);
            animation: fadeUp .6s ease forwards;
            /* on screens < 400px the card fills width with side padding from parent */
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Top gradient accent bar ── */
        .card-top-bar {
            height: 4px;
            border-radius: 24px 24px 0 0;
            background: linear-gradient(90deg, #f43f5e, #ec4899, #a855f7);
        }

        /* ── Card inner padding ── */
        .card-body {
            padding: 1.75rem 2rem 2rem;
        }
        @media (max-width: 400px) {
            .card-body { padding: 1.5rem 1.25rem 1.75rem; }
        }

        /* ── Logo icon ── */
        .logo-icon {
            width: 64px; height: 64px;
            border-radius: 16px;
            background: linear-gradient(135deg, #1a1040, #24243e);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 8px 20px rgba(168,133,39,.35);
            margin: 0 auto 1rem;
            overflow: hidden;
            padding: 6px;
        }
        .logo-icon img {
            width: 100%; height: 100%;
            object-fit: contain;
            border-radius: 10px;
        }

        /* ── Input ── */
        .input-field {
            width: 100%;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 12px;
            color: #fff;
            font-size: 0.875rem;
            padding: 0.65rem 1rem 0.65rem 2.5rem;
            transition: all .25s ease;
            outline: none;
        }
        .input-field::placeholder { color: rgba(255,255,255,.3); }
        .input-field:focus {
            background: rgba(255,255,255,.10);
            border-color: #f43f5e;
            box-shadow: 0 0 0 3px rgba(244,63,94,.18);
        }

        /* ── Password wrapper ── */
        .input-wrap { position: relative; }
        .input-icon {
            position: absolute;
            top: 50%; left: 0.75rem;
            transform: translateY(-50%);
            color: rgba(255,255,255,.3);
            display: flex; align-items: center;
            pointer-events: none;
        }
        .toggle-pw {
            position: absolute;
            top: 50%; right: 0.75rem;
            transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: rgba(255,255,255,.3);
            padding: 0; display: flex; align-items: center;
            transition: color .2s;
        }
        .toggle-pw:hover { color: rgba(255,255,255,.6); }

        /* ── Labels ── */
        .field-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: rgba(255,255,255,.7);
            margin-bottom: 0.45rem;
        }

        /* ── Submit button ── */
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #f43f5e, #e11d48);
            color: #fff;
            font-size: 0.875rem;
            font-weight: 700;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(244,63,94,.35);
            transition: all .25s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(244,63,94,.5);
        }
        .btn-login:active { transform: translateY(0); }

        /* ── Shine divider ── */
        .shine-line {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.08), transparent);
        }

        /* ── Checkbox ── */
        input[type="checkbox"] { accent-color: #f43f5e; }
    </style>
</head>
<body>

    {{-- Full-screen background (fixed + overflow:hidden → no scroll) --}}
    <div class="login-bg">

        {{-- Decorative layers (clipped by login-bg) --}}
        <div class="dot-pattern"></div>
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>

        {{-- Login Card: max-width 400px --}}
        <div class="login-card">

            <div class="card-top-bar"></div>

            <div class="card-body">

                {{-- Logo & Branding --}}
                <div style="text-align:center; margin-bottom:1.4rem;">
                    <div class="logo-icon">
                        <img src="{{ asset('images/logo.JPG') }}" alt="Logo Kembar Kencana">
                    </div>
                    <h1 style="color:#fff; font-size:1.15rem; font-weight:700; letter-spacing:-0.02em;">Kembar Kencana</h1>
                    <p style="color:rgba(255,255,255,.38); font-size:0.8rem; margin-top:0.2rem;">Admin Panel</p>
                </div>

                <div class="shine-line" style="margin-bottom:1.4rem;"></div>

                {{-- Welcome --}}
                <div style="margin-bottom:1.25rem;">
                    <h2 style="color:#fff; font-size:1.05rem; font-weight:600;">Selamat Datang 👋</h2>
                    <p style="color:rgba(255,255,255,.42); font-size:0.8rem; margin-top:0.25rem;">Masuk untuk mengelola Kembar Kencana</p>
                </div>

                {{-- Error Alert --}}
                @if ($errors->any())
                    <div style="display:flex; gap:0.6rem; align-items:flex-start; background:rgba(244,63,94,.12); border:1px solid rgba(244,63,94,.3); border-radius:10px; padding:0.75rem 1rem; margin-bottom:1rem; font-size:0.82rem; color:#fca5a5;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0; margin-top:1px; color:#f87171;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('login.attempt') }}" style="display:flex; flex-direction:column; gap:1rem;">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="field-label">Email</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </span>
                            <input id="email" name="email" type="email"
                                   value="{{ old('email') }}"
                                   required autofocus
                                   placeholder="Masukkan email Anda"
                                   class="input-field">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="field-label">Password</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input id="password" name="password" type="password"
                                   required placeholder="••••••••"
                                   style="padding-right:2.75rem;"
                                   class="input-field">
                            <button type="button" id="toggle-password" class="toggle-pw" aria-label="Tampilkan password">
                                <svg id="eye-open" width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg id="eye-closed" width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Remember me --}}
                    <label style="display:flex; align-items:center; gap:0.6rem; cursor:pointer;">
                        <input type="checkbox" name="remember" style="width:15px; height:15px; border-radius:4px; flex-shrink:0;">
                        <span style="font-size:0.82rem; color:rgba(255,255,255,.48);">Ingat saya</span>
                    </label>

                    <button type="submit" class="btn-login">Masuk ke Admin Panel</button>
                </form>

                <div class="shine-line" style="margin-top:1.5rem; margin-bottom:1rem;"></div>
                <p style="text-align:center; font-size:0.72rem; color:rgba(255,255,255,.22);">
                    © {{ date('Y') }} Kembar Kencana — Admin Panel
                </p>

            </div>{{-- /card-body --}}
        </div>{{-- /login-card --}}

    </div>{{-- /login-bg --}}

    <script>
        const passwordInput = document.getElementById('password');
        const toggleBtn     = document.getElementById('toggle-password');
        const eyeOpen       = document.getElementById('eye-open');
        const eyeClosed     = document.getElementById('eye-closed');

        toggleBtn?.addEventListener('click', () => {
            const showing = passwordInput.type === 'text';
            passwordInput.type = showing ? 'password' : 'text';
            eyeOpen.style.display  = showing ? 'block' : 'none';
            eyeClosed.style.display = showing ? 'none'  : 'block';
        });
    </script>
</body>
</html>
