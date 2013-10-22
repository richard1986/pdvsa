CREATE DATABASE  IF NOT EXISTS `pozos_pdvsa` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pozos_pdvsa`;
-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pozos_pdvsa
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.13.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial` (
  `idhistorial` int(11) NOT NULL AUTO_INCREMENT,
  `corrida` int(11) DEFAULT NULL,
  `fecha_instalacionf` date DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_arranque` date DEFAULT NULL,
  `fecha_falla` date DEFAULT NULL,
  `fecha_pullingi` date DEFAULT NULL,
  `dias_instalacion` int(11) DEFAULT NULL,
  `dias_operacion` int(11) DEFAULT NULL,
  `profundidad_succion` int(11) DEFAULT NULL,
  `cable_potencia` int(11) DEFAULT NULL,
  `fabricante` varchar(10) DEFAULT NULL,
  `nro_bombas` int(11) DEFAULT NULL,
  `series_bombas` int(11) DEFAULT NULL,
  `nrostg_bombas` int(11) DEFAULT NULL,
  `seriales_bombas` text,
  `modelo_bombas` varchar(150) CHARACTER SET big5 DEFAULT NULL,
  `series_MG` varchar(150) DEFAULT NULL,
  `nrostg_MG` varchar(5) DEFAULT NULL,
  `seriales_MG` varchar(20) DEFAULT NULL,
  `modelo_MG` varchar(150) DEFAULT NULL,
  `nro_SG` int(11) DEFAULT NULL,
  `serie_SG` varchar(10) DEFAULT NULL,
  `seriales_SG` text,
  `modelo_SG` varchar(150) DEFAULT NULL,
  `nrosellos_SS` int(11) DEFAULT NULL,
  `series_SS` int(11) DEFAULT NULL,
  `seriales_SS` text,
  `modelos_SS` varchar(150) DEFAULT NULL,
  `nro_MT` int(11) DEFAULT NULL,
  `series_MT` int(11) DEFAULT NULL,
  `seriales_MT` text,
  `modelo_MT` varchar(150) DEFAULT NULL,
  `HP_MT` int(11) DEFAULT NULL,
  `volt_MT` int(11) DEFAULT NULL,
  `AMP_MT` decimal(10,2) DEFAULT NULL,
  `sn_S` enum('Si','No') DEFAULT NULL,
  `seriales_S` varchar(45) DEFAULT NULL,
  `modelo_S` varchar(150) DEFAULT NULL,
  `profundidad_S` int(11) DEFAULT NULL,
  `marca_Ytool` varchar(150) DEFAULT NULL,
  `odid_Ytool` varchar(150) DEFAULT NULL,
  `sino_Ytool` varchar(45) DEFAULT NULL,
  `sino_camisav` varchar(45) DEFAULT NULL,
  `sino_camisa` varchar(45) DEFAULT NULL,
  `tipo_falla` varchar(150) DEFAULT NULL,
  `comentario_falla` text,
  `MTBP` int(11) DEFAULT NULL,
  `pozos_idpozos` int(11) NOT NULL,
  `campos_idcampos` int(11) NOT NULL,
  PRIMARY KEY (`idhistorial`),
  KEY `fk_historial_pozos` (`pozos_idpozos`),
  KEY `fk_historial_campos1` (`campos_idcampos`),
  CONSTRAINT `fk_historial_campos1` FOREIGN KEY (`campos_idcampos`) REFERENCES `campos` (`idcampos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_historial_pozos` FOREIGN KEY (`pozos_idpozos`) REFERENCES `pozos` (`idpozos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-29 16:32:05
