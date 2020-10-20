<html>
<head>
<title>Exercice 2.2 </title>
</head>

<body>
<?php echo '<center>' ;
	function triangle ($taille) {
		$etoile ="*";
		for ($i=0 ; $i <$taille ; $i++) {
			echo $etoile;
			echo ' <br /> ';
			$etoile = $etoile."*";
			
		}
		echo '</center)>';
	}
	triangle (12);
?>
</body>
</html>