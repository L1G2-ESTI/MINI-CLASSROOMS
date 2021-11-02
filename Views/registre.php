<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registre des elèves</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body id="body_registre">
	 <div class="reg_main">
		<form action="" method="" class="reg_form">
			<div class="reg_container">
				<div class="reg_title">
					<h3>REGISTRATION INFO</h3>
				</div>
				<div class="reg_content">
					<input type="text" name="nom" placeholder="Nom">
					<input type="" name="prenom" placeholder="Prenom">
					<div class="inp_inline">
						<select name="sexe">
							<option hidden="">Sexe</option>
							<option value="homme">Homme</option>
							<option value="femme">Femme</option>
						</select>
						<select name="niveau">
							<option hidden="">Niveau</option>
							<optgroup label="License">
								<option value="L1">L1</option>
								<option value="L2">L2</option>
								<option value="L3">L3</option>
							</optgroup>
							<optgroup label="Master">
								<option value="M1">M1</option>
								<option value="M2">M2</option>
							</optgroup>
						</select>
					</div>
					<input type="text" name="mail" placeholder="Adresse mail">
					<input type="password" name="mdp" placeholder="Mot de passe">
					<input type="password" name="confirm_mdp" placeholder="Confirmer le mot de passe">
				</div>
				<div class="button">
					<input type="submit" name="enregistrer" value="Enregistrer" class="boutton_enregistrer">
				</div>
			</div>
		</form>
	</div>
</body>
</html>