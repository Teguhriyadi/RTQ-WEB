-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_tahfidz
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2022_03_03_230640_create_tb_status_absen_table',1),(5,'2022_03_03_230655_create_tb_pesan_table',1),(6,'2022_03_03_230709_create_tb_asatidz_table',1),(7,'2022_03_03_230722_create_tb_santri_table',1),(8,'2022_03_03_230737_create_tb_last_login_table',1),(9,'2022_03_03_230752_create_tb_role_table',1),(10,'2022_03_03_231758_create_tb_absensi_table',1),(11,'2022_03_07_110347_create_tb_jenjang_table',1),(12,'2022_03_24_234339_create_tb_admin_lokasi_rt',1),(13,'2022_04_03_180148_create_tb_kategori_penilaian_table',1),(14,'2022_04_11_153051_create_tb_iuran_table',1),(15,'2022_04_11_161934_create_tb_wali_santri_table',1),(16,'2022_04_16_001140_create_tb_kelas_table',1),(17,'2022_04_19_141454_create_tb_absensi_asatidz_table',1),(18,'2022_04_21_002552_create_tb_santri_lulus_table',1),(19,'2022_04_22_062736_create_tb_halaqah_table',1),(20,'2022_04_22_101010_create_tb_lokasi_rt_table',1),(21,'2022_05_03_134841_create_tb_kategori_pelajaran_table',1),(22,'2022_05_03_174414_create_tb_pelajaran_mulok_table',1),(23,'2022_05_08_233644_create_tb_kategori_table',1),(24,'2022_05_09_101722_create_tb_blog_table',1),(25,'2022_05_11_093809_create_tb_setting_iuran_table',1),(26,'2022_05_11_182353_create_tb_status_validasi_table',1),(27,'2022_05_19_214059_create_tb_setting_kategori_tadribat_table',1),(28,'2022_05_19_225433_create_tb_pelajaran_table',1),(29,'2022_05_24_173644_create_tb_profil_web_table',1),(30,'2022_05_24_175925_create_tb_tentang_kami_table',1),(31,'2022_05_24_212420_create_tb_nilai_table',1),(32,'2022_05_25_120213_create_tb_struktur_organisasi_table',1),(33,'2022_05_25_120646_create_tb_jabatan_table',1),(34,'2022_05_29_194746_create_tb_kelas_halaqah_table',1),(35,'2022_05_31_075221_create_hak_akses_table',1),(36,'2022_05_31_084522_create_tb_nilai_kategori_table',1),(37,'2022_05_31_143312_create_tb_quran_table',1),(38,'2022_06_05_155152_create_tb_nominal_iuran_table',1),(39,'2022_06_06_153200_create_tb_administrasi_table',1),(40,'2022_06_07_194320_create_tb_besaran_iuran_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `tb_absensi`
--

DROP TABLE IF EXISTS `tb_absensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_absensi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_santri` int(11) NOT NULL,
  `id_status_absen` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_asatidz` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_absensi`
--

