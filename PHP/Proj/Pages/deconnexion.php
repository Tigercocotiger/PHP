<?php
session_start();
$adresse = $_SESSION['url'];
echo $adresse;
session_destroy();
header("location: $adresse");
?>