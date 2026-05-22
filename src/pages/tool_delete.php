<?php

// The page adapts to each ID

$title = "Delete";

$url = "../hooks/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

// Verify the ID

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Aucun outil sélectionné");
}

$found = false;

foreach ($data as $key => $item) {

    if ($item['id'] == $id) {

        unset($data[$key]);

        $found = true;

        break;
    }
}

if (!$found) {
    die("Outil introuvable");
}

$data = array_values($data);

// Save in json
file_put_contents(
    $url,
    json_encode($data, JSON_PRETTY_PRINT)
);

header("Location: ./Dashboard.php");

exit;
?>