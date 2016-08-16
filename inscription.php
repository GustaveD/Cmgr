<?php
require_once './class/Dbase.class.php';
require_once './class/User.class.php';
session_start();
?>

<?php if(isset($_SESSION['user'])): ?>
<!DOCTYPE html>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
			<div class = "boxes">
				<div class ="box-content">
					<div id = "logo"><a href="./index.php"><img src="./img/logocamagru2.png" width	="100%" height="100%" alt ="logo du site" title="Tof-Ouf"></a></div>
				</div>
				<div class="box-content">
					<a id="logout" href="logout.php">se déconnecter</a></div>
	</header>
<?php else: ?>
<!DOCTYPE html>
<html>
<title>Camagru</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
			<div class = "boxes">
				<div class ="box-content">
					<div id = "logo"><a href="./index.php"><img src="./img/logocamagru2.png" width	="100%" height="100%	" alt ="logo du site" title="Tof-Ouf"></a></div>
				</div>

			</div>
	</header>
<?php endif ?>
			<div class="inscribody">
				<div class="inscri-content">
					<div id="title"> <h2>S'inscrire</h2></div></div>
				<div class="inscri-content">
					<form method="post" action="insertuser.php">
					 	<div class="formulaire">
							<label for="mail">Email</label>
							<input type="email" name="mail" placeholder="email" required /> <br/>
							<label for="name">Name</label>
							<input type="text" name="name" placeholder="name" required /><br />
							<label for="password">Password</label>
							<input type="password" name="password" placeholder="password"		required/><br />
							<label for="text">Confirm</label>
							<input type="password" name="password_confirm" placeholder=		password_confirm" 	required/><br>
					  <input type ="submit" class="btn btn-primary" value="Connexion">
					  </div>
					 </form>
				</div>
				</div>
			</div>

</body>
</html>
