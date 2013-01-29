create table JUOMAT (
JuomaID		serial PRIMARY KEY,
Lisannyt	integer,
Juoma		varchar(50) not null unique,
Lisatty		Date,
Ohje		varchar(200) not null
);

create table NIMET (
JuomaID 	integer PRIMARY KEY,
Nimi		varchar(50)
);

create table OSAT (
JuomaID 	integer PRIMARY KEY,
ainesID		integer,
maara		varchar(20)
);

create table KAYTTAJAT (
Kayttaja_ID	serial PRIMARY KEY,
Rekpvm		Date,
Tunnus		varchar(16) unique,
Salasana	varchar(16) not null
);

create table AINES (
ainesID		serial PRIMARY KEY,
aines		varchar(50) not null unique
);
