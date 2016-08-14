<?php
session_start();
require_once './class/Dbase.class.php';
require_once './class/User.class.php';

if (isset($_SESSION['user']))
{
echo'<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style01.css">
</head>
<body>
	<header>
		<a href="./index.php"><img src="./img/logo.png" width="75px" height="75px" alt ="logo du site" title="Tof-Ouf"></a>
		<h1> TOF-OUF</h1> 
		<a id="logout" href="logout.php">LOG OUT</a>
	</header>';
}
else
{
	include 'notlog.php';
}

