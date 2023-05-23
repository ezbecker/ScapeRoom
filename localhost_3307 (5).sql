-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 23-Maio-2023 às 04:55
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `scaperoom`
--
CREATE DATABASE IF NOT EXISTS `scaperoom` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `scaperoom`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `partida`
--

CREATE TABLE `partida` (
  `idPartida` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `tempo` time NOT NULL,
  `terminou` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `partida`
--

INSERT INTO `partida` (`idPartida`, `idUsuario`, `tempo`, `terminou`) VALUES
(2, 2, '00:40:00', 0),
(3, 2, '00:40:00', 0),
(4, 2, '00:40:00', 0),
(5, 2, '00:40:00', 0),
(6, 2, '00:40:00', 0),
(7, 2, '00:30:00', 0),
(8, 2, '00:30:00', 0),
(9, 2, '00:20:00', 1),
(10, 2, '00:40:00', 1),
(11, 2, '00:40:00', 0),
(12, 2, '00:40:00', 0),
(13, 2, '00:40:00', 0),
(14, 2, '00:40:00', 0),
(15, 2, '00:40:00', 0),
(16, 2, '00:40:00', 0),
(17, 2, '00:40:00', 0),
(18, 2, '00:40:00', 0),
(19, 2, '00:40:00', 0),
(20, 2, '00:40:00', 0),
(21, 2, '00:40:00', 0),
(22, 2, '00:40:00', 0),
(23, 2, '00:40:00', 0),
(24, 2, '00:40:00', 0),
(25, 2, '00:40:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `idPergunta` int(11) NOT NULL,
  `resposta` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `linkErro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`idPergunta`, `resposta`, `link`, `linkErro`) VALUES
(1, 'Q180TR4', 'http://localhost/scaperoom/view/slides.php?slide=8', 'https://docs.google.com/presentation/d/1CXgvLcUBjJd_9u8_dqEA9Y2Lfhvqus2AF_I8m7umDAA/edit#slide=id.g1e282f51ef2_1_0'),
(2, '3425', 'https://docs.google.com/presentation/d/1CXgvLcUBjJd_9u8_dqEA9Y2Lfhvqus2AF_I8m7umDAA/edit#slide=id.g1e29e9b03de_0_0', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `senha`) VALUES
(2, 'larissa', 'larissapretto009w@gmail.com', '$2y$10$oDGVs9IkarqTXjamsrTe2eTTSt0lMRzKZu0dTz2xZOZmz22BHh9xa');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`idPartida`),
  ADD KEY `fk_user` (`idUsuario`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`idPergunta`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `partida`
--
ALTER TABLE `partida`
  MODIFY `idPartida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `idPergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
