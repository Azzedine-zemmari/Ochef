use ochef;
drop table client;
create table client (
id int not null PRIMARY KEY AUTO_INCREMENT,
nom varchar(30),
prenom varchar(30),
adress text,
tel text,
email varchar(50) unique,
password text,
role enum('admin','user') Default 'user'
);
insert into client(nom,prenom,adress,tel,email,password,role) values("Zemmari","azzedine","Hey el massira LOTIS 500","0622328719","Azzedine@gmail.com","Azzedine2004","admin");
select * from client;
create table menu (
id int not null PRIMARY KEY AUTO_INCREMENT,
nom varchar(20)
);
drop table Plat;
create table Plat (
id int not null PRIMARY KEY AUTO_INCREMENT,
nom varchar(30),
ingrediant text,
menuId int,
image text,
FOREIGN KEY (menuId) REFERENCES menu(id) on delete cascade
);
drop table Reservation;
create table Reservation(
id int not null PRIMARY KEY AUTO_INCREMENT,
clientId int,
MenuId int,
dateReservation date,
heur TIME,
nbrPerson int,
status enum ('Anuller','Attent','Confirme'),
foreign key(clientId) references client(id) on delete cascade,
foreign key(MenuId) references menu(id)  on delete cascade
)