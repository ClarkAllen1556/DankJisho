### Clark, Allen
### CS 401
### HW 5 - DB Tables

# Description of Dank Jisho's Database Tables
> All tables are being placed in the `DankJisho` database.

## Users Table
> Will hold user login information.

    CREATE TABLE Users (
        ID INT NOT NULL AUTO_INCREMENT,
        Email VARCHAR(256) NOT NULL UNIQUE,
        UserName VARCHAR(256) NOT NULL UNIQUE,
        Password VARCHAR(64) NOT NULL,
        PRIMARY KEY(ID)
    );
 
After creating the table, I felt that it would be nice to know the time/date that a user registered on.

    alter table Users 
    add column DateRegistered  DATETIME default CURRENT_TIMESTAMP 
    after Password;
 
 >> select * from Users;

    +----+----------------+----------+----------+-----------------------------------------+
    | ID | Email          | UserName | Password | DateRegistered                          | 
    +----+----------------+----------+----------+-----------------------------------------+
    | 1  | test@test.com  | tester   | dank     | Tue Feb 26 2019 22:43:26 GMT-0700 (MST) | 
    | 2  | test2@test.com | 2tester  | dank     | Tue Feb 26 2019 22:43:26 GMT-0700 (MST) | 
    +----+----------------+----------+----------+-----------------------------------------+
 
 
## Definitions Table
> Will hold basic information about user's saved definition history. This data will be used to re-search a word using the search API. 


    CREATE TABLE DefinitionHistory (
        ID INT NOT NULL auto_increment,
        UserID INT,
        FOREIGN KEY (UserID) REFERENCES Users(ID),
        TS datetime default current_timestamp,
        Japanese VARCHAR(1024) not null,
        English VARCHAR(1024),
        EngToJap BOOLEAN default 1, -- this will determine what direction was searched English -> Japanese
        PRIMARY KEY (ID)
    );

>> select * from DefinitionHistory;
    
    +----+--------+-----------------------------------------+----------+---------+----------+
    | ID | UserID | TS                                      | Japanese | English | EngToJap | 
    +----+--------+-----------------------------------------+----------+---------+----------+
    | 1  | 1      | Tue Feb 26 2019 01:15:15 GMT-0700 (MST) | テスト      | test    | 0        | 
    | 2  | 1      | Tue Feb 26 2019 01:15:15 GMT-0700 (MST) | dank     | デーンク    | 1        | 
    +----+--------+-----------------------------------------+----------+---------+----------+

## Forum Posts Table

> Will hold user submitted forum posts. 

    CREATE TABLE ForumPosts (
        ID INT NOT NULL AUTO_INCREMENT,
        UserID INT,
        FOREIGN KEY (UserID) REFERENCES Users(ID),
        Title VARCHAR(1024) NOT NULL,
        Post VARCHAR(1024),
        ImgFile VARCHAR (512),
        SubmissionTime DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (ID)
    );

>> select * from ForumPosts;

    +----+--------+---------------------------+------------------------------------------------+---------+-----------------------------------------+
    | ID | UserID | Title                     | Post                                           | ImgFile | SubmissionTime                          | 
    +----+--------+---------------------------+------------------------------------------------+---------+-----------------------------------------+
    | 1  | 1      | How to say dank?          | I just wanna express my self                   | null    | Tue Feb 26 2019 01:39:28 GMT-0700 (MST) | 
    | 2  | 2      | 何ぜアメリカ人はハンバーガーの事が好きすぎますか？ | ハンバーガーの味が美味しいけど、自分の健康に気にしていますね。アメリカ人は気にしないですか？ | null    | Tue Feb 26 2019 22:52:26 GMT-0700 (MST) | 
    +----+--------+---------------------------+------------------------------------------------+---------+-----------------------------------------+

## Comments Table
> Will hold user submitted comments. These comments could reference comments on other areas of the site, not just forum posts.

    CREATE TABLE Comments(
        ID INT NOT NULL AUTO_INCREMENT,
        UserID INT,
        FOREIGN KEY (UserID) REFERENCES Users(ID),
        ParentID INT,
        FOREIGN KEY (ParentID) REFERENCES ForumPosts (ID),
        /* Title VARCHAR(1024) NOT NULL, */
        Post VARCHAR(1024),
        ImgFile VARCHAR (512),
        SubmissionTime DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (ID)
    );

>> select * from Comments;

    +----+--------+----------+------------------------------------------------------------------+---------+-----------------------------------------+
    | ID | UserID | ParentID | Post                                                             | ImgFile | SubmissionTime                          | 
    +----+--------+----------+------------------------------------------------------------------+---------+-----------------------------------------+
    | 1  | 2      | 1        | Danks is such an American idea so you have to use katakana: デーンク | null    | Tue Feb 26 2019 01:43:01 GMT-0700 (MST) | 
    +----+--------+----------+------------------------------------------------------------------+---------+-----------------------------------------+

## Forum Table
> Will represent the entire forums itself. Will hold forum posts.

    create table Forum(
        ID int not null auto_increment,
        TopicID int,
        foreign key (TopicID) references ForumPosts (ID),
        primary key (ID)
    );

>> select * from Forum;

    +----+---------+
    | ID | TopicID | 
    +----+---------+
    | 1  | 1       | 
    | 2  | 2       | 
    +----+---------+