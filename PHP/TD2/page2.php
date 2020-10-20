<html>
	<head>
		<title>Page 2</title>
	</head>
	
	<body>
	<?php
	session_start(); 
	$_SESSION['url']='page2.php';
	if($_SESSION['login']!='ok'){
		header("Location:authentification.php") ;
	}?>
	
	<p>Voici la page 2 du site</p>
	<a href="accueil.php">Retour à l'accueil </a> <br />
	<a href="page1.php">Retour à la page 1 </a><br />
	<a href="deconnexion.php">Déconnexion</a>
	</body>
</html>