<html>
<script>
    function ConfirmLogout() {
        return confirm("Are you sure you want to logout?");
    }
</script>

<?php
include('conn.php');
session_start();
$_SESSION['url'] = 'accueil.php';
if (isset($_SESSION['login']) and $_SESSION['login'] == 'ok') {
    echo '
    <ul>
    <li><a class="active" href="accueil.php">Accueil</a></li>
    <li><a href="compte.php">Compte</a></li>
    <li><a href="deconnexion.php" onclick="return ConfirmLogout()">Deconnexion</a></li>
    </ul>';
    echo '<div><p>salut <br><br><br></p><img src="oui1.png" alt=""></div>';
} else echo '
<ul>
<li><a class="active" href="accueil.php">Accueil</a></li>
<li><a href="connexion.php">Connexion</a></li>
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
        echo "<div>" .
            "<p class=moto>" . $user['titrenews'] . "</p>" . '<br/>'
            . $row['nom'] . '--'
            . $row['prenom'] . '<br/>'
            . $user['titrenews'] . '<br/>'
            . $user['datenews'] . '<br/>'
            . $user['textenews'] . '<br/>' .
            "</div>";
    } else {
        echo "<div>" .
            "<p class=lol>" . $user['titrenews'] . "</p>" . '<br/>'
            . $row['nom'] . '--'
            . $row['prenom'] . '<br/>'
            . $user['titrenews'] . '<br/>'
            . $user['datenews'] . '<br/>'
            . $user['textenews'] . '<br/>' .
            "</div>";
    }
}
?>

</html>