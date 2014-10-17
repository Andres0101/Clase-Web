-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2014 a las 04:16:15
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.25

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
  `idTarea` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTarea` varchar(500) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `prioridad` varchar(500) COLLATE utf8_bin NOT NULL,
  `destinatario` varchar(500) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idTarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`idTarea`, `NombreTarea`, `descripcion`, `fecha`, `prioridad`, `destinatario`) VALUES
(1, 'Web', 'Hacer taller final', '2014-11-01', 'media', 'Andres'),
(2, 'Electiva', 'Recolectar datos de informacion', '2014-10-20', 'baja', 'Karol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareasdeusuarios`
--

CREATE TABLE IF NOT EXISTS `tareasdeusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idTarea` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tareasdeusuarios`
--

INSERT INTO `tareasdeusuarios` (`id`, `idUsuario`, `idTarea`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(500) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `NombreUsuario`) VALUES
(1, 'Andres'),
(2, 'Karol');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
