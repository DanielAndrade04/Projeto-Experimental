-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/

-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `barbe_clientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) DEFAULT NULL,
  `description` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `start` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `color`, `start`) VALUES
(1, 'Gustavo Icaro', '(33) 99999-9999', '#FF4500', '2019-11-21 15:00:00'),
(2, 'Paulo Iss', '(33) 99999-9999', '#FFD700', '2019-11-30 15:00:00'),
(3, 'Renatinho', '(33) 99999-9999', '8B4513', '2019-11-23 15:00:00'),
(4, 'Icaro', '(33) 99999-9999', '#FF4500', '2019-11-21 17:00:00'),
(5, 'Vanio', '(33) 99999-9999', '#FFD700', '2019-11-22 15:00:00'),
(6, 'Dario', '(33) 99999-9999', '#228B22', '2019-11-25 13:00:00'),
(7, 'Igor', '(33) 99999-9999', '#A020F0', '2019-11-26 20:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
