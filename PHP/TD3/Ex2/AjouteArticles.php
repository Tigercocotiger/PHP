<style>
td {
border-width : 1px;
border-style : solid;
}
table {
    width: 800px ;
    margin-left: auto ;
    margin-right: auto ;
    border-collapse: collapse ;
}
</style>

<?php
include('Article.php');
$s=file_get_contents('./data/articles.txt');
$T_article=unserialize($s);

if(!empty($_POST)) {
	$ok=true;
	$_POST['designation']=trim(htmlentities($_POST['designation']));
	$_POST['prix']=trim(htmlentities($_POST['prix']));
	if (empty($_POST['designation'])) {
		echo "Vous devez renseigenr la désignation du produit. <br/>";
		$ok=false;
	}
	if (empty($_POST['prix'])) {
		echo "Vous devez renseigner le prix d'un article";
		$ok=false;
	}
	elseif(!is_numeric($_POST['prix'])) {
		echo "Le prix renseigné n'est pas correct. <br/>";
		$ok=false;
	}
	
	if($ok) {
		$key=max(array_keys($T_article))+1;
		$T_article[$key]=new Article($key,$_POST['designation'],$_POST['prix']);
		file_put_contents('data/articles.txt', serialize($T_article));
	}
}

echo "<h1>Article en vente</h1>";
echo "<table><thead><tr><th>Référence</th><th>Désignation</th><th>Prix unitaire</th></tr></thead>";
foreach ($T_article as $unArticle) {
	echo '<tr>';
	$unArticle-> Afficher();
echo'</tr>';}
echo"</tbody></table><br /><h1>Ajouter un article</h1>";
?>

<form method="post">
Designation : <input type="text" size="20" name="designation">
Prix unitaire : <input type="text" size="20" name="prix">
<input type="submit" name="ajout" value="Ajouter">
</form>

