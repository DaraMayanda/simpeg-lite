@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST"
          style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 600px; width: 100%; color: white;">
        @csrf
        @method('PUT')

        <h3 style="text-align: center; margin-bottom: 15px;">✏️ Edit Data Pelatihan</h3>

        <table style="width: 100%;">
            <tr>
                <td><label for="pegawai_id">Nama Pegawai:</label></td>
                <td>
                    <select name="pegawai_id" required style="width: 100%; padding: 5px; border-radius: 5px;">
                        @foreach($pegawais as $p)
                            <option value="{{ $p->id }}" {{ $pelatihan->pegawai_id == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="nama_pelatihan">Nama Pelatihan:</label></td>
                <td><input type="text" name="nama_pelatihan" value="{{ $pelatihan->nama_pelatihan }}" required
                           style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label for="penyelenggara">Penyelenggara:</label></td>
                <td><input type="text" name="penyelenggara" value="{{ $pelatihan->penyelenggara }}"
                           style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label for="tanggal_mulai">Tanggal Mulai:</label></td>
                <td><input type="date" name="tanggal_mulai" value="{{ $pelatihan->tanggal_mulai }}" required
                           style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label for="tanggal_selesai">Tanggal Selesai:</label></td>
                <td><input type="date" name="tanggal_selesai" value="{{ $pelatihan->tanggal_selesai }}" required
                           style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label for="lokasi">Lokasi:</label></td>
                <td><input type="text" name="lokasi" value="{{ $pelatihan->lokasi }}"
                           style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label for="keterangan">Keterangan:</label></td>
                <td>
                    <textarea name="keterangan" rows="3"
                              style="width: 100%; padding: 5px; border-radius: 5px;">{{ $pelatihan->keterangan }}</textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: right; padding-top: 10px;">
                    <button type="submit" class="btn">💾 Simpan Perubahan</button>
                    <a href="{{ route('pelatihan.index') }}" class="btn" style="background-color: gray;">❌ Batal</a>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
