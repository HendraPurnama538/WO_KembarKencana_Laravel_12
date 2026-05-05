@extends('admin.layouts.app')

@section('title', 'Pengaturan Keamanan')
@section('subtitle', 'Ganti password akun Anda')

@section('content')

<div class="max-w-md">
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        {{-- Header --}}
        <div class="px-6 py-4 border-b border-slate-100 flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-slate-100 flex items-center justify-center">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-slate-800">Ganti Password</h3>
                <p class="text-xs text-slate-400">Pastikan password baru minimal 8 karakter</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.security.update') }}" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            {{-- Password Lama --}}
            <div>
                <label for="current_password" class="block text-sm font-medium text-slate-700 mb-1.5">
                    Password Lama <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input id="current_password" name="current_password" type="password"
                           placeholder="Masukkan password lama"
                           class="w-full rounded-xl border-slate-300 text-sm pr-10 focus:border-slate-400 focus:ring-slate-400
                                  @error('current_password') border-red-400 @enderror">
                    <button type="button" onclick="togglePassword('current_password', this)"
                        class="absolute inset-y-0 right-0 px-3 text-slate-400 hover:text-slate-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
                @error('current_password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="border-t border-slate-100 pt-4">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wide mb-4">Password Baru</p>

                {{-- Password Baru --}}
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Password Baru <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="password" name="password" type="password"
                               placeholder="Minimal 8 karakter"
                               class="w-full rounded-xl border-slate-300 text-sm pr-10 focus:border-rose-400 focus:ring-rose-400
                                      @error('password') border-red-400 @enderror">
                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute inset-y-0 right-0 px-3 text-slate-400 hover:text-slate-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password Baru --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Konfirmasi Password Baru <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password"
                               placeholder="Ulangi password baru"
                               class="w-full rounded-xl border-slate-300 text-sm pr-10 focus:border-rose-400 focus:ring-rose-400
                                      @error('password_confirmation') border-red-400 @enderror">
                        <button type="button" onclick="togglePassword('password_confirmation', this)"
                            class="absolute inset-y-0 right-0 px-3 text-slate-400 hover:text-slate-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Requirement hints --}}
            <div class="bg-slate-50 rounded-xl px-4 py-3 text-xs text-slate-500 space-y-1">
                <p class="font-semibold text-slate-600 mb-1">Persyaratan password:</p>
                <p>✓ Minimal 8 karakter</p>
                <p>✓ Password baru harus dikonfirmasi</p>
                <p>✓ Password lama diperlukan untuk verifikasi</p>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-1">
                <button type="submit"
                    class="bg-slate-900 hover:bg-slate-800 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-colors">
                    Ganti Password
                </button>
                <a href="{{ route('admin.profile.show') }}"
                   class="text-sm text-slate-500 hover:text-slate-700 px-5 py-2.5 rounded-xl hover:bg-slate-100 transition-colors">
                    ← Kembali ke Profil
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        btn.style.opacity = isPassword ? '1' : '0.5';
    }
</script>

@endsection
