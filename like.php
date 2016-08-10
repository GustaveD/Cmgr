<?php
require_once "./class/Dbase.class.php";

if (isset($_GET['type'], $_GET['id'])){

	$type = $_GET['type'];
	$id = (int)$_GET['id'];
	$author =  $_GET['author'];

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
			$prep = $db->prepare("UPDATE imgs set likes = $nb WHERE author = $author AND id = $id");
			$prep->execute(array($author, $id));
			$like = $prep->fetch();
			echo $like['like'];
			break;
	}
}	
?>