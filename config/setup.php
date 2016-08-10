<?php
	require_once './class/Dbase.class.php';

	try{
		$db = new PDO('mysql:host=localhost;charset=utf8');
	}
	catch (PDOException $e){
		echo 'Connexion echouee' . $e->getMessage();
	}
	$requete = "CREATE DATABASE IF NOT EXISTS cama DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->prepare($requete)->execute();
	$co = DataBase::getInstance();
	$req = "CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `mail` text,
  `name` text,
  `password` text,
  `role` enum('USER','ADMIN','MODERATOR') DEFAULT 'USER',
  `state` enum('NEED_VALIDATION','FORGET_PASSWD','REGISTERED','DELETED') NOT NULL DEFAULT 'NEED_VALIDATION'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	$co->prepare($req)->execute();

	$req = "CREATE TABLE IF NOT EXISTS `comments` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `post` varchar(36) DEFAULT NULL,
  `author` varchar(36) DEFAULT NULL,
  `state` enum('SHOWN','DELETED','EDITED','MODERATED') DEFAULT 'SHOWN',
  `content` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	$co->prepare($req)->execute();

	$req = "CREATE TABLE IF NOT EXISTS `imgs` (
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`img_path` varchar(36) DEFAULT NULL,
		`author` varchar(36) DEFAULT NULL,
		`likes` INT NOT NULL,
		`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	$co->prepare($req)->execute();


	$req = "CREATE TABLE IF NOT EXISTS `likes` (
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`author` varchar(36) DEFAULT NULL,
		`post` varchar(36) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	$co->prepare($req)->execute();

	$req = "CREATE TABLE IF NOT EXISTS `tokens` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user` varchar(36) DEFAULT NULL,
  `type` enum('FORGOT_PASSWORD','REGISTER') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	$co->prepare($req)->execute();

?>