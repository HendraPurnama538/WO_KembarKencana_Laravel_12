<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_name',
        'visitor_phone',
        'visitor_address',
        'execution_date',
        'package_id',
        'decoration_package_id',
        'venue_id',
        'total_estimate',
        'status',
        'notes',
        'ordered_at',
    ];

    protected function casts(): array
    {
        return [
            'execution_date'  => 'date',
            'total_estimate'  => 'decimal:2',
            'ordered_at'      => 'datetime',
        ];
    }

    // ─── Konstanta ────────────────────────────────────────────────────────────

    const STATUSES = [
        'menunggu'      => 'Menunggu',
        'dikonfirmasi'  => 'Dikonfirmasi',
        'diproses'      => 'Diproses',
        'selesai'       => 'Selesai',
        'dibatalkan'    => 'Dibatalkan',
    ];

    const STATUS_COLORS = [
        'menunggu'      => 'bg-amber-100 text-amber-800',
        'dikonfirmasi'  => 'bg-blue-100 text-blue-800',
        'diproses'      => 'bg-purple-100 text-purple-800',
        'selesai'       => 'bg-emerald-100 text-emerald-800',
        'dibatalkan'    => 'bg-red-100 text-red-800',
    ];

    // ─── Relations ────────────────────────────────────────────────────────────

    /** Paket Pernikahan yang dipilih. */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    /** Paket Dekorasi tambahan yang dipilih. */
    public function decorationPackage(): BelongsTo
    {
        return $this->belongsTo(DecorationPackage::class);
    }

    /** Venue (jika tidak termasuk dalam paket). */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    /** Add-on yang dipilih dalam order ini. */
    public function addons(): BelongsToMany
    {
        return $this->belongsToMany(Addon::class, 'order_addons')
                    ->withPivot(['qty', 'price_snapshot'])
                    ->withTimestamps();
    }

    /** Vendor yang terlibat dalam order ini. */
    public function vendors(): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'order_vendors')
                    ->withPivot(['role'])
                    ->withTimestamps();
    }

    // ─── Scopes ───────────────────────────────────────────────────────────────

    public function scopeMenunggu($query)
    {
        return $query->where('status', 'menunggu');
    }

    public function scopeAktif($query)
    {
        return $query->whereIn('status', ['menunggu', 'dikonfirmasi', 'diproses']);
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    /** Label status yang user-friendly. */
    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    /** CSS class untuk badge status. */
    public function getStatusColorAttribute(): string
    {
        return self::STATUS_COLORS[$this->status] ?? 'bg-slate-100 text-slate-700';
    }

    /** Total estimasi dalam format Rupiah. */
    public function getTotalFormattedAttribute(): string
    {
        return 'Rp ' . number_format((float) $this->total_estimate, 0, ',', '.');
    }

    /** Tanggal pelaksanaan dalam format user-friendly. */
    public function getExecutionDateFormattedAttribute(): string
    {
        return $this->execution_date
            ? $this->execution_date->translatedFormat('d F Y')
            : '-';
    }
}
