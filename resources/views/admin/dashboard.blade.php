@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('subtitle', 'Ikhtisar statistik dan data terbaru Wedding Organizer')

@section('content')

<style>
    /* ── Stat Card ─────────────────────────────────────────────────── */
    .stat-card {
        background: white;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        padding: 20px 24px;
        position: relative;
        overflow: hidden;
        transition: all .3s cubic-bezier(.4,0,.2,1);
        text-decoration: none;
        display: block;
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 3px;
        opacity: 0;
        transition: opacity .3s ease;
    }
    .stat-card:hover::before { opacity: 1; }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 40px -12px rgba(0,0,0,.07);
        border-color: transparent;
    }
    .stat-card .icon-wrap {
        width: 44px; height: 44px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        transition: all .3s ease;
        flex-shrink: 0;
    }
    .stat-card:hover .icon-wrap { transform: scale(1.05); }
    .stat-card .bg-glyph {
        position: absolute;
        bottom: -8px; right: -8px;
        width: 80px; height: 80px;
        opacity: .04;
        transition: opacity .3s ease;
    }
    .stat-card:hover .bg-glyph { opacity: .08; }

    /* Card color variants */
    .stat-violet::before { background: linear-gradient(90deg, #8b5cf6, #a78bfa); }
    .stat-violet .icon-wrap { background: #ede9fe; color: #7c3aed; }
    .stat-violet:hover .icon-wrap { background: #8b5cf6; color: white; box-shadow: 0 6px 20px rgba(139,92,246,.3); }

    .stat-rose::before { background: linear-gradient(90deg, #f43f5e, #fb7185); }
    .stat-rose .icon-wrap { background: #ffe4e6; color: #e11d48; }
    .stat-rose:hover .icon-wrap { background: #f43f5e; color: white; box-shadow: 0 6px 20px rgba(244,63,94,.3); }

    .stat-emerald::before { background: linear-gradient(90deg, #10b981, #34d399); }
    .stat-emerald .icon-wrap { background: #d1fae5; color: #059669; }
    .stat-emerald:hover .icon-wrap { background: #10b981; color: white; box-shadow: 0 6px 20px rgba(16,185,129,.3); }

    .stat-sky::before { background: linear-gradient(90deg, #0ea5e9, #38bdf8); }
    .stat-sky .icon-wrap { background: #e0f2fe; color: #0284c7; }
    .stat-sky:hover .icon-wrap { background: #0ea5e9; color: white; box-shadow: 0 6px 20px rgba(14,165,233,.3); }

    .stat-amber::before { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
    .stat-amber .icon-wrap { background: #fef3c7; color: #d97706; }
    .stat-amber:hover .icon-wrap { background: #f59e0b; color: white; box-shadow: 0 6px 20px rgba(245,158,11,.3); }

    .stat-slate::before { background: linear-gradient(90deg, #64748b, #94a3b8); }
    .stat-slate .icon-wrap { background: #f1f5f9; color: #475569; }
    .stat-slate:hover .icon-wrap { background: #64748b; color: white; box-shadow: 0 6px 20px rgba(100,116,139,.3); }

    /* ── Counter animation ─────────────────────────────────────────── */
    .counter-num { font-variant-numeric: tabular-nums; }

    /* ── Section card ──────────────────────────────────────────────── */
    .section-card {
        background: white;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    /* ── Row hover ─────────────────────────────────────────────────── */
    .list-row {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 12px 20px;
        transition: background .2s ease;
    }
    .list-row:hover { background: #fafafa; }
    .list-row + .list-row { border-top: 1px solid #f8fafc; }

    /* ── Action button ─────────────────────────────────────────────── */
    .action-btn {
        opacity: 0;
        width: 30px; height: 30px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background: white;
        color: #94a3b8;
        transition: all .2s ease;
        flex-shrink: 0;
    }
    .list-row:hover .action-btn { opacity: 1; }
    .action-btn:hover {
        color: #f43f5e;
        border-color: #fecdd3;
        background: #fff1f2;
    }

    /* ── Greeting animation ────────────────────────────────────────── */
    .greeting-text {
        background: linear-gradient(135deg, #1e293b 0%, #475569 50%, #f43f5e 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: shimmerText 4s ease infinite;
    }
    @keyframes shimmerText {
        0%, 100% { background-position: 0% center; }
        50% { background-position: 100% center; }
    }

    /* ── Quick action button ───────────────────────────────────────── */
    .quick-action {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 8px 14px;
        border-radius: 12px;
        background: white;
        border: 1px solid #f1f5f9;
        color: #475569;
        font-size: 13px;
        font-weight: 600;
        transition: all .25s ease;
        text-decoration: none;
    }
    .quick-action:hover {
        background: #fff1f2;
        border-color: #fecdd3;
        color: #e11d48;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(244,63,94,.08);
    }

    /* ── Stagger animation ─────────────────────────────────────────── */
    .stagger > * {
        opacity: 0;
        animation: staggerIn .5s cubic-bezier(.4,0,.2,1) forwards;
    }
    .stagger > *:nth-child(1) { animation-delay: .05s; }
    .stagger > *:nth-child(2) { animation-delay: .1s; }
    .stagger > *:nth-child(3) { animation-delay: .15s; }
    .stagger > *:nth-child(4) { animation-delay: .2s; }
    .stagger > *:nth-child(5) { animation-delay: .25s; }
    .stagger > *:nth-child(6) { animation-delay: .3s; }
    @keyframes staggerIn {
        from { opacity: 0; transform: translateY(8px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

{{-- ── Greeting Header ────────────────────────────────────────────────── --}}
<div class="mb-8">
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <p class="text-sm font-semibold text-slate-400 mb-1">
                @php
                    $hour = now()->format('H');
                    if ($hour < 12) $greeting = 'Selamat Pagi';
                    elseif ($hour < 15) $greeting = 'Selamat Siang';
                    elseif ($hour < 18) $greeting = 'Selamat Sore';
                    else $greeting = 'Selamat Malam';
                @endphp
                {{ $greeting }} 👋
            </p>
            <h1 class="greeting-text text-2xl sm:text-3xl font-extrabold tracking-tight leading-tight">
                {{ auth()->user()->name }}
            </h1>
            <p class="text-sm text-slate-400 mt-1 font-medium">Berikut ringkasan data wedding organizer Anda hari ini.</p>
        </div>

        {{-- Quick Actions --}}
        <div class="flex items-center gap-2 flex-wrap">
            <a href="{{ route('admin.portfolios.create') }}" class="quick-action">
                <span class="w-7 h-7 rounded-lg bg-rose-50 text-rose-500 flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                    </svg>
                </span>
                Portofolio
            </a>
            <a href="{{ route('admin.packages.create') }}" class="quick-action">
                <span class="w-7 h-7 rounded-lg bg-violet-50 text-violet-500 flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                    </svg>
                </span>
                Paket
            </a>
        </div>
    </div>
</div>

{{-- ── Stat Cards Grid (3x2) ─────────────────────────────────────────── --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8 stagger">

    {{-- Total Paket --}}
    <a href="{{ route('admin.packages.index') }}" class="stat-card stat-violet">
        <svg class="bg-glyph" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
        <div class="flex items-center gap-4">
            <div class="icon-wrap">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Total Paket</p>
                <p class="counter-num text-3xl font-extrabold text-slate-800 leading-none" data-target="{{ $totalPackages }}">0</p>
            </div>
        </div>
    </a>

    {{-- Total Portofolio --}}
    <a href="{{ route('admin.portfolios.index') }}" class="stat-card stat-rose">
        <svg class="bg-glyph" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <div class="flex items-center gap-4">
            <div class="icon-wrap">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Portofolio</p>
                <p class="counter-num text-3xl font-extrabold text-slate-800 leading-none" data-target="{{ $totalPortfolios }}">0</p>
            </div>
        </div>
    </a>

    {{-- Total Paket Dekorasi --}}
    <a href="{{ route('admin.decoration-packages.index') }}" class="stat-card stat-emerald">
        <svg class="bg-glyph" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
        </svg>
        <div class="flex items-center gap-4">
            <div class="icon-wrap">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Paket Dekor</p>
                <p class="counter-num text-3xl font-extrabold text-slate-800 leading-none" data-target="{{ $totalDecors }}">0</p>
            </div>
        </div>
    </a>

    {{-- Total Vendor --}}
    <a href="{{ route('admin.vendors.index') }}" class="stat-card stat-sky">
        <svg class="bg-glyph" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        <div class="flex items-center gap-4">
            <div class="icon-wrap">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Total Vendor</p>
                <p class="counter-num text-3xl font-extrabold text-slate-800 leading-none" data-target="{{ $totalVendors }}">0</p>
            </div>
        </div>
    </a>

    {{-- Total Addons --}}
    <a href="{{ route('admin.addons.index') }}" class="stat-card stat-amber">
        <svg class="bg-glyph" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
        </svg>
        <div class="flex items-center gap-4">
            <div class="icon-wrap">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Addons</p>
                <p class="counter-num text-3xl font-extrabold text-slate-800 leading-none" data-target="{{ $totalAddons }}">0</p>
            </div>
        </div>
    </a>

    {{-- Total User --}}
    <a href="{{ route('admin.users.index') }}" class="stat-card stat-slate">
        <svg class="bg-glyph" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
        </svg>
        <div class="flex items-center gap-4">
            <div class="icon-wrap">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Admin Users</p>
                <p class="counter-num text-3xl font-extrabold text-slate-800 leading-none" data-target="{{ $totalUsers }}">0</p>
            </div>
        </div>
    </a>

</div>

{{-- ── Data Terbaru ───────────────────────────────────────────────────── --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

    {{-- Portofolio Terbaru --}}
    <div class="section-card">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-50">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-sm text-slate-800">Portofolio Terbaru</h3>
            </div>
            <a href="{{ route('admin.portfolios.create') }}"
               class="flex items-center gap-1.5 text-xs font-bold text-rose-500 bg-rose-50 hover:bg-rose-100 px-3 py-1.5 rounded-lg transition-colors">
                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah
            </a>
        </div>
        <div class="flex-1">
            @if($latestPortfolios->isEmpty())
                <div class="p-10 text-center">
                    <div class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-slate-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-sm text-slate-400 font-medium">Belum ada portofolio.</p>
                    <p class="text-xs text-slate-300 mt-1">Mulai tambahkan portofolio pertama Anda</p>
                </div>
            @else
                @foreach($latestPortfolios as $p)
                @php $thumb = $p->first_image; @endphp
                <div class="list-row group">
                    @if($thumb)
                        <img src="{{ asset('storage/' . $thumb) }}" alt="{{ $p->title }}"
                             class="w-11 h-11 rounded-xl object-cover border border-slate-100 flex-shrink-0"
                             onerror="this.onerror=null;this.src='';this.outerHTML='<div class=&quot;w-11 h-11 rounded-xl bg-slate-50 flex items-center justify-center flex-shrink-0&quot;><svg class=&quot;w-4 h-4 text-slate-300&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; viewBox=&quot;0 0 24 24&quot;><path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z&quot;/></svg></div>';">
                    @else
                        <div class="w-11 h-11 rounded-xl bg-slate-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ $p->title }}</p>
                        <div class="flex items-center gap-2 mt-0.5">
                            <span class="text-xs font-bold text-slate-400 bg-slate-50 px-2 py-0.5 rounded" style="font-size:10px;">{{ $p->images->count() }} foto</span>
                            <span class="text-xs text-slate-300 font-medium" style="font-size:11px;">{{ $p->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <a href="{{ route('admin.portfolios.edit', $p) }}" class="action-btn">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    </a>
                </div>
                @endforeach
            @endif
        </div>
        <a href="{{ route('admin.portfolios.index') }}"
           class="flex items-center justify-center gap-2 px-6 py-3 text-xs font-bold text-rose-500 hover:text-rose-600 bg-rose-50/50 hover:bg-rose-50 transition-colors border-t border-slate-50">
            Lihat Semua Portofolio
            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>

    {{-- Paket Terbaru --}}
    <div class="section-card">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-50">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-violet-50 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="font-bold text-sm text-slate-800">Paket Terbaru</h3>
            </div>
            <a href="{{ route('admin.packages.create') }}"
               class="flex items-center gap-1.5 text-xs font-bold text-violet-500 bg-violet-50 hover:bg-violet-100 px-3 py-1.5 rounded-lg transition-colors">
                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah
            </a>
        </div>
        <div class="flex-1">
            @if($latestPackages->isEmpty())
                <div class="p-10 text-center">
                    <div class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-slate-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <p class="text-sm text-slate-400 font-medium">Belum ada paket pernikahan.</p>
                    <p class="text-xs text-slate-300 mt-1">Buat paket pertama Anda sekarang</p>
                </div>
            @else
                @foreach($latestPackages as $pkg)
                <div class="list-row group">
                    <div class="w-11 h-11 rounded-xl bg-violet-50 flex items-center justify-center flex-shrink-0 border border-violet-100">
                        <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ $pkg->name }}</p>
                        <p class="text-xs text-violet-500 font-bold mt-0.5">Rp {{ number_format($pkg->price, 0, ',', '.') }}</p>
                    </div>
                    <a href="{{ route('admin.packages.edit', $pkg) }}" class="action-btn">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    </a>
                </div>
                @endforeach
            @endif
        </div>
        <a href="{{ route('admin.packages.index') }}"
           class="flex items-center justify-center gap-2 px-6 py-3 text-xs font-bold text-violet-500 hover:text-violet-600 bg-violet-50/50 hover:bg-violet-50 transition-colors border-t border-slate-50">
            Lihat Semua Paket
            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>

</div>

@endsection

@push('scripts')
<script>
    // Counter animation
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.counter-num[data-target]');
        const speed = 40;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.target) || 0;

                    if (target === 0) {
                        el.textContent = '0';
                        return;
                    }

                    let current = 0;
                    const increment = Math.max(1, Math.ceil(target / 30));
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        el.textContent = current.toLocaleString('id-ID');
                    }, speed);

                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.3 });

        counters.forEach(c => observer.observe(c));
    });
</script>
@endpush
