create table JUOMAT (
JuomaID		serial PRIMARY KEY,
Lisannyt	Kayttaja_ID,
Juoma		varchar(50) not null unique,
Lisatty		Date not null CURRENT_DATE,
Ohje		varchar(200) not null
);

create table NIMET (
JuomaID 	serial PRIMARY KEY,
Nimi		varchar(50)
);

create table OSAT (
JuomaID 	serial PRIMARY KEY,
ainesID		serial 
maara		varchar(20)
);

create table KAYTTAJAT (
Kayttaja_ID	serial PRIMARY KEY,
Rekpvm		Date not null CURRENT_DATE,
Tunnus		varchar(16) unique,
Salasana	varchar(16) not null
);

create table AINES (
ainesID		serial PRIMARY KEY,
aines		varchar(50) not null unique
);
