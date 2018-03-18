CREATE DATABASE TRAVELDB;
USE TRAVELDB;
CREATE TABLE BNB (
 id int NOT NULL auto_increment,
 name varchar(30) NOT NULL,
 phone char(10),
 email varchar(30) NOT NULL,
 address varchar(90),
 rooms int NOT NULL,
 pricemin decimal(8,2) NOT NULL,
 pricemax decimal(8,2),
 details text,
 location varchar(30) NOT NULL,
 PRIMARY KEY (id)
 );
GRANT ALL ON TRAVELDB.* to traveldb@localhost identified by 'travelpw';
INSERT INTO BNB (name,phone,email,address,rooms,pricemin,pricemax,details,location) VALUES ('BNB
1', '0123456789', 'info@bnb1.com', '1 bnb1 Aven, Pretoria', 50, 250, 500, 'At the center of th
e Capital City', 'Pretoria');
INSERT INTO BNB (name,phone,email,address,rooms,pricemin,pricemax,details,location) VALUES ('BNB
2', '0723456789', 'info@bnb2.com', '2 bnb2 Aven, Johonnesburg', 1000, 500, 2000, 'At the City
of Gold', 'Johannesburg');
INSERT INTO BNB (name,phone,email,address,rooms,pricemin,pricemax,details,location) VALUES ('BNB
3', '0823456789', 'info@bnb3.com', '3 bnb3 Aven, Durban', 900, 300, 1500, 'Cool Banana Winter
or Summer.', 'Durban');
CREATE TABLE SKYEBOOKING (
 id int NOT NULL auto_increment,
 name varchar(30) NOT NULL,
 email varchar(30) NOT NULL,
 froma varchar(30) NOT NULL,
 tob varchar(30) NOT NULL,
 dateb datetime NOT NULL default '0000/00/00 00:00:00',
 timeb varchar(10) NOT NULL,
 fnumber varchar(30) NOT NULL,
 price decimal(8,2),
 ref varchar(50),
 PRIMARY KEY (id)
 );
CREATE TABLE CURRENCIES (
 id int NOT NULL auto_increment,
 user varchar(30) NOT NULL,
 EUR float NOT NULL,
 GBP float NOT NULL,
 KES float NOT NULL,
 USD float NOT NULL,
 ZAR float NOT NULL,
 date datetime NOT NULL default '0000/00/00 00:00:00',
 ref varchar(60) NOT NULL,
 PRIMARY KEY (id)
 );