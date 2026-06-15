<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panel Wedding Organizer — Kelola paket, portofolio, dan user dengan mudah.">
    <title>@yield('title', 'Dashboard') — Admin WO</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { font-family: 'Plus Jakarta Sans', 'Inter', system-ui, sans-serif; box-sizing: border-box; }
        html { overflow-x: hidden; scroll-behavior: smooth; }
        body { overflow-x: hidden; max-width: 100%; background: #f8f7f4; }

        /* ── Sidebar ──────────────────────────────────────────────────── */
        .sidebar-link {
            transition: all .25s cubic-bezier(.4,0,.2,1);
            border-left: 3px solid transparent;
        }
        .sidebar-link:hover {
            background: rgba(244,63,94,.08);
            color: #fda4af;
            border-left-color: rgba(244,63,94,.4);
        }
        .sidebar-link.active {
            background: rgba(244,63,94,.12);
            color: #fb7185;
            border-left-color: #f43f5e;
        }
        .sidebar-link.active .sidebar-icon { color: #fb7185; }
        .sidebar-link:hover .sidebar-icon { color: #fda4af; }

        /* ── Scrollbar ────────────────────────────────────────────────── */
        #sidebar::-webkit-scrollbar { width: 3px; }
        #sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.1); border-radius: 99px; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e2e0dc; border-radius: 99px; }

        /* ── Alert Animations ─────────────────────────────────────────── */
        .alert-enter { animation: alertSlide .4s cubic-bezier(.4,0,.2,1); }
        @keyframes alertSlide {
            from { opacity: 0; transform: translateY(-8px) scale(.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* ── Page transition ──────────────────────────────────────────── */
        .page-enter { animation: pageIn .5s cubic-bezier(.4,0,.2,1); }
        @keyframes pageIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Responsive ───────────────────────────────────────────────── */
        .flex-1 { min-width: 0; }
        main { overflow-x: hidden !important; }
        table { max-width: 100%; }

        .table-responsive-wrap {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 768px) {
            .lg\:ml-64 { margin-left: 0 !important; }
            main { padding: 1rem !important; }
            .grid-cols-2, .grid-cols-3, .grid-cols-4 {
                grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
            }
        }
    </style>
</head>
<body class="h-full text-slate-800">

{{-- ====== OVERLAY MOBILE ====== --}}
<div id="overlay"
     class="fixed inset-0 bg-black/40 z-20 hidden lg:hidden"
     onclick="closeSidebar()"></div>

<div class="flex h-full min-h-screen">

    {{-- ====== SIDEBAR ====== --}}
    <aside id="sidebar"
        class="fixed top-0 left-0 h-full w-64 z-30 flex flex-col overflow-y-auto
               bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900
               -translate-x-full lg:translate-x-0 transition-transform duration-300">

        {{-- Logo --}}
        <div class="flex items-center gap-3 px-5 py-5 border-b border-white/10">
            <div class="relative flex-shrink-0">
                <img src="{{ asset('images/logo.JPG') }}"
                     alt="Kembar Kencana Logo"
                     class="w-11 h-11 rounded-xl object-cover shadow-lg ring-2 ring-white/10"
                     style="max-width:none !important;">
                <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-emerald-400 rounded-full border-2 border-slate-900"></div>
            </div>
            <div>
                <p class="text-white font-bold text-sm leading-none tracking-tight">Kembar Kencana</p>
                <p class="text-slate-500 text-xs mt-1 font-medium">Admin Panel</p>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-5 space-y-0.5">
            <p class="px-3 text-xs font-semibold uppercase tracking-widest text-slate-600 mb-3" style="font-size:10px;">Menu Utama</p>

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 text-sm font-medium
                {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>

            {{-- Portofolio --}}
            <a href="{{ route('admin.portfolios.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 text-sm font-medium
                {{ request()->routeIs('admin.portfolios*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Portofolio
            </a>

            {{-- Paket Pernikahan --}}
            <a href="{{ route('admin.packages.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 text-sm font-medium
                {{ request()->routeIs('admin.packages*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                Paket Pernikahan
            </a>

            {{-- Paket Dekorasi --}}
            <a href="{{ route('admin.decoration-packages.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 text-sm font-medium
                {{ request()->routeIs('admin.decoration-packages*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
                Paket Dekorasi
            </a>

            {{-- Add-on Tambahan --}}
            <a href="{{ route('admin.addons.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 text-sm font-medium
                {{ request()->routeIs('admin.addons*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Add-on Tambahan
            </a>

            {{-- Vendor & Partner --}}
            <a href="{{ route('admin.vendors.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 text-sm font-medium
                {{ request()->routeIs('admin.vendors*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Vendor & Partner
            </a>

            {{-- User --}}
            <a href="{{ route('admin.users.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 text-sm font-medium
                {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Manajemen User
            </a>

            <div class="border-t border-white/5 my-4"></div>
            <p class="px-3 text-xs font-semibold uppercase tracking-widest text-slate-600 mb-3" style="font-size:10px;">Akun</p>

            {{-- Profil --}}
            <a href="{{ route('admin.profile.show') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 text-sm font-medium
                {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Profil Admin
            </a>

            {{-- Keamanan --}}
            <a href="{{ route('admin.security.show') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 text-sm font-medium
                {{ request()->routeIs('admin.security*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Keamanan
            </a>
        </nav>

        {{-- User Info di Sidebar --}}
        <div class="px-4 py-4 border-t border-white/10">
            <div class="flex items-center gap-3">
                @if(auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}"
                         alt="Avatar" class="w-9 h-9 rounded-xl object-cover ring-2 ring-rose-500/30 flex-shrink-0">
                @else
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-rose-400 to-pink-600 flex items-center justify-center text-white text-xs font-bold shadow-lg flex-shrink-0">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <p class="text-white text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                    <p class="text-slate-500 text-xs truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-xs font-medium text-slate-500
                           hover:bg-red-500/10 hover:text-red-400 transition-all duration-200">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- ====== MAIN CONTENT ====== --}}
    <div class="flex-1 flex flex-col lg:ml-64">

        {{-- Topbar --}}
        <header class="sticky top-0 z-10 px-4 md:px-6 py-3 flex items-center justify-between gap-4 bg-white/80 backdrop-blur border-b border-slate-200/80">
            {{-- Hamburger (mobile) --}}
            <button id="hamburger" onclick="openSidebar()"
                class="lg:hidden p-2 rounded-xl text-slate-500 hover:bg-slate-100 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- Page Title --}}
            <div class="hidden lg:flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-rose-500 to-pink-600 flex items-center justify-center shadow-sm flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-800 leading-tight">@yield('title', 'Dashboard')</h2>
                    <p class="text-xs text-slate-400 font-medium">@yield('subtitle', 'Wedding Organizer Admin Panel')</p>
                </div>
            </div>

            {{-- Right: Date & User --}}
            <div class="flex items-center gap-3 ml-auto">
                {{-- Date pill --}}
                <div class="hidden md:flex items-center gap-2 bg-slate-50 px-3 py-2 rounded-xl border border-slate-100">
                    <svg class="w-4 h-4 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-xs text-slate-600 font-medium">
                        {{ now()->isoFormat('dddd, D MMM YYYY') }}
                    </span>
                </div>

                {{-- User avatar --}}
                <a href="{{ route('admin.profile.show') }}"
                   class="flex items-center gap-2 group px-2 py-1.5 rounded-xl hover:bg-slate-50 transition-all">
                    @if(auth()->user()->avatar)
                        <img src="{{ Storage::url(auth()->user()->avatar) }}"
                             alt="Avatar" class="w-8 h-8 rounded-lg object-cover ring-2 ring-rose-100 flex-shrink-0">
                    @else
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-rose-400 to-pink-600 flex items-center justify-center text-white text-xs font-bold shadow-sm flex-shrink-0">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <div class="hidden sm:block">
                        <span class="block text-sm font-semibold text-slate-700 group-hover:text-rose-600 transition-colors leading-tight">
                            {{ auth()->user()->name }}
                        </span>
                        <span class="block text-xs text-slate-400 font-medium" style="font-size:10px;">Administrator</span>
                    </div>
                </a>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 p-4 md:p-6 page-enter" style="overflow-x: hidden; width: 100%; min-width: 0;">
            {{-- Alert Success --}}
            @if(session('success'))
                <div class="alert-enter mb-5 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl px-5 py-3 text-sm">
                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Alert Error --}}
            @if(session('error'))
                <div class="alert-enter mb-5 flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 rounded-2xl px-5 py-3 text-sm">
                    <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="alert-enter mb-5 bg-red-50 border border-red-200 text-red-800 rounded-2xl px-5 py-3 text-sm">
                    <p class="font-bold mb-1">Terdapat beberapa kesalahan:</p>
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="px-6 py-3 border-t border-slate-200 bg-white text-xs text-slate-400">
            <div class="flex items-center justify-between">
                <span>© {{ date('Y') }} Kembar Kencana Wedding Organizer</span>
                <span class="hidden sm:block">Made with ♥ for beautiful weddings</span>
            </div>
        </footer>
    </div>
</div>

<script>
    function openSidebar() {
        document.getElementById('sidebar').classList.remove('-translate-x-full');
        document.getElementById('overlay').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('overlay').classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Auto-dismiss alerts after 5s
    setTimeout(() => {
        document.querySelectorAll('.alert-enter').forEach(el => {
            el.style.transition = 'opacity .5s ease, transform .5s ease';
            el.style.opacity = '0';
            el.style.transform = 'translateY(-6px)';
            setTimeout(() => el.remove(), 500);
        });
    }, 5000);
</script>
@stack('scripts')
</body>
</html>
