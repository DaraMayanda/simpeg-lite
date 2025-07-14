<!DOCTYPE html>
<html>
<head>
    <title>Data Cuti Pegawai</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color:  #BCE6E3; }
        h3 { text-align: center; }
    </style>
</head>
<body>
    <h3>Data Cuti Pegawai</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jenis Cuti</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cutis as $index => $cuti)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $cuti->pegawai->nama }}</td>
                    <td>{{ $cuti->jenis_cuti }}</td>
                    <td>{{ $cuti->tanggal_mulai }}</td>
                    <td>{{ $cuti->tanggal_selesai }}</td>
                    <td>{{ $cuti->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
