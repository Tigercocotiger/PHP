<?php 
include ('connexion.php');
$insert_stmt = $objPdo->prepare("DELETE FROM Sites Where idSite=:id");
$insert_stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$insert_stmt->execute();
header("location:sites.php");
?>
