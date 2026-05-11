<?php

class Echantillon{
    private PDO $pdo;
    private Echantillon $model;
    
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function afficher(){
        $sql = "SELECT * FROM echantillon";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function trierParUrgence() {
        $sql = "SELECT * FROM echantillon ORDER BY priority";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function assignationDesRessources(){
        $sql = "SELECT * FROM echantillon WHERE type = 'BLOOD' ORDER BY priority ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $reponse = [];
        foreach ($rows as $row) {
            $sql = "INSERT INTO planning (SampleId, technicianId, equipmentId, startTime, endTime, priority) VALUES (?, ?, ?, ?, ?, ?)";

        $reponse [] = [
            $row['id'],
            "technicianId",
            "equipmentId",
            "startTime",
            "endTime",
            $row['priority']
        ];
        }
        return $reponse;
    }

}