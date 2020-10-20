<html>
<head>
<title>Exercice 3.5</title>
</head>
<body>
<?php
	error_reporting(E_ALL ^ E_NOTICE);
	
	function renverser ($chaine) {
		for ($i=strlen($chaine); $i>-1;$i--) {
			echo $chaine[$i];
		}
	}
	
	$chaine = "Voila la chaine";
	
	renverser($chaine);
?>
</body>
</html>