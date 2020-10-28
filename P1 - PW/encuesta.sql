-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-04-2020 a las 22:59:15
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
-- Base de datos: `encuesta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturaprofesores`
--

DROP TABLE IF EXISTS `asignaturaprofesores`;
CREATE TABLE IF NOT EXISTS `asignaturaprofesores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAsignatura` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idProfesor` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignaturaprofesores`
--

INSERT INTO `asignaturaprofesores` (`id`, `idAsignatura`, `idProfesor`) VALUES
(1, '063', '1'),
(2, '064', '2'),
(3, '063', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
CREATE TABLE IF NOT EXISTS `asignaturas` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `idTitulacion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `nombre`, `idDepartamento`, `idTitulacion`) VALUES
('063', 'Programacion Web', 1, 1714),
('064', 'Administracion de servidores', 1, 1714);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'Ingeniería Informática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

DROP TABLE IF EXISTS `encuestas`;
CREATE TABLE IF NOT EXISTS `encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAsignatura` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idTitulacion` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `grupo` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(1) NOT NULL,
  `sexo` int(1) NOT NULL,
  `cursoalto` int(1) NOT NULL,
  `cursobajo` int(1) NOT NULL,
  `matriculas` int(1) NOT NULL,
  `examenes` int(1) NOT NULL,
  `interes` int(1) NOT NULL,
  `tutorias` int(1) NOT NULL,
  `dificultad` int(1) NOT NULL,
  `calificacion` int(1) NOT NULL,
  `asistencia` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `idAsignatura`, `idTitulacion`, `grupo`, `edad`, `sexo`, `cursoalto`, `cursobajo`, `matriculas`, `examenes`, `interes`, `tutorias`, `dificultad`, `calificacion`, `asistencia`) VALUES
(1, '063', '1714', '01', 5, 1, 3, 3, 1, 1, 3, 2, 2, 6, 3),
(2, '063', '1714', '01', 5, 1, 3, 3, 1, 1, 3, 2, 2, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `tipo`) VALUES
(1, 'El/la profesor/a informa sobre los distintos aspectos de la guía docente o programa de la asignatura\r\n(objetivos, actividades, contenidos del temario, metodología, bibliografía, sistemas de evaluación,...)', 0),
(2, 'Imparte las clases en el horario fijado', 1),
(3, 'Asiste regularmente a clase', 1),
(5, 'Se ajusta a la planificación de la asignatura', 2),
(6, 'Se han coordinado las actividades teóricas y prácticas previstas', 2),
(7, 'Se ajusta a los sistemas de evaluación especificados en la guía docente/programa de la asignatura', 2),
(9, 'El/la profesor/a organiza bien las actividades que se realizan en clase', 3),
(10, 'Utiliza recursos didácticos (pizarra, transparencias, medios audiovisuales, material de apoyo en red\r\nvirtual que facilitan el aprendizaje', 3),
(11, 'Explica con claridad y resalta los contenidos importantes', 4),
(12, 'Se interesa por el grado de comprensión de sus explicaciones', 4),
(13, 'Expone ejemplos en los que se ponen en práctica los contenidos de la asignatura', 4),
(14, 'Explica los contenidos con seguridad', 4),
(15, 'Resuelve las dudas que se le plantean', 4),
(16, 'Fomenta un clima de trabajo y participación', 4),
(17, 'Propicia una comunicación fluida y espontánea', 4),
(18, 'Motiva a los/as estudiantes para que se interesen por la asignatura', 4),
(19, 'Es respetuoso/a en el trato con los/las estudiantes', 4),
(20, 'Tengo claro lo que se me va a exigir para superar esta asignatura', 5),
(21, 'Los criterios y sistemas de evaluación me parecen adecuados, en el contexto de la asignatura', 5),
(22, 'Las actividades desarrolladas (teóricas, prácticas, de trabajo individual, en grupo,«contribuyen a alcanzar\r\nlos objetivos de la asignatura', 6),
(23, 'Estoy satisfecho/a con la labor docente de este/a profesor/a', 6),
(8, 'La bibliografía y otras fuentes de información recomendadas en el programa son útiles para el aprendizaje\r\nde la asignatura', 2),
(4, 'Cumple adecuadamente su labor de tutoría (presencial o virtual)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `id` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `idReal` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `idReal`, `nombre`, `apellidos`) VALUES
('1', '0121', 'Ignacio Javier', 'Pérez Gálvez'),
('2', '0122', 'Adrián', 'Crespo Delgado'),
('3', '0123', 'Carlos', 'Dominguez Alcazar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEncuesta` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` int(11) NOT NULL,
  `idProfesor` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=232 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `idEncuesta`, `idPregunta`, `respuesta`, `idProfesor`) VALUES
(24, 2, 2, 2, '0121'),
(23, 2, 1, 2, '0121'),
(22, 1, 23, 3, '0121'),
(21, 1, 22, 2, '0121'),
(20, 1, 21, 2, '0121'),
(19, 1, 20, 3, '0121'),
(18, 1, 19, 3, '0121'),
(17, 1, 18, 4, '0121'),
(16, 1, 17, 2, '0121'),
(15, 1, 16, 4, '0121'),
(14, 1, 15, 2, '0121'),
(13, 1, 14, 3, '0121'),
(12, 1, 13, 2, '0121'),
(11, 1, 12, 4, '0121'),
(10, 1, 11, 2, '0121'),
(9, 1, 10, 4, '0121'),
(8, 1, 9, 2, '0121'),
(7, 1, 8, 4, '0121'),
(6, 1, 7, 2, '0121'),
(5, 1, 6, 4, '0121'),
(4, 1, 5, 2, '0121'),
(3, 1, 4, 4, '0121'),
(2, 1, 2, 2, '0121'),
(1, 1, 1, 3, '0121'),
(25, 2, 3, 3, '0121'),
(26, 2, 4, 4, '0121'),
(27, 2, 5, 2, '0121'),
(28, 2, 6, 4, '0121'),
(29, 2, 7, 2, '0121'),
(30, 2, 8, 4, '0121'),
(31, 2, 9, 2, '0121'),
(32, 2, 10, 4, '0121'),
(33, 2, 11, 2, '0121'),
(34, 2, 12, 1, '0121'),
(35, 2, 13, 2, '0121'),
(36, 2, 14, 3, '0121'),
(37, 2, 15, 1, '0121'),
(38, 2, 16, 3, '0121'),
(39, 2, 17, 2, '0121'),
(40, 2, 18, 2, '0121'),
(41, 2, 19, 3, '0121'),
(42, 2, 20, 2, '0121'),
(43, 2, 21, 4, '0121'),
(44, 2, 22, 2, '0121'),
(45, 2, 23, 4, '0121');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulacion`
--

DROP TABLE IF EXISTS `titulacion`;
CREATE TABLE IF NOT EXISTS `titulacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `titulacion`
--

INSERT INTO `titulacion` (`id`, `nombre`) VALUES
(1714, 'Grado en Ingeniería Informática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `password`, `rol`) VALUES
(1, 'admin', '1234', 1),
(2, 'alumno', '1234', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
