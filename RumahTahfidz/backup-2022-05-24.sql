-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: db_rumah_tahfidz
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2022_03_03_230640_create_tb_status_absen_table',1),(5,'2022_03_03_230655_create_tb_pesan_table',1),(6,'2022_03_03_230709_create_tb_asatidz_table',1),(7,'2022_03_03_230722_create_tb_santri_table',1),(8,'2022_03_03_230737_create_tb_last_login_table',1),(9,'2022_03_03_230752_create_tb_role_table',1),(10,'2022_03_03_231758_create_tb_absensi_table',1),(11,'2022_03_05_135132_create_tb_profil_table',1),(12,'2022_03_07_110347_create_tb_jenjang_table',1),(13,'2022_03_24_234339_create_tb_admin_lokasi_rt',1),(14,'2022_04_03_180148_create_tb_kategori_penilaian_table',1),(15,'2022_04_11_153051_create_tb_iuran_table',1),(16,'2022_04_11_161934_create_tb_wali_santri_table',1),(17,'2022_04_16_001140_create_tb_kelas_table',1),(18,'2022_04_19_141454_create_tb_absensi_asatidz_table',1),(19,'2022_04_21_002552_create_tb_santri_lulus_table',1),(20,'2022_04_22_062736_create_tb_halaqah_table',1),(21,'2022_04_22_101010_create_tb_lokasi_rt_table',1),(22,'2022_04_29_144638_create_tb_pelajaran_tadribat_table',1),(23,'2022_04_29_144917_create_tb_pelajaran_hafalan_table',1),(24,'2022_05_03_134841_create_tb_kategori_pelajaran_table',1),(25,'2022_05_03_144708_create_tb_nilai_tadribat_table',1),(26,'2022_05_03_172534_create_tb_nilai_hafalan_table',1),(27,'2022_05_03_174143_create_tb_pelajaran_imla_table',1),(28,'2022_05_03_174414_create_tb_pelajaran_mulok_table',1),(29,'2022_05_03_174435_create_tb_pelajaran_iman_dan_adab_table',1),(30,'2022_05_03_213046_create_tb_nilai_imla_table',1),(31,'2022_05_03_213238_create_tb_nilai_iman_adab_table',1),(32,'2022_05_03_213257_create_tb_nilai_mulok_table',1),(33,'2022_05_08_233644_create_tb_kategori_table',1),(34,'2022_05_09_101722_create_tb_blog_table',1),(35,'2022_05_11_093809_create_tb_setting_iuran_table',1),(36,'2022_05_11_182353_create_tb_status_validasi_table',1),(37,'2022_05_19_214059_create_tb_setting_kategori_tadribat_table',1),(38,'2022_05_19_225433_create_tb_pelajaran_table',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_absensi`
--

LOCK TABLES `tb_absensi` WRITE;
/*!40000 ALTER TABLE `tb_absensi` DISABLE KEYS */;
INSERT INTO `tb_absensi` VALUES (1,1,1,'Hadir',9,'2022-04-22 10:01:17','2022-04-22 10:01:17'),(2,2,1,'Hadir',9,'2022-04-22 10:01:17','2022-04-22 10:01:17');
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
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin_lokasi_rt`
--

LOCK TABLES `tb_admin_lokasi_rt` WRITE;
/*!40000 ALTER TABLE `tb_admin_lokasi_rt` DISABLE KEYS */;
INSERT INTO `tb_admin_lokasi_rt` VALUES (7,'SMK','RTQ001','2022-05-23 08:37:53','2022-05-23 08:37:53');
/*!40000 ALTER TABLE `tb_admin_lokasi_rt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_asatidz`
--

DROP TABLE IF EXISTS `tb_asatidz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_asatidz` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_induk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `pendidikan_terakhir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivitas_utama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivasi_mengajar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_asatidz`
--

LOCK TABLES `tb_asatidz` WRITE;
/*!40000 ALTER TABLE `tb_asatidz` DISABLE KEYS */;
INSERT INTO `tb_asatidz` VALUES (9,'12345678',123456,'SMA','Mengajar','Mau Mengajar','2022-05-23 08:37:53','2022-05-23 08:37:53');
/*!40000 ALTER TABLE `tb_asatidz` ENABLE KEYS */;
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
INSERT INTO `tb_halaqah` VALUES ('HLQSRJ001','Singaraja 1','RTQ001'),('HLQSRJ002','Singaraja 2','RTQ002'),('HLQSRJ003','Singaraja 3','RTQ003'),('HLQSRJ004','Singaraja ','RTQ004');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_iuran`
--

