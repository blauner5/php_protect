drop database if EXISTS blauner;
create database blauner;
use blauner;

create table log (
id INT(255) PRIMARY KEY AUTO_INCREMENT NOT NULL,
utente VARCHAR(20) NOT NULL,
password VARCHAR(40) NOT NULL,
data VARCHAR(25) NOT NULL,
dispositivo VARCHAR(255) NOT NULL,
ip VARCHAR(20) NOT NULL
);