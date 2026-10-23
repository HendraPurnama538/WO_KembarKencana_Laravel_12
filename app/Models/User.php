<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // ─── Konstanta ────────────────────────────────────────────────────────────

    /**
     * Role yang tersedia:
     * - 'admin'      : Administrator yang dapat mengakses Admin Panel.
     * - 'pengunjung' : Pengguna terdaftar biasa (opsional — order bisa tanpa akun).
     */
    const ROLES = [
        'admin'      => 'Admin',
        'pengunjung' => 'Pengunjung',
    ];

    // ─── Scopes ───────────────────────────────────────────────────────────────

    /** Hanya user dengan role admin. */
    public function scopeAdmin(Builder $query)
    {
        return $query->where('role', 'admin');
    }

    /** Hanya user dengan role pengunjung. */
    public function scopePengunjung(Builder $query)
    {
        return $query->where('role', 'pengunjung');
    }

    // ─── Helpers ──────────────────────────────────────────────────────────────

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isPengunjung(): bool
    {
        return $this->role === 'pengunjung';
    }

    public function getRoleLabelAttribute(): string
    {
        return self::ROLES[$this->role] ?? ucfirst($this->role);
    }

    /**
     * URL avatar user.
     */
    public function getAvatarUrlAttribute(): string
    {
        if (!$this->avatar) {
            return '';
        }
        return Storage::url($this->avatar);
    }
}
