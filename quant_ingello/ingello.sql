-- MySQL dump 10.13  Distrib 8.0.19, for Linux (x86_64)
--
-- Host: localhost    Database: ingello_test
-- ------------------------------------------------------
-- Server version	8.0.19-0ubuntu0.19.10.3

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
-- Table structure for table `person`
--
CREATE DATABASE testDB;
ALTER DATABASE `testDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product__fk` (`product_id`),
  CONSTRAINT `product__fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `person` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar (255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,'login41',123,'weqwe','75461338487603'),(2,'goga23',980,'goga1','41575384937833'),(3,'Login',123,'weqwe','41575384937833'),(4,'goga',980,'goga1','26289543062203'),(5,'gosha',100,'misha@','41575384937833'),(6,'pasha',501,'baba','41575384937833');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Cardinal',12),(2,'Cardinal',12),(3,'??????????',13),(4,'??????????',5),(5,'????????',20),(6,'??????????',1000),(7,'????????',123),(8,'????????',123),(9,'????????',123),(10,'????????',123),(11,'????????',123),(12,'????????',123),(13,'????????',123),(14,'????????',123),(15,'????????',123),(16,'????????',123),(17,'????????',123),(18,'????????',123),(19,'????????',123),(20,'????????',123),(21,'????????',123),(22,'????????',123),(23,'????????',123),(24,'????????',123),(25,'????????',123),(26,'????????',123),(27,'????????',123),(28,'????????',123),(29,'????????',123),(30,'????????',123),(31,'????????',123),(32,'????????',123),(33,'????????',123),(34,'????????',123),(35,'????????',123),(36,'????????',123),(37,'????????',123),(38,'????????',123),(39,'????????',123),(40,'????????',123),(41,'????????',123),(42,'????????',123),(43,'????????',123),(44,'????????',123),(45,'????????',123),(46,'????????',123),(47,'????????',123),(48,'????????',123),(49,'????????',123),(50,'??????????????',666),(51,'??????????????',666),(52,'Cardinal',12),(53,'Cardinal',12);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-26 13:28:21


-- olijen 2020-03-04 12:59

CREATE TABLE dove
				(
				id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
				name varchar(62),
				age tinyint(2),
				color varchar(6) DEFAULT 'bcc3d6',
				sex tinyint(1) DEFAULT 0,
				wedding_count int
				)

CREATE UNIQUE INDEX dove_id_uindex ON dove (id)