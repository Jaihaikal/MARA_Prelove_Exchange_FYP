-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: complete-ecommerce-in-laravel-10
-- ------------------------------------------------------
-- Server version	8.0.30
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!50503 SET NAMES utf8 */
;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;
/*!40103 SET TIME_ZONE='+00:00' */
;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;
--
-- Table structure for table `banners`
--
DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banners_slug_unique` (`slug`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `banners`
--
LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */
;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `brands`
--
DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`),
  KEY `brands_category_id_foreign` (`category_id`),
  CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 51 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `brands`
--
LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */
;
INSERT INTO `brands` (
    `id`,
    `title`,
    `slug`,
    `status`,
    `category_id`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Brand - Electronic 1',
    'brand-electronic-1',
    'inactive',
    1,
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    2,
    'Brand - Electronic 2',
    'brand-electronic-2',
    'inactive',
    1,
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    3,
    'Brand - Electronic 3',
    'brand-electronic-3',
    'active',
    1,
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    4,
    'Brand - Electronic 4',
    'brand-electronic-4',
    'inactive',
    1,
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    5,
    'Brand - Electronic 5',
    'brand-electronic-5',
    'inactive',
    1,
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    6,
    'Brand - Clothing 1',
    'brand-clothing-1',
    'inactive',
    2,
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    7,
    'Brand - Clothing 2',
    'brand-clothing-2',
    'active',
    2,
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    8,
    'Brand - Clothing 3',
    'brand-clothing-3',
    'inactive',
    2,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    9,
    'Brand - Clothing 4',
    'brand-clothing-4',
    'inactive',
    2,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    10,
    'Brand - Clothing 5',
    'brand-clothing-5',
    'active',
    2,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    11,
    'Brand - Study Material 1',
    'brand-study-material-1',
    'active',
    3,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    12,
    'Brand - Study Material 2',
    'brand-study-material-2',
    'active',
    3,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    13,
    'Brand - Study Material 3',
    'brand-study-material-3',
    'inactive',
    3,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    14,
    'Brand - Study Material 4',
    'brand-study-material-4',
    'inactive',
    3,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    15,
    'Brand - Study Material 5',
    'brand-study-material-5',
    'inactive',
    3,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    16,
    'Brand - Phone 1',
    'brand-phone-1',
    'active',
    4,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    17,
    'Brand - Phone 2',
    'brand-phone-2',
    'active',
    4,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    18,
    'Brand - Phone 3',
    'brand-phone-3',
    'active',
    4,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    19,
    'Brand - Phone 4',
    'brand-phone-4',
    'active',
    4,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    20,
    'Brand - Phone 5',
    'brand-phone-5',
    'inactive',
    4,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    21,
    'Brand - Computer 1',
    'brand-computer-1',
    'inactive',
    5,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    22,
    'Brand - Computer 2',
    'brand-computer-2',
    'active',
    5,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    23,
    'Brand - Computer 3',
    'brand-computer-3',
    'active',
    5,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    24,
    'Brand - Computer 4',
    'brand-computer-4',
    'inactive',
    5,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    25,
    'Brand - Computer 5',
    'brand-computer-5',
    'active',
    5,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    26,
    'Brand - Gadget 1',
    'brand-gadget-1',
    'active',
    6,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    27,
    'Brand - Gadget 2',
    'brand-gadget-2',
    'active',
    6,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    28,
    'Brand - Gadget 3',
    'brand-gadget-3',
    'inactive',
    6,
    '2025-01-22 04:59:04',
    '2025-01-22 04:59:04'
  ),
