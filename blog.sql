-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2024 a las 06:25:53
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
-- Estructura de tabla para la tabla `active_sessions`
--

CREATE TABLE `active_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `active_sessions`
--

INSERT INTO `active_sessions` (`id`, `user_id`, `session_id`, `start_time`) VALUES
(1, 5, 't2vakjq0tbvbjho9ehgjte0lhc', '2024-07-18 01:54:25'),
(2, 5, 't2vakjq0tbvbjho9ehgjte0lhc', '2024-07-18 02:01:58'),
(3, 6, 't2vakjq0tbvbjho9ehgjte0lhc', '2024-07-18 02:08:37'),
(4, 2, 't2vakjq0tbvbjho9ehgjte0lhc', '2024-07-20 04:07:30'),
(5, 2, 't2vakjq0tbvbjho9ehgjte0lhc', '2024-07-20 04:34:28');

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
  `id_nota` int(11) NOT NULL,
  `pregunta_secreta` varchar(255) NOT NULL,
  `respuesta_secreta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `info_user`
--

INSERT INTO `info_user` (`nombre`, `apellidos`, `celular`, `email`, `psw`, `id_infouser`, `id_rol`, `id_nota`, `pregunta_secreta`, `respuesta_secreta`) VALUES
('Genaro', 'Osoria', '8441236589', 'OsoriaGenaro@gmail.com', '$2y$10$lEb6uRdmY.F6DQfi2VAni.GFD.UZELUgosZSLN3Hogy4d52mnLype', 1, 2, 0, 'ciudad', 'Saltillo'),
('Jafet', 'Ponce', '8444845578', 'jafethponce06@hotmail.com', '$2y$10$vF/JIBYtRIwwL23IR3ki6ewFX6oJnlrnK9yb3TXsyN/QB0eMJwKZ.', 2, 2, 0, '¿Cuál es el nombre de tu primera mascota?', 'Yaki'),
('Administrador', 'Admin', '844545565', 'Admin@blog.com', 'AdminBlog', 3, 1, 0, 'No hay', 'No hay'),
('David', 'Amador', '5654334587', 'DavidAmador@amador.com', '$2y$10$W4y5p1N0QJcif7uA7vTBfuv47SNprqj0QV0kfMarbJT3.CcSbUJNm', 5, 2, 0, '¿Cuál es el nombre de tu escuela primaria?', 'Margarita Maza de Juarez'),
('Ivan', 'Perez', '1234567896', 'IvanPerez@gmail.com', '$2y$10$5KxBRrE/HxwPnZPsOat2iOB.Jm.L.TtStlqzZ.i7DKEvg6hjLy8/6', 6, 2, 0, '¿En qué ciudad naciste?', 'Saltillo');

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
('prueba', 'holi', '2024-05-28', 6),
('Jafet', 'Hola', '2024-06-27', 7),
('Genaro', 'Hola este es un comentario', '2024-06-27', 8);

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
-- Indices de la tabla `active_sessions`
--
ALTER TABLE `active_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT de la tabla `active_sessions`
--
ALTER TABLE `active_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `info_user`
--
ALTER TABLE `info_user`
  MODIFY `id_infouser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `active_sessions`
--
ALTER TABLE `active_sessions`
  ADD CONSTRAINT `active_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `info_user` (`id_infouser`);

--
-- Filtros para la tabla `info_user`
--
ALTER TABLE `info_user`
  ADD CONSTRAINT `fk_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
