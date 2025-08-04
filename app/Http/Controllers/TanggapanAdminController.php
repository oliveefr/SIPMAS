<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanAdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pengaduan_id' => 'required|exists:pengaduans,id',
            'isi_tanggapan' => 'required|string',
        ]);

        Tanggapan::create([
            'pengaduan_id' => $request->pengaduan_id,
            'user_id' => Auth::id(),
            'isi_tanggapan' => $request->isi_tanggapan,
            'tanggal_tanggapan' => now(),
        ]);

        // Ubah status pengaduan menjadi 'selesai'
        Pengaduan::where('id', $request->pengaduan_id)->update([
            'status' => 'selesai',
        ]);

        return redirect()
            ->route('pengaduan_admin.show', $request->pengaduan_id)
            ->with('success', 'Tanggapan berhasil dikirim.');
    }
}
