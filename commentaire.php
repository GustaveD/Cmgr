<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
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

	<p> date =<?php $_POST['id']; ?> </p>
	<?php

		$db = DataBase::getInstance();

		$prep = $db->prepare("SELECT * FROM imgs WHERE id = ? and author = ?");
		$prep->execute(array($_POST['id'], $_POST['author']));
		$img = $prep->fetch();
		var_dump($_POST['author']);
		
		var_dump($img);
		echo '<h2><a title="'.$img['author'].'"</a></h2>';
	?>
	<h1> COMMENTAIIIIRES </h1>
	<div class ="img">
		<h3>
			<em>le<?php echo $img['date'] ?></em>
		</h3>
		<img src="<?php $prep['img_path']; ?>" width=200 height=150/>
	</div>
</body>
</html>