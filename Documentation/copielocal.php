<?php

$url = "https://tt-jsonserver-01.alt-tools.tech/departments";

$response = file_get_contents($url);

$data = json_decode($response, true);

file_put_contents(
    "./data/department.json",
    json_encode($data, JSON_PRETTY_PRINT)
);

echo "Departements Copie créée avec succès";