(
    29,
    'Brand - Gadget 4',
    'brand-gadget-4',
    'active',
    6,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    30,
    'Brand - Gadget 5',
    'brand-gadget-5',
    'inactive',
    6,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    31,
    'Brand - Men 1',
    'brand-men-1',
    'active',
    7,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    32,
    'Brand - Men 2',
    'brand-men-2',
    'inactive',
    7,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    33,
    'Brand - Men 3',
    'brand-men-3',
    'inactive',
    7,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    34,
    'Brand - Men 4',
    'brand-men-4',
    'inactive',
    7,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    35,
    'Brand - Men 5',
    'brand-men-5',
    'active',
    7,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    36,
    'Brand - Women 1',
    'brand-women-1',
    'inactive',
    8,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    37,
    'Brand - Women 2',
    'brand-women-2',
    'active',
    8,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    38,
    'Brand - Women 3',
    'brand-women-3',
    'active',
    8,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    39,
    'Brand - Women 4',
    'brand-women-4',
    'active',
    8,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    40,
    'Brand - Women 5',
    'brand-women-5',
    'active',
    8,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    41,
    'Brand - Book 1',
    'brand-book-1',
    'active',
    9,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    42,
    'Brand - Book 2',
    'brand-book-2',
    'inactive',
    9,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    43,
    'Brand - Book 3',
    'brand-book-3',
    'active',
    9,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    44,
    'Brand - Book 4',
    'brand-book-4',
    'inactive',
    9,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    45,
    'Brand - Book 5',
    'brand-book-5',
    'inactive',
    9,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    46,
    'Brand - Stationary 1',
    'brand-stationary-1',
    'active',
    10,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    47,
    'Brand - Stationary 2',
    'brand-stationary-2',
    'active',
    10,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    48,
    'Brand - Stationary 3',
    'brand-stationary-3',
    'inactive',
    10,
    '2025-01-22 04:59:05',
    '2025-01-22 04:59:05'
  ),
(
    49,
    'Brand - Stationary 4',
    'brand-stationary-4',
    'inactive',
    10,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    50,
    'Brand - Stationary 5',
    'brand-stationary-5',
    'inactive',
    10,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  );
/*!40000 ALTER TABLE `brands` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `carts`
--
DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `order_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `price` double(8, 2) NOT NULL,
  `status` enum('new', 'progress', 'delivered', 'cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `quantity` int NOT NULL,
  `amount` double(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_product_id_foreign` (`product_id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_order_id_foreign` (`order_id`),
  CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
    CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `carts`
--
LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */
;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `categories`
--
DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` bigint unsigned DEFAULT NULL,
  `added_by` bigint unsigned DEFAULT NULL,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  KEY `categories_added_by_foreign` (`added_by`),
  CONSTRAINT `categories_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE
  SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 11 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `categories`
--
LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */
;
INSERT INTO `categories` (
    `id`,
    `title`,
    `slug`,
    `summary`,
    `photo`,
    `is_parent`,
    `parent_id`,
    `added_by`,
    `status`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Electronic',
    'electronic',
    'Electronic devices and gadgets',
    'https://via.placeholder.com/200x200.png/0044ff?text=business+nostrum',
    1,
    NULL,
    1,
    'active',
    '2025-01-22 04:59:02',
    '2025-01-22 04:59:02'
  ),
(
    2,
    'Clothing',
    'clothing',
    'Apparel and accessories',
    'https://via.placeholder.com/200x200.png/00ee33?text=business+in',
    1,
    NULL,
    1,
    'active',
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    3,
    'Study Material',
    'study-material',
    'Books, stationery, and educational resources',
    'https://via.placeholder.com/200x200.png/0000dd?text=business+voluptates',
    1,
    NULL,
    1,
    'active',
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    4,
    'Phone',
    'phone',
    'This is the summary for Phone',
    'https://via.placeholder.com/200x200.png/0022ee?text=business+quo',
    0,
    1,
    1,
    'active',
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    5,
    'Computer',
    'computer',
    'This is the summary for Computer',
    'https://via.placeholder.com/200x200.png/00cc77?text=business+in',
    0,
    1,
    1,
    'active',
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    6,
    'Gadget',
    'gadget',
    'This is the summary for Gadget',
    'https://via.placeholder.com/200x200.png/00ee99?text=business+possimus',
    0,
    1,
    1,
    'active',
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    7,
    'Men',
    'men',
    'This is the summary for Men',
    'https://via.placeholder.com/200x200.png/0099cc?text=business+similique',
    0,
    2,
    1,
    'active',
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    8,
    'Women',
    'women',
    'This is the summary for Women',
    'https://via.placeholder.com/200x200.png/005500?text=business+ex',
    0,
    2,
    1,
    'active',
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    9,
    'Book',
    'book',
    'This is the summary for Book',
    'https://via.placeholder.com/200x200.png/00aa99?text=business+similique',
    0,
    3,
    1,
    'active',
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  ),
(
    10,
    'Stationary',
    'stationary',
    'This is the summary for Stationary',
    'https://via.placeholder.com/200x200.png/0000cc?text=business+ducimus',
    0,
    3,
    1,
    'active',
    '2025-01-22 04:59:03',
    '2025-01-22 04:59:03'
  );
