<?php
	session_start();
	require_once 'class/Dbase.class.php';
	require_once 'class/User.class.php';

	switch($_GET['type']){
		case "valid" : {
		//	if (!$_GET['code'] || !Tools::is_uuid($_GET['code'])){
		//		echo "BAD CODE";
		//		return ;
		//	}
			$db = DataBase::getInstance();
			$prep = $db->prepare("SELECT * FROM users WHERE name=?");
			$prep->execute(array($_GET['code']));
			$use = $prep->fetch();
			$user = User::query($use['id']);
			$user->state = User::REGISTER;
			$user->update();
			
		/*	else{
				echo "PROB CODE";
				return ;
			}*/
		}
	}
?>