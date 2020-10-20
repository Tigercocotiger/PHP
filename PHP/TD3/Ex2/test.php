<?php echo "<table>
	<thead>
		<tr>
			<th>Reference</th>
			<th>Désignation</th>
			<th>Prix unitaire</th>
		</tr>
	</thead>
	
	<tbody>
		<td>".$ref."</td>
		<td>".$des."</td>
		<td>".$pr."</td>
	</tbody>
	</table>";
	
	
	
	
	if (isset($_POST['ajout'])) {
	$des=$_POST['designation'];
	$pr=$_POST['prix'];
}
?>
























