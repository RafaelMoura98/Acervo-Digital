-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/02/2025 às 00:36
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
-- Banco de dados: `acervo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno_bd`
--

CREATE TABLE `aluno_bd` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` longtext DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ano_bd`
--

CREATE TABLE `ano_bd` (
  `id` int(11) NOT NULL,
  `ano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos_bd`
--

CREATE TABLE `arquivos_bd` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso_bd`
--

CREATE TABLE `curso_bd` (
  `id` int(11) NOT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor_bd`
--

CREATE TABLE `professor_bd` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` longtext DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro_bd`
--

CREATE TABLE `registro_bd` (
  `id_registro` int(11) NOT NULL,
  `fk_arquivos_bd_id` int(11) DEFAULT NULL,
  `fk_aluno_bd_id` int(11) DEFAULT NULL,
  `fk_curso_bd_id` int(11) DEFAULT NULL,
  `fk_professor_bd_id` int(11) DEFAULT NULL,
  `fk_ano_bd_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno_bd`
--
ALTER TABLE `aluno_bd`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ano_bd`
--
ALTER TABLE `ano_bd`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `arquivos_bd`
--
ALTER TABLE `arquivos_bd`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `curso_bd`
--
ALTER TABLE `curso_bd`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professor_bd`
--
ALTER TABLE `professor_bd`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `registro_bd`
--
ALTER TABLE `registro_bd`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `fk_registro_arquivos` (`fk_arquivos_bd_id`),
  ADD KEY `fk_registro_aluno` (`fk_aluno_bd_id`),
  ADD KEY `fk_registro_curso` (`fk_curso_bd_id`),
  ADD KEY `fk_registro_professor` (`fk_professor_bd_id`),
  ADD KEY `fk_registro_ano` (`fk_ano_bd_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno_bd`
--
ALTER TABLE `aluno_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ano_bd`
--
ALTER TABLE `ano_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `arquivos_bd`
--
ALTER TABLE `arquivos_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curso_bd`
--
ALTER TABLE `curso_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professor_bd`
--
ALTER TABLE `professor_bd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `registro_bd`
--
ALTER TABLE `registro_bd`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `registro_bd`
--
ALTER TABLE `registro_bd`
  ADD CONSTRAINT `fk_registro_aluno` FOREIGN KEY (`fk_aluno_bd_id`) REFERENCES `aluno_bd` (`id`),
  ADD CONSTRAINT `fk_registro_ano` FOREIGN KEY (`fk_ano_bd_id`) REFERENCES `ano_bd` (`id`),
  ADD CONSTRAINT `fk_registro_arquivos` FOREIGN KEY (`fk_arquivos_bd_id`) REFERENCES `arquivos_bd` (`id`),
  ADD CONSTRAINT `fk_registro_curso` FOREIGN KEY (`fk_curso_bd_id`) REFERENCES `curso_bd` (`id`),
  ADD CONSTRAINT `fk_registro_professor` FOREIGN KEY (`fk_professor_bd_id`) REFERENCES `professor_bd` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
