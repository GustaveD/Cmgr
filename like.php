<?php
require_once "./class/Dbase.class.php";
require_once "./class/Tools.class.php";
session_start();
if (isset($_GET['type'], $_GET['id'], $_SESSION['user'])){

	$type = DataBase::no_sql_injection($_GET['type']);
	$id = DataBase::no_sql_injection($_GET['id']);
	$author = DataBase::no_sql_injection($_GET['author']);
	
	switch ($type) {
		case 'post':
			$db = DataBase::getInstance();
			$prep = $db->prepare("SELECT * FROM likes WHERE post=? AND author=?");
			$prep->execute(array($id, $author));

			if ($prep->rowCount() === 0){
				$prep = $db->prepare("INSERT INTO likes (post, author) VALUES (?, ?)");
				$prep->execute(array($id, $author));
			}
			else{
				$prep = $db->prepare("DELETE FROM likes WHERE post=? and author=?");
				$prep->execute(array($id, $author));
			}

			$prep = $db->prepare("SELECT COUNT(*) AS nb FROM likes WHERE post=? and author =?");
			$prep->execute(array($id, $author));
			$nb = $prep->fetch();
			echo $nb['nb'];
			$prep = $db->prepare("UPDATE imgs set likes =? WHERE author =? AND id =?");
			$prep->execute(array($nb['nb'], $author, $id));
			echo '<script type="text/javascript">
		setTimeout(function() {
			window.location = "galerie.php"
				},2000);
	</script>';
			break;
		}
} else{
	echo "Need to log for comment";
	echo '<script type="text/javascript">
		setTimeout(function() {
			window.location = "galerie.php"
				},2000);
	</script>';
}
?>
