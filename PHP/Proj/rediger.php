<?php
include('sess.php');
session_start();
$_SESSION['url'] = 'rediger.php';
if ($_SESSION['login'] != 'ok') {
    header("Location:connexion.php");

} else {
$test = $_SESSION["user"];
$sess = ses($test);
echo $sess->get_nom();

}

function ses ($username){
    include('conn.php');
    $result = $objPdo->query("select * from redacteur where email = '$username'");
    foreach ($result as $row){
        $sess = new Sess(null, '', null, null, null, null);
        //$sess->set_connexion('ok');
        $sess->set_utilisateur($row['email']);
        $sess->set_nom($row['nom']);
        $sess->set_prenom($row['prenom']);
        $sess->set_datecompte($row['datecompte']);
        
    }
    return $sess;
}
?>