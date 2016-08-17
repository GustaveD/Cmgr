<?php
require_once './class/Dbase.class.php';
require_once 'header2.php';
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
<?php if($post) foreach ($post as $post): ?>
	<div class="inscribody">
		<div class="inscri-content">
			<div id="title"><h2><?php echo $post['author']; ?></h2><div>
			<div id="image_galerie"><img src="<?php echo $post['img_path']; ?>" width=200 height=150></div>
		<div class ="inscri-content">
			<a href="like.php?type=post&id=<?php echo $post['id']; ?>&author=<?php echo $post['author']; ?>">like</a>
			<p><?php echo $post['likes']; ?> people like this </p>
			<p><?php echo $post['date']; ?></p>
			<form action="upload_com.php" method="post">
				<label for='message'>Commentaires</label>
				<input type="text" name="comment" id='message'/>
				<input type="hidden" name="author" value="<?php echo $post['author']; ?>"/>
				<input type="hidden" name="id_img" value="<?php echo $post['id']; ?>"/>
				<input type="submit" value="Envoyer"/>
			</form>
			<a href="delete.php?id=<?php echo $post['id']; ?>&author=<?php echo $post['author']; ?>"> Delete </a>
		</div>
			<form action ="commentaire.php" method="post"/>
			<input type="hidden" name="author" value="<?php echo $post['author']; ?>"/>
			<input type="hidden" name="id" value="<?php echo $post['id']; ?>"/>
			<input type='submit' name="commentaires" value="commentaire"/>
			</form>
	</div>
<?php endforeach; ?>
<?php  for ($i = 1; $i <= $nbPage; $i++) : ?>
	<a href="galerie.php?p=<?php echo $i; ?>"> <?php echo $i; ?> / </a>
<?php endfor; ?>
<?php require_once 'footer.php'; ?>
