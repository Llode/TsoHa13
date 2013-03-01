create table JUOMAT (
JuomaID		serial PRIMARY KEY,
Lisannyt	integer,
juomannimi  varchar(50) not null unique,
Lisatty		Date,
Ohje		varchar(400) not null
);

create table NIMET (
JuomaID 	integer,  Primary key (juomaID, Nimi),
Nimi		varchar(50)
);

create table OSAT (
JuomaID 	integer, Primary key (JuomaID, ainesID),
ainesID		integer,
maara		varchar(20)
);

create table KAYTTAJAT (
Kayttaja_ID	serial PRIMARY KEY,
Rekpvm		Date,
Tunnus		varchar(16) unique,
Salasana	varchar(16) not null,
Lupa		integer not null
);

create table AINES (
ainesID		serial, Primary key (ainesID, ainesnimi),
ainesnimi	varchar(50) not null unique
);
