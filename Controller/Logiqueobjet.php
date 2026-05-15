<?php

class Logiqueobjet
{

    public function reucpererlesvaleurs()
    {
        $scores = [
    "level1" => 100,
    "level2" => 85,
    "level3" => 95
];
print_r(array_values($scores)); // [100, 85, 95]
    }

    public function transform()
    {
        $pricesInDollard = [];

        $pricesInEuros = [
            "book" => 20,
            "pen" => 5,
            "notebook" => 10
        ];

        foreach ($pricesInEuros as $cle => $valeur) {
            $pricesInDollard[$cle] = $valeur * 1.1;
        }
        var_dump($pricesInDollard);
    }

    public function fusion()
    {
        $store1Sales = [
            "january" => 1000,
            "february" => 1200,
            "march" => 900
        ];
        $store2Sales = [
            "january" => 800,
            "february" => 950,
            "march" => 1100
        ];
        $resultat = (object)[];

        foreach ((array)$store1Sales as $cle => $valeur) {
            $resultat->$cle = $valeur + $store2Sales[$cle];
        }
        var_dump($resultat);
    }
    public function filtreCondition()
    {
        $inventory = [
            "laptop" => 0,
            "smartphone" => 5,
            "tablet" => 0,
            "headphones" => 8
        ];
        // arsort($inventory);

        var_dump($inventory);
    }
}
