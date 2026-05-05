@extends('admin.layouts.app')

@section('title', 'Manajemen User')
@section('subtitle', 'Daftar semua pengguna terdaftar')

@section('content')

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
        <div>
            <h3 class="font-semibold text-slate-800">Daftar User</h3>
            <p class="text-xs text-slate-400 mt-0.5">Total: {{ $users->total() }} pengguna terdaftar</p>
        </div>
    </div>

    @if($users->isEmpty())
        <div class="py-16 text-center text-slate-400">
            <svg class="w-12 h-12 mx-auto mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            <p class="text-sm">Belum ada user terdaftar.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide">
                        <th class="px-5 py-3 text-left font-semibold">#</th>
                        <th class="px-5 py-3 text-left font-semibold">User</th>
                        <th class="px-5 py-3 text-left font-semibold">Email</th>
                        <th class="px-5 py-3 text-left font-semibold">Role</th>
                        <th class="px-5 py-3 text-left font-semibold">Bergabung</th>
                        <th class="px-5 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($users as $user)
                    <tr class="hover:bg-slate-50/70 transition-colors
                               {{ $user->id === auth()->id() ? 'bg-amber-50/50' : '' }}">
                        <td class="px-5 py-3 text-slate-400 font-mono text-xs">
                            {{ $users->firstItem() + $loop->index }}
                        </td>
                        <td class="px-5 py-3">
                            <div class="flex items-center gap-3">
                                @if($user->avatar)
                                    <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                                         class="w-8 h-8 rounded-full object-cover">
                                @else
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-rose-400 to-pink-600
                                                flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-medium text-slate-800">{{ $user->name }}</p>
                                    @if($user->id === auth()->id())
                                        <p class="text-xs text-amber-500">(Anda)</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-3 text-slate-500">{{ $user->email }}</td>
                        <td class="px-5 py-3">
                            @if($user->role === 'admin')
                                <span class="badge-admin inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold">
                                    Admin
                                </span>
                            @else
                                <span class="badge-user inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold">
                                    User
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-3 text-slate-400 text-xs whitespace-nowrap">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                        <td class="px-5 py-3 text-center">
                            @if($user->id !== auth()->id())
                                <button type="button"
                                    onclick="hapusData('{{ route('admin.users.destroy', $user) }}', 'Hapus user &ldquo;{{ addslashes($user->name) }}&rdquo;?')"
                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors">
                                    Hapus
                                </button>
                            @else
                                <span class="text-xs text-slate-300 italic">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="px-5 py-4 border-t border-slate-100">
                {{ $users->links() }}
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
                class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors">
                Batal
            </button>
            <button type="button" onclick="eksekusiHapus()"
                class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-xl transition-colors">
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

    document.getElementById('confirm-modal').addEventListener('click', function(e) {
        if (e.target === this) tutupModal();
    });
</script>

@endsection
