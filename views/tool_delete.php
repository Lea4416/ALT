<?php

// $title = "Dashboard";

$url = "../Documentation/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

$id = $_GET['id'] ?? null;

// var_dump($id);

if (!$id) {
    die("Aucun outil sélectionné");
}

$tool = null;



foreach ($data as $item) {
    if ($item['id'] == $id) {
        // var_dump($item);
        $tool = $item;
        // var_dump($tool);
        break;
    }
}

if (!$tool) {
    die("Outil introuvable");
}

$json = json_encode($tool);

unset($json);

echo "Tool effacer";

header("Location: ./Dashboard.php");
exit;
?>
