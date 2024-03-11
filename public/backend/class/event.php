<?php

class Event {
    private $id;
    private $region;
    private $date;
    private $nom;
    private $commentaire;

    // Constructeur
    public function __construct($id, $region, $date, $nom, $commentaire) {
        $this->id = $id;
        $this->region = $region;
        $this->date = $date;
        $this->nom = $nom;
        $this->commentaire = $commentaire;
    }

    // Getter et Setter pour id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter et Setter pour region
    public function getRegion() {
        return $this->region;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    // Getter et Setter pour date
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    // Getter et Setter pour nom
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Getter et Setter pour commentaire
    public function getCommentaire() {
        return $this->commentaire;
    }

    public function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    public function convertToArray()
    {
        return [
            $this->getId(),
            $this->getRegion(),
            $this->getDate(),
            $this->getNom(),
            $this->getCommentaire(),
        ];
    }
}