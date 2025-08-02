<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanAdminController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::with('user')->latest()->get(); // Ambil data + relasi user
        return view('admin.pengaduan.index', compact('pengaduans'));
    }

     public function show($id)
    {
        $pengaduan = Pengaduan::with('user', 'tanggapan')->findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }
}
