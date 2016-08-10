<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title> Camagru</title>
		<link rel="stylesheet" href="style.css">
</head>
<body>
	<header> <h1>INSCRIPTION</h1></header>
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
  					<input type="text" name="password_confirm" placeholder="password_confirm" required/><br>
			  <input type ="submit" class="btn btn-primary" value="Connexion">
			  </div>
		</div>
</body>
</html>
