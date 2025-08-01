<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'isi_tanggapan',
        'tanggal_tanggapan'
    ];

    protected $casts = [
        'tanggal_tanggapan' => 'datetime',
    ];

    // Relasi ke Pengaduan
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }

    // Relasi ke Petugas/User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
