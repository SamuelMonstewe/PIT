-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Set-2023 às 23:08
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pit`
--
CREATE DATABASE IF NOT EXISTS `pit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pit`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `idade` int(11) NOT NULL,
  `escola` varchar(150) NOT NULL,
  `sexo` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

DROP TABLE IF EXISTS `escolas`;
CREATE TABLE IF NOT EXISTS `escolas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `escolas`
--

INSERT INTO `escolas` (`id`, `nome`) VALUES(1, 'ESCOLA MUNICIPAL ACADÊMICO VIVALDI MOREIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(2, 'ESCOLA MUNICIPAL ADAUTO LÚCIO CARDOSO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(3, 'ESCOLA MUNICIPAL AGENOR ALVES DE CARVALHO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(4, 'ESCOLA MUNICIPAL AIRES DA MATA MACHADO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(5, 'ESCOLA MUNICIPAL AMÉRICO RENÊ GIANNETTI');
INSERT INTO `escolas` (`id`, `nome`) VALUES(6, 'ESCOLA MUNICIPAL ANA ALVES TEIXEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(7, 'ESCOLA MUNICIPAL ANÍSIO TEIXEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(8, 'ESCOLA MUNICIPAL ANNE FRANK');
INSERT INTO `escolas` (`id`, `nome`) VALUES(9, 'ESCOLA MUNICIPAL ANTÔNIA FERREIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(10, 'ESCOLA MUNICIPAL ANTÔNIO ALEIXO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(11, 'ESCOLA MUNICIPAL ANTÔNIO GOMES HORTA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(12, 'ESCOLA MUNICIPAL ANTÔNIO MOURÃO GUIMARÃES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(13, 'ESCOLA MUNICIPAL ANTÔNIO SALLES BARBOSA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(14, 'ESCOLA MUNICIPAL ARMANDO ZILLER');
INSERT INTO `escolas` (`id`, `nome`) VALUES(15, 'ESCOLA MUNICIPAL ARTHUR GUIMARÃES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(16, 'ESCOLA MUNICIPAL AUGUSTA MEDEIROS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(17, 'ESCOLA MUNICIPAL AURÉLIO BUARQUE DE HOLANDA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(18, 'ESCOLA MUNICIPAL AURÉLIO PIRES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(19, 'ESCOLA MUNICIPAL BELO HORIZONTE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(20, 'ESCOLA MUNICIPAL BENJAMIM JACOB');
INSERT INTO `escolas` (`id`, `nome`) VALUES(21, 'ESCOLA MUNICIPAL CAIO LÍBANO SOARES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(22, 'ESCOLA MUNICIPAL CARLOS DRUMMOND DE ANDRADE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(23, 'ESCOLA MUNICIPAL CARMELITA CARVALHO GARCIA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(24, 'ESCOLA MUNICIPAL CIAC LUCAS MONTEIRO MACHADO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(25, 'ESCOLA MUNICIPAL CÔNEGO RAIMUNDO TRINDADE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(26, 'ESCOLA MUNICIPAL CÔNEGO SEQUEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(27, 'ESCOLA MUNICIPAL CÔNSUL ANTÔNIO CADAR');
INSERT INTO `escolas` (`id`, `nome`) VALUES(28, 'ESCOLA MUNICIPAL CORA CORALINA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(29, 'ESCOLA MUNICIPAL DA VILA PINHO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(30, 'ESCOLA MUNICIPAL DE ENSINO ESPECIAL DO BAIRRO VENDA NOVA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(31, 'ESCOLA MUNICIPAL DE ENSINO ESPECIAL FREI LEOPOLDO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(32, 'ESCOLA MUNICIPAL DEPUTADO MILTON SALLES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(33, 'ESCOLA MUNICIPAL DEPUTADO RENATO AZEREDO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(34, 'ESCOLA MUNICIPAL DESEMBARGADOR LORETO RIBEIRO DE ABREU');
INSERT INTO `escolas` (`id`, `nome`) VALUES(35, 'ESCOLA MUNICIPAL DINORAH MAGALHÃES FABRI');
INSERT INTO `escolas` (`id`, `nome`) VALUES(36, 'ESCOLA MUNICIPAL DOM BOSCO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(37, 'ESCOLA MUNICIPAL DOM JAIME DE BARROS CÂMARA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(38, 'ESCOLA MUNICIPAL DOM ORIONE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(39, 'ESCOLA MUNICIPAL DORA TOMICH LAENDER');
INSERT INTO `escolas` (`id`, `nome`) VALUES(40, 'ESCOLA MUNICIPAL DOUTOR JÚLIO SOARES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(41, 'ESCOLA MUNICIPAL DR. JOSÉ XAVIER NOGUEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(42, 'ESCOLA MUNICIPAL DULCE MARIA HOMEM');
INSERT INTO `escolas` (`id`, `nome`) VALUES(43, 'ESCOLA MUNICIPAL EDITH PIMENTA DA VEIGA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(44, 'ESCOLA MUNICIPAL ELISA BUZELIN');
INSERT INTO `escolas` (`id`, `nome`) VALUES(45, 'ESCOLA MUNICIPAL ELOY HERALDO LIMA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(46, 'ESCOLA MUNICIPAL EMÍDIO BERUTTO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(47, 'ESCOLA MUNICIPAL FERNANDO DIAS COSTA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(48, 'ESCOLA MUNICIPAL FLORESTAN FERNANDES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(49, 'ESCOLA MUNICIPAL FRANCISCA ALVES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(50, 'ESCOLA MUNICIPAL FRANCISCA DE PAULA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(51, 'ESCOLA MUNICIPAL FRANCISCO BRESSANE DE AZEVEDO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(52, 'ESCOLA MUNICIPAL FRANCISCO CAMPOS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(53, 'ESCOLA MUNICIPAL FRANCISCO MAGALHÃES GOMES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(54, 'ESCOLA MUNICIPAL GEORGE RICARDO SALUM');
INSERT INTO `escolas` (`id`, `nome`) VALUES(55, 'ESCOLA MUNICIPAL GERALDO TEIXEIRA DA COSTA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(56, 'ESCOLA MUNICIPAL GOVERNADOR CARLOS LACERDA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(57, 'ESCOLA MUNICIPAL GOVERNADOR OZANAM COELHO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(58, 'ESCOLA MUNICIPAL GRACY VIANNA LAGE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(59, 'ESCOLA MUNICIPAL HELENA ANTIPOFF');
INSERT INTO `escolas` (`id`, `nome`) VALUES(60, 'ESCOLA MUNICIPAL HÉLIO PELLEGRINO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(61, 'ESCOLA MUNICIPAL HENRIQUETA LISBOA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(62, 'ESCOLA MUNICIPAL HERBERT JOSÉ DE SOUZA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(63, 'ESCOLA MUNICIPAL HILDA RABELLO MATTA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(64, 'ESCOLA MUNICIPAL HONORINA DE BARROS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(65, 'ESCOLA MUNICIPAL HONORINA RABELLO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(66, 'ESCOLA MUNICIPAL HUGO PINHEIRO SOARES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(67, 'ESCOLA MUNICIPAL HUGO WERNECK');
INSERT INTO `escolas` (`id`, `nome`) VALUES(68, 'ESCOLA MUNICIPAL IGNÁCIO DE ANDRADE MELO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(69, 'ESCOLA MUNICIPAL IMACO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(70, 'ESCOLA MUNICIPAL ISRAEL PINHEIRO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(71, 'ESCOLA MUNICIPAL JARDIM FELICIDADE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(72, 'ESCOLA MUNICIPAL JARDIM LEBLON');
INSERT INTO `escolas` (`id`, `nome`) VALUES(73, 'ESCOLA MUNICIPAL JARDIM VITÓRIA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(74, 'ESCOLA MUNICIPAL JOÃO DO PATROCÍNIO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(75, 'ESCOLA MUNICIPAL JOÃO PINHEIRO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(76, 'ESCOLA MUNICIPAL JOAQUIM DOS SANTOS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(77, 'ESCOLA MUNICIPAL JONAS BARCELLOS CORRÊA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(78, 'ESCOLA MUNICIPAL JOSÉ DE CALASANZ');
INSERT INTO `escolas` (`id`, `nome`) VALUES(79, 'ESCOLA MUNICIPAL JOSÉ MADUREIRA HORTA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(80, 'ESCOLA MUNICIPAL JOSÉ MARIA ALKMIM');
INSERT INTO `escolas` (`id`, `nome`) VALUES(81, 'ESCOLA MUNICIPAL JOSÉ MARIA DOS MARES GUIA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(82, 'ESCOLA MUNICIPAL JOSEFINA SOUZA LIMA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(83, 'ESCOLA MUNICIPAL JÚLIA PARAÍSO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(84, 'ESCOLA MUNICIPAL LEVINDO LOPES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(85, 'ESCOLA MUNICIPAL LÍDIA ANGÉLICA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(86, 'ESCOLA MUNICIPAL LUIGI TONIOLO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(87, 'ESCOLA MUNICIPAL LUIZ GATTI');
INSERT INTO `escolas` (`id`, `nome`) VALUES(88, 'ESCOLA MUNICIPAL LUIZ GONZAGA JÚNIOR');
INSERT INTO `escolas` (`id`, `nome`) VALUES(89, 'ESCOLA MUNICIPAL MAGALHÃES DRUMOND');
INSERT INTO `escolas` (`id`, `nome`) VALUES(90, 'ESCOLA MUNICIPAL MARCONI');
INSERT INTO `escolas` (`id`, `nome`) VALUES(91, 'ESCOLA MUNICIPAL MARIA DA ASSUNÇÃO DE MARCO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(92, 'ESCOLA MUNICIPAL MARIA DAS NEVES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(93, 'ESCOLA MUNICIPAL MARIA DE MAGALHÃES PINTO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(94, 'ESCOLA MUNICIPAL MARIA DE REZENDE COSTA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(95, 'ESCOLA MUNICIPAL MARIA SILVEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(96, 'ESCOLA MUNICIPAL MÁRIO MOURÃO FILHO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(97, 'ESCOLA MUNICIPAL MARLENE PEREIRA RANCANTE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(98, 'ESCOLA MUNICIPAL MESTRE ATAÍDE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(99, 'ESCOLA MUNICIPAL MESTRE PARANHOS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(100, 'ESCOLA MUNICIPAL MILTON CAMPOS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(101, 'ESCOLA MUNICIPAL MINERVINA AUGUSTA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(102, 'ESCOLA MUNICIPAL MONSENHOR ARTUR DE OLIVEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(103, 'ESCOLA MUNICIPAL MONSENHOR JOÃO RODRIGUES DE OLIVEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(104, 'ESCOLA MUNICIPAL MONTEIRO LOBATO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(105, 'ESCOLA MUNICIPAL MOYSÉS KALIL');
INSERT INTO `escolas` (`id`, `nome`) VALUES(106, 'ESCOLA MUNICIPAL MURILO RUBIÃO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(107, 'ESCOLA MUNICIPAL NOSSA SENHORA DO AMPARO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(108, 'ESCOLA MUNICIPAL OSWALDO CRUZ');
INSERT INTO `escolas` (`id`, `nome`) VALUES(109, 'ESCOLA MUNICIPAL OSWALDO FRANÇA JÚNIOR');
INSERT INTO `escolas` (`id`, `nome`) VALUES(110, 'ESCOLA MUNICIPAL PADRE EDEIMAR MASSOTE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(111, 'ESCOLA MUNICIPAL PADRE FLÁVIO GIAMMETTA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(112, 'ESCOLA MUNICIPAL PADRE FRANCISCO CARVALHO MOREIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(113, 'ESCOLA MUNICIPAL PADRE GUILHERME PETERS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(114, 'ESCOLA MUNICIPAL PADRE HENRIQUE BRANDÃO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(115, 'ESCOLA MUNICIPAL PADRE MARZANO MATIAS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(116, 'ESCOLA MUNICIPAL PAULO MENDES CAMPOS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(117, 'ESCOLA MUNICIPAL PEDRO ALEIXO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(118, 'ESCOLA MUNICIPAL PEDRO NAVA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(119, 'ESCOLA MUNICIPAL PÉRSIO PEREIRA PINTO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(120, 'ESCOLA MUNICIPAL POLO DE EDUCAÇÃO INTEGRADA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(121, 'ESCOLA MUNICIPAL PREFEITO AMINTHAS DE BARROS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(122, 'ESCOLA MUNICIPAL PREFEITO OSWALDO PIERUCCETTI');
INSERT INTO `escolas` (`id`, `nome`) VALUES(123, 'ESCOLA MUNICIPAL PREFEITO SOUZA LIMA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(124, 'ESCOLA MUNICIPAL PRESIDENTE ITAMAR FRANCO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(125, 'ESCOLA MUNICIPAL PRESIDENTE JOÃO PESSOA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(126, 'ESCOLA MUNICIPAL PRESIDENTE TANCREDO NEVES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(127, 'ESCOLA MUNICIPAL PROFESSOR AMILCAR MARTINS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(128, 'ESCOLA MUNICIPAL PROFESSOR CLÁUDIO BRANDÃO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(129, 'ESCOLA MUNICIPAL PROFESSOR DANIEL ALVARENGA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(130, 'ESCOLA MUNICIPAL PROFESSOR DOMICIANO VIEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(131, 'ESCOLA MUNICIPAL PROFESSOR EDGAR DA MATTA MACHADO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(132, 'ESCOLA MUNICIPAL PROFESSOR EDSON PISANI');
INSERT INTO `escolas` (`id`, `nome`) VALUES(133, 'ESCOLA MUNICIPAL PROFESSOR HILTON ROCHA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(134, 'ESCOLA MUNICIPAL PROFESSOR JOÃO CAMILO DE OLIVEIRA TORRES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(135, 'ESCOLA MUNICIPAL PROFESSOR LOURENÇO DE OLIVEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(136, 'ESCOLA MUNICIPAL PROFESSOR MÁRIO WERNECK');
INSERT INTO `escolas` (`id`, `nome`) VALUES(137, 'ESCOLA MUNICIPAL PROFESSOR MELLO CANÇADO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(138, 'ESCOLA MUNICIPAL PROFESSOR MILTON LAGE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(139, 'ESCOLA MUNICIPAL PROFESSOR MOACYR ANDRADE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(140, 'ESCOLA MUNICIPAL PROFESSOR PAULO FREIRE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(141, 'ESCOLA MUNICIPAL PROFESSOR PEDRO GUERRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(142, 'ESCOLA MUNICIPAL PROFESSOR TABAJARA PEDROSO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(143, 'ESCOLA MUNICIPAL PROFESSORA ACIDÁLIA LOTT');
INSERT INTO `escolas` (`id`, `nome`) VALUES(144, 'ESCOLA MUNICIPAL PROFESSORA ALCIDA TORRES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(145, 'ESCOLA MUNICIPAL PROFESSORA ALICE NACIF');
INSERT INTO `escolas` (`id`, `nome`) VALUES(146, 'ESCOLA MUNICIPAL PROFESSORA CONSUELITA CÂNDIDA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(147, 'ESCOLA MUNICIPAL PROFESSORA EFIGÊNIA VIDIGAL');
INSERT INTO `escolas` (`id`, `nome`) VALUES(148, 'ESCOLA MUNICIPAL PROFESSORA ELEONORA PIERUCCETTI');
INSERT INTO `escolas` (`id`, `nome`) VALUES(149, 'ESCOLA MUNICIPAL PROFESSORA HELENA ABDALLA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(150, 'ESCOLA MUNICIPAL PROFESSORA ISAURA SANTOS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(151, 'ESCOLA MUNICIPAL PROFESSORA MARIA MAZARELLO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(152, 'ESCOLA MUNICIPAL PROFESSORA MARIA MODESTA CRAVO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(153, 'ESCOLA MUNICIPAL PROFESSORA ONDINA NOBRE');
INSERT INTO `escolas` (`id`, `nome`) VALUES(154, 'ESCOLA MUNICIPAL RUI DA COSTA VAL');
INSERT INTO `escolas` (`id`, `nome`) VALUES(155, 'ESCOLA MUNICIPAL SALGADO FILHO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(156, 'ESCOLA MUNICIPAL SANTA TEREZINHA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(157, 'ESCOLA MUNICIPAL SANTO ANTÔNIO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(158, 'ESCOLA MUNICIPAL SANTOS DUMONT');
INSERT INTO `escolas` (`id`, `nome`) VALUES(159, 'ESCOLA MUNICIPAL SEBASTIANA NOVAIS');
INSERT INTO `escolas` (`id`, `nome`) VALUES(160, 'ESCOLA MUNICIPAL SEBASTIÃO GUILHERME DE OLIVEIRA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(161, 'ESCOLA MUNICIPAL SECRETÁRIO HUMBERTO ALMEIDA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(162, 'ESCOLA MUNICIPAL SENADOR LEVINDO COELHO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(163, 'ESCOLA MUNICIPAL SÉRGIO MIRANDA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(164, 'ESCOLA MUNICIPAL SOBRAL PINTO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(165, 'ESCOLA MUNICIPAL SOLAR RUBI');
INSERT INTO `escolas` (`id`, `nome`) VALUES(166, 'ESCOLA MUNICIPAL TANCREDO PHIDEAS GUIMARÃES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(167, 'ESCOLA MUNICIPAL TENENTE MANOEL MAGALHÃES PENIDO');
INSERT INTO `escolas` (`id`, `nome`) VALUES(168, 'ESCOLA MUNICIPAL THEOMAR DE CASTRO ESPÍNDOLA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(169, 'ESCOLA MUNICIPAL TRISTÃO DA CUNHA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(170, 'ESCOLA MUNICIPAL ULYSSES GUIMARÃES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(171, 'ESCOLA MUNICIPAL UNIÃO COMUNITÁRIA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(172, 'ESCOLA MUNICIPAL VICENTE GUIMARÃES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(173, 'ESCOLA MUNICIPAL VILA FAZENDINHA');
INSERT INTO `escolas` (`id`, `nome`) VALUES(174, 'ESCOLA MUNICIPAL VINÍCIUS DE MORAES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(175, 'ESCOLA MUNICIPAL WLADIMIR DE PAULA GOMES');
INSERT INTO `escolas` (`id`, `nome`) VALUES(176, 'ESCOLA MUNICIPAL ZILDA ARNS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

DROP TABLE IF EXISTS `motorista`;
CREATE TABLE IF NOT EXISTS `motorista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` char(14) NOT NULL,
  `idade` tinyint(4) NOT NULL,
  `telefone` char(14) NOT NULL,
  `regiao_atuacao` varchar(45) NOT NULL,
  `sexo` char(1) NOT NULL,
  `fotoMotorista` longtext,
  `fotoCarteira` longtext,
  `fotoCRLV` longtext,
  `turnoManha` varchar(10) DEFAULT NULL,
  `turnoNoite` varchar(10) DEFAULT NULL,
  `turnoTarde` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `regioes`
--

DROP TABLE IF EXISTS `regioes`;
CREATE TABLE IF NOT EXISTS `regioes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_regiao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=503 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `regioes`
--

INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES(1, 'Região Barreiro');
INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES(2, 'Região Centro Sul');
INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES(3, 'Região Leste');
INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES(4, 'Região Nordeste');
INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES(5, 'Região Noroeste');
INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES(6, 'Região Norte');
INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES(7, 'Região Oeste');
INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES(8, 'Região Pampulha');
INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES(9, 'Região Venda Nova');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_usuarios`
--

DROP TABLE IF EXISTS `situacao_usuarios`;
CREATE TABLE IF NOT EXISTS `situacao_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_situacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `situacao_usuarios`
--

INSERT INTO `situacao_usuarios` (`id`, `nome_situacao`) VALUES(1, 'Ativo');
INSERT INTO `situacao_usuarios` (`id`, `nome_situacao`) VALUES(2, 'Inativo');
INSERT INTO `situacao_usuarios` (`id`, `nome_situacao`) VALUES(3, 'Aguardando confirmação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuarios`
--

DROP TABLE IF EXISTS `tipo_usuarios`;
CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_situacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id`, `tipo_situacao`) VALUES(1, 'Motorista');
INSERT INTO `tipo_usuarios` (`id`, `tipo_situacao`) VALUES(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(80) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `chave` varchar(220) DEFAULT NULL,
  `sits_usuarios_id` int(11) DEFAULT '3',
  `tipo_usuario_fk` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Usuario_UNIQUE` (`Usuario`),
  KEY `sits_usuarios_id` (`sits_usuarios_id`),
  KEY `tipo_usuario_fk` (`tipo_usuario_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `van`
--

DROP TABLE IF EXISTS `van`;
CREATE TABLE IF NOT EXISTS `van` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chassi` char(17) NOT NULL,
  `placa` char(8) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `qtd_lugares` tinyint(4) NOT NULL,
  `motorista_id_fk` int(11) DEFAULT NULL,
  `laudo_inspecao_veicular` longtext,
  `foto_interna` longtext,
  `foto_externa` longtext,
  PRIMARY KEY (`id`),
  KEY `motorista_id_fk` (`motorista_id_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`sits_usuarios_id`) REFERENCES `situacao_usuarios` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`tipo_usuario_fk`) REFERENCES `tipo_usuarios` (`id`);

--
-- Limitadores para a tabela `van`
--
ALTER TABLE `van`
  ADD CONSTRAINT `van_ibfk_1` FOREIGN KEY (`motorista_id_fk`) REFERENCES `motorista` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