/*!40000 ALTER TABLE `categories` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `coupons`
--
DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed', 'percent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `value` decimal(20, 2) NOT NULL,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `coupons`
--
LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */
;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `faculties`
--
DROP TABLE IF EXISTS `faculties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `faculties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `faculties`
--
LOCK TABLES `faculties` WRITE;
/*!40000 ALTER TABLE `faculties` DISABLE KEYS */
;
INSERT INTO `faculties` (`id`, `name`, `code`, `created_at`, `updated_at`)
VALUES (
    1,
    'Faculty of Computer Science',
    'FCS',
    '2025-01-22 04:59:01',
    '2025-01-22 04:59:01'
  ),
(
    2,
    'Faculty of Business Management',
    'FBM',
    '2025-01-22 04:59:01',
    '2025-01-22 04:59:01'
  ),
(
    3,
    'Faculty of Engineering',
    'FE',
    '2025-01-22 04:59:01',
    '2025-01-22 04:59:01'
  ),
(
    4,
    'Faculty of Education',
    'FED',
    '2025-01-22 04:59:01',
    '2025-01-22 04:59:01'
  ),
(
    5,
    'Faculty of Medicine',
    'FMED',
    '2025-01-22 04:59:01',
    '2025-01-22 04:59:01'
  );
/*!40000 ALTER TABLE `faculties` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `failed_jobs`
--
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `failed_jobs`
--
LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */
;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `jobs`
--
DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `jobs`
--
LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */
;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `messages`
--
DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `messages`
--
LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */
;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `migrations`
--
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 25 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `migrations`
--
LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */
;
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (1, '2013_10_16_174111_create_faculties_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(
    3,
    '2014_10_12_100000_create_password_resets_table',
    1
  ),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(
    5,
    '2019_12_14_000001_create_personal_access_tokens_table',
    1
  ),
(6, '2020_07_10_012147_create_categories_table', 1),
(7, '2020_07_10_021010_create_brands_table', 1),
(8, '2020_07_10_025334_create_banners_table', 1),
(9, '2020_07_11_063857_create_products_table', 1),
(
    10,
    '2020_07_12_073132_create_post_categories_table',
    1
  ),
(11, '2020_07_12_073701_create_post_tags_table', 1),
(12, '2020_07_12_083638_create_posts_table', 1),
(13, '2020_07_13_151329_create_messages_table', 1),
(14, '2020_07_14_023748_create_shippings_table', 1),
(15, '2020_07_15_054356_create_orders_table', 1),
(16, '2020_07_15_102626_create_carts_table', 1),
(
    17,
    '2020_07_16_041623_create_notifications_table',
    1
  ),
(18, '2020_07_16_053240_create_coupons_table', 1),
(19, '2020_07_23_143757_create_wishlists_table', 1),
(
    20,
    '2020_07_24_074930_create_product_reviews_table',
    1
  ),
(
    21,
    '2020_07_24_131727_create_post_comments_table',
    1
  ),
