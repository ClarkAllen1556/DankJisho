-- Forum Posts

CREATE TABLE ForumPosts (
    ID INT NOT NULL AUTO_INCREMENT,
    UserID INT,
    FOREIGN KEY (UserID) REFERENCES Users(ID),
    Title VARCHAR(1024) CHARACTER SET utf8 NOT NULL,
    Post VARCHAR(1024) CHARACTER SET utf8 NOT NULL,
    SubmissionTime DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
);

select * from ForumPosts;
use DankJisho;
insert into ForumPosts(UserID, Title, Post)
values
    (1, 'Why can\'t I find good cheese in Japan?', 'Like really? Who doesn\'t crave a nice ripe one sometime?');

insert into ForumPosts(UserID, Title, Post)
values
(2, '何ぜアメリカ人はハンバーガーの事が好きすぎますか？', 'ハンバーガーの味が美味しいけど、自分の健康に気にしていますね。アメリカ人は気にしないですか？');

select
    Title,
    Users.ID,
    SubmissionTime as Posted
from ForumPosts
    join
    (select UserName, ID from Users) as Author on ForumPosts.UserID = Author.ID
order by SubmissionTime desc;



select UserName as Author
from Users
    right join
    ForumPosts on Users.ID = ForumPosts.UserID;

select
    Title,
    Users.UserName as Author,
    SubmissionTime as Posted
from ForumPosts
left join
    Users on ForumPosts.UserID = Users.ID
order by SubmissionTime desc;