@extends('admin.layouts.app')

@section('title', 'Paket Pernikahan')
@section('subtitle', 'Daftar semua paket pernikahan')

@section('content')

<div class="max-w-5xl bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-5 py-4 border-b border-slate-100">
        <div>
            <h3 class="font-semibold text-slate-800">Daftar Paket Pernikahan</h3>
            <p class="text-xs text-slate-400 mt-0.5">Total: {{ $packages->total() }} paket</p>
        </div>
        <a href="{{ route('admin.packages.create') }}"
           class="inline-flex items-center gap-2 bg-violet-600 hover:bg-violet-700 text-white text-sm font-medium px-4 py-2 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Paket
        </a>
    </div>

    @if($packages->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <p class="text-sm">Belum ada paket pernikahan. Tambahkan sekarang!</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide border-b border-slate-100">
                        <th class="px-4 py-3 text-left font-semibold w-10">#</th>
                        <th class="px-3 py-3 text-left font-semibold w-24 whitespace-nowrap">Batch</th>
                        <th class="px-4 py-3 text-left font-semibold min-w-[200px]">Nama Paket</th>
                        <th class="px-3 py-3 text-left font-semibold w-32 whitespace-nowrap">Harga</th>
                        <th class="px-3 py-3 text-left font-semibold w-36 whitespace-nowrap">Venue / Pax</th>
                        <th class="px-3 py-3 text-center font-semibold w-24 whitespace-nowrap">Status</th>
                        <th class="px-4 py-3 text-center font-semibold w-32 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($packages as $package)
                    <tr class="hover:bg-slate-50/70 transition-colors">
                        <td class="px-4 py-3 text-slate-400 font-mono text-xs">
                            {{ $packages->firstItem() + $loop->index }}
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-violet-50 text-violet-700 border border-violet-100">
                                Batch {{ $package->batch }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-semibold text-slate-800 leading-snug">{{ $package->name }}</p>
                            @if($package->description)
                                <p class="text-xs text-slate-400 mt-0.5 truncate max-w-sm">{{ Str::limit($package->description, 55) }}</p>
                            @endif
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap">
                            <span class="inline-flex items-center bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-lg">
                                Rp {{ number_format($package->price, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-3 py-3 whitespace-nowrap text-xs text-slate-600">
                            @if($package->venue)
                                <span class="inline-flex items-center gap-1 text-blue-700 bg-blue-50 px-2 py-0.5 rounded font-medium">
                                    🏛 {{ $package->venue->name }}
                                </span>
                            @else
                                <span class="text-slate-400">Tanpa Venue</span>
                            @endif
                            @if($package->pax)
                                <div class="text-slate-400 text-xs mt-0.5">👥 {{ number_format($package->pax) }} pax</div>
                            @endif
                        </td>
                        <td class="px-3 py-3 text-center whitespace-nowrap">
                            @if($package->status === 'active')
                                <span class="inline-flex items-center gap-1 text-xs font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-xs font-semibold text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            <div class="inline-flex items-center justify-center gap-1.5">
                                <a href="{{ route('admin.packages.edit', $package) }}"
                                   class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium bg-sky-50 text-sky-600 hover:bg-sky-100 rounded-lg transition-colors">
                                    Edit
                                </a>

                                {{-- Tombol hapus — trigger via JS --}}
                                <button type="button"
                                    onclick="hapusData('{{ route('admin.packages.destroy', $package) }}', 'Hapus paket &ldquo;{{ addslashes($package->name) }}&rdquo;?')"
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

        @if($packages->hasPages())
            <div class="px-5 py-4 border-t border-slate-100">
                {{ $packages->links() }}
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
                class="px-4 py-2 text-sm font-medium text-slate-600 bg-red-50 hover:bg-red-100 rounded-xl transition-colors">
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

    // Tutup modal jika klik di luar
    document.getElementById('confirm-modal').addEventListener('click', function(e) {
        if (e.target === this) tutupModal();
    });
</script>

@endsection
