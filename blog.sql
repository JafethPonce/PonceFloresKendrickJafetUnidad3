-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2024 a las 01:35:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_user`
--

CREATE TABLE `info_user` (
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `id_infouser` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `info_user`
--

INSERT INTO `info_user` (`nombre`, `apellidos`, `celular`, `email`, `psw`, `id_infouser`, `id_rol`, `id_nota`) VALUES
('Jafet', 'Ponce', '8445434438', 'jafethponce06@hotmail.com', 'Jafet123456', 1, 2, 0),
('Ivan', 'Prueba', '8445986953', 'Ivan@prueba.com', '123456789', 2, 1, 0),
('prueba', 'prueba', '1234567895', 'ajajaj@gmail.com', '11111111', 3, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `Nombre` varchar(255) NOT NULL,
  `Nota` varchar(255) NOT NULL,
  `Fecha` date NOT NULL,
  `id_nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`Nombre`, `Nota`, `Fecha`, `id_nota`) VALUES
('Jafet', 'dddddddd', '2024-05-21', 1),
('Jafet', 'xddddddd', '2024-05-28', 2),
('Jafet', 'nosexd', '0000-00-00', 3),
('Jafet', 'prueba2', '2024-05-28', 4),
('Jafet', 'bjguygyuguygygygy', '2024-05-28', 5),
('prueba', 'holi', '2024-05-28', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'admin'),
(2, 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `info_user`
--
ALTER TABLE `info_user`
  ADD PRIMARY KEY (`id_infouser`),
  ADD KEY `fk_id_rol` (`id_rol`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `info_user`
--
ALTER TABLE `info_user`
  MODIFY `id_infouser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `info_user`
--
ALTER TABLE `info_user`
  ADD CONSTRAINT `fk_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
