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
$db = Database::getInstance();
$stmt = $db->prepare("SELECT * FROM imgs WHERE author = ?");
$stmt->execute(array($_SESSION['user_name']));
if (isset($_SESSION['user']))
{
echo '
	<!doctype html>
	<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>Titre de la page</title>
	</head>
	<script src="script.js"></script>
	<script src="preview.js"></script>
	<body>
	<div id="align">
	<video id="video" width="640" height="480" autoplay poster="./img/masque1.png"></video>
	<canvas width="640" height="480" id="cv2"></canvas>';
while ($img = $stmt->fetch())
{
	echo "<div class='img'>";
	echo "<img src='".$img['img_path']."'width=200 height=150/>";
	echo "<p>".$img['like']."<p>";
	echo "</div>";
}
echo '
	</div>
	<div id="align">
	<input src="./img/masque1.png" type="image" class="top" onclick="set_box(0)" width="128" height="128">
	<img src="./img/masque1.png" id="e1" style="display:none;" >
		<input src="./img/masque2.png" class="top" type="image"  onclick="set_box(1)" width="128" height="128">
	<img src="./img/masque2.png" id="e2" style="display: none;" >
		<input src="./img/masque3.png" class="top" type="image" onclick="set_box(2)" width="128" height="128">
	<img src="./img/masque3.png" id="e3" style="display: none;" >
		<input src="./img/masque4.png" class="top" type="image" onclick="set_box(3)" width="128" height="128">
	<img src="./img/masque4.png" id="e4" style="display: none;" >
	<div>
	<form method="post" accept-charset="utf-8" name="form1">
		<input name="hidden_data" id="hidden_data" type="hidden"/>
		</form>
	<form method="post" enctype="multipart/form-data" action="upload.php">
	<p><input type="file" name="fichier" size="30">
		<input type="submit" name="upload" value="Uploader"><p>
	</form>
		<button style="display:none" onclick="takepick()" id="snap">Snap Photo</button>
		<button style="display:none" onclick="uploadEx()" id="up">Upload Photo</button>
	</div>
	<div>
	<canvas id="canvas" width="640" height="480"></canvas>
	</div>
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
