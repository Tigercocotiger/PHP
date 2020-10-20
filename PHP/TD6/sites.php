<html>
<head>
<title>Sites</title>
</head>

<body>
<?php 
include ('connexion.php');
$result = $objPdo->query('select * FROM Sites');
	echo "<table> <thead> <tr> <th>Identifiant</th> <th>Nom</th> <th>Ville</th> <th>Latitude</th> <th>Longitude</th> </tr> </thead>";
foreach ($result as $row) {
	echo "<tr><td>".$row['idSite']."</td> 
	<td>".$row['Nom']."</td> 
	<td>".$row['Ville']."</td> 
	<td>".$row['Latitude']."</td> 
	<td>".$row['Longitude']."</td>
	<td> <a href=modifier.php?id=".$row['idSite']."> Modifier </a> </td>
	<td> <a href=supprimer.php?id=".$row['idSite']."> Supprimer </a> </td></tr>";
}
echo "</table> <br />";
echo "<a href=ajout.php> Ajouter un site </a>";
//.$row['Ville'].$row['Latitude'].
?>
</body>
</html>
