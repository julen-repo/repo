-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2024 a las 12:42:24
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
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE `bebidas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tiene_alcohol` tinyint(1) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bebidas`
--

INSERT INTO `bebidas` (`id`, `nombre`, `tiene_alcohol`, `descripcion`, `precio`, `stock`) VALUES
(1, 'Cerveza Lager', 1, 'Pack de 6 botellas de 33cl', 1.50, 50),
(2, 'Cerveza IPA', 1, 'Pack de 6 botellas de 33cl', 2.00, 40),
(3, 'Vino Tinto', 1, 'Botella de 750ml', 5.75, 30),
(4, 'Vino Blanco', 1, 'Botella de 750ml', 5.50, 25),
(5, 'Tequila', 1, 'Botella de 700ml', 15.00, 15),
(6, 'Ron', 1, 'Botella de 700ml', 12.00, 20),
(7, 'Whisky', 1, 'Botella de 700ml', 20.00, 10),
(8, 'Vodka', 1, 'Botella de 700ml', 18.50, 18),
(9, 'Ginebra', 1, 'Botella de 700ml', 22.00, 12),
(10, 'Cóctel Margarita', 1, 'Copa preparada', 8.50, 25),
(11, 'Cóctel Mojito', 1, 'Copa preparada', 7.00, 30),
(12, 'Cóctel Piña Colada', 1, 'Copa preparada', 7.50, 28),
(13, 'Cerveza Sin Alcohol', 0, 'Pack de 6 botellas de 33cl', 1.25, 50),
(14, 'Refresco de Cola', 0, 'Lata de 355ml', 1.00, 100),
(15, 'Jugo de Naranja', 0, 'Botella de 1L', 1.50, 60),
(16, 'Jugo de Manzana', 0, 'Botella de 1L', 1.60, 55),
(17, 'Agua Mineral', 0, 'Botella de 500ml', 0.80, 120),
(18, 'Agua con Gas', 0, 'Botella de 500ml', 1.00, 90),
(19, 'Limonada', 0, 'Botella de 1L', 1.20, 40),
(20, 'Té Helado', 0, 'Botella de 500ml', 1.40, 35),
(21, 'Batido de Fresa', 0, 'Botella de 500ml', 2.50, 25),
(22, 'Batido de Plátano', 0, 'Botella de 500ml', 2.50, 25),
(23, 'Limonada con Menta', 0, 'Botella de 1L', 1.80, 30),
(24, 'Agua de Coco', 0, 'Botella de 500ml', 1.90, 30),
(25, 'Agua Saborizada', 0, 'Botella de 500ml', 1.70, 40),
(26, 'Jugo de Uva', 0, 'Botella de 1L', 2.00, 25),
(27, 'Soda de Limón', 0, 'Lata de 355ml', 1.30, 70),
(28, 'Té Verde', 0, 'Botella de 500ml', 1.50, 50),
(29, 'Té Negro', 0, 'Botella de 500ml', 1.50, 50),
(30, 'Cerveza Artesanal', 1, 'Botella de 500ml', 3.50, 30),
(31, 'Cerveza Stout', 1, 'Botella de 500ml', 3.00, 28),
(32, 'Cerveza Ale', 1, 'Botella de 500ml', 3.20, 25),
(33, 'Cerveza Pilsner', 1, 'Botella de 500ml', 2.80, 45),
(34, 'Cóctel Cosmopolitan', 1, 'Copa preparada', 9.00, 15),
(35, 'Cóctel Daiquiri', 1, 'Copa preparada', 7.50, 15),
(36, 'Cóctel Caipirinha', 1, 'Copa preparada', 8.00, 15),
(37, 'Cóctel Negroni', 1, 'Copa preparada', 9.50, 15),
(38, 'Cider', 1, 'Botella de 500ml', 4.00, 20),
(39, 'Champagne', 1, 'Botella de 750ml', 25.00, 10),
(40, 'Vino Rosado', 1, 'Botella de 750ml', 6.50, 25),
(41, 'Vino Espumoso', 1, 'Botella de 750ml', 10.00, 15),
(42, 'Mezcal', 1, 'Botella de 700ml', 14.00, 12),
(43, 'Pisco', 1, 'Botella de 700ml', 13.00, 12),
(44, 'Baileys', 1, 'Botella de 700ml', 16.00, 18),
(45, 'Sangría', 1, 'Botella de 1L', 7.00, 30),
(46, 'Cerveza de Trigo', 1, 'Botella de 500ml', 2.50, 40),
(47, 'Bebida Energética', 0, 'Lata de 355ml', 1.80, 80),
(48, 'Jugo de Piña', 0, 'Botella de 1L', 2.00, 25),
(49, 'Jugo de Mora', 0, 'Botella de 1L', 2.20, 20),
(50, 'Bebida de Aloe Vera', 0, 'Botella de 500ml', 2.30, 20),
(51, 'Jugo de Durazno', 0, 'Botella de 1L', 1.90, 25),
(52, 'Bebida de Granadina', 0, 'Botella de 1L', 1.80, 25),
(53, 'Cerveza Red Ale', 1, 'Botella de 500ml', 3.10, 20),
(54, 'Cóctel Bloody Mary', 1, 'Copa preparada', 8.50, 15),
(55, 'Cóctel Old Fashioned', 1, 'Copa preparada', 9.00, 10),
(56, 'Cóctel Long Island Iced Tea', 1, 'Copa preparada', 9.50, 10),
(57, 'Té Chai', 0, 'Botella de 500ml', 1.70, 30),
(58, 'Limonada Rosa', 0, 'Botella de 500ml', 1.60, 30),
(59, 'Cerveza Porter', 1, 'Botella de 500ml', 3.30, 18),
(60, 'Cerveza Amber', 1, 'Botella de 500ml', 3.00, 20),
(61, 'Soda de Naranja', 0, 'Lata de 355ml', 1.20, 60);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
