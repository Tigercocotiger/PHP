<html>
<?php
include('sess.php');
session_start();
$sess->set_page($_SESSION['url'] = 'accueil.php');
if ($sess->get_connexion() != 'ok') {
    
    header("Location:connexion.php");
} else echo $sess->get_nom();
?>
<style type="text/css">
    body {
        margin: 0;

    }

    div {
        width: 50%;
        border: 1px solid #333;
        box-shadow: 8px 8px 5px #444;
        padding: 10%;
        background-image: linear-gradient(180deg, #fff, #ddd 40%, #ccc);
        margin: 0 auto;
        margin-top: 3%;
        text-align: center;
        border-radius: 50px;
    }

    ul {

        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        position: -webkit-sticky;
        /* Safari */
        position: sticky;
        top: 0;
        list-style-type: none;
        display: flex;
        justify-content: center;
    }

    li {
        float: left;
        text-align: center;
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

    .lol p {
        opacity: 1;
    }
</style>
<ul>
    <li><a class="active" href="accueil.php">Accueil</a></li>
    <li><a href="connexion.php">Connexion</a></li>


</ul>
<?php
include('conn.php');
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