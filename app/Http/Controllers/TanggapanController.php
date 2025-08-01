<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
class TanggapanController extends Controller
{
    public function cetakPdf()
    {
        $tanggapans = Tanggapan::with('pengaduan')->get();
        $pdf = Pdf::loadView('tanggapan.pdf', compact('tanggapans'));
        return $pdf->download('laporan-tanggapan.pdf');
    }



    public function index()
    {
        $users = User::whereHas('pengaduans')->withCount('pengaduans')->get();
        return view('tanggapan.index', compact('users'));
    }

    public function create($pengaduanId)
    {
        $pengaduan = Pengaduan::findOrFail($pengaduanId);
        return view('tanggapan.create', compact('pengaduan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'pengaduan_id' => 'required|exists:pengaduans,id',
            'isi_tanggapan' => 'required|string'
        ]);

        Tanggapan::create([
            'pengaduan_id' => $request->pengaduan_id,
            'isi_tanggapan' => $request->isi_tanggapan,
            'user_id' => auth()->id(),
            'tanggal_tanggapan' => now(),
        ]);

        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan berhasil dikirim.');
    }

    public function show(Tanggapan $tanggapan)
    {
        // pastikan eager load relasi pengaduan dan user
        $tanggapan->load(['pengaduan', 'user']);
        return view('tanggapan.show', compact('tanggapan'));
    }


    public function edit(Tanggapan $tanggapan)
    {
        return view('tanggapan.edit', compact('tanggapan'));
    }

    public function update(Request $request, Tanggapan $tanggapan)
    {
        $request->validate([
            'isi_tanggapan' => 'required|string'
        ]);

        $tanggapan->update([
            'isi_tanggapan' => $request->isi_tanggapan
        ]);

        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan diperbarui.');
    }

    public function destroy(Tanggapan $tanggapan)
    {
        $tanggapan->delete();
        return redirect()->route('tanggapan.index')->with('success', 'Tanggapan dihapus.');
    }

    public function detail($userId)
    {
        $user = User::with('pengaduans')->findOrFail($userId);
        return view('tanggapan.detail', compact('user'));
    }

}
