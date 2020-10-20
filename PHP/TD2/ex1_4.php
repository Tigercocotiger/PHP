<html>
<?php $Terreur=[]; 
	if (isset($_POST['valider']))
	{ $Terreur ['prenom']=' à saisir'; $prenom='';
		if (isset($_POST["prenom"]))
		{ $prenom=$_POST['prenom'];
			if ( !empty(trim($prenom)))
			{	$Terreur ['prenom']=" ";}
		}
		$Terreur ['mois']=' à saisir'; $mois='';
		if (isset($_POST["mois"]))
		{ $mois=$_POST['mois'];
			if ( !empty(trim($mois)))
			{	$Terreur ['mois']=" ";}
		}
		$Terreur ['mois']=' à saisir'; $mois='';
		if (isset($_POST["mois"]))
		{ $mois=$_POST['mois'];
			if ( !empty(trim($mois)))
			{	$Terreur ['mois']=" ";}
		}
	}
?>
	
<head>
<title>Formulaire 1 en HTML5</title>
</head>
<body>
<form method="post">
<label for="prenom">pr&eacute;nom : </label><input type="text" id="prenom" name ="prenom" size="40" placeholder="saisir le pr&eacute;nom ici" value= '<?php echo $prenom ?>'> 
<span style='color:red'> <?php echo $Terreur ['prenom']; ?> </span>
	<label for="nom">nom : </label><input type="text" id="nom" name ="nom" size="40" placeholder="saisir le nom ici" value= '<?php echo $nom ?>'> 
<span style='color:red'> <?php echo $Terreur ['nom']; ?> </span>
	<br/>
	<br/>
	date naissance : <select name ="mois" value= '<?php echo $mois ?>'>
	<span style='color:red'> <?php echo $Terreur ['nom']; ?> </span>
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
<?php
	if (isset($_POST['valider']))
	{
		echo 'nom : ' .$_POST ['nom'];
		echo ' prenom : '.$_POST ['prenom'];
		echo ' né en : '.$_POST ['mois'] . ' ' .$_POST ['annee'];
		echo $_POST ['etude'];
		echo ' pense savoir programmer en ';
		$prog=$_POST ['prog'];
		foreach ($prog as $valeur) {
		echo "$valeur";}
		echo $_POST ['commentaire'];
	}
	?>																																																																																																																																																																																																																																																																										
		


</form>

</body>
</html>