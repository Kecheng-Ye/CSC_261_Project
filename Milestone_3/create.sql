-- create database and switch to that table
-- create database CSC261;
USE kye_1;


-- create each table
-- NOTE! Mysql does not Circular references, so we have to first create "Channel" table 
-- to enable the foreign key in "Video" table
create table Channel(
	id				INT UNSIGNED	NOT NULL,
    Title			VARCHAR(255),
    Release_date	DATE,
    PRIMARY KEY(id)
);

create table Video(
	id				INT UNSIGNED		NOT NULL,
    Title			VARCHAR(255),
    Channel_id		INT UNSIGNED,
    Publish_date	DATE,
    Views			INT	UNSIGNED		DEFAULT 0,
    PRIMARY KEY(id),
    FOREIGN KEY (Channel_id) REFERENCES Channel(id)
);

create table User(
	name			VARCHAR(255)	NOT NULL,
    First_name		VARCHAR(255),
    Last_name		VARCHAR(255),
    password		VARCHAR(255) 	DEFAULT "password",
    PRIMARY KEY(name)
);

create table Subscribe(
	User_name		VARCHAR(255)	NOT NULL,
    Channel_id		INT UNSIGNED,
    Start_date		DATE,
    PRIMARY KEY(User_name, Channel_id),
    FOREIGN KEY (User_name) REFERENCES User(name),
    FOREIGN KEY (Channel_id) REFERENCES Channel(id)
);

create table likes(
	User_name		VARCHAR(255)	NOT NULL,
    Video_id		INT UNSIGNED	NOT NULL,
    Comment			VARCHAR(255),
    Repeated_views	INT 			DEFAULT 0,
    PRIMARY KEY(User_name, Video_id),
    FOREIGN KEY (User_name) REFERENCES User(name),
    FOREIGN KEY (Video_id) REFERENCES Video(id)
);

