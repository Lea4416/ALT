<?php

namespace App\Core;

class Sql {

    public string $dsn;
    public string $user;
    public string $pass;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;port=3306;dbname=internal_tools;charset=utf8mb4";
        $this->user = "dev";
        $this->pass = "dev123";
    }

    public function requete(string $sql){
        $pdo = new \PDO($this->dsn,"$this->user","$this->pass");
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}

