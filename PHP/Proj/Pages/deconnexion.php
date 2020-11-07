<?php
session_start();
$adresse = $_SESSION['url'];
session_destroy();
header("location: $adresse");
?>