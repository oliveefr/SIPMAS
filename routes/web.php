<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\PengaduanAdminController;
use App\Http\Controllers\TanggapanAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Role: masyarakat
    Route::middleware(['role:masyarakat'])->group(function () {
        Route::resource('pengaduan', PengaduanController::class);
    });
    Route::post('/tanggapan', [TanggapanController::class, 'store'])->middleware('auth')->name('tanggapan.store');


    // Role: admin_master dan petugas
    Route::middleware(['role:admin_master|petugas'])->group(function () {
        Route::resource('tanggapan', TanggapanController::class);
        Route::resource('users', UserController::class);
        Route::get('/cetak-pengaduan-pdf', [PengaduanController::class, 'cetakPdf'])->name('pengaduan.cetak.pdf')->middleware('auth');
        Route::get('/pengaduan/{id}/cetak', [PengaduanController::class, 'cetakIndividual'])->name('pengaduan.cetak.individual')->middleware('auth');
        Route::get('/tanggapan/cetak/pdf', [TanggapanController::class, 'cetakPdf'])->name('tanggapan.cetak.pdf');
        Route::get('/tanggapan/detail/{user}', [TanggapanController::class, 'detail'])->name('tanggapan.detail');
        Route::get('tanggapan/create/{pengaduan}', [TanggapanController::class, 'create'])->name('tanggapan.create');
        Route::get('tanggapan/{tanggapan}', [TanggapanController::class, 'show'])->name('tanggapan.show');
        Route::patch('/pengaduan/{pengaduan}/status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');

        // pengaduan admin /dasboard admin
        Route::get('/pengaduan-admin', [PengaduanAdminController::class, 'index'])->name('pengaduan_admin.index');
        Route::get('/pengaduan-admin/{id}', [PengaduanAdminController::class, 'show'])->name('pengaduan_admin.show');
        
        // tangapan admin
        Route::post('/tanggapan', [TanggapanAdminController::class, 'store'])->name('tanggapan.store');
    });

    // Khusus admin master (misal nanti ingin kelola petugas)
    Route::middleware(['role:admin_master'])->group(function () {
    });
});

require __DIR__ . '/auth.php';
