-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/12/2020 às 00:39
-- Versão do servidor: 8.0.20
-- Versão do PHP: 7.3.22-(to be removed in future macOS)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `upa-agendamento-prod`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `codigo_age` int NOT NULL,
  `status_age` int NOT NULL,
  `data_age` date NOT NULL,
  `hora_age` time NOT NULL,
  `med_codigo_age` int NOT NULL,
  `pac_codigo_age` int NOT NULL,
  `upa_codigo_age` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `codigo_esp` int NOT NULL,
  `nome_esp` varchar(100) NOT NULL,
  `descricao_esp` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `codigo_med` int NOT NULL,
  `nome_med` varchar(100) NOT NULL,
  `crm_med` varchar(15) NOT NULL,
  `data_nasc_med` date DEFAULT NULL,
  `endereco_med` varchar(200) NOT NULL,
  `telefone_med` varchar(15) NOT NULL,
  `email_med` varchar(100) NOT NULL,
  `esp_codigo_med` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `codigo_pac` int NOT NULL,
  `nome_pac` varchar(100) NOT NULL,
  `cpf_pac` varchar(11) NOT NULL,
  `data_nasc_pac` date DEFAULT NULL,
  `codigo_sus_pac` varchar(16) NOT NULL,
  `telefone_pac` varchar(15) NOT NULL,
  `endereco_pac` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `upa`
--

CREATE TABLE `upa` (
  `codigo_upa` int NOT NULL,
  `nome_upa` varchar(100) NOT NULL,
  `endereco_upa` varchar(200) NOT NULL,
  `telefone_upa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usu` int NOT NULL,
  `login_usu` varchar(30) NOT NULL,
  `senha_usu` varchar(40) NOT NULL,
  `nome_usu` varchar(100) NOT NULL,
  `data_nasc_usu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`codigo_age`),
  ADD KEY `fk_agendamento_medico_idx` (`med_codigo_age`),
  ADD KEY `fk_agendamento_paciente1_idx` (`pac_codigo_age`),
  ADD KEY `fk_agendamento_upa1_idx` (`upa_codigo_age`);

--
-- Índices de tabela `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`codigo_esp`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`codigo_med`),
  ADD KEY `fk_medico_especialidade1_idx` (`esp_codigo_med`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`codigo_pac`);

--
-- Índices de tabela `upa`
--
ALTER TABLE `upa`
  ADD PRIMARY KEY (`codigo_upa`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_usu`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `codigo_age` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `codigo_esp` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `codigo_med` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `codigo_pac` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `upa`
--
ALTER TABLE `upa`
  MODIFY `codigo_upa` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo_usu` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_medico` FOREIGN KEY (`med_codigo_age`) REFERENCES `medico` (`codigo_med`),
  ADD CONSTRAINT `fk_agendamento_paciente1` FOREIGN KEY (`pac_codigo_age`) REFERENCES `paciente` (`codigo_pac`),
  ADD CONSTRAINT `fk_agendamento_upa1` FOREIGN KEY (`upa_codigo_age`) REFERENCES `upa` (`codigo_upa`);

--
-- Restrições para tabelas `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `fk_medico_especialidade1` FOREIGN KEY (`esp_codigo_med`) REFERENCES `especialidade` (`codigo_esp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
