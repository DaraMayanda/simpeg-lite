@extends('layout')


@section('content')
<div class="container">
    <h3 class="text-center">Edit Data Cuti</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Pegawai</label>
        <select name="pegawai_id" class="form-control" required>
            @foreach($pegawai as $p)
                <option value="{{ $p->id }}" {{ $cuti->pegawai_id == $p->id ? 'selected' : '' }}>
                    {{ $p->nama }} ({{ $p->nip }})
                </option>
            @endforeach
        </select><br>

        <label>Jenis Cuti</label>
        <input type="text" name="jenis_cuti" value="{{ $cuti->jenis_cuti }}" class="form-control" required><br>

        <label>Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" value="{{ $cuti->tanggal_mulai }}" class="form-control" required><br>

        <label>Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" value="{{ $cuti->tanggal_selesai }}" class="form-control" required><br>

        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="Menunggu" {{ $cuti->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="Disetujui" {{ $cuti->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
            <option value="Ditolak" {{ $cuti->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select><br>

        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ $cuti->keterangan }}</textarea><br>

        <button type="submit" class="btn">Simpan Perubahan</button>
        <a href="{{ route('cuti.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
