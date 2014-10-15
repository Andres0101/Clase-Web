-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2014 a las 05:44:38
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bonillaescobarandres_taller2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `idCarrito` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idCarrito`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idCarrito`, `idUsuario`, `idProducto`) VALUES
(1, 'a01', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `idProducto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idCompra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idCompra`, `idUsuario`, `idProducto`, `fecha`) VALUES
(1, 'a01', 4, '2014-10-14'),
(2, 'a01', 1, '2014-10-14'),
(3, 'a01', 6, '2014-10-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProducto` varchar(500) COLLATE utf8_bin NOT NULL,
  `descripcionProducto` varchar(500) COLLATE utf8_bin NOT NULL,
  `imagenProducto` varchar(500) COLLATE utf8_bin NOT NULL,
  `favorito` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombreProducto`, `descripcionProducto`, `imagenProducto`, `favorito`) VALUES
(1, 'Camisa Polo', 'Camisa de ultima coleccion.', 'img/productos/camisaPolo.png', 1),
(2, 'Patines', 'Patines profesionales.', 'img/productos/patines.png', 0),
(3, 'Zapatos', 'Zapatos adidas.', 'img/productos/zapatos.png', 0),
(4, 'Smartphone', 'iphone 6.', 'img/productos/iphone6.png', 1),
(5, 'Maletin', 'Marca Totto.', 'img/productos/totto.png', 0),
(6, 'Guitarra electrica', 'Como nueva, marca Gibson.', 'img/productos/guitarra.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombreUsuario` varchar(500) COLLATE utf8_bin NOT NULL,
  `idUsuario` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombreUsuario`, `idUsuario`) VALUES
('Andres', 'a01'),
('Sofia', 'sofia35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
