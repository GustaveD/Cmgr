<?php
session_start();
include ('./config/database.php');

try {
    $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e) {
      echo $e->getMessage();
}

if (isset($_POST['login'], $_POST['mdp'])){
	if (!empty($_POST['login']) && !empty($_POST['mdp'])){
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$newlogin = $db->prepare("INSERT INTO users () VALUES ($login, $mdp)");
		$newlogin->execute()
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
	}
}
?>