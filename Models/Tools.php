<?php

namespace App\Models;

use App\Core\Sql;

class Tools
{

    private $db;

    public function __construct()
    {
        $this->db = new \App\Core\Sql();
    }

    public function liste_avec_filtre(string $order = null, array $filter)
    {
        $sql = "
            SELECT * 
            FROM tools
            ";

        if (!empty($filter)) {
            $sql .= " WHERE " . implode(" AND ", $filter);
        }

        $allowed = ["monthly_cost", "name", "updated_at"];
        if (in_array($order, $allowed)) {
            $sql .= "
            ORDER BY $order
            ";
        };
        var_dump($sql);

        $resultsql = $this->db->requete($sql);

        if (!isset($resultsql)) {
            $resultrsql = "Aucun resultat est ressorti";
        }

        $sql = "
            SELECT * 
            FROM tools
            ";
        $resulttotal = $this->db->requete($sql);

        $result = [
            "data" => $resultsql,
            "filtered" => count($resultsql),
            "total" => count($resulttotal),
        ];

        var_dump($result);
    }
}
