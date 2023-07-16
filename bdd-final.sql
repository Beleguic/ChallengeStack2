-- BDD Challenge stack

DROP VIEW  IF EXISTS public.zfgh_v_agent;
DROP VIEW  IF EXISTS public.zfgh_v_annonce;
DROP TABLE IF EXISTS public.zfgh_connexion;
DROP TABLE IF EXISTS public.zfgh_favori;
DROP TABLE IF EXISTS public.zfgh_photo;
DROP TABLE IF EXISTS public.zfgh_newsletter;
DROP TABLE IF EXISTS public.zfgh_pwd_forget;
DROP TABLE IF EXISTS public.zfgh_status;
DROP TABLE IF EXISTS public.zfgh_user_code;
DROP TABLE IF EXISTS public.zfgh_annonce_memento;
DROP TABLE IF EXISTS public.zfgh_annonce;
DROP TABLE IF EXISTS public.zfgh_type;
DROP TABLE IF EXISTS public.zfgh_user;


create table public.zfgh_user (
    id uuid not null default gen_random_uuid (),
    lastname character varying(120) not null,
    firstname character varying(60) not null,
    email character varying(250) not null,
    pwd character varying(255) not null,
    status integer not null default 1,
    country character varying(2) not null default 'FR'::character varying,
    date_inserted timestamp without time zone not null default now(),
    date_updated timestamp with time zone null default now(),
    actif boolean not null default false,
    constraint zfgh_user_pkey primary key (id),
    constraint zfgh_user_email_key unique (email)
  ) tablespace pg_default;

create table public.zfgh_type (
    id uuid not null default gen_random_uuid (),
    texte character varying(255) null,
    constraint zfgh_type_pkey primary key (id)
  ) tablespace pg_default;

create table public.zfgh_annonce (
    id uuid not null default gen_random_uuid (),
    id_type uuid not null,
    titre text not null,
    prix integer not null,
    superficiemaison integer not null,
    superficieterrain integer not null,
    nbrpiece integer not null,
    nbrchambre integer not null,
    ville text not null,
    rue text not null,
    departement text not null,
    regions text not null,
    description text not null,
    id_agent uuid null,
    constraint zfgh_annonce_pkey primary key (id),
    constraint fk_id_type_user foreign key (id_type) references zfgh_type (id) on delete cascade
  ) tablespace pg_default;

create table public.zfgh_annonce_memento (
    id uuid not null default gen_random_uuid (),
    date_memento timestamp without time zone not null default now(),
    id_annonce uuid not null,
    id_type uuid not null,
    titre text not null,
    prix integer not null,
    superficiemaison integer not null,
    superficieterrain integer not null,
    nbrpiece integer not null,
    nbrchambre integer not null,
    ville text not null,
    rue text not null,
    departement text not null,
    regions text not null,
    description text not null,
    id_agent uuid null,
    constraint zfgh_memento_pkey primary key (id),
    constraint fk_id_annonce_user foreign key (id_annonce) references zfgh_annonce (id) on delete cascade,
    constraint fk_id_type_user foreign key (id_type) references zfgh_type (id) on delete cascade
  ) tablespace pg_default;

create table public.zfgh_connexion (
    id uuid not null default gen_random_uuid (),
    id_user uuid not null,
    token text not null,
    last_seen timestamp with time zone not null default now(),
    constraint userconnexion_pkey primary key (id),
    constraint fk_id_user_user foreign key (id_user) references zfgh_user (id) on update cascade on delete cascade
  ) tablespace pg_default;

create table public.zfgh_favori (
    id uuid not null default gen_random_uuid (),
    id_user uuid not null,
    id_annonce uuid not null,
    constraint zfgh_favorie_pkey primary key (id),
    constraint zfgh_favori_id_annonce_fkey foreign key (id_annonce) references zfgh_annonce (id) on delete cascade,
    constraint zfgh_favori_id_user_fkey foreign key (id_user) references zfgh_user (id) on delete cascade
  ) tablespace pg_default;

create table public.zfgh_photo (
    id uuid not null default gen_random_uuid (),
    id_annonce uuid not null,
    link_photo character varying(255) not null,
    description text null,
    constraint zfgh_photo_pkey primary key (id),
    constraint fk_photo_annonce foreign key (id_annonce) references zfgh_annonce (id) on delete cascade
  ) tablespace pg_default;

create table public.zfgh_newsletter (
    id uuid not null default gen_random_uuid (),
    email character varying(250) not null,
    date_add_newsletter timestamp with time zone not null default now(),
    constraint zfgh_newsletter_pkey primary key (id),
    constraint zfgh_newsletter_email_key unique (email)
  ) tablespace pg_default;

create table public.zfgh_pwd_forget (
    id uuid not null default gen_random_uuid (),
    email character varying not null,
    token text not null,
    validity timestamp with time zone not null default (now() at time zone 'utc'::text),
    constraint zfgh_pwd_forget_pkey primary key (id),
    constraint fk_pwd_forget_user foreign key (email) references zfgh_user (email) on delete cascade
  ) tablespace pg_default;

create table public.zfgh_status (
    id uuid not null default gen_random_uuid (),
    id_status bigint generated by default as identity not null,
    status text not null,
    constraint zfgh_status_pkey primary key (id)
  ) tablespace pg_default;

create table public.zfgh_user_code (
    id uuid not null default gen_random_uuid (),
    id_user uuid not null,
    code bigint not null,
    creation_date timestamp with time zone not null default (now() at time zone 'utc'::text),
    constraint usercode_pkey primary key (id),
    constraint fk_id_user_user foreign key (id_user) references zfgh_user (id) on delete cascade
  ) tablespace pg_default;

create view public.zfgh_v_agent as
select u.id, u.lastname, u.firstname, u.email, u.country, u.status, count(a.id_agent) as nbr_annonce
from zfgh_user u  left join zfgh_annonce a on u.id = a.id_agent
where u.status > 1
group by u.id
order by (count(a.id_agent)) desc;

create view public.zfgh_v_annonce as
select a.id, a.titre, a.prix, a.superficiemaison, a.superficieterrain, a.nbrpiece, a.nbrchambre, a.ville, a.rue, a.departement, a.regions, a.description, t.texte
from zfgh_annonce a, zfgh_type t
where  a.id_type = t.id;