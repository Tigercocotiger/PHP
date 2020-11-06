<html>
<meta charset="UTF-8">
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/Accueil.css" />
<script>
    function ConfirmLogout() {
        return confirm("Are you sure you want to logout?testtest");
    }
</script>
<div class="jaune">
    <h1 class="titre">Salut le frr</h1>
    <main class="page-content">
        <div class="card">
            <div class="content">
                <h2 class="title">League of legends</h2>
                <p class="copy">Cliquez si-dessous pour voir toute nos actualitées concernant league of legends</p>
                <button class="btn">Voir</button>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <h2 class="title">Les motos</h2>
                <p class="copy">Cliquez si-dessous pour voir toute nos actualitées concernant les motos</p>
                <button class="btn">Voir !</button>
            </div>
        </div>
    </main>
</div>
<div class="rouge">
    <?php
    header('content-type: text/html; charset=utf-8');
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
    } else echo '
<ul>
<li><a class="active" href="accueil.php">Accueil</a></li>
<li><a href="lol.php">League of legends</a></li>
<li><a href="lol.php">Motos</a></li>
<li style="float:right"><a href="#about">Connexion</a></li>
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
                "<p class=moto>" . $user['titrenews'] . "</p>" .
                "<p class=nom>" . $row['nom'] .$row['prenom'] ."</p>" .
                "<p class=datenews>" . $user['datenews'] . "</p>" .
                "<p class=textenews>" . $user['textenews'] . "</p>" .
                "</div>";
        } else {
            echo "<div class='divtxt'>" .
                "<p class=lol>" . $user['titrenews'] . "</p>" .
                "<p class=nom>" ."Publié par : ". $row['nom'] ."  ".$row['prenom'] ."</p>" .
                "<p class=datenews>" ."Le : ". $user['datenews'] . "</p>" .
                "<p class=textenews>" . $user['textenews'] . "</p>" .
                "</div>";
        }
    }
    ?>
</div>
</html>