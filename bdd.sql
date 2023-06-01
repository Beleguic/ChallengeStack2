-- Script SQL Projet semestrielle 2 - 3IW1

DROP TABLE IF EXISTS zfgh_user;
DROP TABLE IF EXISTS zfgh_newsletter;
DROP TABLE IF EXISTS zfgh_type;
DROP TABLE IF EXISTS zfgh_annonce;
DROP TABLE IF EXISTS zfgh_favorie;
DROP TABLE IF EXISTS zfgh_photo;

CREATE TABLE zfgh_user(
	id serial not null primary key,
	lastname varchar(120) not null,
	firtname varchar(60) not null,
	email varchar(250) not null UNIQUE,
	pwd varchar(255) not null,
	status int not null default 0,
	country varchar(2) not null default 'FR',
	date_inserted date not null,
	date_updated date not null
);

CREATE TABLE zfgh_newsletter(

	id serial not null primary key,
	id_user int not null,
	CONSTRAINT fk_user
      FOREIGN KEY(id_user) 
	  REFERENCES zfgh_user(id)
	  ON DELETE CASCADE
);

CREATE TABLE zfgh_type(
	id serial not null primary key,
	texte varchar(255)
);

CREATE TABLE zfgh_annonce(
	id serial not null primary key,
	id_type int not null,
	location boolean not null default false,
	prix int not null,
	superficie int not null,
	nb_piece int not null,
	contenu_annonce text not null,
	-- Ajout attribut si besoin
	CONSTRAINT fk_type
    	FOREIGN KEY(id_type) 
		REFERENCES zfgh_type(id)
		ON DELETE CASCADE
);

CREATE TABLE zfgh_favorie(
	id serial not null primary key,
	id_user int not null,
	id_annonce int not null,
	CONSTRAINT fk_fav_user
    	FOREIGN KEY(id_user) 
		REFERENCES zfgh_user(id)
		ON DELETE CASCADE,
	CONSTRAINT fk_fav_annonce
    	FOREIGN KEY(id_annonce) 
		REFERENCES zfgh_annonce(id)
		ON DELETE CASCADE
);

CREATE TABLE zfgh_photo(
	id serial not null primary key,
	id_annonce int not null,
	link_photo varchar(255) not null,
	CONSTRAINT fk_photo_annonce
    	FOREIGN KEY(id_annonce) 
		REFERENCES zfgh_annonce(id)
		ON DELETE CASCADE

);

