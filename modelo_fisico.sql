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

