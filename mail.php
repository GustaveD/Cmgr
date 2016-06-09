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
			$prep = $db->prepare("SELECT * FROM tokens WHERE id=?");
			if ($prep->execute(array($_GET['code']))){
				$token = $prep->fetch();
				$user = User::query($token['user']);
				$user->state = User::REGISTER;
				$user->update();
				$prep = $db->prepare("DELETE FROM tokens WHERE id=?");
				$prep->execute(array($_GET['code']));
			}
			else{
				echo "PROB CODE";
				return ;
			}
		}
	}
?>