-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 192.168.4.20
-- Tiempo de generación: 23-11-2022 a las 14:16:03
-- Versión del servidor: 10.6.10-MariaDB
-- Versión de PHP: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apetey`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` char(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`) VALUES
(82, '214621282', 3, 'agua mineral cachantun', 1000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` char(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `total_products`, `total_price`) VALUES
(20, '214621282', 'BayronFlores', 'bd9608461@gmail.com', 'mak italiano (2500 x 1) - mak llanquihue italiano (2500 x 1) - ', 5000),
(21, '214621282', 'BayronFlores', 'bd9608461@gmail.com', 'mak llanquihue italiano (2500 x 1) - ', 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `categoria`) VALUES
(2, 'bebida lata 350cc', 1000, 'bebidas'),
(3, 'agua mineral cachantun', 1000, 'bebidas'),
(4, 'agua mineral benedictino', 1000, 'bebidas'),
(5, 'agua mineral sabores', 1200, 'bebidas'),
(6, 'nectar boca ancha', 850, 'bebidas'),
(7, 'energetica', 2000, 'bebidas'),
(8, 'papas fritas', 2000, 'snacks'),
(9, 'salchipapas', 2500, 'snacks'),
(10, 'chorrillana', 3500, 'snacks'),
(11, 'chickenpops', 3000, 'snacks'),
(12, 'mak italiano', 2500, 'completos'),
(13, 'mak llanquihue italiano', 2500, 'completos'),
(14, 'cafe mediano', 1700, 'cafes'),
(15, 'mak italiano', 4000, 'sandwiches'),
(16, 'mak chacarero', 4000, 'sandwiches'),
(17, 'mak barros lucos ', 4000, 'sandwiches'),
(18, 'mak tocino', 4000, 'sandwiches'),
(19, 'Wraps italiano', 4000, 'wraps'),
(20, 'Wraps chacarero', 4000, 'wraps'),
(21, 'Wraps barros lucos', 4000, 'wraps');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(12345678, 'bayron', 'floresbayron133@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(193807739, 'Doris Maureira', 'doris.maureira.vera@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(204630100, 'Andrews Petey', 'apetey16@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(207667447, 'Anahi Adamaco', 'aadamaco2021@alu.uct.cl', 'dbe0b958b2bb21a119002c52a11b2c36f072ebc9'),
(214621282, 'BayronFlores', 'bd9608461@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
