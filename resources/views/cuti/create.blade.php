@extends('layout')

@section('content')
<div style="display: flex; justify-content: center;">
    <form action="{{ route('cuti.store') }}" method="POST" style="background-color: rgb(75, 133, 141); padding: 20px; border-radius: 10px; max-width: 500px; width: 100%;">
        @csrf

        <h3 style="text-align: center; margin-bottom: 15px;">Tambah Data Cuti</h3>

        @if ($errors->any())
            <div class="alert alert-danger" style="background-color: #dc3545; color: white; padding: 10px; border-radius: 5px;">
                <ul class="mb-0" style="margin: 0; padding-left: 20px;">
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
                    <select name="pegawai_id" required style="width: 100%; padding: 5px; border-radius: 4px;">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($pegawai as $p)
                            <option value="{{ $p->id }}" {{ old('pegawai_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }} ({{ $p->nip }})
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="jenis_cuti">Jenis Cuti:</label></td>
                <td><input type="text" name="jenis_cuti" value="{{ old('jenis_cuti') }}" required style="width: 100%; padding: 5px; border-radius: 4px;"></td>
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
                <td><label for="status">Status:</label></td>
                <td>
                    <select name="status" required style="width: 100%; padding: 5px; border-radius: 4px;">
                        <option value="Menunggu" {{ old('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Disetujui" {{ old('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
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
                    <a href="{{ route('cuti.index') }}" class="btn btn-secondary" style="margin-right: 10px;">Batal</a>
                    <button type="submit" class="btn">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
