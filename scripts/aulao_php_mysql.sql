create database aulao_php_mysql;
use aulao_php_mysql;

create table pessoas
(
	id int unsigned not null auto_increment,
	nome varchar(255) not null,
    idade tinyint unsigned not null,
    sexo char(1) not null,
    primary key (id)
) engine=innodb;