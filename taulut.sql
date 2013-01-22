create table JUOMAT (
JuomaID		serial not null,
Juoma		varchar(50) not null,
Lisatty		Date not null,
Ohje		varchar(200) not null,
constraint pk_main primary key (JuomaID)
);

create table NIMET (
JuomaID serial not null,
Nimi	varchar(50) not null,
constraint pk_main primary key (JuomaID)
);

create table OSAT (
JuomaID serial not null,
aines	varchar(50) not null,
maara	integer,
constraint pk_main primary key (JuomaID)
);

create table KAYTTAJAT (
Kayttaja_ID	serial not null,
Tunnus		varchar(16) not null,
Salasana	varchar(16) not null,
constraint pk_kayttaja primary key (Kayttaja_ID)
);

