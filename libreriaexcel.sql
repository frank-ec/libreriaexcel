-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-03-2022 a las 16:47:42
-- Versión del servidor: 5.7.37-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.34-28+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreriaexcel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idti` int(10) NOT NULL,
  `hcu` int(10) NOT NULL COMMENT 'Numero de historia clinica unica',
  `cc` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_padre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_madre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nac` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_reg` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_uc` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT '1' COMMENT 'Estado de la HCU',
  `conteo` int(1) NOT NULL DEFAULT '1',
  `usuario_reg` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario_uc` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nota` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idti`, `hcu`, `cc`, `apellidos`, `nombres`, `nombre_padre`, `nombre_madre`, `fecha_nac`, `email`, `fecha_reg`, `fecha_uc`, `estado`, `conteo`, `usuario_reg`, `usuario_uc`, `nota`) VALUES
(1, 0, '1714632575', 'LARA CARTAGENA', 'SEGUNDO FRANKLIN', 'SEGUNDO', 'MARIA', '1978-07-21', 'algo', '2022-03-23', '2022-03-23', 1, 1, 'MIGRACION', '', '0992232324'),
(2, 1, '1714632575', 'LARA CARTAGENA', 'SEGUNDO FRANKLIN', 'SEGUNDO', 'MARIA', '1978-07-21', 'franklynlara@hotmail.com', '2022-03-23', '2022-03-23', 1, 1, 'MIGRACION', '', '0992232324');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombres`) VALUES
(1, 'usuario1', 'Nombre 1'),
(2, 'usuario2', 'Nombre 2'),
(3, 'usuario1', 'Nombre 1'),
(4, 'usuario2', 'Nombre 2'),
(5, 'usuario3', 'Nombre 3'),
(6, 'usuario4', 'Nombre 4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`hcu`),
  ADD KEY `hcu` (`hcu`),
  ADD KEY `idti` (`idti`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
