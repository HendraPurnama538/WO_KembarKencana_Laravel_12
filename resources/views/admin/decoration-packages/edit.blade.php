@extends('admin.layouts.app')

@section('title', 'Edit Paket Dekorasi')
@section('subtitle', 'Perbarui detail paket dekorasi')

@section('content')

<div class="max-w-3xl">
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center gap-3">
            <a href="{{ route('admin.decoration-packages.index') }}"
               class="text-slate-400 hover:text-slate-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h3 class="font-semibold text-slate-800">Edit Paket: {{ $decorationPackage->name }}</h3>
        </div>

        <form method="POST"
              action="{{ route('admin.decoration-packages.update', $decorationPackage) }}"
              enctype="multipart/form-data"
              class="p-6 space-y-5">
            @csrf
            @method('PUT')

            {{-- Row 1: Nama Paket + Kategori --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Nama Paket --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Nama Paket <span class="text-red-500">*</span>
                    </label>
                    <input id="name" name="name" type="text"
                           value="{{ old('name', $decorationPackage->name) }}"
                           placeholder="cth: Dekorasi Pelaminan Premium"
                           class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400
                                  @error('name') border-red-400 @enderror">
                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div>
                    <label for="category" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select id="category" name="category"
                            class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400
                                   @error('category') border-red-400 @enderror">
                        <option value="">— Pilih Kategori —</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}"
                                {{ old('category', $decorationPackage->category) === $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Row 2: Tipe Lokasi + Harga --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Tipe Lokasi --}}
                <div>
                    <label for="location_type" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Tipe Lokasi
                    </label>
                    <select id="location_type" name="location_type"
                            class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400">
                        <option value="">— Pilih Tipe Lokasi —</option>
                        @foreach($locationTypes as $lt)
                            <option value="{{ $lt }}"
                                {{ old('location_type', $decorationPackage->location_type) === $lt ? 'selected' : '' }}>
                                {{ $lt }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Harga --}}
                <div>
                    <label for="price" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Harga (Rp) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-500 font-medium">Rp</span>
                        <input id="price" name="price" type="number"
                               value="{{ old('price', $decorationPackage->price) }}"
                               placeholder="0" min="0" step="1000"
                               class="w-full rounded-xl border-slate-300 text-sm pl-10 focus:border-violet-400 focus:ring-violet-400
                                      @error('price') border-red-400 @enderror">
                    </div>
                    @error('price')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Deskripsi
                </label>
                <textarea id="description" name="description" rows="3"
                          placeholder="Deskripsi singkat paket dekorasi ini..."
                          class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400
                                 @error('description') border-red-400 @enderror">{{ old('description', $decorationPackage->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Fasilitas --}}
            <div>
                <label for="facilities" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Fasilitas / Detail Paket
                </label>
                <textarea id="facilities" name="facilities" rows="6"
                          placeholder="Tuliskan setiap fasilitas dalam satu baris..."
                          class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400
                                 @error('facilities') border-red-400 @enderror">{{ old('facilities', $decorationPackage->facilities) }}</textarea>
                <p class="mt-1 text-xs text-slate-400">Satu baris = satu item fasilitas.</p>
                @error('facilities')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Upload / Ganti Gambar --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Foto Paket
                    <span class="text-slate-400 text-xs font-normal">(kosongkan jika tidak ingin mengganti)</span>
                </label>

                {{-- Gambar existing --}}
                @if($decorationPackage->image)
                <div id="current-image-section" class="mb-3 flex items-start gap-3">
                    <img src="{{ asset('storage/' . $decorationPackage->image) }}"
                         alt="{{ $decorationPackage->name }}"
                         id="current-img"
                         class="w-28 h-28 object-cover rounded-xl border border-slate-200 shadow-sm">
                    <div class="flex flex-col gap-2">
                        <p class="text-xs text-slate-500 font-medium">Foto saat ini</p>
                        <p class="text-xs text-slate-400">Upload baru di bawah untuk mengganti.</p>
                        <button type="button" onclick="konfirmasiHapusFoto()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors w-fit">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Foto
                        </button>
                    </div>
                </div>
                @endif

                <div class="flex items-start gap-4">
                    {{-- Preview gambar baru --}}
                    <div id="img-preview-wrap" class="hidden">
                        <img id="img-preview"
                             class="w-28 h-28 object-cover rounded-xl border border-violet-200 shadow-sm ring-2 ring-violet-300" alt="Preview baru">
                        <p class="text-xs text-violet-500 text-center mt-1">Gambar baru</p>
                    </div>

                    {{-- Input Area --}}
                    <label for="image"
                           class="flex-1 flex flex-col items-center justify-center gap-2 border-2 border-dashed border-slate-200
                                  rounded-xl p-5 cursor-pointer hover:border-violet-400 hover:bg-violet-50/30 transition-colors text-slate-400 text-sm">
                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Klik untuk pilih gambar baru</span>
                        <span class="text-xs text-slate-300">JPG, PNG, WEBP — maks. 3MB</span>
                        <input id="image" name="image" type="file"
                               accept="image/jpeg,image/png,image/jpg,image/webp"
                               class="sr-only" onchange="previewImage(this)">
                    </label>
                </div>
                @error('image')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Status <span class="text-red-500">*</span>
                </label>
                <div class="flex gap-4">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="active"
                               {{ old('status', $decorationPackage->status) === 'active' ? 'checked' : '' }}
                               class="accent-violet-600">
                        <span class="text-sm text-slate-700">
                            <span class="inline-flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 inline-block"></span>
                                Aktif
                            </span>
                        </span>
                    </label>
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="inactive"
                               {{ old('status', $decorationPackage->status) === 'inactive' ? 'checked' : '' }}
                               class="accent-violet-600">
                        <span class="text-sm text-slate-700">
                            <span class="inline-flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-red-400 inline-block"></span>
                                Nonaktif
                            </span>
                        </span>
                    </label>
                </div>
                <p class="mt-1 text-xs text-slate-400">Paket nonaktif tidak akan tampil di landing page.</p>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                <button type="submit"
                    class="bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.decoration-packages.index') }}"
                   class="text-sm text-slate-500 hover:text-slate-700 px-5 py-2.5 rounded-xl hover:bg-slate-100 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

