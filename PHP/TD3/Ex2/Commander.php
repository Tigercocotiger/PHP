<?php session_start();	
?>

<?php
include ('Article.php');

$articles = unserialize(file_get_contents('data/article.txt'));
?>
<h1> Ajouter au panier </h1>
<table>
		<tr>
			<th>Reference</th>
			<th>Désignation</th>
			<th>Prix unitaire</th>
			<th>Acheter</th>
		</tr>
<?php
	foreach($articles as $article) {
		echo '<tr>';
		$article->afficher();
		echo '<td><a href="Achat.php?ref='.$article->GetReference().'"> Acheter</a></td>';
		echo '</tr>';
	
}

?>
</table>
<a href="VoirCaddie.php">Voir votre caddie</a>


