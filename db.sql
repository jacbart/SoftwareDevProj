drop schema if exists ThatCSGuide;
create schema ThatCSGuide;
use ThatCSGuide;
set autocommit=0;

drop table if exists `users`;
create table `users` (
	`id` int(1) not null AUTO_INCREMENT,
	`name` varchar(20) not null default '',
	primary key (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;
insert into `users` (`id`, `name`) values
	(1, 'admin'),
	(2, 'anotheradmin'),
	(3, 'yepagain'),
	(4, 'yeahadminagainsuckit');

drop table if exists `topics`;
create table `topics` (
	`id` int(1) not null AUTO_INCREMENT,
	`topic` varchar(15) not null default '',
	primary key (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;
insert into `topics` (`id`, `topic`) values
	(1, 'python'),
	(2, 'cpp'),
	(3, 'cheat_sheets');

drop table if exists `resources`;
create table `resources` (
	`id` int(1) not null AUTO_INCREMENT, 
	`topic_id` int(1) not null,
	`title` varchar(40) not null default '',
	`resource` varchar(200) not null default '',
	primary key (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;
insert into `resources` (`id`, `topic_id`, `title`, `resource`) values
	(1, 1, 'ultimate python guide', 'https://www.google.com/search?q=pyhone&oq=pyhone&aqs=chrome..69i57j0l5.3420j0j7&sourceid=chrome&ie=UTF-8#q=python'),
	(2, 2, 'ultimate cpp guide', 'https://www.google.com/search?q=pyhone&oq=pyhone&aqs=chrome..69i57j0l5.3420j0j7&sourceid=chrome&ie=UTF-8#q=c%2B%2B'),
	(3, 3, 'google', 'https://support.google.com/websearch/answer/134479?hl=en');