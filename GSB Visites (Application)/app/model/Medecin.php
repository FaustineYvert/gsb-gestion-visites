<?php

namespace App\model;

class Medecin {

    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $tel;
    private $specialitecomplementaire;
    private $departement;


    public function __construct($unId, $unNom, $unPrenom, $unAdresse, $unTel, $unSpecialiteComplementaire, $unDepartement){
        $this->id=$unId;
        $this->nom=$unNom;
        $this->prenom=$unPrenom;
        $this->adresse=$unAdresse;
        $this->tel=$unTel;
        $this->specialitecomplementaire=$unSpecialiteComplementaire;
        $this->departement=$unDepartement;
 
    }
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getAdresse(){
        return $this->adresse;
    }
    public function getTel(){
        return $this->tel;
    }
    public function getSpecialite(){
        return $this->specialitecomplementaire;
    }
    public function getDepartement(){
        return $this->departement;
    }

}
?>