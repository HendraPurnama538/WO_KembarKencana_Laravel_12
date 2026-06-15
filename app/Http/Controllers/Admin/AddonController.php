<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AddonController extends Controller
{
    /**
     * Daftar semua add-on, dikelompokkan per kategori.
     */
    public function index(): View
    {
        $addons = Addon::orderBy('category')->orderBy('name')->paginate(20);

        return view('admin.addons.index', compact('addons'));
    }

    /**
     * Form tambah add-on baru.
     */
    public function create(): View
    {
        $categories = Addon::CATEGORIES;
        $units      = Addon::UNITS;

        return view('admin.addons.create', compact('categories', 'units'));
    }

    /**
     * Simpan add-on baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'price'       => 'required|numeric|min:0',
            'unit'        => 'required|string|max:50',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
        ]);

        Addon::create($validated);

        return redirect()->route('admin.addons.index')
            ->with('success', 'Add-on berhasil ditambahkan!');
    }

    /**
     * Form edit add-on.
     */
    public function edit(Addon $addon): View
    {
        $categories = Addon::CATEGORIES;
        $units      = Addon::UNITS;

        return view('admin.addons.edit', compact('addon', 'categories', 'units'));
    }

    /**
     * Update add-on di database.
     */
    public function update(Request $request, Addon $addon): RedirectResponse
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category'    => 'required|string|max:100',
            'price'       => 'required|numeric|min:0',
            'unit'        => 'required|string|max:50',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
        ]);

        $addon->update($validated);

        return redirect()->route('admin.addons.index')
            ->with('success', 'Add-on berhasil diperbarui!');
    }

    /**
     * Hapus add-on dari database.
     */
    public function destroy(Addon $addon): RedirectResponse
    {
        $addon->delete();

        return redirect()->route('admin.addons.index')
            ->with('success', 'Add-on berhasil dihapus!');
    }

    /**
     * Toggle status aktif/nonaktif add-on.
     */
    public function toggleStatus(Addon $addon): RedirectResponse
    {
        $newStatus = $addon->status === 'active' ? 'inactive' : 'active';
        $addon->update(['status' => $newStatus]);

        $label = $newStatus === 'active' ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('success', "Add-on \"{$addon->name}\" berhasil {$label}.");
    }
}
