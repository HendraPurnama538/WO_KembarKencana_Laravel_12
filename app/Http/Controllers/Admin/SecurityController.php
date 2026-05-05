<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SecurityController extends Controller
{
    /**
     * Tampilkan form ganti password.
     */
    public function showChangePassword(): View
    {
        return view('admin.security.change-password');
    }

    /**
     * Proses ganti password admin.
     */
    public function changePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password'      => 'required|string',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string',
        ]);

        $user = auth()->user();

        // Verifikasi password lama
        if (! Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors(['current_password' => 'Password lama tidak sesuai.'])
                ->withInput();
        }

        // Update password (akan otomatis di-hash via cast model)
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.security.show')
            ->with('success', 'Password berhasil diperbarui!');
    }
}
