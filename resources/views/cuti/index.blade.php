@extends('layout')

@section('content')
    {{-- Judul kiri --}}
    <h2 class="section-title text-left">Data Cuti Pegawai</h2>

    {{-- Tombol tambah dan export --}}
    <div style="margin-bottom: 15px;">
        <a href="{{ route('cuti.create') }}" class="btn">➕ Tambah Data</a>
        <a href="{{ route('cuti.export.pdf') }}" class="btn" style="background-color: darkgreen;">📄 Export PDF</a>
    </div>

    {{-- Tabel data cuti --}}
    <table class="cuti-table">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis Cuti</th>
                <th class="text-center">Tanggal Mulai</th>
                <th class="text-center">Tanggal Selesai</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cutis as $index => $cuti)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $cuti->pegawai->nama }}</td>
                    <td class="text-center">{{ $cuti->jenis_cuti }}</td>
                    <td class="text-center">{{ $cuti->tanggal_mulai }}</td>
                    <td class="text-center">{{ $cuti->tanggal_selesai }}</td>
                    <td class="text-center">{{ $cuti->status }}</td>
                    <td class="text-center">
                        <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn">✏️ Edit</a>
                        <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" onclick="return confirm('Yakin hapus?')">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data cuti.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
