@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST"
          style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 600px; width: 100%;">
        @csrf
        @method('PUT')

        <h3 style="text-align: center; margin-bottom: 15px; color: white;">✏️ Edit Data Pegawai</h3>

        <table style="width: 100%; color: white;">
            <tr>
                <td><label>NIP:</label></td>
                <td><input type="text" name="nip" value="{{ $pegawai->nip }}" required style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label>Nama:</label></td>
                <td><input type="text" name="nama" value="{{ $pegawai->nama }}" required style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label>Jabatan:</label></td>
                <td>
                    <select name="jabatan" id="jabatanSelect" required style="width: 100%; padding: 5px; border-radius: 5px;">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach([
                            ['Direktur', 'IV/d', 'Pembina Utama Madya'],
                            ['Sekretaris Dinas', 'IV/c', 'Pembina Utama Muda'],
                            ['Kepala Bagian', 'IV/b', 'Pembina Tingkat I'],
                            ['Kepala Bidang', 'IV/a', 'Pembina'],
                            ['Kepala Seksi', 'III/d', 'Penata Tingkat I'],
                            ['Kepala Sub Bagian', 'III/c', 'Penata'],
                            ['Staf Administrasi Umum', 'II/b', 'Pengatur Muda Tingkat I'],
                            ['Operator TU', 'II/a', 'Pengatur Muda'],
                            ['Petugas Pelayanan', 'I/d', 'Juru Tingkat I'],
                            ['Pengelola Surat Masuk', 'II/c', 'Pengatur']
                        ] as [$jabatan, $golongan, $pangkat])
                            <option value="{{ $jabatan }}"
                                    data-golongan="{{ $golongan }}"
                                    data-pangkat="{{ $pangkat }}"
                                    {{ $pegawai->jabatan == $jabatan ? 'selected' : '' }}>
                                {{ $jabatan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label>Golongan:</label></td>
                <td><input type="text" name="golongan" id="golonganInput" value="{{ $pegawai->golongan }}" readonly style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label>Pangkat:</label></td>
                <td><input type="text" name="pangkat" id="pangkatInput" value="{{ $pegawai->pangkat }}" readonly style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label>Tanggal Lahir:</label></td>
                <td><input type="date" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}" style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label>Tanggal Masuk:</label></td>
                <td><input type="date" name="tanggal_masuk" value="{{ $pegawai->tanggal_masuk }}" style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label>Alamat:</label></td>
                <td><textarea name="alamat" rows="3" style="width: 100%; padding: 5px; border-radius: 5px;">{{ $pegawai->alamat }}</textarea></td>
            </tr>

            <tr>
                <td><label>Status:</label></td>
                <td>
                    <select name="status" style="width: 100%; padding: 5px; border-radius: 5px;">
                        <option value="Aktif" {{ $pegawai->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Cuti" {{ $pegawai->status == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="Pensiun" {{ $pegawai->status == 'Pensiun' ? 'selected' : '' }}>Pensiun</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: right; padding-top: 10px;">
                    <button type="submit" class="btn">💾 Simpan Perubahan</button>
                    <a href="{{ route('pegawai.index') }}" class="btn" style="background-color: gray;">❌ Batal</a>
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

        function updateFields() {
            const selected = jabatanSelect.options[jabatanSelect.selectedIndex];
            golonganInput.value = selected.getAttribute('data-golongan') || '';
            pangkatInput.value = selected.getAttribute('data-pangkat') || '';
        }

        jabatanSelect.addEventListener('change', updateFields);
        updateFields(); // isi otomatis saat halaman dibuka
    });
</script>
@endsection
