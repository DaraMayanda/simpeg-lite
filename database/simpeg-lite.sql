-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: simpeg_lite
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cutis`
--

DROP TABLE IF EXISTS `cutis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cutis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint(20) unsigned NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu',
  `jenis_cuti` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cutis_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `cutis_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cutis`
--

LOCK TABLES `cutis` WRITE;
/*!40000 ALTER TABLE `cutis` DISABLE KEYS */;
INSERT INTO `cutis` VALUES (4,12,'2025-07-16','2025-07-17','Disetujui','tahunan',NULL,'2025-07-13 00:57:40','2025-07-13 00:57:40');
/*!40000 ALTER TABLE `cutis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan_riwayats`
--

DROP TABLE IF EXISTS `jabatan_riwayats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan_riwayats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint(20) unsigned NOT NULL,
  `jabatan_lama` varchar(255) DEFAULT NULL,
  `jabatan_baru` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `tanggal_berubah` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jabatan_riwayats_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `jabatan_riwayats_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan_riwayats`
--

LOCK TABLES `jabatan_riwayats` WRITE;
/*!40000 ALTER TABLE `jabatan_riwayats` DISABLE KEYS */;
INSERT INTO `jabatan_riwayats` VALUES (13,9,'Staf Administrasi Umum','Staf Administrasi Umum','2023-08-24',NULL,NULL,'Jabatan awal dilantik','2025-07-13 04:54:23','2025-07-13 04:54:23'),(14,10,'Pengelola Surat Masuk','Operator TU','2024-11-14','2024-10-11','2024-10-21','Mutasi antar bidang sesuai kebutuhan organisasi.','2025-07-13 05:12:20','2025-07-13 05:12:20'),(15,11,'Kepala Sub Bagian','Kepala Seksi','2020-03-20','2020-02-20','2020-03-01','Rotasi jabatan rutin untuk penyegaran struktur organisasi.','2025-07-13 05:13:22','2025-07-13 05:13:22'),(16,12,'Kepala Bidang','Kepala Bagian','2020-11-26','2020-10-26','2020-11-05','Perubahan jabatan atas permintaan pribadi yang disetujui pimpinan.','2025-07-13 05:14:18','2025-07-13 05:14:18'),(17,13,'Sekretaris Dinas','Direktur','2015-11-21','2015-10-21','2015-10-31','Promosi jabatan berdasarkan hasil evaluasi kinerja tahunan.','2025-07-13 05:15:26','2025-07-13 05:15:26'),(19,14,'Staf Administrasi Umum','Kepala Sub Bagian','2023-09-12','2023-11-09','2023-11-19','Kenaikan Jabatan yang disetujui oleh pimpinan','2025-07-13 05:36:53','2025-07-13 05:36:53');
/*!40000 ALTER TABLE `jabatan_riwayats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_07_03_094432_create_pegawais_table',1),(6,'2025_07_03_094450_create_jabatan_riwayats_table',1),(7,'2025_07_03_094521_create_pelatihans_table',2),(8,'2025_07_07_041214_create_cutis_table',2),(9,'2025_07_07_062801_add_status_to_cutis_table',3),(11,'2025_07_07_063838_add_status_to_cutis_table',4),(12,'2025_07_12_083945_add_fields_to_pegawais_table',5),(13,'2025_07_12_092716_remove_status_from_pegawais_table',6),(14,'2025_07_12_093150_add_status_to_pegawais_table',7),(15,'2025_07_12_104041_add_tanggal_masuk_to_pegawais_table',8),(16,'2025_07_12_110136_create_riwayat_jabatans_table',9),(17,'2025_07_12_111953_add_tanggal_masuk_dan_berakhir_to_riwayat_jabatans_table',10),(18,'2025_07_12_115630_add_tanggal_masuk_berakhir_to_jabatan_riwayats_table',11),(19,'2025_07_13_071543_alter_nullable_tanggal_riwayat_jabatan',12),(20,'2025_07_13_101124_create_pensiuns_table',13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawais`
--

DROP TABLE IF EXISTS `pegawais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pegawais_nip_unique` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawais`
--

LOCK TABLES `pegawais` WRITE;
/*!40000 ALTER TABLE `pegawais` DISABLE KEYS */;
INSERT INTO `pegawais` VALUES (9,'230170155','Dara Mayanda','Staf Administrasi Umum','II/b','2005-04-26','2023-08-24','Kisaran','2025-07-12 02:51:49','2025-07-12 03:58:43','Pengatur Muda Tingkat I','Aktif'),(10,'230170145','Syahfida','Operator TU','II/a','2005-07-14','2024-11-14','Batu Bara','2025-07-13 00:38:42','2025-07-13 00:38:42','Pengatur Muda','Aktif'),(11,'230170999','Nadila humaira br sembiring','Kepala Seksi','III/d','2000-04-20','2020-03-20','Medan','2025-07-13 00:53:40','2025-07-13 00:53:55','Penata Tingkat I','Aktif'),(12,'230170987','Alifi Nurfadilah','Kepala Bagian','IV/b','1997-11-20','2020-11-26','Batu Bara','2025-07-13 00:56:50','2025-07-13 00:56:50','Pembina Tingkat I','Cuti'),(13,'230170432','Miranda Sasmita','Direktur','IV/d','1991-03-14','2015-11-21','Bener Meriah','2025-07-13 01:55:13','2025-07-13 01:55:13','Pembina Utama Madya','Aktif'),(14,'230170876','Nur Akmal','Kepala Sub Bagian','III/c','1970-08-24','2023-09-12','Lhoksuemawe','2025-07-13 02:00:44','2025-07-13 05:35:09','Penata','Pensiun');
/*!40000 ALTER TABLE `pegawais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelatihans`
--

DROP TABLE IF EXISTS `pelatihans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelatihans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint(20) unsigned NOT NULL,
  `nama_pelatihan` varchar(255) NOT NULL,
  `penyelenggara` varchar(255) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pelatihans_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `pelatihans_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelatihans`
--

LOCK TABLES `pelatihans` WRITE;
/*!40000 ALTER TABLE `pelatihans` DISABLE KEYS */;
INSERT INTO `pelatihans` VALUES (4,9,'Seminar workshop','Direktur utama','2025-07-15','2025-07-18','Berastagi','Workshop UMKM','2025-07-13 01:06:18','2025-07-13 01:06:18'),(5,10,'Pelatihan Soft Skill','Direktur utama','2025-08-21','2025-08-23','Takengon','Pelatihan komunikasi dan kepemimpinan','2025-07-13 01:07:18','2025-07-13 01:28:31'),(6,11,'Pelatihan Soft Skill & Manajerial','LAN RI (Lembaga Administrasi Negara)','2025-07-26','2025-07-27','Jakarta Pusat, DKI Jakarta','Leadership Training for Public Sector','2025-07-13 06:01:12','2025-07-13 06:01:12');
/*!40000 ALTER TABLE `pelatihans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pensiuns`
--

DROP TABLE IF EXISTS `pensiuns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pensiuns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint(20) unsigned NOT NULL,
  `tanggal_pensiun` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pensiuns_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `pensiuns_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pensiuns`
--

LOCK TABLES `pensiuns` WRITE;
/*!40000 ALTER TABLE `pensiuns` DISABLE KEYS */;
INSERT INTO `pensiuns` VALUES (2,14,'2025-02-01','Pensiun Karena Sakit Permanen','2025-07-13 03:33:36','2025-07-13 05:37:42');
/*!40000 ALTER TABLE `pensiuns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `riwayat_jabatans`
--

DROP TABLE IF EXISTS `riwayat_jabatans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riwayat_jabatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint(20) unsigned NOT NULL,
  `jabatan_lama` varchar(255) DEFAULT NULL,
  `jabatan_baru` varchar(255) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `tanggal_berubah` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_jabatans_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `riwayat_jabatans_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riwayat_jabatans`
--

LOCK TABLES `riwayat_jabatans` WRITE;
/*!40000 ALTER TABLE `riwayat_jabatans` DISABLE KEYS */;
/*!40000 ALTER TABLE `riwayat_jabatans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-14 15:11:00
