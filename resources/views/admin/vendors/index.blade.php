@extends('admin.layouts.app')

@section('title', 'Vendor & Partner')
@section('subtitle', 'Kelola vendor dan partner yang tampil di landing page')

@section('content')

@php
    $categoryColors = [
        'Wedding Planning' => 'bg-rose-50 text-rose-700',
        'MUA'              => 'bg-pink-50 text-pink-700',
        'Dekorasi'         => 'bg-emerald-50 text-emerald-700',
        'Dokumentasi'      => 'bg-blue-50 text-blue-700',
        'Catering'         => 'bg-orange-50 text-orange-700',
        'Entertainment'    => 'bg-purple-50 text-purple-700',
        'Music'            => 'bg-violet-50 text-violet-700',
        'MC'               => 'bg-amber-50 text-amber-700',
        'Upacara Adat'     => 'bg-teal-50 text-teal-700',
    ];
@endphp

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-5 py-4 border-b border-slate-100">
        <div>
            <h3 class="font-semibold text-slate-800">Daftar Vendor & Partner</h3>
            <p class="text-xs text-slate-400 mt-0.5">Total: {{ $vendors->total() }} vendor · Tampil di landing page</p>
        </div>
        <a href="{{ route('admin.vendors.create') }}"
           class="inline-flex items-center gap-2 bg-violet-600 hover:bg-violet-700 text-white text-sm font-medium px-4 py-2 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Vendor
        </a>
    </div>

    @if($vendors->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <p class="text-sm">Belum ada vendor. Tambahkan sekarang!</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 text-left font-semibold w-10">#</th>
                        <th class="px-5 py-3 text-left font-semibold">Vendor</th>
                        <th class="px-5 py-3 text-left font-semibold">Kategori</th>
                        <th class="px-5 py-3 text-left font-semibold">Handle IG</th>
                        <th class="px-5 py-3 text-center font-semibold">Status</th>
                        <th class="px-5 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($vendors as $vendor)
                    <tr class="hover:bg-slate-50/70 transition-colors">

                        {{-- No --}}
                        <td class="px-5 py-3 text-slate-400 font-mono text-xs">
                            {{ $vendors->firstItem() + $loop->index }}
                        </td>

                        {{-- Vendor (foto + nama) --}}
                        <td class="px-5 py-3">
                            <div class="flex items-center gap-3">
                                <img src="{{ $vendor->image_url }}"
                                     alt="{{ $vendor->name }}"
                                     class="w-10 h-10 rounded-lg object-cover border border-slate-200 flex-shrink-0">
                                <div class="min-w-0">
                                    <p class="font-semibold text-slate-800 truncate">{{ $vendor->name }}</p>
                                    @if($vendor->description)
                                        <p class="text-xs text-slate-400 mt-0.5 truncate max-w-xs">
                                            {{ Str::limit($vendor->description, 40) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </td>

                        {{-- Kategori --}}
                        <td class="px-5 py-3">
                            <span class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-lg
                                {{ $categoryColors[$vendor->category] ?? 'bg-slate-50 text-slate-600' }}">
                                <i class="bi {{ $vendor->category_icon }}" style="font-size: 0.65rem;"></i>
                                {{ $vendor->category }}
                            </span>
                        </td>

                        {{-- Handle IG --}}
                        <td class="px-5 py-3">
                            <a href="{{ $vendor->instagram_url }}" target="_blank" rel="noopener"
                               class="text-pink-500 hover:text-pink-600 text-xs font-medium transition-colors">
                                {{ $vendor->handle }}
                            </a>
                        </td>

                        {{-- Status + Toggle --}}
                        <td class="px-5 py-3 text-center">
                            <form method="POST"
                                  action="{{ route('admin.vendors.toggle-status', $vendor) }}"
                                  class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    title="{{ $vendor->isActive() ? 'Klik untuk nonaktifkan' : 'Klik untuk aktifkan' }}"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1.5 rounded-lg transition-colors
                                        {{ $vendor->isActive()
                                            ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100'
                                            : 'bg-red-50 text-red-600 hover:bg-red-100' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $vendor->isActive() ? 'bg-emerald-500' : 'bg-red-400' }}"></span>
                                    {{ $vendor->isActive() ? 'Aktif' : 'Nonaktif' }}
                                </button>
                            </form>
                        </td>

                        {{-- Aksi --}}
                        <td class="px-5 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.vendors.edit', $vendor) }}"
                                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium bg-sky-50 text-sky-600 hover:bg-sky-100 rounded-lg transition-colors">
                                    Edit
                                </a>
                                <button type="button"
                                    onclick="hapusData('{{ route('admin.vendors.destroy', $vendor) }}', 'Hapus vendor &ldquo;{{ addslashes($vendor->name) }}&rdquo;?')"
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

        @if($vendors->hasPages())
            <div class="px-5 py-4 border-t border-slate-100">
                {{ $vendors->links() }}
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
