<html>
<head>
<title>Exercice 2.3</title>
</head>

<body>
<?php 
	function tableau ($nb=10)
	{
		echo '<table>';
		$elt=0;
		for ($i=0;$i<$nb;$i++)
		{ 
			echo '<tr>';
			for ($j=0; $j<$nb; $j++)
			{
				$elt++;
				echo "<td> $elt </td>";
			}
			echo '</tr>';
		}
		echo '</table>';
	}
	
	tableau();
?>
</body>
</html>