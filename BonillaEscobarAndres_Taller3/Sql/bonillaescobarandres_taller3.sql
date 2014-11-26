-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2014 a las 20:07:46
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bonillaescobarandres_taller3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios`
--

CREATE TABLE IF NOT EXISTS `sitios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `latitud` varchar(100) COLLATE utf8_bin NOT NULL,
  `longitud` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `sitios`
--

INSERT INTO `sitios` (`id`, `tipo`, `nombre`, `latitud`, `longitud`) VALUES
(1, 1, 'Colegio Berchmans', '3.3497024', '-76.53369'),
(2, 1, 'Colegio Mayor Alferez Real', '3.3460617', '-76.525444'),
(3, 1, 'Colegio Aleman', '3.3609312', '-76.52896'),
(4, 1, 'Colegio Franciscano Pio XII', '3.3504329', '-76.518105'),
(5, 1, 'Colegio Sagrado Corazon de Jesus', '3.3522704', '-76.521736'),
(6, 2, 'El Costillazo', '3.4123352', '-76.515045'),
(7, 2, 'Panadera Villa Del Sur', '3.4129908', '-76.51541'),
(8, 2, 'Restaurante Chino Palacio Oriental', '3.4148965', '-76.51768'),
(9, 2, 'Restaurante Y Asadero La Frontera', '3.4102998', '-76.51868'),
(10, 2, 'Sandwich Qbano Torres de Maracaibo', '3.4190288', '-76.51729'),
(11, 3, 'PRYCA', '3.426132', '-76.52848'),
(12, 3, 'CC NUEVA TEQUENDAMA', '3.4175327', '-76.543564'),
(13, 3, 'LG Centro de Servicio', '3.4184482', '-76.54473'),
(14, 3, 'CC Cosmocentro', '3.4140356', '-76.547035');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
