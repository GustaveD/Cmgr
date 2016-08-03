<?php
session_start();
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
?>
<html>
<head>
	<title>MONTAGE</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style01.css">
</head>
<body>
	<header>
		<div id = "logo"><a href="./index.php"><img src="./img/logo.png" width="75px" height="75px" alt ="logo du site" title="Tof-Ouf"></a></div>
		<div id = "title"><h1> TOF-OUF</h1> </div>
	</header>
	<?php
if (isset($_SESSION['user']))
{
echo '
	<!doctype html>
	<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>Titre de la page</title>
	</head>
	<body>
	<div id="align">
	<video id="video" width="640" height="480" autoplay></video>
	</div>

	<div id="align">
	<form method="post" value="Upload">
		<input src="./img/masque1.png" type="image" id="top" onclick="uploadEx(1)" width="128" height="128">
		<input src="./img/masque2.png" type="image" id="top" onclick="uploadEx(2)" width="128" height="128">
		<input src="./img/masque3.png" type="image" id="bot" onclick="uploadEx(3)" width="128" height="128">
		<input src="./img/masque4.png" type="image" id="bot" onclick="uploadEx(4)" width="128" height="128">
			<input type="submit" value="select">
		</form>
		<div>
	<button onclick="takepick()" id="snap">Snap Photo</button>
	</div>
	<form method="post" accept-charset="utf-8" name="form1">
		<input name="hidden_data" id="hidden_data" type="hidden"/>
		</form>
	<form method="post" enctype="multipart/form-data" action="upload.php">
	<p><input type="file" name="fichier" size="30">
		<input type="submit" name="upload" value="Uploader"><p>
	</form>
	<div>
	<canvas id="canvas" width="640" height="480"></canvas>
	</div>
	<script src="script.js"></script>
	</body>
	</html>';
}
else
	echo 'GROS FILS DE PUTE CONNECTE TOI (MERDE)';
	//header("Location: ./index.php");
?>
<footer id = "footer_site">
<p id="copyright">© jrosamon  Tous droits réservés: <a href="http://www.42.fr">www.42.fr</a></p>
	<div></div>
</footer>
</body>
</html>