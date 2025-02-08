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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL DEFAULT '1',
  `condition` enum('default','new','used') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
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
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_child_cat_id_foreign` FOREIGN KEY (`child_cat_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Iphone XS','iphone-xs','Quisquam maxime occaecati et.','Molestiae voluptatum incidunt accusamus et et exercitationem aut quidem. Ullam voluptas doloremque provident quaerat possimus blanditiis. Consequatur ut corporis dolor sint et consectetur. Molestias quia rerum quam.','/storage/photos/1/Products/ProductDummy.jpg',4,'used','active',824.00,20.00,1,4,1,4,3,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(2,'Samsung S9','samsung-s9','Porro dolores magni dolorem eos.','Est et consectetur consequatur a magni sint deserunt vel. Rerum praesentium et ab hic. Quod excepturi voluptate deserunt itaque quis beatae. Est aut cupiditate est in nesciunt dolore doloremque.','/storage/photos/1/Products/ProductDummy.jpg',1,'used','active',801.00,14.00,1,7,1,4,4,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(3,'MSI GF63','msi-gf63','Architecto expedita maiores voluptate aliquam in quod iure.','Molestiae aliquid ullam exercitationem consequatur recusandae voluptatem. Autem voluptatem quia quos et laudantium in.','/storage/photos/1/Products/ProductDummy.jpg',4,'used','active',828.00,16.00,1,9,1,5,2,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(4,'Asus ROG TUF','asus-rog-tuf','Incidunt maxime modi distinctio consequatur ut similique.','Amet ut numquam ad officia ut corporis. Pariatur suscipit doloremque laboriosam nisi rerum velit.','/storage/photos/1/Products/ProductDummy.jpg',2,'used','active',891.00,35.00,1,1,1,5,3,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(5,'Earbud Samsung','earbud-samsung','Et ad velit mollitia voluptatem voluptatem ea est.','Ut voluptas corporis id placeat necessitatibus eos quia. Quas ex sunt praesentium ullam molestias. Vitae rerum ut quo sed et odit sed totam. Corrupti aperiam unde porro nihil beatae.','/storage/photos/1/Products/ProductDummy.jpg',4,'used','active',984.00,24.00,1,7,1,6,6,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(6,'Headphone Redmi','headphone-redmi','Aspernatur et deserunt consectetur.','Quis nisi aut ad ut exercitationem. Aut repellat consectetur iure. Vitae voluptatem dolorem odit sequi. Asperiores et rerum ut esse assumenda.','/storage/photos/1/Products/ProductDummy.jpg',5,'used','active',548.00,27.00,1,4,1,6,2,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(7,'Denim Jacket','denim-jacket','Explicabo nihil sed vero suscipit quia exercitationem totam.','Amet repellat soluta consequatur molestiae sapiente adipisci necessitatibus. Sit perspiciatis quae minima porro saepe eligendi. Delectus delectus voluptas ut aut voluptates sint debitis eos.','/storage/photos/1/Products/ProductDummy.jpg',1,'new','active',878.00,36.00,1,8,2,7,7,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(8,'North Face Hoodie','north-face-hoodie','Necessitatibus delectus qui enim cumque consequuntur.','Enim dolorem adipisci natus consequuntur dolores mollitia sequi. Dolor aut neque quam voluptatem distinctio rerum voluptatum autem. Est velit laudantium hic voluptatem enim.','/storage/photos/1/Products/ProductDummy.jpg',1,'new','active',367.00,36.00,1,10,2,7,9,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(9,'ZARA Blouser','zara-blouser','Ipsam veritatis illum voluptate temporibus veniam veniam.','Explicabo consequuntur quia deserunt consequatur esse quo quibusdam alias. Placeat repellat enim praesentium illo. Sit et quo nihil ut culpa aut. Laudantium laudantium magni ut quia nihil accusamus quia.','/storage/photos/1/Products/ProductDummy.jpg',4,'used','active',69.00,50.00,1,9,2,8,5,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(10,'Oversize Jeans','oversize-jeans','In illo ea est maxime.','Dolorum dolores cupiditate cupiditate cupiditate velit eos et. Ipsa maxime neque quam temporibus delectus omnis. Hic explicabo omnis nemo ea.','/storage/photos/1/Products/ProductDummy.jpg',2,'used','active',365.00,40.00,1,8,2,8,10,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(11,'Basic Accounting','basic-accounting','Id ab nobis voluptate eum officiis quia.','Eaque est beatae facere voluptatibus tempora voluptatem sed dignissimos. Ducimus eligendi alias cumque vel veniam ut. Soluta reprehenderit sit debitis mollitia odio ullam. Maxime occaecati atque a itaque consequatur cum.','/storage/photos/1/Products/ProductDummy.jpg',5,'new','active',438.00,10.00,1,4,3,9,5,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(12,'C++ for Beginner','c-for-beginner','Aliquid recusandae omnis et architecto nesciunt.','Corrupti omnis maxime quisquam vero. Nihil aut magni atque quia ab molestiae dolores. Ad neque nostrum temporibus accusamus ut perferendis. Nemo at animi dolorem fuga vitae rem sunt.','/storage/photos/1/Products/ProductDummy.jpg',4,'used','active',458.00,0.00,1,3,3,9,1,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(13,'Architecture Drawing Tools','architecture-drawing-tools','Nisi deserunt velit esse nam dicta nemo.','Aliquid et a voluptatem doloribus. At reiciendis at in mollitia magni. Eos consequatur dolor aut atque ipsum ut molestiae.','/storage/photos/1/Products/ProductDummy.jpg',1,'new','active',291.00,11.00,1,2,3,10,2,'2025-01-22 04:59:06','2025-01-22 04:59:06'),(14,'Calculator','calculator','Sequi id quo voluptatem nam.','Enim ut quidem nulla. Et explicabo enim quidem consequuntur rerum.','/storage/photos/1/Products/ProductDummy.jpg',4,'new','active',708.00,14.00,1,2,3,10,2,'2025-01-22 04:59:06','2025-01-22 04:59:06');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-22 22:30:26
