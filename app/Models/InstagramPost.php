<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InstagramPost extends Model
{
    protected $fillable = [
        'instagram_id',
        'media_type',
        'media_url',
        'thumbnail_url',
        'permalink',
        'caption',
        'timestamp',
        'is_visible',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'timestamp'  => 'datetime',
            'is_visible' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    // ─── Scopes ───────────────────────────────────────────────────────────────

    /** Hanya postingan yang ditampilkan di website. */
    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true);
    }

    /** Urutkan dari postingan terbaru. */
    public function scopeLatestPosted(Builder $query): Builder
    {
        return $query->orderByDesc('timestamp');
    }

    // ─── Helpers & Accessors ──────────────────────────────────────────────────

    /**
     * URL gambar yang akan ditampilkan.
     * VIDEO: gunakan thumbnail; selain itu: media_url.
     */
    public function getDisplayImageAttribute(): ?string
    {
        if ($this->media_type === 'VIDEO') {
            return $this->thumbnail_url ?? $this->media_url;
        }

        return $this->media_url;
    }

    /** Accessor pendukung untuk $post->display_image_url */
    public function getDisplayImageUrlAttribute(): ?string
    {
        return $this->display_image;
    }

    /** Accessor pendukung untuk $post->posted_at */
    public function getPostedAtAttribute()
    {
        return $this->timestamp;
    }

    /** Accessor pendukung untuk $post->is_video */
    public function getIsVideoAttribute(): bool
    {
        return $this->media_type === 'VIDEO';
    }

    /**
     * Caption dipotong untuk preview card (150 karakter).
     */
    public function getShortCaptionAttribute(): string
    {
        if (!$this->caption) {
            return '';
        }

        return mb_strlen($this->caption) > 150
            ? mb_substr($this->caption, 0, 150) . '…'
            : $this->caption;
    }

    /**
     * Apakah postingan ini berupa gambar (bukan video)?
     */
    public function isImage(): bool
    {
        return in_array($this->media_type, ['IMAGE', 'CAROUSEL_ALBUM']);
    }
}
