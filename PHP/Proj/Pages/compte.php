<!DOCTYPE html>
<html>
<script>
    function ConfirmLogout() {
        return confirm("Are you sure you want to logout?");
    }
    function ConfirmDelete(){
        return confirm('Are you sure you want to delete this ?')
    }
</script>
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/compteCSS.css" />
<h1 class="titre">Votre compte </h1>
<?php
function ses($username)
{
    include('conn.php');
    $result = $objPdo->query("select * from redacteur where email = '$username'");
    foreach ($result as $row) {
        $sess = new Sess(null, '', null, null, null, null);
        //$sess->set_connexion('ok');
        $sess->set_id($row['idredacteur']);
        $sess->set_utilisateur($row['email']);
        $sess->set_nom($row['nom']);
        $sess->set_prenom($row['prenom']);
        $sess->set_datecompte($row['datecompte']);
    }
    return $sess;
}

include('sess.php');
session_start();
$_SESSION['url'] = 'compte.php';
if ($_SESSION['login'] != 'ok') {
    header("Location:connexion.php");
} else {
    $test = $_SESSION["user"];
    $sess = ses($test);
    echo "<div class='divtxt'>" .
        "<p class=nom>" . "Bonjour  : " . $sess->get_nom() . "  " . $sess->get_prenom() . " !" . "</p>" .
        "<p class=datecomte>" . "Votre adresse mail : " . $sess->get_utilisateur() . "</p>" .
        "<p class=utilisateur>" . "Membre depuis le :" . $sess->get_datecompte() . "</p>" .
        "</div>";
}
?>

<ul>
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="lol.php">League of legends</a></li>
    <li><a href="moto.php">Motos</a></li>
    <li><a href="rediger.php">Rediger</a></li>
    <li><a class="active" href="compte.php">Compte</a></li>
    <li><a href="deconnexion.php" onclick="return ConfirmLogout()">Deconnexion</a></li>
    
</ul>

<h1 class="post">Vos post</h1>
<div class="information">
    <p class="info">Ci dessous vous retrouverez les news postées par nos utilisateurs
        <br>Si vous voulez en poster à votre tour veuillez vos connecter
        <br><a href="rediger.php"> En rédiger un !</a>
    </p>
</div>

<?php
include('conn.php');
$test = $_SESSION["user"];
$sess = ses($test);
$idredacteur = $sess->get_id();
$_SESSION['url'] = 'moto.php';
$result = $objPdo->query("select * from news where idredacteur = '$idredacteur'");
foreach ($result as $row) {
    if ($row['idtheme'] == 1) {
        echo "<div class='divtxt'>" .
        "<p class=lol>" . utf8_encode($row['titrenews']) . "</p>" .
        "<p class=datenews>" . "Le : " . utf8_encode($row['datenews']) . "</p>" .
        "<p class=textenews>" . utf8_encode($row['textenews']) ."<a href=supprimer.php?id=".$row['idnews']."> Supprimer (Cette action est instantanée et ireversible)</a>". "</p>" .
        "</div>";
    } else {
        echo "<div class='divtxt'>" .
        "<p class=moto>" . utf8_encode($row['titrenews']) . "</p>" .
        "<p class=datenews>" . "Le : " . utf8_encode($row['datenews']) . "</p>" .
        "<p class=textenews>" . utf8_encode($row['textenews'])  ."<a href=supprimer.php?id=".$row['idnews']."> Supprimer (Cette action est instantanée et ireversible)</a>". "</p>" .
        "</div>";
    }

}
?>
<p class="footer"> Made by Marco Simon et Robin Fröliger </p>

</html>