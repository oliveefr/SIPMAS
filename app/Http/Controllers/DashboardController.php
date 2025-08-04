<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil kategori kalau dia petugas
        $kategoriPetugas = null;
        if ($user->hasRole('petugas')) {
            $kategoriPetugas = $user->kategoriPetugas();
        }

        // Base query filter sesuai role
        $pengaduanQuery = Pengaduan::query();
        $tanggapanQuery = Tanggapan::query();

        if ($kategoriPetugas) {
            $pengaduanQuery->where('kategori', $kategoriPetugas);
            $tanggapanQuery->whereHas('pengaduan', function ($q) use ($kategoriPetugas) {
                $q->where('kategori', $kategoriPetugas);
            });
        }

        // Statistik
        $totalPengaduan    = $pengaduanQuery->count();
        $diprosesPengaduan = (clone $pengaduanQuery)->where('status', 'proses')->count();
        $selesaiPengaduan  = (clone $pengaduanQuery)->where('status', 'selesai')->count();
        $petugasAktif      = User::role('petugas')->count();
        $petugasTotal      = User::role('petugas')->count();

        $now = Carbon::now();
        $lastMonth = $now->copy()->subMonth();

        $totalPengaduanThisMonth = (clone $pengaduanQuery)
                                    ->whereMonth('created_at', $now->month)
                                    ->whereYear('created_at', $now->year)
                                    ->count();

        $totalPengaduanLastMonth = (clone $pengaduanQuery)
                                    ->whereMonth('created_at', $lastMonth->month)
                                    ->whereYear('created_at', $lastMonth->year)
                                    ->count();

        $growthPercentage = null;
        if ($totalPengaduanLastMonth > 0) {
            $growthPercentage = round(
                (($totalPengaduanThisMonth - $totalPengaduanLastMonth) / $totalPengaduanLastMonth) * 100,
                2
            );
        }

        $totalTanggapan = $tanggapanQuery->count();

        $pengaduanTerbaru = (clone $pengaduanQuery)->with('user')->latest()->take(5)->get();
        $aktivitasTerbaru = (clone $tanggapanQuery)->with('user', 'pengaduan')->latest()->take(5)->get();

        $timelineRespon = (clone $tanggapanQuery)
                            ->with('user', 'pengaduan')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('dashboard', compact(
            'totalPengaduan',
            'diprosesPengaduan',
            'selesaiPengaduan',
            'petugasAktif',
            'petugasTotal',
            'pengaduanTerbaru',
            'aktivitasTerbaru',
            'totalPengaduanThisMonth',
            'totalPengaduanLastMonth',
            'growthPercentage',
            'totalTanggapan',
            'timelineRespon'
        ));
    }
}
