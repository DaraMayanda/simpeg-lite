@extends('layout')

@section('content')
    <h2 class="section-title text-left">Data Riwayat Jabatan</h2>

    <a href="{{ route('riwayat-jabatan.create') }}" class="btn">+ Tambah Data</a>

    <table class="table" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jabatan Baru</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($riwayats as $index => $riwayat)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $riwayat->pegawai->nama }}</td>
                    <td>{{ $riwayat->jabatan_baru }}</td>
                    <td>{{ $riwayat->tanggal_berubah }}</td>
                    <td>{{ $riwayat->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('riwayat-jabatan.edit', $riwayat->id) }}" class="btn btn-sm">Edit</a>

                       <form action="{{ route('riwayat-jabatan.destroy', $riwayat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                  @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data riwayat jabatan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
