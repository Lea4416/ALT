<?php

class Logiquearray
{

    public function filtre()
    {
        // Cas d'usage : Filtrage des utilisateurs actifs dans une application
        $users = [
            ["id" => 1, "name" => "Alice", "age" => 25, "active" => true],
            ["id" => 2, "name" => "Bob", "age" => 30, "active" => false],
            ["id" => 3, "name" => "Charlie", "age" => 35, "active" => true]
        ];
        $resultat = array_filter($users, function ($user) {
            return $user["active"] === true;
        });
        var_dump($resultat);
        // [["id" => 1, "name" => "Alice", "age" => 25, "active" => true], ["id" => 3, "name" => "Charlie", "age" => 35, "active" => true]]
    }
    public function doublefiltre()
    {
        // Cas d'usage : Regroupement de produits par catégorie dans un e-commerce
        $products = [
            ["id" => 1, "name" => "Laptop", "category" => "Electronics", "price" => 999],
            ["id" => 2, "name" => "Smartphone", "category" => "Electronics", "price" => 699],
            ["id" => 3, "name" => "T-shirt", "category" => "Clothing", "price" => 29]
        ];
        // ["Electronics" => [...], "Clothing" => [...]]
        $resultat = [];

        foreach ($products as $product) {
            $category = $product["category"];
            $resultat[$category][] = $product;
        }

        var_dump($resultat);

        // [["id" => 1, "name" => "Alice", "age" => 25, "active" => true], ["id" => 3, "name" => "Charlie", "age" => 35, "active" => true]]
    }

    public function fusiontableau()
    {
        // Cas d'usage : Trouver les livres disponibles dans deux bibliothèques
        $library1 = [
            ["id" => 1, "title" => "1984", "author" => "Orwell", "available" => true],
            ["id" => 2, "title" => "Dune", "author" => "Herbert", "available" => false]
        ];
        $library2 = [
            ["id" => 3, "title" => "1984", "author" => "Orwell", "available" => true],
            ["id" => 4, "title" => "Foundation", "author" => "Asimov", "available" => true]
        ];

        $resultat = array_merge($library1, $library2);
        var_dump($resultat);

        // ["id" => 1, "title" => "1984", "author" => "Orwell", "available" => true]("id" => 1, "title" => "1984", "author" => "Orwell", "available" => true)
    }

    public function transform()
    {
        // Cas d'usage : Création d'un rapport de salaires avec noms complets
        $employees = [
            ["id" => 1, "firstName" => "John", "lastName" => "Doe", "salary" => 50000],
            ["id" => 2, "firstName" => "Jane", "lastName" => "Smith", "salary" => 60000]
        ];
        // var_dump($employees);
        $transformer = function ($employees) {
            return [
                "id" => $employees["id"],
                "fullName" => $employees["firstName"] . " " . $employees["lastName"],
                "annualSalary" => $employees["salary"] * 12
            ];
        };
        // var_dump($transformer);
        $resultat = [];
        foreach ($employees as $employee) {
            $resultat[] = $transformer($employee);
        }
        var_dump($resultat);

        // [["id" => 1, "fullName" => "John Doe", "annualSalary" => 600000], ...]
    }

    public function agrege()
    {
        // Cas d'usage : Calcul des totaux par catégorie de dépenses
        $transactions = [
            ["id" => 1, "type" => "debit", "amount" => 100, "category" => "Food"],
            ["id" => 2, "type" => "debit", "amount" => 50, "category" => "Food"],
            ["id" => 3, "type" => "credit", "amount" => 75, "category" => "Income"]
        ];
        $resultat = [];

        foreach($transactions as $result){
                    $type = $result["type"];

        if (!isset($resultat[$type])) {
            $resultat[$type] = 0;
        }

        $resultat[$type] += $result["amount"];
        }
        var_dump($resultat);
        // print_r(aggregateData($result, 'category', 'amount'));
        // ["Food" => 150, "Income" => 75]
    }
}
