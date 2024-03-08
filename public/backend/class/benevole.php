<?php

class Benevole
{
  private $id;
  private $nom;
  private $prenom;
  private $age;
  private $sexe;
  private $telephone;
  private $email;
  private $region;
  private $disponibiliteJour;
  private $disponibiliteHoraire;
  private $postPrivilegie;
  private $expressionLibre;

  public function __construct($id, $nom, $prenom, $age, $sexe, $telephone, $email, $region, $disponibiliteJour, $disponibiliteHoraire, $postPrivilegie, $expressionLibre)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->age = $age;
    $this->sexe = $sexe;
    $this->telephone = $telephone;
    $this->email = $email;
    $this->region = $region;
    $this->disponibiliteJour = $disponibiliteJour;
    $this->disponibiliteHoraire = $disponibiliteHoraire;
    $this->postPrivilegie = $postPrivilegie;
    $this->expressionLibre = $expressionLibre;
  }

  // Getters
  public function getId()
  {
    return $this->id;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function getPrenom()
  {
    return $this->prenom;
  }

  public function getAge()
  {
    return $this->age;
  }

  public function getSexe()
  {
    return $this->sexe;
  }

  public function getTelephone()
  {
    return $this->telephone;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getRegion()
  {
    return $this->region;
  }

  public function getDisponibiliteJour()
  {
    return $this->disponibiliteJour;
  }

  public function getDisponibiliteHoraire()
  {
    return $this->disponibiliteHoraire;
  }

  public function getPostPrivilegie()
  {
    return $this->postPrivilegie;
  }

  public function getExpressionLibre()
  {
    return $this->expressionLibre;
  }

  // Setters
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
  }

  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
  }

  public function setAge($age)
  {
    $this->age = $age;
  }

  public function setSexe($sexe)
  {
    $this->sexe = $sexe;
  }

  public function setTelephone($telephone)
  {
    $this->telephone = $telephone;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function setRegion($region)
  {
    $this->region = $region;
  }

  public function setDisponibiliteJour($disponibiliteJour)
  {
    $this->disponibiliteJour = $disponibiliteJour;
  }

  public function setDisponibiliteHoraire($disponibiliteHoraire)
  {
    $this->disponibiliteHoraire = $disponibiliteHoraire;
  }

  public function setPostPrivilegie($postPrivilegie)
  {
    $this->postPrivilegie = $postPrivilegie;
  }

  public function setExpressionLibre($expressionLibre)
  {
    $this->expressionLibre = $expressionLibre;
  }

  public function convertToArray()
  {
    return [
      'id' => $this->getId(),
      'nom' => $this->getNom(),
      'prenom' => $this->getPrenom(),
      'age' => $this->getAge(),
      'sexe' => $this->getSexe(),
      'telephone' => $this->getTelephone(),
      'email' => $this->getEmail(),
      'region' => $this->getRegion(),
      'disponibiliteJour' => $this->getDisponibiliteJour(),
      'disponibiliteHoraire' => $this->getDisponibiliteHoraire(),
      'postPrivilegie' => $this->getPostPrivilegie(),
      'expressionLibre' => $this->getExpressionLibre(),
    ];
  }
}
