<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php'
require_once './class/Comment.class.php';
session_start();
?>
<html>
<head>
	<title>COMMENTAIRE</title>
	<link rel="stylesheet" href="style.css">
</head>
</head>
<body>
	<header>
		<div id = "logo"><a href="./index.php"><img src="./img/logo.png" width="75px" height="75px" alt ="logo du site" title="Tof-Ouf"></a></div>
		<div id = "title"><h1> TOF-OUF</h1> </div>
	</header>
	<?php
	$db->Database::getInstance();
	$prep = $db->prepare("SELECT ? from imgs");
	?>

</body>
</html>