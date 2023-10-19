-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Fev-2023 às 14:57
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
-- Banco de dados: `eletrotech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `tipo` varchar(45) NOT NULL,
  `servico` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`id_agendamento`, `id_cliente`, `id_funcionario`, `data`, `tipo`, `servico`) VALUES
(77, 6, NULL, '2023-02-09', 'Manutenção', 'Instalação de quadros e painéis elétricos'),
(78, 7, NULL, '2023-02-23', 'Manutenção', 'Instalação de tomadas, interruptores e disjun'),
(79, 8, NULL, '2023-02-24', 'Manutenção', 'Instalação de sistemas de iluminação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinatura`
--

CREATE TABLE `assinatura` (
  `id_Assinatura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data` date NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `assinatura`
--

INSERT INTO `assinatura` (`id_Assinatura`, `id_cliente`, `data`, `tipo`, `valor`) VALUES
(36, 6, '0000-00-00', 'plano_individual', 0),
(43, 6, '0000-00-00', 'plano_mensal', 3451),
(44, 6, '0000-00-00', 'plano_individual', 0),
(45, 7, '0000-00-00', 'plano_individual', 0),
(46, 8, '0000-00-00', 'plano_mensal', 3451);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL COMMENT '159.689.936-00',
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `telefone`, `email`, `senha`, `rua`, `numero`, `cep`, `bairro`, `sexo`, `complemento`) VALUES
(2, 'Jorger', '123.456.789-10', '31 3030-4040', 'jorge@gmail.com', '$2y$10$8BaySKe0hhkO3ysIEIVQMey1vztpAMkxIusUDsb3VOMAn4LRpWfFi', 'Rua Geraldina de Almeida', '111', '31345323', 'Ibirapuera.', 'M', 'Casa'),
(6, 'Mariana', '112.345.678-91', '31 3535- 5656', 'marina@gmail.com', '$2y$10$zGkjtwWXVwWtGdAwHJDiyOxnaVaQ9JgVanf2mKG04qpCsgqI0FFTC', 'Rua Fraco sol', '232', '31456970', 'Inpiranga', 'F', 'Casa'),
(7, 'Fred', '233.000.555.60', '31 4040-1616', 'fred@gmail.com', '$2y$10$a9jl4v1p1YCASLDQVgEJjeA64pnoB3yTFLrNyjDRFFG8RyEqrjWfy', 'Rua Planeta Terra', '123', '31907543', 'Cion', 'M', 'Apartamento bloco 3 '),
(8, 'Faina', '098.765.432-12', '(31) 93333 - 2222', 'Fa@gmail.com', '$2y$10$ugL.rwvX04tQtTtEN4KG7uNt9FW0jsgXjc8tu11isOXf0qMuW9Uf.', 'Rua Beretina Ac', '223', '31345-678', 'Lamesa', 'F', 'Casa'),
(9, 'Thiago', '334.555.649-00', '(31) 93334 - 4444', 'Ti@gmail.com', '$2y$10$Rf.eU6a7J8R7y2etuKhY2.uhFTqVQJXM47.p57bV2YZKx/oU4666K', 'Rua Seila do NaoSei', '138', '31222-333', 'São Fransico', 'M', 'Apartamento Anda 10°'),
(11, 'Patricia', '111.222.776-33', '(31) 97764 - 4443', 'Pa@gmail.com', '$2y$10$52onRh7wnfx6ZsYcQ0DrmuAL0oIUy1bnNPRDMEcWS5NM3MIoI7UrS', 'Rua Alasca', '211', '31333-337', 'Marte do Ar', 'F', 'Casa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `idade` int(11) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `cpf`, `idade`, `telefone`, `email`, `senha`, `tipo`) VALUES
(1, 'Admin', '000.000.000-00', 23, '3100000000', 'adm@gmail.com', 'admadm123', 'adm'),
(6, 'Marcelo', '134.542.222.33', 26, '31 3023-2222', 'Ma@gmail.com', '123', 'funcionario'),
(7, 'Federico', '222.333.444.555-11', 48, '31 8080-7654', 'Fe@gmail.com', '123', 'funcionario'),
(8, 'José', '333.444.777-10', 42, '31 7070-7070', 'Jo@gmail.com', '123', 'funcionario'),
(9, 'Geraldo', '111.002.333-30', 64, '31 2032-3333', 'Ge@gmail.com', '123', 'funcionario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD UNIQUE KEY `id_agendamento_UNIQUE` (`id_agendamento`),
  ADD KEY `fk_cliente_has_funcionario_funcionario1_idx` (`id_funcionario`),
  ADD KEY `fk_cliente_has_funcionario_cliente_idx` (`id_cliente`);

--
-- Índices para tabela `assinatura`
--
ALTER TABLE `assinatura`
  ADD PRIMARY KEY (`id_Assinatura`),
  ADD UNIQUE KEY `id_Assinatura_UNIQUE` (`id_Assinatura`),
  ADD KEY `fk_Assinatura_cliente1_idx` (`id_cliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `telefone_UNIQUE` (`telefone`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `id_funcionario_UNIQUE` (`id_funcionario`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `telefone_UNIQUE` (`telefone`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de tabela `assinatura`
--
ALTER TABLE `assinatura`
  MODIFY `id_Assinatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_cliente_has_funcionario_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_has_funcionario_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `assinatura`
--
ALTER TABLE `assinatura`
  ADD CONSTRAINT `fk_Assinatura_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
