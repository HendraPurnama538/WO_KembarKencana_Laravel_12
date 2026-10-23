@extends('admin.layouts.app')

@section('title', 'Manajemen Instagram')
@section('subtitle', 'Sinkronisasi & kelola postingan Instagram Kembar Kencana')

@section('content')

{{-- Token Warning --}}
@if(empty(config('instagram.access_token')))
<div class="mb-6 rounded-xl border border-amber-200 bg-amber-50 px-5 py-4 flex items-start gap-3">
    <svg class="w-5 h-5 text-amber-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
    </svg>
    <div>
        <p class="font-semibold text-amber-800 text-sm">INSTAGRAM_ACCESS_TOKEN belum diisi</p>
        <p class="text-amber-700 text-xs mt-1">
            Tambahkan <code class="bg-amber-100 px-1 rounded">INSTAGRAM_ACCESS_TOKEN=&lt;token&gt;</code> ke file <code class="bg-amber-100 px-1 rounded">.env</code> lalu jalankan <code class="bg-amber-100 px-1 rounded">php artisan optimize:clear</code>.
            <a href="https://developers.facebook.com" target="_blank" class="underline ml-1">Dapatkan token →</a>
        </p>
    </div>
</div>
@endif

{{-- Header + Sync Button --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h2 class="text-lg font-bold text-slate-800">Postingan Instagram</h2>
        <p class="text-sm text-slate-500 mt-0.5">{{ $posts->total() }} postingan tersimpan dalam cache lokal</p>
    </div>
    <form method="POST" action="{{ route('admin.instagram.sync') }}">
        @csrf
        <button type="submit"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 text-white text-sm font-semibold shadow hover:opacity-90 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Sinkronisasi Sekarang
        </button>
    </form>
</div>

{{-- Alert --}}
@if(session('success'))
    <div class="mb-4 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm text-emerald-700">
        ✅ {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="mb-4 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700">
        ❌ {{ session('error') }}
    </div>
@endif

{{-- Info Command --}}
<div class="mb-6 rounded-xl bg-slate-50 border border-slate-200 px-4 py-3 text-xs text-slate-500 flex items-center gap-2">
    <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
    </svg>
    Untuk sinkronisasi otomatis, jalankan: <code class="bg-slate-200 px-1.5 py-0.5 rounded font-mono ml-1">php artisan instagram:sync</code>
    &nbsp;— atau jadwalkan via Task Scheduler / cron.
</div>

{{-- Grid Postingan --}}
@if($posts->isEmpty())
    <div class="text-center py-20 text-slate-400">
        <svg class="w-12 h-12 mx-auto mb-3 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
        <p class="text-sm">Belum ada postingan. Klik <strong>Sinkronisasi Sekarang</strong> untuk mengambil dari Instagram.</p>
    </div>
@else
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @foreach($posts as $post)
        <div class="relative rounded-xl overflow-hidden border border-slate-200 bg-white shadow-sm group">

            {{-- Gambar --}}
            @if($post->display_image)
            <div class="aspect-square bg-slate-100 overflow-hidden">
                <img src="{{ $post->display_image }}" alt="Instagram post"
                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                     loading="lazy"
                     onerror="this.src='{{ asset('images/logo.JPG') }}'">
            </div>
            @else
            <div class="aspect-square bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                <svg class="w-8 h-8 text-purple-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
            </div>
            @endif

            {{-- Overlay info --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-end p-2">
                <p class="text-white text-xs line-clamp-2">{{ $post->short_caption ?: '(Tidak ada caption)' }}</p>
            </div>

            {{-- Badge type --}}
            <div class="absolute top-2 left-2">
                @if($post->media_type === 'VIDEO')
                    <span class="text-xs bg-black/60 text-white px-1.5 py-0.5 rounded">▶ Video</span>
                @elseif($post->media_type === 'CAROUSEL_ALBUM')
                    <span class="text-xs bg-black/60 text-white px-1.5 py-0.5 rounded">⊞ Album</span>
                @endif
            </div>

            {{-- Invisible badge --}}
            @if(!$post->is_visible)
            <div class="absolute top-2 right-2">
                <span class="text-xs bg-red-500 text-white px-1.5 py-0.5 rounded">Disembunyikan</span>
            </div>
            @endif

            {{-- Actions --}}
            <div class="p-2 flex items-center gap-1.5 border-t border-slate-100">
                {{-- Toggle visible --}}
                <form method="POST" action="{{ route('admin.instagram.toggle', $post) }}" class="flex-1">
                    @csrf @method('PATCH')
                    <button type="submit"
                            title="{{ $post->is_visible ? 'Sembunyikan' : 'Tampilkan' }}"
                            class="w-full py-1 rounded-lg text-xs font-medium transition
                                   {{ $post->is_visible
                                      ? 'bg-emerald-50 text-emerald-600 hover:bg-emerald-100'
                                      : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                        {{ $post->is_visible ? '👁 Tampil' : '🚫 Tersembunyi' }}
                    </button>
                </form>

                {{-- Link IG --}}
                <a href="{{ $post->permalink }}" target="_blank" rel="noopener"
                   title="Buka di Instagram"
                   class="p-1.5 rounded-lg text-slate-400 hover:text-pink-500 hover:bg-pink-50 transition">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z"/>
                    </svg>
                </a>

                {{-- Hapus --}}
                <form method="POST" action="{{ route('admin.instagram.destroy', $post) }}"
                      onsubmit="return confirm('Hapus dari cache lokal?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                            title="Hapus dari cache"
                            class="p-1.5 rounded-lg text-slate-400 hover:text-red-500 hover:bg-red-50 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </form>
            </div>

            {{-- Tanggal --}}
            <div class="px-2 pb-2 text-xs text-slate-400">
                {{ $post->timestamp->translatedFormat('d M Y') }}
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endif

@endsection
