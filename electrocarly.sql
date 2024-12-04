-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2024 a las 08:36:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electrocarly`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_reg_pk` int(11) NOT NULL,
  `nombres_comprador` varchar(100) NOT NULL,
  `apellidos_comprador` varchar(100) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `num_tarjeta` varchar(20) NOT NULL,
  `ci_comprador` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_reg_pk`, `nombres_comprador`, `apellidos_comprador`, `pro_id`, `fecha_hora`, `num_tarjeta`, `ci_comprador`) VALUES
(10, '', '', 10, '2024-12-04 06:05:52', '', ''),
(17, 'Alex', 'Valquis', 10, '2024-12-04 06:52:31', '789451234578', '13245679'),
(18, 'Fanny', 'Poma', 7, '2024-12-04 06:58:19', '13245679', '10041234'),
(19, 'Alex', 'Valquis', 9, '2024-12-04 07:01:17', '789451234578', '10041234'),
(20, 'Alex', 'Valquis', 9, '2024-12-04 07:01:36', '789451234578', '10041234'),
(21, 'Fanny', 'Poma', 9, '2024-12-04 07:08:14', '13245679', '10041234'),
(22, 'Fanny', 'Valquis', 3, '2024-12-04 07:09:19', '789451234578', '10041234'),
(23, 'Fanny', 'Valquis', 3, '2024-12-04 07:12:20', '789451234578', '13245679'),
(24, 'Alex', 'Valquis', 9, '2024-12-04 07:19:51', '789451234578', '10041234'),
(25, 'Alex', 'Valquis', 9, '2024-12-04 07:20:27', '789451234578', '10041234'),
(26, 'Alex', 'Valquis', 9, '2024-12-04 07:22:04', '789451234578', '10041234'),
(27, 'Alex', 'Valquis', 9, '2024-12-04 07:23:41', '789451234578', '10041234'),
(28, 'Fanny', 'Poma', 7, '2024-12-04 07:24:01', '13245679', '10041234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(25) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_brand` varchar(25) NOT NULL,
  `product_os` varchar(10) NOT NULL,
  `product_model` varchar(20) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_provider` varchar(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_brand`, `product_os`, `product_model`, `product_price`, `product_provider`, `product_category`, `product_image_path`, `created_at`) VALUES
(3, 'pro_001', 'p 20', 'huawe', 'Linux', 'galxi', 798132.00, 'Arrow Electronics', 'Tablets', 'img/tarea ingles 2.jpg', '2024-12-03 21:36:25'),
(7, 'code01', 'name', 'Huawei', 'Android', 'model', 789456.00, 'Provider 3', 'Tablets', 'img/tarea ingles 2.jpg', '2024-12-03 22:16:02'),
(8, 'code', 'name', 'Huawei', 'Android', 'model001', 789.00, 'Ingram Micro', 'Celulares', 'img/codigo.png', '2024-12-03 23:20:06'),
(9, 'code', 'name', 'OnePlus', 'iOS', 'model', 111111.00, 'Ingram Micro', 'Celulares', 'img/codigo.png', '2024-12-04 01:31:10'),
(10, 'zxcv123', 'tablest5', 'Huawei', 'Android', 'tbs1', 7894.00, 'Ingram Micro', 'Tablets', 'img/codigo.png', '2024-12-04 04:47:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `dni`, `first_name`, `last_name`, `gender`, `username`, `email`, `password`) VALUES
(3, '6999995 LP', 'Juan', 'Condori', 'Male', 'admin', 'juanjokun@gmail.com', '$2y$10$0Rcvdn3RKNSY6OphssXxxu2fkiflRzFOGuRMDZ1gk0QgU5l9ebIk6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_reg_pk`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_reg_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
