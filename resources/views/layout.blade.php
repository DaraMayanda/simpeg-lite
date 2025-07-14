<!DOCTYPE html>
<html>
<head>
    <title>SIMPEG LITE</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 30px;
            background-color: rgb(115, 163, 168);
            color: white;
        }

        /* Styling tabel seragam untuk semua (pegawai, cuti, pelatihan) */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: rgb(75, 133, 141);
            color: white;
            border: 1px solid #999;
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background-color: rgb(60, 100, 110);
            padding: 10px 14px;
            border: 1px solid #999;
            text-align: center;
        }

        td {
            padding: 8px 12px;
            border: 1px solid #999;
        }

        .text-center { text-align: center; }
        .text-left { text-align: left; }

        a, button {
            text-decoration: none;
        }

        .btn {
            padding: 6px 12px;
            background-color: rgb(30, 114, 210);
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: rgb(20, 90, 170);
            cursor: pointer;
        }

        .alert-success {
            background-color: #28a745;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            color: white;
        }

        .title-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .title-container h1 {
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 0;
            color:rgb(251, 250, 250);
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }

        .title-container h1 span {
            color: #ffc107;
        }

        .title-container p {
            font-size: 16px;
            font-style: italic;
            color:rgb(250, 246, 246);
            margin-top: 5px;
        }

        .title-container hr {
            border-top: 2px solidrgb(19, 12, 12);
            width: 60%;
            margin: 10px auto;
        }

        .nav {
            margin-bottom: 20px;
            text-align: center;
        }

        .nav a {
            margin: 0 10px;
            color: white;
            font-weight: bold;
        }

        .nav a:hover {
            color: #ffc107;
        }

    </style>
</head>
<body>

    <div class="title-container">
        <h1>SIMPEG <span>LITE</span></h1>
        <p>Sistem Informasi Manajemen Kepegawaian</p>
        <hr>
    </div>

    <div class="nav">
    <a href="{{ route('dashboard') }}">🏠 Dashboard</a> |
    <a href="{{ route('pegawai.index') }}">Data Pegawai</a> |
    <a href="{{ route('riwayat-jabatan.index') }}">Riwayat Jabatan</a> |
    <a href="{{ route('cuti.index') }}">Data Cuti</a> |
    <a href="{{ route('pelatihan.index') }}">Data Pelatihan</a> |
    <a href="{{ route('pensiun.index') }}">Data Pensiun</a>
</div>

    

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tempat isi halaman --}}
    @yield('content')

    {{-- Tempat tambahan script dari halaman lain --}}
    @yield('scripts')  {{-- Diletakkan sebelum penutup </body> --}}

</body>
</html>