LOCK TABLES `tb_iuran` WRITE;
/*!40000 ALTER TABLE `tb_iuran` DISABLE KEYS */;
INSERT INTO `tb_iuran` VALUES (1,1,50000,'2022-05-23','http://rtq-freelance.my.id/gambar/gambar_user.png',2,7,'2022-05-10 08:15:15','2022-05-10 08:15:15'),(2,2,100000,'2022-05-23','http://rtq-freelance.my.id/gambar/gambar_user.png',2,7,'2022-05-10 08:15:15','2022-05-10 08:15:15'),(3,2,150000,'2022-05-23','http://rtq-freelance.my.id/gambar/gambar_user.png',2,10,'2022-05-10 08:15:15','2022-05-10 08:15:15');
/*!40000 ALTER TABLE `tb_iuran` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jenjang`
--

LOCK TABLES `tb_jenjang` WRITE;
/*!40000 ALTER TABLE `tb_jenjang` DISABLE KEYS */;
INSERT INTO `tb_jenjang` VALUES (1,'QIRO\'AH 1','2022-05-23 08:37:53','2022-05-23 08:37:53'),(2,'QIRO\'AH 2','2022-05-23 08:37:53','2022-05-23 08:37:53'),(3,'QIRO\'AH 3','2022-05-23 08:37:53','2022-05-23 08:37:53'),(4,'QIRO\'AH 4','2022-05-23 08:37:53','2022-05-23 08:37:53'),(5,'I\'DADI','2022-05-23 08:37:53','2022-05-23 08:37:53');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori_pelajaran`
--

LOCK TABLES `tb_kategori_pelajaran` WRITE;
/*!40000 ALTER TABLE `tb_kategori_pelajaran` DISABLE KEYS */;
INSERT INTO `tb_kategori_pelajaran` VALUES (1,1,1,1),(2,1,2,2),(3,1,3,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kategori_penilaian`
--

LOCK TABLES `tb_kategori_penilaian` WRITE;
/*!40000 ALTER TABLE `tb_kategori_penilaian` DISABLE KEYS */;
INSERT INTO `tb_kategori_penilaian` VALUES (1,'Tadribat','tadribat'),(2,'Hafalan','hafalan'),(3,'Imla','imla'),(4,'Iman & Adab','iman-adab');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kelas`
--

LOCK TABLES `tb_kelas` WRITE;
/*!40000 ALTER TABLE `tb_kelas` DISABLE KEYS */;
INSERT INTO `tb_kelas` VALUES (1,'D3TI - 2A'),(2,'D3TI - 2B'),(3,'D3TI - 2C');
/*!40000 ALTER TABLE `tb_kelas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_last_login`
--

LOCK TABLES `tb_last_login` WRITE;
/*!40000 ALTER TABLE `tb_last_login` DISABLE KEYS */;
INSERT INTO `tb_last_login` VALUES (1,'Rahul',8,'2022-05-23 08:38:43','2022-05-23 08:38:43'),(2,'Rahul',8,'2022-05-24 02:35:31','2022-05-24 02:35:31'),(3,'Mohammad Ilham',1,'2022-05-24 02:44:05','2022-05-24 02:44:05'),(4,'Hame',7,'2022-05-24 02:44:34','2022-05-24 02:44:34'),(5,'Mohammad Ilham',1,'2022-05-24 02:44:53','2022-05-24 02:44:53'),(6,'Mohammad Ilham',1,'2022-05-24 02:59:01','2022-05-24 02:59:01'),(7,'Arif S',10,'2022-05-24 04:38:56','2022-05-24 04:38:56');
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
INSERT INTO `tb_lokasi_rt` VALUES ('RTQ001','RT Ulil Albab Karang Turi'),('RTQ002','RT Ulil Albab Khodijah Karang Malang'),('RTQ003','RT Ulil Albab Brondong'),('RTQ004','RT Ulil Albab Asy Syifa Cidhayu');
/*!40000 ALTER TABLE `tb_lokasi_rt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nilai_hafalan`
--

DROP TABLE IF EXISTS `tb_nilai_hafalan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nilai_hafalan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_asatidz` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_pelajaran_hafalan` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nilai_hafalan`
--

LOCK TABLES `tb_nilai_hafalan` WRITE;
/*!40000 ALTER TABLE `tb_nilai_hafalan` DISABLE KEYS */;
INSERT INTO `tb_nilai_hafalan` VALUES (1,8,1,2,0,'2022-05-24 04:20:03','2022-05-24 04:23:45'),(2,8,2,2,51,'2022-05-24 04:20:03','2022-05-24 04:23:45');
/*!40000 ALTER TABLE `tb_nilai_hafalan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nilai_iman_adab`
--

DROP TABLE IF EXISTS `tb_nilai_iman_adab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nilai_iman_adab` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_asatidz` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_pelajaran_iman_adab` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nilai_iman_adab`
--

