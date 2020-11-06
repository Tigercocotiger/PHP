<html>
<?php
include('sess.php');
session_start();
$_SESSION['url'] = 'connexion.php';
if (!isset ($_SESSION['login'])){
$sess = new sess(null, '', null, null, null, null);
if (isset($_POST['username']) && isset($_POST['pass'])) {
  include('conn.php');
  $username   = $_POST['username'];
  $password   = $_POST['pass'];
  $stmt = $objPdo->query("select * from redacteur where email = '$username'");
  $stmt->execute([$username]);
  $user = $stmt->fetch();
  if ($user) {

    $result = $objPdo->query("select * from redacteur where email = '$username'");
    foreach ($result as $row)
      if ($row['motdepasse'] == $password) {
        session_start();
        $_SESSION['login'] = 'ok';
        $_SESSION['user'] = $username;
        if ($_SESSION['url'] != '') {
          header("location: {$_SESSION['url']}");
        } else {
          header("location: accueil.php");
        }
      } else {
        echo '<script>alert("wrong passeword")</script>';
      }
  } else {
    $_POST['username'] = '';
    echo '<script>alert("wrong username")</script>';
  }
}
}
else  header("Location:compte.php");


?>




<html>

<div class=navbar>
  <a href="accueil.php">Accueil</a>
  <a class="active" href="connexion.php">Connexion</a>


</div>

<link rel="stylesheet" media="screen" type="text/css" href="../CSS/connexionCSS.css"/>

<div class="login-box">
  <h2>Login</h2>
  <form method="POST" action="connexion.php">
    <div class="user-box">
     <input type="text" id="username" name="">
     <label for="username">Username:</label>
    </div>
    <div class="user-box">
      <input type="password" id="pass" name="pass" minlength="0" required>
      <label for="pass">Password (8 characters minimum):</label>

   </div>
   <input type="submit" name="submit" value="click">
  </form>
 <button type="button" onclick="location.href = 'newcompte.php'">Pas encore inscris ?</button>
</div>
<?php
if (isset($_POST['username']) && isset($_POST['pass'])) {
  include('conn.php');
  $username   = $_POST['username'];
  $password   = $_POST['pass'];
  $stmt = $objPdo->query("select * from redacteur where email = '$username'");
  $stmt->execute([$username]);
  $user = $stmt->fetch();
  if (!$user) {
    $_POST['username'] = '';
    echo '<script>alert("wrong username")</script>';
  } else {
    $result = $objPdo->query("select * from redacteur where email = '$username'");
    foreach ($result as $row)
      if ($row['motdepasse'] != $password) {
        $_POST['pass'] = '';
        echo '<script>alert("wrong passeword")</script>';
      }
  }
}
?>

</html>