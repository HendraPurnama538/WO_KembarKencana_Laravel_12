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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { font-family: 'Inter', sans-serif; }
        .sidebar-link { transition: all .2s ease; }
        .sidebar-link:hover, .sidebar-link.active {
            background: rgba(244,63,94,.15);
            color: #f43f5e;
            border-left: 3px solid #f43f5e;
        }
        .sidebar-link.active .sidebar-icon { color: #f43f5e; }
        .card-hover { transition: transform .2s ease, box-shadow .2s ease; }
        .card-hover:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(0,0,0,.08); }
        .badge-admin  { background: #fce7f3; color: #be185d; }
        .badge-user   { background: #e0f2fe; color: #0369a1; }
        .alert-enter  { animation: slideIn .3s ease; }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        /* Scrollbar sidebar */
        #sidebar::-webkit-scrollbar { width: 4px; }
        #sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); border-radius: 99px; }
    </style>
</head>
<body class="h-full bg-slate-50 text-slate-800">

{{-- ====== OVERLAY MOBILE ====== --}}
<div id="overlay" class="fixed inset-0 bg-black/50 z-20 hidden lg:hidden" onclick="closeSidebar()"></div>

<div class="flex h-full min-h-screen">

    {{-- ====== SIDEBAR ====== --}}
    <aside id="sidebar"
        class="fixed top-0 left-0 h-full w-64 z-30 flex flex-col overflow-y-auto
               bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900
               -translate-x-full lg:translate-x-0 transition-transform duration-300">

        {{-- Logo --}}
        <div class="flex items-center gap-3 px-6 py-6 border-b border-white/10">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-rose-500 to-pink-600 flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-white font-bold text-sm leading-none">Kembar Kencana</p>
                <p class="text-slate-400 text-xs mt-0.5">Admin Panel</p>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-5 space-y-1">
            <p class="px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-500 mb-2">Menu Utama</p>

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 text-sm font-medium
                {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>

            {{-- Portofolio --}}
            <a href="{{ route('admin.portfolios.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 text-sm font-medium
                {{ request()->routeIs('admin.portfolios*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Portofolio
            </a>

            {{-- Paket Pernikahan --}}
            <a href="{{ route('admin.packages.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 text-sm font-medium
                {{ request()->routeIs('admin.packages*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                Paket Pernikahan
            </a>

            {{-- User --}}
            <a href="{{ route('admin.users.index') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 text-sm font-medium
                {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Manajemen User
            </a>

            <div class="border-t border-white/10 my-3"></div>
            <p class="px-3 text-[10px] font-semibold uppercase tracking-widest text-slate-500 mb-2">Akun</p>

            {{-- Profil --}}
            <a href="{{ route('admin.profile.show') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 text-sm font-medium
                {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Profil Admin
            </a>

            {{-- Keamanan --}}
            <a href="{{ route('admin.security.show') }}"
               class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-300 text-sm font-medium
                {{ request()->routeIs('admin.security*') ? 'active' : '' }}">
                <svg class="sidebar-icon w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Pengaturan Keamanan
            </a>
        </nav>

        {{-- User Info di Sidebar --}}
        <div class="px-4 py-4 border-t border-white/10">
            <div class="flex items-center gap-3">
                @if(auth()->user()->avatar)
                    <img src="{{ Storage::url(auth()->user()->avatar) }}"
                         alt="Avatar" class="w-8 h-8 rounded-full object-cover ring-2 ring-rose-500/50">
                @else
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-rose-400 to-pink-600 flex items-center justify-center text-white text-xs font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <p class="text-white text-sm font-medium truncate">{{ auth()->user()->name }}</p>
                    <p class="text-slate-400 text-xs truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-sm text-slate-400
                           hover:bg-red-500/10 hover:text-red-400 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        <header class="sticky top-0 z-10 bg-white/80 backdrop-blur border-b border-slate-200 px-4 py-3 flex items-center justify-between">
            {{-- Hamburger (mobile) --}}
            <button id="hamburger" onclick="openSidebar()"
                class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- Page Title --}}
            <div class="hidden lg:block">
                <h2 class="text-base font-semibold text-slate-800">@yield('title', 'Dashboard')</h2>
                <p class="text-xs text-slate-500">@yield('subtitle', 'Wedding Organizer Admin Panel')</p>
            </div>

            {{-- Right: User & Date --}}
            <div class="flex items-center gap-4 ml-auto">
                <span class="hidden sm:block text-xs text-slate-500 font-medium">
                    {{ now()->isoFormat('dddd, D MMMM YYYY') }}
                </span>
                <a href="{{ route('admin.profile.show') }}" class="flex items-center gap-2 group">
                    @if(auth()->user()->avatar)
                        <img src="{{ Storage::url(auth()->user()->avatar) }}"
                             alt="Avatar" class="w-8 h-8 rounded-full object-cover ring-2 ring-rose-200">
                    @else
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-rose-400 to-pink-600 flex items-center justify-center text-white text-xs font-bold shadow">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <span class="hidden sm:block text-sm font-medium text-slate-700 group-hover:text-rose-500 transition-colors">
                        {{ auth()->user()->name }}
                    </span>
                </a>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 p-4 md:p-6 overflow-auto">
            {{-- Alert Success --}}
            @if(session('success'))
                <div class="alert-enter mb-4 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl px-4 py-3 text-sm">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            {{-- Alert Error --}}
            @if(session('error'))
                <div class="alert-enter mb-4 flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 text-sm">
                    <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="alert-enter mb-4 bg-red-50 border border-red-200 text-red-800 rounded-xl px-4 py-3 text-sm">
                    <p class="font-semibold mb-1">Terdapat beberapa kesalahan:</p>
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
        <footer class="px-6 py-3 border-t border-slate-200 bg-white text-xs text-slate-400 text-center">
            © {{ date('Y') }} Wedding Organizer Admin Panel — Dibuat dengan Draa.
        </footer>
    </div>
</div>

<script>
    function openSidebar() {
        document.getElementById('sidebar').classList.remove('-translate-x-full');
        document.getElementById('overlay').classList.remove('hidden');
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('overlay').classList.add('hidden');
    }

    // Auto-dismiss alerts after 5s
    setTimeout(() => {
        document.querySelectorAll('.alert-enter').forEach(el => {
            el.style.transition = 'opacity .4s';
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 400);
        });
    }, 5000);
</script>
</body>
</html>
