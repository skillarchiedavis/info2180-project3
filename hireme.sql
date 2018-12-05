/*
Note: You should create a file called schema.sql with the relevant CREATE TABLE
statements for the tables above and include in your submitted code. Also ensure you
have an INSERT statement that adds a user with the email address
'admin@hireme.com' and the password 'password123' ( ensure that the password is
appropriately hashed of course). 

*/
DROP DATABASE IF EXISTS hireme;
CREATE DATABASE hireme;
USE hireme;

-- Table structure for `Users`
DROP TABLE IF EXISTS `Users`;
CREATE TABLE Users (
    `id` int(5) not null auto_increment,
    `firstname` varchar(16) not null,
    `lastname` varchar(16) not null,
    `password` TEXT not null,
    `telephone` varchar(11) not null,
    `email` varchar(32) not null,
    `date_joined` date not null,
    primary key(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14080 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `Jobs`;
CREATE TABLE Jobs (
    `id` int(5) unsigned not null auto_increment,
    `job_title` VARCHAR(30),
    `job_description` TEXT(5000),
    `category` VARCHAR(30),
    `company_name` VARCHAR(30),
    `company_location` VARCHAR(30),
    `date_posted` date not null,
    primary key(`id`)
);

DROP TABLE IF EXISTS `Jobs_Applied_For`;
CREATE TABLE `Jobs_Applied_For` (
    `id` int(10) unsigned not null auto_increment,
    `job_id` int(5) unsigned not null,
    `user_id` int(5) unsigned not null,
    `date_applied` date not null,
    primary key(`id`)
);

INSERT into `Users` VALUES ('', 'John', 'Doe', sha2('password123',512), 8761234567, 'admin@hireme.com', now());

INSERT into `Jobs` VALUES ('', 'UX/UI Designer', 'Job Desc', 'Design', 'UWI-MITS', 'Location', now());
INSERT into `Jobs` VALUES ('', 'Software Engineer', 'Job Desc', 'Programming', 'Basecamp', 'Location', now()-interval 2 day);


