<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
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
        'instagram_username',
        'instagram_user_id',
        'instagram_pic_url',
        'instagram_profile_pic',
        'ig_pic_synced_at',
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
     * URL foto profil Instagram (fallback ke instagram_pic_url)
     */
    public function getInstagramProfilePicUrlAttribute(): ?string
    {
        return $this->instagram_profile_pic ?? $this->instagram_pic_url;
    }

    /**
     * URL gambar vendor (support instagram profile pic, public/images, dan storage).
     */
    public function getImageUrlAttribute(): string
    {
        // 1. Gambar manual dari storage / public
        if ($this->image) {
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }
            if (strpos($this->image, 'images/') === 0) {
                return asset($this->image);
            }
            return asset('storage/' . $this->image);
        }

        // 2. Foto profil dari Instagram (instagram_profile_pic atau instagram_pic_url)
        $igPic = $this->instagram_profile_pic ?? $this->instagram_pic_url;
        if ($igPic) {
            if (filter_var($igPic, FILTER_VALIDATE_URL)) {
                return $igPic;
            }
            if (strpos($igPic, 'images/') === 0) {
                return asset($igPic);
            }
            return asset('storage/' . $igPic);
        }

        // 3. Fallback default logo
        return asset('images/logo.JPG');
    }
}
