create database ambientes;
use ambientes;

create table tiposNovedad(
     idTipoNovedad int not null primary key auto_increment,
     nombre varchar(25) not null
);

create table ambientes(
     idAmbiente int not null primary key auto_increment,
     descripscion text (255) not null,
     numeroComputadores int(100) not null
);


create table novedades(
     idReporte int not null primary key auto_increment,
     idAmbiente int not null,
     idTipoNovedad int not null,
     descripcion text(255) not null,
     fechaRegistro datetime,
     constraint FK_tipoNovedad foreign key (idTipoNovedad) references tiposNovedad (idTipoNovedad),
     constraint FK_ambiente foreign key (idAmbiente) references ambientes (idAmbiente)
);

insert into tiposNovedad
values (1, "urgente"), (null, "importante");

insert into ambientes
values (1, "programacion", 10), (null, "diseño", 20);

insert into novedades
values (1, 1, 1, "solucionado", null);