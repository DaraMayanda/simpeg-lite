<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // <- Tambahkan ini

class PegawaiController extends Controller
{
    // Tampilkan semua data pegawai
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    // Tampilkan form tambah pegawai
    public function create()
    {
        return view('pegawai.create');
    }

    // Simpan data pegawai baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawais',
            'nama' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'status' => 'required',
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Tampilkan form edit untuk pegawai tertentu
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    // Update data pegawai ke database
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nip' => 'required|unique:pegawais,nip,' . $pegawai->id,
            'nama' => 'required',
            'jabatan' => 'required',
            'golongan' => 'required',
            'status' => 'required',
        ]);

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Data berhasil diperbarui');
    }

    // Hapus data pegawai
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data berhasil dihapus');
    }

    // Export PDF
    public function exportPdf()
    {
        $pegawais = Pegawai::all();
        $pdf = Pdf::loadView('pegawai.export-pdf', compact('pegawais'));
        return $pdf->download('data_pegawai.pdf');
    }
}
