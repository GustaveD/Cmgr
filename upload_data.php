<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once './class/Img.class.php';
session_start();


$upload_dir = "./img/";
$img = $_POST['hidden_data'];
$Msq = $_POST['variable1'];
$Msq = "masque".$Msq.".png";

$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $_SESSION['user_name'] . mktime() . ".png";
$success = file_put_contents($file, $data);
$stamp = imagecreatefrompng($Msq);
$im = imagecreatefrompng($file);
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);
$sx = $sx;
$sy = $sy;

imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp) , imagesy($stamp));

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