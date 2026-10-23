@extends('admin.layouts.app')

@section('title', 'Venue')
@section('subtitle', 'Kelola daftar venue pernikahan')

@section('content')

<div class="max-w-5xl bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-5 py-4 border-b border-slate-100">
        <div>
            <h3 class="font-semibold text-slate-800">Daftar Venue Pernikahan</h3>
            <p class="text-xs text-slate-400 mt-0.5">Total: {{ $venues->total() }} venue &middot; Digunakan untuk Paket Pernikahan &amp; Estimasi</p>
        </div>
        <a href="{{ route('admin.venues.create') }}"
           class="inline-flex items-center gap-2 bg-violet-600 hover:bg-violet-700 text-white text-sm font-medium px-4 py-2 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Venue
        </a>
    </div>

    {{-- Venue Content --}}
    @if($venues->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <h4 class="font-semibold text-slate-700 text-sm mb-1">Belum ada venue terdaftar</h4>
            <p class="text-xs text-slate-400 mb-4 max-w-sm mx-auto">Tambahkan venue untuk paket pernikahan Batch 4 (Luxury) atau pilihan custom booking.</p>
            <a href="{{ route('admin.venues.create') }}"
               class="inline-flex items-center gap-2 bg-violet-600 hover:bg-violet-700 text-white text-xs font-semibold px-3.5 py-2 rounded-xl transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Venue Sekarang
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide border-b border-slate-100">
                        <th class="px-4 py-3 text-left font-semibold w-10">#</th>
                        <th class="px-4 py-3 text-left font-semibold">Venue</th>
                        <th class="px-3 py-3 text-left font-semibold w-32 whitespace-nowrap">Kapasitas</th>
                        <th class="px-3 py-3 text-left font-semibold w-40 whitespace-nowrap">Info Harga</th>
                        <th class="px-3 py-3 text-left font-semibold w-36 whitespace-nowrap">Paket Terkait</th>
                        <th class="px-3 py-3 text-center font-semibold w-28 whitespace-nowrap">Status</th>
                        <th class="px-4 py-3 text-center font-semibold w-32 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($venues as $venue)
                    <tr class="hover:bg-slate-50/70 transition-colors">
                        {{-- No --}}
                        <td class="px-4 py-3 text-slate-400 font-mono text-xs">
                            {{ $venues->firstItem() + $loop->index }}
                        </td>

                        {{-- Foto & Nama Venue --}}
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                @if($venue->image)
                                    <img src="{{ $venue->image_url }}"
                                         alt="{{ $venue->name }}"
                                         class="w-12 h-12 rounded-xl object-cover border border-slate-200 shadow-xs flex-shrink-0">
                                @else
                                    <div class="w-12 h-12 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center flex-shrink-0 text-slate-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="min-w-0">
                                    <p class="font-semibold text-slate-800 text-sm leading-snug">{{ $venue->name }}</p>
                                    @if($venue->address)
                                        <p class="text-xs text-slate-400 flex items-center gap-1 mt-0.5">
                                            <svg class="w-3.5 h-3.5 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span class="truncate max-w-xs">{{ $venue->address }}</span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </td>

                        {{-- Kapasitas --}}
                        <td class="px-3 py-3 whitespace-nowrap">
                            @if($venue->capacity)
                                <span class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700">
                                    👥 {{ number_format($venue->capacity) }} pax
                                </span>
                            @else
                                <span class="text-xs text-slate-400">-</span>
                            @endif
                        </td>

                        {{-- Info Harga --}}
                        <td class="px-3 py-3 whitespace-nowrap">
                            @if($venue->price_info)
                                <span class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-lg bg-amber-50 text-amber-700 border border-amber-100">
                                    💰 {{ $venue->price_info }}
                                </span>
                            @else
                                <span class="text-xs text-slate-400">Termasuk Paket</span>
                            @endif
                        </td>

                        {{-- Paket Terkait --}}
                        <td class="px-3 py-3 whitespace-nowrap">
                            @php $pkgCount = $venue->packages_count ?? $venue->packages()->count(); @endphp
                            @if($pkgCount > 0)
                                <span class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-lg bg-violet-50 text-violet-700 border border-violet-100">
                                    🏛 Dipakai {{ $pkgCount }} paket
                                </span>
                            @else
                                <span class="text-xs text-slate-400">Belum dipakai</span>
                            @endif
                        </td>

                        {{-- Status + Toggle --}}
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            <form method="POST" action="{{ route('admin.venues.toggle-status', $venue) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    title="{{ $venue->isActive() ? 'Klik untuk nonaktifkan' : 'Klik untuk aktifkan' }}"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-lg transition-colors
                                        {{ $venue->isActive()
                                            ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100'
                                            : 'bg-red-50 text-red-600 hover:bg-red-100' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $venue->isActive() ? 'bg-emerald-500' : 'bg-red-400' }}"></span>
                                    {{ $venue->isActive() ? 'Aktif' : 'Nonaktif' }}
                                </button>
                            </form>
                        </td>

                        {{-- Aksi --}}
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            <div class="inline-flex items-center justify-center gap-1.5">
                                <a href="{{ route('admin.venues.edit', $venue) }}"
                                   class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium bg-sky-50 text-sky-600 hover:bg-sky-100 rounded-lg transition-colors">
                                    Edit
                                </a>

                                <button type="button"
                                    onclick="hapusData('{{ route('admin.venues.destroy', $venue) }}', 'Hapus venue &ldquo;{{ addslashes($venue->name) }}&rdquo;?')"
                                    class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors">
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
        @if($venues->hasPages())
            <div class="px-5 py-4 border-t border-slate-100">
                {{ $venues->links() }}
            </div>
        @endif
    @endif
</div>

{{-- Hidden form untuk DELETE --}}
<form id="delete-form" method="POST" style="display:none;">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
</form>

{{-- Modal Konfirmasi --}}
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
                <p id="confirm-message" class="text-xs text-slate-500 mt-0.5">Apakah Anda yakin ingin menghapus data ini?</p>
            </div>
        </div>
        <p class="text-xs text-red-500 bg-red-50 rounded-lg px-3 py-2 mb-5">
            ⚠️ Tindakan ini tidak dapat dibatalkan.
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

    // Tutup modal jika klik di luar
    document.getElementById('confirm-modal').addEventListener('click', function(e) {
        if (e.target === this) tutupModal();
    });
</script>
@endpush

@endsection
