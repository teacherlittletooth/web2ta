-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Maio-2022 às 19:27
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `cod` int(11) NOT NULL,
  `data_hora` datetime DEFAULT NULL,
  `itens` text DEFAULT NULL,
  `quant` int(11) DEFAULT NULL,
  `pag` varchar(20) DEFAULT NULL,
  `local` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`cod`, `data_hora`, `itens`, `quant`, `pag`, `local`) VALUES
(3, '2022-05-11 19:22:41', 'Pão, Mortadela, Maionese', 1, 'Boleto', 'Viamão'),
(4, '2022-05-11 18:31:31', 'Pão, Maionese, Ketchup, Milho, Ervilha, Salsicha', 3, 'Dinheiro', 'Alvorada'),
(5, '2022-06-11 17:44:21', 'Pão, Banana, Gemada', 5, 'Cartão', 'Porto Alegre'),
(7, '2022-05-17 16:38:38', 'Hamburguer, Pão com gergelim, Cebola, ', 3, 'Pix', 'Gravataí'),
(8, '2022-05-17 16:39:28', 'Pão com gergelim, Alface, Picles, ', 2, 'Dinheiro', 'Cachoeirinha'),
(9, '2022-05-19 14:25:59', 'Hamburguer, Queijo, Molho especial, ', 3, 'Cartão', 'Canoas'),
(10, '2022-05-19 15:27:33', 'Hamburguer, Molho especial, Cebola', 4, 'Pix', 'Alvorada'),
(11, '2022-05-24 14:21:54', 'Hamburguer, Pão com gergelim, Alface, Picles, ', 3, 'Cartão', 'Gravataí');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `nome`, `email`, `senha`) VALUES
(1, 'Paulo', 'paulo.andre@ibest.com', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