{{-- Hidden form untuk hapus gambar --}}
@if(isset($decorationPackage) && $decorationPackage->image)
<form id="delete-image-form"
      method="POST"
      action="{{ route('admin.decoration-packages.delete-image', $decorationPackage) }}"
      style="display:none;">
    @csrf
    @method('DELETE')
</form>

{{-- Modal Konfirmasi Hapus Foto --}}
<div id="delete-image-modal"
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
                <h3 class="font-semibold text-slate-800 text-sm">Hapus Foto Paket</h3>
                <p class="text-xs text-slate-500 mt-0.5">Apakah Anda yakin ingin menghapus foto ini?</p>
            </div>
        </div>
        <p class="text-xs text-red-500 bg-red-50 rounded-lg px-3 py-2 mb-5">
            ⚠️ Foto akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.
        </p>
        <div class="flex gap-2 justify-end">
            <button type="button" onclick="tutupModalFoto()"
                class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-50 hover:bg-slate-100 rounded-xl transition-colors">
                Batal
            </button>
            <button type="button" onclick="document.getElementById('delete-image-form').submit()"
                class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-xl transition-colors">
                Ya, Hapus Foto
            </button>
        </div>
    </div>
</div>
@endif

<script>
function previewImage(input) {
    const wrap    = document.getElementById('img-preview-wrap');
    const preview = document.getElementById('img-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            wrap.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function konfirmasiHapusFoto() {
    const modal = document.getElementById('delete-image-modal');
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
}

function tutupModalFoto() {
    const modal = document.getElementById('delete-image-modal');
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}

// Tutup modal jika klik di luar
document.getElementById('delete-image-modal')?.addEventListener('click', function(e) {
    if (e.target === this) tutupModalFoto();
});
</script>

@endsection
