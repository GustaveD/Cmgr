<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
require_once './class/Comment.class.php';
session_start();

$author = DataBase::no_sql_injection($_POST['author']);
$id = DataBase::no_sql_injection($_POST['id']);
echo $id;
$db = DataBase::getInstance();
$prep = $db->prepare("SELECT * FROM imgs WHERE id = ? and author = ?");
$prep->execute(array($id, $author));
$img = $prep->fetch();

$db = DataBase::getInstance();
$prep = $db->prepare("SELECT * FROM comments WHERE content = ?ORDER BY date DESC ");
$prep->execute(array($id));

while ($com = $prep->fetch()){
	$coms[] = $com;
}

?>
<html>
<head>
	<title>COMMENTAIRES</title>
	<link rel="stylesheet" href="style.css">
</head>
</head>
<body>
	<header>
		<div id = "logo"><a href="./index.php"><img src="./img/logo.png" width="75px" height="75px" alt ="logo du site" title="Tof-Ouf"></a></div>
		<div id = "title"><h1> TOF-OUF</h1> </div>
	</header>

	<h1> COMMENTAIIIIRES </h1>
	<div class ="img">
		<h3>
			<em>le <?php echo $img['date'] ?></em>
		</h3>
		<img src="<?php echo $img['img_path']; ?>" width=200 height=150/>
	</div>
	<h2>Commentaires:</h2>
	<?php foreach ($coms as $coms): ?>
		<p><strong><?php echo htmlspecialchars($coms['author']);?>
		<br>
		</strong> le <?php echo nl2br($coms['date']); ?></p>
		<p><?php echo nl2br(htmlspecialchars($coms['post']));?></p>
		<br>
	<?php endforeach; ?>
</body>
</html>