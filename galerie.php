<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
session_start();
$db = Database::getInstance();
$prep = $db->prepare("SELECT COUNT(img_path) as nbImg FROM imgs");
$prep->execute();
$data = $prep->fetch();

if (isset($_GET['p'])){
	$cPage = DataBase::no_sql_injection($_GET['p']);
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
while ($img = $prep->fetch()){
	$post[] = $img;
}

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

<?php foreach ($post as $post): ?>
	<div class="posts">
		<h3><?php echo $post['author']; ?></h3>
		<img src="<?php echo $post['img_path']; ?>" width=200 height=150>
		<a href="like.php?type=post&id=<?php echo $post['id']; ?>&author=<?php echo $post['author']; ?>">like</a>
		<p><?php echo $post['likes']; ?> people like this </p>
		<p><?php echo $post['date']; ?></p>
		<br><br>
		<form action="upload_com.php" method="post">
			<label for='message'>Commentaires</label>
			<input type="text" name="comment" id='message'/>
			<input type="hidden" name="author" value="<?php echo $post['author']; ?>"/>
			<input type="submit" value="Envoyer"/>
		</form>
		<form action ="commentaire.php" method="post"/>
			<input type="hidden" name="author" value="<?php echo $post['author']; ?>"/>
			<input type="hidden" name="id" value="<?php echo $post['id']; ?>"/>
			<input type='submit' name="commentaires" value="commentaire"/>
		</form>
		<br><br>
	</div>
<?php endforeach; ?>
<?php  for ($i = 1; $i <= $nbPage; $i++) : ?>
	<a href="galerie.php?p=<?php echo $i; ?>"> <?php echo $i; ?> / </a>
<?php endfor; ?>
<footer id = "footer_site">
<p id="copyright">© jrosamon  Tous droits réservés: <a href="http://www.42.fr">www.42.fr</a></p>
	<div></div>
</footer>
</body>
</html>