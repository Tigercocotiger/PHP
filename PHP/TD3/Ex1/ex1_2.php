<?php 
class Point {
	var $abs; var $ord; var $couleur;
	
	function __construct($abs, $ord, $couleur) {
		$this->abs=$abs;
		$this->ord=$ord;
		$this->couleur=$couleur;
	}
	
	function __print($vari) {
		echo '['.$vari->abs.','.$vari->ord.'] : '.$vari->couleur.'<br />'; 
	}
	
	function __distance_a($var1, $var2) {
		$distance=sqrt(pow($var1->abs-$var2->abs,2)+pow($var1->ord-$var2->ord,2));
		echo 'La distance est de '.$distance;
	}
}

$point1 = new Point(8,0, 'jaune');
$point1->__print($point1);
$point2 = new Point(0,1, 'jaune');
$point2->__print($point2);
$point2->__distance_a($point1, $point2);
?>