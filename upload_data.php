<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
session_start();


$upload_dir = "./img/";
$img = $_POST['hidden_data'];
$Msq = $_POST['variable1'];
$Msq = "./img/masque".$Msq.".png";

$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $_SESSION['user_name'] . mktime() . ".png";
$success = file_put_contents($file, $data);
$stamp = imagecreatefrompng($Msq);
$im = imagecreatefrompng($file);
$thumb = imagecreate(170, 170);
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);
imagecopyresized($thumb, $stamp, 0, 0, 0, 0, 170, 170, $sx, $sy);
imagepng($thumb);

imagecopy($im, $thumb, 210, 130, 0, 0, imagesx($thumb) , imagesy($thumb));

imagepng($im, $file);
imagedestroy($im);
print $success ? $file : 'Unable to save the file.';

$path = $file;
$img = new Img(array('author' =>$_SESSION['user_name'], 'img_path'=>$path));
	try{
		$img->create();
	} catch (Exception $e){
		die("DB ERROR: ". $e);
	}
?>
