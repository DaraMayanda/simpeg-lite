<?php

namespace App\Http\Controllers;

use App\Models\JabatanRiwayat;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // ✅ INI HARUS DI SINI

class JabatanRiwayatController extends Controller
{
    public function index()
    {
        $riwayats = JabatanRiwayat::with('pegawai')->get();
        return view('riwayat-jabatan.index', compact('riwayats'));
    }

    public function create()
    {
        $pegawais = Pegawai::all();
        return view('riwayat-jabatan.create', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'jabatan_lama' => 'nullable|string|max:255',
            'jabatan_baru' => 'required|string|max:255',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_berakhir' => 'nullable|date',
            'tanggal_berubah' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ]);

        $data = $request->all();

        foreach (['tanggal_masuk', 'tanggal_berakhir', 'tanggal_berubah'] as $field) {
            if (isset($data[$field]) && ($data[$field] === 'null' || $data[$field] === '')) {
                $data[$field] = null;
            }
        }

        JabatanRiwayat::create($data);

        return redirect()->route('riwayat-jabatan.index')
                         ->with('success', 'Riwayat jabatan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'jabatan_lama' => 'nullable|string|max:255',
            'jabatan_baru' => 'nullable|string|max:255',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_berakhir' => 'nullable|date',
            'tanggal_berubah' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ]);

        $riwayat = JabatanRiwayat::findOrFail($id);
        $riwayat->update($request->all());

        return redirect()->route('riwayat-jabatan.index')
                         ->with('success', 'Riwayat jabatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $riwayat = JabatanRiwayat::findOrFail($id);
        $riwayat->delete();

        return redirect()->route('riwayat-jabatan.index')
                         ->with('success', 'Riwayat jabatan berhasil dihapus.');
    }

    public function edit($id)
    {
        $riwayat = JabatanRiwayat::findOrFail($id);
        $pegawais = Pegawai::all();
        return view('riwayat-jabatan.edit', compact('riwayat', 'pegawais'));
    }

    public function exportPdf()
    {
        $riwayats = JabatanRiwayat::with('pegawai')->get();
        $pdf = Pdf::loadView('riwayat-jabatan.export_pdf', compact('riwayats'));
        return $pdf->download('riwayat-jabatan.pdf');
    }
}
