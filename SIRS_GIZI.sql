-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: SIRS_GIZI
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ahli_gizi`
--

DROP TABLE IF EXISTS `ahli_gizi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ahli_gizi` (
  `id_ahligizi` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ahligizi`),
  UNIQUE KEY `ahli_gizi_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ahli_gizi`
--

LOCK TABLES `ahli_gizi` WRITE;
/*!40000 ALTER TABLE `ahli_gizi` DISABLE KEYS */;
INSERT INTO `ahli_gizi` VALUES (1,'Revi Ivangkia, S. Gz.','johnson@email.com','Sana Jauh',NULL,NULL);
/*!40000 ALTER TABLE `ahli_gizi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `antropometri`
--

DROP TABLE IF EXISTS `antropometri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `antropometri` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `berat_badan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggi_badan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggilutut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pasien` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `antropometri_id_pasien_foreign` (`id_pasien`),
  CONSTRAINT `antropometri_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antropometri`
--

LOCK TABLES `antropometri` WRITE;
/*!40000 ALTER TABLE `antropometri` DISABLE KEYS */;
INSERT INTO `antropometri` VALUES (1,'232','32','0823','9723','02803',1,'2024-01-12 07:39:31','2024-01-12 07:39:31'),(2,'232','32','0823','34/12','02803',1,'2024-01-12 07:39:58','2024-01-12 07:39:58'),(3,'53','32','32','9723','50',2,'2024-01-15 05:34:10','2024-01-15 05:34:10'),(4,'53','32','30','9723','50',5,'2024-01-15 05:37:25','2024-01-15 05:37:25'),(5,'53','32','30','34','20',1,'2024-01-15 05:56:40','2024-01-15 05:56:40'),(6,'232','132','213','312','213',3,'2024-01-15 06:43:55','2024-01-15 06:43:55'),(7,'232','132','213','312','213',3,'2024-01-15 06:44:37','2024-01-15 06:44:37'),(8,'12','23','231','23','23',3,'2024-01-15 13:02:48','2024-01-15 13:02:48'),(9,'23','312','213','132','231',3,'2024-01-15 14:34:53','2024-01-15 14:34:53'),(10,'89','8','898','989','989',2,'2024-01-16 04:20:21','2024-01-16 04:20:21'),(11,'88','878','878','887','8788',3,'2024-01-16 05:39:15','2024-01-16 05:39:15'),(12,'53','6','7','7','7',3,'2024-01-16 17:49:30','2024-01-16 17:49:30'),(13,'53','6','7','7','7',3,'2024-01-16 17:51:52','2024-01-16 17:51:52'),(14,'886','778','78','78','87',4,'2024-01-16 17:52:23','2024-01-16 17:52:23'),(15,'886','778','78','78','87',4,'2024-01-16 17:52:42','2024-01-16 17:52:42'),(16,'2323','32','32','32','323232',4,'2024-01-16 18:10:34','2024-01-16 18:10:34'),(17,'2323','32','32','32','323232',4,'2024-01-16 18:10:41','2024-01-16 18:10:41'),(18,'2323','32','32','32','323232',4,'2024-01-16 18:11:29','2024-01-16 18:11:29'),(19,'2323','32','32','32','323232',4,'2024-01-16 18:11:36','2024-01-16 18:11:36'),(20,'23','132','132','132','123',3,'2024-01-17 05:44:27','2024-01-17 05:44:27'),(21,'21','12','21','12','12',3,'2024-01-17 05:53:18','2024-01-17 05:53:18'),(22,'213','213','312','213','132',2,'2024-01-17 06:03:51','2024-01-17 06:03:51'),(23,'1123','213','123','123','132',2,'2024-01-17 06:06:55','2024-01-17 06:06:55'),(24,'213','213','132','213','213',3,'2024-01-17 06:13:04','2024-01-17 06:13:04'),(25,'213','123','213','213','123',2,'2024-01-17 06:20:34','2024-01-17 06:20:34'),(26,'123','7887','87','87','78',3,'2024-01-17 06:43:37','2024-01-17 06:43:37'),(27,'89','9889','89','98','98',3,'2024-01-17 07:33:31','2024-01-17 07:33:31'),(28,'89','9889','89','98','98',3,'2024-01-17 07:33:47','2024-01-17 07:33:47'),(29,'898','98','89','89','8989',4,'2024-01-17 07:41:50','2024-01-17 07:41:50'),(30,'898','98','89','89','8989',4,'2024-01-17 07:42:53','2024-01-17 07:42:53'),(31,'8989','89','8989','89','89',2,'2024-01-17 07:53:23','2024-01-17 07:53:23'),(32,'86677887','878','8787','787','87',4,'2024-01-18 07:34:36','2024-01-18 07:34:36'),(33,'87','87','7887','78','87',3,'2024-01-18 07:40:17','2024-01-18 07:40:17'),(34,'87','7878','778','78','87',3,'2024-01-18 08:00:52','2024-01-18 08:00:52'),(35,'456','98','443','98','9',3,'2024-01-29 06:13:14','2024-01-29 19:13:09'),(36,'8','7','87','87','778',1,'2024-01-29 18:24:18','2024-01-29 18:24:18'),(37,'53','32','32','213','123',1,'2024-01-29 18:30:24','2024-01-29 18:30:24'),(38,'77','76','7','76','77',1,'2024-01-29 18:35:01','2024-01-29 18:35:01'),(39,'877','887','7878','8','787',1,'2024-01-29 18:36:47','2024-01-29 18:36:47'),(40,'878','7878','78','78','78',1,'2024-01-29 18:43:00','2024-01-29 18:43:00'),(41,'53','787','87','7','78',1,'2024-01-29 18:48:10','2024-01-29 18:48:10'),(42,'89','89','89','98','8989',1,'2024-01-29 18:51:55','2024-01-29 18:51:55'),(43,'123','153','30','9723','23',1,'2024-01-29 18:58:22','2024-01-29 18:58:22'),(44,'123','153','30','9723','23',1,'2024-01-29 18:58:48','2024-01-29 18:58:48'),(45,'87878','8','87','8','87',1,'2024-01-29 19:12:54','2024-01-29 19:12:54'),(46,'78','78','78','87','88',1,'2024-01-29 19:14:47','2024-01-29 19:14:47'),(47,'78','8778','87','87','87',1,'2024-01-29 19:16:16','2024-01-29 19:16:16'),(48,'78','878','78','7','787',5,'2024-01-29 19:16:44','2024-01-29 19:16:44'),(49,'87','87','7888','87','7878',2,'2024-01-29 19:20:13','2024-01-29 19:21:06'),(50,'53','32','0823','9723','123',3,'2024-01-29 19:35:13','2024-01-29 19:35:13'),(51,'8','87','887','8787','87',3,'2024-01-29 19:39:31','2024-01-29 19:39:31'),(52,'87','87','78','78','87',3,'2024-01-29 19:39:41','2024-01-29 19:39:41'),(53,'7','7878','78','78','87',3,'2024-01-29 19:52:34','2024-01-29 19:52:34'),(54,'7','788','878','787','8',3,'2024-01-29 19:52:41','2024-01-29 19:52:41'),(55,'78','87','87','78','87',3,'2024-01-29 19:53:11','2024-01-29 19:56:52'),(56,'78','87','87','78','87',3,'2024-01-29 19:56:36','2024-01-29 19:56:36'),(57,'8778','8787','8787','87','87',3,'2024-01-30 05:53:13','2024-01-30 05:55:27'),(58,'7','7878','788','78','87',3,'2024-01-30 05:57:37','2024-01-30 05:57:37'),(59,'87','8787','7887','78','87',4,'2024-01-30 05:59:39','2024-01-30 05:59:39'),(60,'7','67','6','67','676',3,'2024-01-30 07:13:37','2024-01-30 07:13:37'),(61,'78','78','788','78','787',2,'2024-01-30 07:49:28','2024-01-30 07:49:28'),(62,'8787','78','78','787','878',3,'2024-01-30 08:19:31','2024-01-30 08:19:31'),(63,'78','87','7878','78','78',4,'2024-01-30 08:25:41','2024-01-30 08:25:41'),(64,'67','156','32','77','21',5,'2024-01-30 13:45:31','2024-01-30 13:45:31'),(65,'98','89','89','899','8989',2,'2024-01-30 16:10:11','2024-01-30 16:10:11'),(66,'98','89','89','899','8989',2,'2024-01-30 16:10:27','2024-01-30 16:10:27'),(67,'787','87','87','87','8778',2,'2024-01-30 16:15:56','2024-01-30 16:15:56'),(68,'787','87','87','87','8778',2,'2024-01-30 16:16:36','2024-01-30 16:16:36'),(69,'787','87','87','87','8778',2,'2024-01-30 16:16:44','2024-01-30 16:16:44'),(70,'787','87','87','87','8778',2,'2024-01-30 16:17:46','2024-01-30 16:17:46'),(71,'98','8989','98','89','8',3,'2024-01-30 16:19:39','2024-01-30 16:19:39'),(72,'78','8787','787','87','78',3,'2024-01-30 16:44:57','2024-01-30 16:44:57'),(73,'78','8778','8787','78','87',5,'2024-01-30 17:12:44','2024-01-30 17:12:44'),(74,'8887','78','7878','87','78',2,'2024-01-31 02:41:55','2024-01-31 02:43:03'),(75,'78','878','87','787','78',3,'2024-01-31 02:44:59','2024-01-31 02:44:59'),(76,'8787','78','8778','88','78',3,'2024-01-31 02:47:55','2024-01-31 02:47:55'),(77,'60','170','11','1','11',1,'2024-01-31 03:50:13','2024-01-31 03:50:13');
/*!40000 ALTER TABLE `antropometri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biokimia`
--

DROP TABLE IF EXISTS `biokimia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `biokimia` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gds` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kolesterol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trigliserit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sgot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sgpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `albumin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ureum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kreatinin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pasien` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `biokimia_id_pasien_foreign` (`id_pasien`),
  CONSTRAINT `biokimia_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biokimia`
--

LOCK TABLES `biokimia` WRITE;
/*!40000 ALTER TABLE `biokimia` DISABLE KEYS */;
INSERT INTO `biokimia` VALUES (1,'2738','24','8273','343','782','23','210','03','923',5,'2024-01-15 05:37:25','2024-01-15 05:37:25'),(2,'34','24','34','312','34','729','23','03','923',1,'2024-01-15 05:56:40','2024-01-15 05:56:40'),(3,'213','312','321','312','123','213','132','321','321',3,'2024-01-15 06:43:55','2024-01-15 06:43:55'),(4,'213','312','321','312','123','213','132','321','321',3,'2024-01-15 06:44:37','2024-01-15 06:44:37'),(5,'32','23','23','23','32','32','23','23','32',3,'2024-01-15 13:02:48','2024-01-15 13:02:48'),(6,'213','231','213','321','213','213','213','321','312',3,'2024-01-15 14:34:53','2024-01-15 14:34:53'),(7,'88','9','989','909','9080','8989','89','9','89',2,'2024-01-16 04:20:21','2024-01-16 04:20:21'),(8,'78','787','878','78','78','7887','87','788','87',3,'2024-01-16 05:39:15','2024-01-16 05:39:15'),(9,'67','677','7','7','7','6','767','6','78',3,'2024-01-16 17:49:30','2024-01-16 17:49:30'),(10,'67','677','7','7','7','6','767','6','78',3,'2024-01-16 17:51:52','2024-01-16 17:51:52'),(11,'87','8','7887','7','878','778','78','7','788',4,'2024-01-16 17:52:24','2024-01-16 17:52:24'),(12,'87','8','7887','7','878','778','78','7','788',4,'2024-01-16 17:52:42','2024-01-16 17:52:42'),(13,'32','328','778','78','8','778','78','7887','87',4,'2024-01-16 18:10:34','2024-01-16 18:10:34'),(14,'32','328','778','78','8','778','78','7887','87',4,'2024-01-16 18:10:41','2024-01-16 18:10:41'),(15,'32','328','778','78','8','778','78','7887','87',4,'2024-01-16 18:11:29','2024-01-16 18:11:29'),(16,'32','328','778','78','8','778','78','7887','87',4,'2024-01-16 18:11:36','2024-01-16 18:11:36'),(17,'213','132','321','123','321','132','213','321','21',3,'2024-01-17 05:44:27','2024-01-17 05:44:27'),(18,'12','21','12','12','21','21','21','21','21',3,'2024-01-17 05:53:18','2024-01-17 05:53:18'),(19,'123','132','123','123','132','213','123','231','132',2,'2024-01-17 06:03:51','2024-01-17 06:03:51'),(20,'213','123','123','213','213','231','2132','13','213',2,'2024-01-17 06:06:55','2024-01-17 06:06:55'),(21,'213','123','132','123','213','213','231','213','231',3,'2024-01-17 06:13:04','2024-01-17 06:13:04'),(22,'132','312','132','213','132','123','213','213','213',2,'2024-01-17 06:20:34','2024-01-17 06:20:34'),(23,'78','78','87','78','78','7887','87','78','87',3,'2024-01-17 06:43:37','2024-01-17 06:43:37'),(24,'98','8998','89','89','9898','89','89','8998','08',3,'2024-01-17 07:33:31','2024-01-17 07:33:31'),(25,'98','8998','89','89','9898','89','89','8998','08',3,'2024-01-17 07:33:47','2024-01-17 07:33:47'),(26,'8989','98','98','9898','98','9889','89','98','89',4,'2024-01-17 07:41:50','2024-01-17 07:41:50'),(27,'8989','98','98','9898','98','9889','89','98','89',4,'2024-01-17 07:42:53','2024-01-17 07:42:53'),(28,'89','89','8998','89','89','8989','89','89','89',2,'2024-01-17 07:53:23','2024-01-17 07:53:23'),(29,'7','8787','87','7878','8778','78','78','7878','87',4,'2024-01-18 07:34:36','2024-01-18 07:34:36'),(30,'7887','8778','87','8787','87','78','78','7878','78',3,'2024-01-18 07:40:17','2024-01-18 07:40:17'),(31,'7887','87','78','78','78','78','78','78','87',3,'2024-01-18 08:00:52','2024-01-18 08:00:52'),(32,'78','7887','78','78','7878','78','78','78','78',3,'2024-01-30 05:57:37','2024-01-30 05:57:37'),(33,'87','788','778','878','787','87','78','8787','78',4,'2024-01-30 05:59:39','2024-01-30 05:59:39'),(34,'67','6767','67','67','667','76','67','87','67',3,'2024-01-30 07:13:37','2024-01-30 07:13:37'),(35,'7878','78','78','7878','78','87','87','87','8787',2,'2024-01-30 07:49:28','2024-01-30 07:49:28'),(36,'878','787','878','78','787','878','87','787','878',3,'2024-01-30 08:19:31','2024-01-30 08:19:31'),(37,'8787','78','78','7878','87','87','78','8787','87',4,'2024-01-30 08:25:41','2024-01-30 08:25:41'),(38,'12','123','100','100','100','100','100','100','100',5,'2024-01-30 13:45:31','2024-01-30 13:45:31'),(39,'898','98','8989','89','98','9898','98','89','98',2,'2024-01-30 16:10:11','2024-01-30 16:10:11'),(40,'898','98','8989','89','98','9898','98','89','98',2,'2024-01-30 16:10:27','2024-01-30 16:10:27'),(41,'78','7878','78','78','78','7878','78','78','78',2,'2024-01-30 16:15:56','2024-01-30 16:15:56'),(42,'78','7878','78','78','78','7878','78','78','78',2,'2024-01-30 16:16:36','2024-01-30 16:16:36'),(43,'78','7878','78','78','78','7878','78','78','78',2,'2024-01-30 16:16:44','2024-01-30 16:16:44'),(44,'78','7878','78','78','78','7878','78','78','78',2,'2024-01-30 16:17:46','2024-01-30 16:17:46'),(45,'8','8998','98','9','9889','98','9','8998','98',3,'2024-01-30 16:19:39','2024-01-30 16:19:39'),(46,'87','778','78','87','87','7887','87','78','7878',3,'2024-01-30 16:44:57','2024-01-30 16:44:57'),(47,'887','8787','78','87','87','887','87','87','78',5,'2024-01-30 17:12:44','2024-01-30 17:12:44'),(48,'78','99999','78','78','788','787','87','78','78',2,'2024-01-31 02:41:55','2024-01-31 02:43:20'),(49,'78778','787','878','78','78','788','787','78','78',3,'2024-01-31 02:44:59','2024-01-31 02:44:59'),(50,'788','78','77','7','878','787','7','87','8',3,'2024-01-31 02:47:55','2024-01-31 02:47:55'),(51,'10','10','120','10','10','12','12','12','12',1,'2024-01-31 03:50:13','2024-01-31 03:50:13');
/*!40000 ALTER TABLE `biokimia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distributor`
--

DROP TABLE IF EXISTS `distributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distributor` (
  `id_distributor` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` bigint unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konfirmasi_makanan` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_distributor`),
  KEY `distributor_id_pasien_foreign` (`id_pasien`),
  CONSTRAINT `distributor_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distributor`
--

LOCK TABLES `distributor` WRITE;
/*!40000 ALTER TABLE `distributor` DISABLE KEYS */;
/*!40000 ALTER TABLE `distributor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `fisik`
--

DROP TABLE IF EXISTS `fisik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fisik` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `klinis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gangguan_gastrointestinal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekanan_darah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respirasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nadi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suhu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pasien` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fisik_id_pasien_foreign` (`id_pasien`),
  CONSTRAINT `fisik_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fisik`
--

LOCK TABLES `fisik` WRITE;
/*!40000 ALTER TABLE `fisik` DISABLE KEYS */;
INSERT INTO `fisik` VALUES (1,'Atropi otot lengan','Muntah','3213','123','2313','12',1,'2024-01-15 05:56:40','2024-01-15 05:56:40'),(2,'Atropi otot lengan','Kesulitan menelan','312','213','213','213',3,'2024-01-15 06:43:56','2024-01-15 06:43:56'),(3,'Atropi otot lengan','Kesulitan menelan','312','213','213','213',3,'2024-01-15 06:44:37','2024-01-15 06:44:37'),(4,'Atropi otot lengan','Anoreksia','123','32','23','32',3,'2024-01-15 13:02:48','2024-01-15 13:02:48'),(5,'Atropi otot lengan','Anoreksia','132','31','23','123',3,'2024-01-15 14:34:53','2024-01-15 14:34:53'),(6,'Atropi otot lengan','Kesulitan mengunyah','98','988','9','98',2,'2024-01-16 04:20:21','2024-01-16 04:20:21'),(7,'Atropi otot lengan','Kesulitan menelan','8778','787','78','8',3,'2024-01-16 05:39:15','2024-01-16 05:39:15'),(8,'Hilang lemak subkutan','Mual','67','6','67','67',3,'2024-01-16 17:49:30','2024-01-16 17:49:30'),(9,'Hilang lemak subkutan','Mual','67','6','67','67',3,'2024-01-16 17:51:52','2024-01-16 17:51:52'),(10,'Atropi otot lengan','Mual','87','8778','78','778',4,'2024-01-16 17:52:24','2024-01-16 17:52:24'),(11,'Atropi otot lengan','Mual','87','8778','78','778',4,'2024-01-16 17:52:42','2024-01-16 17:52:42'),(12,'Odema','Kesulitan mengunyah','87','78','87','7878',4,'2024-01-16 18:10:34','2024-01-16 18:10:34'),(13,'Odema','Kesulitan mengunyah','87','78','87','7878',4,'2024-01-16 18:10:41','2024-01-16 18:10:41'),(14,'Odema','Kesulitan mengunyah','87','78','87','7878',4,'2024-01-16 18:11:29','2024-01-16 18:11:29'),(15,'Odema','Kesulitan mengunyah','87','78','87','7878',4,'2024-01-16 18:11:36','2024-01-16 18:11:36'),(16,'Atropi otot lengan','Mual','213','231','213','213',3,'2024-01-17 05:44:27','2024-01-17 05:44:27'),(17,'Atropi otot lengan','Mual','213','231','231','321',3,'2024-01-17 05:53:18','2024-01-17 05:53:18'),(18,'Atropi otot lengan','Mual','132','23','231','213',2,'2024-01-17 06:03:51','2024-01-17 06:03:51'),(19,'Atropi otot lengan','Anoreksia','123','213','123','213',2,'2024-01-17 06:06:55','2024-01-17 06:06:55'),(20,'Atropi otot lengan','Anoreksia','213','213','213','231',3,'2024-01-17 06:13:04','2024-01-17 06:13:04'),(21,'Atropi otot lengan','Mual','213','213','213','213',2,'2024-01-17 06:20:34','2024-01-17 06:20:34'),(22,'Atropi otot lengan','Kesulitan menelan','87','78','78','78',3,'2024-01-17 06:43:37','2024-01-17 06:43:37'),(23,'Atropi otot lengan','Anoreksia','78','78','8778','87',3,'2024-01-17 07:33:31','2024-01-17 07:33:31'),(24,'Atropi otot lengan','Anoreksia','78','78','8778','87',3,'2024-01-17 07:33:47','2024-01-17 07:33:47'),(25,'Atropi otot lengan','Mual','7878','78','7887','87',4,'2024-01-17 07:41:50','2024-01-17 07:41:50'),(26,'Atropi otot lengan','Mual','7878','78','7887','87',4,'2024-01-17 07:42:53','2024-01-17 07:42:53'),(27,'Hilang lemak subkutan','Kesulitan menelan','8787','87','7887','78',2,'2024-01-17 07:53:23','2024-01-17 07:53:23'),(28,'Odema','Mual','132','877','878','87',4,'2024-01-18 07:34:36','2024-01-18 07:34:36'),(29,'Atropi otot lengan','Kesulitan mengunyah','7','67','7676','68',3,'2024-01-18 07:40:17','2024-01-18 07:40:17'),(30,'Hilang lemak subkutan','Kesulitan menelan','8778','787887','87','8787',3,'2024-01-18 08:00:52','2024-01-18 08:00:52'),(31,'Atropi otot lengan, Odema','Mual, Kesulitan mengunyah','213','21313','132','213',4,'2024-01-30 05:59:39','2024-01-30 05:59:39'),(32,'Odema','Muntah','67','6767','67','67',3,'2024-01-30 07:13:37','2024-01-30 07:13:37'),(33,'Odema','Mual','787','87','87','878',2,'2024-01-30 07:49:28','2024-01-30 07:49:28'),(34,'Atropi otot lengan','Mual','87','7','8787','87',3,'2024-01-30 08:19:31','2024-01-30 08:19:31'),(35,'Odema, Hilang lemak subkutan','Mual, Muntah','78','78','7887','78',4,'2024-01-30 08:25:41','2024-01-30 14:35:33'),(36,'Odema','Mual, Muntah','120','75','88','35',5,'2024-01-30 13:45:31','2024-01-30 13:45:31'),(37,'Odema','Mual','87','7878','78','87',2,'2024-01-30 16:10:11','2024-01-30 16:10:11'),(38,'Odema','Mual','87','7878','78','87',2,'2024-01-30 16:10:27','2024-01-30 16:10:27'),(39,'Hilang lemak subkutan','Kesulitan menelan','78','78','78','78',2,'2024-01-30 16:15:56','2024-01-30 16:15:56'),(40,'Hilang lemak subkutan','Kesulitan menelan','78','78','78','78',2,'2024-01-30 16:16:36','2024-01-30 16:16:36'),(41,'Hilang lemak subkutan','Kesulitan menelan','78','78','78','78',2,'2024-01-30 16:16:44','2024-01-30 16:16:44'),(42,'Hilang lemak subkutan','Kesulitan menelan','78','78','78','78',2,'2024-01-30 16:17:46','2024-01-30 16:17:46'),(43,'Odema','Mual, Muntah','878','787','87','87',3,'2024-01-30 16:19:39','2024-01-30 16:19:39'),(44,'Atropi otot lengan','Mual','7878','87','788','78',3,'2024-01-30 16:44:57','2024-01-30 16:44:57'),(45,'Odema','Mual','87','78','78','87',5,'2024-01-30 17:12:44','2024-01-30 17:12:44'),(46,'Atropi otot lengan, Odema, Hilang lemak subkutan','Mual','78','78','7887','78',2,'2024-01-31 02:41:55','2024-01-31 02:42:41'),(47,'Hilang lemak subkutan','Kesulitan menelan','98','7878','887','878',3,'2024-01-31 02:45:00','2024-01-31 02:45:00'),(48,'Hilang lemak subkutan','Mual, Muntah','877','87','78','8778',3,'2024-01-31 02:47:55','2024-01-31 02:47:55'),(49,'Atropi otot lengan','Muntah, Kesulitan mengunyah','70','88','40','35',1,'2024-01-31 03:50:13','2024-01-31 03:50:13');
/*!40000 ALTER TABLE `fisik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gizi`
--

DROP TABLE IF EXISTS `gizi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gizi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pola_makan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebiasaan_minum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makanan_selingan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diit_smrs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `suplemen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivitas_fisik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `konseling_gizi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pasien` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gizi_id_pasien_foreign` (`id_pasien`),
  CONSTRAINT `gizi_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gizi`
--

LOCK TABLES `gizi` WRITE;
/*!40000 ALTER TABLE `gizi` DISABLE KEYS */;
INSERT INTO `gizi` VALUES (1,'nilai_pola_makan','nilai_kebiasaan_minum','nilai_makanan_selingan','nilai_diit_smrs','nilai_btm','nilai_suplemen','nilai_aktivitas_fisik','nilai_konseling_gizi',2,NULL,NULL),(2,'sad','sda','das','das','Ya (...)','Tidak','Bed Rest','Tidak',3,'2024-01-17 06:13:04','2024-01-17 06:13:04'),(3,'wqe','eqw','weq','wqe','Tidak','Tidak','Sedang','Tidak',2,'2024-01-17 06:20:34','2024-01-17 06:20:34'),(4,'h','hj','jhhj','kj','Tidak','Tidak','Berat','Ya(Hahaha)',3,'2024-01-17 06:43:37','2024-01-17 06:43:37'),(5,'jhj','jhhj','jh','jh','tidak','Tidak','Bed Rest','Tidak',3,'2024-01-17 07:33:31','2024-01-17 07:33:31'),(6,'jhj','jhhj','jh','jh','ya','Tidak','Bed Rest','Tidak',3,'2024-01-17 07:33:47','2024-01-17 07:33:47'),(7,'kjjkjk','kj','kjkj','kj','ya','Tidak','Bed Rest','Tidak',4,'2024-01-17 07:42:53','2024-01-17 07:42:53'),(8,'7878','87','78','87','tidak','Tidak','Bed Rest','Tidak',2,'2024-01-17 07:53:23','2024-01-17 07:53:23'),(9,'jnk','kh','hkj','jh','ya','Tidak','Bed Rest','Tidak',3,'2024-01-18 08:00:52','2024-01-18 08:00:52'),(10,'kj','hk','h','hk','Tidak','Tidak','Ringan','Tidak',2,'2024-01-30 16:17:46','2024-01-30 16:17:46'),(11,'iiiy','abcd','uy','abcd','Ya, Abc','Tidak','Bed Rest','Pernah, Gizi akut',3,'2024-01-30 16:19:39','2024-01-30 17:13:38'),(12,'jh','jh','jh','jjh','Tidak','Tidak','Bed Rest','Belum',3,'2024-01-30 16:44:57','2024-01-30 16:44:57'),(13,'kh','h','hj','hjhj','Tidak','Tidak','Bed Rest','Tidak',5,'2024-01-30 17:12:44','2024-01-31 02:21:14'),(14,'j','jkk','hk','j','Tidak','Tidak','Bed Rest','Belum',2,'2024-01-31 02:41:55','2024-01-31 02:42:41'),(15,'KJHJHJ','HJ','HJHJ','HJ','Tidak','Tidak','Sedang','Belum',3,'2024-01-31 02:45:00','2024-01-31 02:45:00'),(16,'JH','HJ','JHHJ','HJ','Tidak','Tidak','Berat','Belum',3,'2024-01-31 02:47:55','2024-01-31 02:47:55'),(17,'perlu makan','es','cemilan','ya','tidak','ya','Bed Rest','pernah',1,'2024-01-31 03:50:13','2024-01-31 03:50:13');
/*!40000 ALTER TABLE `gizi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kitchen`
--

DROP TABLE IF EXISTS `kitchen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kitchen` (
  `id_kitchen` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pasien` bigint unsigned NOT NULL,
  `screening_id` bigint unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konfirmasi_makanan` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_makanan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_kitchen`),
  KEY `kitchen_id_pasien_foreign` (`id_pasien`),
  KEY `kitchen_screening_id_foreign` (`screening_id`),
  CONSTRAINT `kitchen_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`),
  CONSTRAINT `kitchen_screening_id_foreign` FOREIGN KEY (`screening_id`) REFERENCES `screening` (`id_screening`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kitchen`
--

LOCK TABLES `kitchen` WRITE;
/*!40000 ALTER TABLE `kitchen` DISABLE KEYS */;
/*!40000 ALTER TABLE `kitchen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2024_01_01_051928_create_screening_table',1),(14,'2024_01_01_150157_create_screening_table',2),(15,'2024_01_01_162425_create_screening_table',3),(16,'2014_10_12_000000_create_users_table',4),(17,'2014_10_12_100000_create_password_reset_tokens_table',4),(18,'2014_10_12_100000_create_password_resets_table',4),(19,'2019_08_19_000000_create_failed_jobs_table',4),(20,'2019_12_14_000001_create_personal_access_tokens_table',4),(21,'2023_12_27_082127_create_pasien_table',4),(22,'2023_12_27_082226_create_ahli_gizi_table',4),(23,'2023_12_27_082230_create_kitchen_table',4),(24,'2023_12_27_082235_create_distributor_table',4),(25,'2024_01_01_050341_create_antropometri_table',4),(26,'2024_01_01_050352_create_biokimia_table',4),(27,'2024_01_01_050404_create_fisik_table',4),(28,'2024_01_12_072108_create_screening_table',5),(29,'2024_01_12_085259_create_fisik_table',6),(30,'2024_01_12_085339_create_screening_table',7),(31,'2024_01_12_090009_create_gizi_table',8),(32,'2024_01_12_091243_create_screening_table',9),(33,'2024_01_12_133802_create_screening_table',10),(34,'2024_01_12_135633_create_screening_table',11),(35,'2024_01_12_135712_create_kitchen_table',12),(36,'2024_01_12_162141_create_screening_table',13),(37,'2024_01_12_162405_create_kitchen_table',14),(38,'2024_01_12_162505_create_kitchen_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pasien` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_rm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `bangsal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_screening` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_periksa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pasien_no_rm_unique` (`no_rm`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasien`
--

LOCK TABLES `pasien` WRITE;
/*!40000 ALTER TABLE `pasien` DISABLE KEYS */;
INSERT INTO `pasien` VALUES (1,'RM001','Artawan Hakim','1990-05-15','Rawat Inap Umum','Tidak boleh makan yang berminyak','2023-12-27',NULL,NULL),(2,'RM002','Rusdi Amrullah','1985-08-22','ICU','Tidak boleh minum es','2023-12-28',NULL,NULL),(3,'RM003','Indra Dinantika','1978-12-10','Bangsal Bedah','Tidak boleh makan yang manis','2023-12-29',NULL,NULL),(4,'RM004','Rizka Qurniawan','1995-03-25','Rawat Inap Umum','Tidak boleh makan yang asin','2023-12-30',NULL,NULL),(5,'RM005','Rifqi Azhar','1980-11-05','Bangsal Jantung','Tidak boleh makan yang pedas','2023-12-31',NULL,NULL);
/*!40000 ALTER TABLE `pasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `screening`
--

DROP TABLE IF EXISTS `screening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `screening` (
  `id_screening` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_ahligizi` bigint unsigned NOT NULL,
  `id_pasien` bigint unsigned NOT NULL,
  `diagnosis_medis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risiko` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `difabel` tinyint(1) NOT NULL DEFAULT '0',
  `alergi_makanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preskripsi_diet` text COLLATE utf8mb4_unicode_ci,
  `tindak_lanjut` text COLLATE utf8mb4_unicode_ci,
  `id_antropometri` bigint unsigned DEFAULT NULL,
  `id_biokimia` bigint unsigned DEFAULT NULL,
  `id_fisik` bigint unsigned DEFAULT NULL,
  `id_gizi` bigint unsigned DEFAULT NULL,
  `riwayat_personal` text COLLATE utf8mb4_unicode_ci,
  `diagnosis_gizi` text COLLATE utf8mb4_unicode_ci,
  `intervensi_gizi` text COLLATE utf8mb4_unicode_ci,
  `rencana_monitoring` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statusMakanan` tinyint DEFAULT '0',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `statusPengantaran` tinyint DEFAULT '0',
  PRIMARY KEY (`id_screening`),
  KEY `screening_id_ahligizi_foreign` (`id_ahligizi`),
  KEY `screening_id_pasien_foreign` (`id_pasien`),
  KEY `screening_id_antropometri_foreign` (`id_antropometri`),
  KEY `screening_id_biokimia_foreign` (`id_biokimia`),
  KEY `screening_id_fisik_foreign` (`id_fisik`),
  KEY `screening_id_gizi_foreign` (`id_gizi`),
  CONSTRAINT `screening_id_ahligizi_foreign` FOREIGN KEY (`id_ahligizi`) REFERENCES `ahli_gizi` (`id_ahligizi`),
  CONSTRAINT `screening_id_antropometri_foreign` FOREIGN KEY (`id_antropometri`) REFERENCES `antropometri` (`id`),
  CONSTRAINT `screening_id_biokimia_foreign` FOREIGN KEY (`id_biokimia`) REFERENCES `biokimia` (`id`),
  CONSTRAINT `screening_id_fisik_foreign` FOREIGN KEY (`id_fisik`) REFERENCES `fisik` (`id`),
  CONSTRAINT `screening_id_gizi_foreign` FOREIGN KEY (`id_gizi`) REFERENCES `gizi` (`id`),
  CONSTRAINT `screening_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screening`
--

LOCK TABLES `screening` WRITE;
/*!40000 ALTER TABLE `screening` DISABLE KEYS */;
INSERT INTO `screening` VALUES (1,1,3,NULL,'Risiko Sedang',0,'Susu sapi & produk olahannya, Ikan, Hazelnut/almond, Gluten/gandum','Diet Biasa','Perlu',75,49,47,15,'Mobilitas: JIJII\r\nKeterbatasan Fisik: IUI\r\nRiwayat Penyakit Personal: JHJ\r\nRiwayat Penyakit Keluarga: JJKJK','JHJJHJH','Tujuan Diet: JKHJ\r\nKeterbatasan Fisik: JHH\r\nPreskripsi Diet: JHJJH\r\nKebutuhan Zat Gizi:HUJH','Parameter yang dimonitor: JHJH\r\nEvaluasi: KJJHHJ\r\nTarget akhir intervensi: JHHJ','2024-01-31 09:26:02','2024-01-31 11:35:39',1,'Makanan ini Panas',1),(3,1,2,NULL,'Risiko Ringan',0,'Kacang kedelai / tanah','Diet Biasa','Perlu',74,48,46,14,'Mobilitas: jkkjkj\r\nKeterbatasan Fisik: mjjk\r\nRiwayat Penyakit Personal: jkjk\r\nRiwayat Penyakit Keluarga: jljk','Jagung','Tujuan Diet: ijkjjk\r\nPreskripsi Diet: jhjhjh\r\nKebutuhan Zat Gizi: hjjh','Parameter yang dimonitor: kjjk\r\nEvaluasi: jkkj\r\nTarget akhir intervensi: nkkjk','2024-01-31 09:41:55','2024-01-31 10:53:30',1,'campurkan nasi dengan sup yang ada',0),(4,1,3,NULL,'Risiko Ringan',0,'Udang, Susu sapi & produk olahannya','Diet Biasa','Perlu',76,50,48,16,'Mobilitas: JKJJK\r\nKeterbatasan Fisik: HJ\r\nRiwayat Penyakit Personal: JIUI\r\nRiwayat Penyakit Keluarga: IIJ','KJJHJH','Tujuan Diet: JJHHJ\r\nPreskripsi Diet: ABCD\r\nKebutuhan Zat Gizi: JKASK','Parameter yang dimonitor: MNMN\r\nEvaluasi: JJKJK\r\nTarget akhir intervensi: JHHJJ','2024-01-31 09:45:42','2024-01-31 11:13:57',1,'Segera dimakan biar sehat',0),(5,1,2,NULL,'Risiko Tinggi',0,'Susu sapi & produk olahannya, Ikan','Diet biasa','Belum Perlu',NULL,NULL,NULL,NULL,'Mobilitas: \r\nKeterbatasan Fisik: \r\nRiwayat Penyakit Personal: \r\nRiwayat Penyakit Keluarga:',NULL,'Tujuan Diet: \r\nPreskripsi Diet: \r\nKebutuhan Zat Gizi:','Parameter yang dimonitor: \r\nEvaluasi: \r\nTarget akhir intervensi:','2024-01-31 09:49:55','2024-01-31 11:33:33',1,'Masih Panas',0),(6,1,1,NULL,'Risiko Ringan',0,'Udang, Ikan','Diet Biasa','Perlu',77,51,49,17,'Mobilitas: a\r\nKeterbatasan Fisik: a\r\nRiwayat Penyakit Personal: a\r\nRiwayat Penyakit Keluarga: halo','Gizi buruk','Tujuan Diet: a\r\nPreskripsi Diet: abc \r\nKebutuhan Zat Gizi: hihi','Parameter yang dimonitor: a\r\nEvaluasi: b\r\nTarget akhir intervensi: c','2024-01-31 10:44:43','2024-01-31 10:50:13',0,NULL,0);
/*!40000 ALTER TABLE `screening` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ahli Gizi PKU GAMPING','ahligizi@sirs.com','2024-01-12 07:20:26','$2y$12$kFUd8jabpQQTJ.Q8GXYyHuUH1T9/hVtmGsKfIXTuZEhUmtxisxusS',1,'KghW39y6F0TzACWnjpIpjw7prJf6rQJMJFRoaJ8PryCHETclnEV31jNrs3kT','2024-01-12 07:20:26','2024-01-31 03:55:47'),(2,'Kitchen PKU Gamping','kitchen@sirs.com','2024-01-12 07:20:26','$2y$12$fngXz9XZ0wPT49AxaYZD6OOa.2OM35H2A1OGFUPcJZ73bzECPE5xa',2,'M4BdQpaOggSVNedcZ58Njp7mQSikBpXhPUiijbrQ3ICQBTLsnoT7mGOxSxKc','2024-01-12 07:20:26','2024-01-31 04:15:36'),(3,'Distributor','distributor@sirs.com','2024-01-12 07:20:26','$2y$12$Ny6M6Z69oRq0EzCEX5NkG.lZEuJ68NbFymckhh8HJENwYcoZwQ4Te',3,'wgM0M9c0B3fPdTmiWqTmKxeKn1NDo3vN7psKJTov0Y8D2e3zopwXWCKxcV1Y','2024-01-12 07:20:26','2024-01-17 06:08:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'SIRS_GIZI'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-31 20:26:18
