-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: brasileirao
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

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
-- Table structure for table `log_matchs`
--

DROP TABLE IF EXISTS `log_matchs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_matchs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `home_id` bigint unsigned NOT NULL,
  `guest_id` bigint unsigned NOT NULL,
  `winner` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_matchs_home_id_foreign` (`home_id`),
  KEY `log_matchs_guest_id_foreign` (`guest_id`),
  KEY `log_matchs_winner_foreign` (`winner`),
  CONSTRAINT `log_matchs_guest_id_foreign` FOREIGN KEY (`guest_id`) REFERENCES `teams` (`id`),
  CONSTRAINT `log_matchs_home_id_foreign` FOREIGN KEY (`home_id`) REFERENCES `teams` (`id`),
  CONSTRAINT `log_matchs_winner_foreign` FOREIGN KEY (`winner`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_matchs`
--

LOCK TABLES `log_matchs` WRITE;
/*!40000 ALTER TABLE `log_matchs` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_matchs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2021_04_06_224526_create_teams_table',1),(14,'2021_04_06_224946_create_log_matchs',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int NOT NULL DEFAULT '0',
  `played` int NOT NULL DEFAULT '0',
  `won` int NOT NULL DEFAULT '0',
  `draw` int NOT NULL DEFAULT '0',
  `lost` int NOT NULL DEFAULT '0',
  `goals_for` int NOT NULL DEFAULT '0',
  `goals_against` int NOT NULL DEFAULT '0',
  `goal_difference` int NOT NULL DEFAULT '0',
  `red_card` int NOT NULL DEFAULT '0',
  `yellow_card` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teams_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'América-MG','/assets/america.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(2,'Athletico-PR','/assets/athletico.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(3,'Atlético-GO','/assets/AtleticoGO.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(4,'Atlético-MG','/assets/atletico-mg.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(5,'Bahia','/assets/bahia.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(6,'Bragantino','/assets/svg.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(7,'Ceará','/assets/ceara.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(8,'Chapecoense','/assets/chapecoense.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(9,'Corinthians','/assets/Corinthians.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(10,'Cuiabá','/assets/Cuiaba_EC.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(11,'Flamengo','/assets/Flamengo.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(12,'Fluminense','/assets/fluminense.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(13,'Fortaleza','/assets/optimised.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(14,'Grêmio','/assets/gremio.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(15,'Internacional','/assets/internacional.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(16,'Juventude','/assets/juventude.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(17,'Palmeiras','/assets/Palmeiras.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(18,'Santos','/assets/santos.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(19,'São Paulo','/assets/sao-paulo.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL),(20,'Sport','/assets/sport.svg',0,0,0,0,0,0,0,0,0,0,NULL,NULL);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'brasileirao'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-07 11:33:52
