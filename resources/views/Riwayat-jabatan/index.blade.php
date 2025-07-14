@extends('layout')

@section('content')
    <h2 class="section-title text-left">📋Data Riwayat Jabatan</h2>

    <a href="{{ route('riwayat-jabatan.create') }}" class="btn" style="margin-bottom: 10px;">+ Tambah Riwayat</a>
    <a href="{{ route('riwayat-jabatan.export.pdf') }}" class="btn" style="background-color: darkgreen;">📄 Export PDF</a>

    <table class="table" style="width: 100%; border-collapse: collapse; background: rgb(75, 133, 141);">
        <thead style="background: #3f8c9c; color: white;">
            <tr>
                <th style="text-align: center; padding: 10px;">No</th>
                <th style="text-align: center; padding: 10px;">Nama Pegawai</th>
                <th style="text-align: center; padding: 10px;">Jabatan Lama</th>
                <th style="text-align: center; padding: 10px;">Jabatan Baru</th>
                <th style="text-align: center; padding: 10px;">Tanggal Berakhir</th>
                <th style="text-align: center; padding: 10px;">Tanggal Perubahan</th>
                <th style="text-align: center; padding: 10px;">Tanggal Masuk</th>
                <th style="text-align: center; padding: 10px;">Keterangan</th>
                <th style="text-align: center; padding: 10px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayats as $index => $riwayat)
                <tr style="text-align: center; border-bottom: 1px solid #ccc;">
                    <td style="padding: 10px;">{{ $index + 1 }}</td>
                    <td style="padding: 10px;">{{ $riwayat->pegawai->nama }}</td>
                    <td style="padding: 10px;">{{ $riwayat->jabatan_lama ?? '-' }}</td>
                    <td style="padding: 10px;">{{ $riwayat->jabatan_baru }}</td>
                    <td style="padding: 10px;">{{ $riwayat->tanggal_berakhir ?? '-' }}</td>
                    <td style="padding: 10px;">{{ $riwayat->tanggal_berubah ?? '-' }}</td>
                    <td style="padding: 10px;">{{ $riwayat->tanggal_masuk ?? '-' }}</td>
                    <td style="padding: 10px;">{{ $riwayat->keterangan ?? '-' }}</td>
                    <td style="padding: 10px;">
                        <div style="display: flex; justify-content: center; gap: 6px;">
                            <a href="{{ route('riwayat-jabatan.edit', $riwayat->id) }}" 
                               class="btn btn-sm" 
                               style="background-color: #176ce4; color: white;">✏️ Edit</a>

                            <form action="{{ route('riwayat-jabatan.destroy', $riwayat->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center; padding: 15px;">Belum ada riwayat jabatan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
