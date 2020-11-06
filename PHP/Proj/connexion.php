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


<style>
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #243b55;
}

html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#141e30, #243b55);
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input[type=text]:focus ~ label, 
.login-box .user-box input[type=password]:focus ~ label{
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form input[type=submit] {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #fff;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}
 
.login-box input[type=submit] {
  left: 30%;
  background: #141e30;
  color: #fff;
  align: center;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4;
}


.login-box input[type=submit]:hover {
  background: #141e30;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4;
}

.login-box button{
  transform: translateX(61%);
  border-radius:10px;
  background:transparent;
  color:#fff;
  box-shadow: 0 0 5px #03e9f4;
  

   }

.login-box span {
  position: absolute;
  display: block;
}

.login-box input span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box input span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box input span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box input span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

</style>
<div class=navbar>
  <a href="accueil.php">Accueil</a>
  <a class="active" href="connexion.php">Connexion</a>


</div>

<html>
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