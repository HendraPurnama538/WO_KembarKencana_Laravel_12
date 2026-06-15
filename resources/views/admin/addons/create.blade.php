@extends('admin.layouts.app')

@section('title', 'Tambah Add-on')
@section('subtitle', 'Tambah add-on baru untuk kalkulator estimasi')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center gap-3">
            <a href="{{ route('admin.addons.index') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h3 class="font-semibold text-slate-800">Form Tambah Add-on</h3>
        </div>

        <form method="POST" action="{{ route('admin.addons.store') }}" class="p-6 space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Nama Add-on <span class="text-red-500">*</span>
                </label>
                <input id="name" name="name" type="text" value="{{ old('name') }}"
                       placeholder="cth: Tenda Dekorasi 10×20 Meter"
                       class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400 @error('name') border-red-400 @enderror">
                @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- Kategori + Satuan --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="category" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select id="category" name="category"
                            class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400 @error('category') border-red-400 @enderror">
                        <option value="">— Pilih Kategori —</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="unit" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Satuan <span class="text-red-500">*</span>
                    </label>
                    <select id="unit" name="unit"
                            class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400 @error('unit') border-red-400 @enderror">
                        <option value="">— Pilih Satuan —</option>
                        @foreach($units as $u)
                            <option value="{{ $u }}" {{ old('unit') === $u ? 'selected' : '' }}>{{ $u }}</option>
                        @endforeach
                    </select>
                    @error('unit')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Harga --}}
            <div>
                <label for="price" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Harga per Satuan (Rp) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-500 font-medium">Rp</span>
                    <input id="price" name="price" type="number" value="{{ old('price') }}"
                           placeholder="0" min="0" step="1000"
                           class="w-full rounded-xl border-slate-300 text-sm pl-10 focus:border-violet-400 focus:ring-violet-400 @error('price') border-red-400 @enderror">
                </div>
                <p class="mt-1 text-xs text-slate-400">Harga ini digunakan sebagai acuan kalkulator estimasi.</p>
                @error('price')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Deskripsi <span class="text-slate-400 text-xs font-normal">(opsional)</span>
                </label>
                <textarea id="description" name="description" rows="3"
                          placeholder="Informasi tambahan mengenai add-on ini..."
                          class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400">{{ old('description') }}</textarea>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Status <span class="text-red-500">*</span></label>
                <div class="flex gap-4">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="active" {{ old('status','active') === 'active' ? 'checked' : '' }} class="accent-violet-600">
                        <span class="text-sm text-slate-700 inline-flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Aktif
                        </span>
                    </label>
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="inactive" {{ old('status') === 'inactive' ? 'checked' : '' }} class="accent-violet-600">
                        <span class="text-sm text-slate-700 inline-flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-red-400"></span> Nonaktif
                        </span>
                    </label>
                </div>
                <p class="mt-1 text-xs text-slate-400">Add-on nonaktif tidak akan muncul di kalkulator estimasi.</p>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                <button type="submit" class="bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
                    Simpan Add-on
                </button>
                <a href="{{ route('admin.addons.index') }}" class="text-sm text-slate-500 hover:text-slate-700 px-5 py-2.5 rounded-xl hover:bg-slate-100 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
