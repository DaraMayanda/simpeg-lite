@extends('layout')

@section('content')
    <h2>Data Pegawai</h2>

    <a href="{{ route('pegawai.create') }}" class="btn">+ Tambah Pegawai</a>
    <a href="{{ route('pegawai.export.pdf') }}" class="btn" style="margin-bottom: 10px;">🖨️ Export PDF</a>

    <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Status</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawai as $p)
                <tr>
                    <td>{{ $p->nip }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->jabatan }}</td>
                    <td>{{ $p->golongan }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->tanggal_lahir }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $p->id) }}">Edit</a> |
                        <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
