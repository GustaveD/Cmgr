<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
session_start();
?>
<html>
<head>
	<title>GALERIE</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<div id = "logo"><a href="./index.php"><img src="./img/logo.png" width="75px" height="75px" alt ="logo du site" title="Tof-Ouf"></a></div>
		<div id = "title"><h1> TOF-OUF</h1> </div>
	</header>
<?php
$db = Database::getInstance();
$stmt = $db->prepare("SELECT * FROM imgs");
$stmt->execute();
while ($img = $stmt->fetch())
{
	echo "<div class='img'>";
	echo '<h2><a title="'.$img['nom'].'" href="page.php?id='.$img['id'].'">'.$img['author'].'</a></h2>';
	echo "<img src='".$img['img_path']."'width=200 height=150/>";
	echo "<p>".$img['like']."<p>";
	echo "<br> <br>";
	echo "<form action ='upload_com.php' method='post'";
	echo "<label for='message'>Commentaire</label> : <input type='text' name='comment' id ='message'/>";
	echo "<input type='submit' value='Envoyer'/>";
	echo "<a href='commentaire.php?commentaire='".$img['author'].">Voir les Commentaire</a>";
	echo "<br> <br>";
	echo "</form>";
	echo "</div>";
}
echo "<div class='spacer'></div>";
?>
<footer id = "footer_site">
<p id="copyright">© jrosamon  Tous droits réservés: <a href="http://www.42.fr">www.42.fr</a></p>
	<div></div>
</footer>
</body>
</html>