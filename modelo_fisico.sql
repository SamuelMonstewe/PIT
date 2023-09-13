create database pit;

use pit;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(80) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  chave varchar(220),
  sits_usuarios_id int default 3,
  tipo_usuario_fk int not null,
  foreign key (sits_usuarios_id) references situacao_usuarios(id),
  foreign key (tipo_usuario_fk) references tipo_usuarios(id),
  PRIMARY KEY (`id`),
  UNIQUE KEY `Usuario_UNIQUE` (`Usuario`)
) ;
CREATE TABLE `motorista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` char(14) NOT NULL,
  `nome` varchar(80) NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `van` (
   id int not null primary key auto_increment,
  `chassi` char(17) NOT NULL,
  `placa` char(8) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `qtd_lugares` tinyint NOT NULL,
  `motorista_id_fk` int,
  `laudo_inspecao_veicular` longtext,
  `foto_interna` longtext,
  `foto_externa` longtext,
  foreign key (motorista_id_fk) references motorista(id)
  );

CREATE TABLE `tipo_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo_situacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `situacao_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_situacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

CREATE TABLE `escolas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=503 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `regioes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_regiao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=503 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `regioes` (`id`, `nome_regiao`) VALUES 
(1, 'Região Barreiro'), 
(2, 'Região Centro Sul'), 
(3, 'Região Leste'), 
(4, 'Região Nordeste'), 
(5, 'Região Noroeste'), 
(6, 'Região Norte'), 
(7, 'Região Oeste'), 
(8, 'Região Pampulha'), 
(9, 'Região Venda Nova'); 

CREATE TABLE ALUNO(
id INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(120) NOT NULL,
idade INT NOT NULL,
escola VARCHAR(150) NOT NULL,
sexo CHAR(1) NOT NULL
);