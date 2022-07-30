create database chord;

create table boss(
	id int auto_increment primary key,
    nome varchar(255) not null,
    documento varchar(30) not null,
    destino varchar(15) not null,
    modelo varchar(30),
    placa varchar(10),
    entrada datetime not null,
    saida datetime,
    cracha int
);

INSERT INTO `chord`.`boss` (`id`, `nome`, `documento`, `destino`, `modelo`, `placa`, `entrada`, `saida`, `cracha`) 
VALUES ('1', 'Antonio Ailton Gonçalves De Souza', '31012864880', 'FEB -08', 'Nissan Prata', 'BRA9F22', '14/05/22 14:50:00', '14/05/22 15:00:00', '20');
