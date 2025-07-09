# SIMPEG LITE

**Sistem Informasi Manajemen Kepegawaian Versi Ringan Berbasis Web dengan Laravel**

## 🎯 Tujuan Aplikasi
Menyediakan platform digital untuk:
- Menyimpan dan mengelola data pegawai
- Mencatat riwayat jabatan, cuti, dan pelatihan pegawai
- Mempermudah pencarian data karyawan
- Membantu tim HR/Admin dalam menghasilkan laporan kepegawaian dengan cepat

## 📋 Fitur Utama

| Modul             | Fungsi                                                                 |
|------------------|-------------------------------------------------------------------------|
| 🔹 Data Pegawai   | Tambah, edit, lihat, dan hapus data pegawai (NIP, nama, jabatan, dll)  |
| 🔹 Riwayat Jabatan| Catat dan kelola histori promosi/demosi pegawai                        |
| 🔹 Data Cuti      | Input pengajuan dan riwayat cuti pegawai                               |
| 🔹 Pelatihan      | Data pelatihan/kursus/kegiatan peningkatan SDM                         |
| 🔹 Laporan & Export| Laporan rekap pegawai, daftar cuti, atau pelatihan ke PDF              |
| 🔹 Dashboard       | Statistik: jumlah pegawai aktif, cuti, grafik jabatan, dll             |

## 🗃 Struktur Database (5 Tabel)

- `pegawais`: Data utama pegawai  
- `jabatan_riwayats`: Riwayat perubahan jabatan  
- `cutis`: Data cuti pegawai  
- `pelatihans`: Riwayat pelatihan  
- `users`: Admin login (opsional)

## 🔄 Alur Penggunaan Sistem
1. Admin login
2. Tambah data pegawai
3. Kelola riwayat jabatan
4. Input cuti
5. Cetak laporan
6. Lihat statistik

## 🧰 Tools Pengerjaan

| Komponen         | Tools                  |
|------------------|------------------------|
| Framework        | Laravel 10             |
| DBMS             | MySQL                  |
| Editor           | VS Code                |
| UI Design        | Tailwind / Bootstrap 5 |
| Diagram & ERD    | dbdiagram.io / draw.io |
| PDF Export       | Laravel DOMPDF         |
| Versi Kontrol    | Git + GitHub           |

---

## 👩‍💻 Developer
Dara Mayanda  
Mahasiswa Informatika – Universitas Malikussaleh  
GitHub: [@DaraMayanda](https://github.com/DaraMayanda)

