create database ecommerce;
use ecommerce;
create table products (productid  int primary key auto_increment,bookname varchar(100),quantity int );
create table orders (orderid  int primary key,bookid int,quantity int,
FOREIGN KEY (bookid ) REFERENCES products(productid));
drop table products;
drop table orders;

