<?php

// app/Http/Controllers/PelatihanController.php
namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihans = Pelatihan::with('pegawai')->latest()->get();
        return view('pelatihan.index', compact('pelatihans'));
    }

    public function create()
    {
        $pegawais = Pegawai::all();
        return view('pelatihan.create', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'nama_pelatihan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'penyelenggara' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        Pelatihan::create($request->all());
        return redirect()->route('pelatihan.index')->with('success', 'Data pelatihan berhasil ditambahkan.');
    }

    public function edit(Pelatihan $pelatihan)
    {
        $pegawais = Pegawai::all();
        return view('pelatihan.edit', compact('pelatihan', 'pegawais'));
    }

    public function update(Request $request, Pelatihan $pelatihan)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'nama_pelatihan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'penyelenggara' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $pelatihan->update($request->all());
        return redirect()->route('pelatihan.index')->with('success', 'Data pelatihan berhasil diperbarui.');
    }

    public function destroy(Pelatihan $pelatihan)
    {
        $pelatihan->delete();
        return redirect()->route('pelatihan.index')->with('success', 'Data pelatihan berhasil dihapus.');
    }

    public function exportPdf()
    {
        $pelatihans = Pelatihan::with('pegawai')->get();
        $pdf = Pdf::loadView('pelatihan.export-pdf', compact('pelatihans'));
        return $pdf->download('data_pelatihan.pdf');
    }
}

