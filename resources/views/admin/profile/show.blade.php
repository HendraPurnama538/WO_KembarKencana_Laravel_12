@extends('admin.layouts.app')

@section('title', 'Profil Admin')
@section('subtitle', 'Kelola informasi profil Anda')

@section('content')

<div class="max-w-2xl space-y-5">

    {{-- Profile Card --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="h-24 bg-gradient-to-r from-rose-400 via-pink-500 to-fuchsia-500"></div>
        <div class="px-6 pb-6">
            <div class="flex items-end gap-4 -mt-10 mb-5">
                {{-- Avatar --}}
                <div class="relative group">
                    @if($user->avatar)
                        <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                             class="w-20 h-20 rounded-2xl object-cover border-4 border-white shadow-lg">
                    @else
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-rose-400 to-pink-600
                                    flex items-center justify-center text-white text-3xl font-bold border-4 border-white shadow-lg">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="pb-1">
                    <h2 class="text-lg font-bold text-slate-900">{{ $user->name }}</h2>
                    <p class="text-sm text-slate-500">{{ $user->email }}</p>
                    <span class="badge-admin inline-flex mt-1 px-2.5 py-0.5 rounded-lg text-xs font-semibold">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Form --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100">
            <h3 class="font-semibold text-slate-800">Edit Informasi Profil</h3>
        </div>

        <form method="POST" action="{{ route('admin.profile.update') }}"
              enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                       class="w-full rounded-xl border-slate-300 text-sm focus:border-rose-400 focus:ring-rose-400
                              @error('name') border-red-400 @enderror">
                @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Email <span class="text-red-500">*</span>
                </label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                       class="w-full rounded-xl border-slate-300 text-sm focus:border-rose-400 focus:ring-rose-400
                              @error('email') border-red-400 @enderror">
                @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Avatar --}}
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Foto Profil</label>
                @if($user->avatar)
                    <div class="mb-3 flex items-center gap-3">
                        <img id="avatar-preview" src="{{ Storage::url($user->avatar) }}" alt="Avatar"
                             class="w-16 h-16 rounded-xl object-cover border border-slate-200">
                        <p class="text-xs text-slate-400">Foto saat ini. Upload baru untuk mengganti.</p>
                    </div>
                @else
                    <div class="mb-3">
                        <div id="avatar-preview-container" class="hidden mb-3">
                            <img id="avatar-preview" src="" alt="Preview"
                                 class="w-16 h-16 rounded-xl object-cover border border-slate-200">
                        </div>
                    </div>
                @endif

                <label for="avatar"
                    class="flex items-center gap-3 w-full px-4 py-3 border-2 border-dashed border-slate-300
                           rounded-xl cursor-pointer hover:border-rose-400 hover:bg-rose-50/50 transition-colors">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <div>
                        <p class="text-sm text-slate-500">Klik untuk upload foto profil</p>
                        <p class="text-xs text-slate-400">JPG, PNG, WEBP — Max 2MB</p>
                    </div>
                    <input id="avatar" name="avatar" type="file"
                           accept="image/jpeg,image/png,image/jpg,image/webp" class="hidden">
                </label>
                @error('avatar')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                    class="bg-rose-500 hover:bg-rose-600 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.security.show') }}"
                   class="text-sm text-slate-500 hover:text-slate-700 px-5 py-2.5 rounded-xl hover:bg-slate-100 transition-colors">
                    Ganti Password →
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('avatar').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const img = document.getElementById('avatar-preview');
            if (img) {
                img.src = e.target.result;
            }
            const container = document.getElementById('avatar-preview-container');
            if (container) container.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    });
</script>

@endsection
