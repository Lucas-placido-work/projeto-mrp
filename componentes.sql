-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/09/2024 às 22:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `componentes`
--
CREATE DATABASE IF NOT EXISTS `estoque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `estoque`;

CREATE TABLE `componentes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `produto` VARCHAR(50) NOT NULL,
  `nome_componente` VARCHAR(100) NOT NULL,
  `quantidade` BIGINT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `componentes` (`id`, `produto`, `nome_componente`, `quantidade`) VALUES
(1, 'Bicicleta', 'guidao', 10),
(2, 'Bicicleta', 'roda', 10),
(3, 'Bicicleta', 'quadro', 5),
(4, 'Computador', 'gabinete', 2),
(5, 'Computador', 'placa-mae', 5),
(6, 'Computador', 'memoria-ram', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
