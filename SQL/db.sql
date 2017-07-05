drop schema if exists heroku_418f9cc765f4922;
create schema heroku_418f9cc765f4922;
use heroku_418f9cc765f4922;
set autocommit=0;

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

create table `topics` (
	`id` int(1) not null AUTO_INCREMENT primary key,
	`topic` varchar(15) not null default ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;
insert into `topics` (`id`, `topic`) values
	(1, 'python'),
	(2, 'cpp'),
	(3, 'cheat_sheets');

create table `resources` (
	`id` int(2) not null AUTO_INCREMENT primary key, 
	`title` varchar(50) not null default '',
	`resource` varchar(300) not null default '',
	`visit` int null default 0,
	`topic_id` int, foreign key (`topic_id`) references `topics`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;
insert into `resources` (`id`, `title`, `resource`, `visit`, `topic_id`) values
	(1, 'ultimate python guide', 'https://www.google.com/search?q=pyhone&oq=pyhone&aqs=chrome..69i57j0l5.3420j0j7&sourceid=chrome&ie=UTF-8#q=python', 0, 1),
	(2, 'ultimate cpp guide', 'https://www.google.com/search?q=pyhone&oq=pyhone&aqs=chrome..69i57j0l5.3420j0j7&sourceid=chrome&ie=UTF-8#q=c%2B%2B', 0, 2),
	(3, 'Ultimate Python CheatSheet', 'https://ehmatthes.github.io/pcc/cheatsheets/README.html', 0, 3),
	(4, 'google', 'https://support.google.com/websearch/answer/134479?hl=en', 0, 3),
	(5, 'cplusplus.com tutorials', 'http://www.cplusplus.com/doc/tutorial/', 0, 2),
	(6, 'GDB', 'http://darkdust.net/files/GDB%20Cheat%20Sheet.pdf', 0, 3),
	(7, 'Valgrind', 'http://valgrind.org/docs/manual/quick-start.html', 0, 3),
	(8, 'vi/vim', 'http://www.glump.net/files/2012/08/vi-vim-cheat-sheet-and-tutorial.pdf', 0, 3),
	(9, 'Bash Scripting', 'http://www.asfa.k12.al.us/ourpages/auto/2016/8/10/55689107/reference_bash-cheat.pdf', 0, 3),
	(10, 'Bash Command Line', 'https://files.fosswire.com/2007/08/fwunixref.pdf', 0, 3),
	(11, 'PHP', 'http://www.digilife.be/quickreferences/qrc/php%20cheat%20sheet.pdf', 0, 3),
	(12, 'MySQL', 'http://cse.unl.edu/~sscott/ShowFiles/SQL/CheatSheet/SQLCheatSheet.html', 0, 3);
	
create table `garbage` (
	`id` int(1) not null primary key
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
