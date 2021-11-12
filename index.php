<?php

require_once("Controllers/controller.php");
$action = htmlspecialchars(($_GET["action"]));
$u = htmlspecialchars($_GET["u"]);

if (!empty($action) && $action == "login") {
	if (isset($_POST)) {
		$categories = $_POST["categories"];
		$email = $_POST["email"];
		$mdp = $_POST["password"];
		if ($categories == "etudiant") {
			loginEtudiant($email, $mdp);
		} elseif ($categories == "admin") {
			loginAdmin($email, $mdp);
		} else {
			loginProf($email, $mdp);
		}
	}
} elseif (!empty($action) && $action == "authentification") {
	authentification();
} elseif (!empty($action) && $action == "AjoutEtudiant") {
	if (isset($_POST)) {
		$nom = $_POST['nom_etud'];
		$prenom = $_POST['pre_etud'];
		$email = $_POST['mail_etud'];
		$password = $_POST['mdp_etud'];
		$genre = $_POST['sexe'];
		$matricule = $_POST['num_matr'];
		$niveau = $_POST['Niveau'];
		AjoutEtudiant($nom, $prenom, $email, $password, $genre, $matricule, $niveau);
		header("Locartion:Views/crud.php");
	}
} elseif (!empty($action) && $action == "update") {
	$id = htmlspecialchars($_GET["id"]);
	update($id);
} elseif (!empty($action) && $action == "enregistrement") {
	$id = htmlspecialchars($_GET["id"]);
	if (isset($_POST)) {
		$nom = $_POST['nom_etud'];
		$prenom = $_POST['pre_etud'];
		$email = $_POST['mail_etud'];
		$password = $_POST['mdp_etud'];
		$matricule = $_POST['num_matr'];
		$niveau = $_POST['Niveau'];
		$adresse = $_POST["adresse"];
		echo "<pre>";
		echo $_POST;
		modifierEtudiant($id, $nom, $prenom, $email, $password, $niveau, $adresse);
		// }
	} 
}elseif (!empty($action) && $action == "supprimerEtudiant") {
		$id = htmlspecialchars($_GET["id"]);
		supprimerEtudiant($id);
} elseif (!empty($u) && $u == "listeProf") {
	listeProf();
} else {
	acceuil();
}

?>