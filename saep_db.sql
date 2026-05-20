CREATE DATABASE  IF NOT EXISTS `redes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `redes`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: redes
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `estoques`
--

DROP TABLE IF EXISTS `estoques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estoques` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('Servidor','Roteador','Switch') COLLATE utf8mb4_unicode_ci NOT NULL,
  `voltagem` enum('110V','220V','Bivolt') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade` int NOT NULL DEFAULT '0',
  `estoque_minimo` int NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoques`
--

LOCK TABLES `estoques` WRITE;
/*!40000 ALTER TABLE `estoques` DISABLE KEYS */;
INSERT INTO `estoques` VALUES (1,'Servidor 1','Servidor','220V',5,3,'2026-05-20 21:37:27','2026-05-20 21:37:27'),(2,'ronaldo','Switch','Bivolt',8,5,'2026-05-20 22:30:15','2026-05-20 22:30:50'),(3,'cafu','Roteador','Bivolt',4,2,'2026-05-20 22:31:26','2026-05-20 22:31:26');
/*!40000 ALTER TABLE `estoques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hardware`
--

DROP TABLE IF EXISTS `hardware`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hardware` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `estoque_id` bigint unsigned NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Operacional','Manutenção','Inativo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Operacional',
  `ultima_manutencao` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hardware_ip_unique` (`ip`),
  UNIQUE KEY `hardware_mac_unique` (`mac`),
  KEY `hardware_estoque_id_foreign` (`estoque_id`),
  CONSTRAINT `hardware_estoque_id_foreign` FOREIGN KEY (`estoque_id`) REFERENCES `estoques` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hardware`
--

LOCK TABLES `hardware` WRITE;
/*!40000 ALTER TABLE `hardware` DISABLE KEYS */;
INSERT INTO `hardware` VALUES (1,1,'Servidor 1','122.454.000.1','00:1A:2B:3C:4D:5E','Operacional',NULL,'2026-05-20 21:39:03','2026-05-20 21:39:03'),(3,2,'ronaldo','122.454.000.3','00:1A:2B:3C:4D:7E','Operacional',NULL,'2026-05-20 22:32:45','2026-05-20 22:33:12'),(4,3,'cafu','122.454.000.2','00:1A:2B:3C:4D:6E','Operacional',NULL,'2026-05-20 22:33:40','2026-05-20 22:33:40');
/*!40000 ALTER TABLE `hardware` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manutencaos`
--

DROP TABLE IF EXISTS `manutencaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manutencaos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hardware_id` bigint unsigned NOT NULL,
  `tipo` enum('preventiva','corretiva') COLLATE utf8mb4_unicode_ci NOT NULL,
  `manutencao` date NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci,
  `responsavel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manutencaos_hardware_id_foreign` (`hardware_id`),
  CONSTRAINT `manutencaos_hardware_id_foreign` FOREIGN KEY (`hardware_id`) REFERENCES `hardware` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manutencaos`
--

LOCK TABLES `manutencaos` WRITE;
/*!40000 ALTER TABLE `manutencaos` DISABLE KEYS */;
INSERT INTO `manutencaos` VALUES (1,1,'preventiva','2026-05-20','Manutenção pra não dar bosta','Matheus Dominato','2026-05-20 21:40:12','2026-05-20 21:40:12'),(2,3,'preventiva','2026-05-20','yfkgjchgyfykigullj','vgjcy v,fjgukio´j vbubj vfuk','2026-05-20 22:34:16','2026-05-20 22:34:16'),(3,4,'preventiva','2026-05-20','nmjlvaszjlm','sdfvs\\berc','2026-05-20 22:34:48','2026-05-20 22:34:48');
/*!40000 ALTER TABLE `manutencaos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-20 16:44:13
