<html>
<meta charset="UTF-8">
<link rel="stylesheet" media="screen" type="text/css" href="../CSS/Accueil.css" />
<script>
    function ConfirmLogout() {
        return confirm("Are you sure you want to logout?");
    }
</script>
<div class="jaune">
    <h1 class="titre">Newsoo</h1>
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
                <button class="btn" onclick="window.location.href='lol.php';">Voir !</button>
            </div>
        </div>
    </main>
</div>
<div class="rouge">
    <p class="test">Nos news</p>
    <p class="info">Ci dessous vous retrouverez les news postées par nos utilisateurs
        <br>Si vous voulez en poster à votre tour veuillez vos connecter
    </p>
    <?php
    header('content-type: text/html; charset=utf-8');
    include('conn.php');
    session_start();
    $_SESSION['url'] = 'accueil.php';
    if (isset($_SESSION['login']) and $_SESSION['login'] == 'ok') {
        echo '
    <ul>
    <li><a class="active" href="accueil.php">Accueil</a></li>
    <li><a href="lol.php">League of legends</a></li>
    <li><a href="moto.php">Motos</a></li>
    <li><a href="rediger.php">Rediger</a></li>
    <li><a href="compte.php">Compte</a></li>
    <li><a href="deconnexion.php" onclick="return ConfirmLogout()">Deconnexion</a></li>
    </ul>';
    } else echo '
<ul>
<li><a class="active" href="accueil.php">Accueil</a></li>
<li><a href="lol.php">League of legends</a></li>
<li><a href="moto.php">Motos</a></li>
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
        $test=utf8_encode($user['textenews']);
        if ($user['idtheme'] == 1) {
            echo "<div class='divtxt'>" .
                "<p class=moto>" . $user['titrenews'] . "</p>" .
                "<p class=nom>" . "Publié par : " . $row['nom'] . "  " . $row['prenom'] . "</p>" .
                "<p class=datenews>" . "Le : " . $user['datenews'] . "</p>" .
                "<p class=textenews>" . $user['textenews'] . "</p>" .
                "</div>";
        } else {
            echo "<div class='divtxt'>" .
                "<p class=lol>" . $user['titrenews'] . "</p>" .
                "<p class=nom>" . "Publié par : " . $row['nom'] . "  " . $row['prenom'] . "</p>" .
                "<p class=datenews>" . "Le : " . $user['datenews'] . "</p>" .
                "<p class=textenews>" . $test . "</p>" .
                "</div>";
        }
    }
    ?>
    <p class="footer"> Made by Marco Simon et Robin Fröliger </p>
</div>
</html>