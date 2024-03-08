create table curso(
	id serial not null primary key,
	nome varchar(255) not null,
	semestre integer,
	ano date
);
 
CREATE TABLE usuario (
    id serial NOT NULL PRIMARY KEY,
    nome varchar(255) NOT NULL,
    cpf varchar(11) UNIQUE NOT NULL,
    matricula varchar(255) NOT NULL,
    sexo char(1),
    data_ativacao date NOT NULL,
    ra varchar(255) NOT NULL,
    curso_id integer NOT NULL, -- Alteração aqui para usar curso_id
    CONSTRAINT fk_curso FOREIGN KEY (curso_id) REFERENCES curso(id)
);

 
create table atividade(
	id serial not null primary key,
	titulo varchar(255) not null,
	credencial varchar(255) not null,
	categoria varchar(255) not null,
	semestre int,
	usuario_id integer not null,
	curso_id integer not null,
	data_inicio date,
	data_conclusao date,
	total_horas int,
	arquivo varchar(255),
	constraint fk_curso FOREIGN KEY (curso_id) REFERENCES curso(id),
	constraint fk_usuario FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);



drop table atividade  


