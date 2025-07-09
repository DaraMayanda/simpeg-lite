@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('riwayat-jabatan.store') }}" method="POST" style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 400px; width: 100%;">
        @csrf

        <h3 style="text-align: center; margin-bottom: 15px;">Tambah Riwayat Jabatan</h3>

        <table style="width: 100%;">
            <tr>
                <td><label for="pegawai_id">Pegawai:</label></td>
                <td>
                    <select name="pegawai_id" required style="width: 100%; padding: 5px; border-radius: 4px;">
                        @foreach ($pegawais as $pegawai)
                            <option value="{{ $pegawai->id }}">{{ $pegawai->nama }} ({{ $pegawai->nip }})</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="jabatan_lama">Jabatan Lama:</label></td>
                <td><input type="text" name="jabatan_lama" style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="jabatan_baru">Jabatan Baru:</label></td>
                <td><input type="text" name="jabatan_baru" required style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="tanggal_berubah">Tanggal:</label></td>
                <td><input type="date" name="tanggal_berubah" required style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="keterangan">Keterangan:</label></td>
                <td><textarea name="keterangan" rows="3" style="width: 100%; padding: 5px; border-radius: 4px;"></textarea></td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: right; padding-top: 10px;">
                    <button type="submit" class="btn">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection