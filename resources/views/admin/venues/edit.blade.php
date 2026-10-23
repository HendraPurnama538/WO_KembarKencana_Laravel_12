@extends('admin.layouts.app')

@section('title', 'Edit Venue')
@section('subtitle', 'Perbarui data venue pernikahan')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        {{-- Card Header --}}
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.venues.index') }}"
                   class="w-8 h-8 rounded-lg bg-slate-50 hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition-colors"
                   title="Kembali ke daftar venue">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h3 class="font-semibold text-slate-800 text-base">Edit Venue — {{ $venue->name }}</h3>
                    <p class="text-xs text-slate-400">Perbarui data informasi venue pernikahan</p>
                </div>
            </div>
            @if($venue->status === 'active')
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Nonaktif
                </span>
            @endif
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('admin.venues.update', $venue) }}" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            {{-- Nama Venue --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="name">
                    Nama Venue <span class="text-rose-500">*</span>
                </label>
                <input type="text" id="name" name="name" value="{{ old('name', $venue->name) }}" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-100 transition-all @error('name') border-red-400 @enderror"
                       placeholder="cth: Grand Ballroom Hotel XYZ">
                @error('name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="address">
                    Alamat / Lokasi
                </label>
                <input type="text" id="address" name="address" value="{{ old('address', $venue->address) }}"
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-100 transition-all @error('address') border-red-400 @enderror"
                       placeholder="cth: Jl. Merdeka No. 1, Kota Baru">
                @error('address')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kapasitas & Info Harga --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5" for="capacity">
                        Kapasitas (Pax)
                    </label>
                    <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $venue->capacity) }}" min="1"
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-100 transition-all @error('capacity') border-red-400 @enderror"
                           placeholder="cth: 500">
                    @error('capacity')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5" for="price_info">
                        Info Harga / Keterangan Biaya
                    </label>
                    <input type="text" id="price_info" name="price_info" value="{{ old('price_info', $venue->price_info) }}"
                           class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-100 transition-all @error('price_info') border-red-400 @enderror"
                           placeholder="cth: Sudah termasuk / Rp 15.000.000">
                    @error('price_info')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5" for="description">
                    Deskripsi &amp; Fasilitas Venue <span class="text-slate-400 text-xs font-normal">(opsional)</span>
                </label>
                <textarea id="description" name="description" rows="3"
                          class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-violet-500 focus:ring-2 focus:ring-violet-100 transition-all resize-none"
                          placeholder="Fasilitas AC, sound system standar gedung, ruang rias VIP...">{{ old('description', $venue->description) }}</textarea>
                @error('description')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Foto Venue --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Foto Venue
                    <span class="text-slate-400 text-xs font-normal">(kosongkan jika tidak ingin mengganti)</span>
                </label>

                @if($venue->image)
                    <div class="mb-3 flex items-center gap-3 p-3 bg-slate-50 border border-slate-200 rounded-xl">
                        <img src="{{ $venue->image_url }}" alt="{{ $venue->name }}"
                             class="w-16 h-16 rounded-lg object-cover border border-slate-200 shadow-xs flex-shrink-0">
                        <div class="text-xs text-slate-500 min-w-0">
                            <p class="font-semibold text-slate-700">Foto Saat Ini</p>
                            <p class="text-slate-400 mt-0.5">Pilih file baru di bawah jika ingin mengganti foto ini.</p>
                        </div>
                    </div>
                @endif

                <div class="flex items-start gap-4">
                    <div id="img-preview-wrap" class="hidden flex-shrink-0">
                        <div class="w-16 h-16 rounded-lg overflow-hidden border-2 border-violet-400 shadow-xs">
                            <img id="img-preview" src="" alt="Preview" class="w-full h-full object-cover">
                        </div>
                        <p class="text-[11px] text-violet-600 font-medium text-center mt-1">Foto Baru</p>
                    </div>

                    <label for="image"
                           class="flex-1 flex flex-col items-center justify-center gap-1.5 border-2 border-dashed border-slate-200 hover:border-violet-400 hover:bg-violet-50/20 rounded-xl p-4 cursor-pointer transition-colors text-center group bg-white">
                        <svg class="w-6 h-6 text-slate-400 group-hover:text-violet-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-xs font-semibold text-slate-700 group-hover:text-violet-600 transition-colors">
                            Pilih Foto Venue Baru
                        </span>
                        <span class="text-[11px] text-slate-400">Format: JPG, PNG, WEBP &bull; Maks. 2MB</span>
                        <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/webp"
                               class="sr-only" onchange="previewVenueImage(this)">
                    </label>
                </div>
                @error('image')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Status Venue <span class="text-rose-500">*</span>
                </label>
                <div class="grid grid-cols-2 gap-3 max-w-md">
                    <label class="relative flex items-center gap-3 p-3 rounded-xl border cursor-pointer transition-all has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-50/60 has-[:checked]:ring-1 has-[:checked]:ring-emerald-500 border-slate-200 bg-white hover:border-slate-300">
                        <input type="radio" name="status" value="active" {{ old('status', $venue->status) === 'active' ? 'checked' : '' }}
                               class="w-4 h-4 text-emerald-600 focus:ring-emerald-500 border-slate-300">
                        <div>
                            <div class="text-xs sm:text-sm font-semibold text-slate-800 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Aktif
                            </div>
                            <p class="text-[11px] text-slate-400">Tampil di publik</p>
                        </div>
                    </label>

                    <label class="relative flex items-center gap-3 p-3 rounded-xl border cursor-pointer transition-all has-[:checked]:border-rose-400 has-[:checked]:bg-rose-50/60 has-[:checked]:ring-1 has-[:checked]:ring-rose-400 border-slate-200 bg-white hover:border-slate-300">
                        <input type="radio" name="status" value="inactive" {{ old('status', $venue->status) === 'inactive' ? 'checked' : '' }}
                               class="w-4 h-4 text-rose-600 focus:ring-rose-500 border-slate-300">
                        <div>
                            <div class="text-xs sm:text-sm font-semibold text-slate-800 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-slate-400"></span> Nonaktif
                            </div>
                            <p class="text-[11px] text-slate-400">Disembunyikan</p>
                        </div>
                    </label>
                </div>
                @error('status')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold px-6 py-2.5 rounded-xl shadow-xs hover:shadow-sm transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.venues.index') }}"
                   class="inline-flex items-center justify-center text-sm font-medium text-slate-500 hover:text-slate-700 bg-slate-50 hover:bg-slate-100 px-5 py-2.5 rounded-xl transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewVenueImage(input) {
    const wrap = document.getElementById('img-preview-wrap');
    const preview = document.getElementById('img-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            wrap.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        wrap.classList.add('hidden');
    }
}
</script>
@endpush

@endsection
