<?php

class Equipement{
    private PDO $pdo;
    private Equipement $model;
    
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function afficher(){
        $sql = "SELECT * FROM equipement";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function trierParType() {
        $sql = "SELECT * FROM equipement ORDER BY 'type'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

        public function blood(){
        $sql = "SELECT * FROM equipement WHERE type = 'BLOOD'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();    
    }

    public function urine(){
        $sql = "SELECT * FROM equipement WHERE type = 'URINE'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();    
    }
    
    public function tissue(){
        $sql = "SELECT * FROM equipement WHERE type = 'TISSUE'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();    
    }

}