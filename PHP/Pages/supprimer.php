<?php 
include ('conn.php');
$insert_stmt = $objPdo->prepare("DELETE FROM news Where idnews=:id");
$insert_stmt->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$insert_stmt->execute();
header("location:compte.php");
?>
