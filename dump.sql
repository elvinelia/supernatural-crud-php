-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: supernatural_db
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `personajes`
--

DROP TABLE IF EXISTS `personajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personajes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` int NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personajes`
--

LOCK TABLES `personajes` WRITE;
/*!40000 ALTER TABLE `personajes` DISABLE KEYS */;
INSERT INTO `personajes` VALUES (1,'Dim winchester','blanco','cazador',10,'https://thewinchesterfamilybusiness.com/wp-content/uploads/2020/06/images_SeasonSix_S6Promo_image4.jpg'),(3,'sam winchester','blanco','cazador',11,'https://www.jacketsjunction.com/wp-content/uploads/2025/03/Supernatural-Sam-Winchester-Brown-Cotton-Jacket.webp'),(4,'bobby','blanco','cazador',8,'https://www.hallofseries.com/wp-content/uploads/2018/09/bobby-singer.jpg'),(5,'castiel','blanco','angel cazador',15,'https://static1.srcdn.com/wordpress/wp-content/uploads/2018/12/Castiel-and-Angel-Wings.jpg'),(6,'jack','blanco','Nefilim',20,'https://preview.redd.it/i-just-saw-jack-for-the-first-time-v0-t5wk2qcz0lde1.jpeg?auto=webp&s=df61cb745f4b864601df4ba00303d943211cb53a'),(7,'crowley','blanco','demonio',15,'https://preview.redd.it/crowleys-exit-v0-z00bb91ioyoc1.jpeg?auto=webp&s=fa6db514f7904c109ab5dcb08cc26f7bd019d6b3'),(8,'rowena','peli roja','bruja',12,'https://preview.redd.it/rowena-appreciation-v0-lszcqjjwubge1.jpg?width=640&crop=smart&auto=webp&s=ebfaf69f946144479df01c055c7cde8c1570b308'),(9,'cain','blanco','Caballero del Infierno',15,'https://i.redd.it/thoughts-on-cain-v0-yzr2y4dklqpc1.jpg?width=735&format=pjpg&auto=webp&s=a3ffa9e718e9241aa1d4f84903a3d9be4b448b14'),(10,'lucifer','blanco','angel caido',20,'https://i.redd.it/all-right-guys-out-of-all-3-lucifers-which-is-your-favorite-v0-l4uxsk2d84za1.jpg?width=1200&format=pjpg&auto=webp&s=3191f5c8d2db540f6b9ffe7798603c4188cf64f5');
/*!40000 ALTER TABLE `personajes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-03 11:28:18
