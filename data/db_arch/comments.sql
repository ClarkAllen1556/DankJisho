-- Comments

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
)

select * from Comments;

/* alter table Comments drop column Title; */

insert into Comments (UserID, ParentID, Post)
values 
    (2, 1, 'Danks is such an American idea so you have to use katakana: デーンク');

select user();