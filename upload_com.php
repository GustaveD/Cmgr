<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
require_once './class/Comment.class.php';
require_once './class/Tools.class.php';
session_start();

	if (isset($_SESSION['user']))
	{
		echo $_POST['comment'];
			$content = preg_replace('/<[^>]*>/', '', $_POST['comment']);
			$com = new Comment(array('author' => $_SESSION['user_name'], 'content' => $_SESSION['user'], 'post' => $content));
			try {
				$com->create();
			}
			catch (Exception $e){die("DB ERROR: ". $e);}

			$db = DataBase::getInstance();
			$prep = $db->prepare("SELECT * FROM users WHERE name = ?");
			$prep->setFetchMode(PDO::FETCH_INTO, new User(null));
			$prep->execute(array($_POST['author']));
			$author = $prep->fetch();

			Tools::sendEmail(Tools::NEW_COMMENT, $author, $com);
			echo "OOOK";
	}
	else
		echo "fuuck";
?>
