<?php

namespace App\Http\Controllers;


use App\Models\Pegawai;
use App\Models\Cuti;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use App\Models\Pensiun;


class DashboardController extends Controller
{
public function index()
{
    $jumlahPegawai = Pegawai::where('status', 'Aktif')->count();
    $jumlahCuti = Cuti::count();
    $jumlahPensiun = Pensiun::count(); // ✅ Tambahan ini

    $pelatihanBulanan = Pelatihan::selectRaw('MONTH(tanggal_mulai) as bulan, COUNT(*) as total')
        ->whereNotNull('tanggal_mulai')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

    return view('dashboard', compact('jumlahPegawai', 'jumlahCuti', 'jumlahPensiun', 'pelatihanBulanan'));
}


}
