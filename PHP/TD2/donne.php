<html>
<head>
</head>
<body>
<?php
	if (isset($_POST['valider'])){
		echo 'noms:'.$_POST['nom'];
		echo'prenom:'.$_POST['prenom'];
		echo 'né en:'.$_POST['mois'].' '.$_POST['annee'];
		echo $_POST['etude'];
		echo 'pense savoir programmer en';
		$prog = $_POST['prog'];
		foreach($prog as $valeur){echo "$valeur;";}
		echo $_POST['commentaire'];
	}
	?>
</body>
</html>