-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2014 a las 08:26:04
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bonillaescobarandres_taller1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `NombreTarea` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`NombreTarea`) VALUES
('Tarea1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareasdeusuarios`
--

CREATE TABLE IF NOT EXISTS `tareasdeusuarios` (
  `NombreUsuario` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NombreTarea` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Descripcion` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Fecha` date NOT NULL,
  `Prioridad` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareasdeusuarios`
--

INSERT INTO `tareasdeusuarios` (`NombreUsuario`, `NombreTarea`, `Descripcion`, `Fecha`, `Prioridad`) VALUES
('Andres', 'Tarea1', 'Traer papeles', '2015-01-01', 'normal'),
('Pepito', 'Tarea1', 'Traer tijeras', '0201-10-12', 'importante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `NombreUsuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  UNIQUE KEY `NombreUsuario` (`NombreUsuario`),
  UNIQUE KEY `NombreUsuario_2` (`NombreUsuario`),
  UNIQUE KEY `NombreUsuario_3` (`NombreUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`NombreUsuario`) VALUES
('Andres'),
('Pepito');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
