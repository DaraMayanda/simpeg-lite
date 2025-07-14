@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('cuti.update', $cuti->id) }}" method="POST"
          style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 600px; width: 100%; color: white;">
        @csrf
        @method('PUT')

        <h3 style="text-align: center; margin-bottom: 15px;">✏️ Edit Data Cuti</h3>

        @if ($errors->any())
            <div style="background: #c0392b; color: white; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table style="width: 100%;">
            <tr>
                <td><label for="pegawai_id">Nama Pegawai:</label></td>
                <td>
                    <select name="pegawai_id" required style="width: 100%; padding: 5px; border-radius: 5px;">
                        @foreach($pegawai as $p)
                            <option value="{{ $p->id }}" {{ $cuti->pegawai_id == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }} ({{ $p->nip }})
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="jenis_cuti">Jenis Cuti:</label></td>
                <td><input type="text" name="jenis_cuti" value="{{ $cuti->jenis_cuti }}" required
                           style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label for="tanggal_mulai">Tanggal Mulai:</label></td>
                <td><input type="date" name="tanggal_mulai" value="{{ $cuti->tanggal_mulai }}" required
                           style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label for="tanggal_selesai">Tanggal Selesai:</label></td>
                <td><input type="date" name="tanggal_selesai" value="{{ $cuti->tanggal_selesai }}" required
                           style="width: 100%; padding: 5px; border-radius: 5px;"></td>
            </tr>

            <tr>
                <td><label for="status">Status:</label></td>
                <td>
                    <select name="status" required style="width: 100%; padding: 5px; border-radius: 5px;">
                        <option value="Menunggu" {{ $cuti->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Disetujui" {{ $cuti->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="Ditolak" {{ $cuti->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="keterangan">Keterangan:</label></td>
                <td>
                    <textarea name="keterangan" rows="3" style="width: 100%; padding: 5px; border-radius: 5px;">{{ $cuti->keterangan }}</textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: right; padding-top: 10px;">
                    <button type="submit" class="btn">💾 Simpan Perubahan</button>
                    <a href="{{ route('cuti.index') }}" class="btn" style="background-color: gray;">❌ Batal</a>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
