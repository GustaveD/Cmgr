<?php
include './config/database.php';

try {
	$db = new PDO('mysql:host=localhost;charset=utf8');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
$requete = "CREATE DATABASE IF NOT EXISTS `".$DB_NAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$db->prepare($requete)->execute();

$connexion = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_NAME, $DB_USER, $DB_PASSWORD);
if ($connexion){
	$req = "CREATE TABLE IF NOT EXISTS `".$DB_NAME."`.`".$DB_TABLE."` (
				`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
				`mail` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
				`login` VARCHAR(150) NOT NULL,
				`token` VARCHAR(150) NOT NULL,
				`token_date` DATETIME NOT NULL,
				`pass` VARCHAR(50) NOT NULL,
				`valid` tinyint(1) NOT NULL DEFAULT 1
				) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
$connexion->prepare($req)->execute();
}
?>