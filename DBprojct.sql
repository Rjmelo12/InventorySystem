-- create database db_project;

/*create table Products(
Product_ID int Primary key,
Product_Name varchar(100) not null,
Category varchar(100) not null,
Price varchar(100) not null)*/

/* create table Users(
User_ID int primary key,
Fname varchar(100) not null,
LName varchar (100) not null,
Email varchar (100) not null,
Password varchar (100) not null)*/

/* create table Inventory(
Inventory_ID int primary key,
Product_ID int,
Category varchar (100) not null,
Price varchar (100) not null,
Stock int)*/

/* create table Customer(
Customer_ID int primary key,
Name varchar (100) not null,
Contacts varchar (100) not null)*/

/* create table Orders(
Order_ID int primary key,
Customer_ID int,
foreign key (Customer_ID) references Customer (Customer_ID),
CustomerName varchar (100) not null,
Product_ID int,
foreign key (Product_ID) references Product (Product_ID),
ProductName varchar (100) not null,
Quantity int,
Price varchar (100) not null)*/

/*insert into user values
(1, 'Rei Jan', 'Melocotones', 'rmelocotones@usa.edu.ph', 'rjmelo123')*/

-- drop table inventory;

/*create table Inventory(
Inventory_ID int primary key,
Product_ID int,
Product_Name varchar(100) not null,
Category varchar (100) not null,inventory
Price varchar (100) not null,
Stock int)*/

/*SELECT o.*, c.name AS customer_name
FROM orders o
JOIN customer c ON o.customer_id = c.customer_id;*/

/* insert into product values
(1, 'Palay', 'Crops', '15', '100'),
(2, 'Corn', 'Crops', '20', '100'),
(3, 'Egg', 'Poultry', '8', '100'),
(4, 'Lettuce', 'Vegetables', '35', '100'),
(5, 'Cabbage', 'Vegetables', '25', '100'),
(6, 'Squash', 'Vegetables', '20', '100'),
(7, 'Malunggay', 'Vegetables', '15', '100'),
(8, 'Banana', 'Fruits', '20', '100'),
(9, 'Milk', 'Goods', '50', '100'),
(10, 'Coconut', 'Fruits', '15', '100') */

-- SELECT * FROM product
-- WHERE Category = 'Vegetables';

/* Select ALL Product_Name
from product
where true;*/

/* Select * from product 
where category in ('Crops', 'Vegetables', 'Fruits'); */

-- Select * from product
-- where Price = '15' AND Category = 'Crops';

-- select * from product 
-- where Category = 'Crops' OR Price = '20';

-- select * from product
-- where not category = 'Vegetables';

-- select distinct Category From product

insert into orders values
(1, '1', 'Sm city', '1', 'Cabbage', '100', '5000');