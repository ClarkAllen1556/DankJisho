-- This will create the user table

/* create database DankJisho; */

use DankJisho;

CREATE TABLE Users (
    ID INT NOT NULL AUTO_INCREMENT,
    Email VARCHAR(255) CHARACTER SET utf8 NOT NULL UNIQUE,
    UserName VARCHAR(256) CHARACTER SET utf8 NOT NULL UNIQUE,
    Password VARCHAR(64) CHARACTER SET utf8 NOT NULL ,
    PRIMARY KEY(ID)
);

SHOW FULL COLUMNS FROM junk;

insert into Users(Email, UserName, Password)
values
("nathan.drake@halo.org", "TreasureHunt", "dank"),
("all.might@hero.org", "AllMight", "dank");

select * from Users;

alter table Users
add column NumPosts  int default 0
after Password;

update Users set NumPosts = NumPosts + 1;