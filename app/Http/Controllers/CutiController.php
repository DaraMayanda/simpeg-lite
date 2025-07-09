<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // ✅ Tambahkan ini

class CutiController extends Controller
{
    /**
     * Tampilkan daftar semua cuti
     */
    public function index()
    {
        $cutis = Cuti::with('pegawai')->latest()->get();
        return view('cuti.index', compact('cutis'));
    }

    /**
     * Tampilkan form tambah cuti
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('cuti.create', compact('pegawai'));
    }

    /**
     * Simpan data cuti baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'jenis_cuti' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|string',
            'keterangan' => 'nullable|string'
        ]);

        Cuti::create($request->all());

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail 1 data cuti
     */
    public function show(Cuti $cuti)
    {
        return view('cuti.show', compact('cuti'));
    }

    /**
     * Tampilkan form edit cuti
     */
    public function edit(Cuti $cuti)
    {
        $pegawai = Pegawai::all();
        return view('cuti.edit', compact('cuti', 'pegawai'));
    }

    /**
     * Simpan perubahan data cuti
     */
    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'jenis_cuti' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status' => 'required|string',
            'keterangan' => 'nullable|string'
        ]);

        $cuti->update($request->all());

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil diperbarui.');
    }

    /**
     * Hapus data cuti
     */
    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil dihapus.');
    }

    /**
     * Export data cuti ke PDF
     */
    public function exportPdf()
    {
        $cutis = Cuti::with('pegawai')->get();
        $pdf = Pdf::loadView('cuti.export-pdf', compact('cutis'));
        return $pdf->download('data_cuti.pdf');
    }
}
