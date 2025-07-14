<?php

namespace App\Http\Controllers;

use App\Models\Pensiun;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PensiunController extends Controller
{
    public function index()
{
    $pensiuns = \App\Models\Pensiun::with('pegawai')->get(); // Penting: with('pegawai')
    return view('pensiun.index', compact('pensiuns'));
}


    public function create()
    {
        $pegawais = Pegawai::all();
        return view('pensiun.create', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'tanggal_pensiun' => 'nullable|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Pensiun::create($request->all());

        return redirect()->route('pensiun.index')
                         ->with('success', 'Data pensiun berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pensiun = Pensiun::findOrFail($id);
        $pegawais = Pegawai::all();
        return view('pensiun.edit', compact('pensiun', 'pegawais'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'tanggal_pensiun' => 'nullable|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $pensiun = Pensiun::findOrFail($id);
        $pensiun->update($request->all());

        return redirect()->route('pensiun.index')
                         ->with('success', 'Data pensiun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pensiun = Pensiun::findOrFail($id);
        $pensiun->delete();

        return redirect()->route('pensiun.index')
                         ->with('success', 'Data pensiun berhasil dihapus.');
    }
    public function exportPdf()
{
    $pensiuns = \App\Models\Pensiun::with('pegawai')->get();
    $pdf = Pdf::loadView('pensiun.export-pdf', compact('pensiuns'));
    return $pdf->download('data_pensiun.pdf');
}
}
