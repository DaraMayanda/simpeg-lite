@extends('layout')

@section('content')
<h2>Edit Pegawai</h2>

<form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>NIP:</label><br>
    <input type="text" name="nip" value="{{ $pegawai->nip }}" required><br><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ $pegawai->nama }}" required><br><br>

    <label>Jabatan:</label><br>
    <input type="text" name="jabatan" value="{{ $pegawai->jabatan }}" required><br><br>

    <label>Golongan:</label><br>
    <input type="text" name="golongan" value="{{ $pegawai->golongan }}" required><br><br>

    <label>Status:</label><br>
    <select name="status" required>
        <option value="">-- Pilih Status --</option>
        <option value="Aktif" {{ $pegawai->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
        <option value="Cuti" {{ $pegawai->status == 'Cuti' ? 'selected' : '' }}>Cuti</option>
        <option value="Nonaktif" {{ $pegawai->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
    </select><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}"><br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat" rows="3" cols="40">{{ $pegawai->alamat }}</textarea><br><br>

    <button type="submit" class="btn">Update</button>
    <a href="{{ route('pegawai.index') }}">Batal</a>
</form>
@endsection
