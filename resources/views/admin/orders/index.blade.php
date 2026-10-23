@extends('admin.layouts.app')

@section('title', 'Order / Pesanan')
@section('subtitle', 'Kelola semua pesanan dari pengunjung')

@section('content')
<div class="space-y-6">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center justify-between text-sm shadow-sm">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    @endif

    {{-- Header & Search --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Order / Pesanan</h1>
            <p class="text-sm text-slate-500 mt-0.5">Total {{ $statusCounts['all'] }} pesanan</p>
        </div>

        {{-- Search Form --}}
        <form method="GET" action="{{ route('admin.orders.index') }}" class="flex items-center gap-2 max-w-sm w-full">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari nama / nomor HP..."
                   class="flex-1 px-3.5 py-2 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-rose-300 focus:border-rose-400 bg-white">
            <button type="submit"
                class="px-4 py-2 bg-rose-500 hover:bg-rose-600 text-white text-sm font-semibold rounded-xl transition shadow-sm">
                Cari
            </button>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.orders.index') }}"
                   class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold rounded-xl transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Status Tabs --}}
    <div class="flex flex-wrap gap-2">
        @php
            $tabItems = [
                ''             => ['label' => 'Semua',       'count' => $statusCounts['all']],
                'menunggu'     => ['label' => 'Menunggu',    'count' => $statusCounts['menunggu']],
                'dikonfirmasi' => ['label' => 'Dikonfirmasi','count' => $statusCounts['dikonfirmasi']],
                'diproses'     => ['label' => 'Diproses',   'count' => $statusCounts['diproses']],
                'selesai'      => ['label' => 'Selesai',    'count' => $statusCounts['selesai']],
                'dibatalkan'   => ['label' => 'Dibatalkan', 'count' => $statusCounts['dibatalkan']],
            ];
            $currentStatus = request('status', '');
        @endphp

        @foreach($tabItems as $statusKey => $tab)
            <a href="{{ route('admin.orders.index', array_merge(request()->except('page'), ['status' => $statusKey])) }}"
               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold border transition-all
               {{ $currentStatus === $statusKey
                    ? 'bg-rose-500 text-white border-rose-500 shadow-sm'
                    : 'bg-white text-slate-600 border-slate-200 hover:border-rose-300 hover:text-rose-600' }}">
                {{ $tab['label'] }}
                <span class="px-1.5 py-0.5 rounded-full text-xs font-bold
                    {{ $currentStatus === $statusKey ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                    {{ $tab['count'] }}
                </span>
            </a>
        @endforeach
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        @if($orders->isEmpty())
            <div class="text-center py-16">
                <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-3">
                    <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-slate-700 mb-1">Tidak ada order</h3>
                <p class="text-sm text-slate-400">Belum ada pesanan yang sesuai.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide border-b border-slate-100">
                            <th class="px-5 py-3.5 text-left font-semibold">#</th>
                            <th class="px-5 py-3.5 text-left font-semibold">Pemesan</th>
                            <th class="px-5 py-3.5 text-left font-semibold">Paket</th>
                            <th class="px-5 py-3.5 text-left font-semibold">Tgl Acara</th>
                            <th class="px-5 py-3.5 text-left font-semibold">Total</th>
                            <th class="px-5 py-3.5 text-left font-semibold">Status</th>
                            <th class="px-5 py-3.5 text-left font-semibold">Waktu Order</th>
                            <th class="px-5 py-3.5 text-center font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($orders as $order)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            {{-- # --}}
                            <td class="px-5 py-3.5 text-slate-400 font-mono text-xs font-semibold whitespace-nowrap">
                                #{{ $order->id }}
                            </td>

                            {{-- Pemesan --}}
                            <td class="px-5 py-3.5">
                                <p class="font-semibold text-slate-800">{{ $order->visitor_name }}</p>
                                <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $order->visitor_phone)) }}"
                                   target="_blank"
                                   class="text-xs text-emerald-600 hover:text-emerald-700 font-medium inline-flex items-center gap-1 mt-0.5"
                                   title="Chat via WhatsApp">
                                    <i class="bi bi-whatsapp"></i> {{ $order->visitor_phone }}
                                </a>
                            </td>

                            {{-- Paket --}}
                            <td class="px-5 py-3.5">
                                @if($order->package)
                                    <p class="font-medium text-slate-800 text-xs">{{ $order->package->name }}</p>
                                @endif
                                @if($order->decorationPackage)
                                    <p class="text-xs text-slate-400 mt-0.5">+ {{ $order->decorationPackage->name }}</p>
                                @endif
                                @if(!$order->package && !$order->decorationPackage)
                                    <span class="text-slate-400 text-xs">—</span>
                                @endif
                            </td>

                            {{-- Tgl Acara --}}
                            <td class="px-5 py-3.5 text-slate-600 text-xs font-medium whitespace-nowrap">
                                {{ $order->execution_date?->format('d/m/Y') ?? '—' }}
                            </td>

                            {{-- Total --}}
                            <td class="px-5 py-3.5 font-bold text-slate-800 text-xs whitespace-nowrap">
                                Rp {{ number_format((float)$order->total_estimate, 0, ',', '.') }}
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3.5 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full {{ $order->status_color }}">
                                    {{ $order->status_label }}
                                </span>
                            </td>

                            {{-- Waktu Order --}}
                            <td class="px-5 py-3.5 text-slate-400 text-xs whitespace-nowrap">
                                {{ $order->ordered_at?->format('d/m/Y H:i') }}
                            </td>

                            {{-- Aksi --}}
                            <td class="px-5 py-3.5 text-center whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    {{-- Detail --}}
                                    <a href="{{ route('admin.orders.show', $order) }}"
                                       class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium bg-sky-50 text-sky-600 hover:bg-sky-100 rounded-lg transition-colors"
                                       title="Lihat Detail">
                                        Detail
                                    </a>

                                    {{-- Edit Status --}}
                                    <a href="{{ route('admin.orders.edit', $order) }}"
                                       class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium bg-violet-50 text-violet-600 hover:bg-violet-100 rounded-lg transition-colors"
                                       title="Edit Status & Vendor">
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <button type="button"
                                        onclick="hapusData('{{ route('admin.orders.destroy', $order) }}', 'Hapus pesanan <strong>#{{ $order->id }}</strong> ({{ addslashes($order->visitor_name) }})?')"
                                        class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors"
                                        title="Hapus Order">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($orders->hasPages())
                <div class="px-5 py-4 border-t border-slate-100 flex items-center justify-between">
                    {{ $orders->links() }}
                </div>
            @endif
        @endif
    </div>
