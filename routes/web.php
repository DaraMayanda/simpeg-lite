<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanRiwayatController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// 🔹 CRUD Pegawai
Route::resource('pegawai', PegawaiController::class);

// 🔹 CRUD Riwayat Jabatan
Route::resource('riwayat-jabatan', JabatanRiwayatController::class);

// 🔹 CRUD Cuti
Route::resource('cuti', CutiController::class);

// 🔹 CRUD Pelatihan
Route::resource('pelatihan', PelatihanController::class);

// 🔹 Export PDF Routes
Route::get('/pegawai/export/pdf', [PegawaiController::class, 'exportPdf'])->name('pegawai.export.pdf');
Route::get('/cuti/export/pdf', [CutiController::class, 'exportPdf'])->name('cuti.export.pdf');
Route::get('/pelatihan/export/pdf', [PelatihanController::class, 'exportPdf'])->name('pelatihan.export.pdf');
Route::get('/cuti/export/pdf', [CutiController::class, 'exportPdf'])->name('cuti.export.pdf');
