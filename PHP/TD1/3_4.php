<html>
<head>
<title >Tableau </title >
</head>
<body>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$chaine= 'toto va à la salle de sport pour que toto devienne fort';
$tab=explode(' ',$chaine);
$nb=0;

foreach ( $tab as $value )
{
echo $value; 
echo $nb=$nb+count($value);
echo '<br/>';
}
?>
</body></html>