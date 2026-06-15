<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\User;
use App\Models\Vendor;
use App\Models\DecorationPackage;
use App\Models\Addon;

class AdminDashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     */
    public function index()
    {
        $totalPortfolios = Portfolio::count();
        $totalPackages   = Package::count();
        $totalUsers      = User::count();
        $totalVendors    = Vendor::count();
        $totalDecors     = DecorationPackage::count();
        $totalAddons     = Addon::count();

        $latestPortfolios = Portfolio::with('images')->latest()->take(5)->get();
        $latestPackages   = Package::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPortfolios',
            'totalPackages',
            'totalUsers',
            'totalVendors',
            'totalDecors',
            'totalAddons',
            'latestPortfolios',
            'latestPackages'
        ));
    }
}
