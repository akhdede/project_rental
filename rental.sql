-- MySQL dump 10.15  Distrib 10.0.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: rental
-- ------------------------------------------------------
-- Server version	10.0.34-MariaDB-0ubuntu0.16.04.1

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
-- Table structure for table `costumers`
--

DROP TABLE IF EXISTS `costumers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costumers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor_handphone` int(14) NOT NULL,
  `kabupaten_kota` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `desa_kelurahan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costumers`
--

LOCK TABLES `costumers` WRITE;
/*!40000 ALTER TABLE `costumers` DISABLE KEYS */;
/*!40000 ALTER TABLE `costumers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daftar_mobil`
--

DROP TABLE IF EXISTS `daftar_mobil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daftar_mobil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plat_nomor` varchar(10) NOT NULL,
  `merek` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftar_mobil`
--

LOCK TABLES `daftar_mobil` WRITE;
/*!40000 ALTER TABLE `daftar_mobil` DISABLE KEYS */;
INSERT INTO `daftar_mobil` VALUES (1,'DB 1234 KI','Toyota Avanza','avanza.jpg');
/*!40000 ALTER TABLE `daftar_mobil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kursi_harga`
--

DROP TABLE IF EXISTS `kursi_harga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kursi_harga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posisi` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kursi_harga`
--

LOCK TABLES `kursi_harga` WRITE;
/*!40000 ALTER TABLE `kursi_harga` DISABLE KEYS */;
INSERT INTO `kursi_harga` VALUES (1,'Depan',120000,'Kursi 1'),(2,'Tengah',110000,'Kursi 2, 3 atau 4'),(3,'Belakang',100000,'Kursi 5, 6 atau 7');
/*!40000 ALTER TABLE `kursi_harga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kursi_tersedia`
--

DROP TABLE IF EXISTS `kursi_tersedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kursi_tersedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plat_nomor` varchar(10) NOT NULL,
  `nomor_kursi` int(1) NOT NULL,
  `status_order` int(1) NOT NULL DEFAULT '0',
  `status_bayar` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kursi_tersedia`
--

LOCK TABLES `kursi_tersedia` WRITE;
/*!40000 ALTER TABLE `kursi_tersedia` DISABLE KEYS */;
INSERT INTO `kursi_tersedia` VALUES (1,'DB 1234 KI',1,0,0),(2,'DB 1234 KI',2,0,0),(3,'DB 1234 KI',3,0,0),(4,'DB 1234 KI',4,0,0),(5,'DB 1234 KI',5,0,0),(6,'DB 1234 KI',6,1,0),(7,'DB 1234 KI',7,0,0),(8,'DB 1235 KI',1,1,0),(9,'DB 1235 KI',2,0,0),(10,'DB 1235 KI',3,0,0),(11,'DB 1235 KI',4,0,0),(12,'DB 1235 KI',5,0,0),(13,'DB 1235 KI',6,0,0),(14,'DB 1235 KI',7,0,0),(15,'DB 1236 KI',1,1,0),(16,'DB 1236 KI',2,1,0),(17,'DB 1236 KI',3,0,0),(18,'DB 1236 KI',4,0,0),(19,'DB 1236 KI',5,0,0),(20,'DB 1236 KI',6,0,0),(21,'DB 1236 KI',7,0,0);
/*!40000 ALTER TABLE `kursi_tersedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mobil_tersedia`
--

DROP TABLE IF EXISTS `mobil_tersedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mobil_tersedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plat_nomor` varchar(10) NOT NULL,
  `merek` varchar(30) NOT NULL,
  `foto_mobil` varchar(50) NOT NULL,
  `id_sopir` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mobil_tersedia`
--

LOCK TABLES `mobil_tersedia` WRITE;
/*!40000 ALTER TABLE `mobil_tersedia` DISABLE KEYS */;
INSERT INTO `mobil_tersedia` VALUES (1,'DB 1234 KI','Toyota Avanza','avanza.jpg',1,'2018-04-13'),(2,'DB 1235 KI','Toyota Avanza','avanza.jpg',1,'2018-04-13'),(3,'DB 1236 KI','Toyota Avanza','avanza.jpg',1,'2018-04-13');
/*!40000 ALTER TABLE `mobil_tersedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_costumer` int(11) NOT NULL,
  `plat_nomor_mobil` varchar(10) NOT NULL,
  `nomor_kursi` int(1) NOT NULL,
  `tanggal_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sopir`
--

DROP TABLE IF EXISTS `sopir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sopir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sopir`
--

LOCK TABLES `sopir` WRITE;
/*!40000 ALTER TABLE `sopir` DISABLE KEYS */;
/*!40000 ALTER TABLE `sopir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_handphone` int(14) NOT NULL,
  `kabupaten_kota` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `desa_kelurahan` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2018-04-13 22:45:41
