@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('pelatihan.store') }}" method="POST" style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 550px; width: 100%;">
        @csrf

        <h3 style="text-align: center; margin-bottom: 15px;">Tambah Data Pelatihan Pegawai</h3>

        <table style="width: 100%;">
            <tr>
                <td><label for="pegawai_id">Nama Pegawai:</label></td>
                <td>
                    <select name="pegawai_id" required style="width: 100%; padding: 5px; border-radius: 4px;">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($pegawais as $p)
                            <option value="{{ $p->id }}" {{ old('pegawai_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="nama_pelatihan">Nama Pelatihan:</label></td>
                <td><input type="text" name="nama_pelatihan" value="{{ old('nama_pelatihan') }}" required style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="penyelenggara">Penyelenggara:</label></td>
                <td><input type="text" name="penyelenggara" value="{{ old('penyelenggara') }}" style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="tanggal_mulai">Tanggal Mulai:</label></td>
                <td><input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="tanggal_selesai">Tanggal Selesai:</label></td>
                <td><input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="lokasi">Lokasi:</label></td>
                <td><input type="text" name="lokasi" value="{{ old('lokasi') }}" style="width: 100%; padding: 5px; border-radius: 4px;"></td>
            </tr>

            <tr>
                <td><label for="keterangan">Keterangan:</label></td>
                <td>
                    <textarea name="keterangan" rows="3" style="width: 100%; padding: 5px; border-radius: 4px;">{{ old('keterangan') }}</textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: right; padding-top: 10px;">
                    <a href="{{ route('pelatihan.index') }}" class="btn btn-secondary" style="margin-right: 10px;">Kembali</a>
                    <button type="submit" class="btn">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
