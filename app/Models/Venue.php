<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'capacity',
        'description',
        'image',
        'price_info',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'capacity' => 'integer',
        ];
    }

    // ─── Scopes ───────────────────────────────────────────────────────────────

    /** Hanya venue aktif (untuk landing page / kalkulator). */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // ─── Relations ────────────────────────────────────────────────────────────

    /** Paket Pernikahan yang menggunakan venue ini. */
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    /** Order yang menggunakan venue ini. */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * URL gambar venue.
     */
    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/logo.JPG');
        }
        if (str_starts_with($this->image, 'images/')) {
            return asset($this->image);
        }
        return asset('storage/' . $this->image);
    }

    /**
     * Kapasitas dalam format user-friendly.
     */
    public function getCapacityLabelAttribute(): string
    {
        return $this->capacity ? number_format($this->capacity) . ' pax' : 'Kapasitas menyesuaikan';
    }
}
