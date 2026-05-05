<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Daftar semua user.
     */
    public function index(): View
    {
        $users = User::latest()->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Hapus user dari database.
     * Admin tidak bisa menghapus dirinya sendiri.
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus!');
    }
}
