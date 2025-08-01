<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;

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

    // User.php
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function pengaduans()
    {
        return $this->hasMany(\App\Models\Pengaduan::class);
    }

}
