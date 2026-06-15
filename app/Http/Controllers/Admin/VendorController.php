<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class VendorController extends Controller
{
    /**
     * Daftar semua vendor.
     */
    public function index(): View
    {
        $categoryOrder = "'" . implode("','", Vendor::CATEGORIES) . "'";
        $vendors = Vendor::orderByRaw("FIELD(category, $categoryOrder)")->orderBy('name')->paginate(20);

        return view('admin.vendors.index', compact('vendors'));
    }

    /**
     * Form tambah vendor baru.
     */
    public function create(): View
    {
        $categories = Vendor::CATEGORIES;
        $icons      = Vendor::CATEGORY_ICONS;

        return view('admin.vendors.create', compact('categories', 'icons'));
    }

    /**
     * Simpan vendor baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'handle'        => 'required|string|max:255',
            'category'      => 'required|string|max:100',
            'icon'          => 'nullable|string|max:100',
            'image'         => 'nullable|mimes:jpg,jpeg,png,webp,heic|max:2048',
            'description'   => 'nullable|string',
            'instagram_url' => 'required|url|max:500',
            'status'        => 'required|in:active,inactive',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('vendors', 'public');
        }

        // Set icon berdasarkan kategori jika tidak diisi manual
        if (empty($validated['icon'])) {
            $validated['icon'] = Vendor::CATEGORY_ICONS[$validated['category']] ?? 'bi-check-circle-fill';
        }

        // Remove sort_order line

        Vendor::create($validated);

        return redirect()->route('admin.vendors.index')
            ->with('success', 'Vendor berhasil ditambahkan!');
    }

    /**
     * Form edit vendor.
     */
    public function edit(Vendor $vendor): View
    {
        $categories = Vendor::CATEGORIES;
        $icons      = Vendor::CATEGORY_ICONS;

        return view('admin.vendors.edit', compact('vendor', 'categories', 'icons'));
    }

    /**
     * Update vendor di database.
     */
    public function update(Request $request, Vendor $vendor): RedirectResponse
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'handle'        => 'required|string|max:255',
            'category'      => 'required|string|max:100',
            'icon'          => 'nullable|string|max:100',
            'image'         => 'nullable|mimes:jpg,jpeg,png,webp,heic|max:2048',
            'description'   => 'nullable|string',
            'instagram_url' => 'required|url|max:500',
            'status'        => 'required|in:active,inactive',
            'remove_image'  => 'nullable|boolean',
        ]);

        // Hapus gambar jika dicentang "Hapus foto"
        if ($request->boolean('remove_image')) {
            if ($vendor->image && !str_starts_with($vendor->image, 'images/')) {
                Storage::disk('public')->delete($vendor->image);
            }
            $validated['image'] = null;
        }

        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage (jangan hapus yang di public/images)
            if ($vendor->image && !str_starts_with($vendor->image, 'images/')) {
                Storage::disk('public')->delete($vendor->image);
            }
            $validated['image'] = $request->file('image')->store('vendors', 'public');
        }

        // Set icon berdasarkan kategori jika tidak diisi manual
        if (empty($validated['icon'])) {
            $validated['icon'] = Vendor::CATEGORY_ICONS[$validated['category']] ?? 'bi-check-circle-fill';
        }

        // Remove sort_order line

        $vendor->update($validated);

        return redirect()->route('admin.vendors.index')
            ->with('success', 'Vendor berhasil diperbarui!');
    }

    /**
     * Hapus vendor dari database.
     */
    public function destroy(Vendor $vendor): RedirectResponse
    {
        // Hapus gambar dari storage (jangan hapus yang di public/images)
        if ($vendor->image && !str_starts_with($vendor->image, 'images/')) {
            Storage::disk('public')->delete($vendor->image);
        }

        $vendor->delete();

        return redirect()->route('admin.vendors.index')
            ->with('success', 'Vendor berhasil dihapus!');
    }

    /**
     * Toggle status aktif/nonaktif vendor.
     */
    public function toggleStatus(Vendor $vendor): RedirectResponse
    {
        $newStatus = $vendor->status === 'active' ? 'inactive' : 'active';
        $vendor->update(['status' => $newStatus]);

        $label = $newStatus === 'active' ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('success', "Vendor \"{$vendor->name}\" berhasil {$label}.");
    }
}
