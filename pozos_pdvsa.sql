-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2013 at 03:50 PM
-- Server version: 5.5.32-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pozos_pdvsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `campos`
--

CREATE TABLE IF NOT EXISTS `campos` (
  `idcampos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ubicacion` text,
  PRIMARY KEY (`idcampos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
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
  KEY `fk_historial_campos1` (`campos_idcampos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pozos`
--

CREATE TABLE IF NOT EXISTS `pozos` (
  `idpozos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`idpozos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `confirmar` varchar(50) NOT NULL,
  `tipo` enum('Administrador','Supervisor') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `login`, `clave`, `confirmar`, `tipo`) VALUES
(3, 'root', 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'Administrador');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_campos1` FOREIGN KEY (`campos_idcampos`) REFERENCES `campos` (`idcampos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_pozos` FOREIGN KEY (`pozos_idpozos`) REFERENCES `pozos` (`idpozos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
