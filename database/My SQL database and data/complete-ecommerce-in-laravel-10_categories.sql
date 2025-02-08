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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` bigint unsigned DEFAULT NULL,
  `added_by` bigint unsigned DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  KEY `categories_added_by_foreign` (`added_by`),
  CONSTRAINT `categories_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Electronic','electronic','Electronic devices and gadgets','https://via.placeholder.com/200x200.png/0044ff?text=business+nostrum',1,NULL,1,'active','2025-01-22 04:59:02','2025-01-22 04:59:02'),(2,'Clothing','clothing','Apparel and accessories','https://via.placeholder.com/200x200.png/00ee33?text=business+in',1,NULL,1,'active','2025-01-22 04:59:03','2025-01-22 04:59:03'),(3,'Study Material','study-material','Books, stationery, and educational resources','https://via.placeholder.com/200x200.png/0000dd?text=business+voluptates',1,NULL,1,'active','2025-01-22 04:59:03','2025-01-22 04:59:03'),(4,'Phone','phone','This is the summary for Phone','https://via.placeholder.com/200x200.png/0022ee?text=business+quo',0,1,1,'active','2025-01-22 04:59:03','2025-01-22 04:59:03'),(5,'Computer','computer','This is the summary for Computer','https://via.placeholder.com/200x200.png/00cc77?text=business+in',0,1,1,'active','2025-01-22 04:59:03','2025-01-22 04:59:03'),(6,'Gadget','gadget','This is the summary for Gadget','https://via.placeholder.com/200x200.png/00ee99?text=business+possimus',0,1,1,'active','2025-01-22 04:59:03','2025-01-22 04:59:03'),(7,'Men','men','This is the summary for Men','https://via.placeholder.com/200x200.png/0099cc?text=business+similique',0,2,1,'active','2025-01-22 04:59:03','2025-01-22 04:59:03'),(8,'Women','women','This is the summary for Women','https://via.placeholder.com/200x200.png/005500?text=business+ex',0,2,1,'active','2025-01-22 04:59:03','2025-01-22 04:59:03'),(9,'Book','book','This is the summary for Book','https://via.placeholder.com/200x200.png/00aa99?text=business+similique',0,3,1,'active','2025-01-22 04:59:03','2025-01-22 04:59:03'),(10,'Stationary','stationary','This is the summary for Stationary','https://via.placeholder.com/200x200.png/0000cc?text=business+ducimus',0,3,1,'active','2025-01-22 04:59:03','2025-01-22 04:59:03');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
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
