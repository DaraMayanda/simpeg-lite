@extends('layout')

@section('content')
<style>
    /* FINAL STYLE FORM PEGAWAI */
    .form-table {
        border-collapse: collapse;
        border: none;
        width: 100%;
    }

    .form-table td {
        border: none;
        padding: 6px;
        vertical-align: middle;
    }

    .form-table input,
    .form-table select,
    .form-table textarea {
        border: none;
        border-radius: 4px;
        padding: 6px;
        width: 100%;
    }

    .form-table input:focus,
    .form-table select:focus,
    .form-table textarea:focus {
        outline: none;
        box-shadow: none;
    }
</style>

<div style="display: flex; justify-content: center;">
    <form action="{{ route('pegawai.store') }}" method="POST" style="background-color: rgb(75, 133, 141); padding: 15px; border-radius: 10px; max-width: 350px; width: 100%; font-size: 14px;">
        @csrf

        <h3 style="text-align: center; margin-bottom: 12px;">Tambah Pegawai</h3>

        <table class="form-table">
            <tr>
                <td style="width: 40%;"><label for="nip">NIP:</label></td>
                <td><input type="text" name="nip" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td><label for="jabatan">Jabatan:</label></td>
                <td><input type="text" name="jabatan" required></td>
            </tr>
            <tr>
                <td><label for="golongan">Golongan:</label></td>
                <td><input type="text" name="golongan" required></td>
            </tr>
            <tr>
                <td><label for="status">Status:</label></td>
                <td>
                    <select name="status" required>
                        <option value="">-- Pilih --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Cuti">Cuti</option>
                        <option value="Pensiun">Pensiun</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Tgl Lahir:</label></td>
                <td><input type="date" name="tanggal_lahir"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td><textarea name="alamat" rows="2"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <button type="submit" class="btn">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
