-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2024 a las 06:27:12
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
  `nombre` varchar(30) NOT NULL,
  `nacimiento` date NOT NULL,
  `peso` double NOT NULL,
  `altura` double NOT NULL,
  `id_rutina` int(11) NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre`, `nacimiento`, `peso`, `altura`, `id_rutina`, `foto`) VALUES
(1, 'Julio Checa', '2014-09-17', 60.8, 1.66, 1, 'images/alumnonuevo.jpeg'),
(2, 'Miriam Landa', '1996-05-05', 65.8, 1.68, 1, 'images/alumnonuevo.jpeg'),
(3, 'Fernando Greco', '1990-10-22', 70.5, 1.59, 2, 'images/alumnonuevo.jpeg'),
(4, 'Valeria Motschakow', '1989-11-27', 62.3, 1.61, 2, 'images/alumnonuevo.jpeg'),
(5, 'Guillermo Brown', '1981-05-17', 80.9, 1.75, 3, 'images/alumnonuevo.jpeg'),
(6, 'Juan Manuel Porcel', '1978-06-25', 80.7, 1.65, 1, ''),
(7, 'Marcelo Robertson', '1975-12-30', 86.3, 1.72, 2, ''),
(8, 'Adriana Wooley', '1989-01-13', 55.9, 1.59, 3, ''),
(9, 'Diego Fissina', '2001-10-09', 80.5, 1.78, 3, ''),
(10, 'Ismael Masias', '2002-11-13', 90.3, 1.76, 3, ''),
(11, 'Valeria Zunino', '2024-12-14', 56.9, 1.66, 3, ''),
(12, 'Silvana Toledo', '2003-08-12', 56.8, 1.65, 3, ''),
(15, 'Juan Segundo', '0000-00-00', 0, 0, 1, ''),
(16, 'Juan Sebastian', '0000-00-00', 0, 0, 1, ''),
(17, 'Juan Marcelo', '0000-00-00', 0, 0, 1, ''),
(18, 'Juan Manuel', '0000-00-00', 0, 0, 1, ''),
(19, 'Juan Ignacio Torrissi', '0000-00-00', 0, 0, 1, ''),
(27, 'pedrito', '0000-00-00', 0, 0, 1, ''),
(30, 'alice', '0000-00-00', 0, 0, 1, ''),
(34, 'Mariano Cesario', '1980-04-26', 78.5, 1.75, 1, ''),
(45, 'Roxana Miranda', '1999-09-09', 68.9, 1.69, 2, ''),
(46, '&lt;&quot;juan&quot;&gt;', '2000-06-15', 0, 0, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claves`
--

CREATE TABLE `claves` (
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `claves`
--

INSERT INTO `claves` (`usuario`, `contrasena`) VALUES
('webadmin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinas`
--

CREATE TABLE `rutinas` (
  `id_rutina` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `entrada` varchar(50) NOT NULL,
  `pecho` varchar(50) NOT NULL,
  `espalda` varchar(50) NOT NULL,
  `piernas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutinas`
--

INSERT INTO `rutinas` (`id_rutina`, `nombre`, `entrada`, `pecho`, `espalda`, `piernas`) VALUES
(1, 'Principiante', 'abdominales 3 x 5', 'press banca con mancuernas 3 x 6', 'remo con mancuernas 3 x 7', 'zancadas con mancuerna 3 x 8'),
(2, 'Intermedio', 'lagartijas 3 x 6', 'press banca con barra 3 x 7', 'remo con barra 3 x 8', 'sentadilla con barra 3 x 9'),
(3, 'Experto', 'peso muerto con barra 3 x 10', 'polea pecho 3 x 8', 'remo 3 x 9', 'prensa 3 x 10'),
(4, 'Adulto Mayor', 'escalador por 20 minutos', 'press banca con mancuernas 3 x 8', 'remo 3 x 10', 'zancadas con barra 3 x 9');

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
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `rutinas`
--
ALTER TABLE `rutinas`
  MODIFY `id_rutina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
