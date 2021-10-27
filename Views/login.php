<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>s'authentifier</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body id="body_login">
	<form action="index.php?action=login"  method="post" class="log_form">
		<div class="content_left">
			<h1 class="log_titre"> Sign in </h1>
	  		<input type="email" placeholder="Email" class="champ" name="email" required> 
	  		<input type="password" placeholder="Password" class="champ" name="password" required>
	  		<p class="forgot_pass"><a href="">Forgot your password ?</a></p>
	  		<input type="submit" class="boutton_login" value="VALIDER">
		</div>
		<div class="content_right">
			<h1>Hello, Friend!</h1>
			<p>Vous n'avez pas encore de compte ? Pas de problème, cliquez ici cela ne prends pas une minute et commencez à étudier!!!</p>
			<a href="Views/registre.php" target="blank">SIGN UP</a>
		</div>
	</form>
</body>
</html>