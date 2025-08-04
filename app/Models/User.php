<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'nik',
        'no_hp',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke pengaduan
     */
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    /**
     * Ambil kategori sesuai nama petugas
     */
    public function kategoriPetugas(): ?string
    {
        $mapping = [
            'Reza Aditya' => 'Keamanan',
            'Budi'        => 'Lingkungan',
            'Andi'        => 'Infrastruktur',
            'Siti'        => 'Kesehatan',
        ];

        return $mapping[$this->name] ?? null;
    }
}
