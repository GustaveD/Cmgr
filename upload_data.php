<?php
session_start();

echo 'test1';

require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';

$upload_dir = "./";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $_SESSION['user_name'] . mktime() . ".png";
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';

$path = $file;
$img = new Img(array('author' =>$_SESSION['user_name'], 'img_path'=>$path));
	try{
		$img->create();
	} catch (Exception $e){
		die("DB ERROR: ".$e);
	}
?>
