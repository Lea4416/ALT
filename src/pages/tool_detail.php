<?php

// The page adapts to each ID

$url = "../hooks/data/tools.json";

$response = file_get_contents($url);

$data = json_decode($response, true) ?? [];

$id = $_GET['id'] ?? null;

// var_dump($id);

if (!$id) {
    die("Aucun outil sélectionné");
}

$tool = null;


// Verify if the ID exist
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

// var_dump($item);

$title = $item['name'];

require_once('../components/header.php');
require_once('../components/navbar.php');

?>
<main class="bg-gray-100 mx-4 p-4">
<h1 class="font-bold text-xl pt-3 text-black"><?=  $item['name'] ?></h1>

<!-- Views details of the tools -->

<h2 class="font-bold text-l pt-3 underline">Géneral Information</h2>

<div class="bg-white border gap-1 rounded-lg justify-items-center m-2">

<ul class="list-disc ml-5">
    <li>Name : <?= $item['name'] ?? 'Not to communicate' ?></li>
    <li>Departement : <?= $item['owner_department'] ?? 'Not to communicate' ?></li>
    <li>Monthly Cost : <?= $item['monthly_cost'] ?? 'Not to communicate' ?></li>
    <li>Number active user active : <?= $item['active_users_count'] ?? 'Not to communicate' ?></li>
    <li>Status : <?= $item['status'] ?? 'Not to communicate' ?></li>
</ul>

</div>

<h2 class="font-bold text-l pt-3 underline">More Information</h2>

<div class="bg-white border gap-1 rounded-lg justify-items-center m-2">

<ul class="list-disc ml-5">
    <li>Id : <?= $item['id'] ?? 'Not to communicate' ?></li>
    <li>Description : <?= $item['description'] ?? 'Not to communicate' ?></li>
    <li>Category : <?= $item['category'] ?? 'Not to communicate' ?></li>
    <li>Vendor : <?= $item['vendor'] ?? 'Not to communicate' ?></li>
    <li>Website (url) : <?= $item['website_url'] ?? 'Not to communicate' ?></li>
        <li class="flex items-center gap-2">
        <span>Icon :</span>

        <?php if (!empty($item['icon_url'])): ?>
            <img
                class="w-10 h-10 rounded"
                src="<?= $item['icon_url'] ?>"
                alt=""
                onerror="this.style.display='none'"
            >
        <?php endif; ?>
    </li>
    <li>Created at : <?= $item['created_at'] ?? 'Not to communicate' ?></li>
    <li>Updated at : <?= $item['updated_at'] ?? 'Not to communicate' ?></li>
</ul>
</div>

<h2 class="font-bold text-l pt-3 underline">Accountancy Data</h2>

<div class="bg-white border gap-1 rounded-lg justify-items-center m-2 ">

<ul class="list-disc ml-5">
    <li>Active Users Count : <?= $item['active_users_count'] ?? 'Not to communicate' ?></li>
    <li>Previous month : <?= $item['previous_month_cost'] ?? 'Not to communicate' ?></li>
</ul>
</div>
<div class="flex justify-center">
<a href="./tool_update.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">Update the tool</a>
<a href="./tool_delete.php?id=<?= $item['id'] ?>" class="bg-violet-600 rounded-md w-fit text-center p-2 m-2 inline-block text-white">Delete the tool (This would be irreparable)</a>
</div>

</main>
<?php
require_once('../components/footer.php');
?>


