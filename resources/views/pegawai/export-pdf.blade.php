<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Export PDF - Data Pegawai</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #BCE6E3; }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Laporan Data Pegawai</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Status</th>
                <th>Tanggal Lahir</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawais as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nip }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->jabatan }}</td>
                    <td>{{ $p->golongan }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->tanggal_lahir ?? '-' }}</td>
                    <td>{{ $p->tanggal_masuk ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
