@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('pensiun.store') }}" method="POST" style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 550px; width: 100%;">
        @csrf

        <h3 style="text-align: center; margin-bottom: 15px;">Tambah Data Pensiun Pegawai</h3>

        <table style="width: 100%;">
            <tr>
                <td><label for="pegawai_id">Nama Pegawai:</label></td>
                <td>
                    <select name="pegawai_id" required style="width: 100%; padding: 5px; border-radius: 4px;">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($pegawais as $pegawai)
                            <option value="{{ $pegawai->id }}" {{ old('pegawai_id') == $pegawai->id ? 'selected' : '' }}>
                                {{ $pegawai->nama }} ({{ $pegawai->nip }})
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="tanggal_pensiun">Tanggal Pensiun:</label></td>
                <td>
                    <input type="date" name="tanggal_pensiun" value="{{ old('tanggal_pensiun') }}" required style="width: 100%; padding: 5px; border-radius: 4px;">
                </td>
            </tr>

            <tr>
                <td><label for="keterangan">Keterangan:</label></td>
                <td>
                    <textarea name="keterangan" rows="3" style="width: 100%; padding: 5px; border-radius: 4px;">{{ old('keterangan') }}</textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: right; padding-top: 10px;">
                    <a href="{{ route('pensiun.index') }}" class="btn btn-secondary" style="margin-right: 10px;">Kembali</a>
                    <button type="submit" class="btn">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
