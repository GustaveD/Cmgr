<?php
session_start();
require_once './class/Dbase.class.php';
require_once './class/User.class.php';

/*if (isset($_POST['name'], $_POST['password'], $_POST['mail'])){
	if (!empty($_POST['name']) && !empty($_POST['password'])&& !empty($_POST['mail']))
	{*/
		$mail = $_POST['mail'];
		$name = $_POST['name'];
		$pwd = $_POST['password'];

		$user = new User(array('mail' => $mail, 'name' =>$name, 'pass' =>$pwd));
		try{
			$user->create();
		} catch (Exception $e){
			die("DB ERROR: ". $e);
		}
	//}
//}
?>
