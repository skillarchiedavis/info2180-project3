DROP TABLE IF EXISTS `Jobs_Applied_For`;
CREATE TABLE Jobs_Applied_For (
    `id` int(10) unsigned not null auto_increment,
    `job_id` int(5) unsigned not null,
    `user_id` int(5) unsigned not null,
    `date_applied` date not null,
    primary key(`id`)
);

INSERT into `Jobs_Applied_For` VALUES ('', '1', '14080', '2018-12-02');



/*Users Join Jobs Applied for
select Users.firstname, Users.lastname, Jobs_Applied_For.id, Jobs_Applied_For.user_id, Jobs_Applied_For.job_id, Jobs_Applied_For.date_applied from Users Join Jobs_Applied_For on Users.id = Jobs_Applied_For.user_id;
*/


/* Jobs join (Users Join Jobs Applied for)
Select q1.firstname, q1.lastname, q1.id, q1.user_id, q1.job_id, q1.date_applied, Jobs.job_title, Jobs.job_description, Jobs.category, Jobs.company_name, Jobs.company_location, Jobs.date_posted from (select Users.firstname, Users.lastname, Jobs_Applied_For.id, Jobs_Applied_For.user_id, Jobs_Applied_For.job_id, Jobs_Applied_For.date_applied from Users Join Jobs_Applied_For on Users.id = Jobs_Applied_For.user_id) as q1 join Jobs on q1.job_id=Jobs.id;
/*