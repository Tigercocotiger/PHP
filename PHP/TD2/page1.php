<html>
	<head>
		<title>Page 1</title>
	</head>
	
	<body>
	<?php
	session_start(); 
	$_SESSION['url']='page1.php';
	if($_SESSION['login']!='ok'){
		header("Location:authentification.php") ;
	}?>
	<p>Ceci est la page 1 du site </p>
	<a href="accueil.php">Retour à l'accueil </a><br />
	<a href="page2.php">Page 2 </a><br />
	<a href="deconnexion.php">Déconnexion</a>
	</body>
</html>