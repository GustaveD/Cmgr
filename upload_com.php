<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
require_once './class/Comment.class.php';
session_start();

if (isset($_SESSION['user']))
{
		$content = preg_replace('/<[^>]*>/', '', $_GET['comment']);
		$com = new Comment(array('author' => $_SESSION['user_name'], 'post' => $content));
		try {
			$com->create();
		}
		catch (Exception $e){die("DB ERROR: ". $e);}
		echo "OOOK";
}
else
	echo "fuuck";

?>