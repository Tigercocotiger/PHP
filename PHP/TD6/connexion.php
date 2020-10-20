<?php 

$db_config= array();
$db_config['SGBD']='mysql';
$db_config['HOST']='devbdd.iutmetz.univ-lorraine.fr';
$db_config['DB_NAME']='ravelli1u_SiteVente'; //erreur de base : SQLSTATE[42000] [1049] Unknown database 'ravelli1u_SiteVeente'
$db_config['USER']='ravelli1u_appli'; // erreur de login : SQLSTATE[28000] [1045] Access denied for user 'ravelli8u_appli'@'devweb1.iutmetz.site.univ-lorraine.fr' (using password: NO)
$db_config['PASSWORD']='31911786'; //erreur de mdp : SQLSTATE[28000] [1045] Access denied for user 'ravelli1u_appli'@'devweb1.iutmetz.site.univ-lorraine.fr' (using password: YES)

try {
	$objPdo = new PDO ($db_config['SGBD'].':host='.$db_config['HOST'].';port=3306;dbname='.$db_config['DB_NAME'],$db_config['USER'],$db_config['PASSWORD']);
	//echo "Connexion ok";
}
catch (Exception $exception) {
	die($exception->getMessage());
}
?>