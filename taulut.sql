create table MAIN (
JuomaID		integer not null,
Juoma		varchar(50) not null,
Lisatty		Date not null,
Ohje		clob(200) not null,
constraint pk_main primary key (JuomaID)
);

create table NIMET (
JuomaID integer not null,
Nimi	varchar(50) not null,
constraint pk_main primary key (JuomaID)
);

create table OSAT (
JuomaID integer not null,
aines	varchar(50) not null,
m‰‰r‰	double,
constraint pk_main primary key (JuomaID)
);