(22, '2020_08_01_143408_create_settings_table', 1),
(23, '2023_06_21_164432_create_jobs_table', 1),
(
    24,
    '2024_12_02_071447_create_user_product_interactions_table',
    1
  );
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `notifications`
--
DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`, `notifiable_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `notifications`
--
LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */
;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `orders`
--
DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `sub_total` double(8, 2) NOT NULL,
  `shipping_id` bigint unsigned DEFAULT NULL,
  `coupon` double(8, 2) DEFAULT NULL,
  `total_amount` double(8, 2) NOT NULL,
  `quantity` int NOT NULL,
  `payment_method` enum('cod', 'paypal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `payment_status` enum('paid', 'unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `status` enum('new', 'process', 'delivered', 'cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_shipping_id_foreign` (`shipping_id`),
  KEY `orders_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE
  SET NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `orders`
--
LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */
;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `password_resets`
--
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `password_resets`
--
LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */
;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `personal_access_tokens`
--
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `personal_access_tokens`
--
LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */
;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `post_categories`
--
DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `post_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_categories_slug_unique` (`slug`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `post_categories`
--
LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories` DISABLE KEYS */
;
/*!40000 ALTER TABLE `post_categories` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `post_comments`
--
DROP TABLE IF EXISTS `post_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `post_comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `post_id` bigint unsigned DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `replied_comment` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comments_user_id_foreign` (`user_id`),
  KEY `post_comments_post_id_foreign` (`post_id`),
  CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE
  SET NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `post_comments`
--
LOCK TABLES `post_comments` WRITE;
/*!40000 ALTER TABLE `post_comments` DISABLE KEYS */
;
/*!40000 ALTER TABLE `post_comments` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `post_tags`
--
DROP TABLE IF EXISTS `post_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `post_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_tags_slug_unique` (`slug`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `post_tags`
--
LOCK TABLES `post_tags` WRITE;
/*!40000 ALTER TABLE `post_tags` DISABLE KEYS */
;
/*!40000 ALTER TABLE `post_tags` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `posts`
--
DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `quote` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_cat_id` bigint unsigned DEFAULT NULL,
  `post_tag_id` bigint unsigned DEFAULT NULL,
  `added_by` bigint unsigned DEFAULT NULL,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  KEY `posts_post_tag_id_foreign` (`post_tag_id`),
  KEY `posts_added_by_foreign` (`added_by`),
  CONSTRAINT `posts_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `posts_post_cat_id_foreign` FOREIGN KEY (`post_cat_id`) REFERENCES `post_categories` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `posts_post_tag_id_foreign` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tags` (`id`) ON DELETE
  SET NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `posts`
--
LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */
;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `product_reviews`
--
DROP TABLE IF EXISTS `product_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `product_reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `rate` tinyint NOT NULL DEFAULT '0',
  `review` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_user_id_foreign` (`user_id`),
  KEY `product_reviews_product_id_foreign` (`product_id`),
  CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE
  SET NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `product_reviews`
--
LOCK TABLES `product_reviews` WRITE;
/*!40000 ALTER TABLE `product_reviews` DISABLE KEYS */
;
/*!40000 ALTER TABLE `product_reviews` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `products`
--
DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL DEFAULT '1',
  `condition` enum('default', 'new', 'used') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `price` double(8, 2) NOT NULL,
  `discount` double(8, 2) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `cat_id` bigint unsigned DEFAULT NULL,
  `child_cat_id` bigint unsigned DEFAULT NULL,
  `brand_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_user_id_foreign` (`user_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_cat_id_foreign` (`cat_id`),
  KEY `products_child_cat_id_foreign` (`child_cat_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `products_child_cat_id_foreign` FOREIGN KEY (`child_cat_id`) REFERENCES `categories` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `products`
--
LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */
;
INSERT INTO `products` (
    `id`,
    `title`,
    `slug`,
    `summary`,
    `description`,
    `photo`,
    `stock`,
    `condition`,
    `status`,
    `price`,
    `discount`,
    `is_featured`,
    `user_id`,
    `cat_id`,
    `child_cat_id`,
    `brand_id`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Iphone XS',
    'iphone-xs',
    'Quisquam maxime occaecati et.',
    'Molestiae voluptatum incidunt accusamus et et exercitationem aut quidem. Ullam voluptas doloremque provident quaerat possimus blanditiis. Consequatur ut corporis dolor sint et consectetur. Molestias quia rerum quam.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    4,
    'used',
    'active',
    824.00,
    20.00,
    1,
    4,
    1,
    4,
    3,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    2,
    'Samsung S9',
    'samsung-s9',
    'Porro dolores magni dolorem eos.',
    'Est et consectetur consequatur a magni sint deserunt vel. Rerum praesentium et ab hic. Quod excepturi voluptate deserunt itaque quis beatae. Est aut cupiditate est in nesciunt dolore doloremque.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    1,
    'used',
    'active',
    801.00,
    14.00,
    1,
    7,
    1,
    4,
    4,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    3,
    'MSI GF63',
    'msi-gf63',
    'Architecto expedita maiores voluptate aliquam in quod iure.',
    'Molestiae aliquid ullam exercitationem consequatur recusandae voluptatem. Autem voluptatem quia quos et laudantium in.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    4,
    'used',
    'active',
    828.00,
    16.00,
    1,
    9,
    1,
    5,
    2,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    4,
    'Asus ROG TUF',
    'asus-rog-tuf',
    'Incidunt maxime modi distinctio consequatur ut similique.',
    'Amet ut numquam ad officia ut corporis. Pariatur suscipit doloremque laboriosam nisi rerum velit.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    2,
    'used',
    'active',
    891.00,
    35.00,
    1,
    1,
    1,
    5,
    3,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    5,
    'Earbud Samsung',
    'earbud-samsung',
    'Et ad velit mollitia voluptatem voluptatem ea est.',
    'Ut voluptas corporis id placeat necessitatibus eos quia. Quas ex sunt praesentium ullam molestias. Vitae rerum ut quo sed et odit sed totam. Corrupti aperiam unde porro nihil beatae.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    4,
    'used',
    'active',
    984.00,
    24.00,
    1,
    7,
    1,
    6,
    6,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    6,
    'Headphone Redmi',
    'headphone-redmi',
    'Aspernatur et deserunt consectetur.',
    'Quis nisi aut ad ut exercitationem. Aut repellat consectetur iure. Vitae voluptatem dolorem odit sequi. Asperiores et rerum ut esse assumenda.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    5,
    'used',
    'active',
    548.00,
    27.00,
    1,
    4,
    1,
    6,
    2,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    7,
    'Denim Jacket',
    'denim-jacket',
    'Explicabo nihil sed vero suscipit quia exercitationem totam.',
    'Amet repellat soluta consequatur molestiae sapiente adipisci necessitatibus. Sit perspiciatis quae minima porro saepe eligendi. Delectus delectus voluptas ut aut voluptates sint debitis eos.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    1,
    'new',
    'active',
    878.00,
    36.00,
    1,
    8,
    2,
    7,
    7,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    8,
    'North Face Hoodie',
    'north-face-hoodie',
    'Necessitatibus delectus qui enim cumque consequuntur.',
    'Enim dolorem adipisci natus consequuntur dolores mollitia sequi. Dolor aut neque quam voluptatem distinctio rerum voluptatum autem. Est velit laudantium hic voluptatem enim.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    1,
    'new',
    'active',
    367.00,
    36.00,
    1,
    10,
    2,
    7,
    9,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    9,
    'ZARA Blouser',
    'zara-blouser',
    'Ipsam veritatis illum voluptate temporibus veniam veniam.',
    'Explicabo consequuntur quia deserunt consequatur esse quo quibusdam alias. Placeat repellat enim praesentium illo. Sit et quo nihil ut culpa aut. Laudantium laudantium magni ut quia nihil accusamus quia.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    4,
    'used',
    'active',
    69.00,
    50.00,
    1,
    9,
    2,
    8,
    5,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    10,
    'Oversize Jeans',
    'oversize-jeans',
    'In illo ea est maxime.',
    'Dolorum dolores cupiditate cupiditate cupiditate velit eos et. Ipsa maxime neque quam temporibus delectus omnis. Hic explicabo omnis nemo ea.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    2,
    'used',
    'active',
    365.00,
    40.00,
    1,
    8,
    2,
    8,
    10,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    11,
    'Basic Accounting',
    'basic-accounting',
    'Id ab nobis voluptate eum officiis quia.',
    'Eaque est beatae facere voluptatibus tempora voluptatem sed dignissimos. Ducimus eligendi alias cumque vel veniam ut. Soluta reprehenderit sit debitis mollitia odio ullam. Maxime occaecati atque a itaque consequatur cum.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    5,
    'new',
    'active',
    438.00,
    10.00,
    1,
    4,
    3,
    9,
    5,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    12,
    'C++ for Beginner',
    'c-for-beginner',
    'Aliquid recusandae omnis et architecto nesciunt.',
    'Corrupti omnis maxime quisquam vero. Nihil aut magni atque quia ab molestiae dolores. Ad neque nostrum temporibus accusamus ut perferendis. Nemo at animi dolorem fuga vitae rem sunt.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    4,
    'used',
    'active',
    458.00,
    0.00,
    1,
    3,
    3,
    9,
    1,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    13,
    'Architecture Drawing Tools',
    'architecture-drawing-tools',
    'Nisi deserunt velit esse nam dicta nemo.',
    'Aliquid et a voluptatem doloribus. At reiciendis at in mollitia magni. Eos consequatur dolor aut atque ipsum ut molestiae.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    1,
    'new',
    'active',
    291.00,
    11.00,
    1,
    2,
    3,
    10,
    2,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  ),
(
    14,
    'Calculator',
    'calculator',
    'Sequi id quo voluptatem nam.',
    'Enim ut quidem nulla. Et explicabo enim quidem consequuntur rerum.',
    '/storage/photos/1/Products/ProductDummy.jpg',
    4,
    'new',
    'active',
    708.00,
    14.00,
    1,
    2,
    3,
    10,
    2,
    '2025-01-22 04:59:06',
    '2025-01-22 04:59:06'
  );
/*!40000 ALTER TABLE `products` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `settings`
--
DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `settings`
--
LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */
;
INSERT INTO `settings` (
    `id`,
    `description`,
    `short_des`,
    `logo`,
    `photo`,
    `address`,
    `phone`,
    `email`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis unde sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis unde omnis iste natus error sit voluptatem Excepteu\r\n\r\n                            sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspi deserunt mollit anim id est laborum. sed ut perspi.',
    'Developed by UiTM, MPeX is designed to provide an exceptional platform for the UiTM student community to buy, sell, and exchange preloved items, fostering sustainability and convenience',
    '/storage/photos/1/MPEX.png',
    '/storage/photos/1/MPEX.png',
    'UiTM Shah ALAM',
    '+60-17 269 1270',
    'mpex@gmail.com',
    NULL,
    '2025-01-22 05:52:17'
  );
/*!40000 ALTER TABLE `settings` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `shippings`
--
DROP TABLE IF EXISTS `shippings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `shippings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8, 2) NOT NULL,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `shippings`
--
LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */
;
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `user_product_interactions`
--
DROP TABLE IF EXISTS `user_product_interactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `user_product_interactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `interaction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_product_interactions_user_id_foreign` (`user_id`),
  KEY `user_product_interactions_product_id_foreign` (`product_id`),
  CONSTRAINT `user_product_interactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_product_interactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `user_product_interactions`
--
LOCK TABLES `user_product_interactions` WRITE;
/*!40000 ALTER TABLE `user_product_interactions` DISABLE KEYS */
;
INSERT INTO `user_product_interactions` (
    `id`,
    `user_id`,
    `product_id`,
    `interaction`,
    `weight`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    1,
    1,
    'view',
    1,
    '2025-01-22 05:51:03',
    '2025-01-22 05:51:03'
  );
/*!40000 ALTER TABLE `user_product_interactions` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin', 'user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active', 'inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faculty_id` bigint unsigned DEFAULT NULL,
  `campus_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_student_id_unique` (`student_id`),
  KEY `users_faculty_id_foreign` (`faculty_id`),
  CONSTRAINT `users_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `users`
--
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */
;
INSERT INTO `users` (
    `id`,
    `name`,
    `email`,
    `student_id`,
    `email_verified_at`,
    `password`,
    `photo`,
    `phone`,
    `role`,
    `provider`,
    `provider_id`,
    `status`,
    `remember_token`,
    `created_at`,
    `updated_at`,
    `faculty_id`,
    `campus_id`
  )
VALUES (
    1,
    'Admin',
    'admin@gmail.com',
    '2023000001',
    NULL,
    '$2y$10$t60J3KCJHFTGV67kHaqfkO7XAsCegCaWxM6Wwrvbh45ibPmzw8g2.',
    NULL,
    '0133329891',
    'admin',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    1,
    NULL
  ),
(
    2,
    'Haikal Zahri',
    'jai@gmail.com',
    '2023000002',
    NULL,
    '$2y$10$C2X94jF31N1XhPVvobCwU.yhDN7kYlKAiJQQIhSNx5ortTLNn3oYK',
    NULL,
    '0175546798',
    'user',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    2,
    NULL
  ),
(
    3,
    'Ahmad Nazif',
    'Jep@gmail.com',
    '2023000021',
    NULL,
    '$2y$10$VTsOuQO9rVIb7jCxAtqIb.bbqk.6vsnNOjr8sbVRnqf9t5AJiyZSO',
    NULL,
    '0164425645',
    'user',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    3,
    NULL
  ),
(
    4,
    'Hafidz',
    'deze@gmail.com',
    '2023001201',
    NULL,
    '$2y$10$fo2pYp2xJ7KBf7FlUZkJxe9FAz3Ideu4nPVZ3vs5fXLZzoJjstTAy',
    NULL,
    '0172648976',
    'user',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    4,
    NULL
  ),
(
    5,
    'Syahmi',
    'apai@gmail.com',
    '2023230001',
    NULL,
    '$2y$10$3MZBg3yOgIGsYSPULe0f0efZC1SF2OodUtDi2Ynecg2BK1F6DlaF.',
    NULL,
    '0163349867',
    'user',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    5,
    NULL
  ),
(
    6,
    'Kahirul Azrai',
    'arai@gmail.com',
    '2023765234',
    NULL,
    '$2y$10$ASjj5hWbYyNlod6ICbVGrOHMRTddXTbiRILzKIL96eKhUvEo4K.Ue',
    NULL,
    '0195542345',
    'user',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    1,
    NULL
  ),
(
    7,
    'Syaza',
    'syaza@gmail.com',
    '2023045001',
    NULL,
    '$2y$10$hAwlxFiPuWIwq90HKa5Ovu5FP6xMH5uQN7XqUr6Ierk7qT85zmyDy',
    NULL,
    '0134457689',
    'user',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    2,
    NULL
  ),
(
    8,
    'Farah Afiqah',
    'farah@gmail.com',
    '2023890001',
    NULL,
    '$2y$10$KQmBudhcCQBcy9Dpaqhg5.AXyqA2oCaG5BbCU/BbNGpIUro9/Opge',
    NULL,
    '0133329823',
    'user',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    3,
    NULL
  ),
(
    9,
    'Farisha Maisarah',
    'far@gmail.com',
    '2023120001',
    NULL,
    '$2y$10$.bW5zSQkmfOzNJ5sH5Avu.yHWmQX9eei76G4kD8Z.0iJiXHMG9YFe',
    NULL,
    '013987367',
    'user',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    4,
    NULL
  ),
(
    10,
    'Test User ',
    'user@gmail.com',
    '2023122001',
    NULL,
    '$2y$10$Pjpw/xcjvVPVCwqoE5PBSe/fWTKVCyAabUmn.vM9aWrCX3sKDTw9m',
    NULL,
    '013987377',
    'user',
    NULL,
    NULL,
    'active',
    NULL,
    NULL,
    NULL,
    5,
    NULL
  );
/*!40000 ALTER TABLE `users` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `wishlists`
--
DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `cart_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `price` double(8, 2) NOT NULL,
  `quantity` int NOT NULL,
  `amount` double(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_cart_id_foreign` (`cart_id`),
  CONSTRAINT `wishlists_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE
  SET NULL,
    CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
    CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE
  SET NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `wishlists`
--
LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */
;
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */
;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;
-- Dump completed on 2025-01-22 22:39:28