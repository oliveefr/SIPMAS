<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan'; // nama tabel di database

    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'bukti',
        'status', // <== tambahkan ini
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
