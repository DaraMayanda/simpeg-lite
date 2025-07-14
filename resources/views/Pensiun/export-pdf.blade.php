<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Export PDF - Data Pensiun</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #BCE6E3; }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Laporan Data Pensiun</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tanggal Pensiun</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pensiuns as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->pegawai->nip ?? '-' }}</td>
                    <td>{{ $p->pegawai->nama ?? '-' }}</td>
                    <td>{{ $p->tanggal_pensiun ?? '-' }}</td>
                    <td>{{ $p->keterangan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
