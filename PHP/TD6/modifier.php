<h1>Modifier un site</h1>
<form method="post">
Nom : <input type="text" name="nom"><br />		
Ville : <input type="text" name="ville"><br />
Latitude : <input type="text" name="latitude"><br />
Longitude : <input type="text" name="longitude"><br />
<input type="submit" value="Valider" name="bouton">
</form>
<?php 
include ('connexion.php');
/* pour accéder aux valeurs de nom, ville etc...
$_POST['nomduchamp']
*/
if(!empty($_POST)) {
	$ok=true;
	$bornInf=-90;
	$bornSup=90;
	$_POST['nom']=trim(htmlentities($_POST['nom']));
	$_POST['ville']=trim(htmlentities($_POST['ville']));
	if (empty($_POST['nom'])) {
		echo "Vous devez renseigner le nom du site. <br/>";
		$ok=false;
	}
	if (empty($_POST['ville'])) {
		echo "Vous devez renseigner la ville <br/>";
		$ok=false;
	}
	if (empty($_POST['latitude'])) {
		echo "Vous devez renseigner la latitude <br/>";
		$ok=false;
	}
	if($bornSup<($_POST['latitude']) || $bornSup<($_POST['longitude']) || $bornInf>($_POST['latitude']) || $bornInf>($_POST['longitude'])) {
		echo "Valeur longitude et/ou latitude incorrect <br/>";
		$ok=false;
	}
	if (empty($_POST['longitude'])) {
		echo "Vous devez renseigner la longitude <br/>";
		$ok=false;
	}
	
	if($ok) {
		$insert_stmt = $objPdo->prepare("UPDATE Sites SET nom = :nomS,ville = :villeS,latitude = :latitudeS,longitude= :longitudeS) WHERE idSite=:id");
		$insert_stmt->bindValue('id', $_GET['id'], PDO::PARAM_STR);
		$insert_stmt->bindValue('nomS', $_GET['Nom'], PDO::PARAM_STR);
		$insert_stmt->bindValue('villeS', $_POST['ville'], PDO::PARAM_STR);
		$insert_stmt->bindValue('latitudeS', $_POST['latitude'], PDO::PARAM_INT);
		$insert_stmt->bindValue('longitudeS', $_POST['longitude'], PDO::PARAM_INT);
		$insert_stmt->execute();
	}
}

echo "<a href=sites.php>Retour aux sites </a>";
?>
