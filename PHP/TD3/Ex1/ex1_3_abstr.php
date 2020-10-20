<?php
abstract class Figure {
	
	abstract function __aire();
}

abstract class Polygone extends Figure {
	
	abstract NombreDeCotes() {
		return $nb_cote;
	}
}
//require_once ("polygone.php")
class Triangle extends Polygone {
	var $base; $hauteur;
}

class Rectangle extends Polygone {
	var $longueur; var $largeur;
}

class Cercle extends Figure {
	var $rayon;
}
?>
