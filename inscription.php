<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title> Camagru</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
	<header> <h1>INSCRIPTION</h1></header>
	<!--<form method="post" action="insertuser.php">
			<label for="id">Identifiant</label>
			<input id = "login" name="login" type ="text" required />
		</br>
			<label for="mdp">Mot de Passe</label>
			<input id = "mdp" name="mdp" type ="password" required/>
			<input type ="submit" value="Connexion">
	-->
			    <h2>Register</h2>
			  <form method="post" action="insertuser.php">
  					<label for="mail">Email</label>
  					<input type="email" name="mail" placeholder="email" /><br />
	    			<label for="name">Name</label>
	    			<input type="text" name="name" placeholder="name" /><br />
  					<label for="password">Password</label>
  					<input type="password" name="password" placeholder="password"/><br />
  					<!--<label for="password">Confirm</label>
  					<input type="password" name="passwordConfirm" placeholder="password"/><br /> -->
			  <input type ="submit" value="Connexion">
		</div>
</body>
</html>
