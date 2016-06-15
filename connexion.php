<?php
session_start();
require_once './class/Dbase.class.php';
require_once './class/User.class.php';

/*try {
    $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e) {
      echo $e->getMessage();
}
*/
	//Get $_POST information
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
	//$pwd = hash('whirlpool', $pwd);

	$db = Database::getInstance();
			$stmt = $db->prepare("SELECT * FROM users WHERE name=? AND password=?");
			$stmt->setFetchMode(PDO::FETCH_INTO, new User(null));
			$stmt->execute(array($login,  $pwd));


	if ($stmt->rowCount() == 1) {
		$user = $stmt->fetch();
		if ($user->state === User::NEED_VALID || $user->state === User::DELTD) {
			echo "you need to valid or your compt has been deleted";
			//header('Location: ./index.php');
			return ;
		}
		$_SESSION['user'] = $user->id;
		$_SESSION['user_name'] = $user->name;
		echo "hello".$_SESSION['user_name'];
		//header('Location: ./index.php');
		}
	else
		echo "no compte correspond";
		//header('Location: ./index.php');


/*
if (isset($_POST['login'], $_POST['mdp'])){
	if (!empty($_POST['login']) && !empty($_POST['mdp'])){
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$login_q = $db->prepare("SELECT * FROM users WHERE login = :login AND pass = :mdp AND valid = 'l'");
		$login_q->execute(array('login' => $login, 'mdp' => $mdp));

	/*if ($login_q->fetchColumn() > 0){
		$user = $login_q>fetch(PDO::FETCH_OBJ);
		$token = shal(uniqid().$user->id.shal(uniqid()));
		setcookie('token', $token, time() + 3600);
		$user_id = $user->id;
		$setToken_q = &$bdd->prepare("UPDATE users SET token = :token, token_date = NOW() WHERE id = :user_id");
		$setToken_q->execute(array('token' => $token, 'user_id' =>$user_id));
		$token = null;
		$_SESSION['login'] = $user->login;
		header('Location: connexion.php');
		exit();
	}*/
	/*else{
		echo "MOT DE PASSE INCORRECT";
	}*/

?>