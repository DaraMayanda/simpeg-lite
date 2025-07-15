# SIMPEG LITE – Sistem Informasi Kepegawaian

**SIMPEG LITE** adalah aplikasi web berbasis Laravel yang dirancang untuk mempermudah pengelolaan data kepegawaian instansi secara digital, efisien, dan terstruktur. Sistem ini dibangun sebagai bagian dari portofolio pengembangan backend dan dapat digunakan oleh instansi pemerintahan maupun lembaga swasta.

## ✨ Fitur Utama

✅ Manajemen Data Pegawai  
✅ Riwayat Jabatan & Status Pegawai  
✅ Validasi Formulir Otomatis  
✅ Dashboard dan Filter Pencarian  
✅ Ekspor Data ke PDF  
✅ UI Responsif dengan Bootstrap 5

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|----------|------------|
| **Framework** | Laravel 9 |
| **Database** | MySQL |
| **Template Engine** | Blade |
| **Frontend** | Bootstrap 5, Bootstrap Icons |
| **PDF Generator** | DomPDF |

## 📁 Struktur Folder Penting

| Folder / File | Keterangan |
|---------------|------------|
| `/app` | Controller, Model, Middleware |
| `/resources/views` | Blade template (HTML) |
| `/routes/web.php` | Routing utama aplikasi |
| `/database` | Seeder dan migrasi MySQL |
| `/public` | Aset publik (CSS, JS, icon, gambar) |
| `.env.example` | Contoh konfigurasi environment |

## 📷 Tampilan Antarmuka

**🔹 Data Pegawai**  
📌 Menampilkan daftar pegawai lengkap dengan informasi jabatan, golongan, dan status.

**🔹 Riwayat Jabatan**  
📌 Melacak perubahan jabatan tiap pegawai beserta tanggal perubahan.

**🔹 Form Tambah Pegawai**  
📌 Form isian terstruktur dengan validasi otomatis.

> *(Tambahkan screenshot di sini jika ada, misalnya `/public/screenshots/dashboard.png`)*

## 🚀 Cara Menjalankan Proyek Ini

```bash
git clone https://github.com/DaraMayanda/simpeg-lite.git
cd simpeg-lite
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
