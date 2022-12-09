-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Dez-2022 às 20:14
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
-- Banco de dados: `db_container`
--
CREATE DATABASE IF NOT EXISTS `db_container` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_container`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nm_cliente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` VALUES
(1, 'Joao'),
(2, 'Maria'),
(3, 'José');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_container`
--

CREATE TABLE `tb_container` (
  `id_container` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cd_container` varchar(12) NOT NULL,
  `cd_tipo` int(11) NOT NULL,
  `nm_status` varchar(6) NOT NULL,
  `nm_categoria` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_container`
--

INSERT INTO `tb_container` VALUES
(2, 3, 'ABDC0000002', 40, 'Vazio', 'Exportação'),
(3, 2, 'ABDC0000003', 20, 'Cheio', 'Exportação'),
(6, 3, 'ABCD0000004', 20, 'Cheio', 'Exportação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_movimentacao_container`
--

CREATE TABLE `tb_movimentacao_container` (
  `id_movimentacao` int(11) NOT NULL,
  `id_container` int(11) NOT NULL,
  `dt_inicio` datetime NOT NULL,
  `dt_final` datetime NOT NULL,
  `nm_tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `tb_container`
--
ALTER TABLE `tb_container`
  ADD PRIMARY KEY (`id_container`),
  ADD KEY `fk_tb_container_tb_cliente_idx` (`id_cliente`);

--
-- Índices para tabela `tb_movimentacao_container`
--
ALTER TABLE `tb_movimentacao_container`
  ADD PRIMARY KEY (`id_movimentacao`),
  ADD KEY `fk_tb_movimentacao_container_tb_container1_idx` (`id_container`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_container`
--
ALTER TABLE `tb_container`
  MODIFY `id_container` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_movimentacao_container`
--
ALTER TABLE `tb_movimentacao_container`
  MODIFY `id_movimentacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_container`
--
ALTER TABLE `tb_container`
  ADD CONSTRAINT `fk_tb_container_tb_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_movimentacao_container`
--
ALTER TABLE `tb_movimentacao_container`
  ADD CONSTRAINT `fk_tb_movimentacao_container_tb_container1` FOREIGN KEY (`id_container`) REFERENCES `tb_container` (`id_container`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
