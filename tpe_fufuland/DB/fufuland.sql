-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2021 a las 23:31:02
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fufuland`
--
CREATE DATABASE IF NOT EXISTS `fufuland` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fufuland`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinarias`
--

CREATE TABLE `veterinarias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `direccion` varchar(25) NOT NULL,
  `localidad` varchar(25) NOT NULL,
  `horario` varchar(10) NOT NULL,
  `telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `veterinarias`
--

INSERT INTO `veterinarias` (`id`, `nombre`, `direccion`, `localidad`, `horario`, `telefono`) VALUES
(1, 'La vete', 'san juan 23', 'tandil', 'de 12 a 14', 123456789),
(2, 'La vete 2', 'san juan 23', 'tandil', 'de 12 a 14', 123456789),
(3, 'La vete 3', 'san juan 23', 'tandil', 'de 12 a 14', 123456789),
(4, 'La vete 4', 'san juan 23', 'tandil', 'de 12 a 14', 123456789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinarios`
--

CREATE TABLE `veterinarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `especialidad` varchar(15) NOT NULL,
  `veterinaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `veterinarios`
--

INSERT INTO `veterinarios` (`id`, `nombre`, `apellido`, `especialidad`, `veterinaria`) VALUES
(1, 'Maria', 'Gomez', 'Exoticos', 1),
(2, 'Juan', 'Perez', 'Domesticos', 1),
(3, 'Soledad', 'Gonzalez', 'Cirugia general', 3),
(4, 'Marcos', 'Fiotto', 'Exoticos', 4),
(5, 'Gabriela', 'Mistral', 'Domesticos', 2),
(6, 'Noberto', 'Elias', 'Equinos', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `veterinarias`
--
ALTER TABLE `veterinarias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `veterinarios`
--
ALTER TABLE `veterinarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `veterinarias`
--
ALTER TABLE `veterinarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `veterinarios`
--
ALTER TABLE `veterinarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
