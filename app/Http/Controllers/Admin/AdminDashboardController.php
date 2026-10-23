<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\DecorationPackage;
use App\Models\Order;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Venue;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPortfolios = Portfolio::count();
        $totalPackages   = Package::count();
        $totalVendors    = Vendor::query()->count();
        $totalDecors     = DecorationPackage::query()->count();
        $totalAddons     = Addon::query()->count();
        $totalVenues     = Venue::query()->count();

        // Statistik User
        $totalAdmins     = User::query()->where('role', 'admin')->count();
        $totalPengunjung = User::query()->where('role', 'pengunjung')->count();
        $totalUsers      = User::count();

        // Statistik Order
        $totalOrders        = Order::query()->count();
        $ordersMenunggu     = Order::query()->where('status', 'menunggu')->count();
        $ordersDikonfirmasi = Order::query()->whereIn('status', ['dikonfirmasi', 'diproses'])->count();
        $ordersSelesai      = Order::query()->where('status', 'selesai')->count();
        $ordersDibatalkan   = Order::query()->where('status', 'dibatalkan')->count();

        // Estimasi Finansial
        $totalEstimasiOmset = Order::query()->where('status', '!=', 'dibatalkan')->sum('total_estimate');
        $totalOmsetSelesai  = Order::query()->where('status', 'selesai')->sum('total_estimate');

        // Jadwal Acara Terdekat
        $upcomingEvents = Order::query()->with(['package', 'decorationPackage'])
            ->whereIn('status', ['dikonfirmasi', 'diproses', 'menunggu'])
            ->whereNotNull('execution_date')
            ->orderBy('execution_date', 'asc')
            ->take(4)
            ->get();

        // Pesanan Terbaru (5 data)
        $latestOrders = Order::query()->with(['package', 'decorationPackage'])
            ->latest('ordered_at')
            ->take(5)
            ->get();

        $latestPortfolios = Portfolio::query()->with('images')->latest()->take(3)->get();
        $latestPackages   = Package::query()->latest()->take(3)->get();

        // Data bulanan pesanan & omset untuk chart (tahun ini)
        $monthlyData = [];
        for ($m = 1; $m <= 12; $m++) {
            $monthlyData[$m] = [
                'orders'  => Order::query()->whereYear('ordered_at', now()->year)->whereMonth('ordered_at', $m)->count(),
                'revenue' => Order::query()->whereYear('ordered_at', now()->year)->whereMonth('ordered_at', $m)->where('status', '!=', 'dibatalkan')->sum('total_estimate'),
            ];
        }

        return view('admin.dashboard', compact(
            'totalPortfolios',
            'totalPackages',
            'totalUsers',
            'totalAdmins',
            'totalPengunjung',
            'totalVendors',
            'totalDecors',
            'totalAddons',
            'totalVenues',
            'totalOrders',
            'ordersMenunggu',
            'ordersDikonfirmasi',
            'ordersSelesai',
            'ordersDibatalkan',
            'totalEstimasiOmset',
            'totalOmsetSelesai',
            'upcomingEvents',
            'latestPortfolios',
            'latestPackages',
            'latestOrders',
            'monthlyData',
        ));
    }
}
