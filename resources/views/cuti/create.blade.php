@extends('layout')


@section('content')
<div class="container">
    <h3 class="text-center">Tambah Data Cuti</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cuti.store') }}" method="POST">
        @csrf

        <label>Nama Pegawai</label>
        <select name="pegawai_id" class="form-control" required>
            <option value="">-- Pilih Pegawai --</option>
            @foreach($pegawai as $p)
                <option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->nip }})</option>
            @endforeach
        </select><br>

        <label>Jenis Cuti</label>
        <input type="text" name="jenis_cuti" class="form-control" required><br>

        <label>Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" class="form-control" required><br>

        <label>Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" class="form-control" required><br>

        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="Menunggu">Menunggu</option>
            <option value="Disetujui">Disetujui</option>
            <option value="Ditolak">Ditolak</option>
        </select><br>

        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control" rows="3"></textarea><br>

        <button type="submit" class="btn">Simpan</button>
        <a href="{{ route('cuti.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
