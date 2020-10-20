<?php 
class Article {
	Private $ref; 
	Private $designation; 
	Private $prixUnitaire; 
	
	public function __construct($ref,$designation,$prixUnitaire) {
		$this->ref=$ref;
		$this->designation=$designation;
		$this->prixUnitaire=$prixUnitaire;
	}


	public function __SetPrix($prixUnitaire) {
		$this->prixUnitaire=$prixUnitaire;
	}
	
	public function Getprix() {
		return $this->prixUnitaire;
	}
	
	public function SetDesignation($designation) {
		$this->designation=$designation;
	}
	
	public function GetDesignation() {
		return $this->designation;
	}
	
	public function SetReference($ref) {
		$this->ref=$ref;
	}
	
	public function GetReference() {
		return $this->ref;
	}
	
	public function Afficher() {
		echo '<td>'.$this->GetReference().'</td> <td>'.$this->GetDesignation().'</td><td>'.$this->GetPrix().'</td>';
	}
}
?>

