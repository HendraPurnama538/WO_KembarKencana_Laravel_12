<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class VenueController extends Controller
{
    public function index(): View
    {
        $venues = Venue::query()->withCount('packages')->orderBy('name')->paginate(12);
        return view('admin.venues.index', compact('venues'));
    }

    public function create(): View
    {
        return view('admin.venues.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'address'    => 'nullable|string|max:500',
            'capacity'   => 'nullable|integer|min:1',
            'description'=> 'nullable|string',
            'price_info' => 'nullable|string|max:255',
            'status'     => 'required|in:active,inactive',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('venues', 'public');
        }

        Venue::create($validated);

        return redirect()->route('admin.venues.index')
            ->with('success', 'Venue berhasil ditambahkan!');
    }

    public function show(Venue $venue): View
    {
        $venue->load('packages');
        return view('admin.venues.show', compact('venue'));
    }

    public function edit(Venue $venue): View
    {
        return view('admin.venues.edit', compact('venue'));
    }

    public function update(Request $request, Venue $venue): RedirectResponse
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'address'    => 'nullable|string|max:500',
            'capacity'   => 'nullable|integer|min:1',
            'description'=> 'nullable|string',
            'price_info' => 'nullable|string|max:255',
            'status'     => 'required|in:active,inactive',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($venue->image && Storage::disk('public')->exists($venue->image)) {
                Storage::disk('public')->delete($venue->image);
            }
            $validated['image'] = $request->file('image')->store('venues', 'public');
        }

        $venue->update($validated);

        return redirect()->route('admin.venues.index')
            ->with('success', 'Venue berhasil diperbarui!');
    }

    public function destroy(Venue $venue): RedirectResponse
    {
        // Jangan hapus jika masih digunakan paket
        if ($venue->packages()->count() > 0) {
            return back()->with('error', 'Venue tidak dapat dihapus karena masih digunakan oleh ' . $venue->packages()->count() . ' paket pernikahan.');
        }

        if ($venue->image && Storage::disk('public')->exists($venue->image)) {
            Storage::disk('public')->delete($venue->image);
        }

        $venue->delete();

        return redirect()->route('admin.venues.index')
            ->with('success', 'Venue berhasil dihapus!');
    }

    public function toggleStatus(Venue $venue): RedirectResponse
    {
        $venue->update([
            'status' => $venue->status === 'active' ? 'inactive' : 'active',
        ]);

        return back()->with('success', 'Status venue berhasil diubah!');
    }
}
