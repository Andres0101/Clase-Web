-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2014 a las 02:19:36
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `articulosweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id_Articulo` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(100) COLLATE utf8_bin NOT NULL,
  `Contenido` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_Articulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_Articulo`, `Titulo`, `Contenido`, `id_Usuario`) VALUES
(1, 'Apple watch', 'El Apple Watch incorpora la Corona Digital que permite navegar por el dispositivo sin tapar la panta', 1),
(2, 'Trucos para la bateria de tu movil', 'Quedarse sin bateria en el momento mas inoportuno es una situacion que ocurre con mas frecuencia de ', 3),
(3, 'En octubre habra un eclipse total de luna', 'El comienzo del otoño astronomico viene marcado por un eclipse total de Luna que tendra lugar el pro', 4),
(4, 'Creacion de celulas artificiales', 'Un equipo de cientificos de la Universidad Tecnica de Munich (Alemania) está un paso mas cerca de la', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dislikes`
--

CREATE TABLE IF NOT EXISTS `dislikes` (
  `id_Dislike` int(11) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(11) NOT NULL,
  `id_Articulo` int(11) NOT NULL,
  PRIMARY KEY (`id_Dislike`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `dislikes`
--

INSERT INTO `dislikes` (`id_Dislike`, `id_Usuario`, `id_Articulo`) VALUES
(1, 3, 2),
(2, 4, 1),
(3, 2, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `id_Favorito` int(11) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(11) NOT NULL,
  `id_Articulo` int(11) NOT NULL,
  PRIMARY KEY (`id_Favorito`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id_Favorito`, `id_Usuario`, `id_Articulo`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `id_Articulo` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_like`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id_like`, `id_Articulo`, `id_Usuario`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 4),
(4, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(100) COLLATE utf8_bin NOT NULL,
  `imagenUsuario` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuario`, `nombreUsuario`, `imagenUsuario`) VALUES
(1, 'Andres', 'img/usuarios/usuario1.jpg'),
(2, 'Susana', 'img/usuarios/usuario2.jpg'),
(3, 'Camila', 'img/usuarios/usuario3.jpg'),
(4, 'Gustavo', 'img/usuarios/usuario4.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
