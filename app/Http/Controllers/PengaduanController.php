<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        // Ambil semua pengaduan milik user yang sedang login
        $pengaduanList = Pengaduan::where('user_id', Auth::id())
                            ->latest()
                            ->get();

        return view('pengaduan.index', compact('pengaduanList'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Proses upload bukti jika ada
        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
        }

        // Simpan ke database
        Pengaduan::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'bukti' => $buktiPath,
            'status' => 'menunggu', // status default
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
    }
}
