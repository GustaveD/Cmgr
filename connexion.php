<?php
session_start();
require_once './class/Dbase.class.php';
require_once './class/User.class.php';

	$login = $_POST['login'];
	$pwd = $_POST['mdp'];

	if (!$pwd || !$login){
		echo "bad pwd or login";
		return ;
	//	header('Location: ./index.php');
	}
	if (isset($_SESSION['user'])){
		echo "already log";
		return ;
		//header('Location: ./index.php');
	}

	$pwd = hash('whirlpool', $pwd);

	$db = Database::getInstance();
	$stmt = $db->prepare("SELECT * FROM users WHERE name=? AND password=?");
	$stmt->setFetchMode(PDO::FETCH_INTO, new User(null));
	$stmt->execute(array($login, $pwd));

	if ($stmt->rowCount() > 0) {
		$user = $stmt->fetch();
		if ($user->state === User::NEED_VALID || $user->state === User::DELTD) {
			echo "you need to valid or your compt has been deleted";
			//header('Location: ./index.php');
			return ;
		}
		$_SESSION['user'] = $user->id;
		$_SESSION['user_name'] = $user->name;
		echo "hello " . $_SESSION['user_name'];
		//header('Location: ./index.php');
		}
	else
		echo "no compte correspond";
		//header('Location: ./index.php');
?>
