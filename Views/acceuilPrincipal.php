<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home -Mini classroom</title>
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>

<body>
	<div class="container" id="accueil">
		<div class="navigation">
			<ul>
				<li><a href="#accueil">Accueil</a></li>
				<li><a href="index.php?action=authentification">Sign In</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
		</div>
		<div class="description">
			<div class="titre">
				<h1>Mini <span>Classroom</span></h1>
			</div>
			<div class="texte">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
			</div>
			<div class="bouton">
				<button>Learn More</button>
			</div>
		</div>
	</div>

	<footer>
		<div class="foo">
			<div class="logo">
				<figure>
					<img src="assets/img/baniere.jpg" width="160px" height="160px">
				</figure>
			</div>
			<div class="lien">
				<ul>
					<li class="entete">Useful Links</li>
					<li><a href="#accueil">Accueil</a></li>
					<li><a href="login.php">Sign In</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</div>
		</div>
		<div class="copyr">
			<p>Copyright by Esti <span id="date"></span></p>
		</div>
	</footer>
	<script type="text/javascript">
		let d = new Date();
		let year = d.getFullYear()
		let date = document.getElementById('date').textContent = year;
	</script>
</body>

</html>