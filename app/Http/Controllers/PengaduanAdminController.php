<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanAdminController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Ambil user yang login

        // Kalau belum login → tolak
        if (!$user) {
            abort(403, 'Anda harus login untuk mengakses halaman ini.');
        }

        if ($user->hasRole('admin_master')) {
            // Admin Master → semua data
            $pengaduans = Pengaduan::with('user')->latest()->get();
        } elseif ($user->hasRole('petugas')) {
            $kategoriPetugas = $user->kategoriPetugas();

            if ($kategoriPetugas) {
                $pengaduans = Pengaduan::with('user')
                    ->where('kategori', $kategoriPetugas)
                    ->latest()
                    ->get();
            } else {
                $pengaduans = collect(); // kosong kalau tidak ada kategori
            }
        } else {
            $pengaduans = collect(); // kosong untuk role lain
        }

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with('user', 'tanggapan')->findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        // Hapus file foto jika ada
        if ($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
            Storage::disk('public')->delete($pengaduan->foto);
        }

        $pengaduan->delete();

        return redirect()->back()->with('success', 'Pengaduan berhasil dihapus.');
    }
}
