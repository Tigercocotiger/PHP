<?php 
include ('Article.php');
Class Caddie 
{
	
	private $articles , $quantites;
	
	public function __construct(){
		$this->articles=array();
		$this->quantites=array();
	}
		
		
	public function afficher(){
		foreach($this->articles as $key=>$article) {
			echo '<tr>';
			$article->afficher();
			echo '<td>' .$this->quantites[$key].'</td>';
			echo '<td>' .$article->GetPrix()*$this->quantites[$key].'</td>';
			echo '</tr>';	
	}
	}
	
	function afficherTotal() {
		$total=0;
		foreach($this->articles as $key=>$article)
			$total+=$article->GetPrix()*$this->quantites[$key];
			echo 'Prix total TTC : ' .$total. '<br/>';
	}
	
	function GetNbArticle() {
		return count($this->articles);
	}
	
	function ajouterArticle($article,$quantite) {
		$this->articles[$article->GetReference()]=$article;
		if(empty($this->quantites[$article->GetReference()]))
			$this->quantites[$article->GetReference()]=$quantite;
		else
			$this->quantites[$article->GetReference()]+=quantite;
		
	}
}
?>