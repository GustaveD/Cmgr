<?php
session_start();
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once  './class/Tools.class.php';

	if (!empty($_POST)){

		$mail = DataBase::no_sql_injection($_POST['mail']);
		$name = DataBase::no_sql_injection($_POST['name']);
		$pwd = DataBase::no_sql_injection($_POST['password']);
		$errors = array();

		if (empty($name) || !preg_match('/^[a-zA-Z0-9_]+$/', $name)){
			$errors['name'] = "Votre Pseudo n'est pas valide";
		}
		else { 
			$db = DataBase::getInstance();
			$prep = $db->prepare("SELECT * FROM users WHERE name =?");
			$prep->execute(array($name));

			if ($prep->rowCount() > 0) {
				echo "IL Y A DEJA UN GROS FDP QUI PORTE SE NOM";
				echo '<script type="text/javascript">
					setTimeout(function() {
					window.location = "inscription.php"
						},2000);
					</script>';
					return ;
		}

		}
		if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)){
			$errors['mail'] = "Votre mail n'est pas valide";
		}
		else {
			$db = DataBase::getInstance();
			$prep = $db->prepare("SELECT * FROM users WHERE mail =?");
			$prep->execute(array($mail));
			if ($prep->rowCount() > 0) {
					echo "IL Y A DEJA UN GROS FDP QUI UTILISE CE MAIL";
						echo '<script type="text/javascript">
					setTimeout(function() {
							window.location = "inscription.php"
								},2000);
					</script>';
						return ;
			}
		}
		if (empty($pwd) || $pwd != $_POST['password_confirm']){
			$error['password'] = "Votre Password n'est pas valide";
		}

		if (strlen($pwd) < 5 || strlen($name) < 5) {
		echo "LE MOT DE PASSE ET TON PSEUDO DOIVENT COMPORTER AU MOINS 5 CARACTERES";
		echo '<script type="text/javascript">
			setTimeout(function() {
			window.location = "inscription.php"
				},2000);
			</script>';
			return;
		}

		//$name = preg_replace('/<[^>]*>/', '', $name);
		$user = new User(array('mail' => $mail, 'name' =>$name, 'pass' =>$pwd));
		try{
			$user->create();
		} catch (Exception $e){
			die("DB ERROR: ". $e);
		}
	}
?>
