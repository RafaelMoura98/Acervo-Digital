-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/05/2025 às 01:00
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `acervo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso_bd`
--

CREATE TABLE `curso_bd` (
  `id` int(11) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `curso_bd`
--

INSERT INTO `curso_bd` (`id`, `curso`, `data`) VALUES
(1, 'Administração', '2025-04-07 20:06:48'),
(2, 'Desenvolvimento de Sistemas', '2025-04-07 20:06:48'),
(3, 'Logística', '2025-04-07 20:06:48');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pi_bd`
--

CREATE TABLE `pi_bd` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `resumo` varchar(255) NOT NULL,
  `nome_pdf` varchar(255) NOT NULL,
  `curso` int(11) NOT NULL,
  `like_pi` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `pi_bd`
--

INSERT INTO `pi_bd` (`id`, `titulo`, `resumo`, `nome_pdf`, `curso`, `like_pi`, `ano`, `data`) VALUES
(2, 'Banco de Dados Avançado', 'Técnicas avançadas para modelagem de BD.', '/PI/bd_avancado.pdf', 2, 3, 2025, '2025-04-07 00:00:00'),
(3, 'Redes de Computadores', 'Fundamentos de redes e protocolos.', '/PI/redes_computadores.pdf', 2, 5, 2025, '2025-04-07 00:00:00'),
(4, 'Estruturas de Dados', 'Conceitos e implementações de estruturas.', '/PI/estruturas_dados.pdf', 2, 2, 2025, '2025-04-07 00:00:00'),
(6, 'Desenvolvimento Web', 'HTML, CSS e JavaScript para web.', '/arquivos/desenvolvimento_web.pdf', 2, 20, 2021, '2025-04-07 00:00:00'),
(7, 'Algoritmos e Lógica', 'Fundamentos de lógica de programação.', '/arquivos/algoritmos_logica.pdf', 2, 0, 2023, '2025-04-07 00:00:00'),
(8, 'Inteligência Artificial', 'Introdução ao aprendizado de máquina.', '/arquivos/ia_basico.pdf', 2, 0, 2025, '2025-04-07 00:00:00'),
(9, 'Engenharia de Software', 'Conceitos e práticas na engenharia de software.', '/PI/eng_software.pdf', 2, 0, 2024, '2025-04-07 00:00:00'),
(10, 'Gestão de Projetos TI', 'Gerenciamento de projetos em tecnologia.', '/arquivos/gestao_projetos_ti.pdf', 2, 0, 2025, '2025-04-07 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_bd`
--

CREATE TABLE `usuario_bd` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario_bd`
--

INSERT INTO `usuario_bd` (`id`, `nome`, `email`, `login`, `senha`, `data`) VALUES
(1, 'Administrador', 'adm1@email.com', 'adm1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-05-12 19:35:34');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `curso_bd`
--
ALTER TABLE `curso_bd`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pi_bd`
--
ALTER TABLE `pi_bd`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario_bd`
--
ALTER TABLE `usuario_bd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curso_bd`
--
ALTER TABLE `curso_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pi_bd`
--
ALTER TABLE `pi_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuario_bd`
--
ALTER TABLE `usuario_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
