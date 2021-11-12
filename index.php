<?php

    require_once("Controllers/controller.php");
    $action = htmlspecialchars(($_GET["action"]));
	$u = htmlspecialchars($_GET["u"]);

    if(!empty($action) && $action=="login"){
		if(isset($_POST)){
			$categories = $_POST["categories"];
			$email = $_POST["email"];
			$mdp = $_POST["password"];
			if($categories == "etudiant"){
				loginEtudiant($email,$mdp);
			}elseif($categories == "admin"){
				loginAdmin($email,$mdp);
			}else{
				loginProf($email,$mdp);
			}
		}
	}
	elseif(!empty($action) && $action=="authentification"){
		authentification();
	}
	elseif(!empty($action) && $action=="AjoutEtudiant"){
		if(isset($_POST)){
				$nom = $_POST['nom_etud'];
                $prenom = $_POST['pre_etud'];
                $email = $_POST['mail_etud'];
                $password = $_POST['mdp_etud'];
                $genre = $_POST['sexe'];
                $matricule=$_POST['num_matr'];
                $niveau=$_POST['Niveau'];
				AjoutEtudiant($nom,$prenom,$email,$password,$genre,$matricule,$niveau);
		}

	}
	elseif(!empty($action) && $action=="modifierEtudiant"){
		$id = htmlspecialchars($_GET["id"]);
		if(isset($_POST)){
		modifierEtudiant($id,$nom,$prenom,$email,$password,$niveau);
		}
	}
	elseif(!empty($u) && $u=="listeProf"){
		listeProf();
	}
	else{
		acceuil();
	}
?>  