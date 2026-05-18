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

        $result_sql = $this->db->requete($sql);

        if (!isset($result_sql)) {
            $resultsql = "Aucun resultat est ressorti";
        }

        $sql = "
            SELECT * 
            FROM tools
            ";
        $result_total = $this->db->requete($sql);

        $result = [
            "data" => $result_sql,
            "filtered" => count($result_sql),
            "total" => count($result_total),
        ];

        var_dump($result);
    }

    public function researchById(int $id)
    {
        $sql = "
            SELECT * 
            FROM tools
            WHERE id = '$id'
            ";
        $result = $this->db->requete($sql);
        if (empty($result)) {
            $result = "Il n'y a pas de résultat";
        }

        // $sql = "
        //     SELECT SUM(active_users_count) AS total_sessions
        //     FROM cost_tracking
        //     WHERE tool_id = $id
        //     ";
        // $result_total = $this->db->requete($sql);

        var_dump($sql,$result);
        // var_dump($result_total);
    }

    public function creationOutil(string $name, string $description = null, string $vendor, string $website_url = null, float $monthly_cost, string $owner_department)
    {
        // var_dump($name, $description, $vendor, $website_url, $monthly_cost, $owner_department);

        $category_id = 0;
        switch ($owner_department) {
            case "communication":
                $category_id = 1;
                break;

            case "development":
                $category_id = 2;
                break;

            case "design":
                $category_id = 3;
                break;

            case "productivity":
                $category_id = 4;
                break;

            case "analytics":
                $category_id = 5;
                break;

            case "security":
                $category_id = 6;
                break;

            case "marketing":
                $category_id = 7;
                break;

            case "hr":
                $category_id = 8;
                break;

            case "finance":
                $category_id = 9;
                break;

            case "infrastructure":
                $category_id = 10;
                break;

            default:
                echo "Il y a un probléme au niveau de la catégorie";
                break;
        };

        if (
            empty(trim($name)) ||
            empty(trim($vendor)) ||
            empty($monthly_cost) ||
            empty(trim($owner_department)) ||
            empty($category_id) 
        ) {
            die("Tous les champs sont obligatoires");
        }

        if (strlen($name) < 2 || strlen($name) > 100) {
            die("Nom invalide (2 à 100 caractères)");
        }
        if (strlen($vendor) > 100) {
            die("Nom invalide (2 à 100 caractères)");
        }

        if (!is_numeric($monthly_cost) || $monthly_cost < 0) {
            die("Le coût doit être un nombre positif");
        }

        if (!is_numeric($category_id) || $category_id < 0) {
            die("Le coût doit être un nombre");
        }

        $sql = "
        INSERT INTO tools
        (name, description, vendor, website_url, category_id,monthly_cost,active_users_count,owner_department,status)
        VALUES
        ('$name','$description','$vendor','$website_url','$category_id','$monthly_cost', '0', '$owner_department',NULL)
        ";
        var_dump($sql);

        $result = $this->db->requete($sql);
    }

    public function modification(string $name,string $description = null,string $status,float $monthly_cost) {
        var_dump($name,$description,$status,$monthly_cost);
             if (
            empty(trim($name)) ||
            empty(trim($status)) ||
            empty($monthly_cost) 
        ) {
            die("Tous les champs sont obligatoires");
        }

        $allowed=["active","deprecated","trial"];
        if (in_array($status, $allowed)) {
            die("Le statut n'est pas bon.");
        };


        if (strlen($name) < 2 || strlen($name) > 100) {
            die("Nom invalide (2 à 100 caractères)");
        }

        if (!is_numeric($monthly_cost) || $monthly_cost < 0) {
            die("Le coût doit être un nombre positif");
        }

        $sql = "
        UPDATE tools
        SET description = '$description',
            monthly_cost = '$monthly_cost',
            status = '$status'
        WHERE name = '$name'
        ";

        var_dump($sql);

        $result = $this->db->requete($sql);
    }

    


}
