-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2024 a las 03:33:04
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `password` varchar(250) NOT NULL,
  `roles` varchar(255) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `nombre`, `password`, `roles`) VALUES
(1, 'pedri@gmail.com', 'pedri', '$2y$10$e7nGyT0dyK4YqsaH1vXrS.lmLeJoETTxPIC7wOUOHDiDlgCY4KglK', 'usuario'),
(2, 'sam@outlook.es', 'sam', '$2y$10$dv6D8qZEe.xDXmLysxE/0ut4RwvaWLgPzqfPTpyl3Fi/EwMmHuHna', 'usuario'),
(3, 'ramon@gmail.com', 'Ramon', '$2y$10$8.Rcq2FfruzN9sVifila9eAFp50MzBsWg6ZhdiStNOIudnYsEgq4C', 'administrador'),
(4, 'sami@gmai.com', 'sami', '$2y$10$0SCs2uycUtJUJ5BRUhjhbe1BJFTi9DW9iWZmonyXPgnFz3n2Hk2hO', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
