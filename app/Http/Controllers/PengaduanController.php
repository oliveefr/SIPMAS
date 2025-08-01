<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PengaduanController extends Controller
{
    // Cetak PDF (hanya untuk admin_master dan petugas)
    public function cetakPdf()
    {
        if (!Auth::user()->hasAnyRole(['admin_master', 'petugas'])) {
            abort(403, 'Anda tidak memiliki akses untuk mencetak pengaduan.');
        }

        $pengaduans = Pengaduan::with('user')->get();
        $pdf = Pdf::loadView('pengaduan.cetak', compact('pengaduans'))->setPaper('a4', 'portrait');

        return $pdf->download('laporan_pengaduan.pdf');
    }

    public function cetakIndividual($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);

        if (!Auth::user()->hasAnyRole(['admin_master', 'petugas'])) {
            abort(403);
        }

        $pdf = Pdf::loadView('pengaduan.cetak_individual', compact('pengaduan'))->setPaper('a4');

        return $pdf->download('pengaduan_' . $pengaduan->user->nik . '.pdf');
    }

    // Masyarakat: Lihat semua pengaduan miliknya
    public function index()
    {
        $pengaduans = Pengaduan::where('user_id', Auth::id())->get();
        return view('pengaduan.index', compact('pengaduans'));
    }

    // Masyarakat: Tampilkan form buat pengaduan
    public function create()
    {
        return view('pengaduan.create');
    }

    // Masyarakat: Simpan pengaduan dengan upload foto
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_laporan' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Simpan file dan ambil nama file
            $filename = $foto->store('pengaduan', 'public'); // simpan ke storage/app/public/pengaduan/

            // Debug: Cek apakah filename tidak null
            if ($filename) {
                \Log::info('File uploaded: ' . $filename);
            } else {
                \Log::error('File upload failed.');
            }
        } else {
            \Log::warning('No file uploaded.');
        }

        Pengaduan::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $filename,
            'status' => 'pending',
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Status pengaduan berhasil diubah.');
    }





    // Masyarakat: Lihat detail pengaduan
    public function show(Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id != Auth::id()) {
            abort(403);
        }

        return view('pengaduan.show', compact('pengaduan'));
    }

    // Masyarakat: Form edit
    public function edit(Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id != Auth::id()) {
            abort(403);
        }

        return view('pengaduan.edit', compact('pengaduan'));
    }

    // Masyarakat: Update pengaduan dengan upload foto
    public function update(Request $request, Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_laporan' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $filename = $pengaduan->foto;
        if ($request->hasFile('foto')) {
            if ($filename && \Storage::exists('public/' . $filename)) {
                \Storage::delete('public/' . $filename);
            }

            $foto = $request->file('foto');
            $filename = $foto->store('pengaduan', 'public'); // Simpan ke folder public/pengaduan
        }


        $pengaduan->update([
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $filename,
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    // Masyarakat: Hapus pengaduan
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->user_id != Auth::id()) {
            abort(403);
        }

        if ($pengaduan->foto && \Storage::disk('public')->exists($pengaduan->foto)) {
            \Storage::disk('public')->delete($pengaduan->foto);
        }

        $pengaduan->delete();
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
