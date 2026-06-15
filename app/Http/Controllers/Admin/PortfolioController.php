<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Daftar semua portofolio.
     */
    public function index(): View
    {
        $portfolios = Portfolio::with('images')->latest()->paginate(10);

        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Form tambah portofolio baru.
     */
    public function create(): View
    {
        return view('admin.portfolios.create');
    }

    /**
     * Simpan portofolio baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'images'      => 'nullable|array',
            'images.*'    => 'mimes:jpeg,png,jpg,webp,heic|max:3072',
            // Kolom image lama (single) tetap didukung untuk backward compat
            'image'       => 'nullable|mimes:jpeg,png,jpg,webp,heic|max:2048',
        ]);

        // Simpan data utama portfolio
        $portfolio = Portfolio::create([
            'title'       => $validated['title'],
            'description' => $validated['description'],
        ]);

        // Upload multi-gambar baru
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $idx => $file) {
                $path = $file->store('portfolios', 'public');
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image_path'   => $path,
                    'sort_order'   => $idx,
                ]);
            }
        } elseif ($request->hasFile('image')) {
            // Fallback: single upload lama
            $path = $request->file('image')->store('portfolios', 'public');
            PortfolioImage::create([
                'portfolio_id' => $portfolio->id,
                'image_path'   => $path,
                'sort_order'   => 0,
            ]);
        }

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil ditambahkan!');
    }

    /**
     * Form edit portofolio.
     */
    public function edit(Portfolio $portfolio): View
    {
        $portfolio->load('images');
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update portofolio di database.
     */
    public function update(Request $request, Portfolio $portfolio): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'images'      => 'nullable|array',
            'images.*'    => 'mimes:jpeg,png,jpg,webp,heic|max:3072',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'integer',
        ]);

        $portfolio->update([
            'title'       => $validated['title'],
            'description' => $validated['description'],
        ]);

        // Hapus gambar yang dipilih untuk dihapus
        if ($request->filled('delete_images')) {
            foreach ($request->delete_images as $imgId) {
                $img = PortfolioImage::find($imgId);
                if ($img && $img->portfolio_id === $portfolio->id) {
                    Storage::disk('public')->delete($img->image_path);
                    $img->delete();
                }
            }
        }

        // Tambah gambar baru
        if ($request->hasFile('images')) {
            $currentMax = $portfolio->images()->max('sort_order') ?? -1;
            foreach ($request->file('images') as $idx => $file) {
                $path = $file->store('portfolios', 'public');
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image_path'   => $path,
                    'sort_order'   => $currentMax + 1 + $idx,
                ]);
            }
        }

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil diperbarui!');
    }

    /**
     * Hapus satu gambar dari portofolio (AJAX).
     */
    public function destroyImage(Portfolio $portfolio, PortfolioImage $image): RedirectResponse
    {
        if ($image->portfolio_id === $portfolio->id) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        return back()->with('success', 'Gambar berhasil dihapus.');
    }

    /**
     * Hapus portofolio dari database.
     */
    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        // Hapus semua gambar dari storage
        foreach ($portfolio->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }

        // Hapus gambar lama (kolom image) jika ada
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portofolio berhasil dihapus!');
    }
}
