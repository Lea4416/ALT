<?php
require_once('./composent/header.php');

$title = "Dashboard";

$url = "https://tt-jsonserver-01.alt-tools.tech/tools";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

$localData = $data;

require_once('./composent/navbar.php');

?>

<main class="bg-gray-100 mx-4 p-4">
    <h1 class="font-bold text-xl pt-3">Tools</h1>
    <p>This is the list of tolls:</p>
    <div class="grid grid-cols-1 lg:grid-cols-4 m-4 p-4 gap-4 rounded-lg">
        <?php foreach ($data as $item): ?>
            <div class="bg-white border gap-1 rounded-lg text-center justify-items-center">
                <p class="px-4 py-2"> Names : <?= $item['name'] ?></p>
                <p class="px-4 py-2"> Departement :<?= $item['owner_department'] ?></p>
                <p class="px-4 py-2"> Number user active : <?= $item['active_users_count'] ?></p>
                <p class="px-4 py-2"> Monthly Cost : <?= $item['monthly_cost'] ?></p>
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
                <p class=" <?= $class ?> rounded-md p-1 my-1 w-fit text-center"><?= $item['status'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php
require_once('./composent/footer.php');
?>