-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: safe_communications
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB

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
-- Table structure for table `dids`
--

DROP TABLE IF EXISTS `dids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dids` (
  `did_number` char(10) NOT NULL,
  `id_asig` char(10) DEFAULT NULL,
  `tipo` char(10) DEFAULT NULL,
  PRIMARY KEY (`did_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dids`
--

LOCK TABLES `dids` WRITE;
/*!40000 ALTER TABLE `dids` DISABLE KEYS */;
INSERT INTO `dids` VALUES ('5597184994','N2A-001','empresa'),('5597185131','TSP-001','tsp'),('5597185290','TSP-002','tsp'),('5597185440','TSP-003','tsp'),('5597185585',NULL,NULL),('5597185747',NULL,NULL),('5597185884',NULL,NULL),('5597186068',NULL,NULL),('5597186212',NULL,NULL),('5597186353',NULL,NULL);
/*!40000 ALTER TABLE `dids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa_contacto`
--

DROP TABLE IF EXISTS `empresa_contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa_contacto` (
  `id_exec` varchar(7) NOT NULL,
  `puesto` varchar(30) DEFAULT NULL,
  `mobile` char(10) NOT NULL,
  `pin` char(4) NOT NULL,
  `id_empre` varchar(7) NOT NULL,
  `op_consec` int(11) NOT NULL,
  PRIMARY KEY (`id_exec`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_contacto`
--

LOCK TABLES `empresa_contacto` WRITE;
/*!40000 ALTER TABLE `empresa_contacto` DISABLE KEYS */;
INSERT INTO `empresa_contacto` VALUES ('EX-001','Direccion','5591959812','0101','N2A-001',1),('EX-002','Ventas','5546933642','0202','N2A-001',2),('EX-003','Administracion','5520702824','0303','N2A-001',3),('EX-004','ingeniería','5547446900','0404','N2A-001',4);
/*!40000 ALTER TABLE `empresa_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id_empresa` varchar(7) NOT NULL,
  `nombre_emp` varchar(25) NOT NULL,
  `did_emp_asig` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES ('N2A-001','NET2ALLIANCE','5597184994');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tsp`
--

DROP TABLE IF EXISTS `tsp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tsp` (
  `id_tsp` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `number` char(10) NOT NULL,
  `pin` char(4) NOT NULL,
  `id_empresa` varchar(7) NOT NULL,
  `did_asignado` char(10) NOT NULL,
  `estatus_tsp` tinyint(1) NOT NULL DEFAULT 1,
  `obs` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_tsp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tsp`
--

LOCK TABLES `tsp` WRITE;
/*!40000 ALTER TABLE `tsp` DISABLE KEYS */;
INSERT INTO `tsp` VALUES ('TSP-001','Francisco Castillo','5542271502','1010','N2A-001','5597185131',1,'Recepción'),('TSP-002','Rosario Sacramento','5611041989','2020','N2A-001','5597185290',1,'Estacionamiento'),('TSP-003','Efrén Torres','5539282268','3030','N2A-001','5597185440',1,'Caja');
/*!40000 ALTER TABLE `tsp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-24 10:37:18
