-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2021 a las 02:44:04
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_maps`
--

CREATE DATABASE IF NOT EXISTS `prueba_maps` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prueba_maps`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitud` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitud` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`, `longitud`, `latitud`) VALUES
(1, 'Miami', '25.7823907', '-80.2994989'),
(2, 'Orlando', '28.4810971', '-81.5089245'),
(3, 'New York', '40.6971494', '-74.2598677');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `humedad`
--

CREATE TABLE `humedad` (
  `id` int(11) NOT NULL,
  `contenido_volumetrico` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `humedad`
--

INSERT INTO `humedad` (`id`, `contenido_volumetrico`) VALUES
(2, '15'),
(3, '18'),
(4, '27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `humedad_ciudad`
--

CREATE TABLE `humedad_ciudad` (
  `id` int(11) NOT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_humedad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `humedad_ciudad`
--

INSERT INTO `humedad_ciudad` (`id`, `id_ciudad`, `id_humedad`) VALUES
(1, 1, 2),
(2, 3, 3),
(3, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `client_ip` varchar(50) NOT NULL,
  `ciudad_consultada` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `humedad`
--
ALTER TABLE `humedad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `humedad_ciudad`
--
ALTER TABLE `humedad_ciudad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_73F6D21C68553E33` (`id_ciudad`),
  ADD KEY `IDX_73F6D21CB6179350` (`id_humedad`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `humedad`
--
ALTER TABLE `humedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `humedad_ciudad`
--
ALTER TABLE `humedad_ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `humedad_ciudad`
--
ALTER TABLE `humedad_ciudad`
  ADD CONSTRAINT `FK_73F6D21C68553E33` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id`),
  ADD CONSTRAINT `FK_73F6D21CB6179350` FOREIGN KEY (`id_humedad`) REFERENCES `humedad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
