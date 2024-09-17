-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2024 a las 19:35:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `peso` double NOT NULL,
  `altura` double NOT NULL,
  `id_rutina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre`, `nacimiento`, `peso`, `altura`, `id_rutina`) VALUES
(1, 'Julio Checa', '2014-09-17', 60.8, 1.66, 1),
(2, 'Miriam Landa', '1996-05-05', 65.8, 1.68, 1),
(3, 'Fernando Greco', '1990-10-22', 70.5, 1.59, 2),
(4, 'Valeria Motschakow', '1989-11-27', 62.3, 1.61, 2),
(5, 'Guillermo Brown', '1981-05-17', 80.9, 1.75, 3),
(6, 'Juan Manuel Porcel', '1978-06-25', 80.7, 1.65, 1),
(7, 'Marcelo Robertson', '1975-12-30', 86.3, 1.72, 2),
(8, 'Adriana Wooley', '1989-01-13', 55.9, 1.59, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE `rutinas` (
  `id_rutina` int(11) NOT NULL,
  `entrada` varchar(50) NOT NULL,
  `pecho` varchar(50) NOT NULL,
  `espalda` varchar(50) NOT NULL,
  `piernas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`id_rutina`, `entrada`, `pecho`, `espalda`, `piernas`) VALUES
(1, 'abdominales 3 x 5', 'press banca con mancuernas 3 x 6', 'remo con mancuernas 3 x 7', 'zancadas con mancuerna 3 x 8'),
(2, 'lagartijas 3 x 6', 'press banca con barra 3 x 7', 'remo con barra 3 x 8', 'sentadilla con barra 3 x 9'),
(3, 'peso muerto con barra 3 x 10', 'polea pecho 3 x 8', 'remo 3 x 9', 'prensa 3 x 10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD UNIQUE KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_rutina` (`id_rutina`);

--
-- Indices de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  ADD PRIMARY KEY (`id_rutina`),
  ADD UNIQUE KEY `id_rutina` (`id_rutina`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id_rutina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_rutina`) REFERENCES `rutinas` (`id_rutina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
