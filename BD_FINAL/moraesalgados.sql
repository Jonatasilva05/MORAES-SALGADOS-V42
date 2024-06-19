-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jun-2024 às 00:49
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `moraesalgados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirmed_orders`
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
  `status` enum('pending','accepted','generating','generated','out_for_delivery','delivered','cancelled','rejected') DEFAULT 'pending',
  `can_modify_cancel` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `confirmed_orders`
--

INSERT INTO `confirmed_orders` (`id`, `user_id`, `user_name`, `user_email`, `endereco`, `numero`, `bairro`, `cidade`, `product`, `quantity_type`, `quantity`, `flavor`, `order_date`, `status`, `can_modify_cancel`) VALUES
(21, 27, 'Jônatas', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Bolinho', '2024-06-18 16:02:11', 'cancelled', 1),
(22, 27, 'Jônatas', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Risoles', '2024-06-18 16:31:00', 'cancelled', 1),
(23, 27, 'Jônatas', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Bolinho', '2024-06-18 16:37:48', 'cancelled', 1),
(24, 27, 'Jônatas', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Bolinho', '2024-06-18 16:44:34', 'cancelled', 1),
(25, 27, 'Jônatas', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Bolinho', '2024-06-18 16:47:26', 'cancelled', 1),
(26, 27, 'Jônatas', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Presunto e Queijo', 'unit', 1, 'Risoles', '2024-06-18 17:03:03', 'rejected', 1),
(27, 27, 'Jônatas', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Salsicha Frita', 'unit', 1, 'Salsicha', '2024-06-18 17:03:09', 'delivered', 1),
(28, 27, 'Jônatas', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Croquete de Carne', 'unit', 1, 'Croquete', '2024-06-18 17:03:12', 'rejected', 1),
(29, 27, 'Jônatas', 'jonatasmoraes05@gmail.com', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', 'Frango', 'unit', 1, 'Coxinha', '2024-06-18 17:03:15', 'cancelled', 1),
(30, 29, 'renner', 'renner@gmail.com', 'rua dos reina', '985', 'sergio antonio corona', 'Santa Ernestina', 'Frango C/ Catupiry', 'unit', 1, 'Coxinha', '2024-06-18 19:38:48', 'rejected', 1),
(31, 29, 'renner', 'renner@gmail.com', 'rua dos reina', '985', 'sergio antonio corona', 'Santa Ernestina', 'Presunto e Queijo', 'combo', 90, 'Risoles', '2024-06-18 19:42:33', 'cancelled', 1),
(32, 29, 'renner', 'renner@gmail.com', 'rua dos reina', '985', 'sergio antonio corona', 'Santa Ernestina', 'Salsicha Frita', 'unit', 5, 'Salsicha', '2024-06-18 19:45:13', 'generating', 1),
(33, 29, 'renner', 'renner@gmail.com', 'rua dos reina', '985', 'sergio antonio corona', 'Santa Ernestina', 'Presunto e Queijo', 'unit', 2, 'Bolinho', '2024-06-18 19:45:37', 'delivered', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos_entrega`
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
  `numero_apt` varchar(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `enderecos_entrega`
--

INSERT INTO `enderecos_entrega` (`id`, `nome`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `telefone`, `whatsapp`, `ponto_referencia`, `moradia`, `bloco`, `numero_apt`, `user_id`) VALUES
(19, 'jhon', 'Rua Alderico Bussadori Filho', '206', 'Jardim Maria Luiza I', 'Taquaritinga', '15906838', '1699999999', '1699999999', '', 'apt', '33', '33', 27),
(20, 's', 'Rua Alderico Bussadori Filho', '4', 'Jardim Maria Luiza I', 'Taquaritinga', '15906838', '(16)996030585', '16996030585', '', 'apt', 'e4', '990', 28),
(21, 'renner', 'rua dos reina', '985', 'sergio antonio corona', 'Santa Ernestina', '15970000', '16996326681', '16996326681', '', 'casa', '', '0', 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity_type` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `flavor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'admin', 'admin@exemplo.com', '12345', 1),
(27, 'Jônatas', 'jonatasmoraes05@gmail.com', '123456', 0),
(28, 'teste', 'teste@gmail.com', '123456', 0),
(29, 'renner', 'renner@gmail.com', '12345678', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `enderecos_entrega`
--
ALTER TABLE `enderecos_entrega`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enderecos_entrega_ibfk_1` (`user_id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `enderecos_entrega`
--
ALTER TABLE `enderecos_entrega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `confirmed_orders`
--
ALTER TABLE `confirmed_orders`
  ADD CONSTRAINT `confirmed_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `enderecos_entrega`
--
ALTER TABLE `enderecos_entrega`
  ADD CONSTRAINT `enderecos_entrega_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
