<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Vendor extends Model
{
    /**
     * Daftar kategori vendor yang tersedia.
     */
    const CATEGORIES = [
        'Wedding Planning',
        'MUA',
        'Dekorasi',
        'Dokumentasi',
        'Catering',
        'Entertainment',
        'Music',
        'MC',
        'Upacara Adat',
    ];

    /**
     * Mapping kategori → Bootstrap Icon.
     */
    const CATEGORY_ICONS = [
        'Wedding Planning' => 'bi-heart-fill',
        'MUA'              => 'bi-stars',
        'Dekorasi'         => 'bi-flower1',
        'Dokumentasi'      => 'bi-camera-fill',
        'Catering'         => 'bi-cup-hot-fill',
        'Entertainment'    => 'bi-music-note-beamed',
        'Music'            => 'bi-music-note-beamed',
        'MC'               => 'bi-mic-fill',
        'Upacara Adat'     => 'bi-award-fill',
    ];

    protected $fillable = [
        'name',
        'handle',
        'category',
        'icon',
        'image',
        'description',
        'instagram_url',
        'status',
    ];

    /**
     * Scope: hanya vendor aktif.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    /**
     * Cek apakah vendor aktif.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Ambil icon berdasarkan kategori (fallback ke field icon).
     */
    public function getCategoryIconAttribute(): string
    {
        return self::CATEGORY_ICONS[$this->category] ?? $this->icon ?? 'bi-check-circle-fill';
    }

    /**
     * URL gambar vendor (support public/images dan storage).
     */
    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/logo.JPG'); // fallback
        }

        // Jika path dimulai dengan 'images/' → ada di folder public
        if (str_starts_with($this->image, 'images/')) {
            return asset($this->image);
        }

        // Jika di-upload ke storage
        return asset('storage/' . $this->image);
    }
}
