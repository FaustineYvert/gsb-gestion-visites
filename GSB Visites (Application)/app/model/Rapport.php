<?php

namespace App\model;

Class Rapport {
    private $id;
    private $date;
    private $motif;
    private $bilan;
    private $idVisiteur;
    private $idMedecin;


    public function __construct($unId, $unDate, $unMotif, $unBilan, $unIdVisiteur, $unIdMedecin){
        $this->id=$unId;
        $this->date=$unDate;
        $this->motif=$unMotif;
        $this->bilan=$unBilan;
        $this->idVisiteur=$unIdVisiteur;
        $this->idMedecin=$unIdMedecin;
 
    }
    public function getId(){
        return $this->id;
    }
    public function getDate(){
        return $this->date;
    }
    public function getMotif(){
        return $this->motif;
    }
    public function getBilan(){
        return $this->bilan;
    }
    public function getVisiteur(){
        return $this->idVisiteur;
    }
    public function getMedecin(){
        return $this->idMedecin;
    }

}
?>