<?php

    require_once("Controllers/controller.php");
    $action = htmlspecialchars(($_GET["action"]));

    if(!empty($action) && $action="login"){
		$email = $_POST["email"];
		$mdp = $_POST["password"];
		loginEtudiant($email,$mdp);
	}
	else{
		authentification();
	}
?>  