<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
session_start();

if (isset($_POST['upload']))
{
	$content_dir = 'img/';
	$tmp_file = $_FILES['fichier']['tmp_name'];
	if (!is_uploaded_file($tmp_file))
		exit("Le Fichier est introuvable");
	$type_file = $_FILES['fichier']['type'];
	if (!strstr($type_file, 'jpg') &&
		!strstr($type_file, 'jpeg') &&
		!strstr($type_file, 'bmp') &&
		!strstr($type_file, 'png'))
		exit("Le fichier n'est pas une image");
	$name_file = $_FILES['fichier']['name'];
	if (preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name_file))
		exit("Nom de fichier non valide");
	else if (!move_uploaded_file($tmp_file, $content_dir.$name_file))
		exit ("impossible de copier le fichier dans $content_dir");
	echo "Le fichier a bien ete upload";

	$img = new Img(array('author' => $_SESSION['user_name'], 'img_path' => $content_dir . $name_file));
	try{
		$img->create();
	}
	catch (Exception $e){
		die("DB ERROR: " . $e);
	}
}
?>