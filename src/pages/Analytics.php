<?php

require_once('./composent/header.php');
require_once('./composent/navbar.php');

$url = "../Documentation/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

?>

<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3">Analytics</h1>
    <div class="grid grid-cols-1 lg:grid-cols-4 m-4">
        <p>I didn’t have time to make the page</p>
    </div>


</main>

<?php require_once('./composent/footer.php'); ?>