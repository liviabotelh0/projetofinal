-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jun-2023 às 19:48
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_final`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `33`
--

CREATE TABLE `33` (
  `matematica` text NOT NULL,
  `portugues` text NOT NULL,
  `biologia` text NOT NULL,
  `historia` text NOT NULL,
  `geografia` text NOT NULL,
  `educação fisica` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `ID` int(11) NOT NULL,
  `nome` text NOT NULL,
  `numero_da_matricula` int(11) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `cpf` text NOT NULL,
  `telefone` text NOT NULL,
  `senha` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`ID`, `nome`, `numero_da_matricula`, `data_de_nascimento`, `cpf`, `telefone`, `senha`, `email`) VALUES
(1, 'Beatriz Cardoso Correia', 215432, '2006-09-13', '227.365.910-54', '18998654321', '123456', ''),
(2, 'Heitor Fontes Guimarães', 567842, '2007-01-10', '937.140.300-42', '18996543213', '123456', ''),
(3, 'Bernardo Pereira', 984582, '2006-08-14', '885.350.260-61', '18997543532', '123456', ''),
(4, 'Heloísa Siqueira', 965312, '2007-02-27', '473.440.580-81', '18996587412', '123456', ''),
(5, 'Maria Vitória Matos', 654782, '2006-10-25', '029.179.900-07', '18997856930', '123456', ''),
(6, 'Luísa Teixeira Valle', 654389, '2006-06-08', '518.494.420-61', '18998652545', '123456', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletim`
--

CREATE TABLE `boletim` (
  `ID` int(11) NOT NULL,
  `numero_da_matricula` int(11) NOT NULL,
  `educacaofisica` text NOT NULL,
  `matematica` text NOT NULL,
  `portugues` text NOT NULL,
  `biologia` text NOT NULL,
  `geografia` text NOT NULL,
  `historia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Extraindo dados da tabela `boletim`
--

INSERT INTO `boletim` (`ID`, `numero_da_matricula`, `educacaofisica`, `matematica`, `portugues`, `biologia`, `geografia`, `historia`) VALUES
(1, 215432, '9,0', '10,0', '8,0', '7,5', '8,5', '9,5'),
(2, 567842, '10', '7', '8,5', '8', '9', '7,5'),
(3, 984582, '9', '10', '10', '8', '9', '8'),
(4, 965312, '9', '6', '8', '7', '7,5', '7'),
(5, 654782, '8', '8', '9,5', '10', '8', '8,7'),
(6, 654389, '8', '9,5', '9', '7', '9', '10');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `boletim`
--
ALTER TABLE `boletim`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `boletim`
--
ALTER TABLE `boletim`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
