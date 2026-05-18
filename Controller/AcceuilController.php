<?php

namespace App\Controller;

use App\Core\Sql;
use App\Models\Tools;

class AcceuilController{

    private Tools $tools;

    public function __construct()
    {
        $this->tools = new Tools();
    }

  public function liste_avec_filtre(?string $order = null, array $filter = [])
    {
       return $this->tools->liste_avec_filtre($order, $filter);
    }

    public function researchById(int $id)
    {
        return $this->tools->researchById($id);
    }

    public function creationOutil(string $name, string $description = null, string $vendor, string $website_url = null, float $monthly_cost, string $owner_department)
    {
        return $this->tools->creationOutil($name, $description, $vendor, $website_url, $monthly_cost,  $owner_department);
    }
}