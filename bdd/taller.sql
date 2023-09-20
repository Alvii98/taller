-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql206.infinityfree.com
-- Tiempo de generación: 20-09-2023 a las 14:00:22
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id` int(11) NOT NULL,
  `nombre_taller` varchar(255) NOT NULL,
  `fecha_entrega` varchar(255) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `restante` int(11) NOT NULL DEFAULT 0,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id`, `nombre_taller`, `fecha_entrega`, `producto`, `cantidad`, `restante`, `valor`) VALUES
(12, 'dsa jds', '2020-02-02', 'dsadsa', 20, 9, '22'),
(13, 'Lomas', '2022-05-02', 'remera', 100, 100, '10000'),
(15, 'Lomas', '2022-05-02', 'remera', 100, 50, '10000'),
(16, 'Lomas', '2022-05-02', 'remera', 100, 100, '10000'),
(17, 'lomas ', '2023-09-12', 'campera transito', 36, 36, '3200'),
(18, 'lomas', '2023-09-01', 'Campera', 100, 10, '$20000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre_taller` varchar(255) NOT NULL,
  `fecha_retiro` varchar(255) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `enviado` int(11) NOT NULL DEFAULT 0,
  `valor` varchar(255) NOT NULL,
  `observacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`id`, `codigo`, `nombre_taller`, `fecha_retiro`, `producto`, `cantidad`, `enviado`, `valor`, `observacion`) VALUES
(1, 12, 'dsa jds', '2023-09-13', 'dsadsa', 20, 11, '22', 'dsadsada'),
(2, 14, 'Lomas', '2023-09-13', 'remera', 100, 12, '10000', 'Jahsgsj'),
(3, 18, 'lomas', '2023-09-15', 'Campera', 100, 90, '$20000', 'sdads'),
(4, 15, 'Lomas', '2023-09-15', 'remera', 100, 50, '10000', 'esewq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
