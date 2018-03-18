#################################################################################
#
# MyTravelApp
# @author Brian.
#
# Uses MySQL, PHP and Apache.
#
#################################################################################

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> CREATE DATABASE TRAVELDB;
Query OK, 1 row affected (0.03 sec)

mysql> USE TRAVELDB;
Database changed
mysql> CREATE TABLE BNB (
    -> id int NOT NULL auto_increment,
    -> name varchar(30) NOT NULL,
    -> phone char(10),
    -> email varchar(30) NOT NULL,
    -> address varchar(90),
    -> rooms int NOT NULL,
    -> pricemin decimal(8,2) NOT NULL,
    -> pricemax decimal(8,2)
    -> ,
    -> details text,
    -> PRIMARY KEY (id)
    -> );
Query OK, 0 rows affected (0.49 sec)

mysql> describe bnb;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| id       | int(11)      | NO   | PRI | NULL    | auto_increment |
| name     | varchar(30)  | NO   |     | NULL    |                |
| phone    | char(10)     | YES  |     | NULL    |                |
| email    | varchar(30)  | NO   |     | NULL    |                |
| address  | varchar(90)  | YES  |     | NULL    |                |
| rooms    | int(11)      | NO   |     | NULL    |                |
| pricemin | decimal(8,2) | NO   |     | NULL    |                |
| pricemax | decimal(8,2) | YES  |     | NULL    |                |
| details  | text         | YES  |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
9 rows in set (0.07 sec)

mysql>


mysql> CREATE TABLE BNBBOOKING (
    -> id int NOT NULL auto_increment,
    -> name varchar(30) NOT NULL,
    -> surname varchar(30) NOT NULL,
    -> phone char(10),
    -> email varchar(30),
    -> address varchar(90),
    -> dateb date NOT NULL,
    -> entrydate datetime NOT NULL default '0000/00/00 00:00:00',
    -> PRIMARY KEY (id)
    -> );
Query OK, 0 rows affected (0.11 sec)

mysql> describe bnbbooking;
+-----------+-------------+------+-----+---------------------+----------------+
| Field     | Type        | Null | Key | Default             | Extra          |
+-----------+-------------+------+-----+---------------------+----------------+
| id        | int(11)     | NO   | PRI | NULL                | auto_increment |
| name      | varchar(30) | NO   |     | NULL                |                |
| surname   | varchar(30) | NO   |     | NULL                |                |
| phone     | char(10)    | YES  |     | NULL                |                |
| email     | varchar(30) | YES  |     | NULL                |                |
| address   | varchar(90) | YES  |     | NULL                |                |
| dateb     | date        | NO   |     | NULL                |                |
| entrydate | datetime    | NO   |     | 0000-00-00 00:00:00 |                |
+-----------+-------------+------+-----+---------------------+----------------+
8 rows in set (0.01 sec)

mysql> ALTER TABLE bnbbooking ADD COLUMN bnbid int NOT NULL AFTER dateb;
Query OK, 0 rows affected (0.59 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> describe bnbbooking;
+-----------+-------------+------+-----+---------------------+----------------+
| Field     | Type        | Null | Key | Default             | Extra          |
+-----------+-------------+------+-----+---------------------+----------------+
| id        | int(11)     | NO   | PRI | NULL                | auto_increment |
| name      | varchar(30) | NO   |     | NULL                |                |
| surname   | varchar(30) | NO   |     | NULL                |                |
| phone     | char(10)    | YES  |     | NULL                |                |
| email     | varchar(30) | YES  |     | NULL                |                |
| address   | varchar(90) | YES  |     | NULL                |                |
| dateb     | date        | NO   |     | NULL                |                |
| bnbid     | int(11)     | NO   |     | NULL                |                |
| entrydate | datetime    | NO   |     | 0000-00-00 00:00:00 |                |
+-----------+-------------+------+-----+---------------------+----------------+
9 rows in set (0.01 sec)

mysql>


mysql> GRANT ALL ON TRAVELDB.* to traveldb@localhost identified by 'travelpw';
Query OK, 0 rows affected (0.06 sec)

mysql>



mysql> INSERT INTO BNB (name,phone,email,address,rooms,pricemin,pricemax,details) VALUES ('BNB
1', '0123456789', 'info@bnb1.com', '1 bnb1 Aven, Pretoria', 50, 250, 500, 'At the center of th
e Capital City');
Query OK, 1 row affected (0.66 sec)

mysql> INSERT INTO BNB (name,phone,email,address,rooms,pricemin,pricemax,details) VALUES ('BNB
2', '0723456789', 'info@bnb2.com', '2 bnb2 Aven, Johonnesburg', 1000, 500, 2000, 'At the City
of Gold');
Query OK, 1 row affected (0.32 sec)



mysql> INSERT INTO BNB (name,phone,email,address,rooms,pricemin,pricemax,details) VALUES ('BNB
3', '0823456789', 'info@bnb3.com', '3 bnb3 Aven, Durban', 900, 300, 1500, 'Cool Banana Winter
or Summer.');
Query OK, 1 row affected (0.04 sec)

mysql> CREATE TABLE SKYEBOOKING (
    -> id int NOT NULL auto_increment,
    -> name varchar(30) NOT NULL,
    -> email varchar(30) NOT NULL,
    -> froma varchar(30) NOT NULL,
    -> tob varchar(30) NOT NULL,
    -> dateb datetime NOT NULL default '0000/00/00 00:00:00',
    -> timeb varchar(10) NOT NULL,
    -> fnumber varchar(30) NOT NULL,
    -> price decimal(8,2),
    -> ref varchar(50),
    -> PRIMARY KEY (id)
    -> );
Query OK, 0 rows affected (0.14 sec)

mysql>

mysql> CREATE TABLE CURRENCIES (
    -> id int NOT NULL auto_increment,
    -> user varchar(30) NOT NULL,
    -> EUR float NOT NULL,
    -> GBP float NOT NULL,
    -> KES float NOT NULL,
    -> USD float NOT NULL,
    -> ZAR float NOT NULL,
    -> date datetime NOT NULL default '0000/00/00 00:00:00',
    -> ref varchar(60) NOT NULL,
    -> PRIMARY KEY (id)
    -> );
Query OK, 0 rows affected (0.24 sec)

mysql> show tables;
+--------------------+
| Tables_in_traveldb |
+--------------------+
| bnb                |
| bnbbooking         |
| currencies         |
| skyebooking        |
+--------------------+
4 rows in set (0.00 sec)

mysql>

mysql> ALTER TABLE bnb ADD COLUMN location varchar(30) NOT NULL;
Query OK, 0 rows affected (0.33 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql>
#
#UPDATE `traveldb`.`bnb` SET `location`='Pretoria' WHERE `id`='1';
#UPDATE `traveldb`.`bnb` SET `details`='At the City of Gold', `location`='Johannesburg' WHERE `id`='2';
#UPDATE `traveldb`.`bnb` SET `location`='Durban' WHERE `id`='3';
#SQL script was successfully applied to the database.
#


