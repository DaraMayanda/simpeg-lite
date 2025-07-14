@extends('layout')

@section('content')
    <h2 class="section-title text-left">👥 Data Pegawai</h2>

    <div style="margin-bottom: 20px;">
        <a href="{{ route('pegawai.create') }}" class="btn">+ Tambah Pegawai</a>
        <a href="{{ route('pegawai.export.pdf') }}" class="btn" style="background-color: darkgreen;">📄 Export PDF</a>
    </div>

    <table class="table" style="width: 100%; border-collapse: collapse; background: rgb(75, 133, 141);">
        <thead style="background: #3f8c9c; color: white;">
            <tr>
                <th style="text-align: center; padding: 10px;">NIP</th>
                <th style="text-align: center; padding: 10px;">Nama</th>
                <th style="text-align: center; padding: 10px;">Jabatan</th>
                <th style="text-align: center; padding: 10px;">Golongan</th>
                <th style="text-align: center; padding: 10px;">Status</th>
                <th style="text-align: center; padding: 10px;">Tanggal Lahir</th>
                <th style="text-align: center; padding: 10px;">Tanggal Masuk</th>
                <th style="text-align: center; padding: 10px;">Alamat</th>
                <th style="text-align: center; padding: 10px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pegawai as $p)
                <tr style="text-align: center; border-bottom: 1px solid #ccc;">
                    <td style="padding: 10px;">{{ $p->nip }}</td>
                    <td style="padding: 10px;">{{ $p->nama }}</td>
                    <td style="padding: 10px;">{{ $p->jabatan }}</td>
                    <td style="padding: 10px;">{{ $p->golongan }}</td>
                    <td style="padding: 10px;">{{ $p->status }}</td>
                    <td style="padding: 10px;">{{ $p->tanggal_lahir }}</td>
                    <td style="padding: 10px;">{{ $p->tanggal_masuk ?? '-' }}</td>
                    <td style="padding: 10px;">{{ $p->alamat }}</td>
                    <td style="padding: 10px;">
                        <div style="display: flex; justify-content: center; gap: 6px;">
                            <a href="{{ route('pegawai.edit', $p->id) }}" class="btn btn-sm" style="background-color: #176ce4; color: white;">✏️ Edit</a>
                            <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center; padding: 15px;">Belum ada data pegawai.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
