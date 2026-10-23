@extends('admin.layouts.app')

@section('title', 'Edit Order #' . $order->id)
@section('subtitle', 'Perbarui status dan vendor order')

@section('content')
<div class="max-w-2xl mx-auto">

    <a href="{{ route('admin.orders.show', $order) }}"
       class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-rose-600 font-medium mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali ke Detail Order
    </a>

    {{-- Info ringkas --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 mb-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-slate-400">Pemesan</p>
                <p class="font-bold text-slate-800">{{ $order->visitor_name }}</p>
                <p class="text-sm text-slate-500">{{ $order->visitor_phone }}</p>
            </div>
            <div class="text-right">
                <p class="text-xs text-slate-400">Total Estimasi</p>
                <p class="font-bold text-rose-600 text-lg">
                    Rp {{ number_format((float)$order->total_estimate, 0, ',', '.') }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 md:p-8">
        <h1 class="text-xl font-bold text-slate-800 mb-6">Edit Order #{{ $order->id }}</h1>

        <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="space-y-6">
            @csrf @method('PUT')

            {{-- Status --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-3">
                    Status Pesanan <span class="text-rose-500">*</span>
                </label>
                <div class="grid grid-cols-1 gap-2">
                    @foreach(\App\Models\Order::STATUSES as $key => $label)
                    <label class="flex items-center gap-3 cursor-pointer p-3 rounded-xl border transition
                        {{ old('status', $order->status) === $key
                            ? 'border-rose-400 bg-rose-50'
                            : 'border-slate-200 hover:border-rose-200' }}">
                        <input type="radio" name="status" value="{{ $key }}"
                               {{ old('status', $order->status) === $key ? 'checked' : '' }}
                               class="text-rose-500 focus:ring-rose-400"
                               onchange="this.closest('form').querySelectorAll('label').forEach(l=>l.classList.remove('border-rose-400','bg-rose-50'));
                                         this.closest('label').classList.add('border-rose-400','bg-rose-50')">
                        <span class="text-sm font-medium text-slate-700">{{ $label }}</span>
                        @php
                            $colors = \App\Models\Order::STATUS_COLORS;
                        @endphp
                        <span class="ml-auto text-xs px-2 py-0.5 rounded-full {{ $colors[$key] ?? 'bg-slate-100 text-slate-600' }}">
                            {{ $label }}
                        </span>
                    </label>
                    @endforeach
                </div>
                @error('status')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Vendor --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Vendor yang Terlibat
                </label>
                <p class="text-xs text-slate-400 mb-3">Centang vendor yang akan menangani order ini.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    @foreach($vendors as $vendor)
                    <label class="flex items-center gap-2 cursor-pointer p-2.5 rounded-xl border border-slate-200 hover:border-rose-200 transition">
                        <input type="checkbox" name="vendor_ids[]" value="{{ $vendor->id }}"
                               {{ $order->vendors->contains($vendor->id) ? 'checked' : '' }}
                               class="text-rose-500 focus:ring-rose-400 rounded">
                        <div>
                            <p class="text-sm font-medium text-slate-700">{{ $vendor->name }}</p>
                            <p class="text-xs text-slate-400">{{ $vendor->category }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- Catatan --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5" for="notes">
                    Catatan Admin
                </label>
                <textarea id="notes" name="notes" rows="3"
                          class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-rose-300 focus:border-rose-400 resize-none"
                          placeholder="Tambahkan catatan internal...">{{ old('notes', $order->notes) }}</textarea>
            </div>

            {{-- Submit --}}
            <div class="flex gap-3 pt-2">
                <button type="submit"
                    class="flex-1 bg-rose-500 hover:bg-rose-600 text-white text-sm font-semibold px-6 py-3 rounded-xl shadow-sm transition-all duration-200">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.orders.show', $order) }}"
                   class="flex-1 text-center text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 px-6 py-3 rounded-xl transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
