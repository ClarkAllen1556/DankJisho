-- Represents the whole Form itself. 
-- Will just need to have links back to the topics.

create table Forum(
    ID int not null auto_increment,
    TopicID int,
    foreign key (TopicID) references ForumPosts (ID),
    primary key (ID)
)

select * from Forum;

insert into Forum (TopicID)
values (2);
