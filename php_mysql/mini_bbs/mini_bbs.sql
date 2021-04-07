-- MySQL dump 10.18  Distrib 10.3.27-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: mini_bbs
-- ------------------------------------------------------
-- Server version	10.3.27-MariaDB

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
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'aaaa','bbbb','4beaad6292b7db0f9354e0d8b915ec0dbbc03a5a','20210407035749','2021-04-07 12:57:53','2021-04-07 12:57:53'),(2,'qqqq','qqqq','33a9e269dd782e92489a8e547b7ed582e0e1d42b','20210407061118','2021-04-07 15:11:19','2021-04-07 15:11:19');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `reply_message_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'popopopo',1,NULL,'2021-04-07 14:43:16','2021-04-07 14:43:16'),(2,'安息香酸',1,NULL,'2021-04-07 14:43:22','2021-04-07 14:43:22'),(3,'b',1,NULL,'2021-04-07 14:44:01','2021-04-07 14:44:01'),(4,'b',1,NULL,'2021-04-07 14:44:03','2021-04-07 14:44:03'),(5,'b',1,NULL,'2021-04-07 14:44:06','2021-04-07 14:44:06'),(6,'t',1,NULL,'2021-04-07 14:45:20','2021-04-07 14:45:20'),(7,'r',1,NULL,'2021-04-07 14:45:24','2021-04-07 14:45:24'),(8,'g',1,NULL,'2021-04-07 14:45:26','2021-04-07 14:45:26'),(9,'as',1,NULL,'2021-04-07 14:59:11','2021-04-07 14:59:11'),(10,'asasa',1,NULL,'2021-04-07 14:59:15','2021-04-07 14:59:15'),(11,'as',1,NULL,'2021-04-07 14:59:20','2021-04-07 14:59:20'),(12,'asasa',1,NULL,'2021-04-07 14:59:21','2021-04-07 14:59:21'),(13,'asasa',1,NULL,'2021-04-07 14:59:23','2021-04-07 14:59:23'),(14,'asasasas',1,NULL,'2021-04-07 14:59:34','2021-04-07 14:59:34'),(15,'qqqq',2,NULL,'2021-04-07 15:11:28','2021-04-07 15:11:28'),(16,'新しく立ち上げた\r\n',2,NULL,'2021-04-07 15:11:43','2021-04-07 15:11:43'),(17,'@ ',2,NULL,'2021-04-07 15:28:01','2021-04-07 15:28:01'),(18,'@ rfrfr',2,NULL,'2021-04-07 15:28:08','2021-04-07 15:28:08'),(19,'frfrfr',2,NULL,'2021-04-07 15:28:10','2021-04-07 15:28:10'),(20,'サプライス',2,NULL,'2021-04-07 15:29:19','2021-04-07 15:29:19'),(21,'@qqqq サプライス\r\nサンライズ',1,NULL,'2021-04-07 15:29:35','2021-04-07 15:29:35'),(27,'@aaaa @qqqq サプライス\r\nサンライズdfdff',1,21,'2021-04-07 16:39:14','2021-04-07 16:39:14'),(28,'@aaaa @aaaa @qqqq サプライス\r\nサンライズdfdffdfdfdfddfdfssss',1,27,'2021-04-07 16:39:23','2021-04-07 16:39:23'),(29,'cd',1,0,'2021-04-07 17:14:32','2021-04-07 17:14:32'),(30,'dc',1,0,'2021-04-07 17:14:35','2021-04-07 17:14:35');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-07 17:20:56
