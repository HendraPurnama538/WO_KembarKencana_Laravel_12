@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('subtitle', 'Ringkasan statistik pesanan & data wedding organizer')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

<style>
    /* ── Dark override on layout ──────────────────────────────────── */
    body { background: #1a1d2e !important; }
    .lg\:ml-64 > header { background: rgba(26,29,46,.95) !important; backdrop-filter: blur(12px); border-color: rgba(255,255,255,.05) !important; }
    .lg\:ml-64 > header h2, .lg\:ml-64 > header .text-slate-700 { color: #e2e8f0 !important; }
    .lg\:ml-64 > header p, .lg\:ml-64 > header .text-slate-400, .lg\:ml-64 > header .text-slate-600 { color: #64748b !important; }
    .lg\:ml-64 > header .bg-slate-50 { background: rgba(255,255,255,.06) !important; border-color: rgba(255,255,255,.06) !important; }
    .lg\:ml-64 > header .hover\:bg-slate-50:hover { background: rgba(255,255,255,.08) !important; }
    .lg\:ml-64 > header .text-rose-400 { color: #fb7185 !important; }
    .lg\:ml-64 > footer { background: #1a1d2e !important; border-color: rgba(255,255,255,.05) !important; color: #3b3f54 !important; }

    /* ═══ ROW 1: Hero + 4 Metrics (Mobile-first) ═══════════════════ */
    .row1 {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
        margin-bottom: 12px;
    }
    .metrics-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }

    /* ═══ ROW 2: Donut + Bar (Mobile-first) ═════════════════════════ */
    .row2 {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
    }

    /* ═══ Summary pills inside chart card ═══════════════════════════ */
    .sum-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 8px;
    }

    /* ═══ Tablet small (≥480px) ═════════════════════════════════════ */
    @media (min-width: 480px) {
        .row1 { gap: 14px; margin-bottom: 14px; }
        .metrics-grid { gap: 10px; }
        .row2 { gap: 14px; }
        .sum-grid {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
    }

    /* ═══ Tablet (≥600px) ═══════════════════════════════════════════ */
    @media (min-width: 600px) {
        .metrics-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }
    }

    /* ═══ Tablet landscape (≥768px) ═════════════════════════════════ */
    @media (min-width: 768px) {
        .metrics-grid {
            grid-template-columns: repeat(4, 1fr);
        }
        .row2 {
            grid-template-columns: 280px 1fr;
        }
    }

    /* ═══ Desktop (≥992px) ══════════════════════════════════════════ */
    @media (min-width: 992px) {
        .row1 {
            grid-template-columns: 300px 1fr;
        }
        .metrics-grid {
            grid-template-columns: repeat(4, 1fr);
        }
        .row2 {
            grid-template-columns: 340px 1fr;
        }
    }

    /* ═══ Large desktop (≥1200px) ═══════════════════════════════════ */
    @media (min-width: 1200px) {
        .row1 {
            grid-template-columns: 340px 1fr;
        }
        .row2 {
            grid-template-columns: 360px 1fr;
        }
    }

    /* ── Card base ─────────────────────────────────────────────────── */
    .dk {
        background: #222539;
        border-radius: 14px;
        border: 1px solid rgba(255,255,255,.05);
        overflow: hidden;
        min-width: 0;
    }

    /* ── Hero card ─────────────────────────────────────────────────── */
    .hero-card {
        background: linear-gradient(135deg, #28254a 0%, #1e1b4b 60%, #2d2870 100%);
        border-radius: 14px;
        border: 1px solid rgba(139,92,246,.12);
        padding: 16px;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-width: 0;
    }
    @media (min-width: 480px) {
        .hero-card { padding: 20px; }
    }
    .hero-card::before {
        content: '';
        position: absolute;
        width: 120px; height: 120px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(244,63,94,.18), transparent 70%);
        top: -40px; right: -20px;
        pointer-events: none;
    }
    @media (min-width: 480px) {
        .hero-card::before { width: 150px; height: 150px; top: -50px; right: -30px; }
    }

    /* ── Hero card text responsive ────────────────────────────────── */
    .hero-title {
        font-size: 14px; font-weight: 800; color: #fff; line-height: 1.3; margin: 0;
        word-break: break-word;
    }
    .hero-subtitle {
        font-size: 11px; color: #9b8ec4; margin-top: 3px;
    }
    .hero-amount {
        font-size: 20px; font-weight: 800; color: #fff; letter-spacing: -0.5px; line-height: 1; margin: 0;
        word-break: break-word;
    }
    .hero-percent {
        font-size: 11px; color: #7c6fad; margin-top: 4px;
    }
    .hero-btn {
        display: inline-flex; align-items: center; gap: 6px;
        margin-top: 10px; padding: 7px 14px; border-radius: 8px;
        font-size: 11px; font-weight: 700; color: #fff;
        background: linear-gradient(135deg,#f43f5e,#e11d48);
        box-shadow: 0 4px 14px rgba(244,63,94,.3);
        text-decoration: none;
    }
    @media (min-width: 480px) {
        .hero-title { font-size: 15px; }
        .hero-amount { font-size: 24px; }
        .hero-btn { margin-top: 12px; padding: 8px 16px; }
    }

    /* ── Metric card ──────────────────────────────────────────────── */
    .m-card {
        background: #222539;
        border: 1px solid rgba(255,255,255,.05);
        border-radius: 12px;
        padding: 12px 12px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-decoration: none !important;
        color: inherit !important;
        transition: all .2s ease;
        min-width: 0;
        overflow: hidden;
    }
    @media (min-width: 480px) {
        .m-card { padding: 14px 16px; }
    }
    .m-card:hover {
        border-color: rgba(255,255,255,.1);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,.15);
    }
    /* On touch devices, disable hover transform to prevent sticky state */
    @media (hover: none) {
        .m-card:hover { transform: none; box-shadow: none; }
    }

    /* ── Metric card text responsive ──────────────────────────────── */
    .m-card .m-icon-wrap {
        width: 30px; height: 30px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .m-card .m-icon-wrap svg { width: 14px; height: 14px; }
    .m-card .m-value {
        font-size: 18px; font-weight: 800; color: #fff; line-height: 1; margin: 0;
    }
    .m-card .m-label {
        font-size: 9px; font-weight: 500; color: #535773; margin-top: 3px;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    @media (min-width: 480px) {
        .m-card .m-icon-wrap { width: 34px; height: 34px; }
        .m-card .m-icon-wrap svg { width: 16px; height: 16px; }
        .m-card .m-value { font-size: 20px; }
        .m-card .m-label { font-size: 10px; margin-top: 4px; }
    }

    /* ── Sparkline bars ───────────────────────────────────────────── */
    .spk { display: flex; align-items: flex-end; gap: 2px; height: 18px; margin-top: 6px; }
    .spk span { width: 4px; border-radius: 2px; min-height: 3px; flex: 1; max-width: 6px; }
    @media (min-width: 480px) {
        .spk { gap: 3px; height: 22px; margin-top: 8px; }
        .spk span { width: 5px; }
    }

    /* ── Donut card responsive ────────────────────────────────────── */
    .donut-card-inner { padding: 16px; }
    @media (min-width: 480px) {
        .donut-card-inner { padding: 20px; }
    }

    /* ── Donut legend ─────────────────────────────────────────────── */
    .lg-row { display: flex; align-items: center; gap: 8px; padding: 4px 0; }
    .lg-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; }
    .lg-label { flex: 1; font-size: 11px; font-weight: 500; color: #94a3b8; min-width: 0; }
    .lg-pct { font-size: 11px; font-weight: 700; color: #fff; flex-shrink: 0; }
    @media (min-width: 480px) {
        .lg-row { gap: 10px; padding: 5px 0; }
        .lg-dot { width: 10px; height: 10px; }
        .lg-label { font-size: 12px; }
        .lg-pct { font-size: 12px; }
    }

    /* ── Bar chart container responsive ───────────────────────────── */
    .bar-card-inner { padding: 16px; display: flex; flex-direction: column; min-width: 0; }
    @media (min-width: 480px) {
        .bar-card-inner { padding: 20px; }
    }
    .bar-chart-wrap {
        flex: 1; min-height: 180px; position: relative; min-width: 0;
    }
    @media (min-width: 768px) {
        .bar-chart-wrap { min-height: 200px; }
    }

    /* ── Summary pill responsive ──────────────────────────────────── */
    .sum-pill {
        background: #1a1d2e;
        border: 1px solid rgba(255,255,255,.05);
        border-radius: 10px;
        padding: 10px 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 0;
    }
    .sum-icon {
        width: 32px; height: 32px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .sum-icon svg { width: 14px; height: 14px; }
    .sum-pill .sum-label {
        font-size: 9px; font-weight: 500; color: #535773; margin: 0;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    .sum-pill .sum-value {
        font-size: 15px; font-weight: 800; color: #fff; margin: 0; line-height: 1.2;
        word-break: break-word;
    }
    @media (min-width: 480px) {
        .sum-pill { border-radius: 12px; padding: 12px 14px; gap: 12px; }
        .sum-icon { width: 38px; height: 38px; }
        .sum-icon svg { width: 16px; height: 16px; }
        .sum-pill .sum-label { font-size: 10px; }
        .sum-pill .sum-value { font-size: 18px; }
    }

    /* ── Chart header responsive ──────────────────────────────────── */
    .chart-header {
        display: flex; align-items: center; justify-content: space-between;
        margin-bottom: 12px; gap: 8px; flex-wrap: wrap;
    }
    .chart-title {
        font-size: 13px; font-weight: 700; color: #fff; margin: 0;
    }
    .chart-link {
        font-size: 10px; font-weight: 600; color: #818cf8; text-decoration: none;
        white-space: nowrap;
    }
    .chart-year {
        font-size: 10px; font-weight: 500; color: #535773; white-space: nowrap;
    }
    @media (min-width: 480px) {
        .chart-header { margin-bottom: 16px; }
        .chart-title { font-size: 14px; }
        .chart-year { font-size: 11px; }
    }

    /* ── Donut wrapper responsive ─────────────────────────────────── */
    .donut-wrap {
        display: flex; justify-content: center; margin-bottom: 14px;
    }
    .donut-container {
        position: relative; width: 120px; height: 120px;
    }
    .donut-center-pct {
        font-size: 18px; font-weight: 800; color: #fff;
    }
    .donut-center-label {
        font-size: 9px; font-weight: 500; color: #535773;
    }
    @media (min-width: 480px) {
        .donut-wrap { margin-bottom: 16px; }
        .donut-container { width: 150px; height: 150px; }
        .donut-center-pct { font-size: 22px; }
        .donut-center-label { font-size: 10px; }
    }

    /* ── Animations ───────────────────────────────────────────────── */
    .dk-in {
        opacity: 0; transform: translateY(12px);
        animation: dIn .5s cubic-bezier(.16,1,.3,1) forwards;
    }
    .row2.dk-in { animation-delay: .08s; }
    @keyframes dIn { to { opacity: 1; transform: translateY(0); } }
</style>

@php
    $h = (int)now()->format('H');
    $greet = $h<12 ? 'Selamat Pagi' : ($h<15 ? 'Selamat Siang' : ($h<18 ? 'Selamat Sore' : 'Selamat Malam'));
    $fS = function($n) {
        if ($n>=1e9) return 'Rp '.number_format($n/1e9,1,',','.').'M';
        if ($n>=1e6) return 'Rp '.number_format($n/1e6,1,',','.').'Jt';
        if ($n>=1e3) return 'Rp '.number_format($n/1e3,0,',','.').'Rb';
        return 'Rp '.number_format($n,0,',','.');
    };
    $pctS = $totalOrders>0 ? round(($ordersSelesai/$totalOrders)*100) : 0;
    $pctM = $totalOrders>0 ? round(($ordersMenunggu/$totalOrders)*100) : 0;
    $pctK = $totalOrders>0 ? round(($ordersDikonfirmasi/$totalOrders)*100) : 0;
    $pctB = $totalOrders>0 ? round(($ordersDibatalkan/$totalOrders)*100) : 0;
@endphp

{{-- ═══════════════════════════════════════════════════════════════════════ --}}
{{-- ROW 1 :  HERO CARD  +  4 METRIC CARDS                                   --}}
{{-- ═══════════════════════════════════════════════════════════════════════ --}}
<div class="row1 dk-in">

    {{-- Hero Welcome --}}
    <div class="hero-card">
        <div style="position:relative;z-index:2;">
            <h2 class="hero-title">
                {{ $greet }} {{ auth()->user()->name }} 🎉
            </h2>
            <p class="hero-subtitle">Anda adalah admin Wedding Organizer</p>
        </div>
        <div style="position:relative;z-index:2;margin-top:16px;">
            <p class="hero-amount">{{ $fS($totalEstimasiOmset) }}</p>
            <p class="hero-percent">{{ $pctS }}% pesanan selesai</p>
            <a href="{{ route('admin.orders.index') }}" class="hero-btn">
                Lihat Detail
            </a>
        </div>
        <div style="position:absolute;top:12px;right:16px;font-size:30px;opacity:.12;z-index:1;pointer-events:none;user-select:none;">🎁</div>
    </div>

    {{-- 4 Metric Cards: Total Pesanan, Paket Pernikahan, Paket Dekorasi, Portofolio --}}
    <div class="metrics-grid">
        @php
            $cards = [
                [
                    'label' => 'Total Pesanan',
                    'value' => $totalOrders,
                    'color' => '#818cf8',
                    'bg'    => 'rgba(129,140,248,.15)',
                    'icon'  => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
                    'route' => route('admin.orders.index'),
                ],
                [
                    'label' => 'Paket Pernikahan',
                    'value' => $totalPackages,
                    'color' => '#34d399',
                    'bg'    => 'rgba(52,211,153,.15)',
                    'icon'  => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
                    'route' => route('admin.packages.index'),
                ],
                [
                    'label' => 'Paket Dekorasi',
                    'value' => $totalDecors,
                    'color' => '#f472b6',
                    'bg'    => 'rgba(244,114,182,.15)',
                    'icon'  => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z',
                    'route' => route('admin.decoration-packages.index'),
                ],
                [
                    'label' => 'Total Portofolio',
                    'value' => $totalPortfolios,
                    'color' => '#fbbf24',
                    'bg'    => 'rgba(251,191,36,.15)',
                    'icon'  => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
                    'route' => route('admin.portfolios.index'),
                ],
            ];
            $sparkH = [[60,80,40,90,50,70,85],[45,70,90,55,80,60,95],[70,50,85,65,40,90,75],[55,90,70,40,85,60,80]];
        @endphp

        @foreach($cards as $ci => $cd)
        <a href="{{ $cd['route'] }}" class="m-card">
            <div style="display:flex;align-items:center;justify-content:space-between;">
                <div class="m-icon-wrap" style="background:{{ $cd['bg'] }};">
                    <svg fill="none" stroke="{{ $cd['color'] }}" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $cd['icon'] }}"/></svg>
                </div>
            </div>
            <div style="margin-top:10px;">
                <p class="m-value">{{ number_format($cd['value'], 0, ',', '.') }}</p>
                <p class="m-label">{{ $cd['label'] }}</p>
            </div>
            <div class="spk">
                @foreach($sparkH[$ci] as $sh)
                <span style="background:{{ $cd['color'] }};height:{{ $sh }}%;opacity:.55;"></span>
                @endforeach
            </div>
        </a>
        @endforeach
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════════════ --}}
{{-- ROW 2 :  DONUT (Status Pesanan)  +  BAR CHART (Pesanan & Omset)          --}}
{{-- ═══════════════════════════════════════════════════════════════════════ --}}
<div class="row2 dk-in">

    {{-- Donut: Status Pesanan --}}
    <div class="dk">
        <div class="donut-card-inner">
            <div class="chart-header">
                <h3 class="chart-title">Status Pesanan</h3>
                <a href="{{ route('admin.orders.index') }}" class="chart-link">Lihat Semua →</a>
            </div>

            {{-- Donut chart --}}
            <div class="donut-wrap">
                <div class="donut-container">
                    <canvas id="donutChart"></canvas>
                    <div style="position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;">
                        <span class="donut-center-pct">{{ $pctS }}%</span>
                        <span class="donut-center-label">Total Selesai</span>
                    </div>
                </div>
            </div>

            {{-- Legend --}}
            <div style="border-top:1px solid rgba(255,255,255,.05);padding-top:10px;">
                @php
                    $lgd = [
                        ['l'=>'Menunggu','c'=>'#fbbf24','p'=>$pctM],
                        ['l'=>'Dikonfirmasi','c'=>'#38bdf8','p'=>$pctK],
                        ['l'=>'Selesai','c'=>'#34d399','p'=>$pctS],
                        ['l'=>'Dibatalkan','c'=>'#f87171','p'=>$pctB],
                    ];
                @endphp
                @foreach($lgd as $lg)
                <div class="lg-row">
                    <div class="lg-dot" style="background:{{ $lg['c'] }};"></div>
                    <span class="lg-label">{{ $lg['l'] }}</span>
                    <span class="lg-pct">{{ $lg['p'] }}%</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Bar Chart: Pesanan & Omset --}}
    <div class="dk">
        <div class="bar-card-inner">
            <div class="chart-header">
                <h3 class="chart-title">Pesanan & Omset</h3>
                <span class="chart-year">Tahun {{ now()->year }}</span>
            </div>

            {{-- Chart container --}}
            <div class="bar-chart-wrap">
                <canvas id="barChart"></canvas>
            </div>

            {{-- Bottom summary pills --}}
            <div class="sum-grid" style="margin-top:14px;border-top:1px solid rgba(255,255,255,.05);padding-top:14px;">
                <div class="sum-pill">
                    <div class="sum-icon" style="background:rgba(129,140,248,.15);">
                        <svg fill="none" stroke="#818cf8" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                    <div style="min-width:0;">
                        <p class="sum-label">Total Pesanan</p>
                        <p class="sum-value">{{ number_format($totalOrders,0,',','.') }}</p>
                    </div>
                </div>
                <div class="sum-pill">
                    <div class="sum-icon" style="background:rgba(251,191,36,.15);">
                        <svg fill="none" stroke="#fbbf24" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div style="min-width:0;">
                        <p class="sum-label">Total Omset</p>
                        <p class="sum-value">{{ $fS($totalEstimasiOmset) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // ── Donut Chart ────────────────────────────────────
    const dc = document.getElementById('donutChart');
    if (dc) {
        new Chart(dc, {
            type: 'doughnut',
            data: {
                labels: ['Menunggu', 'Dikonfirmasi', 'Selesai', 'Dibatalkan'],
                datasets: [{
                    data: [{{ $ordersMenunggu }}, {{ $ordersDikonfirmasi }}, {{ $ordersSelesai }}, {{ $ordersDibatalkan }}],
                    backgroundColor: ['#fbbf24', '#38bdf8', '#34d399', '#f87171'],
                    borderColor: '#222539',
                    borderWidth: 3,
                    hoverOffset: 6,
                }]
            },
            options: {
                cutout: '70%',
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        titleColor: '#e2e8f0',
                        bodyColor: '#94a3b8',
                        cornerRadius: 8,
                        padding: 10,
                    }
                }
            }
        });
    }

    // ── Bar Chart ──────────────────────────────────────
    const bc = document.getElementById('barChart');
    if (bc) {
        new Chart(bc, {
            type: 'bar',
            data: {
                labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'],
                datasets: [
                    {
                        label: 'Pesanan',
                        data: [
                            @for($m = 1; $m <= 12; $m++)
                                {{ $monthlyData[$m]['orders'] }}{{ $m < 12 ? ',' : '' }}
                            @endfor
                        ],
                        backgroundColor: '#818cf8',
                        borderRadius: 4,
                        barPercentage: 0.45,
                        categoryPercentage: 0.55,
                    },
                    {
                        label: 'Omset (Jt)',
                        data: [
                            @for($m = 1; $m <= 12; $m++)
                                {{ round($monthlyData[$m]['revenue'] / 1000000, 1) }}{{ $m < 12 ? ',' : '' }}
                            @endfor
                        ],
                        backgroundColor: '#fbbf24',
                        borderRadius: 4,
                        barPercentage: 0.45,
                        categoryPercentage: 0.55,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: '#535773', font: { size: 10, weight: '600' } },
                        border: { display: false },
                    },
                    y: {
                        grid: { color: 'rgba(255,255,255,.04)' },
                        ticks: { color: '#535773', font: { size: 10 }, beginAtZero: true },
                        border: { display: false },
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#94a3b8',
                            font: { size: 10, weight: '600' },
                            usePointStyle: true,
                            pointStyle: 'rect',
                            padding: 16,
                            boxWidth: 10,
                            boxHeight: 10,
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        titleColor: '#e2e8f0',
                        bodyColor: '#94a3b8',
                        cornerRadius: 8,
                        padding: 10,
                    }
                }
            }
        });
    }
});
</script>
@endpush
