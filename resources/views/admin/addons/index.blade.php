@extends('admin.layouts.app')

@section('title', 'Add-on Tambahan')
@section('subtitle', 'Kelola semua add-on untuk kalkulator estimasi')

@section('content')

@php
    $categoryColors = [
        'Tenda'         => 'bg-blue-50 text-blue-700',
        'Kursi'         => 'bg-amber-50 text-amber-700',
        'AC / Blower'   => 'bg-cyan-50 text-cyan-700',
        'Alat Catering' => 'bg-orange-50 text-orange-700',
        'Panggung'      => 'bg-purple-50 text-purple-700',
    ];
@endphp

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-5 py-4 border-b border-slate-100">
        <div>
            <h3 class="font-semibold text-slate-800">Daftar Add-on Tambahan</h3>
            <p class="text-xs text-slate-400 mt-0.5">Total: {{ $addons->total() }} add-on · Digunakan untuk kalkulator estimasi</p>
        </div>
        <a href="{{ route('admin.addons.create') }}"
           class="inline-flex items-center gap-2 bg-violet-600 hover:bg-violet-700 text-white text-sm font-medium px-4 py-2 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Add-on
        </a>
    </div>

    @if($addons->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            <p class="text-sm">Belum ada add-on. Tambahkan sekarang!</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 text-left font-semibold w-10">#</th>
                        <th class="px-5 py-3 text-left font-semibold">Nama Add-on</th>
                        <th class="px-5 py-3 text-left font-semibold">Kategori</th>
                        <th class="px-5 py-3 text-left font-semibold">Harga</th>
                        <th class="px-5 py-3 text-left font-semibold">Satuan</th>
                        <th class="px-5 py-3 text-center font-semibold">Status</th>
                        <th class="px-5 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($addons as $addon)
                    <tr class="hover:bg-slate-50/70 transition-colors">

                        {{-- No --}}
                        <td class="px-5 py-3 text-slate-400 font-mono text-xs">
                            {{ $addons->firstItem() + $loop->index }}
                        </td>

                        {{-- Nama + Deskripsi --}}
                        <td class="px-5 py-3">
                            <p class="font-semibold text-slate-800">{{ $addon->name }}</p>
                            @if($addon->description)
                                <p class="text-xs text-slate-400 mt-0.5 truncate max-w-xs">
                                    {{ Str::limit($addon->description, 55) }}
                                </p>
                            @endif
                        </td>

                        {{-- Kategori --}}
                        <td class="px-5 py-3">
                            <span class="inline-flex items-center text-xs font-semibold px-2.5 py-1 rounded-lg
                                {{ $categoryColors[$addon->category] ?? 'bg-slate-50 text-slate-600' }}">
                                {{ $addon->category }}
                            </span>
                        </td>

                        {{-- Harga --}}
                        <td class="px-5 py-3 whitespace-nowrap">
                            <span class="font-semibold text-slate-700">
                                Rp {{ number_format($addon->price, 0, ',', '.') }}
                            </span>
                        </td>

                        {{-- Satuan --}}
                        <td class="px-5 py-3">
                            <span class="inline-flex items-center bg-slate-50 text-slate-600 text-xs font-medium px-2 py-1 rounded-lg">
                                / {{ $addon->unit }}
                            </span>
                        </td>

                        {{-- Status + Toggle --}}
                        <td class="px-5 py-3 text-center">
                            <form method="POST"
                                  action="{{ route('admin.addons.toggle-status', $addon) }}"
                                  class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    title="{{ $addon->isActive() ? 'Klik untuk nonaktifkan' : 'Klik untuk aktifkan' }}"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-lg transition-colors
                                        {{ $addon->isActive()
                                            ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100'
                                            : 'bg-red-50 text-red-600 hover:bg-red-100' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $addon->isActive() ? 'bg-emerald-500' : 'bg-red-400' }}"></span>
                                    {{ $addon->isActive() ? 'Aktif' : 'Nonaktif' }}
                                </button>
                            </form>
                        </td>

                        {{-- Aksi --}}
                        <td class="px-5 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.addons.edit', $addon) }}"
                                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium bg-sky-50 text-sky-600 hover:bg-sky-100 rounded-lg transition-colors">
                                    Edit
                                </a>
                                <button type="button"
                                    onclick="hapusData('{{ route('admin.addons.destroy', $addon) }}', 'Hapus add-on &ldquo;{{ addslashes($addon->name) }}&rdquo;?')"
                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($addons->hasPages())
            <div class="px-5 py-4 border-t border-slate-100">
                {{ $addons->links() }}
            </div>
        @endif
    @endif
</div>

{{-- Hidden DELETE form --}}
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
                <p id="confirm-message" class="text-xs text-slate-500 mt-0.5">Apakah Anda yakin?</p>
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
            <button type="button" onclick="eksekusiHapus()"
                class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-xl transition-colors">
                Ya, Hapus
            </button>
        </div>
    </div>
</div>

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

    document.getElementById('confirm-modal').addEventListener('click', function(e) {
        if (e.target === this) tutupModal();
    });
</script>

@endsection
