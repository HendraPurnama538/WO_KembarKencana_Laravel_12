<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    public function index(): View
    {
        $packages = Package::orderBy('batch')->orderBy('price')->paginate(12);
        return view('admin.packages.index', compact('packages'));
    }

    public function create(): View
    {
        return view('admin.packages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'batch'                         => 'required|integer|in:1,2,3,4',
            'name'                          => 'required|string|max:255',
            'price'                         => 'required|numeric|min:0',
            'pax'                           => 'nullable|integer|min:1',
            'description'                   => 'required|string',
            'status'                        => 'required|in:active,inactive',
            // Dynamic facilities categories & items
            'fac_category'                  => 'nullable|array',
            'fac_category.*'               => 'nullable|string|max:100',
            'fac_items'                     => 'nullable|array',
            'fac_items.*'                  => 'nullable|array',
            'fac_items.*.*'               => 'nullable|string|max:500',
        ]);

        $facilitiesJson = $this->buildFacilitiesJson($request);
        $facilitiesText = $this->buildFacilitiesText($facilitiesJson);

        Package::create([
            'batch'           => $validated['batch'],
            'name'            => $validated['name'],
            'price'           => $validated['price'],
            'pax'             => $validated['pax'] ?? null,
            'description'     => $validated['description'],
            'facilities'      => $facilitiesText,
            'facilities_json' => $facilitiesJson,
            'status'          => $validated['status'],
        ]);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket pernikahan berhasil ditambahkan!');
    }

    public function edit(Package $package): View
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package): RedirectResponse
    {
        $validated = $request->validate([
            'batch'                         => 'required|integer|in:1,2,3,4',
            'name'                          => 'required|string|max:255',
            'price'                         => 'required|numeric|min:0',
            'pax'                           => 'nullable|integer|min:1',
            'description'                   => 'required|string',
            'status'                        => 'required|in:active,inactive',
            'fac_category'                  => 'nullable|array',
            'fac_category.*'               => 'nullable|string|max:100',
            'fac_items'                     => 'nullable|array',
            'fac_items.*'                  => 'nullable|array',
            'fac_items.*.*'               => 'nullable|string|max:500',
        ]);

        $facilitiesJson = $this->buildFacilitiesJson($request);
        $facilitiesText = $this->buildFacilitiesText($facilitiesJson);

        $package->update([
            'batch'           => $validated['batch'],
            'name'            => $validated['name'],
            'price'           => $validated['price'],
            'pax'             => $validated['pax'] ?? null,
            'description'     => $validated['description'],
            'facilities'      => $facilitiesText,
            'facilities_json' => $facilitiesJson,
            'status'          => $validated['status'],
        ]);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket pernikahan berhasil diperbarui!');
    }

    public function destroy(Package $package): RedirectResponse
    {
        $package->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket pernikahan berhasil dihapus!');
    }

    // ── Helpers ──────────────────────────────────────────────────────────────

    /**
     * Build structured facilities_json array from dynamic form input.
     * Format: [{ "category": "...", "items": ["...", "..."] }, ...]
     */
    private function buildFacilitiesJson(Request $request): array
    {
        $categories = $request->input('fac_category', []);
        $itemsMap   = $request->input('fac_items', []);

        $result = [];
        foreach ($categories as $idx => $category) {
            $category = trim($category ?? '');
            if ($category === '') continue;

            $items = array_values(
                array_filter(
                    array_map('trim', $itemsMap[$idx] ?? []),
                    fn($v) => $v !== ''
                )
            );

            $result[] = [
                'category' => $category,
                'items'    => $items,
            ];
        }

        return $result;
    }

    /**
     * Convert facilities_json to plain newline text for backward-compat `facilities` column.
     */
    private function buildFacilitiesText(array $facilitiesJson): string
    {
        $lines = [];
        foreach ($facilitiesJson as $group) {
            $lines[] = '== ' . ($group['category'] ?? '') . ' ==';
            foreach ($group['items'] ?? [] as $item) {
                $lines[] = '- ' . $item;
            }
        }
        return implode("\n", $lines);
    }
}
