@extends('layout')

@section('content')
    <h2 class="section-title text-left">🧾 Data Pensiun Pegawai</h2>

    <a href="{{ route('pensiun.create') }}" class="btn" style="margin-bottom: 20px;">+ Tambah Data</a>
    <a href="{{ route('pensiun.export.pdf') }}" class="btn" style="background-color: darkgreen; color: white; margin-bottom: 15px;">📄 Export PDF</a>

    <table class="table" style="width: 100%; border-collapse: collapse; background: rgb(75, 133, 141);">
        <thead style="background: #3f8c9c; color: white;">
            <tr>
                <th style="text-align: center; padding: 10px;">No</th>
                <th style="text-align: center; padding: 10px;">Nama Pegawai</th>
                <th style="text-align: center; padding: 10px;">Tanggal Pensiun</th>
                <th style="text-align: center; padding: 10px;">Keterangan</th>
                <th style="text-align: center; padding: 10px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pensiuns as $index => $pensiun)
                <tr style="text-align: center; border-bottom: 1px solid #ccc;">
                    <td style="padding: 10px;">{{ $index + 1 }}</td>
                    <td style="padding: 10px;">{{ $pensiun->pegawai->nama ?? '-' }}</td>
                    <td style="padding: 10px;">
                        {{ \Carbon\Carbon::parse($pensiun->tanggal_pensiun)->format('d M Y') }}
                    </td>
                    <td style="padding: 10px;">{{ $pensiun->keterangan ?? '-' }}</td>
                    <td style="padding: 10px;">
                        <div style="display: flex; justify-content: center; gap: 6px;">
                            <a href="{{ route('pensiun.edit', $pensiun->id) }}" class="btn btn-sm" style="background-color: #176ce4ff; color: #fffff;">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('pensiun.destroy', $pensiun->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 15px;">Belum ada data pensiun.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
