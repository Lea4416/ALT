<?php

require_once('./Core/db.php');
require_once('./Models/Echantillon.php');
require_once('./Models/Equipement.php');
require_once('./Models/Technicien.php');

class AccueilController {

        private Echantillon $echantillon;
        private Equipement $equipement;
        private Technicien $technicien;

    public function __construct(PDO $pdo) {
        $this->echantillon = new Echantillon($pdo);
        $this->equipement = new Equipement($pdo);
        $this->technicien = new Technicien($pdo);
    }


    public function afficherEchantillon() {
            return $this->echantillon->afficher();
    }

    public function afficherEquipement() {
            return $this->equipement->afficher();
    }    
    
    public function afficherTechnicien() {
            return $this->technicien->afficher();
    }

    public function afficherTrierEchantillon(){
        return $this->echantillon->trierParUrgence();
    }

    public function afficherTrierParEquipement(){
        return $this->equipement->trierParType();
    }
    
    public function afficherTrierParTechnicien(){
        return $this->technicien->trierParType();
    }

    public function bloodEchantillon(){
        return $this->echantillon->blood();     
    }

    public function urineEchantillon(){
        return $this->echantillon->urine();     
    }

    public function tissueEchantillon(){
        return $this->echantillon->tissue();     
    }

        public function bloodEquipement(){
        return $this->equipement->blood();     
    }

    public function urineEquipement(){
        return $this->equipement->urine();     
    }

    public function tissueEquipement(){
        return $this->equipement->tissue();     
    }

    public function bloodTechnicien(){
        return $this->technicien->blood();     
    }

    public function urineTechnicien(){
        return $this->technicien->urine();     
    }

    public function tissueTechnicien(){
        return $this->technicien->tissue();     
    }

    public function generalTechnicien(){
        return $this->technicien->generale();     
    }

    public function planifyLab(){ 

    $technicien = $this->technicien->afficher();
    
    foreach ($technicien as $row){

    $spe = strtolower($row["speciality"]);
    $methodTech = $spe . "Technicien";
    $methodEq = $spe . "Equipement";
    $methodEch = $spe . "Echantillon";

    $techniciens = $this->techniciens->$methodTech();
    $equipements = $this->equipements->$methodEq();
    $echantillons = $this->echantillons->$methodEch();
}
}


    }
    