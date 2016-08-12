<?php
include_once('./config/setup.php');
session_start();
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
				<div id = "logo"><a href="./index.php"><img 	src="./img/logo.png" width	="75px" height="75px	" alt ="logo du site" title="Tof-Ouf"></a></div>
			</div>
			<div class="box-content">
				<div id = "title"><h1> TOF-OUF</h1> </div>
			</div>
			<div class="box-content">
				<div id="connexion">
				<form method="post" action="connexion.php">
					<label for="id">Identifiant</label>
					<input id = "login" name="login" type ="text" required />
					</br>
					<label for="mdp">Mot de Passe</label>
					<input id = "mdp" name = "mdp" type = "password" required />
					</br>
					<a href="forgot_mail.php">Mot de Passe 	oublié?</a>
					<input type ="submit" value="Connexion">
				</form>
				<a id ="logout" href = "logout.php">Se 	deconnecter</a>
				</div>
			</div>
		</div>
	</header>
	<nav id ="menu_top">
		<ul>
			<li><a id ="Montage" href = "take_photo.php">Montage</a></li>
			<li><a id ="Galerie" href = "galerie.php">Galerie</a></li>
			<li><a id ="inscription" href = "inscription.php">S'inscrire</a></li>
		</ul>
	</nav>
	<footer id = "footer_site">
<p id="copyright">© jrosamon  Tous droits réservés: <a href="http://www.42.fr">www.42.fr</a></p>
	<div></div>
</footer>

</body>
</html>