LOCK TABLES `tb_absensi` WRITE;
/*!40000 ALTER TABLE `tb_absensi` DISABLE KEYS */;
INSERT INTO `tb_absensi` VALUES (2,1,1,'Hadir',1,'2022-07-09 04:25:06','2022-07-09 04:25:06'),(3,1,1,'Hadir',1,'2022-07-10 04:25:06','2022-07-09 04:25:06'),(4,2,1,'Hadir',1,'2022-07-10 04:25:06','2022-07-09 04:25:06'),(5,1,2,'Sakit',1,'2022-07-11 04:25:06','2022-07-09 04:25:06');
/*!40000 ALTER TABLE `tb_absensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_absensi_asatidz`
--

DROP TABLE IF EXISTS `tb_absensi_asatidz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_absensi_asatidz` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_asatidz` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_absensi_asatidz`
--

LOCK TABLES `tb_absensi_asatidz` WRITE;
/*!40000 ALTER TABLE `tb_absensi_asatidz` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_absensi_asatidz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_admin_lokasi_rt`
--

DROP TABLE IF EXISTS `tb_admin_lokasi_rt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin_lokasi_rt` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin_lokasi_rt`
--

LOCK TABLES `tb_admin_lokasi_rt` WRITE;
/*!40000 ALTER TABLE `tb_admin_lokasi_rt` DISABLE KEYS */;
INSERT INTO `tb_admin_lokasi_rt` VALUES (2,'SMA','RTQ-001','2022-07-08 01:38:00','2022-07-08 01:38:00');
/*!40000 ALTER TABLE `tb_admin_lokasi_rt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_administrasi`
--

DROP TABLE IF EXISTS `tb_administrasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_administrasi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_santri` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_administrasi`
--

LOCK TABLES `tb_administrasi` WRITE;
/*!40000 ALTER TABLE `tb_administrasi` DISABLE KEYS */;
INSERT INTO `tb_administrasi` VALUES (1,1,1000,'2022-07-08 09:09:47','2022-07-08 09:09:47'),(2,2,5000,'2022-07-08 09:14:39','2022-07-08 09:14:39'),(3,1,1000,'2022-07-08 09:19:40','2022-07-08 09:19:40'),(5,1,18000,'2022-07-08 09:31:11','2022-07-08 09:31:11');
/*!40000 ALTER TABLE `tb_administrasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_asatidz`
--

DROP TABLE IF EXISTS `tb_asatidz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_asatidz` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_induk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ktp` int(11) DEFAULT NULL,
  `pendidikan_terakhir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktivitas_utama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivasi_mengajar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_asatidz`
--

LOCK TABLES `tb_asatidz` WRITE;
/*!40000 ALTER TABLE `tb_asatidz` DISABLE KEYS */;
INSERT INTO `tb_asatidz` VALUES (4,'2003077',2003077,'SMA','Mengajar','Mengaji','2022-07-09 04:22:08','2022-07-09 04:22:08');
/*!40000 ALTER TABLE `tb_asatidz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_besaran_iuran`
--

DROP TABLE IF EXISTS `tb_besaran_iuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_besaran_iuran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `besaran` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_besaran_iuran`
--

LOCK TABLES `tb_besaran_iuran` WRITE;
/*!40000 ALTER TABLE `tb_besaran_iuran` DISABLE KEYS */;
INSERT INTO `tb_besaran_iuran` VALUES (1,10000,'2022-07-08 09:05:00','2022-07-08 09:05:00');
/*!40000 ALTER TABLE `tb_besaran_iuran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_blog`
--

DROP TABLE IF EXISTS `tb_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_blog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tb_blog_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_blog`
--

LOCK TABLES `tb_blog` WRITE;
/*!40000 ALTER TABLE `tb_blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_hak_akses`
--

DROP TABLE IF EXISTS `tb_hak_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_hak_akses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_hak_akses`
--

LOCK TABLES `tb_hak_akses` WRITE;
/*!40000 ALTER TABLE `tb_hak_akses` DISABLE KEYS */;
INSERT INTO `tb_hak_akses` VALUES (1,1,1),(2,2,2),(3,3,4),(4,4,3);
/*!40000 ALTER TABLE `tb_hak_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_halaqah`
--

DROP TABLE IF EXISTS `tb_halaqah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_halaqah` (
  `kode_halaqah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_halaqah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`kode_halaqah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_halaqah`
--

LOCK TABLES `tb_halaqah` WRITE;
/*!40000 ALTER TABLE `tb_halaqah` DISABLE KEYS */;
INSERT INTO `tb_halaqah` VALUES ('HLQ-001','Singaparna','RTQ-001');
/*!40000 ALTER TABLE `tb_halaqah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_iuran`
--

DROP TABLE IF EXISTS `tb_iuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_iuran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_santri` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status_validasi` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_iuran`
--

LOCK TABLES `tb_iuran` WRITE;
/*!40000 ALTER TABLE `tb_iuran` DISABLE KEYS */;
INSERT INTO `tb_iuran` VALUES (1,1,1000,'2022-07-08','https://rtq-freelance.my.id/gambar/gambar_user.png',2,1,'2022-07-08 09:33:18','2022-07-08 09:33:18'),(2,1,2000,'2022-07-08','https://rtq-freelance.my.id/gambar/gambar_user.png',2,1,'2022-07-08 09:33:18','2022-07-08 09:33:18');
/*!40000 ALTER TABLE `tb_iuran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jabatan`
--

DROP TABLE IF EXISTS `tb_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_jabatan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jabatan`
--

LOCK TABLES `tb_jabatan` WRITE;
/*!40000 ALTER TABLE `tb_jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jenjang`
--

DROP TABLE IF EXISTS `tb_jenjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_jenjang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jenjang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jenjang`
--

LOCK TABLES `tb_jenjang` WRITE;
/*!40000 ALTER TABLE `tb_jenjang` DISABLE KEYS */;
INSERT INTO `tb_jenjang` VALUES (1,'Qiroah 1','2022-07-08 09:10:20','2022-07-08 09:10:20'),(2,'Qiroah 2','2022-07-08 09:10:25','2022-07-08 09:10:25'),(3,'Qiroah 3','2022-07-08 09:10:29','2022-07-08 09:10:29');
/*!40000 ALTER TABLE `tb_jenjang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kategori`
--

DROP TABLE IF EXISTS `tb_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kategori` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori`
--

LOCK TABLES `tb_kategori` WRITE;
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kategori_pelajaran`
--

DROP TABLE IF EXISTS `tb_kategori_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kategori_pelajaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jenjang` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `id_kategori_penilaian` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori_pelajaran`
--

LOCK TABLES `tb_kategori_pelajaran` WRITE;
/*!40000 ALTER TABLE `tb_kategori_pelajaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kategori_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kategori_penilaian`
--

DROP TABLE IF EXISTS `tb_kategori_penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kategori_penilaian` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_penilaian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori_penilaian`
--

LOCK TABLES `tb_kategori_penilaian` WRITE;
/*!40000 ALTER TABLE `tb_kategori_penilaian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kategori_penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kelas`
--

DROP TABLE IF EXISTS `tb_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kelas`
--

LOCK TABLES `tb_kelas` WRITE;
/*!40000 ALTER TABLE `tb_kelas` DISABLE KEYS */;
INSERT INTO `tb_kelas` VALUES (1,'D3TI - 2A');
/*!40000 ALTER TABLE `tb_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kelas_halaqah`
--

DROP TABLE IF EXISTS `tb_kelas_halaqah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kelas_halaqah` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_asatidz` int(11) NOT NULL,
  `kode_halaqah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_halaqah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kelas_halaqah`
--

LOCK TABLES `tb_kelas_halaqah` WRITE;
/*!40000 ALTER TABLE `tb_kelas_halaqah` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_kelas_halaqah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_last_login`
--

DROP TABLE IF EXISTS `tb_last_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_last_login` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_last_login`
--

LOCK TABLES `tb_last_login` WRITE;
/*!40000 ALTER TABLE `tb_last_login` DISABLE KEYS */;
INSERT INTO `tb_last_login` VALUES (1,'Mohammad Ilham',1,'2022-07-08 01:34:07','2022-07-08 01:34:07'),(2,'Mohammad',2,'2022-07-08 01:39:08','2022-07-08 01:39:08'),(3,'Mohammad Ilham',1,'2022-07-08 09:00:58','2022-07-08 09:00:58'),(4,'Mohammad',2,'2022-07-08 09:01:25','2022-07-08 09:01:25'),(5,'Mohammad Ilham',1,'2022-07-08 10:31:03','2022-07-08 10:31:03'),(6,'Mohammad',2,'2022-07-08 10:34:27','2022-07-08 10:34:27'),(7,'Mohammad',2,'2022-07-09 03:42:31','2022-07-09 03:42:31'),(8,'Mohammad',2,'2022-07-09 11:21:29','2022-07-09 11:21:29'),(9,'Mohammad Ilham',1,'2022-07-11 03:38:01','2022-07-11 03:38:01');
/*!40000 ALTER TABLE `tb_last_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_lokasi_rt`
--

DROP TABLE IF EXISTS `tb_lokasi_rt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_lokasi_rt` (
  `kode_rt` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`kode_rt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_lokasi_rt`
--

LOCK TABLES `tb_lokasi_rt` WRITE;
/*!40000 ALTER TABLE `tb_lokasi_rt` DISABLE KEYS */;
INSERT INTO `tb_lokasi_rt` VALUES ('RTQ-001','Bandung');
/*!40000 ALTER TABLE `tb_lokasi_rt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nilai`
--

DROP TABLE IF EXISTS `tb_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nilai` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_asatidz` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_kategori_pelajaran` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nilai`
--

LOCK TABLES `tb_nilai` WRITE;
/*!40000 ALTER TABLE `tb_nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nilai_kategori`
--

DROP TABLE IF EXISTS `tb_nilai_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nilai_kategori` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nilai_awal` double NOT NULL,
  `nilai_akhir` double NOT NULL,
  `nilai_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nilai_kategori`
--

LOCK TABLES `tb_nilai_kategori` WRITE;
/*!40000 ALTER TABLE `tb_nilai_kategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nilai_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nominal_iuran`
--

DROP TABLE IF EXISTS `tb_nominal_iuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nominal_iuran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nominal` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nominal_iuran`
--

LOCK TABLES `tb_nominal_iuran` WRITE;
/*!40000 ALTER TABLE `tb_nominal_iuran` DISABLE KEYS */;
INSERT INTO `tb_nominal_iuran` VALUES (1,20000,1,NULL,NULL);
/*!40000 ALTER TABLE `tb_nominal_iuran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pelajaran`
--

DROP TABLE IF EXISTS `tb_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pelajaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelajaran`
--

LOCK TABLES `tb_pelajaran` WRITE;
/*!40000 ALTER TABLE `tb_pelajaran` DISABLE KEYS */;
INSERT INTO `tb_pelajaran` VALUES (1,'Membaca Bismillah',NULL,NULL);
/*!40000 ALTER TABLE `tb_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pelajaran_mulok`
--

DROP TABLE IF EXISTS `tb_pelajaran_mulok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pelajaran_mulok` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelajaran_mulok`
--

LOCK TABLES `tb_pelajaran_mulok` WRITE;
/*!40000 ALTER TABLE `tb_pelajaran_mulok` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_pelajaran_mulok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pesan`
--

DROP TABLE IF EXISTS `tb_pesan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pesan`),
  UNIQUE KEY `tb_pesan_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pesan`
--

LOCK TABLES `tb_pesan` WRITE;
/*!40000 ALTER TABLE `tb_pesan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_pesan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_profil_web`
--

DROP TABLE IF EXISTS `tb_profil_web`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_profil_web` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_profil_web`
--

LOCK TABLES `tb_profil_web` WRITE;
/*!40000 ALTER TABLE `tb_profil_web` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_profil_web` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_quran`
--

DROP TABLE IF EXISTS `tb_quran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_quran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_asatidz` int(11) NOT NULL,
  `quran_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quran_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_quran`
--

LOCK TABLES `tb_quran` WRITE;
/*!40000 ALTER TABLE `tb_quran` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_quran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_role`
--

DROP TABLE IF EXISTS `tb_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_role`
--

LOCK TABLES `tb_role` WRITE;
/*!40000 ALTER TABLE `tb_role` DISABLE KEYS */;
INSERT INTO `tb_role` VALUES (1,'Super Admin'),(2,'Admin Cabang'),(3,'Asatidz'),(4,'Wali Santri');
/*!40000 ALTER TABLE `tb_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_santri`
--

DROP TABLE IF EXISTS `tb_santri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_santri` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi_anak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kode_halaqah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_wali` int(11) NOT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_nominal_iuran` int(11) DEFAULT NULL,
  `id_besaran` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_santri`
--

LOCK TABLES `tb_santri` WRITE;
/*!40000 ALTER TABLE `tb_santri` DISABLE KEYS */;
INSERT INTO `tb_santri` VALUES (1,'2003077','Mohammad Teguhriyadi','Teguhriyadi','Bandung','2002-02-02','L','Bandung','Juara 1','SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH',1,'HLQ-001',3,1,1,'http://127.0.0.1:8000/storage/santri/OzhfTmPyxH4fHFjMJH7VobEHP5wixemdeWbeTROa.jpg',1,1,'2022-07-08 09:09:47','2022-07-08 09:11:01'),(2,'2003061','Nandang','nan','Cirebon','2002-02-02','L','Bandung','Juara 1','Bandung',1,'HLQ-001',3,1,1,'http://127.0.0.1:8000/storage/santri/5e9u5h7LYPYbhMnBud4EK2SLLpcs6pHwVqpbsT2H.jpg',1,1,'2022-07-08 09:14:38','2022-07-08 09:32:11');
/*!40000 ALTER TABLE `tb_santri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_santri_lulus`
--

DROP TABLE IF EXISTS `tb_santri_lulus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_santri_lulus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_santri` int(11) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_santri_lulus`
--

LOCK TABLES `tb_santri_lulus` WRITE;
/*!40000 ALTER TABLE `tb_santri_lulus` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_santri_lulus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_setting_iuran`
--

DROP TABLE IF EXISTS `tb_setting_iuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_setting_iuran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mulai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_setting_iuran`
--

LOCK TABLES `tb_setting_iuran` WRITE;
/*!40000 ALTER TABLE `tb_setting_iuran` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_setting_iuran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_setting_kategori_tadribat`
--

DROP TABLE IF EXISTS `tb_setting_kategori_tadribat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_setting_kategori_tadribat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jenjang` int(11) NOT NULL,
  `id_pelajaran_tadribat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_setting_kategori_tadribat`
--

LOCK TABLES `tb_setting_kategori_tadribat` WRITE;
/*!40000 ALTER TABLE `tb_setting_kategori_tadribat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_setting_kategori_tadribat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_status_absen`
--

DROP TABLE IF EXISTS `tb_status_absen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_status_absen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `keterangan_absen` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_status_absen`
--

LOCK TABLES `tb_status_absen` WRITE;
/*!40000 ALTER TABLE `tb_status_absen` DISABLE KEYS */;
INSERT INTO `tb_status_absen` VALUES (1,'Hadir',NULL,NULL),(2,'Sakit',NULL,NULL),(3,'Izin',NULL,NULL),(4,'Alfa',NULL,NULL);
/*!40000 ALTER TABLE `tb_status_absen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_status_validasi`
--

DROP TABLE IF EXISTS `tb_status_validasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_status_validasi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_status_validasi`
--

LOCK TABLES `tb_status_validasi` WRITE;
/*!40000 ALTER TABLE `tb_status_validasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_status_validasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_struktur_organisasi`
--

DROP TABLE IF EXISTS `tb_struktur_organisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_struktur_organisasi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_struktur_organisasi`
--

LOCK TABLES `tb_struktur_organisasi` WRITE;
/*!40000 ALTER TABLE `tb_struktur_organisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_struktur_organisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tentang_kami`
--

DROP TABLE IF EXISTS `tb_tentang_kami`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_tentang_kami` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tentang_kami`
--

LOCK TABLES `tb_tentang_kami` WRITE;
/*!40000 ALTER TABLE `tb_tentang_kami` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tentang_kami` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_wali_santri`
--

DROP TABLE IF EXISTS `tb_wali_santri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_wali_santri` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kk` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_wali_santri`
--

LOCK TABLES `tb_wali_santri` WRITE;
/*!40000 ALTER TABLE `tb_wali_santri` DISABLE KEYS */;
INSERT INTO `tb_wali_santri` VALUES (3,'1212','1212','Polisi');
/*!40000 ALTER TABLE `tb_wali_santri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_hak_akses` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mohammad Ilham','super_admin@gmail.com','$2y$10$BlotKE4hOxqdW.LWxMnCNuQINt98aplmECzvZoKsGG2OnyE58RY4u','Bandung','001','https://rtq-freelance.my.id/gambar/gambar_user.png','Cirebon','2020-01-01','L',NULL,1,1,'2022-07-08 01:33:22','2022-07-08 01:34:17'),(2,'Mohammad','mohammad123@gmail.com','$2y$10$dVMppP5ve6dFiHCfuQ5oze/Eu7PWUyqgxOc8WUVjP1r7SPCgreqOG','Bandung','121212','http://127.0.0.1:8000/storage/admin_cabang/oevaHDTHdaMGxhFv8htPxiwtsHpkiT35fDtjYZUs.png','Bandung','2002-02-02','L',NULL,2,1,'2022-07-08 01:38:00','2022-07-08 01:39:14'),(3,'Mohammad Teguhriyadi','polisi123@gmail.com','$2y$10$yZim/bxMnF78hk08a/KGBOZ45UdqwL4Bgkm2uU7hlnDx5zkzcCbom','Bandung','9055','http://127.0.0.1:8000/storage/wali_santri/0l1pREHwFqJtKOX1KHIvkxz6EgKaPZ3nXTlzrbSY.jpg','Bandung','2002-02-02','L',NULL,3,1,'2022-07-08 09:02:07','2022-07-08 09:02:07'),(4,'Mohammad Hamdan','hamdan123@gmail.com','$2y$10$qXdO7DbkcxpQzMJBD5jnzumQSWuM2msKs4IFlPc5i0G5aGPzUpfBm','Bandung','54321','http://127.0.0.1:8000/storage/asatidz/9jd9uwKEOhyYMbSwd3GfwQynXupgxEGkSz8tbf5s.jpg','Bandung','2002-02-02','L',NULL,NULL,1,'2022-07-09 04:22:08','2022-07-09 04:22:08');
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

-- Dump completed on 2022-07-11 11:50:24
