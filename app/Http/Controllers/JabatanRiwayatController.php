<?php

namespace App\Http\Controllers;

use App\Models\JabatanRiwayat;
use App\Models\Pegawai;
use Illuminate\Http\Request;

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
            'jabatan_baru' => 'required|string|max:100',
            'tanggal_berubah' => 'required|date',
            'keterangan' => 'nullable|string|max:255', // validasi keterangan
        ]);

        JabatanRiwayat::create($request->all());

        return redirect()->route('riwayat-jabatan.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show(JabatanRiwayat $jabatanRiwayat)
    {
        return view('riwayat-jabatan.show', compact('jabatanRiwayat'));
    }

    public function edit($id)
    {
        $jabatanRiwayat = JabatanRiwayat::findOrFail($id);
        $pegawais = Pegawai::all();
        return view('riwayat-jabatan.edit', compact('jabatanRiwayat', 'pegawais'));
    }

    public function update(Request $request, JabatanRiwayat $jabatanRiwayat)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'jabatan_baru' => 'required|string|max:100',
            'tanggal_berubah' => 'required|date',
            'keterangan' => 'nullable|string|max:255', // validasi keterangan
        ]);

        $jabatanRiwayat->update($request->all());

        return redirect()->route('riwayat-jabatan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(JabatanRiwayat $jabatanRiwayat)
{
    $jabatanRiwayat->delete();

    return redirect()->route('riwayat-jabatan.index')->with('success', 'Data berhasil dihapus.');
}
}
