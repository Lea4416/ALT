<?php

namespace App\Models;

use App\Core\Sql;

class Categorie
{

    private $db;

    public function __construct()
    {
        $this->db = new \App\Core\Sql();
    }

    public function mostCostDepartement(){
        echo "Je n'ai pas pu aller jusqu'au bout de la fonction mais je voudrais quand même présenter ma reflexion";
        // Identification des départements liée au logiciel
        echo "Premiére Etap: Récupére dans la classe tools les département";
        $sql = '
        SELECT DISTINCT owner_department
        FROM tools
        ';
        var_dump($sql);

        $result_owner = $this->db->requeteReturn($sql);

        echo "Les voici :";

        echo ("Ensuite pour chaque département on récupére les logicielles :");
            $sql = "
                SELECT id
                FROM tools
                WHERE owner_department = 'Engineering'
            ";
        var_dump($sql);

            $result_id = $this->db->requeteReturn($sql);
        echo("Voici les résultats :");
        var_dump($result_id);

        echo ("A partir de ce moment la j'ai bloquer donc j'ai voulu essayer de le faire avec un département. Mes données sont différentes des votre, je le sais. Je voudrais quand même présenter ma réflexion");
            $cost = 0;

        
        echo("Recupération des prix des tools");
            foreach ($result_id as $ids_row){

                $id = $ids_row['id'];

                $sql = "
                    SELECT total_monthly_cost
                    FROM cost_tracking
                    WHERE tool_id = $id
                ";

                var_dump($sql);
            }

                $result_cost = $this->db->requeteReturn($sql);
                var_dump($result_cost);

                if (!empty($result_cost)) {
                        $cost += $result_cost;
                    };

                echo("Additions");
                $result_count_logiciel=count($result_id);
                var_dump($result_count_logiciel);


                $sql="
                SELECT department, COUNT(*) AS total
                FROM users
                WHERE department = 'Engineering'
                GROUP BY department;
                ";

                var_dump($sql);

                $result_users = $this->db->requeteReturn($sql);
                var_dump($result_users);
        }
}