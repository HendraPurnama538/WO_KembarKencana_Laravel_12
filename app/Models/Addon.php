<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Addon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'unit',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    // ─── Konstanta ────────────────────────────────────────────────────────────

    /** Kategori add-on (diperluas sesuai revisi penguji). */
    const CATEGORIES = [
        // Kategori MUA & Busana
        'MUA & Busana',
        // Kategori Souvenir & Undangan
        'Souvenir & Undangan',
        // Kategori Tenda & Dekorasi
        'Tenda & Dekorasi',
        // Kategori Catering
        'Catering',
        // Kategori Lainnya
        'Lainnya',
    ];

    /** Satuan harga. */
    const UNITS = [
        'pax',
        'orang',
        'set',
        'unit',
        'meter',
        'lembar',
        'buah',
        'paket',
    ];

    // ─── Scopes ───────────────────────────────────────────────────────────────

    /** Hanya add-on aktif. */
    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function getUnitLabelAttribute(): string
    {
        return '/ ' . $this->unit;
    }

    /** Warna badge berdasarkan kategori. */
    public function getCategoryColorAttribute(): string
    {
        return match ($this->category) {
            'MUA & Busana'       => 'bg-pink-50 text-pink-700',
            'Souvenir & Undangan'=> 'bg-amber-50 text-amber-700',
            'Tenda & Dekorasi'   => 'bg-blue-50 text-blue-700',
            'Catering'           => 'bg-orange-50 text-orange-700',
            'Lainnya'            => 'bg-slate-50 text-slate-600',
            default              => 'bg-slate-50 text-slate-600',
        };
    }

    /** Harga dalam format Rupiah. */
    public function getPriceFormattedAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->price, 0, ',', '.');
    }
}
