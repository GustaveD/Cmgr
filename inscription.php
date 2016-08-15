<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
session_start();

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
echo'
	<title>Camagru</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style01.css">
</head>
<body>
	<header>
		<a href="./index.php"><img src="./img/logo.png" width="75px" height="75px" alt ="logo du site" title="Tof-Ouf"></a>
		<h1> TOF-OUF</h1> ';
}
?>
			<h2>S'inscrire</h2>
			<form method="post" action="insertuser.php">
			 	<div class="formulaire">
					<label for="mail">Email</label>
					<input type="email" name="mail" placeholder="email" required /><br />
				<label for="name">Name</label>
				<input type="text" name="name" placeholder="name" required /><br />
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="password" required/><br />
					<label for="text">Confirm</label>
					<input type="password" name="password_confirm" placeholder="password_confirm" required/><br>
			  <input type ="submit" class="btn btn-primary" value="Connexion">
			  </div>
		</div>
</body>
</html>
