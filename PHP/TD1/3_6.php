<html>
<head>
<title>Exercice 3.6</title>
</head>
<body>
<?php
	error_reporting(E_ALL ^ E_NOTICE);
	
	function maj ($chaine) {
		$tab=explode(' ',$chaine);
		foreach ( $tab as $value ) {
			$nouvelle_chaine=strtoupper($value[0]); 
			echo $nouvelle_chaine;
			}
	}	
	$chaine = "Voila la chaine avec chaque initiale en majuscule";
	
	maj($chaine);
?>
</body>
</html>