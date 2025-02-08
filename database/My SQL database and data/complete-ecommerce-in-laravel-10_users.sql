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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com','2023000001',NULL,'$2y$10$t60J3KCJHFTGV67kHaqfkO7XAsCegCaWxM6Wwrvbh45ibPmzw8g2.',NULL,'0133329891','admin',NULL,NULL,'active',NULL,NULL,NULL,1,NULL),(2,'Haikal Zahri','jai@gmail.com','2023000002',NULL,'$2y$10$C2X94jF31N1XhPVvobCwU.yhDN7kYlKAiJQQIhSNx5ortTLNn3oYK',NULL,'0175546798','user',NULL,NULL,'active',NULL,NULL,NULL,2,NULL),(3,'Ahmad Nazif','Jep@gmail.com','2023000021',NULL,'$2y$10$VTsOuQO9rVIb7jCxAtqIb.bbqk.6vsnNOjr8sbVRnqf9t5AJiyZSO',NULL,'0164425645','user',NULL,NULL,'active',NULL,NULL,NULL,3,NULL),(4,'Hafidz','deze@gmail.com','2023001201',NULL,'$2y$10$fo2pYp2xJ7KBf7FlUZkJxe9FAz3Ideu4nPVZ3vs5fXLZzoJjstTAy',NULL,'0172648976','user',NULL,NULL,'active',NULL,NULL,NULL,4,NULL),(5,'Syahmi','apai@gmail.com','2023230001',NULL,'$2y$10$3MZBg3yOgIGsYSPULe0f0efZC1SF2OodUtDi2Ynecg2BK1F6DlaF.',NULL,'0163349867','user',NULL,NULL,'active',NULL,NULL,NULL,5,NULL),(6,'Kahirul Azrai','arai@gmail.com','2023765234',NULL,'$2y$10$ASjj5hWbYyNlod6ICbVGrOHMRTddXTbiRILzKIL96eKhUvEo4K.Ue',NULL,'0195542345','user',NULL,NULL,'active',NULL,NULL,NULL,1,NULL),(7,'Syaza','syaza@gmail.com','2023045001',NULL,'$2y$10$hAwlxFiPuWIwq90HKa5Ovu5FP6xMH5uQN7XqUr6Ierk7qT85zmyDy',NULL,'0134457689','user',NULL,NULL,'active',NULL,NULL,NULL,2,NULL),(8,'Farah Afiqah','farah@gmail.com','2023890001',NULL,'$2y$10$KQmBudhcCQBcy9Dpaqhg5.AXyqA2oCaG5BbCU/BbNGpIUro9/Opge',NULL,'0133329823','user',NULL,NULL,'active',NULL,NULL,NULL,3,NULL),(9,'Farisha Maisarah','far@gmail.com','2023120001',NULL,'$2y$10$.bW5zSQkmfOzNJ5sH5Avu.yHWmQX9eei76G4kD8Z.0iJiXHMG9YFe',NULL,'013987367','user',NULL,NULL,'active',NULL,NULL,NULL,4,NULL),(10,'Test User ','user@gmail.com','2023122001',NULL,'$2y$10$Pjpw/xcjvVPVCwqoE5PBSe/fWTKVCyAabUmn.vM9aWrCX3sKDTw9m',NULL,'013987377','user',NULL,NULL,'active',NULL,NULL,NULL,5,NULL);
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

-- Dump completed on 2025-01-22 22:30:26
