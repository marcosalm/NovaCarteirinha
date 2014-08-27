-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 27-Ago-2014 às 14:20
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `carteirinha`
--
CREATE DATABASE IF NOT EXISTS `carteirinha` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `carteirinha`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email_address` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `tipo` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `account`
--

INSERT INTO `account` (`first_name`, `last_name`, `email_address`, `username`, `password`, `tipo`) VALUES
('Marcos', 'Almeida', 'marcos.almeida@uvv.br', 'admin', '202cb962ac59075b964b07152d234b70', 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_a_enviar`
--

CREATE TABLE IF NOT EXISTS `crt_a_enviar` (
  `id` tinyint(4) NOT NULL,
  `matricula` tinyint(4) NOT NULL,
  `nome` tinyint(4) NOT NULL,
  `situacao_cart` tinyint(4) NOT NULL,
  `versao_via` tinyint(4) NOT NULL,
  `lote` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_error`
--

CREATE TABLE IF NOT EXISTS `crt_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_error` varchar(15) NOT NULL,
  `descricao` text NOT NULL,
  `solucao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `crt_error`
--

INSERT INTO `crt_error` (`id`, `cod_error`, `descricao`, `solucao`) VALUES
(1, 'L001', 'Não é permitida a inclusão de Universitário sem a emissão de plástico.', 'O Tipo de Emissão deve estar de acordo com a Função do Movimento.'),
(2, 'L002', 'Número do CPF inválido ou não informado para vínculo 0, 2, 3, 4.', 'O número do CPF é obrigatório para os vínculos “0”, “2”, “3” ou “4”. Caso não haja, repetir o número de matrícula.'),
(3, 'L003', 'Código da Matrícula não informado.', 'Código de matrícula é obrigatório para vínculo “1” e Tipo de Embossamento “B”.'),
(4, 'L004', 'Reemissão de cartão não solicitada no banco.', 'A reemissão de cartões vinculados à conta corrente deve ser solicitada na agência detentora da conta do cliente. A IES somente deve enviar solicitações de reemissão de cartões vinculados se o pedido partiu do banco através do arquivo de retorno.'),
(5, 'L005', 'Solicitação de inclusão para universitário existente.', 'Enviar o campo Função do Movimento como “A” ou “N”.'),
(6, 'L006', 'Solicitação de alteração para universitário inexistente.', 'Enviar o campo Função do Movimento como “I”.'),
(7, 'L007', 'Solicitação de cancelamento para universitário inexistente.', 'Registro não existente. Não é necessário cancelar.'),
(8, 'L008', 'Inclusão de universitário duplicada na mesma remessa ou mesmo dia.', 'Só deve ser solicitada uma inclusão por universitário.'),
(9, 'L009', 'Reemissão de cartão vinculado à conta corrente, duplicada na mesma remessa ou no mesmo dia.', 'Só deve ser solicitada uma reemissão por universitário.'),
(10, 'L010', 'Em processamento financeiro dentro do Banco. Aguardar próximo dia útil para efetuar a operação.', 'Em processamento interno. Executar o comando novamente no próximo dia útil.'),
(11, 'D002', 'Função do movimento diferente de ''I'', ''A'' ou ''C''.', 'Função do movimento deve ser preenchido com ‘I’, ‘A’ ou ‘C’.'),
(12, 'D003', 'Tipo de emissão diferente de ''N'' ou ''E''.', 'O tipo de emissão deve estar de acordo com a Função do movimento:\r\nE – para emissão de plásticos e/ou alterações cadastrais (Função do movimento = “I” ou “A”).\r\nN – para alterações cadastrais que não emitam plástico (Função do movimento = “A” ou “C”).\r\n'),
(13, 'D004', 'Tipo de embossamento inválido (diferente de A, B ou C) ou não informado.', 'O tipo de embossamento deve ser preenchido com “A”, “B” ou “C”.'),
(14, 'D005', 'Nome do universitário não informado.', 'Preencher somente com os caracteres permitidos para Nomes (destacados no final da tabela).'),
(15, 'D008', 'Data de nascimento inválida ou não informada.', 'Preencher no formato AAAAMMDD (exemplo: 5 de dezembro de 2003: 20031205).'),
(16, 'D009', 'Código da nacionalidade inválida ou não informada.', 'O código da nacionalidade deve ser preenchido com “1”, “2” ou “3”.'),
(17, 'D010', 'Código do sexo diferente de ''M'' e ''F''.', 'O código do sexo deve ser preenchido com “M” ou “F”.'),
(18, 'D012', 'Logradouro não informado.', 'Preencher somente com os caracteres permitidos (destacados no final da tabela).'),
(19, 'D013', 'Número do logradouro não informado.', 'Preencher somente com os caracteres permitidos (destacados no final da tabela).'),
(20, 'D014', 'Bairro do logradouro não informado.', 'Preencher somente com os caracteres permitidos (destacados no final da tabela).'),
(21, 'D015', 'Município do logradouro não informado.', 'Preencher somente com os caracteres permitidos (destacados no final da tabela).'),
(22, 'D016', 'U.F. do logradouro não informada.', 'Preencher somente com os caracteres permitidos (destacados no final da tabela).'),
(23, 'D017', 'CEP do logradouro inválido ou não informado.', 'Preencher somente com caracteres numéricos.'),
(24, 'D018', 'País não informado.', 'Preencher somente com os caracteres permitidos (destacados no final da tabela).'),
(25, 'D019', 'Tipo do vínculo com a IES inválido ou não informado.', 'O tipo de vínculo deve ser preenchido com “0”, “1”, “2”, “3” ou “4”.'),
(26, 'D020', 'Código de barras inválido ou não informado.', 'Preencher somente com caracteres numéricos.'),
(27, 'D023', 'Solicitação negada, não existe recepção da foto.', 'Foto não presente na personalizadora. Aguarde a confirmação da foto. '),
(28, 'D025', 'Número do CNPJ inválido ou não informado no CHIP01.', 'CNPJ deve ser o mesmo informado para a área de Engenharia de Produtos do Banco.'),
(29, 'D026', 'Código da filial inválido ou não informado no CHIP01.', 'Filial deve ser a mesma informada para a área de Engenharia de Produtos do Banco.'),
(30, 'D027', 'Código de barras inválido ou não informado no CHIP01.', 'Preencher somente com caracteres numéricos.'),
(31, 'D028', 'Código da matrícula inválido ou não informado no CHIP01.', 'Preencher somente com caracteres numéricos.'),
(32, 'D029', 'Nome do universitário inválido ou não informado no CHIP01.', 'Preencher somente com os caracteres permitidos para Nomes (destacados no final da tabela).'),
(33, 'D031', 'Nome do universitário com caracteres inválidos.', 'Preencher somente com os caracteres permitidos para Nomes (destacados no final da tabela).'),
(34, 'D032', 'Campos alfanuméricos obrigatórios com caracteres inválidos.', 'Preencher somente com os caracteres permitidos (destacados no final da tabela).'),
(35, 'D033', 'Parâmetros administrativos não cadastrados para este CNPJ/ Filial/ Vínculo/ Tipo Cartão', 'Contate a área de Operações do Banco.'),
(36, 'D034', 'Código de estação dos parâmetros administrativos difere do cadastrado no Home Banking', 'Contate a área de Operações do Banco.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_erro_retorno`
--

CREATE TABLE IF NOT EXISTS `crt_erro_retorno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(15) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cod_barra` varchar(14) NOT NULL,
  `n_seg_remessa` varchar(11) DEFAULT NULL,
  `cod_error` varchar(15) NOT NULL,
  `vinculo` varchar(200) DEFAULT NULL,
  `nome` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula_UNIQUE` (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171716 ;

--
-- Extraindo dados da tabela `crt_erro_retorno`
--

INSERT INTO `crt_erro_retorno` (`id`, `matricula`, `cpf`, `cod_barra`, `n_seg_remessa`, `cod_error`, `vinculo`, `nome`) VALUES
(171715, 200000, '123456789', '123456789', '12', 'D023', '1', 'Blha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_fotos`
--

CREATE TABLE IF NOT EXISTS `crt_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(11) NOT NULL,
  `foto_path` text,
  `foto_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_historico`
--

CREATE TABLE IF NOT EXISTS `crt_historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_seg_remessa` int(11) NOT NULL,
  `total_enviado` int(11) NOT NULL,
  `total_validos` int(11) NOT NULL,
  `total_error` int(11) NOT NULL,
  `data_envio` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `n_seg_remessa_UNIQUE` (`n_seg_remessa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_options`
--

CREATE TABLE IF NOT EXISTS `crt_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(50) NOT NULL,
  `option_value` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_remessa`
--

CREATE TABLE IF NOT EXISTS `crt_remessa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `data_exp_rg` varchar(25) DEFAULT NULL,
  `org_exp_rg` varchar(25) NOT NULL,
  `uf_exp_rg` varchar(25) NOT NULL,
  `data_nasc` varchar(25) NOT NULL,
  `nascionalidade` varchar(25) NOT NULL,
  `sexo` varchar(25) NOT NULL,
  `est_civil` varchar(25) NOT NULL,
  `n_ddd` varchar(25) NOT NULL,
  `tipo_telefone` varchar(25) NOT NULL,
  `n_telefone` varchar(25) NOT NULL,
  `n_ramal` varchar(5) NOT NULL,
  `n_celular` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `logradouro` varchar(250) NOT NULL,
  `n_logradouro` varchar(25) NOT NULL,
  `comp_log` varchar(15) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `uf` varchar(25) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `cod_barras` varchar(25) NOT NULL,
  `vinculo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula_UNIQUE` (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1573461 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_status`
--

CREATE TABLE IF NOT EXISTS `crt_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(15) NOT NULL,
  `nome` text,
  `situacao_cart` varchar(20) DEFAULT NULL,
  `versao_via` int(11) DEFAULT NULL,
  `lote` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula_UNIQUE` (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1099994 ;

--
-- Extraindo dados da tabela `crt_status`
--

INSERT INTO `crt_status` (`id`, `matricula`, `nome`, `situacao_cart`, `versao_via`, `lote`) VALUES
(1099993, 123456, 'Blah', 'ERROR', 1, '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `crt_t_alunos`
--

CREATE TABLE IF NOT EXISTS `crt_t_alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `data_exp_rg` varchar(25) DEFAULT NULL,
  `org_exp_rg` varchar(25) DEFAULT NULL,
  `uf_exp_rg` varchar(25) DEFAULT NULL,
  `data_nasc` varchar(25) DEFAULT NULL,
  `nascionalidade` varchar(25) DEFAULT NULL,
  `sexo` varchar(25) DEFAULT NULL,
  `est_civil` varchar(25) DEFAULT NULL,
  `n_ddd` varchar(25) DEFAULT NULL,
  `tipo_telefone` varchar(25) DEFAULT NULL,
  `n_telefone` varchar(25) DEFAULT NULL,
  `n_ramal` varchar(5) DEFAULT NULL,
  `n_celular` varchar(25) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `logradouro` varchar(250) DEFAULT NULL,
  `n_logradouro` varchar(25) DEFAULT NULL,
  `comp_log` varchar(15) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `municipio` varchar(30) DEFAULT NULL,
  `uf` varchar(25) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `matricula` varchar(15) NOT NULL,
  `cod_barras` varchar(25) NOT NULL,
  `vinculo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula_UNIQUE` (`matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13850 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `new_view`
--

CREATE TABLE IF NOT EXISTS `new_view` (
  `MIN(id)` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phpjobscheduler`
--

CREATE TABLE IF NOT EXISTS `phpjobscheduler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scriptpath` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `name` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `time_interval` int(11) DEFAULT NULL,
  `fire_time` int(11) NOT NULL DEFAULT '0',
  `time_last_fired` int(11) DEFAULT NULL,
  `run_only_once` tinyint(1) NOT NULL DEFAULT '0',
  `currently_running` tinyint(1) NOT NULL DEFAULT '0',
  `paused` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fire_time` (`fire_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phpjobscheduler_logs`
--

CREATE TABLE IF NOT EXISTS `phpjobscheduler_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_added` int(11) DEFAULT NULL,
  `script` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `output` text COLLATE latin1_general_ci,
  `execution_time` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nome` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `nome`, `tipo`, `user_id`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', 'marcos.almeida@uvv.br', 'Marcos', 'Administrador', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `view_erro`
--

CREATE TABLE IF NOT EXISTS `view_erro` (
  `MIN(id)` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
