<html>
	<head>
		<title>Authentification</title>
	</head>
	
	<body>
		<?php session_start();
		if(isset($_POST['user'])&& isset($_POST['mdp'])){
			$fin=1;
			if($_POST['user']=='utilisateur1' && $_POST['mdp']=='motdepasse'){
				$_SESSION['login']='ok';
				if($_SESSION['url']!='')
					header("location: {$_SESSION['url']}");
				else header("location: accueil.php");
			}
		}
		else 
		$fin=0; 
		?>

		<p>Pour accéder à cette page il est nécessaire de vous identifier :<br />
		<form method="POST" action="authentification.php">
		<strong> Identifiant : </strong> <br /> <input type='text' name='user'>
		</input>
		<strong><br :> Mot de passe : </strong> <br /> <input type='password' name='mdp'> 
		</input>
		<br /> <input type='submit' value='valider'></input>
		<?php
		if(isset($_POST['user'])&& isset($_POST['mdp'])){
			$fin=1;
			if($_POST['user']!='utilisateur1'){
				echo 'Mauvais utilisateur. ';
				$_POST['user']='';
			}
			if($_POST['mdp']!='motdepasse'){
				echo 'Mauvais mot de passe. ';
				$_POST['mdp']='';
			}		
			}
		else 
		$fin=0; 
		?>
		</form></p>
	</body>
</html>