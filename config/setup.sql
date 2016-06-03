
CREATE DATABASE IF NOT EXISTS `camagru` (
	`id` varchar(36) NOT NULL,
	`post` varchar(36) DEFAULT NULL,
	`author` varchar(36) DEFAULT NULL,
	`state` enum('SHOWN', 'DELETED', 'EDITED', 'MODERATED') NOT NULL DEFAULT 'SHOWN',
	`content` text,
	`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
)	ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(36) NOT NULL,
  `mail` text,
  `name` text,
  `password` text,
  `role` enum('USER','ADMIN','MODERATOR') DEFAULT 'USER',
  `state` enum('NEED_VALIDATION','FORGET_PASSWD','REGISTERED','DELETED') NOT NULL DEFAULT 'NEED_VALIDATION'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