LOCK TABLES `tb_nilai_iman_adab` WRITE;
/*!40000 ALTER TABLE `tb_nilai_iman_adab` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nilai_iman_adab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nilai_imla`
--

DROP TABLE IF EXISTS `tb_nilai_imla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nilai_imla` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_asatidz` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_pelajaran_imla` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nilai_imla`
--

LOCK TABLES `tb_nilai_imla` WRITE;
/*!40000 ALTER TABLE `tb_nilai_imla` DISABLE KEYS */;
INSERT INTO `tb_nilai_imla` VALUES (1,8,1,3,90,'2022-05-24 04:26:56','2022-05-24 04:27:10'),(2,8,2,3,0,'2022-05-24 04:26:56','2022-05-24 04:27:10');
/*!40000 ALTER TABLE `tb_nilai_imla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nilai_mulok`
--

DROP TABLE IF EXISTS `tb_nilai_mulok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nilai_mulok` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_asatidz` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_pelajaran_mulok` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nilai_mulok`
--

LOCK TABLES `tb_nilai_mulok` WRITE;
/*!40000 ALTER TABLE `tb_nilai_mulok` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nilai_mulok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nilai_tadribat`
--

DROP TABLE IF EXISTS `tb_nilai_tadribat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_nilai_tadribat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_asatidz` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `id_pelajaran_tadribat` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nilai_tadribat`
--

LOCK TABLES `tb_nilai_tadribat` WRITE;
/*!40000 ALTER TABLE `tb_nilai_tadribat` DISABLE KEYS */;
INSERT INTO `tb_nilai_tadribat` VALUES (5,8,1,1,100,'2022-05-24 03:34:26','2022-05-24 04:18:32'),(6,8,2,1,10,'2022-05-24 03:34:26','2022-05-24 04:18:32');
/*!40000 ALTER TABLE `tb_nilai_tadribat` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelajaran`
--

LOCK TABLES `tb_pelajaran` WRITE;
/*!40000 ALTER TABLE `tb_pelajaran` DISABLE KEYS */;
INSERT INTO `tb_pelajaran` VALUES (1,'Al-Quran','2022-05-24 03:00:01','2022-05-24 03:00:01'),(2,'An-naas','2022-05-24 04:05:36','2022-05-24 04:05:36'),(3,'huruf hijaiyah','2022-05-24 04:06:03','2022-05-24 04:06:03');
/*!40000 ALTER TABLE `tb_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pelajaran_hafalan`
--

DROP TABLE IF EXISTS `tb_pelajaran_hafalan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pelajaran_hafalan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelajaran_hafalan`
--

LOCK TABLES `tb_pelajaran_hafalan` WRITE;
/*!40000 ALTER TABLE `tb_pelajaran_hafalan` DISABLE KEYS */;
INSERT INTO `tb_pelajaran_hafalan` VALUES (1,'Al - Fatihah'),(2,'Al - Ikhlas'),(3,'Al - Buruj');
/*!40000 ALTER TABLE `tb_pelajaran_hafalan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pelajaran_iman_dan_adab`
--

DROP TABLE IF EXISTS `tb_pelajaran_iman_dan_adab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pelajaran_iman_dan_adab` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelajaran_iman_dan_adab`
--

LOCK TABLES `tb_pelajaran_iman_dan_adab` WRITE;
/*!40000 ALTER TABLE `tb_pelajaran_iman_dan_adab` DISABLE KEYS */;
INSERT INTO `tb_pelajaran_iman_dan_adab` VALUES (1,'Hafal 10 Adab'),(2,'Definisi Singkat 10 Adab'),(3,'Definisi 10 Adab, Contoh & Dalilnya'),(4,'Mengetahui Tugas - Tugas Malaikat'),(5,'Hafal Rukun Iman');
/*!40000 ALTER TABLE `tb_pelajaran_iman_dan_adab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pelajaran_imla`
--

DROP TABLE IF EXISTS `tb_pelajaran_imla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pelajaran_imla` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelajaran_imla`
--

LOCK TABLES `tb_pelajaran_imla` WRITE;
/*!40000 ALTER TABLE `tb_pelajaran_imla` DISABLE KEYS */;
INSERT INTO `tb_pelajaran_imla` VALUES (1,'Menulis Surat Al - Fatihah'),(2,'Menulis Kalimat Sambung Ber-Hukum Mad'),(3,'Menulis Kalimat Sambung Ber-Hukum Mim Sukun'),(4,'Menulis Kalimat Sambung mengandung Mad');
/*!40000 ALTER TABLE `tb_pelajaran_imla` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelajaran_mulok`
--

LOCK TABLES `tb_pelajaran_mulok` WRITE;
/*!40000 ALTER TABLE `tb_pelajaran_mulok` DISABLE KEYS */;
INSERT INTO `tb_pelajaran_mulok` VALUES (1,'Doa Makan dan Sesudah Makan'),(2,'Doa Tidur dan Bangun Tidur'),(3,'Niat Wudhu dan Rukun Wudhu'),(4,'Tujuan & Jenis - Jenis Sholat'),(5,'Doa Masuk dan Keluar Masjid');
/*!40000 ALTER TABLE `tb_pelajaran_mulok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pelajaran_tadribat`
--

DROP TABLE IF EXISTS `tb_pelajaran_tadribat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pelajaran_tadribat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelajaran_tadribat`
--

LOCK TABLES `tb_pelajaran_tadribat` WRITE;
/*!40000 ALTER TABLE `tb_pelajaran_tadribat` DISABLE KEYS */;
INSERT INTO `tb_pelajaran_tadribat` VALUES (1,'Mengenal Huruf - Huruf Hijaiyah'),(2,'Mengenal Harakat Fatihah'),(3,'Mengenal Tanwin');
/*!40000 ALTER TABLE `tb_pelajaran_tadribat` ENABLE KEYS */;
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
-- Table structure for table `tb_profil`
--

