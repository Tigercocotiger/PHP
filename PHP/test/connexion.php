<html>
<?php
include('sess.php');
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
        $_SESSION['login'] ='ok';
        $sess->set_connexion('ok');
        $sess->set_utilisateur($row['email']);
        $sess->set_nom($row['nom']);
        $sess->set_prenom($row['prenom']);
        $sess->set_datecompte($row['datecompte']);

        if ($_SESSION['url'] != '') {
          $sess->set_page($_SESSION['url']);
          header("location: {$_SESSION['url']}");
        } else {
          header("location: accueil.php");
        }
      }
      else{
        echo '<script>alert("wrong passeword")</script>';
      }
  } else {
    $_POST['username'] = '';
    echo '<script>alert("wrong username")</script>';
  }
}

?>

<ul>
  <li><a href="accueil.php">Accueil</a></li>
  <li><a class="active" href="connexion.php">Connexion</a></li>
</ul>



<html>
<form method="POST" action="authentification.php">
  <div>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
  </div>

  <div>
    <label for="pass">Password (8 characters minimum):</label>
    <input type="password" id="pass" name="pass" minlength="0" required>
  </div>
  <input type="submit" name="submit" value="click">
</form>




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
  }
  else{
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