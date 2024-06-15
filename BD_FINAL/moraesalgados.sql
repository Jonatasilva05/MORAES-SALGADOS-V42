-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 07:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moraesalgados`
--

-- --------------------------------------------------------

--
-- Table structure for table `confirmed_orders`
--

CREATE TABLE `confirmed_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `quantity_type` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `flavor` varchar(50) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` enum('pending','accepted','generating','generated','out_for_delivery','delivered','cancelled') DEFAULT 'pending',
  `can_modify_cancel` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirmed_orders`
--

INSERT INTO `confirmed_orders` (`id`, `user_id`, `user_name`, `user_email`, `endereco`, `numero`, `bairro`, `cidade`, `product`, `quantity_type`, `quantity`, `flavor`, `order_date`, `status`, `can_modify_cancel`) VALUES
(1, 2, 'jhon', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Frango', 'unit', 1, 'Coxinha', '2024-06-15 00:54:46', 'delivered', 1),
(2, 2, 'jhon', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Bolinho', '2024-06-15 01:06:17', '', 1),
(3, 2, 'jhon', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'combo', 40, 'Risoles', '2024-06-15 01:06:26', '', 1),
(4, 2, 'jhon', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Bolinho', '2024-06-15 01:15:40', 'delivered', 1),
(5, 2, 'jhon', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Frango', 'combo', 20, 'Coxinha', '2024-06-15 01:29:14', 'delivered', 1),
(6, 2, 'jhon', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Bolinho', '2024-06-15 01:36:03', 'delivered', 1),
(8, 2, 'jhon', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Bolinho', '2024-06-15 01:42:09', 'delivered', 1),
(9, 2, 'jhon', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Risoles', '2024-06-15 01:47:28', 'delivered', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enderecos_entrega`
--

CREATE TABLE `enderecos_entrega` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `ponto_referencia` text DEFAULT NULL,
  `moradia` varchar(10) NOT NULL,
  `bloco` varchar(10) DEFAULT NULL,
  `numero_apt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enderecos_entrega`
--

INSERT INTO `enderecos_entrega` (`id`, `nome`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `telefone`, `whatsapp`, `ponto_referencia`, `moradia`, `bloco`, `numero_apt`) VALUES
(15, 'Jônatas de Moraes da Silva', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', '15906838', '1699999-9090', '1699999-9090', '', 'casa', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity_type` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `flavor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@example.com', '123456', 1),
(2, 'jhon', 'jonatasmoraes05@gmail.com', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `enderecos_entrega`
--
ALTER TABLE `enderecos_entrega`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enderecos_entrega`
--
ALTER TABLE `enderecos_entrega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  ADD CONSTRAINT `confirmed_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
