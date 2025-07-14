@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('riwayat-jabatan.update', $riwayat->id) }}" method="POST"
          style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 600px; width: 100%; color: white;">
        @csrf
        @method('PUT')

        <h3 style="text-align: center; margin-bottom: 15px;">✏️ Edit Riwayat Jabatan</h3>

        <table style="width: 100%;">
            {{-- Pegawai --}}
            <tr>
                <td><label for="pegawai_id">Nama Pegawai:</label></td>
                <td>
                    <select name="pegawai_id" required style="width: 100%; padding: 5px; border-radius: 5px;">
                        @foreach ($pegawais as $pegawai)
                            <option value="{{ $pegawai->id }}" {{ $riwayat->pegawai_id == $pegawai->id ? 'selected' : '' }}>
                                {{ $pegawai->nama }} ({{ $pegawai->nip }})
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            {{-- Jabatan Lama --}}
            <tr>
                <td><label for="jabatan_lama">Jabatan Lama:</label></td>
                <td>
                    <select name="jabatan_lama" required style="width: 100%; padding: 5px; border-radius: 5px;">
                        <option value="">-- Pilih Jabatan Lama --</option>
                        @foreach ([
                            'Direktur', 'Sekretaris Dinas', 'Kepala Bagian', 'Kepala Bidang',
                            'Kepala Seksi', 'Kepala Sub Bagian', 'Staf Administrasi Umum',
                            'Operator TU', 'Petugas Pelayanan', 'Pengelola Surat Masuk'
                        ] as $jabatan)
                            <option value="{{ $jabatan }}" {{ $riwayat->jabatan_lama == $jabatan ? 'selected' : '' }}>
                                {{ $jabatan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            {{-- Jabatan Baru --}}
            <tr>
                <td><label for="jabatan_baru">Jabatan Baru:</label></td>
                <td>
                    <select name="jabatan_baru" required style="width: 100%; padding: 5px; border-radius: 5px;">
                        <option value="">-- Pilih Jabatan Baru --</option>
                        @foreach ([
                            'Direktur', 'Sekretaris Dinas', 'Kepala Bagian', 'Kepala Bidang',
                            'Kepala Seksi', 'Kepala Sub Bagian', 'Staf Administrasi Umum',
                            'Operator TU', 'Petugas Pelayanan', 'Pengelola Surat Masuk'
                        ] as $jabatan)
                            <option value="{{ $jabatan }}" {{ $riwayat->jabatan_baru == $jabatan ? 'selected' : '' }}>
                                {{ $jabatan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            {{-- Tanggal --}}
            <tr>
                <td><label for="tanggal_berakhir">Tanggal Berakhir:</label></td>
                <td><input type="date" name="tanggal_berakhir" value="{{ $riwayat->tanggal_berakhir }}" style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>
            <tr>
                <td><label for="tanggal_berubah">Tanggal Perubahan:</label></td>
                <td><input type="date" name="tanggal_berubah" value="{{ $riwayat->tanggal_berubah }}" style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>
            <tr>
                <td><label for="tanggal_masuk">Tanggal Masuk:</label></td>
                <td><input type="date" name="tanggal_masuk" value="{{ $riwayat->tanggal_masuk }}" style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            {{-- Keterangan --}}
            <tr>
                <td><label for="keterangan">Keterangan:</label></td>
                <td>
                    <textarea name="keterangan" rows="3" style="width: 100%; padding: 5px; border-radius: 5px;">{{ $riwayat->keterangan }}</textarea>
                </td>
            </tr>

            {{-- Tombol --}}
            <tr>
                <td colspan="2" style="text-align: right; padding-top: 10px;">
                    <button type="submit" class="btn">💾 Simpan Perubahan</button>
                    <a href="{{ route('riwayat-jabatan.index') }}" class="btn" style="background-color: gray;">❌ Batal</a>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
