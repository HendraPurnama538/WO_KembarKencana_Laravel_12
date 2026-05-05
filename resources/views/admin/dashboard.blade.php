@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('subtitle', 'Selamat datang di Admin Panel Wedding Organizer')

@section('content')

{{-- ── Stat Cards ─────────────────────────────────────────────────────── --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">

    {{-- Total Paket --}}
    <div class="card-hover bg-white rounded-2xl p-5 border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-violet-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-slate-500 uppercase tracking-wide font-medium">Total Paket</p>
            <p class="text-3xl font-bold text-slate-900 mt-0.5">{{ $totalPackages }}</p>
            <a href="{{ route('admin.packages.index') }}"
               class="text-xs text-violet-600 hover:underline mt-0.5 inline-block">Kelola Paket →</a>
        </div>
    </div>

    {{-- Total Portofolio --}}
    <div class="card-hover bg-white rounded-2xl p-5 border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-rose-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-slate-500 uppercase tracking-wide font-medium">Total Portofolio</p>
            <p class="text-3xl font-bold text-slate-900 mt-0.5">{{ $totalPortfolios }}</p>
            <a href="{{ route('admin.portfolios.index') }}"
               class="text-xs text-rose-500 hover:underline mt-0.5 inline-block">Kelola Portofolio →</a>
        </div>
    </div>

    {{-- Total User --}}
    <div class="card-hover bg-white rounded-2xl p-5 border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-sky-100 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-slate-500 uppercase tracking-wide font-medium">Total User</p>
            <p class="text-3xl font-bold text-slate-900 mt-0.5">{{ $totalUsers }}</p>
            <a href="{{ route('admin.users.index') }}"
               class="text-xs text-sky-600 hover:underline mt-0.5 inline-block">Kelola User →</a>
        </div>
    </div>
</div>

{{-- ── Tabel Terbaru ───────────────────────────────────────────────────── --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

    {{-- Portofolio Terbaru --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <h3 class="font-semibold text-slate-800">Portofolio Terbaru</h3>
            <a href="{{ route('admin.portfolios.create') }}"
               class="text-xs bg-rose-50 text-rose-600 hover:bg-rose-100 px-3 py-1.5 rounded-lg font-medium transition-colors">
                + Tambah
            </a>
        </div>
        @if($latestPortfolios->isEmpty())
            <div class="px-5 py-8 text-center text-sm text-slate-400">Belum ada portofolio.</div>
        @else
            <div class="divide-y divide-slate-50">
                @foreach($latestPortfolios as $p)
                @php
                    $thumb = $p->first_image; // accessor: cek images relation, fallback ke kolom image lama
                @endphp
                <div class="flex items-center gap-3 px-5 py-3">
                    @if($thumb)
                        <img src="{{ asset('storage/' . $thumb) }}" alt="{{ $p->title }}"
                             class="w-10 h-10 rounded-lg object-cover flex-shrink-0"
                             onerror="this.onerror=null;this.src='';this.outerHTML='<div class=&quot;w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0&quot;><svg class=&quot;w-5 h-5 text-slate-300&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; viewBox=&quot;0 0 24 24&quot;><path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z&quot;/></svg></div>';">
                    @else
                        <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-800 truncate">{{ $p->title }}</p>
                        <p class="text-xs text-slate-400">
                            {{ $p->images->count() }} foto
                            &bull; {{ $p->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <a href="{{ route('admin.portfolios.edit', $p) }}"
                       class="text-xs text-slate-400 hover:text-rose-500 transition-colors">Edit</a>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Paket Terbaru --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
            <h3 class="font-semibold text-slate-800">Paket Terbaru</h3>
            <a href="{{ route('admin.packages.create') }}"
               class="text-xs bg-violet-50 text-violet-600 hover:bg-violet-100 px-3 py-1.5 rounded-lg font-medium transition-colors">
                + Tambah
            </a>
        </div>
        @if($latestPackages->isEmpty())
            <div class="px-5 py-8 text-center text-sm text-slate-400">Belum ada paket pernikahan.</div>
        @else
            <div class="divide-y divide-slate-50">
                @foreach($latestPackages as $pkg)
                <div class="flex items-center gap-3 px-5 py-3">
                    <div class="w-10 h-10 rounded-lg bg-violet-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-800 truncate">{{ $pkg->name }}</p>
                        <p class="text-xs text-slate-400">Rp {{ number_format($pkg->price, 0, ',', '.') }}</p>
                    </div>
                    <a href="{{ route('admin.packages.edit', $pkg) }}"
                       class="text-xs text-slate-400 hover:text-violet-500 transition-colors">Edit</a>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection
