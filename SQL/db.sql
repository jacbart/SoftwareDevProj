drop schema if exists heroku_418f9cc765f4922;
create schema heroku_418f9cc765f4922;
use heroku_418f9cc765f4922;
set autocommit=0;

drop table if exists `users`;
create table `users` (
	`id` int(1) not null AUTO_INCREMENT primary key,
	`name` varchar(20) not null default ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;
insert into `users` (`id`, `name`) values
	(1, 'admin'),
	(2, 'jack'),
	(3, 'holden'),
	(4, 'matt'),
	(5, 'elijah'),
	(6, 'cash');

drop table if exists `topics`;
create table `topics` (
	`id` int(1) not null AUTO_INCREMENT primary key,
	`topic` varchar(15) not null default ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;
insert into `topics` (`id`, `topic`) values
	(1, 'python'),
	(2, 'cpp'),
	(3, 'cheat_sheets');

drop table if exists `resources`;
create table `resources` (
	`id` int(1) not null AUTO_INCREMENT primary key, 
	`title` varchar(40) not null default '',
	`resource` varchar(200) not null default '',
	`visit` int(1) default 0,
	`topic_id` int, foreign key (`topic_id`) references `topics`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;
insert into `resources` (`id`, `title`, `resource`, `visit`, `topic_id`) values
	(1, 'ultimate python guide', 'https://www.google.com/search?q=pyhone&oq=pyhone&aqs=chrome..69i57j0l5.3420j0j7&sourceid=chrome&ie=UTF-8#q=python', 0, 1),
	(2, 'ultimate cpp guide', 'https://www.google.com/search?q=pyhone&oq=pyhone&aqs=chrome..69i57j0l5.3420j0j7&sourceid=chrome&ie=UTF-8#q=c%2B%2B', 0, 2),
	(3, 'Ultimate Python CheatSheet', 'https://ehmatthes.github.io/pcc/cheatsheets/README.html', 0, 3);
