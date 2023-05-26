create database pit;

use pit;

CREATE TABLE `motorista` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpf` char(14) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `idade` tinyint NOT NULL,
  `telefone` char(14) NOT NULL,
  `turno` varchar(12) NOT NULL,
  `rota` varchar(45) NOT NULL,
  `sexo` char(1) NOT NULL,
  `fotoMotorista` longtext,
  `fotoCarteira` longtext,
  `fotoCRLV` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `escola_motorista` (
  `id` int NOT NULL AUTO_INCREMENT,
  `escolas_id` int DEFAULT NULL,
  `id_motorista` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `escolas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(80) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Usuario_UNIQUE` (`Usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `van` (
  `chassi` char(17) NOT NULL,
  `placa` char(7) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `qtd_lugares` tinyint NOT NULL,
  `motorista_id_fk` int DEFAULT NULL,
  `laudo_inspecao_veicular` longtext,
  `foto_interna` longtext,
  `foto_externa` longtext,
  PRIMARY KEY (`chassi`),
  KEY `motorista_id_fk_idx` (`motorista_id_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

select * from van;