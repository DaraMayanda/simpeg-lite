@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('pegawai.store') }}" method="POST" style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 500px; width: 100%;">
        @csrf

        <h3 style="text-align: center; margin-bottom: 15px;">Tambah Pegawai</h3>

        <table style="width: 100%;">
            <tr>
                <td><label for="nip">NIP:</label></td>
                <td><input type="text" name="nip" value="{{ old('nip') }}" required style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" name="nama" value="{{ old('nama') }}" required style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="jabatan">Jabatan:</label></td>
                <td>
                    <select name="jabatan" id="jabatanSelect" required style="width: 100%; padding: 5px; border-radius: 4px;">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Direktur" data-golongan="IV/d" data-pangkat="Pembina Utama Madya">Direktur</option>
                        <option value="Sekretaris Dinas" data-golongan="IV/c" data-pangkat="Pembina Utama Muda">Sekretaris Dinas</option>
                        <option value="Kepala Bagian" data-golongan="IV/b" data-pangkat="Pembina Tingkat I">Kepala Bagian</option>
                        <option value="Kepala Bidang" data-golongan="IV/a" data-pangkat="Pembina">Kepala Bidang</option>
                        <option value="Kepala Seksi" data-golongan="III/d" data-pangkat="Penata Tingkat I">Kepala Seksi</option>
                        <option value="Kepala Sub Bagian" data-golongan="III/c" data-pangkat="Penata">Kepala Sub Bagian</option>
                        <option value="Staf Administrasi Umum" data-golongan="II/b" data-pangkat="Pengatur Muda Tingkat I">Staf Administrasi Umum</option>
                        <option value="Operator TU" data-golongan="II/a" data-pangkat="Pengatur Muda">Operator TU</option>
                        <option value="Petugas Pelayanan" data-golongan="I/d" data-pangkat="Juru Tingkat I">Petugas Pelayanan</option>
                        <option value="Pengelola Surat Masuk" data-golongan="II/c" data-pangkat="Pengatur">Pengelola Surat Masuk</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="golongan">Golongan:</label></td>
                <td><input type="text" name="golongan" id="golonganInput" readonly style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="pangkat">Pangkat:</label></td>
                <td><input type="text" name="pangkat" id="pangkatInput" readonly style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="tanggal_masuk">Tanggal Masuk:</label></td>
                <td><input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="tanggal_lahir">Tanggal Lahir:</label></td>
                <td><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td>
                    <textarea name="alamat" rows="3" style="width: 100%; padding: 5px; border-radius: 4px;">{{ old('alamat') }}</textarea>
                </td>
            </tr>

            <tr>
                <td><label for="status">Status:</label></td>
                <td>
                    <select name="status" required style="width: 100%; padding: 5px; border-radius: 4px;">
                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Cuti" {{ old('status') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="Pensiun" {{ old('status') == 'Pensiun' ? 'selected' : '' }}>Pensiun</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: right; padding-top: 10px;">
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary" style="margin-right: 10px;">Batal</a>
                    <button type="submit" class="btn">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jabatanSelect = document.getElementById('jabatanSelect');
        const golonganInput = document.getElementById('golonganInput');
        const pangkatInput = document.getElementById('pangkatInput');

        jabatanSelect.addEventListener('change', function () {
            const selected = jabatanSelect.options[jabatanSelect.selectedIndex];
            golonganInput.value = selected.getAttribute('data-golongan') || '';
            pangkatInput.value = selected.getAttribute('data-pangkat') || '';
        });
    });
</script>
@endsection
