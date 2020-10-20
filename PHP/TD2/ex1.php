<html>
<head>
<title>Formulaire 1 en HTML5</title>
</head>
<body>
<form>
	<label for="prenom">pr&eacute;nom : </label><input type="text" id="prenom" name ="prenom" size="40" placeholder="saisir le pr&eacute;nom ici">
	<label for="nom">nom : </label><input type="text" id="nom" name ="nom" size="40" placeholder="saisir le nom ici" required>
	<br/>
	<br/>
	date naissance : <select name ="mois">
	<?php
		$mois = array("","Janvier","F&eacute;vrier","Mars","Avril","Mai","Juin","Juillet","Ao&ucirc;t","Septembre","Octobre","Novembre","D&eacute;cembre");
		foreach ($mois as $unmois)
		{
			echo "<option>", $unmois, "</option>";
		}
		?>
	</select>
<!-- 
affichage date picker actuellement que sur Opera et Safari sinon affichage champ text
	date naissance : <input type="date" name ="dtnais">   
-->
	<select name ="annee">
	<?php
		echo "<option></option>";
		for ($i=1980; $i<=date("Y");$i++)
		{
			echo "<option>", $i, "</option>";
		}
	?>
	</select>

	<br/>
	<br/>
	<div style='float:left; width:50%; border-width: 1px; border-style: solid; border-color: #000000' align='center'>
	&eacute;tudes : <br/>
	<table>
	<?php
		$etude = array("BAC +1","BAC +2","BAC +3");	
		foreach ($etude as $unetude)
		{
			echo "<tr><td>$unetude<td/><td><input type='radio' value ='$unetude' name ='etude' ></td></tr>";		
		}
	?>
	</table>
	</div>
	<div style='border-width: 1px; border-style: solid; border-color: #000000' align='center' >
	programmation : <br/>
	<table>
	<?php
		$prog = array("C","JAVA","PHP");
		foreach ($prog as $unprog)
		{
			echo "<tr><td>$unprog<td/><td><input type='checkbox' value ='$unprog' name ='prog[]' ></td></tr>";
		}
	?>	
	</table>
	</div>
	<br/>	
	Commentaires<br/>
	<textarea name ="commentaire" rows="10" cols="80" placeholder="saisir vos commentaires et remarques ici"></textarea><br/>
	<br/>
	<INPUT style='float:right' TYPE="submit" NAME="valider" VALUE=" Valider ">
	<INPUT style='float:left' TYPE="reset" NAME="raz" VALUE="Valeurs par d&eacute;faut ">	
</form>

</body>
</html>