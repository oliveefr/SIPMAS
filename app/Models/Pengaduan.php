<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'foto',
        'isi_laporan',
         'kategori', // ✅ pastikan ada
        'status',
    ];

    protected $casts = [
        'tanggal_tanggapan' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class);
    }
}
