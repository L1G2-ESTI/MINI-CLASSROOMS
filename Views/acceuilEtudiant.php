<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cours</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/prof.css">
</head>
<body>
	<header>
		<div class="container">
			<nav>
				<ul>
					<li class="logo-head">Mini Classroom</li>
					<li class="nav-menu"><a href="#">Cours</a></li>
					<li class="nav-menu"><a href="#">Publication</a></li>
					<li class="nav-menu"><a href="#">Professeurs</a></li>
					<li class="img-profil"><a href="#"><img src="../assets/img/profil.png" width="50px" height="50px"></a></li>
				</ul>
			</nav>	
		</div>
	</header>

	<section>
		<div class="baniere"></div>
		<?php
			echo '
			<div>
			<img src="'.$user_nom['photo'].'" class="profil-prof" width="150px" height="150px">
			</div>
			';
		?>
	</section>

	<section>
		<div class="container-prof">
			<div class="prof-information">
				<h3><?=$user_nom["nom_etud"]." ".$user_nom["pre_etud"]?></h3>
				<div class="reseaux">
					<img src="assets/img/logo/g+.png" width="20px" height="20px">
					<li><a href="#"><?=$_POST["email"]?></a></li>
				</div>
				<!-- <div class="reseaux">
					<img src="assets/img/logo/linkedin.png" width="20px" height="20px">
					<li><a href="#">Linkedin</a></li>
				</div> -->
				<!-- <div class="reseaux">
					<img src="assets/img/logo/4sq.png" width="20px" height="20px">
					<li>Amboditsiry, Madagascar</li>
				</div>-->
				<input type="submit" name="envoie" value="Envoyer Mail">
			</div>
				<div class="prof-module">
					<?php 
						while ($user_cours=$cours->fetch()){
							echo '
									<div class="card-module">
										<div class="fond-haut">
											<h1>'.$user_cours["nom_mat"].'</h1>
										</div>
										<div class="logo-module">
											<p>'.$user_cours["id_module"].'</p>

										</div>
										<div class="corps-module">
											<input type="button" onclick=window.location.href="https://www.facebook.com"; name="enter" value="Ouvrir">
										</div>
									</div>
								';
						}
					?>
				</div>

		</div>
	</section>

</body>
</html>
