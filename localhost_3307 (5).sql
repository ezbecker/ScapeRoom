-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 25-Maio-2023 às 02:36
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
(25, 2, '00:40:00', 0),
(26, 2, '00:40:00', 0),
(27, 2, '00:40:00', 0),
(28, 2, '00:40:00', 0),
(29, 2, '00:40:00', 0),
(30, 2, '00:40:00', 0),
(31, 2, '00:40:00', 0),
(32, 2, '00:40:00', 0),
(33, 2, '00:40:00', 0),
(34, 2, '00:40:00', 0),
(35, 2, '00:40:00', 0),
(36, 2, '00:40:00', 0),
(37, 2, '00:40:00', 0),
(38, 2, '00:40:00', 0),
(39, 2, '00:40:00', 0),
(40, 2, '00:40:00', 0),
(41, 2, '00:40:00', 0),
(42, 2, '00:40:00', 0),
(43, 2, '00:40:00', 0),
(44, 2, '00:40:00', 0),
(45, 2, '00:40:00', 0),
(46, 2, '00:40:00', 0),
(47, 2, '00:40:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `puzzle`
--

CREATE TABLE `puzzle` (
  `idPuzzle` int(11) NOT NULL,
  `resposta` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `linkErro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `puzzle`
--

INSERT INTO `puzzle` (`idPuzzle`, `resposta`, `link`, `linkErro`) VALUES
(1, 'Q180TR4', 'http://localhost/scaperoom/view/slides.php?slide=9&idPuzzle=0', 'https://docs.google.com/presentation/d/1CXgvLcUBjJd_9u8_dqEA9Y2Lfhvqus2AF_I8m7umDAA/edit#slide=id.g1e282f51ef2_1_0'),
(2, '3425', 'https://docs.google.com/presentation/d/1CXgvLcUBjJd_9u8_dqEA9Y2Lfhvqus2AF_I8m7umDAA/edit#slide=id.g1e29e9b03de_0_0', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE `questao` (
  `idPuzzle` int(11) NOT NULL,
  `slide` int(11) NOT NULL,
  `pergunta` varchar(500) NOT NULL,
  `alternativa1` varchar(50) NOT NULL,
  `alternativa2` varchar(50) NOT NULL,
  `alternativa3` varchar(50) NOT NULL,
  `alternativa4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `questao`
--

INSERT INTO `questao` (`idPuzzle`, `slide`, `pergunta`, `alternativa1`, `alternativa2`, `alternativa3`, `alternativa4`) VALUES
(1, 6, 'Qual é o diagnóstico mais provável para um paciente de 45 anos que apresenta um nódulo indolor na região submandibular direita, com aumento progressivo há 6 meses? O exame de ultrassonografia mostra uma massa hipoecóica, bem delimitada, com calcificações internas e fluxo vascular periférico.\r\n', 'Cisto branquial', 'Carcinoma de glândula salivar', 'Linfoma', 'Lipoma'),
(1, 7, 'Qual é o diagnóstico mais provável para um paciente de 50 anos que apresenta tosse seca, dispneia e dor torácica há 3 semanas? O exame de radiografia de tórax mostra uma opacidade nodular no lobo superior direito, com bordas irregulares e halo de vidro fosco. O exame de tomografia computadorizada de tórax confirma a presença do nódulo e mostra também linfonodos mediastinais aumentados.\r\n', 'Tuberculose pulmonar', 'Câncer de pulmão', 'Granulomatose de Wegener', 'Aspergilose pulmonar'),
(1, 8, 'Qual é o diagnóstico mais provável para um paciente de 40 anos que apresenta dor abdominal intensa e contínua na fossa ilíaca direita, com irradiação para a região lombar direita, associada a náuseas e vômitos? O exame de ultrassonografia de abdômen mostra uma dilatação do ureter direito, com presença de um cálculo de 5 mm no seu terço distal. O exame de urina mostra hematúria microscópica e leucocitúria.\r\n', 'Colecistite aguda', 'Apendicite aguda', 'Cólica renal', 'Diverticulite aguda');

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
(2, 'larissa', 'larissapretto009w@gmail.com', '$2y$10$oDGVs9IkarqTXjamsrTe2eTTSt0lMRzKZu0dTz2xZOZmz22BHh9xa'),
(5, 'larissa', 'larissapretto009@gmail.com', '$2y$10$j6TE4MklQhiRISnMMs1q.udvBm.0qIa9eS6ufFA2zmultUgHW9nX.');

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
-- Índices para tabela `puzzle`
--
ALTER TABLE `puzzle`
  ADD PRIMARY KEY (`idPuzzle`);

--
-- Índices para tabela `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`slide`),
  ADD KEY `fk_puzzle` (`idPuzzle`);

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
  MODIFY `idPartida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `puzzle`
--
ALTER TABLE `puzzle`
  MODIFY `idPuzzle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `fk_puzzle` FOREIGN KEY (`idPuzzle`) REFERENCES `puzzle` (`idPuzzle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
