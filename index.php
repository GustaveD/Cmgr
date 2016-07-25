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
		<div id = "logo"><a href="./index.php"><img src="./img/logo.png" width="75px" height="75px" alt ="logo du site" title="Tof-Ouf"></a></div>
		<div id = "title"><h1> TOF-OUF</h1> </div>
		<!--<div id = "img-logo"><img src="./img/logo.png"></div>-->
		<section id="connexion">
		<form method="post" action="connexion.php">
			<label for="id">Identifiant</label>
			<input id = "login" name="login" type ="text" required />
		</br>
			<label for="mdp">Mot de Passe</label>
			<input id = "mdp" name = "mdp" type = "password" required />
			<!--<a href="#" id = "pwd_oubli"> Mot de Passe oulbié?</a>-->
			</br>
			<a href="forgot_mail.php">Mot de Passe oublié?</a>
			<input type ="submit" value="Connexion">
		</form>
		</section>
	</header>
	<nav id ="menu_top">
		<ul>
			<li><a href="#">Actualités</a></li>
			<li><a href="#">Pages</a></li>
			<li><a id ="deco" href = "inscription.php">S'inscrire</a></li>
			<li><a id ="deco" href = "logout.php">Se deconnecter</a></li>
		</ul>
	</nav>
	<footer id = "footer_site">
<p id="copyright">© jrosamon  Tous droits réservés: <a href="http://www.42.fr">www.42.fr</a></p>
	<div></div>
</footer>

</body>
</html>