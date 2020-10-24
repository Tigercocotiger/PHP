<?php
session_start();
$username='admin';
// Set session variables
$_SESSION["favcolor"] = $username;
?>
<html>
<a href="test.php">Continue</a>
</html>