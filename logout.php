<?php
session_start();
require_once './class/Dbase.class.php';
require_once './class/User.class.php';

if (isset($_SESSION['user']))
{
	unset($_SESSION['user']);
	unset($_SESSION['user_name']);
	echo "You are Logout";
	//header("Location: ./index.php");
}
else
	echo "Need to log for logout :)";
	//header("Location: ./index.php");
?>