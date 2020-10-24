<html>

<style type="text/css">
 body{
     margin : 0;
	  }


ul{
  
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
  list-style-type:none;
  display:flex;
  justify-content: center;
}

li {
  float: left;
  text-align:center;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
</style>

<ul>
  <li><a  href="accueil.php">Accueil</a></li>
  <li><a  class="active" href="connexion.php">Connexion</a></li>


</ul>
<?php 

/*function testconnexion($username,$password){
  session_start();
  include ('conn.php');
  include ('session.php');
  $result = $objPdo->query("select * from redacteur where email = '$username'");
		foreach ($result as $row ){
    if($username==$row['email'] && $password==$row['motdepasse']){
    $session = new Session($_SESSION['login']= 'ok',$row['email'],$row['nom'],$row['prenom'],$row['datecompte']);
    $_SESSION['login']= 'ok';
    if($_SESSION['url']!='')
    header("location: {$_SESSION['url']}");
    else header("location: accueil.php");
    }
}
} 
*/

?>

<?php
    
include ('sess.php');
$sess = new sess(null,'',null,null,null,null);
if(isset($_POST['username'])&& isset($_POST['pass'])){
  include ('conn.php');
  $username   = $_POST['username'];
	$password   = $_POST['pass'];
  $stmt = $objPdo->query("select * from redacteur where email = '$username'");
	$stmt-> execute([$username]);
	$user = $stmt->fetch();
	if ($user){
    $result = $objPdo->query("select * from redacteur where email = '$username'");
		foreach ($result as $row )
  if($row['motdepasse'] == $password){
    session_start();
    $_SESSION['login']= 'ok';
    $sess->set_connexion($_SESSION['login']= 'ok');
    $sess->set_utilisateur($row['email']);
    $sess->set_nom($row['nom']);
    $sess->set_prenom($row['prenom']);
    $sess->set_datecompte($row['datecompte']);
    if($_SESSION['url']!=''){
    $sess->set_page($_SESSION['url']);
    header("location: {$_SESSION['url']}");
  }
    else {
    header("location: accueil.php");
    //$sess = new Sess($_SESSION['login']= 'ok','',$row['email'],$row['nom'],$row['prenom'],$row['datecompte']);
  }
  
  
    //testconnexion($username,$password);

  }		
  }
  else{
    $_POST['username']='';
    echo '<script>alert("wrong username")</script>';
  }
}
else 

?>
<html>
<form method="post">
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

</html>


