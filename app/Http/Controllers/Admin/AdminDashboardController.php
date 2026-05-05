<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\User;

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

        $latestPortfolios = Portfolio::with('images')->latest()->take(5)->get();
        $latestPackages   = Package::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPortfolios',
            'totalPackages',
            'totalUsers',
            'latestPortfolios',
            'latestPackages'
        ));
    }
}
