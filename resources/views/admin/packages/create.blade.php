@extends('admin.layouts.app')

@section('title', 'Tambah Paket Pernikahan')
@section('subtitle', 'Buat paket pernikahan baru')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100">
            <h3 class="font-semibold text-slate-800">Form Tambah Paket Pernikahan</h3>
        </div>

        <form method="POST" action="{{ route('admin.packages.store') }}" class="p-6 space-y-5">
            @csrf

            {{-- Nama Paket --}}
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Nama Paket <span class="text-red-500">*</span>
                </label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                       placeholder="Contoh: Paket Gold, Paket Silver"
                       class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400
                              @error('name') border-red-400 @enderror">
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Harga --}}
            <div>
                <label for="price" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Harga (Rp) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-500 font-medium">Rp</span>
                    <input id="price" name="price" type="number" value="{{ old('price') }}"
                           placeholder="0" min="0" step="1000"
                           class="w-full rounded-xl border-slate-300 text-sm pl-10 focus:border-violet-400 focus:ring-violet-400
                                  @error('price') border-red-400 @enderror">
                </div>
                @error('price')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Deskripsi <span class="text-red-500">*</span>
                </label>
                <textarea id="description" name="description" rows="3"
                          placeholder="Deskripsi singkat mengenai paket ini..."
                          class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400
                                 @error('description') border-red-400 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Fasilitas --}}
            <div>
                <label for="facilities" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Fasilitas <span class="text-red-500">*</span>
                </label>
                <textarea id="facilities" name="facilities" rows="5"
                          placeholder="Tulis fasilitas, satu per baris:&#10;- Dekorasi pelaminan&#10;- Katering 500 pax&#10;- Dokumentasi foto & video"
                          class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400
                                 @error('facilities') border-red-400 @enderror">{{ old('facilities') }}</textarea>
                <p class="mt-1 text-xs text-slate-400">Tuliskan setiap fasilitas dalam satu baris.</p>
                @error('facilities')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                    class="bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
                    Simpan Paket
                </button>
                <a href="{{ route('admin.packages.index') }}"
                   class="text-sm text-slate-500 hover:text-slate-700 px-5 py-2.5 rounded-xl hover:bg-slate-100 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
