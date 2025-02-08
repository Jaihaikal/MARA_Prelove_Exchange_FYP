-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: complete-ecommerce-in-laravel-10
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`),
  KEY `brands_category_id_foreign` (`category_id`),
  CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Brand - Electronic 1','brand-electronic-1','inactive',1,'2025-01-22 04:59:03','2025-01-22 04:59:03'),(2,'Brand - Electronic 2','brand-electronic-2','inactive',1,'2025-01-22 04:59:03','2025-01-22 04:59:03'),(3,'Brand - Electronic 3','brand-electronic-3','active',1,'2025-01-22 04:59:03','2025-01-22 04:59:03'),(4,'Brand - Electronic 4','brand-electronic-4','inactive',1,'2025-01-22 04:59:03','2025-01-22 04:59:03'),(5,'Brand - Electronic 5','brand-electronic-5','inactive',1,'2025-01-22 04:59:03','2025-01-22 04:59:03'),(6,'Brand - Clothing 1','brand-clothing-1','inactive',2,'2025-01-22 04:59:03','2025-01-22 04:59:03'),(7,'Brand - Clothing 2','brand-clothing-2','active',2,'2025-01-22 04:59:03','2025-01-22 04:59:03'),(8,'Brand - Clothing 3','brand-clothing-3','inactive',2,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(9,'Brand - Clothing 4','brand-clothing-4','inactive',2,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(10,'Brand - Clothing 5','brand-clothing-5','active',2,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(11,'Brand - Study Material 1','brand-study-material-1','active',3,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(12,'Brand - Study Material 2','brand-study-material-2','active',3,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(13,'Brand - Study Material 3','brand-study-material-3','inactive',3,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(14,'Brand - Study Material 4','brand-study-material-4','inactive',3,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(15,'Brand - Study Material 5','brand-study-material-5','inactive',3,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(16,'Brand - Phone 1','brand-phone-1','active',4,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(17,'Brand - Phone 2','brand-phone-2','active',4,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(18,'Brand - Phone 3','brand-phone-3','active',4,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(19,'Brand - Phone 4','brand-phone-4','active',4,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(20,'Brand - Phone 5','brand-phone-5','inactive',4,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(21,'Brand - Computer 1','brand-computer-1','inactive',5,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(22,'Brand - Computer 2','brand-computer-2','active',5,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(23,'Brand - Computer 3','brand-computer-3','active',5,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(24,'Brand - Computer 4','brand-computer-4','inactive',5,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(25,'Brand - Computer 5','brand-computer-5','active',5,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(26,'Brand - Gadget 1','brand-gadget-1','active',6,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(27,'Brand - Gadget 2','brand-gadget-2','active',6,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(28,'Brand - Gadget 3','brand-gadget-3','inactive',6,'2025-01-22 04:59:04','2025-01-22 04:59:04'),(29,'Brand - Gadget 4','brand-gadget-4','active',6,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(30,'Brand - Gadget 5','brand-gadget-5','inactive',6,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(31,'Brand - Men 1','brand-men-1','active',7,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(32,'Brand - Men 2','brand-men-2','inactive',7,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(33,'Brand - Men 3','brand-men-3','inactive',7,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(34,'Brand - Men 4','brand-men-4','inactive',7,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(35,'Brand - Men 5','brand-men-5','active',7,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(36,'Brand - Women 1','brand-women-1','inactive',8,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(37,'Brand - Women 2','brand-women-2','active',8,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(38,'Brand - Women 3','brand-women-3','active',8,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(39,'Brand - Women 4','brand-women-4','active',8,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(40,'Brand - Women 5','brand-women-5','active',8,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(41,'Brand - Book 1','brand-book-1','active',9,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(42,'Brand - Book 2','brand-book-2','inactive',9,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(43,'Brand - Book 3','brand-book-3','active',9,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(44,'Brand - Book 4','brand-book-4','inactive',9,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(45,'Brand - Book 5','brand-book-5','inactive',9,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(46,'Brand - Stationary 1','brand-stationary-1','active',10,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(47,'Brand - Stationary 2','brand-stationary-2','active',10,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(48,'Brand - Stationary 3','brand-stationary-3','inactive',10,'2025-01-22 04:59:05','2025-01-22 04:59:05'),(49,'Brand - Stationary 4','brand-stationary-4','inactive',10,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(50,'Brand - Stationary 5','brand-stationary-5','inactive',10,'2025-01-22 04:59:06','2025-01-22 04:59:06');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-22 22:30:27
