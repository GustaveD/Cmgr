<?php
	session_start();
	include_once('./config/setup.php');
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title> Camagru</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<div class = "boxes">
			<div class ="box-content">
				<div id = "logo"><a href="./index.php"><img src="./img/logocamagru2.png" width	="100%" height="100%" alt ="logo du site" title="Tof-Ouf"></a></div>
			</div>
<?php if (!isset($_SESSION['user'])): ?>
			<div class="box-content">
				<div id="connexion">
				<form method="post" action="connexion.php">
					<label for="id">Identifiant</label>
					<input id = "login" name="login" type ="text" required />
					</br>
					<label for="mdp">Mot de Passe</label>
					<input id = "mdp" name = "mdp" type = "password" required />
					</br>
					<input id="button" type ="submit" value="Connexion">
				</form>
				<a href="forgot_mail.php">Mot de Passe 	oublié?</a></br>
				</div>
			</div>
		</div>
<?php else: ?>
	<div class="box-content">
		<a id ="logout" href = "logout.php">Se deconnecter</a></div>
	</div>
<?php endif ?>
	</header>