<?php
session_start();
$if = 2;
if ($if==1){
    $username='admin';
}
else $username='admin1';
// Set session variables
$_SESSION["user"] = $username;
?>
<html>
<a href="test.php">Continue</a>
</html>