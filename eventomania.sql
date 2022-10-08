-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2022 a las 16:46:40
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventomania`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `actividadid` double NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`actividadid`, `nombre`, `descripcion`) VALUES
(267, 'Megafest', 'La más única celebración en la ciudad de Medellín con cantantes de todos los géneros'),
(841, 'La locura fest', 'La locura '),
(918, 'Rumba aeróbica', 'Rumba bailable en canchas municipales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `asistenciaid` double NOT NULL,
  `documento` double NOT NULL,
  `eventoid` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `eventoid` double NOT NULL,
  `actividadid` double NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora` varchar(8) NOT NULL,
  `aforo` int(11) NOT NULL,
  `asistencia` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`eventoid`, `actividadid`, `fecha_evento`, `hora`, `aforo`, `asistencia`, `estado`) VALUES
(3255, 267, '2022-06-18', '05:00 pm', 133, 0, 1),
(8917, 267, '2022-06-17', '12:00 pm', 115, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_habilitada`
--

CREATE TABLE `fecha_habilitada` (
  `fecha_habilitadaid` double NOT NULL,
  `documento` double NOT NULL,
  `fecha_habilitada` date NOT NULL,
  `cuantificador_fecha` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fecha_habilitada`
--

INSERT INTO `fecha_habilitada` (`fecha_habilitadaid`, `documento`, `fecha_habilitada`, `cuantificador_fecha`) VALUES
(6578, 8462062, '2022-06-17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rolid` double NOT NULL,
  `nombrerol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rolid`, `nombrerol`) VALUES
(1, 'Administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` double NOT NULL,
  `rolid` double NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `rolid`, `nombre`, `apellido`, `clave`) VALUES
(822022, 2, 'John', 'Herrera', 'clave'),
(1000999333, 1, 'David', 'Torres', 'clave');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`actividadid`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`asistenciaid`),
  ADD KEY `documento` (`documento`),
  ADD KEY `eventoid` (`eventoid`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`eventoid`),
  ADD KEY `actividadid` (`actividadid`);

--
-- Indices de la tabla `fecha_habilitada`
--
ALTER TABLE `fecha_habilitada`
  ADD PRIMARY KEY (`fecha_habilitadaid`),
  ADD KEY `documento` (`documento`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rolid`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `rolid` (`rolid`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `usuario` (`documento`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`eventoid`) REFERENCES `evento` (`eventoid`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`actividadid`) REFERENCES `actividad` (`actividadid`);

--
-- Filtros para la tabla `fecha_habilitada`
--
ALTER TABLE `fecha_habilitada`
  ADD CONSTRAINT `fecha_habilitada_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `usuario` (`documento`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`rolid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
