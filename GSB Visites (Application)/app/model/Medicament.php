<?php
namespace App\model;

Class Medicament {
    private $id;
    private $nomCommercial;
    private $idFamille;
    private $composition;
    private $effet;
    private $contreIndications;


    public function __construct($unId, $unNomCommercial, $unIdFamille, $unComposition, $unEffet, $unContreIndications){
        $this->id=$unId;
        $this->nomCommercial=$unNomCommercial;
        $this->idFamille=$unIdFamille;
        $this->composition=$unComposition;
        $this->effet=$unEffet;
        $this->contreIndications=$unContreIndications;
 
    }
    public function getId(){
        return $this->id;
    }
    public function getNomCommercial(){
        return $this->nomCommercial;
    }
    public function getIdFamille(){
        return $this->idFamille;
    }
    public function getComposition(){
        return $this->composition;
    }
    public function getEffet(){
        return $this->effet;
    }
    public function getContreIndication(){
        return $this->contreIndications;
    }

}
?>