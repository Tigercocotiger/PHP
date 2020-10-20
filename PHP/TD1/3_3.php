<html>
<head>
<title >Tableau </title >
</head>
<body>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$chaine= 'toto va à la salle de sport pour que toto devienne fort';
$tab=explode(' ',$chaine);
$nb=count($tab);

foreach ( $tab as $value )
{
echo $value; 
echo '<br/>';
}
?>
</body></html>
