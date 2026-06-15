<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\DecorationPackage;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\Vendor;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Tampilkan halaman landing page utama.
     */
    public function index()
    {
        // Portofolio terbaru beserta gambar-gambarnya
        $portfolios = Portfolio::with('images')->latest()->get();

        // Paket pernikahan aktif, urutkan per batch kemudian per harga
        $packages = Package::active()
            ->orderBy('batch', 'asc')
            ->orderBy('price', 'asc')
            ->get();

        // Paket dekorasi aktif untuk kalkulator custom
        $dekorasiPackages = DecorationPackage::active()
            ->orderBy('category')
            ->orderBy('name')
            ->get();

        // Add-on aktif untuk kalkulator
        $addons = Addon::active()
            ->orderBy('category')
            ->orderBy('name')
            ->get();

        // Vendor aktif untuk section Vendor & Partner
        $categoryOrder = "'" . implode("','", Vendor::CATEGORIES) . "'";
        $vendors = Vendor::active()
            ->orderByRaw("FIELD(category, $categoryOrder)")
            ->orderBy('name')
            ->get();

        // Nomor WhatsApp: ambil dari config jika ada, fallback ke default
        $waNumber = config('app.wa_number', '6281312901284');

        return view('landing', compact('portfolios', 'packages', 'dekorasiPackages', 'addons', 'vendors', 'waNumber'));
    }
}
