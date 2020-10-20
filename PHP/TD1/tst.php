<html>
<head>
<title >Exemple</title >
<?php 
	function dire_texte ( $qui , $texte = "Bonjour " )
	{
		if (empty( $qui ))
		{ // $qui est vide , on retourne faux
		return false ;
		}
		else
		{
		echo "$texte $qui" ; // on affiche le texte
		return true ; // fonction exécutée avec succès
		}
	}
?>
</head>
<body> 
<?php 
	dire_texte ("cher phpeur" , "Bienvenue" );
	echo "<br />" ; dire_texte ("cher phpeur" );
	echo "<br />" ; dire_texte ("") ;
?>
</body> </html>