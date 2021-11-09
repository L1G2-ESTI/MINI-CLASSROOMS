<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>s'authentifier</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body id="body_login">
	<form action="index.php?action=login"  method="post" class="log_form">
		<div class="content_left">
			<h1 class="log_titre"> Sign in </h1>
	  		<input type="email" placeholder="Email" class="champ" name="email" required> 
	  		<input type="password" placeholder="Password" class="champ" name="password" required>
			<select name="categories" class="mode_connex">
				<option hidden="">connecté vous en tant que :</option>
				<option name="etudiant" value="etudiant">Etudiant</option>
				<option name="administrateur" value="admin">Administrateur</option>
				<option name="professeur" value="professeur">Professeur</option>
			</select>
			<p class="forgot_pass"><a href="">Forgot your password ?</a></p>
	  		<input type="submit" class="boutton_login" value="VALIDER">
		</div>
		<div class="content_right">
			<h1>Hey, Hey!!</h1>
			<p>Avant de commencer, entrer votre mail ainsi que votre mot de passe!!! Choisi ensuite votre mode de connexion</p>
		</div>
	</form>
</body>
</html>