</div>

{{-- Hidden form untuk DELETE --}}
<form id="delete-form" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
</form>

{{-- Modal Konfirmasi Hapus --}}
<div id="confirm-modal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-4 p-6">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-slate-800 text-sm">Konfirmasi Hapus</h3>
                <p id="confirm-message" class="text-xs text-slate-500 mt-0.5">Apakah Anda yakin ingin menghapus pesanan ini?</p>
            </div>
        </div>
        <p class="text-xs text-red-500 bg-red-50 rounded-lg px-3 py-2 mb-5">
            ⚠️ Tindakan ini tidak dapat dibatalkan. Data pesanan akan dihapus permanen.
        </p>
        <div class="flex gap-2 justify-end">
            <button type="button" onclick="tutupModal()"
                class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-50 hover:bg-slate-100 rounded-xl transition-colors">
                Batal
            </button>
            <button type="button" id="confirm-btn" onclick="eksekusiHapus()"
                class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-xl transition-colors">
                Ya, Hapus
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let deleteUrl = '';

    function hapusData(url, pesan) {
        deleteUrl = url;
        document.getElementById('confirm-message').innerHTML = pesan;
        document.getElementById('confirm-modal').classList.remove('hidden');
        document.getElementById('confirm-modal').classList.add('flex');
    }

    function tutupModal() {
        document.getElementById('confirm-modal').classList.add('hidden');
        document.getElementById('confirm-modal').classList.remove('flex');
        deleteUrl = '';
    }

    function eksekusiHapus() {
        if (!deleteUrl) return;
        const form = document.getElementById('delete-form');
        form.action = deleteUrl;
        form.submit();
    }

    // Tutup modal jika klik di luar box
    document.getElementById('confirm-modal').addEventListener('click', function(e) {
        if (e.target === this) tutupModal();
    });
</script>
@endpush
@endsection
