@extends('admin.layouts.app')

@section('title', 'Detail Order #' . $order->id)
@section('subtitle', 'Informasi lengkap pesanan')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Back + Actions --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.orders.index') }}"
           class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-rose-600 font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Daftar Order
        </a>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.orders.edit', $order) }}"
               class="inline-flex items-center gap-2 bg-rose-500 hover:bg-rose-600 text-white text-sm font-semibold px-4 py-2 rounded-xl transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Status
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kolom Kiri: Info Utama --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Header Order --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h1 class="text-xl font-bold text-slate-800">Order #{{ $order->id }}</h1>
                        <p class="text-sm text-slate-400 mt-1">{{ $order->ordered_at?->format('d F Y, H:i') }} WIB</p>
                    </div>
                    <span class="px-3 py-1.5 text-sm font-semibold rounded-full {{ $order->status_color }}">
                        {{ $order->status_label }}
                    </span>
                </div>

                {{-- Data Pengunjung --}}
                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-3">Data Pemesan</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <p class="text-xs text-slate-400">Nama</p>
                            <p class="font-semibold text-slate-800">{{ $order->visitor_name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">No. HP / WhatsApp</p>
                            <p class="font-semibold text-slate-800">{{ $order->visitor_phone }}</p>
                        </div>
                        @if($order->visitor_address)
                        <div class="sm:col-span-2">
                            <p class="text-xs text-slate-400">Alamat</p>
                            <p class="font-semibold text-slate-800">{{ $order->visitor_address }}</p>
                        </div>
                        @endif
                        <div>
                            <p class="text-xs text-slate-400">Tanggal Pelaksanaan</p>
                            <p class="font-semibold text-slate-800">{{ $order->execution_date?->format('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Paket Pernikahan --}}
            @if($order->package)
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-3">Paket Pernikahan</p>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-bold text-slate-800">{{ $order->package->name }}</p>
                        <p class="text-sm text-slate-500">Batch {{ $order->package->batch }}</p>
                        @if($order->package->venue)
                            <span class="inline-flex items-center gap-1 mt-1 text-xs bg-blue-50 text-blue-700 px-2 py-0.5 rounded-full font-medium">
                                🏛 Venue: {{ $order->package->venue->name }} (Termasuk)
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 mt-1 text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full font-medium">
                                Venue tidak termasuk
                            </span>
                        @endif
                    </div>
                    <p class="font-bold text-rose-600 text-lg">
                        Rp {{ number_format((float)$order->package->price, 0, ',', '.') }}
                    </p>
                </div>

                {{-- Fasilitas paket --}}
                @if($order->package->facilities_json)
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-2">Fasilitas Paket</p>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($order->package->getIncludedFacilityKeys() as $fac)
                            <span class="text-xs bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded-full font-medium">✓ {{ $fac }}</span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            @endif

            {{-- Paket Dekorasi --}}
            @if($order->decorationPackage)
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-3">Paket Dekorasi</p>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-bold text-slate-800">{{ $order->decorationPackage->name }}</p>
                        <p class="text-sm text-slate-500">{{ $order->decorationPackage->category }}</p>
                    </div>
                    <p class="font-bold text-rose-600 text-lg">
                        Rp {{ number_format((float)$order->decorationPackage->price, 0, ',', '.') }}
                    </p>
                </div>
            </div>
            @endif

            {{-- Venue Tambahan --}}
            @if($order->venue)
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-3">Venue Tambahan</p>
                <p class="font-bold text-slate-800">{{ $order->venue->name }}</p>
                @if($order->venue->address)
                    <p class="text-sm text-slate-500">{{ $order->venue->address }}</p>
                @endif
            </div>
            @endif

            {{-- Add-on --}}
            @if($order->addons->isNotEmpty())
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-3">Add-on Tambahan</p>
                <div class="space-y-2">
                    @foreach($order->addons as $addon)
                    <div class="flex items-center justify-between py-2 border-b border-slate-50 last:border-0">
                        <div>
                            <p class="font-medium text-slate-800 text-sm">{{ $addon->name }}</p>
                            <p class="text-xs text-slate-400">{{ $addon->category }} · x{{ $addon->pivot->qty }} {{ $addon->unit }}</p>
                        </div>
                        <p class="font-semibold text-slate-700 text-sm">
                            Rp {{ number_format((float)$addon->pivot->price_snapshot * $addon->pivot->qty, 0, ',', '.') }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Vendor --}}
            @if($order->vendors->isNotEmpty())
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-3">Vendor Terlibat</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($order->vendors as $vendor)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 text-slate-700 rounded-full text-xs font-medium">
                            {{ $vendor->name }}
                            @if($vendor->pivot->role)
                                <span class="text-slate-400">· {{ $vendor->pivot->role }}</span>
                            @endif
                        </span>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Catatan --}}
            @if($order->notes)
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-2">Catatan</p>
                <p class="text-sm text-slate-700">{{ $order->notes }}</p>
            </div>
            @endif
        </div>

        {{-- Kolom Kanan: Ringkasan --}}
        <div class="space-y-5">

            {{-- Total Estimasi --}}
            <div class="bg-gradient-to-br from-rose-500 to-pink-600 rounded-2xl p-6 text-white shadow-lg">
                <p class="text-sm font-medium text-rose-100 mb-1">Total Estimasi</p>
                <p class="text-3xl font-bold leading-tight">
                    Rp {{ number_format((float)$order->total_estimate, 0, ',', '.') }}
                </p>
                <p class="text-xs text-rose-200 mt-2">Harga dapat berubah setelah konfirmasi</p>
            </div>

            {{-- Status History (sederhana) --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-3">Status Saat Ini</p>
                <div class="space-y-2">
                    @foreach(\App\Models\Order::STATUSES as $key => $label)
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0
                            {{ $order->status === $key ? 'bg-rose-500' : 'bg-slate-100' }}">
                            @if($order->status === $key)
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                            @endif
                        </div>
                        <span class="text-sm {{ $order->status === $key ? 'font-bold text-rose-600' : 'text-slate-400' }}">
                            {{ $label }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- WhatsApp --}}
            <a href="https://wa.me/{{ ltrim($order->visitor_phone, '0') }}"
               target="_blank"
               class="flex items-center justify-center gap-2 w-full bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-semibold px-4 py-3 rounded-xl transition shadow-sm">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Chat WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection
