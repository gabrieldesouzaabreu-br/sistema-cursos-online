-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 18-Out-2018 às 20:27
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7323886_agendare`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(10) UNSIGNED NOT NULL,
  `turma_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `sexo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `naturalidade` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `altura` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `telefone_emergencia` int(11) DEFAULT NULL,
  `restricoes` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `crm` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `turma_id`, `usuario_id`, `sexo`, `naturalidade`, `altura`, `peso`, `telefone_emergencia`, `restricoes`, `crm`) VALUES
(6, 4, 16, 'Masculino', '34578', '45679', 45679, 5679, 'eqweqwe', '567890');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_tem_responsavel`
--

CREATE TABLE `aluno_tem_responsavel` (
  `aluno_id` int(10) UNSIGNED NOT NULL,
  `responsavel_id` int(10) UNSIGNED NOT NULL,
  `financeiro` int(11) DEFAULT NULL,
  `retirada` int(11) DEFAULT NULL,
  `parentesco` varchar(45) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `aluno_tem_responsavel`
--

INSERT INTO `aluno_tem_responsavel` (`aluno_id`, `responsavel_id`, `financeiro`, `retirada`, `parentesco`) VALUES
(6, 18, 0, 0, 'Pai');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diario_aluno`
--

CREATE TABLE `diario_aluno` (
  `id` int(10) UNSIGNED NOT NULL,
  `humor` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `lanche` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `almoço` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `lanche tarde` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `mamadeira` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `evacuacao` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `sono` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `aluno_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`, `descricao`) VALUES
(1, 'Matematica', 'Matematica'),
(2, 'Geografia', 'Geografia'),
(3, 'Português', 'Português');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE `escola` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `rua` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cidade` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `img` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `escola`
--

INSERT INTO `escola` (`id`, `nome`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `descricao`, `img`) VALUES
(1, 'Escola 1', '213423', 345679, '3568', '34679', '345689', '45689', '45789', '4578', ''),
(2, 'Escola 2', '12332', 2345, '34', '45', '45', '456', '45', '56', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(10) UNSIGNED NOT NULL,
  `mestre` int(10) UNSIGNED NOT NULL,
  `escravo` int(10) UNSIGNED NOT NULL,
  `controle` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `data` datetime NOT NULL,
  `status` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `mensagem` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tipo` varchar(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`id`, `mestre`, `escravo`, `controle`, `data`, `status`, `mensagem`, `tipo`) VALUES
(383, 2, 18, 'R', '2018-05-31 19:57:19', '1', 'Oi', 'R'),
(384, 2, 18, 'R', '2018-05-31 19:57:20', '1', 'Oi', 'R'),
(385, 10, 135, 'R', '2018-05-31 20:12:52', '0', 'Teste', 'R'),
(386, 10, 135, 'R', '2018-05-31 20:12:54', '0', 'Teste', 'R'),
(387, 2, 135, 'R', '2018-05-31 20:13:50', '1', 'Teste', 'R'),
(388, 2, 135, 'R', '2018-05-31 20:13:50', '1', 'Teste', 'R'),
(389, 2, 135, 'R', '2018-05-31 20:13:53', '1', 'Teste', 'R'),
(390, 2, 18, 'R', '2018-06-01 14:02:23', '1', 'Oi', 'R'),
(391, 2, 18, 'R', '2018-06-01 19:50:26', '1', 'A mais recente saída encontrada pela HBO para evitar que informações sobre a oitava e última temporada de Game of Thrones sejam divulgadas antes da hora pode parecer um pouco exagerada, embora também deva ser bastante eficaz.  \"Eles são muito, muito cuida', 'R'),
(392, 2, 18, 'R', '2018-06-01 19:50:29', '1', 'A mais recente saída encontrada pela HBO para evitar que informações sobre a oitava e última temporada de Game of Thrones sejam divulgadas antes da hora pode parecer um pouco exagerada, embora também deva ser bastante eficaz.  \"Eles são muito, muito cuida', 'R'),
(393, 10, 18, 'R', '2018-06-04 18:16:59', '0', 'Boa tarde', 'R'),
(394, 2, 18, 'E', '2018-06-07 16:47:36', '0', 'qwqeqe', 'R'),
(395, 2, 18, 'E', '2018-06-07 17:06:09', '0', '452324', 'R');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE `nota` (
  `id` int(10) UNSIGNED NOT NULL,
  `nota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `turno` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `numero_alunos` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `escola_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `nome`, `descricao`, `turno`, `numero_alunos`, `escola_id`) VALUES
(1, 'Não Matriculado', 'Não Matriculado', 'Não Matriculado', '0', 1),
(4, 'Turma A', 'desrição', 'Manhã', '1', 1),
(11, 'Turma B', 'descrição', 'Manhã', '0', 1),
(12, 'CSFX', '1º Ano', 'Manhã', '0', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_professor_disciplina`
--

CREATE TABLE `turma_professor_disciplina` (
  `id` int(11) NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `disciplina_id` int(10) UNSIGNED NOT NULL,
  `turma_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `login` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `escola_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `data_nascimento`, `cpf`, `email`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `login`, `senha`, `tipo`, `telefone`, `escola_id`) VALUES
(2, 'Admin', '1231-03-12', '12312313', 'admin@admin.com', 'rua exemplo', 123, 'complemento exemplo', 'bairro exemplo', 'cidade exemplo', 'Estado Exemplo', 'admin', '$2y$10$IKiUP3v/mGSEvj5T8XiPxOZcGjhEBryqQaDpJJn9VUq2NJIyxu3cK', 'admin', 1232, 1),
(10, 'Admin2', '3123-12-12', '123', 'admin@admin.com', '123123', 123123, '123123', '2467', '35yu', 'AC', 'admin2', '$2y$10$5ZFRAnZ//7/M6Go6RZFd3OqNpXY7IvjTnvEmBbG6516ex87mmPNzy', 'admin', 34567, 1),
(16, 'Aluno 1 escola 1', '0678-05-04', '', '', '45789', 45789, '456780', '45679', '56789', 'AC', '', '', 'aluno', 689, 1),
(18, 'Responsavel 1', '0123-03-12', '123', '123123', '123', 123, '123', '123', '123', 'AC', 'resp', '$2y$10$rbGSS1mxh8Y1jT.2wuxAzeUIhpXbnbMvZ5qsUf.vv6qCF1EY/0mUa', 'responsavel', 123, 1),
(21, 'PAtrick Monteiro', '1993-01-15', '00786147245', 'patrick@email.com', 'tv curuzu', 1253, '111', 'Centro', 'Belém', 'PA', 'patrick', '$2y$10$1NNOpj/2VFpKDrYsofMlcOpBxHa1EB2cvp7kjihHEmJVs0v3LFOi6', 'professor', 2147483647, 1),
(22, 'ggggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ggggg', '$2y$10$sG2HxFn/RAQrQFwfpXjp5uaPH/UOrC11Rwee2pbBIejDW1KNi1Oo.', 'admin', NULL, 1),
(23, 'leomendes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'leomendes', '$2y$10$XYQ4O3Y1gwGxESJW56VHcOr2EiC5zZtyU1tAmIW3599iN2LZ5oyuG', 'admin', NULL, 1),
(24, 'aluno1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aluno1', '$2y$10$VyxngTitsKRbFw4iU.lGMOz2xAf1e7Dj.52ns2JdKnhUU1qxKyM8q', 'admin', NULL, 1),
(25, 'leo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'leo', '$2y$10$0j.OQPZECKpZOksIRGhorOZ.WG6Dcz7U7BAX/9/uUH6my7DkOltOG', 'admin', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`,`turma_id`,`usuario_id`),
  ADD KEY `fk_aluno_turma1_idx` (`turma_id`),
  ADD KEY `fk_aluno_usuario1_idx` (`usuario_id`);

--
-- Indexes for table `aluno_tem_responsavel`
--
ALTER TABLE `aluno_tem_responsavel`
  ADD PRIMARY KEY (`aluno_id`,`responsavel_id`),
  ADD KEY `fk_aluno_has_responsavel_aluno1_idx` (`aluno_id`),
  ADD KEY `fk_aluno_has_responsavel_usuario1_idx` (`responsavel_id`);

--
-- Indexes for table `diario_aluno`
--
ALTER TABLE `diario_aluno`
  ADD PRIMARY KEY (`id`,`aluno_id`),
  ADD KEY `fk_diario_aluno_aluno1_idx` (`aluno_id`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`,`mestre`),
  ADD KEY `fk_mensagen_usuario1_idx` (`mestre`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`,`escola_id`),
  ADD KEY `fk_turma_escola1_idx` (`escola_id`);

--
-- Indexes for table `turma_professor_disciplina`
--
ALTER TABLE `turma_professor_disciplina`
  ADD PRIMARY KEY (`id`,`usuario_id`,`disciplina_id`,`turma_id`),
  ADD KEY `fk_turma_professor_disciplina_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_turma_professor_disciplina_disciplina1_idx` (`disciplina_id`),
  ADD KEY `fk_turma_professor_disciplina_turma1_idx` (`turma_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`,`escola_id`),
  ADD KEY `fk_usuario_escola1_idx` (`escola_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diario_aluno`
--
ALTER TABLE `diario_aluno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `turma_professor_disciplina`
--
ALTER TABLE `turma_professor_disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `aluno_tem_responsavel`
--
ALTER TABLE `aluno_tem_responsavel`
  ADD CONSTRAINT `fk_aluno_has_responsavel_aluno1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_has_responsavel_usuario1` FOREIGN KEY (`responsavel_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `diario_aluno`
--
ALTER TABLE `diario_aluno`
  ADD CONSTRAINT `fk_diario_aluno_aluno1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fk_mensagen_usuario1` FOREIGN KEY (`mestre`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_turma_escola1` FOREIGN KEY (`escola_id`) REFERENCES `escola` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma_professor_disciplina`
--
ALTER TABLE `turma_professor_disciplina`
  ADD CONSTRAINT `fk_turma_professor_disciplina_disciplina1` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_professor_disciplina_turma1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_professor_disciplina_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_escola1` FOREIGN KEY (`escola_id`) REFERENCES `escola` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
