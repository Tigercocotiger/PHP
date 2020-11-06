<html>

<?php
include('sess.php');
session_start();
$_SESSION['url'] = 'rediger.php';
if ($_SESSION['login'] != 'ok') {
    header("Location:connexion.php");
}
?>


<form method="POST" action="rediger.php">
    <p>Selectioner une catégorie</p>
    <select name="categ" id="categ">
        <?php
        include('conn.php');
        $result = $objPdo->query("select * from theme");
        foreach ($result as $row) {
            echo "<option value='" . $row['idtheme'] . "'>" . $row['description'] . "</option>";
        }
        ?>
    </select>
    <br>
    <p>Titre de votre news</p>
    <input type="text" id="titrenew" name="titrenew" />
    <br>
    <p>Texte de votre news</p>
    <textarea style="resize:none" id="textnews" name="textnews" rows="8" cols="40"></textarea>
    <button type="submit" class="registerbtn">Poster</button>
</form>

</html>

<?php
if ($_POST) {
    $today = date("Y-n-j");
    $_POST['categ'] = trim(htmlentities($_POST['categ']));
    $_POST['titrenew'] = trim(htmlentities($_POST['titrenew']));
    $_POST['textnews'] = trim(htmlentities($_POST['textnews']));
    $_POST['textnews'] = utf8_encode($_POST['textnews']);
    echo $_POST['categ'];
    echo '<br>';
    echo $today;
    $test = $_SESSION["user"];
    $sess = ses($test);
    echo '<br>';
    echo $sess->get_id();
    echo '<br>';
    echo $_POST['titrenew'];
    echo '<br>';
    echo $_POST['textnews'];
    echo '<br>';
    $insert_stmt = $objPdo->prepare("INSERT INTO news (idtheme,titrenews,datenews,textenews,idredacteur) VALUES(:idtheme,:titrenews,:datenews,:textenews,:idredacteur)");
            $insert_stmt->bindValue('idtheme', $_POST['categ'], PDO::PARAM_INT);
            $insert_stmt->bindValue('titrenews', $_POST['titrenew'], PDO::PARAM_STR);
            $insert_stmt->bindValue('datenews', $today, PDO::PARAM_STR);
            $insert_stmt->bindValue('textenews',$_POST['textnews'], PDO::PARAM_STR);
            $insert_stmt->bindValue('idredacteur', $sess->get_id(), PDO::PARAM_INT);
            $insert_stmt->execute();
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