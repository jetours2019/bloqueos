-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-01-2021 a las 17:03:22
-- Versión del servidor: 10.3.27-MariaDB-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Base de datos: `gestion_bloqueos`
--

CREATE DATABASE gestion_bloqueos;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(10) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `autor` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `no` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `vuelo1` varchar(50) NOT NULL,
  `desde1` varchar(50) NOT NULL,
  `hasta1` varchar(3) NOT NULL,
  `aerolineas1` varchar(25) NOT NULL,
  `fecha1` varchar(20) NOT NULL,
  `salida1` varchar(10) NOT NULL,
  `llegada1` varchar(10) NOT NULL,
  `vuelo2` varchar(50) NOT NULL,
  `desde2` varchar(50) NOT NULL,
  `hasta2` varchar(50) NOT NULL,
  `aerolineas2` varchar(25) NOT NULL,
  `fecha2` varchar(20) NOT NULL,
  `salida2` varchar(10) NOT NULL,
  `llegada2` varchar(10) NOT NULL,
  `total` int(10) NOT NULL,
  `libre` int(10) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `ano` varchar(50) DEFAULT NULL,
  `mes` varchar(50) DEFAULT NULL,
  `dia` int(10) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `ano2` varchar(50) NOT NULL,
  `mes2` varchar(50) NOT NULL,
  `dia2` int(10) NOT NULL,
  `programa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
