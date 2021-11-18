<?php

Class Famille {

    private $id;
    private $libelle;


    public function __construct($unId, $unLibelle){
        $this->id=$unId;
        $this->libelle=$unLibelle;
 
    }
    public function getId(){
        return $this->id;
    }
    public function getLibelle(){
        return $this->libelle;
    }
}
?>