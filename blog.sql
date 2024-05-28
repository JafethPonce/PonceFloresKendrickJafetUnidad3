-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2024 a las 21:57:10
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
  `id_infouser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `info_user`
--

INSERT INTO `info_user` (`nombre`, `apellidos`, `celular`, `email`, `psw`, `id_infouser`) VALUES
('Jafet ', 'Ponce', '2147483647', 'JafethPonce06@hotmail.com', '123', 1),
('Ivan', 'fuyfufy', '2147483647', 'jafethpohnceff@gmail.com', '111', 2),
('David ', 'Amador', '8446565895', 'DavidAmador@hotmail.com', 'David123', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `Nombre` varchar(255) NOT NULL,
  `Nota` varchar(255) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_Nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`Nombre`, `Nota`, `Fecha`, `Id_Nota`) VALUES
('Juan Escobedo', 'Este blog es muy interesante', '2024-05-25', 1),
('Ivan', 'Hay muchos temas por lo cual hablar', '2024-05-22', 2),
('Jafet', 'Prueba ', '2024-05-23', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `info_user`
--
ALTER TABLE `info_user`
  ADD PRIMARY KEY (`id_infouser`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`Id_Nota`);

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
  MODIFY `Id_Nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
