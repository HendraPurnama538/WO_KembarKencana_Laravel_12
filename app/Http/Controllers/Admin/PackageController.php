<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    /**
     * Daftar semua paket pernikahan.
     */
    public function index(): View
    {
        $packages = Package::latest()->paginate(10);

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Form tambah paket baru.
     */
    public function create(): View
    {
        return view('admin.packages.create');
    }

    /**
     * Simpan paket baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'facilities'  => 'required|string',
        ]);

        Package::create($validated);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket pernikahan berhasil ditambahkan!');
    }

    /**
     * Form edit paket.
     */
    public function edit(Package $package): View
    {
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update paket di database.
     */
    public function update(Request $request, Package $package): RedirectResponse
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'required|string',
            'facilities'  => 'required|string',
        ]);

        $package->update($validated);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket pernikahan berhasil diperbarui!');
    }

    /**
     * Hapus paket dari database.
     */
    public function destroy(Package $package): RedirectResponse
    {
        $package->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket pernikahan berhasil dihapus!');
    }
}
