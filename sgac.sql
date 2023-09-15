create table curso(
	id serial not null primary key,
	nome varchar(255) not null,
	semestre integer,
	ano date
);
  
create table usuario(
	id serial not null primary key,
	nome varchar(255) not null,
	cpf varchar(11) unique not null,
	matricula varchar(255) not null,
	sexo char (1),
	data_ativacao date not null,
	ra varchar(255) not null,
	nome_curso varchar(255) not null,
	constraint nome_curso foreign key (id) references curso(id) 
);
 
create table atividade(
	id serial not null primary key,
	titulo varchar(255) not null,
	credencial varchar(255) not null,
	nome_curso varchar(255) not null,
	semestre date,
	usuario integer not null,
	constraint nome_curso foreign key (id) references curso(id),
	constraint usuario foreign key (id) references usuario(id)
);

inserto into usuario(id, nome, cpf, matricula, sexo, data_ativacao, ra, nome_curso)
values (1, 'Roger', '28392839401', '20202837483', 'M', current_timeStamp)
