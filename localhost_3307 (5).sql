-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 19-Jun-2023 às 04:25
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
-- Estrutura da tabela `cenario2`
--

CREATE TABLE `cenario2` (
  `idPuzzle` int(11) NOT NULL,
  `paginaExame` int(11) NOT NULL,
  `paginaPac` int(11) NOT NULL,
  `pacienteNome` varchar(100) NOT NULL,
  `pacienteCodigo` int(11) NOT NULL,
  `exame` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cenario2`
--

INSERT INTO `cenario2` (`idPuzzle`, `paginaExame`, `paginaPac`, `pacienteNome`, `pacienteCodigo`, `exame`) VALUES
(3, 28, 38, 'maria', 1234, 'awww'),
(3, 29, 35, 'carlos', 2342, 'er'),
(3, 30, 39, 'ana', 2324, 'htf'),
(3, 31, 37, 'enzo', 4444, 'dgrg'),
(3, 32, 36, 'jose', 4534, 'trty');

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
  `inventario` int(11) NOT NULL,
  `terminou` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `partida`
--

INSERT INTO `partida` (`idPartida`, `idUsuario`, `tempo`, `inventario`, `terminou`) VALUES
(2, 2, '01:51:30', 0, 0),
(3, 2, '01:51:30', 0, 0),
(4, 2, '01:51:30', 0, 0),
(5, 2, '01:51:30', 0, 0),
(6, 2, '01:51:30', 0, 0),
(7, 2, '01:51:30', 0, 0),
(8, 2, '01:51:30', 0, 0),
(9, 2, '01:51:30', 0, 0),
(10, 2, '01:51:30', 0, 0),
(11, 2, '01:51:30', 0, 0),
(12, 2, '01:51:30', 0, 0),
(13, 2, '01:51:30', 0, 0),
(14, 2, '01:51:30', 0, 0),
(15, 2, '01:51:30', 0, 0),
(16, 2, '01:51:30', 0, 0),
(17, 2, '01:51:30', 0, 0),
(18, 2, '01:51:30', 0, 0),
(19, 2, '01:51:30', 0, 0),
(20, 2, '01:51:30', 0, 0),
(21, 2, '01:51:30', 0, 0),
(22, 2, '01:51:30', 0, 0),
(23, 2, '01:51:30', 0, 0),
(24, 2, '01:51:30', 0, 0),
(25, 2, '01:51:30', 0, 0),
(26, 2, '01:51:30', 0, 0),
(27, 2, '01:51:30', 0, 0),
(28, 2, '01:51:30', 0, 0),
(29, 2, '01:51:30', 0, 0),
(30, 2, '01:51:30', 0, 0),
(31, 2, '01:51:30', 0, 0),
(32, 2, '01:51:30', 0, 0),
(33, 2, '01:51:30', 0, 0),
(34, 2, '01:51:30', 0, 0),
(35, 2, '01:51:30', 0, 0),
(36, 2, '01:51:30', 0, 0),
(37, 2, '01:51:30', 0, 0),
(38, 2, '01:51:30', 0, 0),
(39, 2, '01:51:30', 0, 0),
(40, 2, '01:51:30', 0, 0),
(41, 2, '01:51:30', 0, 0),
(42, 2, '01:51:30', 0, 0),
(43, 2, '01:51:30', 0, 0),
(44, 2, '01:51:30', 0, 0),
(45, 2, '01:51:30', 0, 0),
(46, 2, '01:51:30', 0, 0),
(47, 2, '01:51:30', 0, 0),
(48, 2, '01:51:30', 0, 0),
(49, 2, '01:51:30', 0, 0),
(50, 2, '01:51:30', 0, 0),
(51, 2, '01:51:30', 0, 0),
(52, 2, '01:51:30', 0, 0),
(53, 2, '01:50:59', 0, 0),
(54, 2, '00:39:50', 0, 0),
(55, 2, '00:40:00', 0, 0),
(56, 2, '00:40:00', 0, 0),
(57, 2, '00:39:54', 0, 0),
(58, 2, '00:39:58', 0, 0),
(59, 2, '00:39:59', 0, 0),
(60, 2, '00:36:42', 0, 0),
(61, 2, '00:39:45', 0, 0),
(62, 2, '00:37:14', 0, 0),
(63, 2, '00:39:57', 0, 0),
(64, 2, '00:40:00', 0, 0),
(65, 2, '00:38:54', 0, 0),
(66, 2, '00:37:57', 0, 0),
(67, 2, '00:35:21', 0, 0),
(68, 2, '00:39:58', 0, 0),
(69, 2, '00:40:00', 0, 0),
(70, 2, '00:40:00', 0, 0),
(71, 2, '00:40:00', 0, 0),
(72, 2, '00:38:07', 0, 0),
(73, 2, '00:39:57', 0, 0),
(74, 2, '00:32:41', 0, 1),
(75, 2, '00:38:19', 0, 0),
(76, 2, '00:37:38', 0, 0),
(77, 2, '00:28:56', 0, 0),
(78, 2, '00:37:40', 0, 0),
(79, 2, '00:40:00', 0, 0),
(80, 2, '00:35:46', 0, 1),
(81, 2, '00:26:44', 0, 0),
(82, 2, '00:36:19', 0, 0),
(83, 2, '00:08:33', 0, 0),
(84, 2, '00:39:46', 0, 0),
(85, 2, '00:39:49', 0, 0),
(86, 2, '00:38:40', 0, 0),
(87, 2, '00:37:03', 0, 0),
(88, 2, '00:34:48', 0, 0),
(89, 2, '00:39:54', 0, 0),
(90, 2, '00:40:00', 0, 0),
(91, 2, '00:39:23', 0, 0),
(92, 2, '00:39:48', 0, 0),
(93, 2, '00:38:56', 0, 0),
(94, 2, '00:39:09', 0, 0),
(95, 2, '00:36:59', 0, 0),
(96, 2, '00:39:59', 0, 0),
(97, 2, '00:38:51', 0, 0),
(98, 2, '00:25:38', 0, 0),
(99, 2, '00:37:01', 0, 0),
(100, 2, '00:36:35', 0, 0),
(101, 2, '00:00:00', 0, 0),
(102, 2, '00:16:47', 0, 0),
(103, 2, '00:00:00', 0, 0),
(104, 2, '00:25:29', 0, 0),
(105, 2, '00:00:00', 0, 0),
(106, 2, '00:35:58', 0, 0),
(107, 2, '00:00:00', 0, 0),
(108, 2, '00:18:30', 0, 0),
(109, 2, '00:26:54', 0, 0),
(110, 2, '00:35:12', 0, 0),
(111, 2, '00:00:00', 0, 0),
(112, 2, '00:00:00', 0, 0),
(113, 2, '00:39:55', 0, 0),
(114, 2, '00:29:25', 0, 0),
(115, 2, '00:40:00', 0, 0),
(116, 2, '00:39:59', 0, 0),
(117, 2, '00:39:59', 0, 0),
(118, 2, '00:40:00', 0, 0),
(119, 2, '00:39:17', 0, 0),
(120, 2, '00:39:04', 0, 0),
(121, 2, '00:38:54', 0, 0),
(122, 2, '00:39:55', 0, 0),
(123, 2, '00:37:49', 0, 0),
(124, 2, '00:40:00', 0, 0),
(125, 2, '00:39:59', 0, 0),
(126, 2, '00:37:32', 0, 0),
(127, 2, '00:32:16', 0, 0),
(128, 2, '00:13:39', 0, 0),
(129, 2, '00:39:48', 0, 0),
(130, 2, '00:39:40', 0, 0),
(131, 2, '00:39:47', 0, 0),
(132, 2, '00:38:30', 0, 0),
(133, 2, '00:38:26', 0, 0),
(134, 2, '00:39:58', 0, 0),
(135, 2, '00:37:15', 0, 0),
(136, 2, '00:40:00', 0, 0),
(137, 2, '00:39:59', 0, 0),
(138, 2, '00:39:59', 0, 0),
(139, 2, '00:38:44', 0, 0),
(140, 2, '00:39:34', 0, 0),
(141, 2, '00:38:53', 0, 0),
(142, 2, '00:39:59', 0, 0),
(143, 2, '00:39:50', 0, 0),
(144, 2, '00:39:38', 0, 0),
(145, 2, '00:38:52', 0, 0),
(146, 2, '00:38:45', 0, 0),
(147, 2, '00:35:59', 0, 0),
(148, 2, '00:39:24', 0, 0),
(149, 2, '00:36:55', 0, 0),
(150, 2, '00:39:49', 0, 0),
(151, 2, '00:39:43', 0, 0),
(152, 2, '00:39:57', 0, 0),
(153, 2, '00:39:52', 0, 0),
(154, 2, '00:38:30', 0, 0),
(155, 2, '00:39:57', 0, 0),
(156, 2, '00:39:48', 0, 0),
(157, 2, '00:39:00', 0, 0),
(158, 2, '00:38:48', 0, 0),
(159, 2, '00:39:53', 0, 0),
(160, 2, '00:39:51', 0, 0),
(161, 2, '00:39:56', 0, 0),
(162, 2, '00:39:57', 0, 0),
(163, 2, '00:38:37', 0, 0),
(164, 2, '00:39:57', 0, 0),
(165, 2, '00:39:46', 0, 0),
(166, 2, '00:39:57', 0, 0),
(167, 2, '00:39:51', 0, 0),
(168, 2, '00:39:58', 0, 0),
(169, 2, '00:38:42', 0, 0),
(170, 2, '00:39:56', 0, 0),
(171, 2, '00:38:30', 0, 0),
(172, 2, '00:39:58', 0, 0),
(173, 2, '00:39:59', 0, 0),
(174, 2, '00:39:58', 0, 0),
(175, 2, '00:36:13', 0, 0),
(176, 2, '00:39:57', 0, 0),
(177, 2, '00:38:28', 0, 0),
(178, 2, '00:39:54', 0, 0),
(179, 2, '00:39:57', 0, 0),
(180, 2, '00:39:53', 0, 0),
(181, 2, '00:38:24', 0, 0),
(182, 2, '00:39:57', 0, 0),
(183, 2, '00:40:00', 0, 0),
(184, 2, '00:39:59', 0, 0),
(185, 2, '00:38:51', 0, 0),
(186, 2, '00:38:58', 0, 0),
(187, 2, '00:39:58', 0, 0),
(188, 2, '00:39:51', 0, 0),
(189, 2, '00:39:57', 0, 0),
(190, 2, '00:39:58', 0, 0),
(191, 2, '00:38:07', 0, 0),
(192, 2, '00:39:58', 0, 0),
(193, 2, '00:39:55', 0, 0),
(194, 2, '00:38:55', 0, 0),
(195, 2, '00:39:57', 0, 0),
(196, 2, '00:38:54', 0, 0),
(197, 2, '00:39:57', 0, 0),
(198, 2, '00:38:46', 0, 0),
(199, 2, '00:39:54', 0, 0),
(200, 2, '00:39:53', 0, 0),
(201, 2, '00:39:57', 0, 0),
(202, 2, '00:32:31', 0, 0),
(203, 2, '00:39:57', 0, 0),
(204, 2, '00:39:51', 0, 0),
(205, 2, '00:39:44', 0, 0),
(206, 2, '00:39:28', 0, 0),
(207, 2, '00:39:54', 0, 0),
(208, 2, '00:36:52', 0, 0),
(209, 2, '00:39:35', 0, 0),
(210, 2, '00:39:56', 0, 0),
(211, 2, '00:39:44', 0, 0),
(212, 2, '00:39:53', 0, 0),
(213, 2, '00:39:58', 0, 0),
(214, 2, '00:39:41', 0, 0),
(215, 2, '00:39:43', 0, 0),
(216, 2, '00:39:19', 0, 0),
(217, 2, '00:40:00', 0, 0),
(218, 2, '00:38:54', 0, 0),
(219, 2, '00:39:59', 0, 0),
(220, 2, '00:38:42', 0, 0),
(221, 2, '00:23:11', 0, 0),
(222, 2, '00:40:00', 0, 0),
(223, 2, '00:40:00', 0, 0),
(224, 2, '00:40:00', 0, 0),
(225, 2, '00:40:00', 0, 0),
(226, 2, '00:40:00', 0, 0),
(227, 2, '00:40:00', 0, 0),
(228, 2, '00:40:00', 0, 0),
(229, 2, '00:40:00', 0, 0),
(230, 2, '00:38:40', 0, 0),
(231, 2, '00:38:49', 0, 0),
(232, 2, '00:31:05', 0, 0),
(233, 2, '00:33:36', 0, 0),
(234, 2, '00:29:28', 0, 0),
(235, 2, '00:25:58', 0, 0),
(236, 2, '00:16:21', 1, 0),
(237, 2, '00:33:53', 0, 0),
(238, 2, '00:34:19', 2, 0),
(239, 2, '00:36:20', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `puzzle`
--

CREATE TABLE `puzzle` (
  `idPuzzle` int(11) NOT NULL,
  `resposta` varchar(50) NOT NULL,
  `resposta2` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `linkErro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `puzzle`
--

INSERT INTO `puzzle` (`idPuzzle`, `resposta`, `resposta2`, `link`, `linkErro`) VALUES
(1, 'Q180TR4', '0', 'http://localhost/scaperoom/view/game.php?pagina=9&idPuzzle=0', 'http://localhost/scaperoom/view/game.php?pagina=4&idPuzzle=1'),
(2, '3425', '0', 'http://localhost/scaperoom/view/game.php?pagina=22&idPuzzle=2', ''),
(3, '1234', '4321', '', '');

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
  ADD KEY `fk` (`idPuzzle`);

--
-- Índices para tabela `cenario2`
--
ALTER TABLE `cenario2`
  ADD KEY `fk_cenario2` (`idPuzzle`);

--
-- Índices para tabela `initialroom`
--
ALTER TABLE `initialroom`
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
  MODIFY `idPartida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT de tabela `puzzle`
--
ALTER TABLE `puzzle`
  MODIFY `idPuzzle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Limitadores para a tabela `cenario2`
--
ALTER TABLE `cenario2`
  ADD CONSTRAINT `fk_cenario2` FOREIGN KEY (`idPuzzle`) REFERENCES `puzzle` (`idPuzzle`);

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
