<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanRiwayatController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PensiunController;

// Redirect ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// 🔹 Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// 🔹 Resource CRUD
Route::resource('pegawai', PegawaiController::class);
Route::resource('riwayat-jabatan', JabatanRiwayatController::class);
Route::resource('cuti', CutiController::class);
Route::resource('pelatihan', PelatihanController::class);
Route::resource('pensiun', PensiunController::class);

// 🔹 Export PDF
Route::get('/pegawai/export/pdf', [PegawaiController::class, 'exportPdf'])->name('pegawai.export.pdf');
Route::get('/cuti/export/pdf', [CutiController::class, 'exportPdf'])->name('cuti.export.pdf');
Route::get('/pelatihan/export/pdf', [PelatihanController::class, 'exportPdf'])->name('pelatihan.export.pdf');
Route::get('/riwayat-jabatan/export/pdf', [JabatanRiwayatController::class, 'exportPdf'])->name('riwayat-jabatan.export.pdf');
Route::get('/pensiun/export/pdf', [PensiunController::class, 'exportPdf'])->name('pensiun.export.pdf');

// 🔹 API untuk kebutuhan AJAX form (ex: isi otomatis jabatan & tanggal)
Route::get('/api/pegawai/{id}', function ($id) {
    $pegawai = \App\Models\Pegawai::findOrFail($id);
    return response()->json($pegawai);
});
