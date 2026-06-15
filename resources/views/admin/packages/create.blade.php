@extends('admin.layouts.app')

@section('title', 'Tambah Paket Pernikahan')
@section('subtitle', 'Buat paket pernikahan baru')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100">
            <h3 class="font-semibold text-slate-800">Form Tambah Paket Pernikahan</h3>
        </div>

        <form method="POST" action="{{ route('admin.packages.store') }}" class="p-6 space-y-5" id="pkg-form">
            @csrf

            {{-- Batch + Nama --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="batch" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Batch <span class="text-red-500">*</span>
                    </label>
                    <select id="batch" name="batch"
                            class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400 @error('batch') border-red-400 @enderror">
                        @foreach([1,2,3,4] as $b)
                            <option value="{{ $b }}" {{ old('batch', 1) == $b ? 'selected' : '' }}>Batch {{ $b }}</option>
                        @endforeach
                    </select>
                    @error('batch')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Nama Paket <span class="text-red-500">*</span>
                    </label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                           placeholder="cth: Silver Package"
                           class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400 @error('name') border-red-400 @enderror">
                    @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>

            {{-- Harga + Pax --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Harga (Rp) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-sm text-slate-500 font-medium">Rp</span>
                        <input id="price" name="price" type="number" value="{{ old('price') }}"
                               placeholder="0" min="0" step="1000"
                               class="w-full rounded-xl border-slate-300 text-sm pl-10 focus:border-violet-400 focus:ring-violet-400 @error('price') border-red-400 @enderror">
                    </div>
                    @error('price')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="pax" class="block text-sm font-medium text-slate-700 mb-1.5">Jumlah Pax</label>
                    <input id="pax" name="pax" type="number" value="{{ old('pax') }}"
                           placeholder="cth: 500" min="1"
                           class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400">
                </div>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1.5">Deskripsi <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="3"
                          placeholder="Deskripsi singkat paket ini..."
                          class="w-full rounded-xl border-slate-300 text-sm focus:border-violet-400 focus:ring-violet-400 @error('description') border-red-400 @enderror">{{ old('description') }}</textarea>
                @error('description')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            {{-- =====================================================
                 FASILITAS (Dynamic Category + Items Builder)
                 ===================================================== --}}
            <div>
                <div class="flex items-center justify-between mb-4">
                    <label class="block text-sm font-medium text-slate-700">
                        Fasilitas <span class="text-red-500">*</span>
                    </label>
                    <button type="button" id="btn-add-category"
                            class="group inline-flex items-center gap-2 text-sm font-semibold text-violet-700 bg-violet-50 hover:bg-violet-600 hover:text-white border border-violet-200 hover:border-violet-600 rounded-xl px-4 py-2 transition-all active:scale-95 shadow-sm">
                        <div class="flex items-center justify-center w-5 h-5 rounded-md bg-white text-violet-600 group-hover:bg-violet-500 group-hover:text-white transition-colors shadow-sm">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        </div>
                        Tambah Kategori
                    </button>
                </div>

                {{-- Preset kategori cepat --}}
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach(['MUA','Dekorasi','Dokumentasi','Catering','MC','Music','Wedding Organizer','Bonus'] as $preset)
                    <button type="button" onclick="addCategoryWithName('{{ $preset }}')"
                            class="inline-flex items-center gap-1.5 text-xs px-3 py-1.5 bg-white hover:bg-slate-50 text-slate-600 hover:text-violet-700 font-medium rounded-lg border border-slate-200 shadow-sm transition-all active:scale-95">
                        <span class="text-violet-400 font-bold">+</span> {{ $preset }}
                    </button>
                    @endforeach
                </div>

                {{-- Category list container --}}
                <div id="categories-container" class="space-y-3">
                    {{-- JS renders categories here --}}
                </div>

                <p id="no-category-hint" class="text-xs text-slate-400 italic mt-2">
                    Klik "Tambah Kategori" atau pilih preset di atas untuk mulai menambah fasilitas.
                </p>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Status <span class="text-red-500">*</span></label>
                <div class="flex gap-4">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="active" {{ old('status','active') === 'active' ? 'checked' : '' }} class="accent-violet-600">
                        <span class="text-sm text-slate-700 inline-flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Aktif</span>
                    </label>
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="status" value="inactive" {{ old('status') === 'inactive' ? 'checked' : '' }} class="accent-violet-600">
                        <span class="text-sm text-slate-700 inline-flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-red-400"></span> Nonaktif</span>
                    </label>
                </div>
                <p class="mt-1 text-xs text-slate-400">Paket nonaktif tidak tampil di landing page.</p>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                <button type="submit" class="bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
                    Simpan Paket
                </button>
                <a href="{{ route('admin.packages.index') }}" class="text-sm text-slate-500 hover:text-slate-700 px-5 py-2.5 rounded-xl hover:bg-slate-100 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

{{-- ── Pre-fill data from old() on validation error ── --}}
<script id="old-facilities-json" type="application/json">
@php
    // Rebuild JSON from old() input arrays on validation error
    $oldCats  = old('fac_category', []);
    $oldItems = old('fac_items', []);
    $oldJson  = [];
    foreach ($oldCats as $idx => $cat) {
        if (trim($cat) === '') continue;
        $items = array_values(array_filter(array_map('trim', $oldItems[$idx] ?? []), fn($v) => $v !== ''));
        $oldJson[] = ['category' => trim($cat), 'items' => $items];
    }
    echo json_encode($oldJson, JSON_UNESCAPED_UNICODE);
@endphp
</script>

@push('scripts')
<script>
(function () {
    const container   = document.getElementById('categories-container');
    const hint        = document.getElementById('no-category-hint');
    const btnAddCat   = document.getElementById('btn-add-category');
    let   catIndex    = 0;

    // ── Render helpers ──────────────────────────────────────────────────────

    function updateHint() {
        hint.style.display = container.children.length === 0 ? '' : 'none';
    }

    function createCategoryBlock(name = '', items = []) {
        const idx  = catIndex++;
        const wrap = document.createElement('div');
        wrap.className    = 'category-block border border-slate-200 rounded-xl bg-white shadow-sm overflow-hidden mb-4';
        wrap.dataset.idx  = idx;

        wrap.innerHTML = `
        <div class="flex items-center gap-3 bg-slate-50/80 px-4 py-3 border-b border-slate-100">
            <div class="p-1.5 bg-violet-100 text-violet-600 rounded-lg">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </div>
            <input type="text"
                   name="fac_category[${idx}]"
                   value="${escHtml(name)}"
                   placeholder="Nama Kategori (mis: Dekorasi)"
                   class="flex-1 bg-transparent border-none text-base font-semibold text-slate-800 focus:outline-none focus:ring-0 p-0 placeholder-slate-300"
                   required>
            <button type="button" class="btn-del-cat ml-auto p-1.5 text-slate-400 hover:bg-red-50 hover:text-red-500 rounded-lg transition-colors" title="Hapus kategori ini">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="items-list px-4 py-3 space-y-2" data-idx="${idx}"></div>
        <div class="px-4 pb-4">
            <button type="button" class="btn-add-item group flex items-center justify-center w-full gap-2 text-xs text-slate-500 hover:text-violet-600 bg-slate-50/50 hover:bg-violet-50 border border-dashed border-slate-300 hover:border-violet-300 rounded-lg px-3 py-2 font-medium transition-all" data-idx="${idx}">
                <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Tambah Item
            </button>
        </div>`;

        // Delete category
        wrap.querySelector('.btn-del-cat').addEventListener('click', () => {
            wrap.remove();
            updateHint();
        });

        // Add item button
        wrap.querySelector('.btn-add-item').addEventListener('click', () => {
            addItem(wrap.querySelector('.items-list'), idx, '');
        });

        // Pre-fill items
        const itemList = wrap.querySelector('.items-list');
        items.forEach(item => addItem(itemList, idx, item));

        return wrap;
    }

    function addItem(listEl, catIdx, value = '') {
        const row = document.createElement('div');
        row.className = 'flex items-center gap-2';
        row.innerHTML = `
            <div class="flex items-center justify-center w-5 h-5 rounded-full bg-slate-100 text-slate-400 flex-shrink-0">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <input type="text"
                   name="fac_items[${catIdx}][]"
                   value="${escHtml(value)}"
                   placeholder="Item fasilitas..."
                   class="flex-1 text-sm border-0 border-b border-dashed border-slate-200 bg-transparent px-2 py-1 focus:border-violet-400 focus:ring-0 outline-none transition-colors">
            <button type="button" class="btn-del-item p-1 text-slate-300 hover:bg-red-50 hover:text-red-500 rounded-md transition-colors flex-shrink-0" title="Hapus item">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>`;
        row.querySelector('.btn-del-item').addEventListener('click', () => row.remove());
        listEl.appendChild(row);
    }

    function escHtml(str) {
        return String(str).replace(/&/g,'&amp;').replace(/"/g,'&quot;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    // ── Public helpers (called by preset buttons) ───────────────────────────
    window.addCategoryWithName = function(name) {
        const block = createCategoryBlock(name, []);
        container.appendChild(block);
        updateHint();
        // Focus the first item input or add one
        const addItemBtn = block.querySelector('.btn-add-item');
        if (addItemBtn) addItemBtn.click();
    };

    // ── Btn: Add blank category ─────────────────────────────────────────────
    btnAddCat.addEventListener('click', () => {
        container.appendChild(createCategoryBlock('', []));
        updateHint();
    });

    // ── Pre-fill from old() on validation error ─────────────────────────────
    const oldDataEl = document.getElementById('old-facilities-json');
    if (oldDataEl) {
        try {
            const oldData = JSON.parse(oldDataEl.textContent.trim());
            oldData.forEach(group => {
                container.appendChild(createCategoryBlock(group.category, group.items));
            });
        } catch (e) {}
    }
    updateHint();

})();
</script>
@endpush
@endsection
