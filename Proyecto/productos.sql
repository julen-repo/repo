-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2024 a las 12:39:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `categoria_id`) VALUES
(101, 'Ensalada César', 'Ensalada fresca con pollo, lechuga, crutones y aderezo César', 8.99, 50, 1),
(102, 'Sopa de Verduras', 'Sopa caliente con una mezcla de vegetales frescos', 5.49, 30, 1),
(103, 'Bruschetta', 'Pan tostado con tomate, albahaca y aceite de oliva', 6.49, 40, 1),
(104, 'Tartar de Salmón', 'Tartar de salmón fresco con aguacate y salsa de soja', 12.99, 20, 1),
(105, 'Patatas Bravas', 'Papas fritas con salsa picante y mayonesa', 4.99, 60, 1),
(106, 'Bistec de Res', 'Bistec jugoso servido con verduras asadas y puré de papas', 15.99, 50, 2),
(107, 'Paella Valenciana', 'Arroz con mariscos, pollo y verduras al estilo valenciano', 18.99, 35, 2),
(108, 'Pizza Margarita', 'Pizza con tomate, mozzarella y albahaca fresca', 10.99, 45, 2),
(109, 'Spaghetti Bolognese', 'Pasta con salsa boloñesa casera y carne de res', 13.49, 40, 2),
(110, 'Pollo a la Parrilla', 'Pollo a la parrilla con salsa BBQ y ensalada', 11.99, 50, 2),
(111, 'Cerveza', 'Cerveza rubia de 330ml', 2.49, 100, 3),
(112, 'Vino Tinto', 'Vino tinto reserva con cuerpo', 9.99, 60, 3),
(113, 'Mojito', 'Cóctel refrescante con ron, menta y lima', 5.99, 30, 3),
(114, 'Tequila', 'Tequila premium de 500ml', 15.99, 20, 3),
(115, 'Agua Mineral', 'Botella de agua mineral de 500ml', 1.49, 200, 3),
(116, 'Tarta de Queso', 'Tarta de queso suave con base de galleta y mermelada', 4.99, 40, 4),
(117, 'Brownie de Chocolate', 'Brownie casero con trozos de chocolate', 3.99, 50, 4),
(118, 'Helado de Vainilla', 'Helado cremoso de vainilla', 2.49, 60, 4),
(119, 'Flan Casero', 'Flan tradicional de huevo con caramelo', 3.49, 30, 4),
(120, 'Mousse de Chocolate', 'Mousse ligera de chocolate con chantilly', 5.49, 25, 4),
(121, 'Puré de Papas', 'Puré suave de papas con mantequilla y crema', 3.49, 70, 5),
(122, 'Arroz con Verduras', 'Arroz blanco acompañado con vegetales al vapor', 2.99, 80, 5),
(123, 'Ensalada Mixta', 'Ensalada fresca con tomate, pepino, lechuga y aderezo', 4.49, 90, 5),
(124, 'Pan de Ajo', 'Pan recién horneado con mantequilla de ajo', 2.49, 100, 5),
(125, 'Papas Fritas', 'Papas fritas crujientes con sal', 2.99, 120, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
