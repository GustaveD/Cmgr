<?php
require_once './class/Dbase.class.php';
require_once './header2.php';
session_start();

$author = DataBase::no_sql_injection($_POST['author']);
$id = DataBase::no_sql_injection($_POST['id']);
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
	<div class="inscribody">
		<div class="inscri-content">
			<h1> COMMENTAIIIIRES </h1>
		</div>
		<div class ="inscri-content">
			<h3><em>le <?php echo $img['date'] ?></em></h3>
			<img src="<?php echo $img['img_path']; ?>" width=200 height=150/>
			<h2>Commentaires:</h2>
		<?php if ($coms)
			 foreach ($coms as $coms): ?>
			<p><strong><?php echo htmlspecialchars($coms['author']);?>
			<br>
			</strong> le <?php echo nl2br($coms['date']); ?></p>
			<p><?php echo nl2br(htmlspecialchars($coms['post']));?></p>
			<br>
		<?php endforeach; ?>
	</div>
<?php require_once 'footer.php'; ?>