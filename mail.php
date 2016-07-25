<?php
	session_start();
	require_once 'class/Dbase.class.php';
	require_once 'class/User.class.php';

	switch($_GET['type']){
		case "valid" : {
			$db = DataBase::getInstance();
			$prep = $db->prepare("SELECT * FROM users WHERE name=?");
			$prep->execute(array($_GET['code']));
			$use = $prep->fetch();
			$user = User::query($use['id']);
			$user->state = User::REGISTER;
			$user->update();			
			header('Location: ./index.php');
			break;
		}
		case "forgot" : {
			if (isset($_GET['mail'])){
				$mail = $_GET['mail'];
			
			if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
				echo "bad email";
			}
			$db = Database::getInstance();
				$prep = $db->prepare("SELECT * FROM users WHERE mail=?");
				$prep->execute(array($mail));
				if ($prep->rowCount() == 0) {
					echo "no User with this email";
				}
				$prep->setFetchMode(PDO::FETCH_INTO, new User(null));
				$user = $prep->fetch();
				$pwd = Tools::random_string(16);
				$user->password = hash('whirlpool', $pwd);
				//$user->password = $pwd;
				$user->update();
				Tools::sendEmail(Tools::FORGOT_TYPE, $user, $pwd);
				echo "mail send";
			}
			else
				echo "No emmail";
			break;
		}
	}
?>