<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Tampilkan halaman landing page utama.
     * Mengambil data portofolio dan paket dari database.
     */
    public function index()
    {
        // Ambil semua portofolio dengan gambar-gambarnya, urutkan dari terbaru
        $portfolios = Portfolio::with('images')->latest()->get();

        // Ambil semua paket, urutkan berdasarkan harga
        $packages = Package::orderBy('price', 'asc')->get();

        return view('landing', compact('portfolios', 'packages'));
    }
}
