create database pit;

use pit;

create table motorista(
cpf char(14) not null primary key,
nome varchar(80) not null,
idade tinyint not null,
telefone char(14) not null,
turno varchar(12) not null,
escola_fk int not null,
rota varchar(45) not null,
sexo char(1) not null
);
select * from motorista;
delete from motorista where cpf = '498.327.439-24';
alter table motorista drop column endereco;
alter table motorista add column rota varchar(45) not null;
delete from motorista where cpf = '3424';

create table escolas (
	id int auto_increment primary key,
    nome varchar(80) not null
);

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



