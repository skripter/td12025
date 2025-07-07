-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-07-2025 a las 21:51:51
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
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `autid` int(11) NOT NULL,
  `autnom` varchar(100) NOT NULL,
  `autdob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`autid`, `autnom`, `autdob`) VALUES
(1, 'Herman Hesse', '1877-07-02'),
(2, 'Marco Aurelio', '0121-04-26'),
(3, 'Séneca', '0004-01-01'),
(4, 'Epicteto', '0055-01-01'),
(5, 'Lao-Tsé', NULL),
(6, 'Julían Murguía', '1930-07-07'),
(7, 'Marco Tulio Cicerón', '0106-01-03'),
(8, 'Antoine de Saint-Exupéry', '1900-06-29');

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
(7, 'Reptiles'),
(8, 'Bovinos'),
(9, 'Ovinos'),
(10, 'Camelídos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `libid` int(11) NOT NULL,
  `libnom` varchar(100) NOT NULL,
  `libautor` int(11) NOT NULL,
  `libisbn` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`libid`, `libnom`, `libautor`, `libisbn`) VALUES
(1, 'Demian', 1, 323),
(2, 'Siddharta', 1, 34234234),
(5, 'Meditaciones', 2, 988979),
(6, 'De la felicidad', 3, 3456),
(7, 'Manual / Enquiridion', 4, 34566),
(8, 'Tao Te King', 5, 33455),
(9, 'El tesoro de Cañada Seca', 6, 4456),
(10, 'De los deberes', 7, 34455),
(11, 'El Principito', 8, 34455),
(12, 'Cartas a Lucilio', 3, 233455);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `marid` int(11) NOT NULL,
  `marnombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`marid`, `marnombre`) VALUES
(1, 'Honda'),
(2, 'Chevrolet'),
(3, 'Hyundai'),
(4, 'Volkswagen'),
(5, 'Ford'),
(6, 'Toyota'),
(7, 'Subaru'),
(8, 'Mazda'),
(9, 'Volvo'),
(10, 'Mercedes Benz'),
(11, 'BMW'),
(12, 'Škoda'),
(13, 'SEAT'),
(14, 'BYD');

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
(1, 'O\'connor', 1, 1, 'H', '2025-05-07', 'Rodrigo B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `modid` int(11) NOT NULL,
  `modmarca` int(11) NOT NULL,
  `modnombre` varchar(100) NOT NULL,
  `modanio` year(4) NOT NULL,
  `modpotencia` int(11) NOT NULL,
  `modcilindros` int(11) NOT NULL,
  `modcilindrada` int(11) NOT NULL COMMENT 'Cilindrada en cm3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`modid`, `modmarca`, `modnombre`, `modanio`, `modpotencia`, `modcilindros`, `modcilindrada`) VALUES
(1, 2, 'Corsa Classic', '2010', 98, 4, 1600),
(2, 3, 'HB20S 1.0', '2022', 75, 3, 1000),
(3, 3, 'HB20S 1.6', '2025', 102, 4, 1600),
(4, 1, 'City Sedan', '2022', 122, 4, 1500),
(5, 4, 'Vento GLI', '2025', 230, 4, 2000),
(6, 5, 'Maverick Lariat', '2025', 253, 4, 2000),
(7, 6, 'Corolla Hybrid Xei', '2025', 122, 4, 1800),
(8, 7, 'WRX Sedan', '2025', 275, 4, 2400),
(9, 8, 'Miata', '2023', 181, 4, 1998),
(10, 9, 'EX30', '2025', 272, 0, 0),
(11, 10, 'C200 Avantgarde', '2025', 204, 4, 1496),
(12, 11, '330e', '2025', 252, 4, 2000),
(13, 12, 'Octavia', '2025', 265, 4, 2000),
(14, 13, 'Leon Cupra 290', '2021', 290, 4, 1984),
(15, 14, 'Seagull', '2025', 75, 0, 0);

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
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`autid`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`espid`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`libid`),
  ADD KEY `fk_autores` (`libautor`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marid`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`masid`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`modid`),
  ADD KEY `fk_marcas` (`modmarca`);

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
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `autid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `espid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `libid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `masid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `modid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `razid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_autores` FOREIGN KEY (`libautor`) REFERENCES `autores` (`autid`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `fk_marcas` FOREIGN KEY (`modmarca`) REFERENCES `marcas` (`marid`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `razas`
--
ALTER TABLE `razas`
  ADD CONSTRAINT `fk_especie` FOREIGN KEY (`razespecie`) REFERENCES `especies` (`espid`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