DROP TABLE IF EXISTS `tb_profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_profil` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_profil`
--

LOCK TABLES `tb_profil` WRITE;
/*!40000 ALTER TABLE `tb_profil` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_profil` ENABLE KEYS */;
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
INSERT INTO `tb_role` VALUES (1,'Super Admin'),(2,'Admin'),(3,'Asatidz'),(4,'Santri');
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
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `tb_santri` VALUES (1,'29092002','Mohammad Ilham','Ilham','Cirebon','2002-02-02','L','Bandung','Juara 1 Web Technology','SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH',1,'HLQSRJ001',10,1,'1',NULL,'2022-05-23 08:37:53','2022-05-23 08:37:53'),(2,'29092003','Ahmad Budi','Budi','Cirebon','2003-03-03','L','Papua','Juara 3 Web Technology','SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH',1,'HLQSRJ001',10,1,'1',NULL,'2022-05-23 08:37:53','2022-05-23 08:37:53');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_setting_iuran`
--

LOCK TABLES `tb_setting_iuran` WRITE;
/*!40000 ALTER TABLE `tb_setting_iuran` DISABLE KEYS */;
INSERT INTO `tb_setting_iuran` VALUES (1,'10','20');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_status_absen`
--

LOCK TABLES `tb_status_absen` WRITE;
/*!40000 ALTER TABLE `tb_status_absen` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_status_validasi`
--

LOCK TABLES `tb_status_validasi` WRITE;
/*!40000 ALTER TABLE `tb_status_validasi` DISABLE KEYS */;
INSERT INTO `tb_status_validasi` VALUES (1,'Sudah di validasi asatidz'),(2,'Sudah di validasi admin cabang'),(3,'Sudah di validasi super admin'),(4,'Tervalidasi');
/*!40000 ALTER TABLE `tb_status_validasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_wali_santri`
--

DROP TABLE IF EXISTS `tb_wali_santri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_wali_santri` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_halaqah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_wali_santri`
--

LOCK TABLES `tb_wali_santri` WRITE;
/*!40000 ALTER TABLE `tb_wali_santri` DISABLE KEYS */;
INSERT INTO `tb_wali_santri` VALUES (10,'29092002','12345678910111213','HLQSRJ001');
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
  `id_role` int(11) NOT NULL,
  `no_hp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mohammad Ilham','super_admin@gmail.com','$2y$10$/jTAAQBxOOz33dF.6YT/GOEE005sAWBGzXUy6RLpX8Z.I1BQd6T6K','Bandung',1,'001',NULL,'Cirebon','2020-01-01','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52'),(2,'Ahmad Fauzi','admin@gmail.com','$2y$10$XGXKazyHaZHPJCIvlROe0u3u/zZN2vtCzI7gCLzyRPNbXDQc7mH82','Bandung',2,'002','http://rtq-freelance.my.id/gambar/gambar_user.png','Bandung','2020-01-01','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52'),(3,'Hamdan','asatidz@gmail.com','$2y$10$c6xUyPM7lGGMlnKVscI4KO.leW9kx2gx8SQ1q5iCSf7Z5WHPHFArO','Bandung',3,'003','http://rtq-freelance.my.id/gambar/gambar_user.png','Bandung','2020-01-01','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52'),(4,'Riyadi','santri@gmail.com','$2y$10$mIladGSOpbelJW/a7IvrB.4X0SdC5AnjtGTwwnUh6v9YvOm9rN6O.','Bandung',4,'004','http://rtq-freelance.my.id/gambar/gambar_user.png','Bandung','2020-01-01','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52'),(5,'Riyadi','data@gmail.com','$2y$10$h7ttl1fJM/0MaBZZhbP32eSqRPMZS0hZPs5zyyiqiKdegPvv0Ck0O','Bandung',4,'004','http://rtq-freelance.my.id/gambar/gambar_user.png','Bandung','2020-01-01','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52'),(6,'Mohammad','mohammad@gmail.com','$2y$10$473iEtSrT.wpyj2GlfxPAetN0L6BMH0iO1OCUlK/tg1CAK1l6vXQe','Cirebon',2,'1234','http://rtq-freelance.my.id/gambar/gambar_user.png','Bandung','2020-01-01','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52'),(7,'Hame','hame123@gmail.com','$2y$10$4oOOafTq7fZ4kUrk1xOaeuRwZF.OKsCedhu7osKAePDtwLczelMCG','Cirebon',2,'777','http://rtq-freelance.my.id/gambar/gambar_user.png','Bandung','2020-01-01','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52'),(8,'Rahul','rahul@gmail.com','$2y$10$6t6QRYc.YM4uQ5SycM1V4O0iG0O2UkKAQxjaMcXyhGXMwmTLYmiQK','Bandung',3,'1234567','http://rtq-freelance.my.id/gambar/gambar_user.png','Cirebon','2020-02-02','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52'),(9,'Ahmad Fauzi','fauzi@gmail.com','$2y$10$0KBdp1pdFLfCX6pzi7o5xuRZ5Wf.UeK0y1zfhx5JgnKSQowxa45hu','Bandung',3,'123456','http://rtq-freelance.my.id/gambar/gambar_user.png','Jakarta','2020-03-03','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52'),(10,'Arif S','arif@gmail.com','$2y$10$WrP05SEvvQJNhMlv44JlI.xpAwDy618//NgRjUkN4MefPxNFaaEhy','Bali',4,'29092002','http://rtq-freelance.my.id/gambar/gambar_user.png','Jakarta Raya','2020-04-04','L',NULL,'1','2022-05-23 08:37:52','2022-05-23 08:37:52');
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

-- Dump completed on 2022-05-24 14:27:35
