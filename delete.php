<?php
require_once './class/Dbase.class.php';
require_once './class/Img.class.php';
session_start();

if (isset($_SESSION['user'])){
	if (isset($_GET['id'], $_GET['author'])){

		$id = DataBase::no_sql_injection($_GET['id']);
		$author = DataBase::no_sql_injection($_GET['author']);
		$post = Img::query($id, $author);
		if ($post == null)
			echo "no post to delete";
		if ($post->author != $_SESSION['user_name']){
			echo "You are not the author of the post";
		} else{
			$post->delete($id, $author);
		}
	} else
		echo "problem with image";
} else
	echo "need to log for delete post";

?>