<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'Silver Package',
        'Gold Package',
        'Platinum Package',
        'Diamond Package',
    ];

    /** Hanya paket aktif (untuk landing page). */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
