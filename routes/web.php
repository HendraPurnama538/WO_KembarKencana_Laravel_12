<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\Admin\DecorationPackageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InstagramController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// ─── Landing Page ────────────────────────────────────────────────────────────
Route::get('/', [LandingController::class, 'index'])->name('landing');

// ─── Order dari Landing Page (tanpa login) ───────────────────────────────────
Route::post('/order', [LandingController::class, 'storeOrder'])->name('order.store');

// ─── Auth (Guest Only) ───────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
});

// ─── Auth (Authenticated) ────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ─── Redirect /admin → /admin/dashboard ─────────────────────────────────────
Route::redirect('/admin', '/admin/dashboard');

// ─── Admin Panel (Auth + Admin Role) ────────────────────────────────────────
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Portofolio CRUD
        Route::resource('portfolios', PortfolioController::class);
        Route::delete('portfolios/{portfolio}/images/{image}', [PortfolioController::class, 'destroyImage'])
            ->name('admin.portfolios.image.destroy');

        // Paket Pernikahan CRUD
        Route::resource('packages', PackageController::class);

        // Paket Dekorasi CRUD
        Route::resource('decoration-packages', DecorationPackageController::class);
        Route::patch('decoration-packages/{decoration_package}/toggle-status', [DecorationPackageController::class, 'toggleStatus'])
            ->name('decoration-packages.toggle-status');
        Route::delete('decoration-packages/{decoration_package}/delete-image', [DecorationPackageController::class, 'destroyImage'])
            ->name('decoration-packages.delete-image');

        // Add-on Tambahan CRUD
        Route::resource('addons', AddonController::class);
        Route::patch('addons/{addon}/toggle-status', [AddonController::class, 'toggleStatus'])
            ->name('addons.toggle-status');

        // Vendor & Partner CRUD
        Route::resource('vendors', VendorController::class);
        Route::patch('vendors/{vendor}/toggle-status', [VendorController::class, 'toggleStatus'])
            ->name('vendors.toggle-status');

        // Instagram Posts
        Route::get('instagram', [InstagramController::class, 'index'])->name('instagram.index');
        Route::post('instagram/sync', [InstagramController::class, 'sync'])->name('instagram.sync');
        Route::patch('instagram/{post}/toggle', [InstagramController::class, 'toggleVisible'])->name('instagram.toggle');
        Route::delete('instagram/{post}', [InstagramController::class, 'destroy'])->name('instagram.destroy');

        // Venue CRUD
        Route::resource('venues', VenueController::class);
        Route::patch('venues/{venue}/toggle-status', [VenueController::class, 'toggleStatus'])
            ->name('venues.toggle-status');

        // Order / Pesanan
        Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.update-status');
        Route::resource('orders', OrderController::class)->except(['create', 'store']);

        // Manajemen User (list & delete only)
        Route::resource('users', UserController::class)->only(['index', 'destroy']);

        // Profil Admin & Logo Website
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/reset-logo', [ProfileController::class, 'resetLogo'])->name('profile.reset-logo');

        // Pengaturan Keamanan (Ganti Password)
        Route::get('/security', [SecurityController::class, 'showChangePassword'])->name('security.show');
        Route::put('/security', [SecurityController::class, 'changePassword'])->name('security.update');
    });
