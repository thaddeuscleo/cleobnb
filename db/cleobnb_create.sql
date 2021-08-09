-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: cleobnb
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.21.04.3

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
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amenities` (
  `kitchen` tinyint(1) DEFAULT '0',
  `free_parking` tinyint(1) DEFAULT '0',
  `pets_allowed` tinyint(1) DEFAULT '0',
  `wifi` tinyint(1) DEFAULT '0',
  `backyard` tinyint(1) DEFAULT '0',
  `security_camera` tinyint(1) DEFAULT '0',
  `hot_tub` tinyint(1) DEFAULT '0',
  `smoke_alarm` tinyint(1) DEFAULT '0',
  `dedicated_workspace` tinyint(1) DEFAULT '0',
  `space_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `amenities_FK` (`space_id`),
  CONSTRAINT `amenities_FK` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amenities`
--

LOCK TABLES `amenities` WRITE;
/*!40000 ALTER TABLE `amenities` DISABLE KEYS */;
INSERT INTO `amenities` VALUES (0,0,0,0,0,0,0,0,0,8,1),(0,0,0,0,0,0,0,0,0,8,2),(1,0,0,0,0,0,0,0,0,11,4),(1,1,0,0,0,0,1,1,1,12,5),(1,1,1,0,0,0,0,0,0,13,6);
/*!40000 ALTER TABLE `amenities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `space_images`
--

DROP TABLE IF EXISTS `space_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `space_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `space_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `space_images_FK` (`space_id`),
  CONSTRAINT `space_images_FK` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `space_images`
--

LOCK TABLES `space_images` WRITE;
/*!40000 ALTER TABLE `space_images` DISABLE KEYS */;
INSERT INTO `space_images` VALUES (7,'60f1459f434f77.00785950.webp',3),(8,'60f14bc9e77138.21870252.webp',4),(9,'60f14bc9eae002.18012231.webp',4),(10,'60f14bca3b7696.15006472.webp',4),(11,'60f19ddf5a9b64.23438978.webp',5),(12,'60f19de0cab9b7.15934866.webp',5),(13,'60f19de1a1b614.82727891.webp',5),(14,'60f1a30d750416.90353923.webp',6),(15,'60f1a30ed7f196.97234963.webp',6),(16,'60f50276b91425.09124204.webp',8),(17,'60f5027811fa08.64183960.webp',8),(18,'60f5045b18d0d0.68094213.webp',8),(19,'60f5045c6b34a4.18730850.webp',8),(22,'60f50539b68859.61338878.webp',11),(23,'60f5053b0827f5.34112018.webp',11),(26,'60f5af34048d45.35532527.webp',12),(27,'60f5af3540c808.13305084.webp',12),(28,'610a02d2be03e9.86763262.webp',13),(29,'610a02d40e0e46.38582192.webp',13);
/*!40000 ALTER TABLE `space_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spaces`
--

DROP TABLE IF EXISTS `spaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spaces` (
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `about` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bedroom_count` int NOT NULL,
  `bed_count` int NOT NULL,
  `bathroom_count` int DEFAULT NULL,
  `shower_count` int NOT NULL,
  `bathub_count` int NOT NULL,
  `place_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `guess_count` int NOT NULL,
  `price` int NOT NULL,
  `available` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_FK` (`user_id`),
  CONSTRAINT `rooms_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spaces`
--

LOCK TABLES `spaces` WRITE;
/*!40000 ALTER TABLE `spaces` DISABLE KEYS */;
INSERT INTO `spaces` VALUES ('Notion',3,'2021-07-16','2021-07-23','America','',3,3,5,4,4,'private_room',5,2,100000,1),('Nomaden',4,'2021-07-16','2021-07-23','Yoman','',4,3,4,4,3,'hotel_room',5,3,100000,1),('Beta',5,'2021-07-23','2021-07-30','Vancouver','Better Wifi Speed',2,3,2,2,2,'Private room',5,5,100000,1),('Magic',6,'2021-07-16','2021-07-30','Monolight','',2,2,3,2,3,'Shared room',5,3,100000,1),('Cool',8,'2021-07-20','2021-07-27','QQ','q',3,3,3,3,3,'Private room',5,2,10000000,1),('Cool',9,'2021-07-20','2021-07-27','QQ','q',3,3,3,3,3,'Private room',5,2,10000000,1),('mamamama',11,'2021-07-19','2021-07-31','hh','--',2,2,2,2,2,'Private room',5,10,10000000,1),('lalala',12,'2021-07-24','2021-07-26','Indonesia','-',16,2,2,20,2,'private_room',5,2,200000,1),('Grandy',13,'2021-08-04','2021-10-02','a','22',2,2,2,2,2,'Private room',5,2,100000,0);
/*!40000 ALTER TABLE `spaces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_books`
--

DROP TABLE IF EXISTS `user_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `space_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_books_FK` (`user_id`),
  KEY `user_books_FK_1` (`space_id`),
  CONSTRAINT `user_books_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_books_FK_1` FOREIGN KEY (`space_id`) REFERENCES `spaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_books`
--

LOCK TABLES `user_books` WRITE;
/*!40000 ALTER TABLE `user_books` DISABLE KEYS */;
INSERT INTO `user_books` VALUES (5,2,13,'2021-08-09','2021-08-10'),(6,2,13,'2021-08-09','2021-08-10');
/*!40000 ALTER TABLE `user_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('thaddeus_cleo','thaddeus_cleo@email.com','qwerty123',2,0),('john','john@email.com','qwerty123',3,0),('benny','benny@email.com','qwerty123',4,0),('feli','feli@email.com','feli12345',5,1);
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

-- Dump completed on 2021-08-09 13:01:19
