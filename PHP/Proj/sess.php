<?php
class Sess {
  public $connexion;
  public $utilisateur;
  public $nom;
  public $prenom;
  public $datecompte;

  // Methods
  function __construct(/*$connexion,$page,*/$utilisateur,$nom,$prenom,$datecompte) {
    /*$this->connexion = $connexion;
    $this->page = $page;*/
    $this->utilisateur = $utilisateur;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->datecompte = $datecompte;

  }

  // Setters

  /*function set_connexion($connexion) {
    $this->connexion = $connexion;
  }
  function set_page($page) {
    $this->page = $page;
  }*/

  function set_utilisateur($utilisateur) {
    $this->utilisateur = $utilisateur;
  }
  function set_nom($nom) {
    $this->nom = $nom;
  }
  function set_prenom($prenom) {
    $this->prenom = $prenom;
  }
  function set_datecompte($datecompte) {
    $this->datecompte = $datecompte;
  }

  // Getters
  function get_connexion() {
    return $this->connexion;
  }

  function get_page() {
    return $this->page;
  }
  
  function get_nom() {
    return $this->nom;
  }
  
}



?>