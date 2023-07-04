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
) ;

select * from motorista;
CREATE TABLE `escola_motorista` (
  `id` int NOT NULL AUTO_INCREMENT,
  `escolas_id` int DEFAULT NULL,
  `id_motorista` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

CREATE TABLE `escolas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ;

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

select * from pit.usuarios;
drop table usuarios;
CREATE TABLE `van` (
  `chassi` char(17) NOT NULL,
  `placa` char(8) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `qtd_lugares` tinyint NOT NULL,
  `motorista_id_fk` int DEFAULT NULL,
  `laudo_inspecao_veicular` longtext,
  `foto_interna` longtext,
  `foto_externa` longtext,
  PRIMARY KEY (`chassi`),
  KEY `motorista_id_fk_idx` (`motorista_id_fk`)
) ;
create table situacao_usuarios(
id int auto_increment primary key,
nome_situacao varchar(45) not null
);

create table tipo_usuarios (
id int auto_increment primary key,
tipo_situacao varchar(45) not null
);

insert into situacao_usuarios values (null, "Ativo");
insert into situacao_usuarios values (null, "Inativo");
insert into situacao_usuarios values (null, "Aguardando confirmação");

insert into tipo_usuarios values (null, "Motorista");
insert into tipo_usuarios values (null, "Cliente");

select * from situacao_usuarios;
select * from tipo_usuarios;
select * from van;

