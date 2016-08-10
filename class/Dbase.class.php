<?php

require './config/database.php';

class DataBase{
	static function getInstance(){
		global $DB_DSN, $DB_USER, $DB_PASSWORD;
		try{
			$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			die("DB ERROR: ". $e);
		}
		return $db;
	}

	public static function sqli_connect(){
		$link = mysqli_connect("localhost", "root", "root", "cama" or die($link));
		return ($link);
	}

	public static function no_sql_injection($str){
		if (get_magic_quotes_gpc()){
				$sanitize = stripcslashes($str);
			} else {
				$sanitize = stripcslashes($str);
		return $sanitize;

		}
	}
}
?>
