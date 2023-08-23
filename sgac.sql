create table curso(
	id serial not null primary key,
	nome varchar(255) not null,
	semestre integer,
	ano date
);

create table aluno(
	id serial not null primary key,
	nome varchar(255) not null,
	cpf varchar(11) unique not null,
	matricula varchar(255) not null,
	data_ativacao date not null,
	ra varchar(255) not null,
	nome_curso varchar(255) not null,
	constraint nome_curso foreign key (id) references curso(id) 
);


create table administrador(
	id serial not null primary key,
	nome varchar(255) not null,
	cpf varchar(255) unique not null,
	matricula varchar(255) not null,
	ativo boolean,
	data_ativacao date not null,
	nome_curso varchar(255) not null,
	constraint nome_curso foreign key (id) references curso(id)
);

create table atividade(
	id serial not null primary key,
	titulo varchar(255) not null,
	credencial varchar(255) not null,
	nome_curso varchar(255) not null,
	semestre date,
	aluno integer not null,
	administrador integer not null,
	constraint nome_curso foreign key (id) references curso(id),
	constraint aluno foreign key (id) references aluno(id),
	constraint administrador foreign key (id) references administrador(id)
);


