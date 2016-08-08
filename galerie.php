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
$prep = $db->prepare("SELECT COUNT(img_path) as nbImg FROM imgs");
$prep->execute();
$data = $prep->fetch();

if (isset($_GET['p'])){
	$cPage = $_GET['p'];
}
else{
	$cPage = 1;
}

$nbImg = $data['nbImg'];
$perPage = 10;
$nbPage = ceil($nbImg/$perPage);
echo ($nbPage);


$db = Database::getInstance();
$prep = $db->prepare("SELECT * FROM imgs ORDER BY date DESC LIMIT ".(($cPage - 1)*$perPage).", $perPage");
$prep->execute();
while ($img = $prep->fetch())
{
	echo "<div class='img'>";
	echo '<h2><a title="'.$img['author'].'" href="page.php?id='.$img['id'].'">'.$img['author'].'</a></h2>';
	echo "<img src='".$img['img_path']."'width=200 height=150>";
	echo "<p>".$img['like']."</p>";
	echo "<p>".$img['date']."</p>";
	echo "<br> <br>";
	echo "<form action ='upload_com.php' method='post'";
	echo "<label for='message'>Commentaire</label> : 
		<input type='text' name='comment' id ='message'/>";
	echo "<input type='hidden' name = 'author' value='".$img['author']."'>";
	echo "<input type='submit' value='Envoyer'/>";
	echo "</form>";

	echo "<form action='commentaire.php' method='post'>";
	echo "<input type ='hidden' name='author' value='".$img['author']."'>";
	echo "<input type ='hidden' name='id' value='".$img['id']."'>";
	echo "<input type='submit'  name ='commentaires' value='commentaire'>";
	echo "</form>";
	echo "<br> <br>";
	echo "</div>";
}
echo "<div class='spacer'></div>";

for ($i = 1; $i <= $nbPage; $i++){
	echo "<a href=\"commentaire.php?p=$i\">$i</a> /";
}

?>
<footer id = "footer_site">
<p id="copyright">© jrosamon  Tous droits réservés: <a href="http://www.42.fr">www.42.fr</a></p>
	<div></div>
</footer>
</body>
</html>