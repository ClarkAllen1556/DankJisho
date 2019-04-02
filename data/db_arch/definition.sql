-- Create table the will hold users' searched history.
-- General Definions will not be stored by DankJisho.
-- Will hold less data as when navigated to it will 
-- rexecute the search. 

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

insert into DefinitionHistory(UserID, Japanese, English, EngToJap)
values 
    (1, 'テスト', 'test', 0),
    (1, 'dank', 'デーンク', 1);

select * from DefinitionHistory;
select ForumPosts.ID from ForumPosts;

select Title from ForumPosts as Posts where (select TopicID from Forum) like ForumPosts.ID;