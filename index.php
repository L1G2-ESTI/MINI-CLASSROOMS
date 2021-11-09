<?php

    require_once("Controllers/controller.php");
    $action = htmlspecialchars(($_GET["action"]));
	$u = htmlspecialchars($_GET["u"]);

    if(!empty($action) && $action=="login"){
		$categories = $_POST["categories"];
		$email = $_POST["email"];
		$mdp = $_POST["password"];
		if($categories == "etudiant"){
			loginEtudiant($email,$mdp);
		}elseif($categories == "administrateur"){
			loginAdmin($email,$mdp);
		}else{
			loginProf($email,$mdp);
		}
	}elseif(!empty($u) && $u=="listeProf"){
		listeProf();
	}
	else{
		authentification();
	}
?>  