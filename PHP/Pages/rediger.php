<html>
<meta charset="utf8">
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/rediger.css"/>
<script>
    function ConfirmLogout() {
        return confirm("Are you sure you want to logout?");
    }
</script>
<?php
include('sess.php');
session_start();
if ($_SESSION['login'] != 'ok') {
    header("Location:connexion.php");
}
?>
<ul>
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="lol.php">League of legends</a></li>
    <li><a href="moto.php">Motos</a></li>
    <li><a href="rediger.php" class="active" >Rediger</a></li>
    <li><a  href="compte.php">Compte</a></li>
    <li><a href="deconnexion.php" onclick="return ConfirmLogout()">Deconnexion</a></li>
    
</ul>
<div class="login-box">
<form method="POST" action="rediger.php">
    <h2>Rediger</h2>
    <div class="user-box">

        <p>Selectioner une catégorie</p>

        <div class="box">

            <select name="categ" id="categ">
                <?php
                include('conn.php');
                $result = $objPdo->query("select * from theme");
                foreach ($result as $row) {
                    echo "<option value='" . $row['idtheme'] . "'>" . $row['description'] . "</option>";
                }
                ?>
            </select>

        </div>

    </div>

    <br>
    <div class="user-box">
    <input type="text" id="titrenew" name="titrenew" />
    <label>Titre de votre news</label>
    </div>

    <br>
    <div class="user-box">

    <p>Texte de votre news</p>
    <textarea style="resize:none" id="textnews" name="textnews" rows="8" cols="40"></textarea>
    <button type="submit" class="registerbtn">Poster</button>
    </div>
</form>
</div>
</html>

<?php
if ($_POST) {
    session_start();
    $today = date("Y-n-j");
    $_POST['categ'] = trim(htmlentities($_POST['categ']));
    $_POST['titrenew'] = utf8_encode(trim(htmlentities($_POST['titrenew'])));
    $_POST['textnews'] = utf8_encode(trim(htmlentities($_POST['textnews'])));
    $test = $_SESSION["user"];
    $sess = ses($test);
    $insert_stmt = $objPdo->prepare("INSERT INTO news (idtheme,titrenews,datenews,textenews,idredacteur) VALUES(:idtheme,:titrenews,:datenews,:textenews,:idredacteur)");
    $insert_stmt->bindValue('idtheme', $_POST['categ'], PDO::PARAM_INT);
    $insert_stmt->bindValue('titrenews', $_POST['titrenew'], PDO::PARAM_STR);
    $insert_stmt->bindValue('datenews', $today, PDO::PARAM_STR);
    $insert_stmt->bindValue('textenews', $_POST['textnews'], PDO::PARAM_STR);
    $insert_stmt->bindValue('idredacteur', $sess->get_id(), PDO::PARAM_INT);
    $insert_stmt->execute();
    $page=$_SESSION['url'];
    header("location:$page");
    $_POST = array();
}
?>



<?php
function ses($username)
{
    include('conn.php');
    $result = $objPdo->query("select * from redacteur where email = '$username'");
    foreach ($result as $row) {
        $sess = new Sess(null, null, null, null, null);
        $sess->set_id($row['idredacteur']);
        $sess->set_utilisateur($row['email']);
        $sess->set_nom($row['nom']);
        $sess->set_prenom($row['prenom']);
        $sess->set_datecompte($row['datecompte']);
    }
    return $sess;
}
?>