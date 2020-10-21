<html>

<style type="text/css">
 body{
     margin : 0;
	 background-image: url("fond.gif");
	 background-position: center;
  	background-repeat: no-repeat;
  	 
	background-size: cover;
  	 position: relative;
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
include ('conn.php');

	if(isset($_POST['submit'])){
		$username   = $_POST['username'];
		$password   = $_POST['password'];
		$stmt = $objPdo->query("select * from redacteur where email = '$username'");
		$stmt-> execute([$username]);
		$user = $stmt->fetch();
		if ($user){
			$result = $objPdo->query("select * from redacteur where email = '$username'");
			foreach ($result as $row )
		{
			if($row['motdepasse'] == $password){
				echo'<script>location.replace("test.html")</script>';
			}
			else echo '<script>alert("wrong mdp")</script>';
			
		}
		}
		else {
		echo '<script>alert("wrong username")</script>';
		}
  }

?>
<html>
<form method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
    </div>

    <div>
        <label for="pass">Password (8 characters minimum):</label>
        <input type="password" id="pass" name="password" minlength="0" required>
    </div>
    <input type="submit" name="submit" value="click">

</form>

</html>