CREATE DATABASE  IF NOT EXISTS `rbitxgdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rbitxgdb`;
-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: rbitxgdb
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `booking_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking_reference` bigint(20) unsigned NOT NULL COMMENT 'date+shift_id+obj_id',
  `date` date NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `shift_id` int(10) unsigned NOT NULL,
  `obj_id` int(10) unsigned NOT NULL,
  `booking_note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`booking_id`),
  UNIQUE KEY `reference` (`booking_reference`),
  UNIQUE KEY `booking_id_UNIQUE` (`booking_id`),
  KEY `obj_id` (`obj_id`),
  KEY `shift_id` (`shift_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `obj_id` FOREIGN KEY (`obj_id`) REFERENCES `objects` (`obj_id`),
  CONSTRAINT `shift_id` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`shift_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (2,202110150030101,'2021-10-15',3,1,1,NULL);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kind_obj`
--

DROP TABLE IF EXISTS `kind_obj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kind_obj` (
  `kind_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kind_name` char(50) NOT NULL,
  `kind_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kind_id`),
  UNIQUE KEY `name` (`kind_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kind_obj`
--

LOCK TABLES `kind_obj` WRITE;
/*!40000 ALTER TABLE `kind_obj` DISABLE KEYS */;
INSERT INTO `kind_obj` VALUES (1,'ALL','Elemento que se puede reservar en cualquier momento'),(2,'NOCHE_NO','Elemento que NO se puede reservar en horario nocturno');
/*!40000 ALTER TABLE `kind_obj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objects`
--

DROP TABLE IF EXISTS `objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `objects` (
  `obj_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `obj_name` char(50) COLLATE utf8mb4_bin NOT NULL,
  `place_id` int(10) unsigned NOT NULL DEFAULT '1',
  `kind_id` int(3) unsigned NOT NULL DEFAULT '1',
  `obj_description` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`obj_id`),
  UNIQUE KEY `name` (`obj_name`),
  KEY `place_id` (`place_id`),
  KEY `kind_id` (`kind_id`),
  CONSTRAINT `kind_id` FOREIGN KEY (`kind_id`) REFERENCES `kind_obj` (`kind_id`),
  CONSTRAINT `place_id` FOREIGN KEY (`place_id`) REFERENCES `place` (`place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='Objetos o elementos que se pueden reservar';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objects`
--

LOCK TABLES `objects` WRITE;
/*!40000 ALTER TABLE `objects` DISABLE KEYS */;
INSERT INTO `objects` VALUES (1,'Horno',3,1,'Horno de gas'),(2,'Mesa 1',1,1,'Mesa de 8 personas'),(3,'Mesa 2',1,1,'Mesa de 8 personas'),(4,'Mesa 3',1,1,'Mesa de 6 personas'),(5,'Mesa 4',1,1,'Mesa de 6 personas'),(6,'Mesa 5',2,2,'Mesa de 8 personas'),(7,'Mesa 6',2,2,'Mesa de 8 personas'),(8,'Tele',2,1,'Smart TV'),(9,'Fuego 1',3,1,'Fuego 1 - Cocina'),(10,'Fuego 2',3,1,'Fuego 2 - Cocina'),(11,'Fuego 3 - Plancha',3,1,'Fuego 3 - Plancha - Cocina');
/*!40000 ALTER TABLE `objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `place` (
  `place_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `place_name` char(50) NOT NULL,
  `place_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`place_id`),
  UNIQUE KEY `name` (`place_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
INSERT INTO `place` VALUES (1,'abajo','Planta baja'),(2,'arriba','Planta de arriba'),(3,'cocina','Cocina en planta baja');
/*!40000 ALTER TABLE `place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `rol_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `rol_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rol_id`),
  UNIQUE KEY `name` (`rol_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Roles de usuarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin',NULL),(2,'user',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shifts` (
  `shift_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shift_name` char(50) NOT NULL DEFAULT '',
  `shift_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shift_id`),
  UNIQUE KEY `name` (`shift_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shifts`
--

LOCK TABLES `shifts` WRITE;
/*!40000 ALTER TABLE `shifts` DISABLE KEYS */;
INSERT INTO `shifts` VALUES (1,'Todos los turnos','Disponible en cualquier turno'),(2,'Noche NO','NO disponible para cenas');
/*!40000 ALTER TABLE `shifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `rol_id` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user` (`user`),
  KEY `fk_roles` (`rol_id`),
  CONSTRAINT `fk_roles` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Usuarios de la aplicación';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'txokoadmin','00787666ba1cc85ca3e571fcf6b92c3ea8b3eeb6',1,'TxokoAdmin','RBI',NULL),(2,'ricardo','00787666ba1cc85ca3e571fcf6b92c3ea8b3eeb6',2,'Ricardo','Barbarin',NULL),(3,'user1','00787666ba1cc85ca3e571fcf6b92c3ea8b3eeb6',2,'User','Uno','user1@txoko.es');
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

-- Dump completed on 2021-11-24 23:19:02

CREATE USER 'txokoadm'@'%' IDENTIFIED WITH mysql_native_password BY 'sOP5TI$P2waC5';
GRANT ALL PRIVILEGES ON *.* TO 'txokoadm'@'%' WITH GRANT OPTION;
ALTER USER 'txokoadm'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `rbitxgdb`.* TO 'txokoadm'@'%';


CREATE USER 'txokousr'@'%' IDENTIFIED WITH mysql_native_password BY 'N3D6B$ifeRo';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE TEMPORARY TABLES, CREATE VIEW, SHOW VIEW, EXECUTE ON *.* TO 'txokousr'@'%';
ALTER USER 'txokousr'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `rbitxgdb`.* TO 'txokousr'@'%';
