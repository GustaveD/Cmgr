<?php
session_start();
require_once './class/Dbase.class.php';
?>

<?php if (isset($_SESSION['user'])): ?>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style01.css">
</head>
<body>
	<header>
			<div class = "boxes">
				<div class ="box-content">
					<div id = "logo"><a href="./index.php"><img src="./img/logocamagru2.png" width	="100%" height="100%" alt ="logo du site" title="Tof-Ouf"></a></div>
				</div>
				<div class="box-content">
					<a id ="logout" href = "logout.php">Se deconnecter</a>
				</div>
			</div>
	</header>
<?php else: ?>
<?php include 'notlog.php'; ?>
<?php endif ?>