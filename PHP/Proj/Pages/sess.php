<?php
class Sess {
  public $id;
  public $connexion;
  public $utilisateur;
  public $nom;
  public $prenom;
  public $datecompte;

  // Methods
  function __construct(/*$connexion,$page,*/$id,$utilisateur,$nom,$prenom,$datecompte) {
    /*$this->connexion = $connexion;
    $this->page = $page;*/
    $this->id = $id;
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

  function set_id($id){
    $this->id = $id;
  }
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
  function get_id(){
    return $this->id;
  }

  function get_connexion() {
    return $this->connexion;
  }

  function get_page() {
    return $this->page;
  }
  
  function get_nom() {
    return $this->nom;
  }

  function get_prenom() {
    return $this->prenom;
  }

  function get_utilisateur() {
    return $this->utilisateur;
  }
  function get_datecompte(){
    return $this->datecompte;
  }
}



?>