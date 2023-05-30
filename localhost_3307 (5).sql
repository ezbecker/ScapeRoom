-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 30-Maio-2023 às 20:05
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
-- Estrutura da tabela `cenario1`
--

CREATE TABLE `cenario1` (
  `idPuzzle` int(11) NOT NULL,
  `pagina` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `idade` int(11) NOT NULL,
  `sintomas` text NOT NULL,
  `tomografia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cenario1`
--

INSERT INTO `cenario1` (`idPuzzle`, `pagina`, `nome`, `idade`, `sintomas`, `tomografia`) VALUES
(2, 12, 'João Silva', 45, 'Dor no peito, falta de ar, tosse com sangue, perda de peso e fadiga', 'Tomografia computadorizada do tórax mostrou uma massa no lobo superior direito do pulmão, com linfonodos mediastinais aumentados e derrame pleural. Biópsia confirmou a presença de células malignas.'),
(2, 14, ' Pedro Oliveira', 67, 'Dor abdominal, icterícia, perda de apetite e emagrecimento', 'Ultrassonografia abdominal mostrou uma massa hipoecogênica na cabeça do pâncreas, com dilatação das vias biliares e do ducto pancreático. Tomografia computadorizada confirmou a presença de um tumor pancreático com invasão vascular e metástases hepáticas'),
(2, 17, 'Maria Santos', 32, 'Dor de cabeça, náusea, vômito, alteração da visão e convulsões', 'Ressonância magnética do crânio mostrou uma lesão expansiva no lobo temporal esquerdo, com efeito de massa e edema perilesional. Biópsia revelou um glioblastoma multiforme.'),
(2, 20, 'Ana Souza', 28, 'Dor e inchaço no joelho direito, dificuldade para caminhar e movimentar a articulação', 'Radiografia do joelho direito mostrou erosões ósseas, estreitamento do espaço articular e deformidade em valgo. Ressonância magnética evidenciou sinovite, derrame articular e lesões de cartilagem e menisco.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `initialroom`
--

CREATE TABLE `initialroom` (
  `idPuzzle` int(11) NOT NULL,
  `pagina` int(11) NOT NULL,
  `pergunta` varchar(500) NOT NULL,
  `alternativa1` varchar(50) NOT NULL,
  `alternativa2` varchar(50) NOT NULL,
  `alternativa3` varchar(50) NOT NULL,
  `alternativa4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `initialroom`
--

INSERT INTO `initialroom` (`idPuzzle`, `pagina`, `pergunta`, `alternativa1`, `alternativa2`, `alternativa3`, `alternativa4`) VALUES
(1, 6, 'Qual é o diagnóstico mais provável para um paciente de 45 anos que apresenta um nódulo indolor na região submandibular direita, com aumento progressivo há 6 meses? O exame de ultrassonografia mostra uma massa hipoecóica, bem delimitada, com calcificações internas e fluxo vascular periférico.\n', 'Cisto branquial', 'Carcinoma de glândula salivar', 'Linfoma', 'Lipoma'),
(1, 7, 'Qual é o diagnóstico mais provável para um paciente de 50 anos que apresenta tosse seca, dispneia e dor torácica há 3 semanas? O exame de radiografia de tórax mostra uma opacidade nodular no lobo superior direito, com bordas irregulares e halo de vidro fosco. O exame de tomografia computadorizada de tórax confirma a presença do nódulo e mostra também linfonodos mediastinais aumentados.\r\n', 'Tuberculose pulmonar', 'Câncer de pulmão', 'Granulomatose de Wegener', 'Aspergilose pulmonar'),
(1, 8, 'Qual é o diagnóstico mais provável para um paciente de 40 anos que apresenta dor abdominal intensa e contínua na fossa ilíaca direita, com irradiação para a região lombar direita, associada a náuseas e vômitos? O exame de ultrassonografia de abdômen mostra uma dilatação do ureter direito, com presença de um cálculo de 5 mm no seu terço distal. O exame de urina mostra hematúria microscópica e leucocitúria.\r\n', 'Colecistite aguda', 'Apendicite aguda', 'Cólica renal', 'Diverticulite aguda');

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
(2, 2, '01:51:30', 0),
(3, 2, '01:51:30', 0),
(4, 2, '01:51:30', 0),
(5, 2, '01:51:30', 0),
(6, 2, '01:51:30', 0),
(7, 2, '01:51:30', 0),
(8, 2, '01:51:30', 0),
(9, 2, '01:51:30', 0),
(10, 2, '01:51:30', 0),
(11, 2, '01:51:30', 0),
(12, 2, '01:51:30', 0),
(13, 2, '01:51:30', 0),
(14, 2, '01:51:30', 0),
(15, 2, '01:51:30', 0),
(16, 2, '01:51:30', 0),
(17, 2, '01:51:30', 0),
(18, 2, '01:51:30', 0),
(19, 2, '01:51:30', 0),
(20, 2, '01:51:30', 0),
(21, 2, '01:51:30', 0),
(22, 2, '01:51:30', 0),
(23, 2, '01:51:30', 0),
(24, 2, '01:51:30', 0),
(25, 2, '01:51:30', 0),
(26, 2, '01:51:30', 0),
(27, 2, '01:51:30', 0),
(28, 2, '01:51:30', 0),
(29, 2, '01:51:30', 0),
(30, 2, '01:51:30', 0),
(31, 2, '01:51:30', 0),
(32, 2, '01:51:30', 0),
(33, 2, '01:51:30', 0),
(34, 2, '01:51:30', 0),
(35, 2, '01:51:30', 0),
(36, 2, '01:51:30', 0),
(37, 2, '01:51:30', 0),
(38, 2, '01:51:30', 0),
(39, 2, '01:51:30', 0),
(40, 2, '01:51:30', 0),
(41, 2, '01:51:30', 0),
(42, 2, '01:51:30', 0),
(43, 2, '01:51:30', 0),
(44, 2, '01:51:30', 0),
(45, 2, '01:51:30', 0),
(46, 2, '01:51:30', 0),
(47, 2, '01:51:30', 0),
(48, 2, '01:51:30', 0),
(49, 2, '01:51:30', 0),
(50, 2, '01:51:30', 0),
(51, 2, '01:51:30', 0),
(52, 2, '01:51:30', 0),
(53, 2, '01:50:59', 0),
(54, 2, '00:39:50', 0),
(55, 2, '00:40:00', 0),
(56, 2, '00:40:00', 0),
(57, 2, '00:39:54', 0),
(58, 2, '00:39:58', 0),
(59, 2, '00:39:59', 0),
(60, 2, '00:36:42', 0),
(61, 2, '00:39:45', 0),
(62, 2, '00:37:14', 0),
(63, 2, '00:39:57', 0),
(64, 2, '00:40:00', 0),
(65, 2, '00:38:54', 0),
(66, 2, '00:37:57', 0),
(67, 2, '00:35:21', 0),
(68, 2, '00:39:58', 0),
(69, 2, '00:40:00', 0),
(70, 2, '00:40:00', 0),
(71, 2, '00:40:00', 0),
(72, 2, '00:38:07', 0),
(73, 2, '00:39:57', 0),
(74, 2, '00:32:41', 1),
(75, 2, '00:38:19', 0),
(76, 2, '00:37:38', 0),
(77, 2, '00:28:56', 0),
(78, 2, '00:37:40', 0),
(79, 2, '00:40:00', 0),
(80, 2, '00:35:46', 1),
(81, 2, '00:26:44', 0),
(82, 2, '00:36:19', 0),
(83, 2, '00:11:25', 0);

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
(1, 'Q180TR4', 'http://localhost/scaperoom/view/game.php?pagina=9&idPuzzle=0', ''),
(2, '3425', 'http://localhost/scaperoom/view/game.php?pagina=22&idPuzzle=2', '');

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
-- Índices para tabela `cenario1`
--
ALTER TABLE `cenario1`
  ADD PRIMARY KEY (`pagina`),
  ADD KEY `fk` (`idPuzzle`);

--
-- Índices para tabela `initialroom`
--
ALTER TABLE `initialroom`
  ADD PRIMARY KEY (`pagina`),
  ADD KEY `fk_puzzle` (`idPuzzle`);

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
  MODIFY `idPartida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
-- Limitadores para a tabela `cenario1`
--
ALTER TABLE `cenario1`
  ADD CONSTRAINT `fk` FOREIGN KEY (`idPuzzle`) REFERENCES `puzzle` (`idPuzzle`);

--
-- Limitadores para a tabela `initialroom`
--
ALTER TABLE `initialroom`
  ADD CONSTRAINT `fk_puzzle` FOREIGN KEY (`idPuzzle`) REFERENCES `puzzle` (`idPuzzle`);

--
-- Limitadores para a tabela `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
