-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-06-2020 a las 03:29:07
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `supercars`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

DROP TABLE IF EXISTS `coches`;
CREATE TABLE IF NOT EXISTS `coches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` int(11) NOT NULL,
  `combustible` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `equipamiento` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `año` int(11) NOT NULL,
  `potencia` int(11) NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `modelo`, `combustible`, `precio`, `equipamiento`, `año`, `potencia`, `descripcion`, `imagen`) VALUES
(1, 1, 'Gasolina', 110000, 'Asientos de cuero, calefactor, biturbo', 2016, 640, 'El mejor coche del mundo según los expertos', 'https://www.cochesyconcesionarios.com/uploads/nissan/gt-r/1/CO/my20-gt-r-nismo-germany-26-46adb41faf277912794b30f18a922a14440e1cd4.jpeg'),
(2, 2, 'Gasolina', 220000, 'Capó de fibra de carbono, alerón deportivo, llantas aleación', 2018, 570, 'Elegante, seguro y prestigioso.', 'https://d1eip2zddc2vdv.cloudfront.net/dphotos/750x400/12707-1528188938.jpg'),
(3, 3, 'Diesel', 60000, 'Sin equipar', 2017, 150, 'Un coche polivalente', 'https://imagenes-cdn.autofacil.es/multimedia/fotos/2019/05/29/160681/2019-23_g.jpg'),
(10, 4, 'Gasolina', 20000, 'Llantas racing, aleron deportivo', 1998, 160, 'Coche diseñado para drifting', 'https://cochesjaponeses.es/wp-content/uploads/nissansilvias13s14s157.jpg'),
(16, 11, 'Hibrido', 99000, 'Techo solar, escapes cromados, llantas 19 pulgadas', 2020, 310, 'Un coche grande y elegante para ser el rey', 'https://d1eip2zddc2vdv.cloudfront.net/dphotos/12740-1528188525.jpg'),
(23, 12, 'Gasolina', 700000, 'Llantas forge, alerón de carbono, suspensión deportiva', 2019, 1500, 'Un coche prestigioso y exclusivo traído para nuestros clientes más selectos', 'https://cdn.motor1.com/images/mgl/xVQo2/s3/2018-lamborghini-huracan-performante-spyder.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concesionario`
--

DROP TABLE IF EXISTS `concesionario`;
CREATE TABLE IF NOT EXISTS `concesionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `concesionario`
--

INSERT INTO `concesionario` (`id`, `nombre`, `ciudad`, `tipo`) VALUES
(1, 'Japon center', 'Japon', 'Fábrica'),
(2, 'BMW Town', 'Berlín', 'De lujo'),
(3, 'Lamborghini Factory', 'Roma', 'Hiperlujo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `concesionario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `pais`, `concesionario`) VALUES
(1, 'Nissan', 'Japón', 1),
(2, 'BMW', 'Alemania', 2),
(3, 'Lamborghini', 'Italia', 3),
(4, 'Range Rover', 'Inglaterra', 0),
(5, 'Bugatti', 'Francia', 0),
(6, 'Peugeout', 'Francia', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

DROP TABLE IF EXISTS `modelos`;
CREATE TABLE IF NOT EXISTS `modelos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` int(11) NOT NULL,
  `modelo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `marca`, `modelo`) VALUES
(1, 1, 'GTR'),
(2, 2, 'M4'),
(3, 2, 'X1'),
(4, 1, 'S14'),
(11, 2, 'X6'),
(12, 3, 'HURACAN'),
(13, 5, 'VEYRON'),
(14, 3, 'AVENTADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `password`, `rol`) VALUES
(1, 'Paco', '1234', 0),
(2, 'Adrian', '1234', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
