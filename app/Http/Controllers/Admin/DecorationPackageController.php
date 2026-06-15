<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DecorationPackage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DecorationPackageController extends Controller
{
    /**
     * Daftar semua paket dekorasi.
     */
    public function index(): View
    {
        $packages = DecorationPackage::latest()->paginate(15);

        return view('admin.decoration-packages.index', compact('packages'));
    }

    /**
     * Form tambah paket dekorasi baru.
     */
    public function create(): View
    {
        $categories    = DecorationPackage::CATEGORIES;
        $locationTypes = DecorationPackage::LOCATION_TYPES;

        return view('admin.decoration-packages.create', compact('categories', 'locationTypes'));
    }

    /**
     * Simpan paket dekorasi baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|string|max:100',
            'location_type' => 'nullable|string|max:100',
            'price'         => 'required|numeric|min:0',
            'description'   => 'nullable|string',
            'facilities'    => 'nullable|string',
            'image'         => 'nullable|mimes:jpeg,png,jpg,webp,heic|max:3072',
            'status'        => 'required|in:active,inactive',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('decoration-packages', 'public');
        }

        DecorationPackage::create($validated);

        return redirect()->route('admin.decoration-packages.index')
            ->with('success', 'Paket dekorasi berhasil ditambahkan!');
    }

    /**
     * Form edit paket dekorasi.
     */
    public function edit(DecorationPackage $decorationPackage): View
    {
        $categories    = DecorationPackage::CATEGORIES;
        $locationTypes = DecorationPackage::LOCATION_TYPES;

        return view('admin.decoration-packages.edit', compact('decorationPackage', 'categories', 'locationTypes'));
    }

    /**
     * Update paket dekorasi di database.
     */
    public function update(Request $request, DecorationPackage $decorationPackage): RedirectResponse
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|string|max:100',
            'location_type' => 'nullable|string|max:100',
            'price'         => 'required|numeric|min:0',
            'description'   => 'nullable|string',
            'facilities'    => 'nullable|string',
            'image'         => 'nullable|mimes:jpeg,png,jpg,webp,heic|max:3072',
            'status'        => 'required|in:active,inactive',
        ]);

        // Ganti gambar jika ada upload baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
            if ($decorationPackage->image) {
                Storage::disk('public')->delete($decorationPackage->image);
            }
            $validated['image'] = $request->file('image')->store('decoration-packages', 'public');
        } else {
            // Jangan overwrite kolom image jika tidak ada upload baru
            unset($validated['image']);
        }

        $decorationPackage->update($validated);

        return redirect()->route('admin.decoration-packages.index')
            ->with('success', 'Paket dekorasi berhasil diperbarui!');
    }

    /**
     * Hapus paket dekorasi dari database.
     */
    public function destroy(DecorationPackage $decorationPackage): RedirectResponse
    {
        // Hapus gambar dari storage jika ada
        if ($decorationPackage->image) {
            Storage::disk('public')->delete($decorationPackage->image);
        }

        $decorationPackage->delete();

        return redirect()->route('admin.decoration-packages.index')
            ->with('success', 'Paket dekorasi berhasil dihapus!');
    }

    /**
     * Toggle status aktif/nonaktif paket dekorasi.
     */
    public function toggleStatus(DecorationPackage $decoration_package): RedirectResponse
    {
        $newStatus = $decoration_package->status === 'active' ? 'inactive' : 'active';
        $decoration_package->update(['status' => $newStatus]);

        $label = $newStatus === 'active' ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('success', "Paket \"{$decoration_package->name}\" berhasil {$label}.");
    }

    /**
     * Hapus gambar dari paket dekorasi (tanpa menghapus paketnya).
     */
    public function destroyImage(DecorationPackage $decoration_package): RedirectResponse
    {
        if ($decoration_package->image) {
            Storage::disk('public')->delete($decoration_package->image);
            $decoration_package->update(['image' => null]);
        }

        return back()->with('success', 'Foto paket dekorasi berhasil dihapus!');
    }
}
