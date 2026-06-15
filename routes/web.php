<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\Admin\DecorationPackageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// ─── Landing Page ────────────────────────────────────────────────────────────
Route::get('/', [LandingController::class, 'index'])->name('landing');

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
        // Hapus satu gambar dari portofolio
        Route::delete('portfolios/{portfolio}/images/{image}', [PortfolioController::class, 'destroyImage'])
            ->name('admin.portfolios.image.destroy');

        // Paket Pernikahan CRUD
        Route::resource('packages', PackageController::class);

        // Paket Dekorasi CRUD
        Route::resource('decoration-packages', DecorationPackageController::class);
        // Toggle status aktif/nonaktif paket dekorasi
        Route::patch('decoration-packages/{decoration_package}/toggle-status', [DecorationPackageController::class, 'toggleStatus'])
            ->name('decoration-packages.toggle-status');
        // Hapus gambar dari paket dekorasi
        Route::delete('decoration-packages/{decoration_package}/delete-image', [DecorationPackageController::class, 'destroyImage'])
            ->name('decoration-packages.delete-image');

        // Add-on Tambahan CRUD
        Route::resource('addons', AddonController::class);
        // Toggle status aktif/nonaktif add-on
        Route::patch('addons/{addon}/toggle-status', [AddonController::class, 'toggleStatus'])
            ->name('addons.toggle-status');

        // Vendor & Partner CRUD
        Route::resource('vendors', VendorController::class);
        // Toggle status aktif/nonaktif vendor
        Route::patch('vendors/{vendor}/toggle-status', [VendorController::class, 'toggleStatus'])
            ->name('vendors.toggle-status');

        // Manajemen User (list & delete only)
        Route::resource('users', UserController::class)->only(['index', 'destroy']);

        // Profil Admin
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Pengaturan Keamanan (Ganti Password)
        Route::get('/security', [SecurityController::class, 'showChangePassword'])->name('security.show');
        Route::put('/security', [SecurityController::class, 'changePassword'])->name('security.update');
    });
