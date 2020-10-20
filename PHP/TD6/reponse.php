<?php
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" encoding='UTF-8'?>\n";
echo "<sites>\n";
include("connexion.php");
$debut=$_GET['Choix'];
$strSql="SELECT nom FROM Sites WHERE nom LIKE '$debut%' ORDER BY nom";
$result=$objPdo->Prepare($strSql);
$result->execute();
foreach($result as $row)
{ echo "<donnee>" .$row['nom'] ."</donnee>"; }
echo "</sites>\n";
?>