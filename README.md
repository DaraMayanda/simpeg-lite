# SIMPEG LITE

**Sistem Informasi Manajemen Kepegawaian - Versi Ringan**

SIMPEG LITE adalah aplikasi berbasis Laravel yang dirancang untuk memudahkan pengelolaan data kepegawaian, seperti data pegawai aktif, cuti, pensiun, riwayat jabatan, pelatihan, dan laporan PDF.

## ✨ Fitur Utama

- 📋 Manajemen Data Pegawai
- 📈 Dashboard Statistik (Pegawai Aktif, Cuti, Pensiun, dan Grafik Pelatihan)
- 📝 Riwayat Jabatan dengan ekspor PDF
- 📊 Visualisasi Grafik Pelatihan Bulanan
- 📤 Ekspor laporan ke PDF (DomPDF)
- 💻 UI Responsif menggunakan Bootstrap

## 🛠️ Teknologi yang Digunakan

- **Framework**: Laravel 9
- **Frontend**: Blade + Bootstrap 5
- **Database**: MySQL
- **Export PDF**: DomPDF

## 📁 Struktur Folder Penting

| Folder / File            | Deskripsi                                 |
|--------------------------|-------------------------------------------|
| `app/`                   | Controller, Model, Middleware             |
| `routes/web.php`         | Routing aplikasi                          |
| `resources/views/`       | Template tampilan Blade                   |
| `public/`                | Aset publik (CSS, JS, Gambar)             |
| `database/`              | Seeder dan Migrations                     |
| `storage/`               | File penyimpanan                          |

## 📷 Screenshot Antarmuka

### 📌 Dashboard SIMPEG LITE
![Dashboard SIMPEG](public/screenshots/DashboardSimpeg.jpg)

### 📌 Riwayat Jabatan Pegawai
![Riwayat Jabatan](public/screenshots/DataRiwayatJabatansimpeg.jpg)

### 📌 Grafik Pelatihan Pegawai
![Grafik Pelatihan](public/screenshots/GrafikPelatihan.jpg)

### 📌 Laporan PDF Ekspor
![Laporan PDF](public/screenshots/DompdfRiwayatJabatan.jpg)

## 🚀 Cara Menjalankan Aplikasi

```bash
git clone https://github.com/DaraMayanda/simpeg-lite.git
cd simpeg-lite
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
