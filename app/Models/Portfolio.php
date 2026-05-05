<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portfolio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    /**
     * Relasi ke banyak gambar.
     */
    public function images(): HasMany
    {
        return $this->hasMany(PortfolioImage::class)->orderBy('sort_order');
    }

    /**
     * Accessor: ambil gambar pertama (dari images baru, fallback ke kolom image lama).
     */
    public function getFirstImageAttribute(): ?string
    {
        $first = $this->images->first();
        if ($first) {
            return $first->image_path;
        }
        return $this->image ?? null;
    }
}

