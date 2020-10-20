<?php	
require 'Article.php';
?>

<form method="post">
<strong> Voici vos articles commandés : </strong> </br> </br>

<?php
echo '<table>
	<thead>
		<tr>
			<th>Quantité</th>
			<th>Reference</th>
			<th>Désignation</th>
			<th>Prix unitaire</th>
			<th>Prix Total</th>
		</tr>
	</thead>
	
	<tbody>
		<td>2</td>
		<td>1</td>
		<td>Table</td>
		<td>1000</td>
		<td>2000</td>
	</tbody>
	</table>

</form>'
?>
Prix Total TTC: </br> </br>



<a href="Commander.php"> Retourner à la liste des articles</a>
	