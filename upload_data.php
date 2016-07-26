<?php
session_start();

require_once './class/Dbase.class.php';
require_once './class/User.class.php';

if (isset($_SESSION['user']))
{
$upload_dir = "./";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . mktime() . ".png";
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';

$path = $file;
$user_id = $_POST['login'];
$img = new img(array('path'=> $path, 'user_id' =>$user_id));
	try{
		$img->create();
	} catch (Exception $e){
		die("DB ERROR: ".$e);
	}
}
?>
