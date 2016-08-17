<?php
session_start();
require_once 'header2.php';
?>
	<div class="inscribody">
		<div class="inscri-content">
			<div id="title"> <h2>S'inscrire</h2></div>
		</div>
			<div class="inscri-content">
				<form method="post" action="insertuser.php">
				 	<div class="formulaire">
						<label for="mail">Email</label>
						<input type="email" name="mail" placeholder="email" required /> <br/>
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="name" required /><br />
						<label for="password">Password</label>
						<input type="password" name="password" placeholder="password" required/><br />
						<label for="text">Confirm</label>
						<input type="password" name="password_confirm" placeholder="password_confirm" required/><br>
				  		<input type ="submit" class="btn btn-primary" value="Connexion">
				  	</div>
				</form>
			</div>
	</div>
<?php require_once 'footer.php'; ?>
