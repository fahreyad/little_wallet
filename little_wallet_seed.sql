-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: little_wallet
-- ------------------------------------------------------
-- Server version	8.0.46

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
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
-- Table structure for table `income_sources`
--

DROP TABLE IF EXISTS `income_sources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `income_sources` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `investment_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income_sources`
--

LOCK TABLES `income_sources` WRITE;
/*!40000 ALTER TABLE `income_sources` DISABLE KEYS */;
INSERT INTO `income_sources` VALUES (1,'Garments','Investment: 100,000.00',100000.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(2,'Coconut','Investment: 52,500.00',52500.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(3,'Banana','Investment: 22,000.00',22000.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(4,'Bobin','Investment: 20,000.00',20000.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(5,'Supari','Investment: 31,000.00',31000.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(6,'Mango','Investment: 150,000.00',150000.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(7,'Fruit','Investment: 20,000.00',20000.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(8,'Uber','Investment: 0.00',0.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(9,'Piyaj','Investment: 0.00',0.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(10,'Lithu','Investment: 0.00',0.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(11,'Mosola','Investment: 0.00',0.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(12,'Khasi','Investment: 0.00',0.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(13,'Extra','Investment: 0.00',0.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27'),(14,'Adjustment','Investment: 0.00',0.00,1,'2026-08-19 15:37:27','2026-08-19 15:37:27');
/*!40000 ALTER TABLE `income_sources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_01_01_000001_create_personal_access_tokens_table',1),(5,'2024_01_15_000001_create_income_sources_table',1),(6,'2024_01_15_000002_create_profits_table',1),(7,'2026_07_30_000001_add_investment_amount_to_income_sources_table',1),(8,'2026_07_30_000002_add_date_to_profits_table',1),(9,'2026_07_30_000003_remove_month_from_profits_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `profits`
--

DROP TABLE IF EXISTS `profits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `income_source_id` bigint unsigned NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profits_new_date_index` (`date`),
  KEY `profits_new_income_source_id_date_index` (`income_source_id`,`date`),
  CONSTRAINT `profits_new_income_source_id_foreign` FOREIGN KEY (`income_source_id`) REFERENCES `income_sources` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profits`
--

LOCK TABLES `profits` WRITE;
/*!40000 ALTER TABLE `profits` DISABLE KEYS */;
INSERT INTO `profits` VALUES (1,2,2000.00,2000.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(2,2,2425.00,2425.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(3,2,3085.00,3085.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(4,2,4075.00,4075.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(5,5,2700.00,2700.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(6,5,2800.00,2800.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(7,5,2800.00,2800.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(8,1,3000.00,3000.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(9,1,2000.00,2000.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(10,1,2500.00,5500.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(11,8,150.00,150.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(12,3,200.00,200.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(13,3,200.00,200.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(14,3,200.00,200.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(15,3,200.00,200.00,'2026-02-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(16,2,3975.00,7950.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(17,2,1910.00,1910.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(18,5,2700.00,6000.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(19,1,4500.00,9500.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(20,1,4590.00,9850.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(21,1,4520.00,9850.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(22,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(23,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(24,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(25,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(26,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(27,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(28,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(29,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(30,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(31,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(32,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(33,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(34,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(35,3,200.00,200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(36,3,1200.00,1200.00,'2026-03-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(37,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(38,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(39,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(40,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(41,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(42,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(43,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(44,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(45,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(46,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(47,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(48,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(49,3,250.00,250.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(50,3,200.00,200.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(51,3,200.00,200.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(52,3,200.00,200.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(53,3,200.00,200.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(54,3,200.00,200.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(55,3,200.00,200.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(56,2,2000.00,2000.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(57,2,2200.00,2200.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(58,2,2200.00,2200.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(59,4,1500.00,1500.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(60,4,3750.00,3750.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(61,4,1750.00,1750.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(62,4,1750.00,1750.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(63,1,2300.00,5000.00,'2026-04-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(64,14,600.00,600.00,'2026-04-26','Auto adjustment to match monthly total of 22500','2026-08-19 15:37:27','2026-08-19 15:37:27'),(65,4,1750.00,415.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(66,4,1750.00,400.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(67,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(68,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(69,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(70,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(71,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(72,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(73,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(74,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(75,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(76,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(77,3,200.00,200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(78,9,600.00,600.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(79,9,1400.00,1400.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(80,9,1400.00,1400.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(81,1,2300.00,5000.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(82,2,2200.00,2200.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(83,10,900.00,900.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(84,11,900.00,900.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(85,12,2400.00,4000.00,'2026-05-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(86,14,1800.00,1800.00,'2026-05-26','Auto adjustment to match monthly total of 19600','2026-08-19 15:37:27','2026-08-19 15:37:27'),(87,1,2200.00,4000.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(88,6,2400.00,4000.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(89,6,2400.00,4000.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(90,6,2400.00,4000.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(91,6,3000.00,5000.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(92,6,3000.00,5000.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(93,3,200.00,200.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(94,3,200.00,200.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(95,3,200.00,200.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(96,3,200.00,200.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(97,3,200.00,200.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(98,3,200.00,200.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(99,3,200.00,200.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(100,3,200.00,200.00,'2026-06-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(101,14,3000.00,3000.00,'2026-06-26','Auto adjustment to match monthly total of 20000','2026-08-19 15:37:27','2026-08-19 15:37:27'),(102,5,3000.00,5000.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(103,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(104,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(105,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(106,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(107,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(108,3,100.00,100.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(109,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(110,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(111,3,300.00,300.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(112,3,300.00,300.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(113,3,400.00,400.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(114,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(115,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(116,3,200.00,200.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(117,3,400.00,400.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(118,6,3000.00,5000.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(119,6,3600.00,6000.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(120,6,3600.00,6000.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(121,13,500.00,800.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(122,13,300.00,500.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(123,1,2800.00,4800.00,'2026-07-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(124,7,720.00,1200.00,'2026-08-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(125,7,720.00,1200.00,'2026-08-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(126,7,700.00,1200.00,'2026-08-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(127,1,2880.00,4800.00,'2026-08-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(128,3,400.00,400.00,'2026-08-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(129,3,200.00,200.00,'2026-08-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(130,3,200.00,200.00,'2026-08-26','Seeded','2026-08-19 15:37:27','2026-08-19 15:37:27'),(131,3,200.00,200.00,'2026-08-26','Seeded','2026-08-19 15:37:28','2026-08-19 15:37:28'),(132,3,200.00,200.00,'2026-08-26','Seeded','2026-08-19 15:37:28','2026-08-19 15:37:28'),(133,3,200.00,200.00,'2026-08-26','Seeded','2026-08-19 15:37:28','2026-08-19 15:37:28');
/*!40000 ALTER TABLE `profits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin User','admin@example.com',NULL,'$2y$12$eedUc0CnbU5vzs0cuJ3O5.l/w0iI15PD6aOANzgAJT9askjYWjuQy',NULL,'2026-08-19 15:37:27','2026-08-19 15:37:27');
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

-- Dump completed on 2026-08-19 15:38:13
