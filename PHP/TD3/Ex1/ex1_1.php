<?php 
class Point {
	var $abs; var $ord; var $couleur;
	
	function __construct($abs, $ord, $couleur) {
		$this->abs=$abs;
		$this->ord=$ord;
		$this->couleur=$couleur;
	}
	
	function __print($var) {
		
		echo '['.$var->abs.','.$var->ord.'] : '.$var->couleur;
	}
}
$var = new Point(2,4, 'jaune');
$var->__print($var);

?>