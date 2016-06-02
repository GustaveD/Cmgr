<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title> Camagru</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
	<header> <h1>INSCRIPTION</h1></header>
	<form method="post" action="insertuser.php">
			<label for="id">Identifiant</label>
			<input id = "login" name="login" type ="text" required />
		</br>
			<label for="mdp">Mot de Passe</label>
			<input id = "mdp" name="mdp" type ="password" required/>
			<input type ="submit" value="Connexion">
</body>
</html>