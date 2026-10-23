<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch',
        'name',
        'price',
        'pax',
        'description',
        'facilities',
        'facilities_json',
        'status',
        'venue_id',
    ];

    protected function casts(): array
    {
        return [
            'price'           => 'decimal:2',
            'batch'           => 'integer',
            'pax'             => 'integer',
            'facilities_json' => 'array',
        ];
    }

    const BATCHES = [1, 2, 3, 4];

    const TIER_NAMES = [
        1 => 'Indoor Tanpa Tenda',
        2 => 'Outdoor / Tenda & Catering',
        3 => 'Outdoor / Tenda & Catering',
        4 => 'Venue (Gedung)',
    ];

    /**
     * Daftar fasilitas standar yang dapat dimiliki paket.
     * Digunakan kalkulator untuk menentukan apa yang sudah termasuk / belum.
     */
    const FACILITY_KEYS = [
        'MUA'         => 'MUA',
        'Dekorasi'    => 'Dekorasi',
        'Dokumentasi' => 'Dokumentasi',
        'Music'       => 'Music',
        'MC'          => 'MC',
        'WO'          => 'WO',
        'Adat'        => 'Adat / Upacara Adat',
        'Tenda'       => 'Tenda',
        'Catering'    => 'Catering',
        'Venue'       => 'Venue (Gedung)',
        'Bonus'       => 'Bonus',
    ];

    // ─── Relations ────────────────────────────────────────────────────────────

    /** Venue yang sudah termasuk dalam paket (nullable — tidak semua paket punya venue). */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    /** Order yang menggunakan paket ini. */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // ─── Scopes ───────────────────────────────────────────────────────────────

    /** Hanya paket aktif (untuk landing page). */
    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Apakah paket ini sudah include venue?
     */
    public function hasVenue(): bool
    {
        return $this->venue_id !== null;
    }

    /**
     * Kembalikan array fasilitas yang SUDAH TERMASUK dalam paket.
     * Membaca dari facilities_json per kategori dan item.
     *
     * Return: array of string key, mis: ['MUA', 'Dekorasi', 'Dokumentasi', ...]
     */
    public function getIncludedFacilityKeys(): array
    {
        if (empty($this->facilities_json)) {
            return [];
        }

        $keys = [];
        foreach ($this->facilities_json as $group) {
            $cat = strtolower($group['category'] ?? '');

            if (str_contains($cat, 'mua') || str_contains($cat, 'makeup') || str_contains($cat, 'busana') || str_contains($cat, 'rias')) {
                $keys[] = 'MUA';
            }
            if (str_contains($cat, 'dekor') || str_contains($cat, 'pelaminan')) {
                $keys[] = 'Dekorasi';
            }
            if (str_contains($cat, 'dokumen') || str_contains($cat, 'foto') || str_contains($cat, 'video')) {
                $keys[] = 'Dokumentasi';
            }
            if (str_contains($cat, 'music') || str_contains($cat, 'musik') || str_contains($cat, 'hiburan') || str_contains($cat, 'band') || str_contains($cat, 'akustik')) {
                $keys[] = 'Music';
            }
            if (str_contains($cat, 'mc') || str_contains($cat, 'pembawa acara')) {
                $keys[] = 'MC';
            }
            if (str_contains($cat, 'wedding organizer') || str_contains($cat, 'wo') || str_contains($cat, 'planner')) {
                $keys[] = 'WO';
            }
            if (str_contains($cat, 'adat') || str_contains($cat, 'lengser') || str_contains($cat, 'siraman')) {
                $keys[] = 'Adat';
            }
            if (str_contains($cat, 'tenda')) {
                $keys[] = 'Tenda';
            }
            if (str_contains($cat, 'catering') || str_contains($cat, 'katering') || str_contains($cat, 'prasmanan')) {
                $keys[] = 'Catering';
            }
            if (str_contains($cat, 'venue') || str_contains($cat, 'gedung') || str_contains($cat, 'ballroom')) {
                $keys[] = 'Venue';
            }
            if (str_contains($cat, 'bonus') || str_contains($cat, 'free') || str_contains($cat, 'hadiah')) {
                $keys[] = 'Bonus';
            }

            // Fallback match items if needed
            foreach ($group['items'] ?? [] as $item) {
                $itemLower = strtolower($item);
                if (str_contains($itemLower, 'catering') || str_contains($itemLower, 'prasmanan')) $keys[] = 'Catering';
                if (str_contains($itemLower, 'tenda')) $keys[] = 'Tenda';
                if (str_contains($itemLower, 'venue') || str_contains($itemLower, 'gedung')) $keys[] = 'Venue';
                if (str_contains($itemLower, 'adat') || str_contains($itemLower, 'lengser')) $keys[] = 'Adat';
                if (str_contains($itemLower, 'wedding organizer') || str_contains($itemLower, 'wo')) $keys[] = 'WO';
            }
        }

        // Tambahkan Venue jika paket punya venue
        if ($this->hasVenue()) {
            $keys[] = 'Venue';
        }

        return array_values(array_unique($keys));
    }

    /**
     * Fasilitas yang BELUM TERMASUK (tersedia sebagai tambahan/add-on).
     */
    public function getExcludedFacilityKeys(): array
    {
        $included = $this->getIncludedFacilityKeys();
        return array_values(array_diff(array_keys(self::FACILITY_KEYS), $included));
    }

    /**
     * Data JSON untuk kalkulator JS di landing page.
     * Mengemas info paket ke format yang bisa dibaca JavaScript.
     */
    public function getCalculatorDataAttribute(): array
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name,
            'price'    => (float) $this->price,
            'batch'    => $this->batch,
            'included' => $this->getIncludedFacilityKeys(),
            'excluded' => array_values($this->getExcludedFacilityKeys()),
            'hasVenue' => $this->hasVenue(),
            'venueName'=> $this->venue?->name,
        ];
    }
}
