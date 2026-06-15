<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'category',
        'price',
        'unit',
        'description',
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

    /** Kategori add-on. */
    const CATEGORIES = [
        'Tenda',
        'Kursi',
        'AC / Blower',
        'Alat Catering',
        'Panggung',
    ];

    /** Satuan harga. */
    const UNITS = [
        'meter',
        'unit',
        'pax',
        'set',
    ];

    // ─── Helpers ──────────────────────────────────────────────────────────────

    /**
     * Cek apakah add-on dalam status aktif.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Scope: hanya add-on yang aktif (untuk kalkulator/landing page).
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Label satuan yang user-friendly.
     */
    public function getUnitLabelAttribute(): string
    {
        return '/ ' . $this->unit;
    }

    /**
     * Warna badge Tailwind berdasarkan kategori.
     */
    public function getCategoryColorAttribute(): string
    {
        return match ($this->category) {
            'Tenda'         => 'bg-blue-50 text-blue-700',
            'Kursi'         => 'bg-amber-50 text-amber-700',
            'AC / Blower'   => 'bg-cyan-50 text-cyan-700',
            'Alat Catering' => 'bg-orange-50 text-orange-700',
            'Panggung'      => 'bg-purple-50 text-purple-700',
            default         => 'bg-slate-50 text-slate-600',
        };
    }
}
