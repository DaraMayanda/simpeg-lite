<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Export PDF - Riwayat Jabatan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #999;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color:  #BCE6E3;;
        }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Data Riwayat Jabatan</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jabatan Lama</th>
                <th>Jabatan Baru</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Berakhir</th>
                <th>Tanggal Perubahan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riwayats as $index => $r)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $r->pegawai->nama }}</td>
                    <td>{{ $r->jabatan_lama ?? '-' }}</td>
                    <td>{{ $r->jabatan_baru }}</td>
                    <td>{{ $r->tanggal_masuk ?? '-' }}</td>
                    <td>{{ $r->tanggal_berakhir ?? '-' }}</td>
                    <td>{{ $r->tanggal_berubah }}</td>
                    <td>{{ $r->keterangan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
