@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('riwayat-jabatan.store') }}" method="POST" style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 500px; width: 100%;">
        @csrf

        <h3 style="text-align: center; margin-bottom: 15px;">Tambah Riwayat Jabatan</h3>

        <table style="width: 100%;">
            <tr>
                <td><label for="pegawai_id">Pegawai:</label></td>
                <td>
                    <select name="pegawai_id" id="pegawai_id" required style="width: 100%; padding: 5px; border-radius: 4px;">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach ($pegawais as $pegawai)
                            <option value="{{ $pegawai->id }}" {{ old('pegawai_id') == $pegawai->id ? 'selected' : '' }}>
                                {{ $pegawai->nama }} ({{ $pegawai->nip }})
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="jabatan_lama">Jabatan Lama:</label></td>
                <td>
                    <select name="jabatan_lama" required style="width: 100%; padding: 5px; border-radius: 4px;">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="Direktur">Direktur</option>
                        <option value="Sekretaris Dinas">Sekretaris Dinas</option>
                        <option value="Kepala Bagian">Kepala Bagian</option>
                        <option value="Kepala Bidang">Kepala Bidang</option>
                        <option value="Kepala Seksi">Kepala Seksi</option>
                        <option value="Kepala Sub Bagian">Kepala Sub Bagian</option>
                        <option value="Staf Administrasi Umum">Staf Administrasi Umum</option>
                        <option value="Operator TU">Operator TU</option>
                        <option value="Petugas Pelayanan">Petugas Pelayanan</option>
                        <option value="Pengelola Surat Masuk">Pengelola Surat Masuk</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="jabatan_baru">Jabatan Baru:</label></td>
                <td>
                    <input type="text" name="jabatan_baru" id="jabatan_baru" value="{{ old('jabatan_baru') }}" style="width: 100%; padding: 5px; border-radius: 4px;" readonly>
                </td>
            </tr>

            <tr>
                <td><label for="tanggal_berakhir">Tanggal Berakhir:</label></td>
                <td>
                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" value="{{ old('tanggal_berakhir') }}" style="width: 100%; padding: 5px; border-radius: 4px;">
                </td>
            </tr>

            <tr>
                <td><label for="tanggal_berubah">Tanggal Perubahan:</label></td>
                <td>
                    <input type="date" name="tanggal_berubah" id="tanggal_berubah" value="{{ old('tanggal_berubah') }}" style="width: 100%; padding: 5px; border-radius: 4px;" readonly>
                </td>
            </tr>

            <tr>
                <td><label for="tanggal_masuk">Tanggal Masuk:</label></td>
                <td>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}" style="width: 100%; padding: 5px; border-radius: 4px;" readonly>
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
                    <button type="submit" class="btn">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#pegawai_id').change(function () {
        const id = $(this).val();
        if (id) {
            $.get('/api/pegawai/' + id, function (data) {
                $('#jabatan_baru').val(data.jabatan);
                $('#tanggal_masuk').val(data.tanggal_masuk);
            });
        } else {
            $('#jabatan_baru').val('');
            $('#tanggal_masuk').val('');
        }
    });

    $('#tanggal_berakhir').change(function () {
        const tgl = new Date($(this).val());
        if (!isNaN(tgl)) {
            tgl.setDate(tgl.getDate() + 10);
            const next = tgl.toISOString().split('T')[0];
            $('#tanggal_berubah').val(next);
        }
    });
</script>
@endsection
