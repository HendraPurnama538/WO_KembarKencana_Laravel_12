<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecorationPackage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'category',
        'location_type',
        'price',
        'description',
        'facilities',
        'image',
        'status',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    // ─── Konstanta Pilihan ────────────────────────────────────────────────────

    /** Kategori paket dekorasi. */
    const CATEGORIES = [
        'Gedung',
        'Outdoor',
        'Rumah',
        'Akad',
        'Tunangan',
        'Siraman',
        'Sungkeman',
        'Lapangan / GOR',
    ];

    /** Tipe lokasi pelaksanaan. */
    const LOCATION_TYPES = [
        'Indoor',
        'Outdoor',
        'Semi-Outdoor',
    ];

    // ─── Helpers ──────────────────────────────────────────────────────────────

    /**
     * Cek apakah paket dalam status aktif.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Scope: hanya paket yang aktif (untuk landing page).
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Warna badge Tailwind berdasarkan kategori.
     */
    public function getCategoryColorAttribute(): string
    {
        return match ($this->category) {
            'Gedung'         => 'bg-blue-50 text-blue-700',
            'Outdoor'        => 'bg-green-50 text-green-700',
            'Rumah'          => 'bg-orange-50 text-orange-700',
            'Akad'           => 'bg-purple-50 text-purple-700',
            'Tunangan'       => 'bg-pink-50 text-pink-700',
            'Siraman'        => 'bg-teal-50 text-teal-700',
            'Sungkeman'      => 'bg-amber-50 text-amber-700',
            'Lapangan / GOR' => 'bg-indigo-50 text-indigo-700',
            default          => 'bg-slate-50 text-slate-600',
        };
    }
}
