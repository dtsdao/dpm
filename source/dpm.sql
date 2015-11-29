create database dpm;
use dpm;
create table password(
id int unsigned not null primary key,
site varchar(64) not null,
user varchar(64) not null,
password varchar(40) not null
);
create database dpm_visit;
use dpm_visit;
create table password(
id int unsigned not null primary key,
site varchar(64) not null,
user varchar(64) not null,
password varchar(40) not null
);