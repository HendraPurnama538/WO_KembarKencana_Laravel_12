<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Admin Panel — Wedding Organizer">
    <title>Login — Wedding Organizer Admin</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { font-family: 'Inter', sans-serif; }

        /* Animated gradient background */
        .bg-animated {
            background: linear-gradient(135deg, #0f0c29, #1a1040, #24243e);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        /* Floating orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: .35;
            animation: float 8s ease-in-out infinite;
        }
        .orb-1 {
            width: 400px; height: 400px;
            background: radial-gradient(circle, #f43f5e, #e11d48);
            top: -100px; left: -100px;
            animation-delay: 0s;
        }
        .orb-2 {
            width: 350px; height: 350px;
            background: radial-gradient(circle, #a855f7, #7c3aed);
            bottom: -80px; right: -80px;
            animation-delay: -3s;
        }
        .orb-3 {
            width: 250px; height: 250px;
            background: radial-gradient(circle, #ec4899, #db2777);
            top: 50%; left: 60%;
            animation-delay: -5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50%       { transform: translateY(-30px) scale(1.05); }
        }

        /* Grid dots pattern */
        .dot-pattern {
            background-image: radial-gradient(circle, rgba(255,255,255,.06) 1px, transparent 1px);
            background-size: 28px 28px;
            position: absolute;
            inset: 0;
        }

        /* Glass card */
        .glass-card {
            background: rgba(255, 255, 255, .04);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, .10);
            box-shadow: 0 32px 64px rgba(0, 0, 0, .4),
                        inset 0 1px 0 rgba(255,255,255,.1);
        }

        /* Input styling */
        .input-field {
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.12);
            color: #fff;
            transition: all .25s ease;
        }
        .input-field::placeholder { color: rgba(255,255,255,.35); }
        .input-field:focus {
            background: rgba(255,255,255,.10);
            border-color: #f43f5e;
            box-shadow: 0 0 0 3px rgba(244,63,94,.18);
            outline: none;
        }

        /* Submit button */
        .btn-login {
            background: linear-gradient(135deg, #f43f5e, #e11d48);
            box-shadow: 0 8px 24px rgba(244,63,94,.35);
            transition: all .25s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(244,63,94,.5);
        }
        .btn-login:active { transform: translateY(0); }

        /* Checkbox custom */
        input[type="checkbox"] { accent-color: #f43f5e; }

        /* Label */
        .field-label { color: rgba(255,255,255,.75); }

        /* Divider line shine */
        .shine-line {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.08), transparent);
            height: 1px;
        }

        /* Fade in animation for card */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp .6s ease forwards; }
    </style>
</head>
<body class="bg-animated flex items-center justify-center p-4 min-h-screen">

    {{-- Background layers --}}
    <div class="dot-pattern"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    {{-- Login Card --}}
    <div class="glass-card rounded-3xl w-full max-w-sm relative z-10 fade-up">

        {{-- Top accent bar --}}
        <div class="h-1 w-full rounded-t-3xl bg-gradient-to-r from-rose-500 via-pink-500 to-fuchsia-500"></div>

        <div class="px-8 py-8">

            {{-- Logo & Branding --}}
            <div class="flex flex-col items-center mb-8">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-rose-500 to-pink-600
                            flex items-center justify-center shadow-lg shadow-rose-500/30 mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h1 class="text-white text-xl font-bold tracking-tight">Wedding Organizer</h1>
                <p class="text-white/40 text-sm mt-1">Admin Panel</p>
            </div>

            {{-- Divider --}}
            <div class="shine-line mb-7"></div>

            {{-- Welcome text --}}
            <div class="mb-6">
                <h2 class="text-white font-semibold text-lg">Selamat Datang 👋</h2>
                <p class="text-white/45 text-sm mt-0.5">Masuk untuk mengelola Wedding Organizer</p>
            </div>

            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="mb-5 flex items-start gap-3 bg-red-500/15 border border-red-500/30
                            rounded-xl px-4 py-3 text-sm text-red-300">
                    <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login.attempt') }}" class="space-y-4">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="field-label block text-sm font-medium mb-1.5">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="admin@wo.com"
                            class="input-field w-full rounded-xl text-sm pl-10 pr-4 py-2.5">
                    </div>
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="field-label block text-sm font-medium mb-1.5">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            placeholder="••••••••"
                            class="input-field w-full rounded-xl text-sm pl-10 pr-11 py-2.5">
                        {{-- Toggle --}}
                        <button type="button" id="toggle-password" aria-label="Tampilkan password"
                            class="absolute inset-y-0 right-0 px-3.5 text-white/30 hover:text-white/60 transition-colors">
                            <svg id="eye-open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg id="eye-closed" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Remember me --}}
                <label class="flex items-center gap-2.5 cursor-pointer group">
                    <input type="checkbox" name="remember"
                           class="w-4 h-4 rounded border-white/20 bg-white/10">
                    <span class="text-sm text-white/50 group-hover:text-white/70 transition-colors">Ingat saya</span>
                </label>

                {{-- Submit --}}
                <button type="submit"
                    class="btn-login w-full text-white text-sm font-semibold py-2.5 rounded-xl mt-1">
                    Masuk ke Admin Panel
                </button>
            </form>

            {{-- Footer --}}
            <div class="shine-line mt-7 mb-5"></div>
            <p class="text-center text-white/25 text-xs">
                © {{ date('Y') }} Wedding Organizer — Dibuat dengan Draa.
            </p>
        </div>
    </div>

    <script>
        const passwordInput   = document.getElementById('password');
        const toggleBtn       = document.getElementById('toggle-password');
        const eyeOpen         = document.getElementById('eye-open');
        const eyeClosed       = document.getElementById('eye-closed');

        toggleBtn?.addEventListener('click', () => {
            const showing = passwordInput.type === 'text';
            passwordInput.type = showing ? 'password' : 'text';
            eyeOpen.classList.toggle('hidden', !showing);
            eyeClosed.classList.toggle('hidden', showing);
        });
    </script>
</body>
</html>
