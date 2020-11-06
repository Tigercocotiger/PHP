<html>
<meta charset="UTF-8">
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/Accueilmoto.css" />
<script>
    function ConfirmLogout() {
        return confirm("Are you sure you want to logout?testtest");
    }
</script>
<div class="divlol">
    
    <p class="titre">Nos news sur les motos</p>
    <div class="information">
    <p class="info">Ci dessous vous retrouverez les news postées par nos utilisateurs
        <br>Si vous voulez en poster à votre tour veuillez vos connecter
        <br><a href="rediger.php"> En rédiger un !</a>
    </p>
    </div>
    <?php
    header('content-type: text/html; charset=utf-8');
    include('conn.php');
    session_start();
    $_SESSION['url'] = 'accueil.php';
    if (isset($_SESSION['login']) and $_SESSION['login'] == 'ok') {
        echo '
    <ul>
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="lol.php">League of legends</a></li>
    <li><a class="active" href="moto.php">Motos</a></li>
    <li><a href="rediger.php">Rediger</a></li>
    <li><a href="compte.php">Compte</a></li>
    <li><a href="deconnexion.php" onclick="return ConfirmLogout()">Deconnexion</a></li>
    </ul>';
    } else echo '
<ul>
<li><a  href="accueil.php">Accueil</a></li>
<li><a href="lol.php">League of legends</a></li>
<li><a class="active" href="moto.php">Motos</a></li>
<li  class="connexion"><a href="connexion.php">Connexion</a></li>
</ul>';
    $getUsers = $objPdo->prepare("SELECT * FROM news ORDER BY datenews DESC");
    $getUsers->execute();
    $users = $getUsers->fetchAll();
    foreach ($users as $user) {
        $test = $objPdo->prepare("SELECT nom,prenom FROM redacteur where idredacteur=?");
        $test->bindValue(1, $user['idredacteur'], PDO::PARAM_INT);
        $test->execute();
        $row = $test->fetch();
        if ($user['idtheme'] == 1) {
            echo "<div class='divtxt'>" .
            "<p class=moto>" . utf8_encode($user['titrenews']) . "</p>" .
            "<p class=nom>" . "Publié par : " . utf8_encode($row['nom']) . "  " . utf8_encode($row['prenom']) . "</p>" .
            "<p class=datenews>" . "Le : " . utf8_encode($user['datenews']) . "</p>" .
            "<p class=textenews>" . utf8_encode($user['textenews']) . "</p>" .
            "</div>";
        } else {
           
        }
    }
    ?>
    <p class="footer"> Made by Marco Simon et Robin Fröliger </p>
</div>

</html>