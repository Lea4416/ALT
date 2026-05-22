<?php

namespace App\Controller;

use App\Core\Sql;
use App\Models\Tools;
use App\Models\Categorie;

class AcceuilController{

    private Tools $tools;
    private Categorie $categorie;

    public function __construct()
    {
        $this->tools = new Tools();
        $this->categorie = new Categorie();
    }


/**
 * Permet de faire des liste en appliquant différent filtre *
 * @param string|null $order
 * @param array $filter
 * @return void
 */
  public function liste_avec_filtre(?string $order = null, array $filter = [])
    {
        return $this->tools->liste_avec_filtre($order, $filter);
    }
    /**
     * Permet de faire une recherche par Id
     *
     * @param integer $id
     * @return void
     */
    public function researchById(int $id)
    {
        return $this->tools->researchById($id);
    }


    /**
     * Permet d'inserer un outils dans la table tools
     *
     * @param string $name
     * @param string|null $description
     * @param string $vendor
     * @param string|null $website_url
     * @param float $monthly_cost
     * @param string $owner_department
     * @param string $categorie
     * @return void
     */
    public function creationOutil(string $name, string $description = null, string $vendor, string $website_url = null, float $monthly_cost, string $owner_department, string $categorie)
    {
        return $this->tools->creationOutil($name, $description, $vendor, $website_url, $monthly_cost,  $owner_department,$categorie);
    }
    /**
     * 
     *
     * @param string $name
     * @param string|null $description
     * @param string $status
     * @param float $monthly_cost
     * @return void
     */
    public function modification(string $name,string $description = null,string $status,float $monthly_cost) {
        return $this->tools->modification($name, $description,$status,$monthly_cost);
    }

    public function mostCostDepartement(){
        return $this->categorie->mostCostDepartement();
    }

      public function table(?string $order = null, array $filter = [])
    {
        return $this->tools->liste_avec_filtre($order, $filter);
    }
}

      