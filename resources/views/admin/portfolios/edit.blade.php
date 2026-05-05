@extends('admin.layouts.app')

@section('title', 'Edit Portofolio')
@section('subtitle', 'Perbarui detail dan gambar portofolio')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100">
            <h3 class="font-semibold text-slate-800">Edit Portofolio</h3>
        </div>

        <form method="POST" action="{{ route('admin.portfolios.update', $portfolio) }}"
              enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Judul Portofolio <span class="text-red-500">*</span>
                </label>
                <input id="title" name="title" type="text" value="{{ old('title', $portfolio->title) }}"
                       class="w-full rounded-xl border-slate-300 text-sm focus:border-rose-400 focus:ring-rose-400
                              @error('title') border-red-400 @enderror">
                @error('title')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Deskripsi <span class="text-red-500">*</span>
                </label>
                <textarea id="description" name="description" rows="4"
                          class="w-full rounded-xl border-slate-300 text-sm focus:border-rose-400 focus:ring-rose-400
                                 @error('description') border-red-400 @enderror">{{ old('description', $portfolio->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gambar Saat Ini --}}
            @if($portfolio->images->count() > 0)
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Gambar Saat Ini
                    <span class="text-xs text-slate-400 font-normal ml-1">(hover → centang untuk hapus)</span>
                </label>
                <div class="grid grid-cols-3 gap-2">
                    @foreach($portfolio->images as $img)
                    <div class="relative aspect-square rounded-xl overflow-hidden border border-slate-200 group">
                        <img src="{{ asset('storage/' . $img->image_path) }}" alt="Gambar {{ $loop->iteration }}"
                             class="w-full h-full object-cover">
                        <label class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center cursor-pointer gap-1">
                            <input type="checkbox" name="delete_images[]" value="{{ $img->id }}"
                                   class="w-5 h-5 accent-rose-500">
                            <span class="text-white text-xs font-medium bg-red-500 rounded px-1.5 py-0.5">Hapus</span>
                        </label>
                        <span class="absolute bottom-1 left-1 bg-black/50 text-white text-xs px-1.5 py-0.5 rounded">{{ $loop->iteration }}</span>
                    </div>
                    @endforeach
                </div>
                <p class="text-xs text-slate-400 mt-1.5">Hover gambar → centang untuk menandai hapus, lalu klik Simpan.</p>
            </div>
            @endif

            {{-- Tambah Gambar Baru --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">
                    Tambah Gambar Baru
                    <span class="text-xs text-slate-400 font-normal ml-1">(opsional, bisa beberapa sekaligus)</span>
                </label>

                {{-- Preview baru --}}
                <div id="preview-grid" class="grid grid-cols-3 gap-2 mb-3"></div>

                {{-- Counter --}}
                <p id="img-count-label" class="text-xs text-slate-500 mb-2 hidden">
                    <span id="img-count">0</span> gambar baru dipilih
                </p>

                <label for="images"
                    class="flex flex-col items-center justify-center w-full h-28 border-2 border-dashed border-slate-300
                           rounded-xl cursor-pointer hover:border-rose-400 hover:bg-rose-50/50 transition-colors">
                    <svg class="w-6 h-6 text-slate-400 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <p class="text-sm text-slate-500">Upload gambar baru (opsional)</p>
                    <p class="text-xs text-slate-400">JPG, PNG, WEBP — Max 3MB per gambar</p>
                    <input id="images" name="images[]" type="file"
                           accept="image/jpeg,image/png,image/jpg,image/webp" class="hidden" multiple>
                </label>
                @error('images.*')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                    class="bg-rose-500 hover:bg-rose-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.portfolios.index') }}"
                   class="text-sm text-slate-500 hover:text-slate-700 px-5 py-2.5 rounded-xl hover:bg-slate-100 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
(function () {
    let selectedFiles = [];

    const inputEl   = document.getElementById('images');
    const gridEl    = document.getElementById('preview-grid');
    const countEl   = document.getElementById('img-count');
    const labelEl   = document.getElementById('img-count-label');

    inputEl.addEventListener('change', function () {
        Array.from(this.files).forEach(file => {
            const isDup = selectedFiles.some(f => f.name === file.name && f.size === file.size);
            if (!isDup) selectedFiles.push(file);
        });
        this.value = '';
        syncFilesToInput();
        renderPreviews();
    });

    function removeFile(index) {
        selectedFiles.splice(index, 1);
        syncFilesToInput();
        renderPreviews();
    }

    function renderPreviews() {
        gridEl.innerHTML = '';

        if (selectedFiles.length === 0) {
            labelEl.classList.add('hidden');
            return;
        }

        labelEl.classList.remove('hidden');
        countEl.textContent = selectedFiles.length;

        selectedFiles.forEach((file, idx) => {
            const reader = new FileReader();
            reader.onload = e => {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative aspect-square rounded-xl overflow-hidden border border-slate-200 group';
                wrapper.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <button type="button"
                            onclick="removeNewPreview(${idx})"
                            class="bg-red-500 hover:bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm font-bold shadow transition-colors"
                            title="Hapus gambar ini">
                            ✕
                        </button>
                    </div>
                    <span class="absolute bottom-1 left-1 bg-black/50 text-white text-xs px-1.5 py-0.5 rounded">Baru ${idx + 1}</span>
                `;
                gridEl.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }

    function syncFilesToInput() {
        const dt = new DataTransfer();
        selectedFiles.forEach(f => dt.items.add(f));
        inputEl.files = dt.files;
    }

    window.removeNewPreview = function (idx) {
        removeFile(idx);
    };
})();
</script>

@endsection
