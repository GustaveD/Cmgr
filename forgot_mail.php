<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title> Camagru</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
	<header> <h1>Forgot Mail</h1></header>
	<!--<form method="post" action="insertuser.php">
			<label for="id">Identifiant</label>
			<input id = "login" name="login" type ="text" required />
		</br>
			<label for="mdp">Mot de Passe</label>
			<input id = "mdp" name="mdp" type ="password" required/>
			<input type ="submit" value="Connexion">
	-->
			    <h2>Put Your Email</h2>
			  <form method="get" action="mail.php">
  					<label for="mail">Email</label>
  					<input type="email" name="mail" placeholder="email" /><br />
  					<input type ="hidden" name ="type" value="forgot"/><br />
			  <input type ="submit" value="Connexion">
		</div>
</body>
</html>