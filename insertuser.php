<?php
session_start();
require_once './class/Dbase.class.php';
require_once './class/User.class.php';

	$mail = $_POST['mail'];
	$name = $_POST['name'];
	$pwd = $_POST['password'];

	if (!$mail || !$name || !$pwd || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		echo "UN/LES CHAMPS NE SONT PAS VALID GROS FDP";
			echo '<script type="text/javascript">
		setTimeout(function() {
			window.location = "inscription.php"
				},2000);
	</script>';
			return ;
	}

	if (strlen($pwd) < 5 || strlen($name) < 5)
	{
		echo "LE MOT DE PASSE ET TON PSEUDO DOIVENT COMPORTER AU MOINS 5 CARACTERES";
			echo '<script type="text/javascript">
		setTimeout(function() {
			window.location = "inscription.php"
				},2000);
	</script>';
		return;
	}

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
	$name = preg_replace('/<[^>]*>/', '', $name);
	$user = new User(array('mail' => $mail, 'name' =>$name, 'pass' =>$pwd));
	try{
		$user->create();
	} catch (Exception $e){
		die("DB ERROR: ". $e);
	}
?>
