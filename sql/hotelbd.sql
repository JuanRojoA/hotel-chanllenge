-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 05:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE hotelbd;
USE hotelbd;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoteles`
--

CREATE TABLE `hoteles` (
  `id_hotel` varchar(13) NOT NULL,
  `nom_hotel` varchar(100) NOT NULL,
  `descrip` tinytext NOT NULL,
  `servicios` text NOT NULL,
  `img` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoteles`
--

INSERT INTO `hoteles` (`id_hotel`, `nom_hotel`, `descrip`, `servicios`, `img`, `direccion`, `precio`) VALUES
('631672e7c00ad', 'Hotel Kyoto Plaza Grande', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati quidem quod dicta sit eos! Quisquam consectetur est commodi facilis, laboriosam, molestias ab veniam nulla corporis veritatis, omnis reprehenderit id incidunt?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati quidem quod dicta sit eos! Quisquam consectetur est commodi facilis, laboriosam, molestias ab veniam nulla corporis veritatis, omnis reprehenderit id incidunt?', 'https://picsum.photos/id/1029/4887/2759', 'Cartagena, Colombia.', 170000),
('631672f9ea59f', 'Hotel Kyoto Ciudades Industriales', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique libero nisi atque aliquid amet ea, quas quod nesciunt maiores eum dolorum animi provident explicabo omnis esse laudantium quidem beatae dolor.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique libero nisi atque aliquid amet ea, quas quod nesciunt maiores eum dolorum animi provident explicabo omnis esse laudantium quidem beatae dolor.', 'https://picsum.photos/id/1033/2048/1365', 'Bogota, Colombia.', 230000),
('631672f9ea5a6', 'Hotel Kyoto Bellas Flores', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique libero nisi atque aliquid amet ea, quas quod nesciunt maiores eum dolorum animi provident explicabo omnis esse laudantium quidem beatae dolor.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique libero nisi atque aliquid amet ea, quas quod nesciunt maiores eum dolorum animi provident explicabo omnis esse laudantium quidem beatae dolor.', 'https://picsum.photos/id/1031/5446/3063', 'Medellín, Colombia.', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `reservaciones`
--

CREATE TABLE `reservaciones` (
  `id_reservacion` varchar(15) NOT NULL,
  `num_doc` varchar(15) NOT NULL,
  `id_hotel` varchar(13) NOT NULL,
  `personas` tinyint(4) NOT NULL,
  `ninos` tinyint(4) NOT NULL,
  `menores` tinyint(4) NOT NULL,
  `fec_entrada` date NOT NULL,
  `fec_salida` date NOT NULL,
  `plan_turistico` tinyint(4) NOT NULL,
  `precio` float NOT NULL,
  `total` float NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `num_doc`, `id_hotel`, `personas`, `ninos`, `menores`, `fec_entrada`, `fec_salida`, `plan_turistico`, `precio`, `total`, `estado`) VALUES
('6316998854a55', '1001773808', '631672f9ea59f', 1, 1, 1, '2022-09-05', '2022-09-09', 1, 230000, 2346000, 2),
('63169a0fea4f9', '1001773808', '631672e7c00ad', 2, 2, 1, '2022-09-14', '2022-09-16', 1, 170000, 3604000, 1),
('6316b88cbd2d2', '123456', '631672e7c00ad', 2, 0, 0, '2022-09-15', '2022-09-14', 1, 170000, 3400000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `tipo_doc` tinyint(4) NOT NULL,
  `num_doc` varchar(15) NOT NULL,
  `nacionalidad` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `num_cel` bigint(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password_hash` varchar(200) NOT NULL,
  `super` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`tipo_doc`, `num_doc`, `nacionalidad`, `nombre`, `num_cel`, `email`, `password_hash`, `super`) VALUES
(1, '1001773808', 'Colombia', 'Juan Rojo', 38519762835, 'jjrojoa@gmail.com', '$2y$10$AaCP8RrnTNF9BQLqHnPY0eEHAMvt3aYNdhNqQDQ/TxFHQ/Z0n5U12', 1),
(1, '123456', 'Austria', 'Pepito Perez', 43653635, 'jjrojoa@gmail.com', '$2y$10$JXD5iY96RPyiUDNxhoSGT.FI5QsvHx/u9w9N8QTwK9Jnl..UX8GIS', 0),
(1, '12345678', 'Colombia', 'Juan Rojo', 57655634, 'jjrojoa@gmail.com', '$2y$10$KJ3HhPu6P0UDxLaiWPMQEOCN5p95o3LngTyqT0H/AhM0UY5xKXN7a', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`id_reservacion`),
  ADD KEY `num_doc` (`num_doc`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`num_doc`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`num_doc`) REFERENCES `usuarios` (`num_doc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id_hotel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
