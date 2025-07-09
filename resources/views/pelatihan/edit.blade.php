@extends('layout')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Data Pelatihan Pegawai</h3>

    <form action="{{ route('pelatihan.update', $pelatihan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pegawai_id" class="form-label">Nama Pegawai</label>
            <select name="pegawai_id" id="pegawai_id" class="form-select" required>
                @foreach($pegawai as $p)
                    <option value="{{ $p->id }}" {{ $pelatihan->pegawai_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
            <input type="text" name="nama_pelatihan" class="form-control" value="{{ $pelatihan->nama_pelatihan }}" required>
        </div>

        <div class="mb-3">
            <label for="penyelenggara" class="form-label">Penyelenggara</label>
            <input type="text" name="penyelenggara" class="form-control" value="{{ $pelatihan->penyelenggara }}">
        </div>

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ $pelatihan->tanggal_mulai }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ $pelatihan->tanggal_selesai }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $pelatihan->lokasi }}">
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ $pelatihan->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('pelatihan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
