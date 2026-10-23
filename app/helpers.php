<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

if (!function_exists('app_logo_url')) {
    /**
     * Ambil URL logo website utama Kembar Kencana.
     * Jika admin meng-upload logo baru di Profil Admin, tampilkan logo baru dari storage.
     * Jika belum, fallback ke logo default asset('images/logo.JPG').
     */
    function app_logo_url(): string
    {
        return Cache::remember('app_logo_url', 3600, function () {
            $files = Storage::disk('public')->files('logo');
            if (!empty($files)) {
                // Urutkan berdasarkan waktu modifikasi terbaru
                usort($files, function ($a, $b) {
                    return Storage::disk('public')->lastModified($b) <=> Storage::disk('public')->lastModified($a);
                });
                $latest = $files[0];
                return asset('storage/' . $latest) . '?v=' . Storage::disk('public')->lastModified($latest);
            }

            // Fallback default logo
            return asset('images/logo.JPG');
        });
    }
}
