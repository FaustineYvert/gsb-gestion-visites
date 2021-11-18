<?php

namespace App\model;

Class Visiteur {
    private $id;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    private $adresse;
    private $cp;
    private $ville;
    private $dateEmbauche;
    private $timespan;
    private $ticket; 


    public function __construct($unId, $unNom, $unPrenom, $unLogin, $unMdp, $unAdresse, $unCp, $unVille, $unDateEmbauche){
        $this->id=$unId;
        $this->nom=$unNom;
        $this->prenom=$unPrenom;
        $this->login=$unLogin;
        $this->mdp=$unMdp;
        $this->adresse=$unAdresse;
        $this->cp=$unCp;
        $this->ville=$unVille;
        $this->dateEmbauche=$unDateEmbauche;
 
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
    public function getLogin(){
        return $this->login;
    }
    public function getMdp(){
        return $this->mdp;
    }
    public function getAdresse(){
        return $this->adresse;
    }
    public function getCp(){
        return $this->cp;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getDateEmbauche(){
        return $this->dateEmbauche;
    }
    public function getTimeSpan(){
        return $this->timespan;
    }
    public function getTicket(){
        return $this->ticket;
    }


}
?>