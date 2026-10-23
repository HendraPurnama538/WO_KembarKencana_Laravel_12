<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil admin.
     */
    public function show(): View
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        return view('admin.profile.show', compact('user'));
    }

    /**
     * Update data profil admin dan logo website.
     */
    public function update(Request $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
            'avatar'   => 'nullable|mimes:jpeg,png,jpg,webp,heic|max:2048',
            'app_logo' => 'nullable|mimes:jpeg,png,jpg,webp,svg,heic|max:4096',
        ]);

        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika bukan default
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Upload & ganti Logo Website
        if ($request->hasFile('app_logo')) {
            // Hapus logo lama di folder storage logo
            Storage::disk('public')->deleteDirectory('logo');

            // Simpan logo baru
            $request->file('app_logo')->store('logo', 'public');

            // Hapus cache agar logo baru langsung aktif di seluruh website
            \Illuminate\Support\Facades\Cache::forget('app_logo_url');
        }

        unset($validated['app_logo']);
        $user->update($validated);

        return redirect()->route('admin.profile.show')
            ->with('success', 'Profil dan Logo Website berhasil diperbarui!');
    }

    /**
     * Reset logo website kembali ke logo default.
     */
    public function resetLogo(): RedirectResponse
    {
        Storage::disk('public')->deleteDirectory('logo');
        \Illuminate\Support\Facades\Cache::forget('app_logo_url');

        return back()->with('success', 'Logo website berhasil dikembalikan ke logo default!');
    }
}
