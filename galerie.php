<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
session_start();

$db = Database::getInstance();
$prep = $db->prepare("SELECT COUNT(img_path) as nbImg FROM imgs");
$prep->execute();
$data = $prep->fetch();

if (isset($_GET['p']))
	$cPage = DataBase::no_sql_injection($_GET['p']);
else
	$cPage = 1;

$nbImg = $data['nbImg'];
$perPage = 10;
$nbPage = ceil($nbImg/$perPage);

$db = Database::getInstance();
$prep = $db->prepare("SELECT * FROM imgs ORDER BY date DESC LIMIT ".(($cPage - 1)*$perPage).", $perPage");
$prep->execute();
while ($img = $prep->fetch()){
	$post[] = $img;
}
?>

<?php if(isset($_SESSION['user'])): ?>
<!DOCTYPE html>
<html>
<head>
	<title>Camagru</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<div class = "boxes">
			<div class ="box-content">
				<div id = "logo"><a href="./index.php"><img src="./img/logocamagru2.png" width	="100%" height="100%" alt ="logo du site" title="Tof-Ouf"></a></div>
				</div>
				<div class="box-content">
			<a id ="logout" href = "logout.php">Se deconnecter</a></div>

	</header>
<?php else: ?>
<!DOCTYPE html>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<div class = "boxes">
			<div class ="box-content">
				<div id = "logo"><a href="./index.php"><img src="./img/logocamagru2.png" width	="100%" height="100%" alt ="logo du site" title="Tof-Ouf"></a></div>
				<div class="box-content">
				<div id="connexion">
				<form method="post" action="connexion.php">
					<label for="id">Identifiant</label>
					<input id = "login" name="login" type ="text" required />
					</br>
					<label for="mdp">Mot de Passe</label>
					<input id = "mdp" name = "mdp" type = "password" required />
					</br>
					<input id="button" type ="submit" value="Connexion">
				</form>
				<a href="forgot_mail.php">Mot de Passe 	oublié?</a></br>
				</div>
			</div>
		</div> 
	</header>
<?php endif ?>

<?php if($post)
		 foreach ($post as $post): ?>
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
			<input type="hidden" name="id_img" value="<?php echo $post['id']; ?>"/>
			<input type="submit" value="Envoyer"/>
		</form>
			<a href="delete.php?id=<?php echo $post['id']; ?>&author=<?php echo $post['author']; ?>"> X </a>
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
		<p id="cumugra"><a href="./index.php">cumUgra</a></p>
	</footer>
</body>
</html>
