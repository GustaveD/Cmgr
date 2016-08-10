<?php
session_start();
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
require_once  './class/Tools.class.php';

	if (!empty($_POST)){

		$errors = array();

		if (empty($_POST['name']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['name'])){
			$errors['name'] = "Votre Pseudo n'est pas valide";
		}
		if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
			$errors['mail'] = "Votre mail n'est pas valide";
		}
		if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
			$error['password'] = "Votre Password n'est pas valide";
		}

		Tools::debug($errors);

	}
?>