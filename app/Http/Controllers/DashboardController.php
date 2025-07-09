<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Cuti;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    // Hanya menghitung pegawai yang aktif
    $jumlahPegawai = Pegawai::where('status', 'Aktif')->count();

    // Cuti yang sedang berlangsung hari ini
    $jumlahCuti = Cuti::whereDate('tanggal_mulai', '<=', now())
                      ->whereDate('tanggal_selesai', '>=', now())
                      ->count();

    // Jumlah pelatihan per bulan
    $pelatihanBulanan = Pelatihan::selectRaw('MONTH(tanggal_mulai) as bulan, COUNT(*) as total')
                                 ->groupBy('bulan')
                                 ->orderBy('bulan')
                                 ->get();

    return view('dashboard', compact('jumlahPegawai', 'jumlahCuti', 'pelatihanBulanan'));
}
}
