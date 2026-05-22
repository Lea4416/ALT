<?php

$title = "Tools";

$url = "../Documentation/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

require_once('./composent/header.php');

require_once('./composent/navbar.php');

?>

<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3">Tools</h1>
    <p>This is the list of tolls:</p>
    <div class="grid grid-cols-1 lg:grid-cols-4 m-4 p-4 gap-4 rounded-lg">
        <?php foreach ($data as $item): ?>
            <div class="bg-white border gap-1 rounded-lg text-center justify-items-center">
                <p class="px-4 py-2"> Names :  <?= $item['name'] ?? 'Not to communicate' ?></p>
                <p class="px-4 py-2"> Departement :<?= $item['owner_department'] ?? 'Not to communicate' ?></p>
                <p class="px-4 py-2"> Number user active : <?= $item['active_users_count'] ?? 'Not to communicate' ?></p>
                <p class="px-4 py-2"> Monthly Cost : <?= $item['monthly_cost'] ?? 'Not to communicate' ?></p>
                <?php
                $status = $item['status'];
                if ($status === "active") {
                    $class = "bg-green-500";
                } elseif ($status === "expiring") {
                    $class = "bg-red-500";
                } elseif ($status === "unused") {
                    $class = "bg-orange-500";
                } else {
                    echo "Il y a un probléme de status";
                    die();
                }
                ?>
                <p class=" <?= $class ?> rounded-md p-1 w-fit text-center"><?= $item['status'] ?></p>
                <div>
                    <a href="./tool_detail.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">View details</a>
                    <a href="./tool_update.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">Update the tool</a>
                    <a href="./tool_delete.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">Delete the tool (This would be irreparable)</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php
require_once('./composent/footer.php');
?>