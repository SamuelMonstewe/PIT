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

create table van(
chassi char(17) not null primary key,
placa char(7) not null,
marca varchar(30) not null,
modelo varchar(30) not null,
qtd_lugares tinyint not null,
motorista_cpf_fk int not null,
foreign key (motorista_cpf_fk) references motorista(cpf)
);
select * from van;



