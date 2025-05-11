-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2025 a las 00:07:38
-- Versión del servidor: 10.11.3-MariaDB-1
-- Versión de PHP: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `td12025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `espid` int(11) NOT NULL,
  `espnombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`espid`, `espnombre`) VALUES
(1, 'Caninos'),
(2, 'Felinos'),
(3, 'Aves'),
(4, 'Peces'),
(5, 'Roedores'),
(6, 'Equinos'),
(7, 'Reptiles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `masid` int(11) NOT NULL,
  `masnombre` varchar(50) NOT NULL,
  `masespecie` int(11) NOT NULL,
  `masraza` int(11) NOT NULL,
  `massexo` varchar(1) NOT NULL,
  `masfechanac` date NOT NULL,
  `maspropietario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`masid`, `masnombre`, `masespecie`, `masraza`, `massexo`, `masfechanac`, `maspropietario`) VALUES
(1, 'O\'connor', 1, 1, 'H', '2025-05-07', 'jygujy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `razid` int(11) NOT NULL,
  `raznombre` varchar(50) NOT NULL,
  `razespecie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`razid`, `raznombre`, `razespecie`) VALUES
(1, 'Border Collie', 1),
(2, 'Romano', 2),
(3, 'Pez Payaso', 4),
(4, 'Guacamayo azul', 3),
(5, 'Cacatua', 3),
(6, 'gato comun', 2),
(7, 'Caballo mustang', 6),
(8, 'raton de campo', 5),
(9, 'Doge (Shiba Inu)', 1),
(10, 'Perro cruza', 1),
(11, 'Lagartija overa', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`espid`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`masid`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`razid`),
  ADD KEY `fk_especie` (`razespecie`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `espid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `masid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `razid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `razas`
--
ALTER TABLE `razas`
  ADD CONSTRAINT `fk_especie` FOREIGN KEY (`razespecie`) REFERENCES `especies` (`espid`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
