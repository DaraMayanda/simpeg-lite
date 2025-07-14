@extends('layout')

@section('content')
    <h2 class="section-title text-left">📚 Data Pelatihan Pegawai</h2>

    <a href="{{ route('pelatihan.create') }}" class="btn" style="margin-bottom: 20px;">+ Tambah Data</a>
    <a href="{{ route('pelatihan.export.pdf') }}" class="btn" style="background-color: darkgreen; color: white; margin-bottom: 15px;">
    📄 Export PDF
</a>

    <table class="table" style="width: 100%; border-collapse: collapse; background: rgb(75, 133, 141);">
        <thead style="background: #3f8c9c; color: white;">
            <tr>
                <th style="text-align: center; padding: 10px;">No</th>
                <th style="text-align: center; padding: 10px;">Nama Pegawai</th>
                <th style="text-align: center; padding: 10px;">Nama Pelatihan</th>
                <th style="text-align: center; padding: 10px;">Tanggal</th>
                <th style="text-align: center; padding: 10px;">Penyelenggara</th>
                <th style="text-align: center; padding: 10px;">Keterangan</th>
                <th style="text-align: center; padding: 10px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelatihans as $index => $pelatihan)
                <tr style="text-align: center; border-bottom: 1px solid #ccc;">
                    <td style="padding: 10px;">{{ $index + 1 }}</td>
                    <td style="padding: 10px;">{{ $pelatihan->pegawai->nama }}</td>
                    <td style="padding: 10px;">{{ $pelatihan->nama_pelatihan }}</td>
                    <td style="padding: 10px;">
                        {{ \Carbon\Carbon::parse($pelatihan->tanggal_mulai)->format('d M Y') }} -
                        {{ \Carbon\Carbon::parse($pelatihan->tanggal_selesai)->format('d M Y') }}
                    </td>
                    <td style="padding: 10px;">{{ $pelatihan->penyelenggara }}</td>
                    <td style="padding: 10px;">{{ $pelatihan->keterangan ?? '-' }}</td>
                    <td style="padding: 10px;">
                        <div style="display: flex; justify-content: center; gap: 6px;">
                            <a href="{{ route('pelatihan.edit', $pelatihan->id) }}" class="btn btn-sm" style="background-color: #176ce4ff; color:  #ffffffff">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('pelatihan.destroy', $pelatihan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 15px;">Belum ada data pelatihan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
