<?php

class Technicien{
    private PDO $pdo;
    private Technicien $model;
    
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function afficher(){
        $sql = "SELECT * FROM technicien";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function trierParType() {
        $sql = "SELECT * FROM technicien ORDER BY 'speciality'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

            public function blood(){
        $sql = "SELECT * FROM technicien WHERE speciality = 'BLOOD'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();    
    }

    public function urine(){
        $sql = "SELECT * FROM technicien WHERE speciality = 'URINE'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();    
    }
    
    public function tissue(){
        $sql = "SELECT * FROM technicien WHERE speciality = 'TISSUE'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();    
    }

    public function generale(){
        $sql = "SELECT * FROM technicien WHERE speciality = 'GENERAL'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();    
    }

}