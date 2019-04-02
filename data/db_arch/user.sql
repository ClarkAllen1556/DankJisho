-- This will create the user table

/* create database DankJisho; */

use DankJisho;

CREATE TABLE Users (
    ID INT NOT NULL AUTO_INCREMENT,
    Email VARCHAR(256) NOT NULL UNIQUE,
    UserName VARCHAR(256) NOT NULL UNIQUE,
    Password VARCHAR(64) NOT NULL,
    PRIMARY KEY(ID)
 );

insert into Users(Email, UserName, Password)
values("test2@test.com", "2tester", "dank");

select * from Users;

alter table Users 
add column DateRegistered  DATETIME default CURRENT_TIMESTAMP 
after Password;